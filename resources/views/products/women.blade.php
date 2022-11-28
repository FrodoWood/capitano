@extends('layouts.app')

@section('content')

<h1 class="text-center text-bold text-black-50">Women</h1>

<!-- add stuff here -->


    <div class="container">
        <div class="card-deck card-container">
                
                    @foreach ($womenProducts as $womenProduct)
                        
                            <a href="{{route('showProduct', ['product' => $womenProduct])}}">

                                <div class="card product-card mb-5 m-4 rounded-0">
                                    <img class="card-img-top rounded-0" src="{{$womenProduct -> image}}" alt="Card image cap">
                            </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$womenProduct-> title}}</h5>
                                        <p class="card-text">{{$womenProduct-> description}}</p>
                                    </div>
                                    <div class="card-footer mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-4">
                                                <p class="card-text h5 ">£{{$womenProduct-> price}}</p>
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