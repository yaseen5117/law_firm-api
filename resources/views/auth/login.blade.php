@extends('layouts.app')

@section('content')
        <!-- Nested Row within Card Body -->
        <div class="row" style="margin-top: 100px">
            
            <div class="offset-lg-3 col-lg-6">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                        <h2 class="h5 text-gray-900 mb-4">Welcome Back!</h2>
                    </div>
                    <form class="user" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control form-control-for-auth form-control-user  @error('email') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="{{ old('email') }}" name="email" id="email" required autocomplete="email" autofocus>

                             @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror

                        </div>
                        <div class="form-group">
                            <input id="password" type="password" name="password" autocomplete="current-password" class="form-control form-control-for-auth form-control-user @error('password') is-invalid @enderror"placeholder="Password" required>

                             @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <div class="form-check">                                
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label>Remember Me</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Login
                        </button>
                        <!-- <hr> -->

                    </form>
                    <hr>

                    @if (Route::has('password.request'))
                        <div class="text-center">
                            <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                        </div>
                    @endif

                    @if (Route::has('register'))
                        <div class="text-center">
                            <a class="small" href="{{ route('register') }}">Create an Account!</a>
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>

@endsection
