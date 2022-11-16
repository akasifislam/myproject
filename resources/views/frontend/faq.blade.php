@extends('layouts.website')

@section('title') FAQ - {{ env('APP_NAME') }} @endsection
@section('body-style') style="background-color: #ebebf2;" @endsection
@section('header-style') class="nav-shadow" @endsection

@section('content')
    <!-- Breadcrumb Starts Here -->
    <section class="py-0">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 align-items-center">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}" class="fs-6 text-secondary">Home</a></li>
                    <li class="breadcrumb-item fs-6 text-secondary" aria-current="page">FAQs</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- Breadcrumb Ends Here -->

    <!-- FAQ Area Starts Here -->
    <section class="section faq-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="accordion" id="accordionExample">
                        @foreach ($faqs as $faq)
                            @if ($loop->first)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="true" aria-controls="collapse{{ $faq->id }}">
                                            {{ $faq->name }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse show" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                {!! $faq->description !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                            {{ $faq->name }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                {!! $faq->description !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ Area Ends Here -->
@endsection

@section('style')
<style>
    .accordion-button::after {
        background-image: url("{{ URL::asset('frontend/dist/images/shape/plus.svg') }}") !important;
        background-size: 15px !important;
    }

    .accordion-button:not(.collapsed)::after {

        background-image: url("{{ URL::asset('frontend/dist/images/shape/cross.svg') }}")  !important;
        background-size: 22px !important;
    }
</style>
@endsection

@section('script')
<script src="{{ asset('frontend/dist/main.js') }}"></script>
@endsection
