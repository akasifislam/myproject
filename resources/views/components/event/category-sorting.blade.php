<div class="event-search-wizard" id="category">
    <div class="event-search-wizard-header">
        <h6 class="font-title--card">Category</h6>
        <button type="button" style="border: 0; background: transparent;" onclick="toggle('category',this);">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.16658 12.917L9.99992 7.08366L15.8333 12.917" stroke="#42414B" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </button>
    </div>
    <div class="event-search-wizard-body">


        <div class="event-search-wizard-item">
            <div class="event-search-wizard-item-start">
                <input onclick="eventPageRedirect()" {{ request()->query('category') ? '' : 'checked' }}
                    class="checkbox-primary" type="checkbox" id="all">
                <label for="all">All</label>
            </div>
            <div class="event-search-wizard-item-end">
                <p>{{ $allEvents }}</p>
            </div>
        </div>


        @foreach ($categories as $category)
            <div class="event-search-wizard-item">
                <div class="event-search-wizard-item-start">
                    <input onclick="categoryEventtSorting('{{ $category->slug }}')"
                        {{ request()->query('category') == $category->slug ? 'checked' : '' }}
                        id="{{ $category->id }}" class="checkbox-primary" type="checkbox">
                    <label for="{{ $category->id }}">{{ Str::words($category->name, 3, '...') }}</label>
                </div>
                <div class="event-search-wizard-item-end">
                    <p>{{ $category->event_count }}</p>
                </div>
            </div>
        @endforeach


    </div>
</div>
