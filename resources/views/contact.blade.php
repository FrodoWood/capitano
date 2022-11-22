@extends('layouts.app')

@section('content')
<div class="container">
  <form class="col-xs-6">
  <div class="container mt-4">
    <h1 class = "h1- responsive text-center mx-auto mb-2">Get In Touch</h1>
    <p class ="text-center w-responsive mx-auto mb-4"> Enter your details below about your query and we will contact you back as soon as possible!</p>
    <form action="/action_page.php">
      <div class="mb-4">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
      </div>
      <div class="mb-4">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
      </div>
      <div class="mb-4">
        <label for ="text area">Comments:</label>
        <input type ="text" class ="form-control" id="text area" placeholder="Please enter reason for contacting us" required>
      </div>
      </div>
      <button type="submit" class="btn btn-primary">Send</button>
    </form>
  </div>
</div>

@endsection












