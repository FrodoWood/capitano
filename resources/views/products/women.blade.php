@extends('layouts.app')

@section('content')

<h1 class="text-center text-bold text-dark page-title">Women's</h1>

<div id="banner-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

      <div class="carousel-item active">
        <video autoplay muted loop src="{{URL('videos/woman_yoga_2.mp4')}}" class="d-block w-100 carousel-banner-img"></video>
      </div>
      <div class="carousel-item">
        <img src="{{URL('images/banner/woman_running_wide_2.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{URL('images/banner/woman_bicycle_wide.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{URL('images/banner/woman_sitting_1.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{URL('images/banner/woman_standing_1.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{URL('images/banner/woman_pose_3.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{URL('images/banner/woman_sitting_2.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{URL('images/banner/woman_exercise_1.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#banner-carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#banner-carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


    @include('layouts.productCards');


<div class="container text-center" >
  <h2>Want to get 10% off your next order?</h2><br>
  <h5>Sign up for the latest Capitano Clothing news, offers and products!</h5><br>
  <div class="container w-50">
    <div class="row mt-3 btn-group">
      <div class="col-8"><input type="email"  name="email" placeholder="Your email" class="form-control  rounded-0"></div>
      <div class="col-4"><button class="btn btn-dark rounded-0 " type="button">Subscribe</button></div>
    </div>
  </div>
</div>

@endsection

@section('footer-scripts')
  @include('addToCart')
@endsection