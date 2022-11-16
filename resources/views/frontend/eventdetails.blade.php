@extends('layouts.website')

@section('title') Event Details Overview - {{ env('APP_NAME') }} @endsection

@section('body-style') style="background-color: #ebebf2;" @stop

@section('content')

    <!-- Breadcrumb Starts Here -->
    <section class="section event-sub-section">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb align-items-center bg-transparent p-0 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}" class="fs-6 text-secondary">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('event') }}" class="fs-6 text-secondary">Events</a></li>
                    <li class="breadcrumb-item fs-6 text-secondary d-none d-lg-inline-block" aria-current="page">
                        {{ $event->title }}</li>
                </ol>
            </nav>
            <div class="row event-sub-section-main">
                <div class="col-lg-8">
                    <h5 class="font-title--sm">{{ $event->title }}</h5>
                    <div class="count-down count-down--sm eventCount justify-content-start syotimer timer" id="countdown">
                        <div class="timer-head-block"></div>
                        <div class="timer-body-block">
                            <div class="table-cell day">
                                <div class="tab-val">63</div>
                                <div class="tab-metr tab-unit">days</div>
                            </div>
                            <div class="table-cell hour">
                                <div class="tab-val">07</div>
                                <div class="tab-metr tab-unit">hours</div>
                            </div>
                            <div class="table-cell minute">
                                <div class="tab-val">45</div>
                                <div class="tab-metr tab-unit">minutes</div>
                            </div>
                            <div class="table-cell second">
                                <div class="tab-val" style="opacity: 1;">21</div>
                                <div class="tab-metr tab-unit">seconds</div>
                            </div>
                        </div>
                        <div class="timer-foot-block"></div>
                    </div>
                    <ul class="event-time list-unstyled list-inline"></ul>
                </div>
                <div class="col-lg-4">
                    <div class="icon-with-date d-flex align-items-lg-center">
                        <div class="icon-with-date-start d-flex align-items-center">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.25 3H3.75C2.92157 3 2.25 3.67157 2.25 4.5V15C2.25 15.8284 2.92157 16.5 3.75 16.5H14.25C15.0784 16.5 15.75 15.8284 15.75 15V4.5C15.75 3.67157 15.0784 3 14.25 3Z"
                                    stroke="#00AF91" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path d="M12 1.5V4.5" stroke="#00AF91" stroke-width="1.7" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M6 1.5V4.5" stroke="#00AF91" stroke-width="1.7" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M2.25 7.5H15.75" stroke="#00AF91" stroke-width="1.7" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                            <span>{{ date('j M, Y', strtotime($event->date)) }}</span>
                        </div>
                        <div class="icon-with-date-end">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9 16.5C13.1421 16.5 16.5 13.1421 16.5 9C16.5 4.85786 13.1421 1.5 9 1.5C4.85786 1.5 1.5 4.85786 1.5 9C1.5 13.1421 4.85786 16.5 9 16.5Z"
                                    stroke="#FFC91B" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path d="M9 4.5V9L12 10.5" stroke="#FFC91B" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                            <span>{{ $event->starting_time . ' - ' . $event->ending_time }}</span>
                        </div>
                    </div>
                    <div class="icon-with-date d-flex align-items-lg-cente mb-0">
                        <div class="icon-with-date-start d-flex align-items-center">
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 9C1 9 4 3 9.25 3C14.5 3 17.5 9 17.5 9C17.5 9 14.5 15 9.25 15C4 15 1 9 1 9Z"
                                    stroke="#1089FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path
                                    d="M9.25 11.25C10.4926 11.25 11.5 10.2426 11.5 9C11.5 7.75736 10.4926 6.75 9.25 6.75C8.00736 6.75 7 7.75736 7 9C7 10.2426 8.00736 11.25 9.25 11.25Z"
                                    stroke="#1089FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                            <span>{{ $event->booked_seat }} Seat Booked</span>
                        </div>
                        <div class="icon-with-date-end">
                            <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M1.5 7.78252C1.5122 4.30097 4.43222 1.48821 8.02206 1.50004C11.6119 1.51187 14.5122 4.34381 14.5 7.82536V7.89675C14.4558 10.1599 13.1529 12.2517 11.5555 13.8865C10.6419 14.8066 9.62174 15.6211 8.51527 16.3139C8.21941 16.5621 7.78056 16.5621 7.48469 16.3139C5.83521 15.2726 4.3875 13.958 3.20781 12.4301C2.15637 11.0978 1.5594 9.48072 1.5 7.80394L1.5 7.78252Z"
                                    stroke="#FF7A1A" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <ellipse cx="7.99987" cy="7.90418" rx="2.08323" ry="2.02039" stroke="#FF7A1A"
                                    stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></ellipse>
                            </svg>
                            <span>{{ Str::words($event->country . ', ' . $event->city, 2, '...') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Event Info Starts Here -->
    <div class="event-info section pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="event-info-main">
                        <div class="image">
                            <img src="{{ asset($event->thumbnail) }}" alt="img" class="img-fluid rounded-2">
                        </div>
                        <nav class="event-info-tab mt-5">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link {{ $errors->any() ? '' : 'active' }}" id="nav-overview-tab"
                                    data-bs-toggle="tab" data-bs-target="#nav-overview" type="button" role="tab"
                                    aria-controls="nav-overview" aria-selected="true">Overview</button>
                                <button class="nav-link" id="nav-speakers-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-speakers" type="button" role="tab" aria-controls="nav-speakers"
                                    aria-selected="false">Speakers</button>
                                <button class="nav-link" id="nav-location-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-location" type="button" role="tab" aria-controls="nav-location"
                                    aria-selected="false">Location</button>
                                <button class="nav-link {{ $errors->any() ? 'active' : '' }} me-0" id="nav-review-tab"
                                    data-bs-toggle="tab" data-bs-target="#nav-review" type="button" role="tab"
                                    aria-controls="nav-review" aria-selected="false">Review</button>
                            </div>
                        </nav>
                        <div class="tab-content event-info-tab-content" id="nav-tabContent">
                            <div class="tab-pane nav-overview fade {{ $errors->any() ? '' : 'show active' }}"
                                id="nav-overview" role="tabpanel" aria-labelledby="nav-overview-tab">
                                <h6 class="mb-2 font-title--card">Event Description</h6>
                                {!! $event->description ? $event->description : 'Nothing found' !!}
                            </div>
                            <div class="tab-pane fade" id="nav-speakers" role="tabpanel" aria-labelledby="nav-speakers-tab">
                                <div class="row">
                                    @forelse ($event->speakers as $speaker)
                                        <div class="col-sm-4 col-6">
                                            <div class="event-speaker">
                                                <div class="event-speaker-image">
                                                    <img src="{{ asset($speaker->instructor->image) }}" alt="img">
                                                </div>
                                                <div class="event-speaker-info">
                                                    <h6 class="font-title--card"><a
                                                            href="#">{{ $speaker->instructor->firstname . ' ' . $speaker->instructor->lastname }}</a>
                                                    </h6>
                                                    <p>{{ $speaker->instructor->position }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="row">
                                            <div>
                                                <h5 class="text-center mt-3">
                                                    No Speaker Found!
                                                </h5>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-location" role="tabpanel" aria-labelledby="nav-location-tab">
                                <div class="row events-location">
                                    <div class="col-xl-6">
                                        <div class="events-location-map">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d201876.9935430553!2d-122.37539090724721!3d37.75890609140571!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80857d8b28aaed03%3A0x71b415d535759367!2sOakland%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1614609723770!5m2!1sen!2sbd"
                                                style="border: 0;" allowfullscreen="" loading="lazy"></iframe>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="events-location-text">
                                            <div class="text-item">
                                                <div class="text-item-start">
                                                    <div class="icon-image">
                                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clipOne)">
                                                                <path
                                                                    d="M1.33325 8.00033V29.3337L10.6666 24.0003L21.3333 29.3337L30.6666 24.0003V2.66699L21.3333 8.00033L10.6666 2.66699L1.33325 8.00033Z"
                                                                    stroke="currentColor" stroke-width="3"
                                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M10.6667 2.66699V24.0003" stroke="currentColor"
                                                                    stroke-width="3" stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                                <path d="M21.3333 8V29.3333" stroke="currentColor"
                                                                    stroke-width="3" stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                            </g>
                                                            <defs>
                                                                <clipPath>
                                                                    <rect width="32" height="32" fill="white"></rect>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="text-item-end">
                                                    <p>Address</p>
                                                    <h6 class="font-para--lg">
                                                        {{ $event->address }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="events-location-text">
                                            <div class="text-item">
                                                <div class="text-item-start">
                                                    <div class="icon-image email-bg">
                                                        <svg width="32" height="26" viewBox="0 0 32 26" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M5.06115 1.57129H27.2652C28.7918 1.57129 30.0407 2.857 30.0407 4.42843V21.5713C30.0407 23.1427 28.7918 24.4284 27.2652 24.4284H5.06115C3.53462 24.4284 2.28564 23.1427 2.28564 21.5713V4.42843C2.28564 2.857 3.53462 1.57129 5.06115 1.57129Z"
                                                                stroke="currentColor" stroke-width="3"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M30.0407 4.42773L16.1632 14.4277L2.28564 4.42773"
                                                                stroke="currentColor" stroke-width="3"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="text-item-end">
                                                    <p>Email</p>
                                                    <h6 class="font-title--card">
                                                        {{ $officeInfo->email }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="events-location-text mb-0">
                                            <div class="text-item">
                                                <div class="text-item-start">
                                                    <div class="icon-image phone-bg">
                                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M28.7992 22.3667V26.2205C28.8006 26.5783 28.7272 26.9324 28.5836 27.2602C28.44 27.588 28.2293 27.8823 27.9652 28.1242C27.701 28.366 27.3892 28.5502 27.0496 28.6648C26.71 28.7794 26.3502 28.822 25.9931 28.7898C22.0323 28.3602 18.2277 27.0095 14.8849 24.846C11.7749 22.8737 9.13821 20.2422 7.16198 17.1383C4.98665 13.7871 3.6329 9.9715 3.2104 6.00077C3.17823 5.64553 3.22053 5.2875 3.33461 4.94948C3.44869 4.61145 3.63204 4.30083 3.87299 4.0374C4.11394 3.77397 4.40721 3.56349 4.73413 3.41937C5.06105 3.27526 5.41446 3.20066 5.77185 3.20032H9.63333C10.258 3.19418 10.8636 3.41495 11.3372 3.82147C11.8109 4.22799 12.1202 4.79253 12.2077 5.40985C12.3706 6.64316 12.6729 7.85411 13.1087 9.01961C13.2818 9.4794 13.3193 9.9791 13.2167 10.4595C13.114 10.9399 12.8755 11.3809 12.5294 11.7301L10.8947 13.3616C12.7271 16.5777 15.3952 19.2405 18.6177 21.0693L20.2524 19.4378C20.6024 19.0924 21.0442 18.8544 21.5256 18.7519C22.0069 18.6495 22.5076 18.6869 22.9683 18.8597C24.1361 19.2946 25.3495 19.5963 26.5852 19.759C27.2105 19.847 27.7815 20.1613 28.1897 20.6421C28.5979 21.1229 28.8148 21.7367 28.7992 22.3667Z"
                                                                stroke="#00AF91" stroke-width="3" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="text-item-end">
                                                    <p>Phone</p>
                                                    <h6 class="font-title--card">
                                                        {{ $officeInfo->phone }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
                                <div class="row">
                                    @php
                                        $eventId = $event->id;
                                    @endphp
                                    <x-event.comments :comments="$comments" :total="$total" :eventId="$eventId" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="eventCard--wrapper">
                        <div class="cart">
                            <div class="cart__price">
                                <div class="current-price">
                                    @if ($event->event_type == 'Paid')
                                        <h3 class="font-title--sm">${{ $event->price }}</h3>
                                    @else
                                        <h3 class="font-title--sm">Free</h3>
                                    @endif

                                </div>
                            </div>
                            <div class="cart__checkout-process">
                                @if (auth()->check())
                                    @php
                                        $booked = $event->seatBooked($event->id);
                                    @endphp
                                    @if ($event->total_seat <= $event->booked_seat)
                                        <button class="button button-lg button--primary w-100 mb-2" disabled>No More
                                            Seats</button>
                                    @elseif ($booked)
                                        <button class="button button-lg button--primary w-100 mb-2">Already
                                            Booked</button>
                                    @else
                                        @auth
                                            <form action="{{ route('event.book', $event->slug) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="student_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                                <button type="submit" class="button button-lg button--primary w-100 mb-2">Book a
                                                    Seat</button>
                                            </form>
                                        @endauth
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" type="submit"
                                        class="button button-lg button--primary w-100 mb-2">Book a
                                        Seat</a>
                                    <div class="text-center">
                                        <p class="time-left text-center pb-3">You must <a
                                                href="{{ route('login') }}">login</a>
                                            before
                                            register event</p>
                                    </div>
                                @endif

                                <div class="cart__includes-info">
                                    <ul class="mb-0">
                                        <li>
                                            <p>Total Slot:</p>
                                            <p>{{ $event->total_seat }}</p>
                                        </li>
                                        <li>
                                            <p>Booked Slot:</p>
                                            <p>{{ $event->booked_seat }}</p>
                                        </li>
                                        <li class="border-0 mb-0 pb-0">
                                            <p>Remaining Slot:</p>
                                            <p>{{ $event->total_seat - $event->booked_seat }}</p>
                                        </li>
                                        <li class="d-none">
                                            <p class="font-title--card">Total:</p>
                                            <p class="total-price font-title--card">$36.49</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="cart__share-content pt-0">
                                <h6 class="font-title--card">Share This Events</h6>
                                <ul class="social-icons social-icons--outline">
                                    <li>
                                        <a href="{{ socialMediaShareLinks('/event/details/', $event->slug)['facebook'] }}"
                                            target="_blank">
                                            <svg width="9" height="18" viewBox="0 0 9 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.3575 2.98875H9.00075V0.12675C8.71725 0.08775 7.74225 0 6.60675 0C4.2375 0 2.6145 1.49025 2.6145 4.22925V6.75H0V9.9495H2.6145V18H5.82V9.95025H8.32875L8.727 6.75075H5.81925V4.5465C5.82 3.62175 6.069 2.98875 7.3575 2.98875Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ socialMediaShareLinks('/event/details/', $event->slug)['twitter'] }}"
                                            target="_blank">
                                            <svg width="18" height="15" viewBox="0 0 18 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18 1.73137C17.3306 2.025 16.6174 2.21962 15.8737 2.31412C16.6388 1.85737 17.2226 1.13962 17.4971 0.2745C16.7839 0.69975 15.9964 1.00013 15.1571 1.16775C14.4799 0.446625 13.5146 0 12.4616 0C10.4186 0 8.77387 1.65825 8.77387 3.69113C8.77387 3.98363 8.79862 4.26487 8.85938 4.53262C5.7915 4.383 3.07687 2.91263 1.25325 0.67275C0.934875 1.22513 0.748125 1.85738 0.748125 2.538C0.748125 3.816 1.40625 4.94887 2.38725 5.60475C1.79437 5.5935 1.21275 5.42138 0.72 5.15025C0.72 5.1615 0.72 5.17613 0.72 5.19075C0.72 6.984 1.99912 8.4735 3.6765 8.81662C3.37612 8.89875 3.04875 8.93812 2.709 8.93812C2.47275 8.93812 2.23425 8.92463 2.01038 8.87512C2.4885 10.3365 3.84525 11.4109 5.4585 11.4457C4.203 12.4279 2.60888 13.0196 0.883125 13.0196C0.5805 13.0196 0.29025 13.0061 0 12.969C1.63462 14.0231 3.57188 14.625 5.661 14.625C12.4515 14.625 16.164 9 16.164 4.12425C16.164 3.96112 16.1584 3.80363 16.1505 3.64725C16.8829 3.1275 17.4982 2.47837 18 1.73137Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ socialMediaShareLinks('/event/details/', $event->slug)['linkedin'] }}"
                                            target="_blank">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.9955 18.0002V17.9994H18V11.3979C18 8.16841 17.3047 5.68066 13.5292 5.68066C11.7142 5.68066 10.4962 6.67666 9.99896 7.62091H9.94646V5.98216H6.3667V17.9994H10.0942V12.0489C10.0942 10.4822 10.3912 8.96716 12.3315 8.96716C14.2432 8.96716 14.2717 10.7552 14.2717 12.1494V18.0002H17.9955Z"
                                                    fill="currentColor"></path>
                                                <path d="M0.296875 5.98291H4.02888V18.0002H0.296875V5.98291Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M2.1615 0C0.96825 0 0 0.96825 0 2.1615C0 3.35475 0.96825 4.34325 2.1615 4.34325C3.35475 4.34325 4.323 3.35475 4.323 2.1615C4.32225 0.96825 3.354 0 2.1615 0V0Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ socialMediaShareLinks('/event/details/', $event->slug)['whatsapp'] }}"
                                            target="_blank">

                                            <svg style="width: 22px" height="200pt" viewBox="-23 -21 682 682.66669"
                                                width="682pt" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="m544.386719 93.007812c-59.875-59.945312-139.503907-92.9726558-224.335938-93.007812-174.804687 0-317.070312 142.261719-317.140625 317.113281-.023437 55.894531 14.578125 110.457031 42.332032 158.550781l-44.992188 164.335938 168.121094-44.101562c46.324218 25.269531 98.476562 38.585937 151.550781 38.601562h.132813c174.785156 0 317.066406-142.273438 317.132812-317.132812.035156-84.742188-32.921875-164.417969-92.800781-224.359376zm-224.335938 487.933594h-.109375c-47.296875-.019531-93.683594-12.730468-134.160156-36.742187l-9.621094-5.714844-99.765625 26.171875 26.628907-97.269531-6.269532-9.972657c-26.386718-41.96875-40.320312-90.476562-40.296875-140.28125.054688-145.332031 118.304688-263.570312 263.699219-263.570312 70.40625.023438 136.589844 27.476562 186.355469 77.300781s77.15625 116.050781 77.132812 186.484375c-.0625 145.34375-118.304687 263.59375-263.59375 263.59375zm144.585938-197.417968c-7.921875-3.96875-46.882813-23.132813-54.148438-25.78125-7.257812-2.644532-12.546875-3.960938-17.824219 3.96875-5.285156 7.929687-20.46875 25.78125-25.09375 31.066406-4.625 5.289062-9.242187 5.953125-17.167968 1.984375-7.925782-3.964844-33.457032-12.335938-63.726563-39.332031-23.554687-21.011719-39.457031-46.960938-44.082031-54.890626-4.617188-7.9375-.039062-11.8125 3.476562-16.171874 8.578126-10.652344 17.167969-21.820313 19.808594-27.105469 2.644532-5.289063 1.320313-9.917969-.664062-13.882813-1.976563-3.964844-17.824219-42.96875-24.425782-58.839844-6.4375-15.445312-12.964843-13.359374-17.832031-13.601562-4.617187-.230469-9.902343-.277344-15.1875-.277344-5.28125 0-13.867187 1.980469-21.132812 9.917969-7.261719 7.933594-27.730469 27.101563-27.730469 66.105469s28.394531 76.683594 32.355469 81.972656c3.960937 5.289062 55.878906 85.328125 135.367187 119.648438 18.90625 8.171874 33.664063 13.042968 45.175782 16.695312 18.984374 6.03125 36.253906 5.179688 49.910156 3.140625 15.226562-2.277344 46.878906-19.171875 53.488281-37.679687 6.601563-18.511719 6.601563-34.375 4.617187-37.683594-1.976562-3.304688-7.261718-5.285156-15.183593-9.253906zm0 0"
                                                    fill-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ socialMediaShareLinks('/event/details/', $event->slug)['gmail'] }}"
                                            target="_blank">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                                stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                class="css-i6dzq1">
                                                <path
                                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                </path>
                                                <polyline points="22,6 12,13 2,6"></polyline>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Info Ends Here -->

    <!--  Latest Events Featured Starts Here -->
    @if (count($comingEvents))
        <section class="section section--bg-offwhite-five">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <h2 class="font-title--md">Similar Events</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 position-relative px-0 mx-0">
                        <div class="similar-events">
                            @foreach ($comingEvents as $comingEvent)

                                <div class="contentCard contentCard--event contentCard--space">
                                    <div class="contentCard-top">
                                        <a href="{{ route('event.details', $comingEvent->slug) }}"><img
                                                src="{{ asset($comingEvent->thumbnail) }}" alt="images"
                                                class="img-fluid" /></a>
                                    </div>
                                    <div class="contentCard-bottom">
                                        <h5>
                                            <a href="{{ route('event.details', $comingEvent->slug) }}"
                                                class="font-title--card">{{ $comingEvent->title }}</a>
                                        </h5>
                                        <div class="contentCard-more d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="icon">
                                                    <img src="{{ asset('frontend') }}/dist/images/icon/location.png"
                                                        alt="location">
                                                </div>
                                                <span>{{ $comingEvent->city }}, {{ $comingEvent->country }}</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="icon">
                                                    <img src="{{ asset('frontend') }}/dist/images/icon/calendar.png"
                                                        alt="calendar">
                                                </div>
                                                <span>{{ date('j M, Y', strtotime($comingEvent->date)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="section__overlay">
                <span class="section__overlay--01">
                    <img src="{{ asset('frontend') }}/dist/images/shape/dots/dots-img-13.png" alt="overlay shapes" />
                </span>
                <span class="section__overlay--02">
                    <img src="{{ asset('frontend') }}/dist/images/shape/circle1.png" alt="overlay shapes" />
                </span>
            </div>
        </section>
    @endif
@endsection

@section('style')
<style>
    .event-info-main .image {
        margin-top: 0px;
        margin-bottom: 0px;
    }

</style>
@endsection
