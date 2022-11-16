<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\CourseEnroll;
use Illuminate\Http\Request;
use Modules\Course\Entities\Course;
use Modules\Course\Entities\Lesson;
use Modules\Review\Entities\Review;
use Modules\Course\Entities\Chapter;
use Modules\Comment\Entities\Comment;
use App\Traits\IncrementInstructorData;
use Modules\Course\Entities\CourseProgress;

class CourseEnrollController extends Controller
{
    use IncrementInstructorData;

    public function courseEnroll(Request $request)
    {
        // $instructor = Instructor::find($request->course_id);

        try {
            CourseEnroll::create($request->all());

            $this->totalEnrolledIncrement($request->course_id);

            flashSuccess('Course Enrolled Successfully');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    public function courseDescription($slug)
    {
        $course = Course::with('instructor', 'chapter', 'lesson')->withCount('reviews as total_ratings')->withSum('reviews:stars as total_stars')->whereSlug($slug)->first();
        $enrolled = $course->courseEnrolled($course->id);
        $lessonCount = Lesson::whereCourseId($course->id)->count();
        $instructorTotalCourses = Course::whereStatus(true)->whereInstructorId($course->instructor_id)->count();
        $total_minutes = $course->lesson->pluck('duration')->sum();
        $total_duration = floor($total_minutes / 60) . ':' . ($total_minutes -   floor($total_minutes / 60) * 60);

        // rating count and percentages
        $totalStars = $course->total_stars ?? 0;
        $ratingsCount = Review::select('course_id', 'stars')->whereCourseId($course->id)->count();

        // avg star
        if ($ratingsCount && $totalStars) {
            $avgStar = avgStar($totalStars, $ratingsCount);
        } else {
            $avgStar = 0;
        }

        $chapterActivity = request()->chapter;
        $lessonActivity = request()->lesson;

        $selected_chapter = [];
        $selected_lesson = [];
        if ($chapterActivity && $lessonActivity) {
            $selected_chapter = Chapter::whereSlug($chapterActivity)->first();
            $selected_lesson = Lesson::whereSlug($lessonActivity)->first();
        }

        if ($enrolled) {
            $comments = Comment::where('course_id', $course->id)->latest()->get();
            $total = $comments->count();
            return view('frontend.coursedescription', compact('course', 'comments', 'total', 'lessonCount', 'instructorTotalCourses', 'selected_chapter', 'selected_lesson', 'avgStar', 'total_duration'));
        } else {
            abort(404);
        }
    }

    public function courseLessonCheck(Request $request)
    {
        $status = $request->status;
        $lesson_id = $request->lesson_id;
        $chapter_id = $request->chapter_id;
        $course_id = $request->course_id;

        if ($status == 1) {
            CourseProgress::create([
                'course_id' => $course_id,
                'chapter_id' => $chapter_id,
                'lesson_id' => $lesson_id,
                'student_id' => auth()->user()->id,
            ]);

            return responseSuccess('Lesson Checked');
        } else {
            CourseProgress::where('course_id', $course_id)
                ->where('chapter_id', $chapter_id)
                ->where('lesson_id', $lesson_id)
                ->where('student_id', auth()->user()->id)
                ->delete();

            return responseSuccess('Lesson unchecked');
        }
    }

    public function courseProgressPercentage(Request $request)
    {
        $course = new Course();
        $courseProgress = $course->courseProgress($request->course_id);

        return $courseProgress;
    }

    public function loadMoreData(Request $request)
    {
        if ($request->id > 0) {
            $data = Comment::with('users')
                ->where('id', '<', $request->id)
                ->where('course_id', $request->course_id)
                ->limit(5)
                ->latest()
                ->get();
        } else {
            $data = Comment::with('users')->where('course_id', $request->course_id)->limit(5)->latest()->get();
        }

        $output = '';
        $last_id = '';

        if (!$data->isEmpty()) {
            $numItems = count($data);
            $i = 0;

            foreach ($data as $row) {
                if (++$i === $numItems) {
                    $output .= '
                        <div class="students-feedback-item border-0">
                            <div class="feedback-rating">
                                <div class="feedback-rating-start">
                                    <div class="image">
                                        <img src="' . asset($row->users->image) . '" alt="Image" />
                                    </div>
                                    <div class="text">
                                        <h6><a href="#">' . $row->users->firstname . ' ' . $row->users->lastname . '</a>
                                        </h6>
                                        <p>' . $row->users->created_at->diffForHumans() . '</p>
                                    </div>
                                </div>
                                <div class="feedback-rating-end">
                                    <div class="rating-icons rating-icons-2"></div>
                                </div>
                            </div>
                            <p>
                                ' . $row->comment . '
                            </p>
                        </div>
                    ';
                } else {
                    $output .= '
                        <div class="students-feedback-item">
                            <div class="feedback-rating">
                                <div class="feedback-rating-start">
                                    <div class="image">
                                        <img src="' . asset($row->users->image) . '" alt="Image" />
                                    </div>
                                    <div class="text">
                                        <h6><a href="#">' . $row->users->firstname . ' ' . $row->users->lastname . '</a>
                                        </h6>
                                        <p>' . $row->users->created_at->diffForHumans() . '</p>
                                    </div>
                                </div>
                                <div class="feedback-rating-end">
                                    <div class="rating-icons rating-icons-2"></div>
                                </div>
                            </div>
                            <p>
                                ' . $row->comment . '
                            </p>
                        </div>
                    ';
                }

                $last_id = $row->id;
            }
            $output .= '
                <div class="text-center" id="load_more">
                    <button type="button" id="load_more_button" class="button button-md button--primary-outline"  data-id="' . $last_id . '">Load
                        More</button>
                </div>
            ';
        } else {
            $output .= '
                <div class="text-center" id="load_more">
                    <p type="button" class="text-danger">No more comment found</p>
                </div>
            ';
        }
        return $output;
    }
}
