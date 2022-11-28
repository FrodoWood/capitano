@extends('layouts.app')
@section('content')


<div class="container d-flex justify-content-center">
  
  
  <div class="row w-75">
    <div class="col-6">
      <img class="card-img-top" src="{{$product -> image}}" alt="Card image cap">
      </div>
      <div class="col-6 ps-5">
        <div class="row mb-3"><h5 class="">{{$product-> title}}</h5></div>
        <div class="row mb-3"><p class="h4">£{{$product-> price}}</p></div>
        <div class="row mb-3"><p class="">{{$product-> description}}</p></div>
        <div class="row mb-3">
          <div class="col-6">
            <label for="colour" class="form-label">Colour</label>
            <select class="form-select rounded-0 bg-white" id="colour" name="colour">
                      <option value="Blue">Blue</option>
                      <option value="Red">Red</option>
                      <option value="White">White</option>
            </select>
          </div>
          <div class="col-6">
            <label for="qty" class="form-label">Quantity</label>
            <input class="w-100 form-control bg-white rounded-0 quantity" name="qty" id="qty" type="number" value="1" min="1" max="100">
          </div>
        </div>
        <div class="row mb-3 mt-4">
          <div class="col-12">
            <button class="w-100 add-to-cart btn btn-dark rounded-0 text-uppercase text-center py-2" type="button" 
                data-id="{{$product->id}}" data-name="{{$product->title}}" data-price="{{$product->price}}">
                <i class="bi bi-bag-plus h4"></i> <span class="ms-1">Add to Cart</span>
            </button>
          </div>
        </div>

      </div>
    </div>
</div>
@endsection

@section('footer-scripts')

<script>
        function myFunction(){
        alert("Hello js is working!");
        }
</script>

<script type="module">
    $(document).ready(function(){
        window.cart = <?php echo json_encode($cart) ?>;
            updateCartButton();
            $('.add-to-cart').on('click', function(event){
                var cart = window.cart || [];
                cart.push({'id':$(this).data('id'), 'name':$(this).data('name'), 'price':$(this).data('price'), 'qty':$('.quantity').val()});
                window.cart = cart;
                $.ajax('/home/add',
                {
                    type: 'POST',
                    data: {"_token": "{{ csrf_token() }}", "cart":cart},
                    success: function(data, status, xhr){
                    }
                });
                updateCartButton();
            });
        })
        function updateCartButton(){
            var count = 0;
            window.cart.forEach(function(item, i){
                count+= Number(item.qty);
            });
            $('#items-in-cart').html(count);
            console.log(cart);
        }

</script>

@endsection