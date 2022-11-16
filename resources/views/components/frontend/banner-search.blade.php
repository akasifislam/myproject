<form action="{{ route('courses') }}" method="GET">
    <div class="banner-input">
        <div class="main-input">
            <input name="search" type="text" placeholder="what do you want do learn today..." />
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
        </div>
        <div class="select-button">
            <div class="dropSelect">
                <span class="dropSelect-icon">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14.9284 1.83331H17.9228C19.1617 1.83331 20.1667 2.84705 20.1667 4.09765V7.11707C20.1667 8.36672 19.1617 9.38141 17.9228 9.38141H14.9284C13.6886 9.38141 12.6836 8.36672 12.6836 7.11707V4.09765C12.6836 2.84705 13.6886 1.83331 14.9284 1.83331Z"
                            stroke="#202029" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M4.0781 1.83331H7.07153C8.31136 1.83331 9.31638 2.84705 9.31638 4.09765V7.11707C9.31638 8.36672 8.31136 9.38141 7.07153 9.38141H4.0781C2.83827 9.38141 1.83325 8.36672 1.83325 7.11707V4.09765C1.83325 2.84705 2.83827 1.83331 4.0781 1.83331Z"
                            stroke="#202029" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M4.0781 12.6186H7.07153C8.31137 12.6186 9.31638 13.6323 9.31638 14.8839V17.9024C9.31638 19.1529 8.31137 20.1667 7.07153 20.1667H4.0781C2.83827 20.1667 1.83325 19.1529 1.83325 17.9024V14.8839C1.83325 13.6323 2.83827 12.6186 4.0781 12.6186Z"
                            stroke="#202029" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14.9284 12.6186H17.9228C19.1617 12.6186 20.1667 13.6323 20.1667 14.8839V17.9024C20.1667 19.1529 19.1617 20.1667 17.9228 20.1667H14.9284C13.6886 20.1667 12.6836 19.1529 12.6836 17.9024V14.8839C12.6836 13.6323 13.6886 12.6186 14.9284 12.6186Z"
                            stroke="#202029" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <select name="category" id="category-item">
                    @foreach ($categories as $category)
                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="search-button">
            <button type="submit" class="button button-lg button--primary">Search</button>
        </div>
    </div>
</form>
