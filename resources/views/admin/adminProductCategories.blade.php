@extends('layouts.adminLayout')

@section('title', 'Categories')

@section('content')
    <h1>Product Categories</h1>
    @foreach ($categories as $category)
        <p>{{$category->name}} {{$category->parent_id}}</p>
    @endforeach
@endsection