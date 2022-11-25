<div class="courseCard--wrapper">
    <div class="cart">
        @if ($courseDetails->course_type == 'Paid')
            @if ($courseDetails->discount_price)
                <div class="cart__price">
                    <div class="current-price">
                        <h3 class="font-title--sm">${{ $courseDetails->discount_price }}</h3>
                        <p><del>${{ $courseDetails->price }}</del></p>
                    </div>
                    <div class="current-discount">
                        <p class="font-para--md">
                            {{ number_format((($courseDetails->price - $courseDetails->discount_price) / $courseDetails->price) * 100, 0) }}%
                            Off</p>
                    </div>
                </div>
            @else
                <div class="cart__price">
                    <div class="current-price">
                        <h3 class="font-title--sm">${{ $courseDetails->price }}</h3>
                    </div>

                </div>
            @endif

            @php
                $cartExist = $courseDetails->cartAlreadyExists($courseDetails->id);
            @endphp

            <div class="cart__checkout-process">
                @if ($cartExist)
                    <a href="{{ route('carts') }}" class="button button-lg button--primary-outline mt-3 w-100">View
                        Cart</a>
                @else
                    <form action="{{ route('cart.add', $courseDetails->id) }}" method="POST">
                        @csrf

                        <button type="submit" class="button button-lg button--primary-outline mt-3 w-100">Add
                            to Cart</button>
                    </form>
                @endif

                @if (!$cartExist)
                    <form action="{{ route('course.buy', $courseDetails->id) }}" method="post">
                        @csrf
                        <button type="submit" class="button button-lg button--primary-outline mt-3 w-100">Buy
                            Now</button>
                    </form>
                @endif
            </div>
        @else
            <div class="cart__price">
                <div class="current-price">
                    <h3 class="font-title--sm">Free</h3>
                </div>
            </div>
            <div class="cart__checkout-process">
                @if (auth()->check())
                    @php
                        $enrolled = $courseDetails->courseEnrolled($courseDetails->id);
                    @endphp

                    @if ($enrolled)
                        <button class="button button-lg button--primary-outline mt-3 w-100">Already
                            Enrolled</button>
                    @else
                        @auth
                            <form action="{{ route('course.enroll') }}" method="POST">
                                @csrf
                                <input name="student_id" type="hidden" value="{{ auth()->user()->id }}">
                                <input name="course_id" type="hidden" value="{{ $courseDetails->id }}">
                                <button type="submit" class="button button-lg button--primary-outline mt-3 w-100">Enroll
                                    Now</button>
                            </form>
                        @endauth
                    @endif
                @else
                    <a href="{{ route('login') }}" class="button button-lg button--primary-outline mt-3 w-100">Enroll
                        Now</a>
                @endif
            </div>
        @endif

        <div class="cart__includes-info">
            <h6 class="font-title--card">This Course Includes:</h6>
            <ul>
                <li>
                    <span><img src="{{ asset('frontend') }}/dist/images/icon/dollar.png" alt="dollar"></span>
                    <p class="font-para--md">Full Lifetime Access</p>
                </li>
                <li>
                    <span><img src="{{ asset('frontend') }}/dist/images/icon/clock-2.png" alt="clock"></span>
                    <p class="font-para--md">30 Days Money Back Guarantee</p>
                </li>
                <li>
                    <span><img src="{{ asset('frontend') }}/dist/images/icon/paper-plus.png" alt="paper-plus"></span>
                    <p class="font-para--md">Free Exercises File</p>
                </li>
                <li>
                    <span><img src="{{ asset('frontend') }}/dist/images/icon/airplay.png" alt="airplay"></span>
                    <p class="font-para--md">Access on Mobile , Tablet and TV</p>
                </li>
                <li>
                    <span><img src="{{ asset('frontend') }}/dist/images/icon/clipboard.png" alt="clipboard"></span>
                    <p class="font-para--md">Certificate of Completion</p>
                </li>
            </ul>
        </div>

        <div class="cart__share-content">
            <h6 class="font-title--card">Share This Course</h6>
            <ul class="social-icons social-icons--outline">
                <li>
                    <a href="{{ socialMediaShareLinks('/course/details/', $courseDetails->slug)['facebook'] }}"
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
                    <a href="{{ socialMediaShareLinks('/course/details/', $courseDetails->slug)['twitter'] }}"
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
                    <a href="{{ socialMediaShareLinks('/course/details/', $courseDetails->slug)['linkedin'] }}"
                        target="_blank">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.9955 18.0002V17.9994H18V11.3979C18 8.16841 17.3047 5.68066 13.5292 5.68066C11.7142 5.68066 10.4962 6.67666 9.99896 7.62091H9.94646V5.98216H6.3667V17.9994H10.0942V12.0489C10.0942 10.4822 10.3912 8.96716 12.3315 8.96716C14.2432 8.96716 14.2717 10.7552 14.2717 12.1494V18.0002H17.9955Z"
                                fill="currentColor"></path>
                            <path d="M0.296875 5.98291H4.02888V18.0002H0.296875V5.98291Z" fill="currentColor"></path>
                            <path
                                d="M2.1615 0C0.96825 0 0 0.96825 0 2.1615C0 3.35475 0.96825 4.34325 2.1615 4.34325C3.35475 4.34325 4.323 3.35475 4.323 2.1615C4.32225 0.96825 3.354 0 2.1615 0V0Z"
                                fill="currentColor"></path>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="{{ socialMediaShareLinks('/course/details/', $courseDetails->slug)['whatsapp'] }}"
                        target="_blank">

                        <svg style="width: 22px" height="200pt" viewBox="-23 -21 682 682.66669" width="682pt"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m544.386719 93.007812c-59.875-59.945312-139.503907-92.9726558-224.335938-93.007812-174.804687 0-317.070312 142.261719-317.140625 317.113281-.023437 55.894531 14.578125 110.457031 42.332032 158.550781l-44.992188 164.335938 168.121094-44.101562c46.324218 25.269531 98.476562 38.585937 151.550781 38.601562h.132813c174.785156 0 317.066406-142.273438 317.132812-317.132812.035156-84.742188-32.921875-164.417969-92.800781-224.359376zm-224.335938 487.933594h-.109375c-47.296875-.019531-93.683594-12.730468-134.160156-36.742187l-9.621094-5.714844-99.765625 26.171875 26.628907-97.269531-6.269532-9.972657c-26.386718-41.96875-40.320312-90.476562-40.296875-140.28125.054688-145.332031 118.304688-263.570312 263.699219-263.570312 70.40625.023438 136.589844 27.476562 186.355469 77.300781s77.15625 116.050781 77.132812 186.484375c-.0625 145.34375-118.304687 263.59375-263.59375 263.59375zm144.585938-197.417968c-7.921875-3.96875-46.882813-23.132813-54.148438-25.78125-7.257812-2.644532-12.546875-3.960938-17.824219 3.96875-5.285156 7.929687-20.46875 25.78125-25.09375 31.066406-4.625 5.289062-9.242187 5.953125-17.167968 1.984375-7.925782-3.964844-33.457032-12.335938-63.726563-39.332031-23.554687-21.011719-39.457031-46.960938-44.082031-54.890626-4.617188-7.9375-.039062-11.8125 3.476562-16.171874 8.578126-10.652344 17.167969-21.820313 19.808594-27.105469 2.644532-5.289063 1.320313-9.917969-.664062-13.882813-1.976563-3.964844-17.824219-42.96875-24.425782-58.839844-6.4375-15.445312-12.964843-13.359374-17.832031-13.601562-4.617187-.230469-9.902343-.277344-15.1875-.277344-5.28125 0-13.867187 1.980469-21.132812 9.917969-7.261719 7.933594-27.730469 27.101563-27.730469 66.105469s28.394531 76.683594 32.355469 81.972656c3.960937 5.289062 55.878906 85.328125 135.367187 119.648438 18.90625 8.171874 33.664063 13.042968 45.175782 16.695312 18.984374 6.03125 36.253906 5.179688 49.910156 3.140625 15.226562-2.277344 46.878906-19.171875 53.488281-37.679687 6.601563-18.511719 6.601563-34.375 4.617187-37.683594-1.976562-3.304688-7.261718-5.285156-15.183593-9.253906zm0 0"
                                fill-rule="evenodd" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="{{ socialMediaShareLinks('/course/details/', $courseDetails->slug)['gmail'] }}"
                        target="_blank">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                            stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            class="css-i6dzq1">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                            </path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
