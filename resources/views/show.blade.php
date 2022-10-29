@extends('layouts.app')

@section('content')

<div class="container ">
    <div class="row">

        @foreach ($products as $product)
        <div class="col">
            <h1>{{$product -> title}}</h1>
            <h3>{{$product -> description}}</h3>
            <p>Price: {{$product -> price}}</p>
        </div>
        @endforeach

    </div>
</div>

@endsection