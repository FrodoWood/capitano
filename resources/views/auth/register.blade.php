@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <div class="card rounded-0"  >
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-sm-12 col-md-5 col-lg-5 p-4 pe-5">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row mb-2">
                                    <h2>Register</h2>
                                    <label for="name" class="col-lg-12 mb-1 form-label">{{ __('Name') }}</label>
                                    <div class="col-lg-12">
                                        <input id="name" type="text" class="form-control rounded-0 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="email" class="col-lg-12 mb-1 form-label">{{ __('Email Address') }}</label>
                                    <div class="col-lg-12">
                                        <input id="email" type="email" class="form-control rounded-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="password" class="col-lg-12 mb-1 form-label">{{ __('Password') }}</label>
                                    <div class="col-lg-12">
                                        <input id="password" type="password" class="form-control rounded-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="password-confirm" class="col-lg-12 mb-1 form-label">{{ __('Confirm Password') }}</label>
                                    <div class="col-lg-12">
                                        <input id="password-confirm" type="password" class="form-control rounded-0" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary w-100 py-2 rounded-0 bg-dark">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="col-sm-12 col-md-7 col-lg-7 order-first">
                            <div class="row" > <img class="img-fluid" src="{{ URL('images/image_6487327.JPG')}}" style="height: 331px;" /> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection