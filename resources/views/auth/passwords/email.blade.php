@extends('layouts.app')

@section('content')
  <!-- Nested Row within Card Body -->
        <div class="row" style="margin-top: 100px">
              
            <div class="offset-lg-3 col-lg-6">
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
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="{{ old('email') }}" name="email" id="email" required autocomplete="email" autofocus>

                             @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror

                        </div>
                        <div class="form-group"> 
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Send Password Reset Link') }}
                        </button>
                        </div>
                        <!-- <hr> -->

                    </form>
                        <hr>
                            <div class="text-center">
                                <a class="small" href="https://elawfirmpk.com/sign-up">Create an Account!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="https://elawfirmpk.com/login">Already have an account? Login!</a>
                            </div>
                </div>
            </div>
        </div>
@endsection
