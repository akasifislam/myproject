<div class="row">
    @forelse ($orders as $order)
        <div class="col-lg-12">
            <div class="purchase-area">
                <div class="purchase-area-close">
                    <a href="#">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 1L1 11" stroke="#F15C4C" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M1 1L11 11" stroke="#F15C4C" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
                <div class="d-flex align-items-lg-center align-items-start flex-column flex-lg-row">
                    <div class="purchase-area-items">
                        @foreach ($order->orderdetails as $item)
                            <div class="purchase-area-items-start d-flex align-items-lg-center flex-column flex-lg-row">
                                <div class="image overflow-hidden">
                                    <a href="{{ route('course.details', $item->course->slug) }}">
                                        <img src="{{ asset($item->course->thumbnail) }}" alt="Image" />
                                    </a>
                                </div>
                                @php
                                    $instructor = $item->course->instructor;
                                @endphp
                                <div class="text d-flex flex-column flex-lg-row">
                                    <div class="text-main">
                                        <h6>
                                            <a
                                                href="{{ route('course.details', $item->course->slug) }}">{{ Str::words($item->course->title, 3) }}</a>
                                        </h6>
                                        <p>By <a
                                                href="{{ route('instructor.profile', $instructor->slug) }}">{{ $instructor->firstname . ' ' . $instructor->lastname }}</a>
                                        </p>
                                    </div>
                                    <p>$87</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="purchase-area-items-end">
                        <p>{{ Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}
                        </p>
                        <dl class="row">
                            <dt class="col-sm-4">Total</dt>
                            <dd class="col-sm-8">${{ $order->total }}</dd>

                            <dt class="col-sm-4">Total Courses</dt>
                            <dd class="col-sm-8">
                                {{ $order->orderdetails->count() }}
                            </dd>

                            <dt class="col-sm-4">Payment Type</dt>
                            <dd class="col-sm-8">
                                {{ $order->payment_status }}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div>
            <h6 class="text-center mt-3 pt-3">
                Empty purchase history!
            </h6>
        </div>
    @endforelse
</div>
