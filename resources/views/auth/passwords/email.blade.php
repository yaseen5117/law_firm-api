@extends('layouts.app')

@section('content')
  <!-- Nested Row within Card Body -->
        <div class="row">
             <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> 
            <div class="col-lg-6">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                             <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="user" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control-for-auth form-control-user  @error('email') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="{{ old('email') }}" name="email" id="email" required autocomplete="email" autofocus>

                             @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror

                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ __('Send Password Reset Link') }}
                        </button>
                        <!-- <hr> -->

                    </form>
                        <hr>
                            <div class="text-center">
                                <a class="small" href="{{ url('/register') }}">Create an Account!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ url('/login') }}">Already have an account? Login!</a>
                            </div>
                </div>
            </div>
        </div>
@endsection
