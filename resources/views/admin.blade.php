@extends('layouts.app')

@section('content')


    
        <div class="d-flex align-items-start p-4">
            {{-- Vertical nav buttons --}}
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

              <button class="btn btn-outline-dark rounded-0 mb-4 active" id="v-pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dashboard" type="button" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">Dashboard</button>

              <button class="btn btn-outline-dark rounded-0 mb-4 " id="v-pills-orders-tab" data-bs-toggle="pill" data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="false">Orders</button>

              <button class="btn btn-outline-dark rounded-0 mb-4 " id="v-pills-products-tab" data-bs-toggle="pill" data-bs-target="#v-pills-products" type="button" role="tab" aria-controls="v-pills-products" aria-selected="false">Products</button>
              
              <button class="btn btn-outline-dark rounded-0 mb-4" id="v-pills-customers-tab" data-bs-toggle="pill" data-bs-target="#v-pills-customers" type="button" role="tab" aria-controls="v-pills-customers" aria-selected="false">Customers</button>

              
            </div>

            {{-- Content --}}
            <div class="tab-content w-100 bg-white" id="v-pills-tabContent">



              {{-- Orders --}}
              <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab" tabindex="0">
                @php
                  $orderCount = 0;
                @endphp
                <div class="container-fluid px-5">
                  <h2 class="text-center text-uppercase">All orders</h2>
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="thead-dark">
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Order ID</th>
                              <th scope="col">Product Name</th>
                              <th scope="col">Product ID</th>
                              <th scope="col">Customer Name</th>
                              <th scope="col">Address</th>
                              <th scope="col">Email</th>
                              <th scope="col">Order Date</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Price</th>
                          </tr>
                      </thead>
                        <tbody>
                          <tr>
                            @foreach ($orders as $order)
                              @php
                                  $order_items = $order->order_items;
                                  $created_at = strtotime($order->created_at);
                                  $converted_date = date("j/n/Y", $created_at);
                                  $order_address = \App\Models\OrderAddress::where('order_id', '=', $order->id)->first();
                                  @endphp
                                    @foreach ($order_items as $item)
                                    @php
                                      $orderCount++;
                                    @endphp
                                            <th scope="row">{{$orderCount}}</th>
                                            <td>{{$order->id}}</td>
                                            <td>{{$item['name']}}</td>
                                            <td>{{$item['id']}}</td>
                                            <td>{{$order_address->firstname." ".$order_address->lastname}}</td>
                                            <td>{{$order_address->address1.", ".$order_address->postcode.", ".$order_address->country}}</td>
                                            <td>{{$order_address->email}}</td>
                                            <td>{{$converted_date}}</td>
                                            <td>{{$item['qty']}}</td>
                                            <td>£{{$item['price']}}</td>
                                        </tr>
                                    @endforeach
                            @endforeach
                          </tbody>
                    </table>
                  </div>
                </div>
              </div>

              
              {{-- Products --}}
              <div class="tab-pane fade " id="v-pills-products" role="tabpanel" aria-labelledby="v-pills-products-tab" tabindex="0">

                  <div class="container-fluid px-5">
                    <h2 class="text-center text-uppercase">All products</h2>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product ID</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                          <tbody>
                            <tr>
                                      @php
                                        $productCount=0;
                                      @endphp
                              @foreach ($products as $product)
                               
                      
                                      @php
                                        $productCount++;
                                      @endphp
                                              <th scope="row">{{$productCount}}</th>
                                              <td>{{$product->id}}</td>
                                              <td><img height="100" src="{{$product -> image}}" alt=""></td>
                                              <td>{{$product->title}}</td>
                                              <td>{{$product->description}}</td>
                                              <td>£{{$product->price}}</td>
                                          </tr>
                      
                              @endforeach
                            </tbody>
                      </table>
                    </div>
                  </div>
              </div>

              {{-- Customers --}}
              <div class="tab-pane fade" id="v-pills-customers" role="tabpanel" aria-labelledby="v-pills-customers-tab" tabindex="0">

                <div class="container-fluid px-5">
                  <h2 class="text-center text-uppercase">All customers</h2>
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="thead-dark">
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Customer ID</th>
                              <th scope="col">Customer Name</th>
                              <th scope="col">Email</th>
                          </tr>
                      </thead>
                        <tbody>
                          <tr>
                                    @php
                                      $customerCount=0;
                                    @endphp
                            @foreach ($customers as $customer)
                              
                    
                                    @php
                                      $customerCount++;
                                    @endphp
                                            <th scope="row">{{$customerCount}}</th>
                                            <td>{{$customer->id}}</td>
                                            <td>{{$customer->name}}</td>
                                            <td>{{$customer->email}}</td>
                                        </tr>
                    
                            @endforeach
                          </tbody>
                    </table>
                  </div>
                </div>

              </div>

              {{-- Dashboard --}}
              <div class="tab-pane fade active show" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab" tabindex="0">

                <div class="container">
                  <div class="row">

                    <div class="col-4">
                      <div class="card border-dark rounded-0 mb-3" style="max-width: 18rem;">
                        <div class="card-header h3 text-center">Total Orders</div>
                        <div class="card-body text-dark">
                          <h5 class="card-title h1 text-center">{{$orderCount}}</h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="card border-dark rounded-0 mb-3" style="max-width: 18rem;">
                        <div class="card-header h3 text-center">Total Products</div>
                        <div class="card-body text-dark">
                          <h5 class="card-title h1 text-center">{{$productCount}}</h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="card border-dark rounded-0 mb-3" style="max-width: 18rem;">
                        <div class="card-header h3 text-center">Total Customers</div>
                        <div class="card-body text-dark">
                          <h5 class="card-title h1 text-center">{{$customerCount}}</h5>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>


@endsection
