@extends('layouts.admin')
@section('title','Chat | Admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Contact List</h3>
                    </div>
                    <div class="card-body">
                        @livewire('message-component')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

