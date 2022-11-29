<script type="module">
    $(document).ready(function(){
        window.cart = <?php echo json_encode($cart) ?>;
        updateCartButton();
        $('.add-to-cart').on('click', function(event){
                var quantity = 0;
                var cart = window.cart || [];
                if($('.quantity').val() == null){
                    quantity = 1;
                }else{
                    quantity = $('.quantity').val();
                }
                cart.push({'id':$(this).data('id'), 'name':$(this).data('name'), 'price':$(this).data('price'), 'qty':quantity});
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
            $('.cart-amount-nav').html(count);
            console.log(cart);
        }

</script>
