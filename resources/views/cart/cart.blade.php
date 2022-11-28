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
                $total += $item['price']*$item['qty'];
                $imageURL = \App\Models\Product::where('id','=', $item['id'])->first()->image;
            @endphp
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-2">
                                <img height="100" src="{{$imageURL}}" alt="">
                            </div>
                            <div class="col-4">
                                {{$item['name']}}
                            </div>
                        </div>
                    </td>
                    <td>{{$item['price']}}</td>
                    <td>{{$item['qty']}}</td>
                    <td>
                        <button class="btn btn-danger remove-from-cart" type="button" data-id="{{$index = $loop->index }}">Remove</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <p>
        Total: £{{$total}}
    </p>
    
    <p>
        <a class="btn btn-success" href="{{route('checkout')}}">
            <i class="bi bi-lock-fill"></i>
            Checkout Securely</a>
    </p>
</div>
@endsection

@section('footer-scripts')
<script type="module">
    $(document).ready(function(){
        window.cart = <?php echo json_encode($cart) ?>;
        $('.remove-from-cart').on('click', function(event){
            var index = $(this).data("id");
            var cart = window.cart;
            $(this).closest("tr").remove();
            cart.splice(index,1);


            $.ajax('/cart/delete',
                {
                    type: 'POST',
                    data: {"_token": "{{ csrf_token() }}", "cart":cart, "index": index},
                    success:function(){
                        console.log("Item deleted correctly");
                         window.location.href = "cart";
                    }
                }
            )
        })
    })
</script>
@endsection