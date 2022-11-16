@extends('layouts.admin')
@section('title') Stripe Settings @endsection
@section('breadcrumbs')
<div class="row mb-2 mt-4">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Payment Settings</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Payment Settings</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">Stripe Settings</h3>
                </div>
                <div class="row pt-3 pb-4">
                    <div class="col-md-6 offset-md-3">
                        <form class="form-horizontal" action="{{ route('admin.stripesetting') }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Secret Key</label>
                                <div class="col-sm-9">
                                    <input value="{{ env("STRIPE_KEY") }}" name="sk" type="text" class="form-control @error('sk') is-invalid @enderror" required autocomplete="off">
                                    @error('sk') <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Publisher Key</label>
                                <div class="col-sm-9">
                                    <input value="{{ env('STRIPE_SECRET') }}" name="pk" type="text" class="form-control @error('pk') is-invalid @enderror" required autocomplete="off">
                                    @error('pk') <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i> Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">RazorPay Settings</h3>
                </div>
                <div class="row pt-3 pb-4">
                    <div class="col-md-6 offset-md-3">
                        <form class="form-horizontal" action="{{ route('admin.razorpaysetting') }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Secret Key</label>
                                <div class="col-sm-9">
                                    <input value="{{ env("RAZORPAY_KEY") }}" name="sk" type="text" class="form-control @error('sk') is-invalid @enderror" required autocomplete="off">
                                    @error('sk') <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Publisher Key</label>
                                <div class="col-sm-9">
                                    <input value="{{ env('RAZORPAY_SECRET') }}" name="pk" type="text" class="form-control @error('pk') is-invalid @enderror" required autocomplete="off">
                                    @error('pk') <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i> Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

