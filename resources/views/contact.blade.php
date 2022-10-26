@extends('layouts.app')

@section('content')
    <h1>Contact Us</h1>

    <form>
        <div class = "contact_form">
            <label for ="exampleInputEmail">Email adress </label>
            <input type ="email" class = "contact_form" placeholder="Enter email">
        </div>
            <label for ="exampleName">First Name </label>
            <input type ="text" class="contact-form" placeholder="First name">
        </div>
        <div class ="contact_form">
            <label for ="exampleSname">Last Name</label>
            <input type ="text" class = "contact_form" placeholder = "Last name">
        </div>
        
    </form>

@endsection












