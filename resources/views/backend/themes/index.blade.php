@extends('layouts.admin')
@section('title') Themes | Admin @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Change Home Page</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            
                            <div class="col-4">
                                <div class="m-1 card d-inline-block">
                                    <img src="{{ asset('backend/image/themes/1.png') }}" class="card-img-top"
                                        alt="home page 1">
                                    <div class="card-body">
                                        <h5 class="card-title">Home Page</h5>
                                        <p class="card-text">Some quick example text to build on the card title and
                                            make.
                                        </p>
                                        @if (homePageThemes() === 1)
                                            <button onclick="homePageChange(1)" type="submit"
                                                class="btn btn-danger">Deactivate</button>
                                        @else
                                            <input hidden name="home_page" type="text" value="1">
                                            <button onclick="homePageChange(1)" type="submit"
                                                class="btn btn-primary">Activate</button>
                                        @endif
                                    </div>
                                </div>
                            </div>




                            <div class="col-4">
                                <div class="m-1 card d-inline-block">
                                    <img src="{{ asset('backend/image/themes/2.png') }}" class="card-img-top"
                                        alt="home page 2">
                                    <div class="card-body">
                                        <h5 class="card-title">Home Page 2</h5>
                                        <p class="card-text">Some quick example text to build on the card title and
                                            make.
                                        </p>
                                        @if (homePageThemes() === 2)
                                            <button onclick="homePageChange(1)" type="submit"
                                                class="btn btn-danger">Deactivate</button>
                                        @else
                                            <input hidden name="home_page" type="text" value="2">
                                            <button onclick="homePageChange(2)" type="submit"
                                                class="btn btn-primary">Activate</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="m-1 card d-inline-block">
                                    <img src="{{ asset('backend/image/themes/3.png') }}" class="card-img-top"
                                        alt="home page 3">
                                    <div class="card-body">
                                        <h5 class="card-title">Home Page 3</h5>
                                        <p class="card-text">Some quick example text to build on the card title and
                                            make.
                                        </p>
                                        @if (homePageThemes() === 3)
                                            <button onclick="homePageChange(1)" type="submit"
                                                class="btn btn-danger">Deactivate</button>
                                        @else
                                            <button onclick="homePageChange(3)" type="submit"
                                                class="btn btn-primary">Activate</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('themes') }}" method="POST" id="themes_form">
        @method('PUT')
        @csrf
        <input id="home_page" hidden name="home_page" type="text" value="">
    </form>
@endsection

@section('script')
    <script>
        function homePageChange(pageNo) {
            $('#home_page').val(pageNo)
            $('#themes_form').submit()
        }
    </script>
@endsection
