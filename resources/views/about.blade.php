@extends('layouts.app')



@section('content')

<h1 class="page-title mb-4 text-center mt-4">About us</h1>


<div class="container w-75"><img src="{{URL('images/banner/we_are_capitano.jpg')}}" class="d-block w-100" alt=""></div>

    <div class="container w-75 pt-3">
      {{-- Mission --}}
      <div class="container w-75 my-4 mb-4 pb-4 h5">
        <div class="row">
          <div class="col">
            <h3 class="page-title mb-4 text-center">Mission</h3>
            <p class="text-justify">Our mission is to promote health and physical acitivity amongst young adults by offering a wide range of high quality, comfortable workout clothes at a reasonable price. We strive to improve our competitive position and become the market leader, thus we are constantly strengthening our brand and products. </p>
          </div>
        </div>
      </div>
      {{-- Vision --}}
      <div class="container w-75 my-4 mb-4 pb-4 h5">
        <div class="row">
          <div class="col">
            <h3 class="page-title mb-4 text-center">Vision</h3>
            <p class="text-justify">Capitano Clothing strives to be the world leader in sustainable fitness clothes. Our vision is to bring people together, enrich lives and enhance people's ambitions globally- making sports wear accessible to young adults.
            </p>
          </div>
        </div>
      </div>

<div class="container"><img src="{{URL('images/quotes.jpeg')}}" class="d-block w-100" alt=""></div>

        
      {{-- Values --}}
      <div class="container w-75 mt-5 mb-4 pb-4">
        <div class="row">
        <div class="col">
            <h3 class="text-center page-title mb-4">Values</h3>
          <ul  class="list-group list-group-flush text-center h5">
              <li class="list-group-item" >Integrity</li>
              <li class="list-group-item">Team Spirit</li>
              <li class="list-group-item">Be ethical</li>
              <li class="list-group-item">Diversity</li>
              <li class="list-group-item">Inclusivity</li>
          </ul>
        </div>
        </div>
      </div>

      
        <div class="container w-75 mt-4 h5">
      <div class="row">
        <div class="col">
          <h3  class="text-center page-title mb-4">Company History</h3>
          <p class="text-justify">Capitano clothing was launched in 2018 from a basement in London, United Kingdom. Today, we have stores all over England.
          Capitano has over 10,000 employees. We have sold over 50,000 workout clothes to customers all over the world. </p>
          <p class="text-justify">  Capitano Clothing sources all of its supplies from ethical suppliers. All of our products are enviromentally friendly.<p>
          <p class="text-justify">  We have collaborated with multiple celebrities namely Serena William and Usain Bolt. Moreover, Capitano Clothing has teamed up with award-winning designers Molly Goddard and Regina Geller
            to launch collections. </p>
        </div>
      </div>
        </div>

    <hr class="mt-3 mb-5 pb-4">


  {{-- Donate --}}
  <div class="container w-75 text-center">
    <h2 class="text-center pb-3"> Make a difference in children's life. Donate below</h2>
    <a href="https://www.unitedthroughsport.org/how-you-can-help/donate/">
      <button class="btn btn-danger rounded-0" type="button"><span class="h3">Donate</span></button>
    </a>
  </div>

  <hr class="mt-4 mb-5 pb-4">

    <div class="container w-100">
      <div class="card text-white bg-secondary mb-3 rounded-0">
        <div class="card-body bg-secondary">
        <div class="container w-75">
        <div class="row">
            <div class="col-lg-3">
              <h4 class="text-center">£2,000,000</h4>
              <p class="text-center">Revenue</p>
            </div>
            <div class="col-lg-3">
            <h4 class="text-center">45%</h4>
              <p class="text-center">UK Market Share</p>
            </div>
            <div class="col-lg-3">
            <h4 class="text-center">30%</h4>
              <p class="text-center">Global Market Share</p>
            </div>
            <div class="col-lg-3">
              <h4 class="text-center">95%</h4>
              <p class="text-center">Customer satisfaction rate</p>
          </div>
        </div>
        </div>
        </div>
      </div>
    </div>
    
  </div>


    
@endsection