<div class="col-lg-4">
    <div class="videolist-area">
        @php
            $courseProgress = $course->courseProgress($course->id);
        @endphp
        <div class="videolist-area-heading">
            <h6>Course Contents</h6>
            <p><span id="courseProgressHtml">{{ number_format($courseProgress, 0) }}</span>% Completed</p>
        </div>
        <div class="videolist-area-bar">
            <span class="videolist-area-bar--progress" style="width: {{ number_format($courseProgress, 0) }}%"></span>
        </div>
        @forelse($course->chapter as $chapter)
            <div class="videolist-area-bar__wrapper">
                <div class="videolist-area-wizard">
                    <div class="wizard-heading">
                        <h6>{{ $chapter->name }}</h6>
                    </div>
                    @php
                        $lessons = Modules\Course\Entities\Lesson::where('chapter_id', $chapter->id)->get();
                    @endphp
                    @forelse ($lessons as $key => $lesson)
                        @php
                            $lessonActivityCheck = $lesson->lessonActivityCheck($course->id, $chapter->id, $lesson->id);
                        @endphp
                        @if ($lesson->video_type == 'file')
                            <div class="main-wizard">
                                <div class="main-wizard__wrapper download-wizard">
                                    <a class="main-wizard-start">
                                        <div class="main-wizard-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-file">
                                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z">
                                                </path>
                                                <polyline points="13 2 13 9 20 9"></polyline>
                                            </svg>
                                        </div>
                                        <div class="main-wizard-title">
                                            <p>{{ $key + 1 }}. {{ $lesson->lesson_name }}</p>
                                        </div>
                                    </a>
                                    @if ($lesson->file)
                                        <form action="{{ route('lesson.file.download') }}" method="post"
                                            id="lessonFileDownloadForm">
                                            <div class="main-wizard-end">

                                                <span>{{ round(Storage::size($lesson->file) / 1024, 2) }} MB</span>
                                                @csrf
                                                <input type="hidden" name="file" value="{{ $lesson->file }}">
                                                <a onclick="$('#lessonFileDownloadForm').submit()" href="#">
                                                    <small>Downlaod</small>
                                                </a>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="main-wizard">
                                <div
                                    class="border-0 main-wizard__wrapper {{ request()->query('lesson') == $lesson->slug ? 'active' : '' }}">
                                    <a class="main-wizard-start border-0"
                                        onclick="lessonActivity('{{ $chapter->slug }}','{{ $lesson->slug }}')"
                                        role="button">
                                        <div class="main-wizard-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-play-circle">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <polygon points="10 8 16 12 10 16 10 8"></polygon>
                                            </svg>
                                        </div>
                                        <div class="main-wizard-title">
                                            <p>{{ $key + 1 }}. {{ $lesson->lesson_name }}</p>
                                        </div>
                                    </a>
                                    <div class="main-wizard-end d-flex align-items-center">
                                        <span>{{ $lesson->duration }} Minutes</span>
                                        <div class="form-check">
                                            <input data-lessonid="{{ $lesson->id }}"
                                                data-chapterid="{{ $chapter->id }}"
                                                {{ $lessonActivityCheck ? 'checked' : '' }}
                                                class="form-check-input lessonCheck" type="checkbox" value=""
                                                style="border-radius: 0px; margin-left: 5px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <input value="{{ $course->id }}" id='course_id' hidden>
                    @empty
                        <p class="text-center">
                            No Lesson Found!
                        </p>
                    @endforelse
                </div>
                {{-- <div class="videolist-area-wizard">
                    <div class="wizard-heading">
                        <h6 class="">The Project Brief</h6>
                    </div>
                    <div class="main-wizard">
                        <div class="main-wizard__wrapper download-wizard">
                            <a class="main-wizard-start">
                                <div class="main-wizard-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-file">
                                        <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z">
                                        </path>
                                        <polyline points="13 2 13 9 20 9"></polyline>
                                    </svg>
                                </div>
                                <div class="main-wizard-title">
                                    <p>4. Project Brief</p>
                                </div>
                            </a>
                            <div class="main-wizard-end">
                                <span>2.5 MB</span>
                                <small>Downlaod</small>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        @empty
            <div>
                <h5 class="text-center">
                    No Chapter Found!
                </h5>
            </div>
        @endforelse
    </div>
</div>


<form class="d-none" id="lesson_activity_form" method="GET" action="{{ route('watch.course', $course->slug) }}">
    <input name="lesson" type="text" value="" id="lesson_slug_input">
    <input name="chapter" type="text" value="" id="chapter_slug_input">
</form>
