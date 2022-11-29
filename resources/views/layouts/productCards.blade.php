<div class="container-fluid w-75 px-0 mt-5">


    <h2 class="text-bold text-center font-weight-bold">Unmissable Deals</h2>
    <div class="card-deck card-container justify-content-evenly">
                @foreach ($products as $product)
                
                <div class="card product-card my-5 mx-5 rounded-0">
                    <a href="{{route('showProduct', ['product' => $product])}}">
                    <img class="card-img-top rounded-0" src="{{$product -> image}}" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$product-> title}}</h5>
                        <p class="card-text">{{$product-> description}}</p>
                    </div>
                    <div class="card-footer mb-2">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <p class="card-text h5 ">£{{$product-> price}}</p>
                            </div>
                            <div class="col-8 btn-group">
                                <button class="add-to-cart btn btn-outline-dark rounded-0" type="button" class="btn btn-sm btn-outline-secondary" 
                                        data-id="{{$product->id}}" data-name="{{$product->title}}" data-price="{{$product->price}}">Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                @endforeach
                    
            </div>
</div>