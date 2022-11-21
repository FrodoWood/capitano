@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Shopping Basket</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
            </tr>
        </thead>
    
        <tbody>
            
            @php
                $total = 0;
            @endphp
            @foreach ($cart as $item)
            @php
                $total += $item['price']*$item['qty']
            @endphp
                <tr>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['price']}}</td>
                    <td>{{$item['qty']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <p>
        Total: £{{$total}}
    </p>
    
    <p>
        <a class="btn btn-success" href="">
            <i class="bi bi-lock-fill"></i>
        Checkout</a>
    </p>
</div>
@endsection