@extends('layouts.app')

@section('content')
    @php
        $count = count($products);
    @endphp


<div class="container-fluid w-50 px-0 mt-4">
    <div class="row">
        <div class="col-6"><h2 class="text-bold font-weight-bold text-secondary h4">Search results for: '<span class="h3 text-dark">{{$searchText}}</span>' </h2></div>
        <div class="col-6 text-end h5"><span class="">{{$count}} Products:</span></div>
    </div>
    <hr class="my-4">
</div>
<div class="container-fluid w-75 px-0 mt-4">

@if ($count!=0)
<div class="card-deck card-container justify-content-center">
                @foreach ($products as $product)
                <div class="card product-card my-4 mx-4 rounded-0">
                    <a href="{{route('showProduct', ['product' => $product])}}">
                    <img class="card-img-top rounded-0" src="{{$product -> image}}" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$product-> title}}</h5>
                        <p class="card-text">{{$product-> description}}</p>
                    </div>
                    <div class="card-footer mb-2">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <p class="card-text h5 ">£{{$product-> price}}</p>
                            </div>
                            <div class="col-8 btn-group">
                                <button class="add-to-cart btn btn-outline-dark rounded-0" type="button" class="btn btn-sm btn-outline-secondary" 
                                        data-id="{{$product->id}}" data-name="{{$product->title}}" data-price="{{$product->price}}">Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                    
            </div>
</div>
@else

<div class="row text-center w-100 mt-5">
    <div class="col-12 h3">
        <i class="bi bi-search"></i> <span>We can not find anything for '{{$searchText}}'</span>
    </div>
    <div class="col-12">
        <a class="btn btn-dark rounded-0 mt-2" href="{{route('home')}}">Continue shopping</a>
    </div>
</div>

@endif

@endsection