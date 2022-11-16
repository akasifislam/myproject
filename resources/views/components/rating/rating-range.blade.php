<div class="ms-lg-4 rating-range">
    <div class="rating-range-item d-flex align-items-center">
        <div class="rating-range-item-ratings">
            <ul class="list-inline">
                @for ($i = 0; $i < 5; $i++)
                    @include('components.Stars.small-full')
                @endfor
            </ul>
        </div>
        <div class="rating-range-item-bar">
            <div class="rating-width" style="width: {{ $starsPercentages['fivestar'] }}%"></div>
        </div>
        <div class="rating-range-item-percent">
            <p>{{ $starsCounts['fivestar'] }}</p>
        </div>
    </div>
    <div class="rating-range-item d-flex align-items-center four-star">
        <div class="rating-range-item-ratings">
            <ul class="list-inline">
                @for ($i = 0; $i < 4; $i++)
                    @include('components.Stars.small-full')
                @endfor
                @include('components.Stars.null')
            </ul>
        </div>
        <div class="rating-range-item-bar">
            <div class="rating-width" style="width: {{ $starsPercentages['fourstar'] }}%"></div>
        </div>
        <div class="rating-range-item-percent">
            <p>{{ $starsCounts['fourstar'] }}</p>
        </div>
    </div>
    <div class="rating-range-item d-flex align-items-center three-star">
        <div class="rating-range-item-ratings">
            <ul class="list-inline">
                @for ($i = 0; $i < 3; $i++)
                    @include('components.Stars.small-full')
                @endfor
                @for ($i = 0; $i < 2; $i++) @include('components.Stars.null') @endfor </ul>
        </div>
        <div class="rating-range-item-bar">
            <div class="rating-width" style="width: {{ $starsPercentages['threestar'] }}%"></div>
        </div>
        <div class="rating-range-item-percent">
            <p>{{ $starsCounts['threestar'] }}</p>
        </div>
    </div>
    <div class="rating-range-item d-flex align-items-center two-star">
        <div class="rating-range-item-ratings">
            <ul class="list-inline">
                @for ($i = 0; $i < 2; $i++)
                    @include('components.Stars.small-full')
                @endfor
                @for ($i = 0; $i < 3; $i++) @include('components.Stars.null') @endfor </ul>
        </div>
        <div class="rating-range-item-bar">
            <div class="rating-width" style="width: {{ $starsPercentages['twostar'] }}%"></div>
        </div>
        <div class="rating-range-item-percent">
            <p>{{ $starsCounts['twostar'] }}</p>
        </div>
    </div>
    <div class="rating-range-item d-flex align-items-center one-star">
        <div class="rating-range-item-ratings">
            <ul class="list-inline">
                @include('components.Stars.small-full')
                @for ($i = 0; $i < 4; $i++)
                    @include('components.Stars.null')
                @endfor
            </ul>
        </div>
        <div class="rating-range-item-bar">
            <div class="rating-width" style="width: {{ $starsPercentages['onestar'] }}%"></div>
        </div>
        <div class="rating-range-item-percent">
            <p>{{ $starsCounts['onestar'] }}</p>
        </div>
    </div>
</div>
