<div class="row">
    @forelse ($courseDetails->chapter as $chapter)
        <div class="course-curriculum-area">
            <div class="curriculum-area">
                <button class="curriculum-area-top" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse{{ $chapter->id }}" aria-expanded="false" aria-controls="collapse1">
                    <div class="curriculum-area-top-start">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path d="M15.8332 7.08337L9.99984 12.9167L4.1665 7.08337" stroke="#42414B" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <h6>{{ $chapter->name }}</h6>
                    </div>
                    <div class="curriculum-area-top-end">
                        <div class="total-lesson">
                            <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.5 2.75H6C6.79565 2.75 7.55871 3.06607 8.12132 3.62868C8.68393 4.19129 9 4.95435 9 5.75V16.25C9 15.6533 8.76295 15.081 8.34099 14.659C7.91903 14.2371 7.34674 14 6.75 14H1.5V2.75Z"
                                    stroke="#00AF91" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M16.5 2.75H12C11.2044 2.75 10.4413 3.06607 9.87868 3.62868C9.31607 4.19129 9 4.95435 9 5.75V16.25C9 15.6533 9.23705 15.081 9.65901 14.659C10.081 14.2371 10.6533 14 11.25 14H16.5V2.75Z"
                                    stroke="#00AF91" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <p>{{ $chapter->lesson_count }} Lesson</p>
                        </div>
                        <div class="total-hours">
                            <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9 17C13.1421 17 16.5 13.6421 16.5 9.5C16.5 5.35786 13.1421 2 9 2C4.85786 2 1.5 5.35786 1.5 9.5C1.5 13.6421 4.85786 17 9 17Z"
                                    stroke="#FFC91B" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M9 5V9.5L12 11" stroke="#FFC91B" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                            <p>1H 16M</p>
                        </div>
                    </div>
                </button>
                <div class="curriculum-area-bottom collapse show" id="collapse{{ $chapter->id }}">
                    @foreach ($chapter->lesson as $key => $lesson)
                        <div class="curriculum-description">
                            <div class="curriculum-description-start">
                                <p>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-play-circle">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polygon points="10 8 16 12 10 16 10 8">
                                            </polygon>
                                        </svg>
                                    </a>
                                    <a href="#">{{ $key + 1 }}.
                                        {{ $lesson->lesson_name }}</a>
                                </p>
                            </div>
                            <div class="curriculum-description-end">
                                <p>12:34</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                    <rect x="3" y="11" width="18" height="11" rx="2"
                                        ry="2">
                                    </rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @empty
        <div>
            <h6 class="text-center mt-3 pt-3">
                Empty Curriculum!
            </h6>
        </div>
    @endforelse
</div>
