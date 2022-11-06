@extends('layouts.app')

@section('content')

<div class="container ">
    <div class="row">

        <div class="card-group">
            @foreach ($products as $product)
            {{-- <div class="col">
                <h1>{{$product -> title}}</h1>
                <h3>{{$product -> description}}</h3>
                <p>Price: {{$product -> price}}</p>
            </div> --}}
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{$product -> image}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{$product-> title}}</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            
            @endforeach
        </div>

    </div>
</div>

@endsection