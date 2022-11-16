@extends('layouts.website')

@section('title') Events - {{ env('APP_NAME') }} @endsection

@section('body-style') style='background-color: #ebebf2;' @stop

@section('content')
    <!-- Breadcrumb Starts Here -->
    <div class="event-sub-section eventsearch-sub-section">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb align-items-center bg-transparent p-0 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}" class="fs-6 text-secondary">Home</a></li>
                    <li class="breadcrumb-item fs-6 text-secondary" aria-current="page">Events</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Ends Here -->

    <!-- Event Search Starts Here -->
    <section class="event-search">
        <form action="{{ route('event') }}" method="GET" id="event_filtering">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <div class="event-search-bar">
                            <div class="form-input-group">
                                <input type="text" value="{{ $filter_search }}" class="form-control" placeholder="Search"
                                    name="search" />
                                <button class="btn btn-primary text-uppercase" type="submit"
                                    id="button-addon2">Search</button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 order-2 order-lg-0">

                        <div class="event-search-wizard" id="level">
                            <div class="event-search-wizard-header">
                                <h6>Level</h6>
                                <button style="border: 0; background: transparent;" onclick="accordion('level',this);">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.16658 12.917L9.99992 7.08366L15.8333 12.917" stroke="#42414B"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                            <div class="event-search-wizard-body">
                                <div class="event-search-wizard-item">
                                    <div class="event-search-wizard-item-start">
                                        <form action="#">
                                            <input class="checkbox-primary" type="checkbox" id="all2" />
                                            <label for="all2">All</label>
                                        </form>
                                    </div>
                                    <div class="event-search-wizard-item-end">
                                        <p>1,54,750</p>
                                    </div>
                                </div>
                                <div class="event-search-wizard-item">
                                    <div class="event-search-wizard-item-start">
                                        <form action="#">
                                            <input class="checkbox-primary" type="checkbox" id="beginner" />
                                            <label for="beginner">Beginner</label>
                                        </form>
                                    </div>
                                    <div class="event-search-wizard-item-end">
                                        <p>45,770</p>
                                    </div>
                                </div>
                                <div class="event-search-wizard-item">
                                    <div class="event-search-wizard-item-start">
                                        <form action="#">
                                            <input class="checkbox-primary" type="checkbox" id="intermediate" />
                                            <label for="intermediate">Intermediate</label>
                                        </form>
                                    </div>
                                    <div class="event-search-wizard-item-end">
                                        <p>35,790</p>
                                    </div>
                                </div>
                                <div class="event-search-wizard-item">
                                    <div class="event-search-wizard-item-start">
                                        <form action="#">
                                            <input class="checkbox-primary" type="checkbox" id="advanced" />
                                            <label for="advanced">Advanced</label>
                                        </form>
                                    </div>
                                    <div class="event-search-wizard-item-end">
                                        <p>5,770</p>
                                    </div>
                                </div>
                                <div class="event-search-wizard-item">
                                    <div class="event-search-wizard-item-start">
                                        <form action="#">
                                            <input class="checkbox-primary" type="checkbox" id="eexpert" />
                                            <label for="eexpert">Expert</label>
                                        </form>
                                    </div>
                                    <div class="event-search-wizard-item-end">
                                        <p>765</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="event-search-wizard" id="price">
                            <div class="event-search-wizard-header">
                                <h6>Price</h6>
                                <button style="border: 0; background: transparent;" onclick="accordion('price',this);">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.16658 12.917L9.99992 7.08366L15.8333 12.917" stroke="#42414B"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                            <div class="event-search-wizard-body">
                                <div class="event-search-wizard-item price-range">
                                    <div class="event-search-wizard-item-start">
                                        <div class="price-range-block">
                                            <form class="d-flex price-range-block__inputWrapper" action="#">
                                                <input type="number" min="$0" max="5000"
                                                    oninput="validity.valid||(value='0');" id="min_price"
                                                    class="price-range-field"
                                                    style="width: 105px; height: 50px; border-radius: 4px; padding: 15px;" />
                                                <span>to</span>
                                                <input type="number" min="0" max="$5000"
                                                    oninput="validity.valid||(value='5000');" id="max_price"
                                                    class="price-range-field"
                                                    style="width: 125px; height: 50px; padding: 15px; border-radius: 4px;" />
                                                <button class="angle-btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-chevron-right">
                                                        <polyline points="9 18 15 12 9 6"></polyline>
                                                    </svg>
                                                </button>
                                            </form>
                                            <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="event-search-wizard" id="rating">
                            <div class="event-search-wizard-header">
                                <h6>Rating</h6>
                                <button style="border: 0; background: transparent;" onclick="accordion('rating',this);">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.16658 12.917L9.99992 7.08366L15.8333 12.917" stroke="#42414B"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                            <div class="event-search-wizard-body">
                                <div class="event-search-wizard-item">
                                    <div class="event-search-wizard-item-start">
                                        <form action="#">
                                            <input class="checkbox-primary" type="checkbox" id="all3" />
                                            <label for="all3">All</label>
                                        </form>
                                    </div>
                                    <div class="event-search-wizard-item-end">
                                        <p>1,54,750</p>
                                    </div>
                                </div>
                                <div class="event-search-wizard-item">
                                    <div class="event-search-wizard-item-start">
                                        <form action="#">
                                            <input class="checkbox-primary" type="checkbox" id="s1" />
                                            <label for="s1">1 Star and higher</label>
                                        </form>
                                    </div>
                                    <div class="event-search-wizard-item-end">
                                        <p>45,770</p>
                                    </div>
                                </div>
                                <div class="event-search-wizard-item">
                                    <div class="event-search-wizard-item-start">
                                        <form action="#">
                                            <input class="checkbox-primary" type="checkbox" id="s2" />
                                            <label for="s2">2 Star and higher</label>
                                        </form>
                                    </div>
                                    <div class="event-search-wizard-item-end">
                                        <p>35,790</p>
                                    </div>
                                </div>
                                <div class="event-search-wizard-item">
                                    <div class="event-search-wizard-item-start">
                                        <form action="#">
                                            <input class="checkbox-primary" type="checkbox" id="s3" />
                                            <label for="s3">3 Star and higher</label>
                                        </form>
                                    </div>
                                    <div class="event-search-wizard-item-end">
                                        <p>5,770</p>
                                    </div>
                                </div>
                                <div class="event-search-wizard-item">
                                    <div class="event-search-wizard-item-start">
                                        <form action="#">
                                            <input class="checkbox-primary" type="checkbox" id="s4" />
                                            <label for="s4">4 Star and higher</label>
                                        </form>
                                    </div>
                                    <div class="event-search-wizard-item-end">
                                        <p>765</p>
                                    </div>
                                </div>
                                <div class="event-search-wizard-item">
                                    <div class="event-search-wizard-item-start">
                                        <form action="#">
                                            <input class="checkbox-primary" type="checkbox" id="s5" />
                                            <label for="s5">5 Star</label>
                                        </form>
                                    </div>
                                    <div class="event-search-wizard-item-end">
                                        <p>75</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="event-search-wizard" id="duration">
                            <div class="event-search-wizard-header">
                                <h6>Duration</h6>
                                <button style="border: 0; background: transparent;" onclick="accordion('duration',this);">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.16658 12.917L9.99992 7.08366L15.8333 12.917" stroke="#42414B"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                            <div class="event-search-wizard-body">
                                <div class="event-search-wizard-item">
                                    <div class="event-search-wizard-item-start">
                                        <form action="#">
                                            <input class="checkbox-primary" type="checkbox" id="all3" />
                                            <label for="all3">All</label>
                                        </form>
                                    </div>
                                    <div class="event-search-wizard-item-end">
                                        <p>1,54,750</p>
                                    </div>
                                </div>
                                <div class="event-search-wizard-item">
                                    <div class="event-search-wizard-item-start">
                                        <form action="#">
                                            <input class="checkbox-primary" type="checkbox" id="s1" />
                                            <label for="s1">1 Star and higher</label>
                                        </form>
                                    </div>
                                    <div class="event-search-wizard-item-end">
                                        <p>45,770</p>
                                    </div>
                                </div>
                                <div class="event-search-wizard-item">
                                    <div class="event-search-wizard-item-start">
                                        <form action="#">
                                            <input class="checkbox-primary" type="checkbox" id="s2" />
                                            <label for="s2">2 Star and higher</label>
                                        </form>
                                    </div>
                                    <div class="event-search-wizard-item-end">
                                        <p>35,790</p>
                                    </div>
                                </div>
                                <div class="event-search-wizard-item">
                                    <div class="event-search-wizard-item-start">
                                        <form action="#">
                                            <input class="checkbox-primary" type="checkbox" id="s3" />
                                            <label for="s3">3 Star and higher</label>
                                        </form>
                                    </div>
                                    <div class="event-search-wizard-item-end">
                                        <p>5,770</p>
                                    </div>
                                </div>
                                <div class="event-search-wizard-item">
                                    <div class="event-search-wizard-item-start">
                                        <form action="#">
                                            <input class="checkbox-primary" type="checkbox" id="s4" />
                                            <label for="s4">4 Star and higher</label>
                                        </form>
                                    </div>
                                    <div class="event-search-wizard-item-end">
                                        <p>765</p>
                                    </div>
                                </div>
                                <div class="event-search-wizard-item">
                                    <div class="event-search-wizard-item-start">
                                        <form action="#">
                                            <input class="checkbox-primary" type="checkbox" id="s5" />
                                            <label for="s5">5 Star</label>
                                        </form>
                                    </div>
                                    <div class="event-search-wizard-item-end">
                                        <p>75</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                        $sorting = $filter_sorting;
                        $totalEvents = $events->total();
                    @endphp

                    <div class="col-lg-8 order-1 order-lg-0">
                        <div class="event-search-results">
                            <div class="event-search-results-heading">
                                <select onchange="$('#event_filtering').submit()" name="sorting">
                                    <option {{ $sorting == 'latest' ? 'selected' : '' }} value="latest">Latest</option>
                                    <option {{ $sorting == 'free' ? 'selected' : '' }} value="free">Free Course</option>
                                    <option {{ $sorting == 'low_to_high' ? 'selected' : '' }} value="low_to_high">Price
                                        (Low > High)</option>
                                    <option {{ $sorting == 'high_to_low' ? 'selected' : '' }} value="high_to_low">Price
                                        (High > Low)</option>
                                </select>

                                @if ($totalEvents > 1)
                                    <p>{{ $totalEvents }} results found.</p>
                                @else
                                    <p>{{ $totalEvents }} result found.</p>
                                @endif
                            </div>
                        </div>
                        <div class="row event-search-content">
                            @foreach ($events as $event)
                                <div class="col-lg-6 col-12 mb-3">
                                    <div class="event">
                                        <div class="event__img">
                                            <a href="{{ route('event.details', $event->slug) }}"><img
                                                    src="{{ asset($event->thumbnail) }}" alt="images"
                                                    class="img-fluid" /></a>
                                        </div>
                                        <div class="event__content">
                                            <div class="event__content_title">
                                                <h6><a
                                                        href="{{ route('event.details', $event->slug) }}">{{ $event->title }}</a>
                                                </h6>
                                            </div>
                                            <div
                                                class="event__content_detail d-flex justify-content-between align-items-center">
                                                <div class="loction d-flex align-items-center">
                                                    <div class="icon pe-2">
                                                        <svg width="16" height="18" viewBox="0 0 16 18" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M1.5 7.78252C1.5122 4.30097 4.43222 1.48821 8.02206 1.50004C11.6119 1.51187 14.5122 4.34381 14.5 7.82536V7.89675C14.4558 10.1599 13.1529 12.2517 11.5555 13.8865C10.6419 14.8066 9.62174 15.6211 8.51527 16.3139C8.21941 16.5621 7.78056 16.5621 7.48469 16.3139C5.83521 15.2726 4.3875 13.958 3.20781 12.4301C2.15637 11.0978 1.5594 9.48072 1.5 7.80394L1.5 7.78252Z"
                                                                stroke="#FF7A1A" stroke-width="1.7" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <ellipse cx="7.99974" cy="7.90394" rx="2.08323" ry="2.02039"
                                                                stroke="#FF7A1A" stroke-width="1.7" stroke-linecap="round"
                                                                stroke-linejoin="round"></ellipse>
                                                        </svg>
                                                    </div>
                                                    <span>{{ Str::words($event->country . ', ' . $event->city, 4, '...') }}</span>
                                                </div>
                                                <div class="date d-flex align-items-center">
                                                    <div class="icon pe-2">
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M14.25 3H3.75C2.92157 3 2.25 3.67157 2.25 4.5V15C2.25 15.8284 2.92157 16.5 3.75 16.5H14.25C15.0784 16.5 15.75 15.8284 15.75 15V4.5C15.75 3.67157 15.0784 3 14.25 3Z"
                                                                stroke="#00AF91" stroke-width="1.7" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path d="M12 1.5V4.5" stroke="#00AF91" stroke-width="1.7"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M6 1.5V4.5" stroke="#00AF91" stroke-width="1.7"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M2.25 7.5H15.75" stroke="#00AF91" stroke-width="1.7"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </div>
                                                    {{-- <span>{{ Carbon\Carbon::parse($event->date)->format('jS M, Y') }}</span> --}}
                                                    <span>{{ date('d M, Y', strtotime($event->date)) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="event-search-pagination pagination pb-0">
                            <div class="pagination-group">
                                {{ $events->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- Event Search Ends Here -->
@endsection
