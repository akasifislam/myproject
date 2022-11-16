<div class="row">

    @forelse ($enrollCourses as $enrollCourse)
        <div class="col-lg-4 col-md-6 col-md-6 mb-4">
            <x-courses.watch-course :enrollCourse="$enrollCourse" />
        </div>
    @empty
        <div>
            <h5 class="text-center mt-3">
                No Course Found!
            </h5>
        </div>
    @endforelse
</div>
