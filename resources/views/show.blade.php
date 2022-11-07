@extends('layouts.app')

@section('content')

    <div class="container center">
        <div class="card-group">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-4">
                            <div class="card mb-5" style="width: 18rem;">
                                <img class="card-img-top" src="{{$product -> image}}" alt="Card image cap">
                                <div class="card-body">
                                  <h5 class="card-title">{{$product-> title}}</h5>
                                  <p class="card-text">{{$product-> description}}</p>
                                  <p class="card-text">£{{$product-> price}}</p>
                                  <a href="#" class="btn btn-success">BUY</a>
                                </div>
                              </div>
                        </div>
    
                    @endforeach
                </div>
            </div>
    </div>

@endsection