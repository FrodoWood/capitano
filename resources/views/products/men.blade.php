@extends('layouts.app')

@section('content')

<h1 class="text-center text-bold text-black-50">Men</h1>

<!-- add stuff here -->
<h2> Shop today </h2>
<p> hello</p>


    <div class="container">


        <div class="card-deck card-container">
                
                    @foreach ($products as $product)
                        
                            <a href="{{route('showProduct', ['product' => $product])}}">

                                <div class="card product-card mb-5 m-4 ">
                                    <img class="card-img-top" src="{{$product -> image}}" alt="Card image cap">
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
                                            <div class="col-8 text-align-end">
                                                <a href="#" class="btn btn-success">Add to Basket</a>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                        @endforeach





                </div>
            </div>





@endsection