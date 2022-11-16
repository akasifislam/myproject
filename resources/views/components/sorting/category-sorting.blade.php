<div class="event-search-wizard-body">
    <div class="event-search-wizard-item">
        <div class="event-search-wizard-item-start">
            <input onclick="coursePageRedirect()" {{ request()->query('category') ? '' : 'checked' }}
                class="checkbox-primary" type="checkbox" id="all">
            <label for="all">All</label>
        </div>
        <div class="event-search-wizard-item-end">
            <p>{{ $totalCourseCount }}</p>
        </div>
    </div>
    @foreach ($categories as $category)
        <div class="event-search-wizard-item">
            <div class="event-search-wizard-item-start">
                <input onclick="categorySorting('{{ $category->slug }}')"
                    {{ request()->query('category') == $category->slug ? 'checked' : '' }} class="checkbox-primary"
                    id="{{ $category->slug }}" type="checkbox">
                <label for="{{ $category->slug }}">{{ Str::words($category->name, 3, '...') }}</label>
            </div>
            <div class="event-search-wizard-item-end">
                <p>{{ $category->course_count }}</p>
            </div>
        </div>
    @endforeach
</div>
