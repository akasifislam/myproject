<div>
    <div class="event-search-wizard-body">
        <div class="event-search-wizard-item">
            <div class="event-search-wizard-item-start">
                <input onclick="coursePageRedirect()" {{ $filterDuration ? '' : 'checked' }} class="checkbox-primary"
                    type="checkbox" id="all3">
                <label for="all3">All</label>
            </div>
            <div class="event-search-wizard-item-end">
                <p>{{ $totalCourseCount }}</p>
            </div>
        </div>
        <div class="event-search-wizard-item">
            <div class="event-search-wizard-item-start">
                <input onclick="durationSorting(2)" {{ $filterDuration == 2 ? 'checked' : '' }}
                    class="checkbox-primary" type="checkbox" id="s1">
                <label for="s1">(0-2) Hours</label>
            </div>
            <div class="event-search-wizard-item-end">
                <p>{{ $durations['0_to_2hours'] }}</p>
            </div>
        </div>
        <div class="event-search-wizard-item">
            <div class="event-search-wizard-item-start">
                <input onclick="durationSorting(3)" {{ $filterDuration == 3 ? 'checked' : '' }}
                    class="checkbox-primary" type="checkbox" id="s1">
                <label for="s1">(3-4) Hours</label>
            </div>
            <div class="event-search-wizard-item-end">
                <p>{{ $durations['3_to_4hours'] }}</p>
            </div>
        </div>
        <div class="event-search-wizard-item">
            <div class="event-search-wizard-item-start">
                <input onclick="durationSorting(5)" {{ $filterDuration == 5 ? 'checked' : '' }}
                    class="checkbox-primary" type="checkbox" id="s1">
                <label for="s1">5+ Hours</label>
            </div>
            <div class="event-search-wizard-item-end">
                <p>{{ $durations['5_hours'] }}</p>
            </div>
        </div>
    </div>
</div>
