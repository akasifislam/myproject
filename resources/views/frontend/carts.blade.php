@extends('layouts.website')

@section('title') Carts @endsection

@section('body-style') style='background-color: #ebebf2;' @stop

@section('content')

    <!-- Breadcrumb Starts Here -->
    <div class="py-0">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb align-items-center bg-transparent mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}" class="fs-6 text-secondary">Home</a></li>
                    <li class="breadcrumb-item active">Carts
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Ends Here -->

    <!-- Cart Section Starts Here -->
    <section class="section cart-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    @if ($carts->count() > 1)
                        <h6 class="font-title--card mb-2">{{ $carts->count() }} Courses in Cart</h6>
                    @else
                        <h6 class="font-title--card mb-2">{{ $carts->count() }} Course in Cart</h6>
                    @endif
                    @forelse ($carts as $cart)

                        <div class="cart-wizard-area d-flex">
                            <div class="image">
                                <a href="#">
                                    <img src="{{ asset($cart->attributes->image) }}" alt="product">
                                </a>
                            </div>
                            <div class="text">
                                <h6 class="font-title--card"><a href="#">{{ $cart->name }}</a></h6>
                                <div class="bottom-wizard d-flex justify-content-between align-items-center">
                                    @if ($cart->associatedModel->discount_price)
                                        <p>
                                            ${{ $cart->associatedModel->discount_price }}
                                            <span><del>${{ $cart->associatedModel->price }}</del></span>
                                        </p>
                                    @else
                                        <p>
                                            ${{ $cart->associatedModel->price }}
                                        </p>
                                    @endif
                                    <div class="trash-icon">
                                        <form action="{{ route('cart.remove', $cart->id) }}" method="POST"
                                            id="cart_remove_form">
                                            @csrf
                                            <a role="button" onclick="$('#cart_remove_form').submit()">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 4.2002H3.6H16.4" stroke="#666575" stroke-width="1.4"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path
                                                        d="M6.00059 4.2V2.6C6.00059 2.17565 6.16916 1.76869 6.46922 1.46863C6.76927 1.16857 7.17624 1 7.60059 1H10.8006C11.2249 1 11.6319 1.16857 11.932 1.46863C12.232 1.76869 12.4006 2.17565 12.4006 2.6V4.2M14.8006 4.2V15.4C14.8006 15.8243 14.632 16.2313 14.332 16.5314C14.0319 16.8314 13.6249 17 13.2006 17H5.20059C4.77624 17 4.36927 16.8314 4.06922 16.5314C3.76916 16.2313 3.60059 15.8243 3.60059 15.4V4.2H14.8006Z"
                                                        stroke="#666575" stroke-width="1.4" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M7.60059 8.2002V13.0002" stroke="#666575" stroke-width="1.4"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M10.8018 8.2002V13.0002" stroke="#666575" stroke-width="1.4"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        No cart found
                    @endforelse
                </div>
                @php
                    $subTotal = Cart::getSubTotal();
                    $total = Cart::getTotal();
                @endphp
                <div class="col-lg-5">
                    <h6 class="font-title--card mb-2">Summery</h6>
                    <div class="summery-wizard">
                        <div class="summery-wizard-text pt-0">
                            <h6>Subtotal</h6>
                            <p>${{ $subTotal }}</p>
                        </div>
                        @if (session('discount'))
                            <div class="summery-wizard-text">
                                <h6>Coupon Discount</h6>
                                @if (session('percent'))
                                    <p>{{ session('percent') }}% OFF</p>
                                @elseif(session('numeric'))
                                    <p>${{ session('discount') }} OFF</p>
                                @endif
                            </div>
                        @endif
                        <div class="total-wizard">
                            <h6>Total:</h6>
                            @if (session('discount'))
                                <p>${{ $total - session('discount') }}</p>
                            @else
                                <p>${{ $total }}</p>
                            @endif
                        </div>
                        @auth
                            @if ($carts->count())
                                <a href="{{ route('checkout', time()) }}"
                                    class="button button-lg button--primary form-control mb-lg-3">Checkout</a>
                            @endif
                        @endauth

                        @guest
                            @if ($carts->count())
                                <a href="{{ route('login') }}"
                                    class="button button-lg button--primary form-control mb-lg-3">Checkout</a>
                            @endif
                        @endguest

                        @if (!session('discount') && $carts->count())
                            <form action="{{ route('coupon.code.apply') }}" method="POST">
                                @csrf
                                <label for="coupon">Apply Coupon</label>
                                <div class="cart-input">
                                    <input name="coupon_code" type="text" class="form-control" placeholder="Coupon Code"
                                        id="coupon" />
                                    <button type="submit" class="sm-button">Apply</button>
                                </div>
                                @error('coupon_code')<span class="invalid-feedback d-block"
                                    role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Section Ends Here -->
@stop
