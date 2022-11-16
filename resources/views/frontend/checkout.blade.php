@extends('layouts.website')

@section('title') Checkout - {{ env('APP_NAME') }} @endsection

@section('body-style') style='background-color: #ebebf2;' @stop

@section('content')
    @php
    $setting = App\Models\WebsiteSettings::websiteSetting();
    @endphp
    <!-- Breadcrumb Starts Here -->
    <section class="py-0">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 align-items-center">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}" class="fs-6 text-secondary">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('carts') }}" class="fs-6 text-secondary">Cart</a></li>
                    <li class="breadcrumb-item fs-6 text-secondary" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- Breadcrumb Ends Here -->

    <!-- Checkout Area Starts Here -->
    <section class="section checkout-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 checkout-area-checkout">
                    <h6 class="font-title--card mb-2">Checkout</h6>
                    <div class="checkout-tab">
                        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <div class="nav-link active" id="pills-checkout-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-checkout" role="tab" aria-controls="pills-checkout"
                                    aria-selected="true">
                                    <svg width="45" height="34" viewBox="0 0 45 34" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M39.5 2H5.75C3.67893 2 2 3.67893 2 5.75V28.25C2 30.3211 3.67893 32 5.75 32H39.5C41.5711 32 43.25 30.3211 43.25 28.25V5.75C43.25 3.67893 41.5711 2 39.5 2Z"
                                            stroke="#25252E" stroke-width="3" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M2 13.25H43.25" stroke="#25252E" stroke-width="3" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                    <h6>Stripe Payment</h6>
                                </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div class="nav-link" id="pills-paypal-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-paypal" role="tab" aria-controls="pills-paypal"
                                    aria-selected="false">
                                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M34.3645 9.87497C33.0578 8.24878 30.9754 7.17195 28.6375 6.87312C27.8964 2.35603 23.9347 0 20.1264 0H6.39971L0 29.25H8.51871L6.99634 36H17.9033L20.0834 27H23.538C26.5049 27 29.2062 26.121 31.3497 24.4579C33.572 22.7336 35.0861 20.2411 35.7285 17.2493C36.5225 13.5456 35.425 11.1949 34.3645 9.87497ZM3.49483 26.4375L8.66386 2.8125H20.1264C22.4738 2.8125 25.0369 4.07637 25.7528 6.82031H13.5775L9.15304 26.4375H3.49483ZM25.8469 9.63281C25.8118 9.91997 25.7669 10.1933 25.712 10.4513C24.7132 15.105 21.6598 17.3672 16.3772 17.3672H14.0823L15.8267 9.63281H25.8469ZM32.978 16.6594C31.9809 21.3029 28.3636 24.1875 23.5379 24.1875H17.8703L15.6903 33.1875H10.5142L13.448 20.1797H16.3772C19.5591 20.1797 22.2011 19.437 24.23 17.9724C26.3853 16.4164 27.8093 14.0844 28.4628 11.0392C28.5512 10.6243 28.6185 10.1835 28.6665 9.72176C30.1258 9.98269 31.3855 10.6581 32.1715 11.6364C33.158 12.8642 33.4294 14.5543 32.978 16.6594Z"
                                            fill="#908FA5"></path>
                                    </svg>
                                    <h6>RazorPay</h6>
                                </div>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-checkout" role="tabpanel"
                                aria-labelledby="pills-checkout-tab">
                                <form role="form" action="{{ route('stripe.payment.post') }}" method="post"
                                    class="require-validation" data-cc-on-file="false"
                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                    @csrf

                                    <div class='form-row row mb-3 '>
                                        <div class='col-xs-12 form-group required'>
                                            <label class='control-label'>Name on Card</label> <input class='form-control'
                                                size='4' type='text' value="test">
                                        </div>
                                    </div>

                                    <div class='form-row row mb-3 '>
                                        <div class='col-xs-12 form-group required'>
                                            <label class='control-label'>Card Number</label> <input autocomplete='off'
                                                class='form-control card-number' size='20' type='text'
                                                value="4242 4242 4242 4242">
                                        </div>
                                    </div>

                                    <div class='form-row row mb-3 '>
                                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                                            <label class='control-label'>CVC</label> <input autocomplete='off'
                                                class='form-control card-cvc' size='4' type='password' value="123">
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Month</label> <input
                                                class='form-control card-expiry-month' placeholder='MM' size='2' type='text'
                                                value="12">
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Year</label> <input
                                                class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                type='text' value="2022">
                                        </div>
                                    </div>
                                    <div class='form-row row'>
                                        <div class='col-md-12 error form-group hide'>
                                            <div class='alert-danger alert'>Please correct the errors and try
                                                again.</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button class="button button-lg button--primary w-100" type="submit">Order
                                                Place</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @php
                                $order_total = \Cart::getTotal();

                                if (session('discount')) {
                                    $order_total = $order_total - session('discount');
                                    $razor_paisa = round($order_total * 74 * 100, 0);
                                } else {
                                    $razor_paisa = round($order_total * 74 * 100, 0);
                                }
                            @endphp
                            <div class="tab-pane fade" id="pills-paypal" role="tabpanel" aria-labelledby="pills-paypal-tab">
                                <form action="{{ route('razorpay.payment.store') }}" method="POST">
                                    @csrf
                                    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}"
                                                                        data-amount="{{ $razor_paisa }}" data-buttontext="Click here to open RayzerPay"
                                                                        data-name="{{ env('APP_NAME') }}" data-description="Rozerpay"
                                                                        @if ($setting->header_logo && file_exists($setting->header_logo))
                                                                            data-image="{{ $setting->header_logo }}"
                                                                        @else
                                                                            data-image="{{ asset('backend/image/headerlogo.png') }}"
                                                                        @endif
                                                                        data-prefill.name="{{ auth()->user()->name }}"
                                                                        data-prefill.email="{{ auth()->user()->email }}" data-theme.color="#2980b9">
                                    </script>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="checkout-area-summery">
                        <h6 class="font-title--card mb-2">Summery</h6>

                        <div class="cart">
                            <div class="cart__includes-info cart__includes-info--bordertop-0">
                                <div class="productContent__wrapper">
                                    @foreach ($carts as $cart)
                                        <div class="productContent">
                                            <div class="productContent-item__img productContent-item">
                                                <img src="{{ asset($cart->attributes->image) }}" alt="Image">
                                            </div>
                                            <div class="productContent-item__info productContent-item">
                                                <h6 class="font-para--lg">
                                                    <a href="coursedetails.html">{{ $cart->name }}</a>
                                                </h6>

                                                <div class="price">
                                                    @if ($cart->associatedModel->discount_price)
                                                        <h6 class="font-para--md">
                                                            ${{ $cart->associatedModel->discount_price }}
                                                            <p><del>${{ $cart->associatedModel->price }}</del></p>
                                                        </h6>
                                                    @else
                                                        <h6 class="font-para--md">${{ $cart->associatedModel->price }}
                                                        </h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="cart__checkout-process">
                                <ul>
                                    <li>
                                        <p>Subtotal</p>
                                        <p>${{ $subTotal }}</p>
                                    </li>
                                    @if (session('discount'))
                                        <li>
                                            <p>Coupon Discount</p>
                                            @if (session('percent'))
                                                <p>{{ session('percent') }}% OFF</p>
                                            @elseif(session('numeric'))
                                                <p>${{ session('discount') }} OFF</p>
                                            @endif
                                        </li>
                                    @endif
                                    <li>
                                        <p class="font-title--card">Total:</p>
                                        @if (session('discount'))
                                            <p class="total-price font-title--card">${{ $total - session('discount') }}
                                            </p>
                                        @else
                                            <p class="total-price font-title--card">${{ $total }}</p>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout Area Ends Here -->
@endsection

@section('script')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });
    </script>
@endsection

@section('style')
    <style>
        .razorpay-payment-button {
            color: #fff;
            background-color: #0264ed;
            -webkit-box-shadow: 0px 10px 20px 0px #0264ed40;
            box-shadow: 0px 10px 20px 0px #0264ed40;
            width: 100%;
        }

    </style>
@endsection
