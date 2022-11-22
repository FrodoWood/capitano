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
                <th scope="col"></th>
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
                    <td>
                        <button class="btn btn-danger remove-from-cart" type="button" 
                                                    data-id="{{$item['id']}}" data-name="{{$item['name']}}" data-price="{{$item['price']}}">Remove</button>
                    </td>
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

@section('footer-scripts')
<script type="module">
    $(document).ready(function(){
        window.cart = <?php echo json_encode($cart) ?>;
        $('.remove-from-cart').on('click', function(event){
            var cart = window.cart;
            console.log(cart)
        })
    })
</script>
@endsection