@extends('layouts.website')

@section('title') Coming Soon @endsection
@section('header-style') class="bg-transparent" @endsection

@section('content')
    <!-- Coming Soon Area Starts Here -->
    <section class="comingsoon-area">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="comingsoon-area-start">
                        <h1>Coming Soon</h1>
                        <p>Something cool coming soon. Get notified when we launch.</p>
                        <form action="#">
                            <div class="form-group d-flex align-items-center">
                                <input type="email" placeholder="Enter Your Email">
                                <button type="submit" class="btn btn-primary regular-fill-btn">Notify Me</button>
                            </div>
                        </form>
                        <div class="count-down mt-lg-5" id="countdown">
                            <!-- <div class="count-down-item">
                                <h6>14</h6>
                                <p>Days</p>
                            </div>
                            <div class="count-down-item">
                                <h6>23</h6>
                                <p>Hours</p>
                            </div>
                            <div class="count-down-item">
                                <h6>59</h6>
                                <p>Mins</p>
                            </div>
                            <div class="count-down-item me-0">
                                <h6>43</h6>
                                <p>Secs</p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="comingsoon-area-shape">
            <img src="dist/images/comingsoon/01.png" alt="Shape" class="img-fluid shape-01">
            <img src="dist/images/comingsoon/02.png" alt="Shape" class="img-fluid shape-02">
            <img src="dist/images/comingsoon/03.png" alt="Shape" class="img-fluid shape-03">
            <img src="dist/images/comingsoon/04.png" alt="Shape" class="img-fluid shape-04">
        </div>
    </section>
    <!-- Coming Soon Area Ends Here -->
@endsection
