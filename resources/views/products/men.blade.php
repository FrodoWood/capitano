@extends('layouts.app')

@section('content')

<h1 class="text-center text-bold text-black-50">Men's</h1><br><br><br><br>



<div id="banner-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

      <div class="carousel-item">
        <img src="{{URL('images/banner/woman_yoga_wide.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{URL('images/banner/woman_stretching_wide.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item active">
        <img src="{{URL('images/banner/woman_sitting_wide.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
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

    <div class="container">


        <div class="card-deck card-container">
                
                    @foreach ($menProducts as $menProduct)
                        
                            <a href="{{route('showProduct', ['product' => $menProduct])}}">

                                <div class="card product-card mb-5 m-4 ">
                                    <img class="card-img-top" src="{{$menProduct -> image}}" alt="Card image cap">
                            </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$menProduct-> title}}</h5>
                                        <p class="card-text">{{$menProduct-> description}}</p>
                                    </div>
                                    <div class="card-footer mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-4">
                                                <p class="card-text h5 ">£{{$menProduct-> price}}</p>
                                            </div>
                                            <div class="col-8 text-align-end">
                                                <a href="#" class="btn btn-success">Add to Basket</a>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                        @endforeach





                </div>
            </div>



<div class="container text-center" >
  <h2>Want to get 10% off your next order?</h2><br>
  <h5>Sign up for the latest Capitano Clothing news, offers and products!</h5><br>
  <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Enter email address" aria-label="Email" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">Submit</span>
  </div>
</div>
</div>



@endsection
