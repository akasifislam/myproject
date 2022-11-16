<div class="row students-info-intro">
    <div class="col-lg-6">
        <div class="students-info-intro-start">
            <div class="image">
                <img src="{{ asset($student->image) }}" alt="Student" style="width:150px;height:150px;border-radius:50%"/>
            </div>
            <div class="text">
                <h5 class="font-title--sm">{{ $student->firstname . ' ' . $student->lastname }}</h5>
                <p>{{ $student->profession }}</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="students-info-intro-end">
            <div class="enrolled-courses">
                <div class="enrolled-courses-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="36" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-book-open">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                    </svg>
                </div>
                <div class="enrolled-courses-text">
                    <h6 class="font-title--xs">{{ $enrollCourses->count() }}</h6>
                    <p class="fs-6 mt-1">Enrolled Courses</p>
                </div>
            </div>


            <div class="completed-courses">
                <div class="completed-courses-icon">
                    <svg width="30" height="36" viewBox="0 0 30 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M27.2189 6.13456C27.959 6.39367 28.4535 7.0914 28.4535 7.8755V19.3457C28.4535 22.5516 27.2883 25.6118 25.2307 27.9827C24.1959 29.1767 22.8868 30.1064 21.4965 30.8583L15.4709 34.1133L9.43518 30.8566C8.0431 30.1047 6.73231 29.1767 5.69588 27.981C3.63655 25.6101 2.46802 22.5482 2.46802 19.339V7.8755C2.46802 7.0914 2.96253 6.39367 3.7026 6.13456L14.8494 2.21743C15.2457 2.07856 15.6775 2.07856 16.0721 2.21743L27.2189 6.13456Z"
                            stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11.0583 17.6406L14.2625 20.8465L20.8639 14.2451" stroke="currentColor"
                            stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                @php
                    $totalCompleteCourses = 0;
                @endphp

                @foreach ($enrollCourses as $enrollcourse)
                    @php
                        $courseProgress = $enrollcourse->course->courseProgress($enrollcourse->course->id);

                        if ($courseProgress == 100) {
                            $totalCompleteCourses++;
                        }
                    @endphp
                @endforeach

                <div class="completed-courses-text">
                    <h5 class="font-title--xs">{{ $totalCompleteCourses }}</h5>
                    <p class="fs-6 mt-1">Completed Courses</p>
                </div>
            </div>
        </div>
    </div>
</div>
