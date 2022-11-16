@extends('layouts.admin')
@section('title') Course Lesson | Admin @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Course Syllabus</h3>
                    </div>
                    <div class="card-body">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                            <a class="nav-link" href="{{ route('course.syllabus', $course->id) }}"> Chapter </a>
                            <a class="nav-link {{ Route::is('course.lesson') || Route::is('chapter.lesson.edit') ? 'active' : '' }}" href="{{  route('course.lesson', $course->id)  }}"> Lesson </a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="tab-content" id="v-pills-tabContent">

                    {{-- Lesson tab --}}
                    <div id="lesson-tab">
                        <div class="row">
                            <div class="col-md-12">
                                {{-- Lesson table --}}
                                <x-courses.lesson-table :chapters="$chapters" :lessons="$lessons" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                @if ($lessonEditMode && $lesson)
                                    {{-- Lesson edit --}}
                                    <x-courses.lesson-edit :chapters="$chapters" :lesson="$lesson" :course="$course" />
                                @else
                                    {{-- Lesson create --}}
                                    <x-courses.lesson-create :chapters="$chapters" :course="$course" />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (isset($lesson->video_type))
        <input id="videoType" type="hidden" value="{{ $lesson->video_type }}">
    @endif

@endsection
