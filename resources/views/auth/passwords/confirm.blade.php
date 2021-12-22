@extends('layouts.app')

@section('content')
        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">{{ __('Confirm Password') }}</h1>
                                    </div>
                                    {{ __('Please confirm your password before continuing.') }}
                                    <form class="user" method="POST" action="{{ route('password.confirm') }}">
                                       @csrf

                                        <div class="form-group">
                                            <input id="password" type="password" name="password" autocomplete="current-password" class="form-control-for-auth form-control-user @error('password') is-invalid @enderror"placeholder="Password" required>

                                             @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                             @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                           {{ __('Confirm Password') }}
                                        </button>
                                        <!-- <hr> -->

                                    </form>
                                    <hr>

                                    @if (Route::has('password.request'))
                                        <div class="text-center">
                                            <a class="small" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}</a>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
@endsection
