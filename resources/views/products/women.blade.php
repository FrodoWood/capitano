@extends('layouts.app')

@section('content')

<h1 class="text-center text-bold text-black-50">Women</h1>
    <div class="container">
        <div class="card-group justify-content-center">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-4">
                            <a href="{{route('showProduct', ['product' => $product])}}">
                                <div class="card mb-5" style="width: 18rem;">
                                    <img class="card-img-top" src="{{$product -> image}}" alt="Card image cap">
                                </a>
                                <div class="card-body">
                                  <h5 class="card-title">{{$product-> title}}</h5>
                                  <p class="card-text">{{$product-> description}}</p>
                                  <p class="card-text">£{{$product-> price}}</p>
                                  <a href="#" class="btn btn-success">Add to Basket</a>
                                </div>
                              </div>
                        </div>
    
                    @endforeach
                </div>
            </div>
    </div>

@endsection