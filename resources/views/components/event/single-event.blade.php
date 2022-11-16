<div class="contentCard contentCard--event {{ $class }}">
    <div class="contentCard-top">
        <a href="{{ route('event.details', $event->slug) }}"><img src="{{ asset($event->thumbnail) }}" alt="images"
                class="img-fluid"></a>
    </div>
    <div class="contentCard-bottom">
        <h5>
            <a href="{{ route('event.details', $event->slug) }}" class="font-title--card">{{ $event->title }}</a>
        </h5>
        <div class="contentCard-more d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div class="icon">
                    <img src="{{ asset('frontend') }}/dist/images/icon/location.png" alt="location">
                </div>
                <span>{{ Str::words($event->country . ', ' . $event->city, 4, '...') }}</span>
            </div>
            <div class="d-flex align-items-center">
                <div class="icon">
                    <img src="{{ asset('frontend') }}/dist/images/icon/calendar.png" alt="calendar">
                </div>
                <span>{{ date('d M, Y', strtotime($event->date)) }}</span>
            </div>
        </div>
    </div>
</div>
