<div class="event-search-wizard-body">
    <div class="event-search-wizard-item">
        <div class="event-search-wizard-item-start">
            <input onclick="coursePageRedirect()" {{ request()->query('level') ? '' : 'checked' }}
                class="checkbox-primary" type="checkbox" id="all2">
            <label for="all2">All</label>
        </div>
        <div class="event-search-wizard-item-end">
            <p>{{ $totalCourseCount }}</p>
        </div>
    </div>
    @foreach ($courseLevels as $course)
        <div class="event-search-wizard-item">
            <div class="event-search-wizard-item-start">
                <input onclick="courseLevelSorting('{{ $course['level'] }}')"
                    {{ request()->query('level') == $course['level'] ? 'checked' : '' }} class="checkbox-primary"
                    type="checkbox" id="{{ $course['level'] }}">
                <label for="{{ $course['level'] }}">{{ $course['level'] }}</label>
            </div>
            <div class="event-search-wizard-item-end">
                <p>{{ $course['value'] }}</p>
            </div>
        </div>
    @endforeach
</div>
