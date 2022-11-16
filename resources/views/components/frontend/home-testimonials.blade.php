<section class="testimonial students-says mb-0 overflow-hidden">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5 col-lg-6">
                <div class="testimonial__img">
                    <img src="{{ asset('frontend') }}/dist/images/banner/2.png" alt="image" />
                    <div class="dot">
                        <img src="{{ asset('frontend') }}/dist/images/shape/5.png" alt="dot images" />
                    </div>
                    <div class="rectangle">
                        <img src="{{ asset('frontend') }}/dist/images/shape/rectangle.png" alt="rectangle" />
                    </div>
                    <div class="play-video">
                        <a class="popup-video play-button"
                            href="https://www.youtube.com/watch?v=3CvFz5j1Krk&ab_channel=SVFMusic">
                            <svg width="23" height="27" viewBox="0 0 23 27" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22.2159 15.9113C22.1179 16.0425 21.6605 16.6002 21.3011 16.9611L21.1051 17.158C18.3608 20.1434 11.5327 24.6379 8.0696 26.0814C8.0696 26.1142 6.01136 26.9672 5.03125 27H4.90057C3.39773 27 1.9929 26.147 1.27415 24.7691C0.882102 24.0146 0.522727 21.8165 0.490057 21.7837C0.196023 19.8153 0 16.8004 0 13.4836C0 10.0061 0.196023 6.85662 0.555398 4.92102C0.555398 4.88821 0.914773 3.11665 1.14347 2.52612C1.50284 1.67315 2.15625 0.951397 2.97301 0.492102C3.62642 0.164034 4.3125 0 5.03125 0C5.78267 0.0328068 7.1875 0.52819 7.7429 0.754557C11.402 2.19806 18.3935 6.92224 21.0724 9.80923C21.5298 10.2685 22.0199 10.8262 22.1506 10.9575C22.706 11.6792 23 12.565 23 13.5197C23 14.3694 22.7386 15.2224 22.2159 15.9113Z"
                                    fill="#1089FF" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6">
                <div class="testimonial__wrapper overflow-hidden">
                    <div class="testimonial__wrapper_title">
                        <h3>What Our Students Says</h3>
                    </div>
                    <div class="testimonial__active">
                        @foreach ($reviews as $review)
                            <div class="testimonial__wrapper_item">
                                <p>
                                    “{{ $review->comment }}“
                                </p>
                                <div class="testimonial__wrapper_item-author">
                                    <div class="author d-flex align-items-center justify-content-between">
                                        <div class="author__img">
                                            <img src="{{ asset($review->student_reviews->image ?? '') }}"
                                                alt="images" />
                                        </div>
                                        <div class="author__name">
                                            <h6>{{ $review->student_reviews->firstname ?? '' }}
                                                {{ $review->student_reviews->lastname ?? '' }}</h6>
                                            <span>{{ $review->student_reviews->profession ?? '' }}</span>
                                        </div>
                                    </div>
                                    <div class="review">
                                        <ul class="d-flex align-items-center">
                                            @switch($review->stars)
                                                @case(1)
                                                    @include('components.Stars.full')
                                                @break
                                                @case(2)
                                                    @for ($i = 0; $i < 2; $i++)
                                                        @include('components.Stars.full')
                                                    @endfor
                                                @break
                                                @case(3) @for ($i = 0; $i < 3; $i++)
                                                    @include('components.Stars.full') @endfor

                                                @break
                                                @case(4)
                                                    @for ($i = 0; $i < 4; $i++)
                                                        @include('components.Stars.full')
                                                    @endfor
                                                @break
                                                @case(5)
                                                    @for ($i = 0; $i < 5; $i++)
                                                        @include('components.Stars.full')
                                                    @endfor
                                                @break
                                            @endswitch
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="slider-arrows">
                        <div class="prev-arrow">
                            <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 7H1" stroke="#35343E" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M7 13L1 7L7 1" stroke="#35343E" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="next-arrow">
                            <svg width="20" height="14" viewBox="0 0 20 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 7L19 7" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M13 0.999999L19 7L13 13" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
