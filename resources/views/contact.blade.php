@extends('layouts.app')

@section('content')
<form class="row g-3 needs-validation" novalidate>
<div class="container mt-4">
  <h2 class = "h1- responsive text-center mx-auto mb-2">Get In Touch</h2>
  <p class ="text-center w-responsive mx-auto mb-4"> "Please enter your details below about your query and we will contact you back as soon as possible!</p>
  <form action="/action_page.php">
    <div class="mb-4">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
      <div class = "invalid-feedback" data-sb-feedback ="name:required">Your name is required.</div>
    </div>
    <div class="mb-4">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-4">
      <label for ="address">Address:</label>
      <input type ="text" class ="form-control" id="address" placeholder="Enter adress">
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection












