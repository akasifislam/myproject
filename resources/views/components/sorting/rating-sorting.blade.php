<div class="event-search-wizard-body">
    <div class="event-search-wizard-item">
        <div class="event-search-wizard-item-start">
            <input onclick="coursePageRedirect()" {{ $filterRating ? '' : 'checked' }} class="checkbox-primary"
                type="checkbox" id="all3">
            <label for="all3">All</label>
        </div>
    </div>
    <div class="event-search-wizard-item">
        <div class="event-search-wizard-item-start">
            <input {{ $filterRating == 1 ? 'checked' : '' }} onclick="ratingSorting(1)" class="checkbox-primary"
                type="checkbox" id="s1">
            <label for="s1">1 Star and higher</label>
        </div>
    </div>
    <div class="event-search-wizard-item">
        <div class="event-search-wizard-item-start">
            <input {{ $filterRating == 2 ? 'checked' : '' }} onclick="ratingSorting(2)" class="checkbox-primary"
                type="checkbox" id="s2">
            <label for="s2">2 Star and higher</label>
        </div>
    </div>
    <div class="event-search-wizard-item">
        <div class="event-search-wizard-item-start">
            <input {{ $filterRating == 3 ? 'checked' : '' }} onclick="ratingSorting(3)" class="checkbox-primary"
                type="checkbox" id="s3">
            <label for="s3">3 Star and higher</label>
        </div>
    </div>
    <div class="event-search-wizard-item">
        <div class="event-search-wizard-item-start">
            <input {{ $filterRating == 4 ? 'checked' : '' }} onclick="ratingSorting(4)" class="checkbox-primary"
                type="checkbox" id="s4">
            <label for="s4">4 Star and higher</label>
        </div>
    </div>
    <div class="event-search-wizard-item">
        <div class="event-search-wizard-item-start">
            <input {{ $filterRating == 5 ? 'checked' : '' }} onclick="ratingSorting(5)" class="checkbox-primary"
                type="checkbox" id="s5">
            <label for="s5">5 Star</label>
        </div>
    </div>
</div>
