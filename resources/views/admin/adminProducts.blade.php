@extends('layouts.adminLayout')

@section('title', 'Products')

@section('content')
    <h1>Products</h1>
    @foreach ($products as $product)
        <p>{{$product->title}}</p>
    @endforeach
@endsection