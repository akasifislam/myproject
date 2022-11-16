ok
@extends('layouts.admin')
@section('title') Student Details @endsection

@section('content')
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center">
                                        <div class="m-b-25"> <img width="200px" height="200px" src="{{ asset($student->image) }}" class="img-radius" alt="User-Profile-Image"> </div>
                                        <h5>{{ $student->firstname.' '.$student->lastname }}</h5>
                                        <h6>{{ $student->profession }}</h6>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block pt-5">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                        <div class="row">
                                            <div class="col-sm-6 m-b-10">
                                                <p class="m-b-0 f-w-600">Email</p>
                                                <h6 class="text-muted f-w-400">{{ $student->email ? $student->email : 'Nothing found!' }}</h6>
                                            </div>
                                            <div class="col-sm-6 m-b-10">
                                                <p class="m-b-0 f-w-600">Phone</p>
                                                <h6 class="text-muted f-w-400">{{ $student->phone ? $student->phone : 'Nothing found!' }}</h6>
                                            </div>
                                            <div class="col-sm-6 m-b-10">
                                                <p class="m-b-0 f-w-600"> Nationality</p>
                                                <h6 class="text-muted f-w-400">{{ $student->nationality ? $student->nationality : 'Nothing found!' }}</h6>
                                            </div>
                                            <div class="col-sm-6 m-b-10">
                                                <p class="m-b-0 f-w-600"> Joined</p>
                                                <h6 class="text-muted f-w-400">{{ $student->created_at->format('d M, Y') }}</h6>
                                            </div>

                                            <div class="col-sm-12">
                                                <hr>
                                                <p class="m-b-0 f-w-600"> About</p>
                                                <p>{!! $student->about ? $student->about : 'Nothing found!' !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
<style>
    body {
        background-color: #f9f9fa
    }

    .padding {
        padding-top: 5rem !important
    }

    .user-card-full {
        overflow: hidden
    }

    .card {
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        border: none;
        margin-bottom: 30px
    }

    .m-r-0 {
        margin-right: 0px
    }

    .m-l-0 {
        margin-left: 0px
    }

    .user-card-full .user-profile {
        border-radius: 5px 0 0 5px
    }
    .user-profile {
        padding: 20px 0
    }

    .card-block {
        padding: 1.25rem
    }

    .m-b-25 {
        margin-bottom: 15px
    }

    .img-radius {
        border-radius: 5px
    }

    h6 {
        font-size: 14px
    }

    .card .card-block p {
        line-height: 25px
    }

    @media only screen and (min-width: 1400px) {
        p {
            font-size: 14px
        }
    }

    .card-block {
        padding: 1.25rem
    }

    .b-b-default {
        border-bottom: 1px solid #e0e0e0
    }
    .m-b-0{
        margin-bottom: 0;
    }

    .m-b-20 {
        margin-bottom: 20px
    }

    .p-b-5 {
        padding-bottom: 5px !important
    }

    .card .card-block p {
        line-height: 25px
    }

    .m-b-10 {
        margin-bottom: 10px
    }

    .text-muted {
        color: #919aa3 !important
    }

    .b-b-default {
        border-bottom: 1px solid #e0e0e0
    }

    .f-w-600 {
        font-weight: 600
    }

    .m-b-20 {
        margin-bottom: 20px
    }

    .m-t-40 {
        margin-top: 20px
    }

    .p-b-5 {
        padding-bottom: 5px !important
    }

    .m-b-10 {
        margin-bottom: 10px
    }

    .m-t-40 {
        margin-top: 20px
    }

    .user-card-full .social-link li {
        display: inline-block
    }

    .user-card-full .social-link li a {
        font-size: 20px;
        margin: 0 10px 0 0;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out
    }
</style>
@endsection
