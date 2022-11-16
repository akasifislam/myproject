<div class="row">
    @foreach ($enrollCourses as $enrollCourse)
        @php
            $completeCourse = $enrollCourse->course->courseProgress($enrollCourse->course->id);
        @endphp
        @if ($completeCourse == 100)
            <div class="col-lg-4 col-md-6 col-md-6 mb-4">
                <x-courses.watch-course :enrollCourse="$enrollCourse" />
            </div>
        @else
            @if ($loop->first)
                <div>
                    <h5 class="text-center mt-3">
                        No Course Found!
                    </h5>
                </div>
            @endif
        @endif
    @endforeach
</div>
