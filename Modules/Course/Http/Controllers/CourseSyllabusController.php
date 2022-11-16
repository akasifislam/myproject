<?php

namespace Modules\Course\Http\Controllers;

use App\Actions\File\FileDelete;
use App\Actions\File\FileUpload;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Course\Entities\Chapter;
use Modules\Course\Entities\Course;
use Modules\Course\Entities\Lesson;
use Modules\Course\Http\Requests\LessonFormRequest;

class CourseSyllabusController extends Controller
{
    public function courseSyllabus(Course $course, $chapter = null, $editMode = false)
    {
        // return session('lesson_creating');

        $chapters = Chapter::whereCourseId($course->id)->oldest('order')->get();

        return view('course::syllabus', compact('course', 'chapters', 'chapter', 'editMode'));
    }

    // -----------------chapter---------------------
    public function courseChapterStore(Request $request)
    {
        $request->validate(['name' => 'required|unique:chapters,name']);

        try {
            Chapter::create($request->all());
            flashSuccess('Chapter Created Successfully');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    public function courseChapterEdit(Chapter $chapter)
    {
        return $this->courseSyllabus($chapter->course, $chapter, true);
    }

    public function courseChapterUpdate(Request $request, Chapter $chapter)
    {
        $request->validate(['name' => "required|unique:chapters,name, $chapter->id"]);

        try {
            $chapter->update($request->all());
            flashSuccess('Chapter Updated Successfully');
            return redirect()->route('course.syllabus', $chapter->course_id);
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    public function courseChapterDelete(Chapter $chapter)
    {
        try {
            $chapter->delete();
            flashSuccess('Chapter Deleted Successfully');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }


    public function courseChapterOrderUpdate(Request $request)
    {
        try {
            $tasks = Chapter::all();
            foreach ($tasks as $task) {
                $task->timestamps = false; // To disable update_at field updation
                $id = $task->id;

                foreach ($request->order as $order) {
                    if ($order['id'] == $id) {
                        $task->update(['order' => $order['position']]);
                    }
                }
            }

            return response()->json(['message' => 'Chapter Sorted Successfully!']);
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    // -----------------lesson---------------------

    public function courseLesson(Course $course, $lesson = null, $lessonEditMode = false)
    {
        $chapters = Chapter::whereCourseId($course->id)->oldest('order')->get();
        $lessons = Lesson::whereCourseId($course->id)->oldest('order')->get();
        return view('course::lesson', compact('course', 'chapters', 'lessons', 'lesson', 'lessonEditMode'));
    }

    public function chapterLessonStore(LessonFormRequest $request)
    {
        try {
            if ($request->video_type == 'file') {
                $lesson = Lesson::create($request->except(['file']));

                $file = $request->file;
                if ($file) {
                    $url = FileUpload::uploadPrivateFile($file, 'lesson');
                    $lesson->update(['file' => $url]);
                }
            } else {
                $lesson = Lesson::create($request->except(['file']));
            }

            session(['lesson_creating' => 'lesson_creating']);
            flashSuccess('Lesson Created Successfully');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    public function chapterLessonEdit(Lesson $lesson)
    {
        return $this->courseLesson($lesson->course, $lesson, true);
    }

    public function chapterLessonUpdate(LessonFormRequest $request, Lesson $lesson)
    {
        try {
            if ($request->video_type == 'file') {
                $request->video_url = null;
                $lesson->update($request->except(['file']));

                $file = $request->file;
                if ($file) {
                    $url = FileUpload::upload($file, 'lesson');
                    $lesson->update(['file' => $url]);
                }
            } else {
                $request->file = null;
                $lesson->update($request->except(['file']));
            }

            flashSuccess('Lesson Updated Successfully');
            return redirect()->route('course.syllabus', $lesson->course_id);
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    public function chapterLessonDelete(Lesson $lesson)
    {
        try {
            if ($lesson->video_type == 'file') {
                $file_exists = file_exists($lesson->file);

                if ($file_exists) {
                    FileDelete::delete($lesson->file);
                }
            }

            $lesson->delete();
            flashSuccess('Lesson Deleted Successfully');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    public function lessonFileDownload(Request $request)
    {
        return Storage::download($request->file);
    }

    public function courseLessonOrderUpdate()
    {
        try {
            $tasks = Lesson::all();
            foreach ($tasks as $task) {
                $task->timestamps = false; // To disable update_at field updation
                $id = $task->id;

                foreach ($request->order as $order) {
                    if ($order['id'] == $id) {
                        $task->update(['order' => $order['position']]);
                    }
                }
            }

            return response()->json(['message' => 'Lesson Sorted Successfully!']);
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }
}
