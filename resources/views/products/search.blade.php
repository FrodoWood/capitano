@extends('layouts.app')

@section('content')
    @php
        $count = count($searchProducts);
    @endphp


<div class="container-fluid w-50 px-0 mt-4">
    <div class="row">
        <div class="col-6"><h2 class="text-bold font-weight-bold text-secondary h4">Search results for: <span class="h2 text-dark">{{$searchText}}</span> </h2></div>
        <div class="col-6 text-end h5"><span class="">{{$count}}
            @if ($count > 1 or $count ==0)
            products
            @else
            product
            @endif
            </span></div>
    </div>
    <hr class="my-4">
</div>
<div class="container-fluid w-75 px-0 mt-4">

@if ($count!=0)
{{-- If search produces results --}}
<div class="card-deck card-container justify-content-center">
                @foreach ($searchProducts as $searchProduct)
                <div class="card product-card my-4 mx-4 rounded-0">
                    <a href="{{route('showProduct', ['product' => $searchProduct])}}">
                    <img class="card-img-top rounded-0" src="{{$searchProduct -> image}}" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$searchProduct-> title}}</h5>
                        <p class="card-text">{{$searchProduct-> description}}</p>
                    </div>
                    <div class="card-footer mb-2">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <p class="card-text h5 ">£{{$searchProduct-> price}}</p>
                            </div>
                            <div class="col-8 btn-group">
                                <button class="add-to-cart btn btn-outline-dark rounded-0" type="button" class="btn btn-sm btn-outline-secondary" 
                                        data-id="{{$searchProduct->id}}" data-name="{{$searchProduct->title}}" data-price="{{$searchProduct->price}}">Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                    
            </div>
</div>
@else

{{-- If search doesn't produce any result --}}

    <div class="row text-center w-100 mt-5">
        <div class="col-12 h3">
            <i class="bi bi-search"></i> <span>We couldn't find anything for "{{$searchText}}"</span>
        </div>
        <div class="col-12">
            <a class="btn btn-dark rounded-0 mt-2" href="{{route('home')}}">Continue shopping</a>
        </div>
    </div>




{{-- More products --}}
<div class="container w-100 px-0 mt-5 py-5">
    <h2 class="text-bold text-center font-weight-bold text-secondary">These popular items might interest you</h2>
    <div class="card-deck card-container justify-content-between">
                @foreach ($products as $product)
                @if($loop->index >= 4)
                    @break
                @else
                <div class="card product-card my-4 rounded-0">
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
                @endif
                
                @endforeach
                    
            </div>
  </div>

@endif

@endsection

@section('footer-scripts')
  @include('addToCart')
@endsection