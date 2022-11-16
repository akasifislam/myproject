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
    @php
    $sorting = $filter_sorting;
    @endphp
    <!-- Event Search Starts Here -->
    <form action="{{ route('event') }}" method="GET" id="event_filtering">
        <section class="section event-search">
            <div class="container">

                {{-- search-filter --}}
                <x-event.search-filter :filterSearch="$filter_search" />

                <div class="row">
                    <div class="col-lg-4 d-none d-lg-block">

                        {{-- category-sorting --}}
                        <x-event.category-sorting :categories="$categories" :allEvents="$allEvents" />
                    </div>

                    <div class="col-lg-8">
                        <div class="event-search-results">
                            <div class="event-search-results-heading">

                                {{-- filtering --}}
                                <select onchange="$('#event_filtering').submit()" name="sorting">
                                    <option {{ $sorting == 'latest' ? 'selected' : '' }} value="latest">Latest</option>
                                    <option {{ $sorting == 'free' ? 'selected' : '' }} value="free">Free Events</option>
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
                                <button type="button"
                                    class="button button-lg button--primary button--primary-filter d-lg-none" id="filter">
                                    <span>
                                        <svg width="19" height="16" viewBox="0 0 19 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.3335 14.9999V9.55554" stroke="white" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M3.3335 6.4444V1" stroke="white" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M9.55469 14.9999V8" stroke="white" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M9.55469 4.88886V1" stroke="white" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M15.7773 14.9999V11.1111" stroke="white" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M15.7773 7.99995V1" stroke="white" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M1 9.55554H5.66663" stroke="white" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M7.22217 4.88867H11.8888" stroke="white" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M13.4443 11.1111H18.111" stroke="white" stroke-width="1.7"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                    Filter
                                </button>
                            </div>
                        </div>

                        <div class="row event-search-content">
                            @forelse ($events as $event)
                                <div class="col-sm-6 mb-4">
                                    {{-- single event --}}
                                    <x-event.single-event :event="$event" />
                                </div>
                            @empty
                                Nothing found
                            @endforelse
                        </div>

                        @if ($dataPaginate)
                            {{-- course pagination --}}
                            <x-event.pagination :events="$events" />
                        @endif
                    </div>
                </div>
            </div>
            <input id="categoryWiseSorting" name="category" type="hidden"
                value="{{ $filterCategory ? $filterCategory : '' }}">
        </section>
        <!-- Event Search Ends Here -->
        <div class="filter-sidebar active">
            <div class="filter-sidebar__top">
                <button type="button" class="filter--cross">
                    <svg width="20" height="19" viewBox="0 0 20 19" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.5967 4.59668L5.40429 13.7891" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M5.40332 4.59668L14.5957 13.7891" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>

            <div class="filter-sidebar__wrapper">
                <x-event.category-sorting :categories="$categories" :allEvents="$allEvents" />
            </div>
            <button class="button button-lg button--primary button--primary-filter w-100 d-lg-none" type="submit">
                <span>
                    <svg width="19" height="16" viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.3335 14.9999V9.55554" stroke="white" stroke-width="1.7" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M3.3335 6.4444V1" stroke="white" stroke-width="1.7" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M9.55469 14.9999V8" stroke="white" stroke-width="1.7" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M9.55469 4.88886V1" stroke="white" stroke-width="1.7" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M15.7773 14.9999V11.1111" stroke="white" stroke-width="1.7" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M15.7773 7.99995V1" stroke="white" stroke-width="1.7" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M1 9.55554H5.66663" stroke="white" stroke-width="1.7" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M7.22217 4.88867H11.8888" stroke="white" stroke-width="1.7" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M13.4443 11.1111H18.111" stroke="white" stroke-width="1.7" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                </span>
                Apply
            </button>
        </div>
    </form>

@endsection

@section('script')
<script>
    function toggle(id, el) {
        const wizard = document.getElementById(id);
        console.log(wizard);
        wizard.classList.toggle("active");
    }
    const filterBtn = document.querySelector("#filter");
    const cross = document.querySelector(".filter--cross");
    filterBtn.addEventListener("click", function() {
        let sidebar = document.querySelector(".filter-sidebar");
        sidebar.classList.toggle("active");
    });
    cross.addEventListener("click", function() {
        let sidebar = document.querySelector(".filter-sidebar");
        sidebar.classList.remove("active");
    });

    function eventPageRedirect() {
        window.location.href = '{{ route('event') }}';
    }

    function categoryEventtSorting(categorySlug) {
        $('#categoryWiseSorting').val(categorySlug)
        $('#event_filtering').submit()
    }
</script>
@endsection
