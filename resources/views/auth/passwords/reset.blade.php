@extends('layouts.app')

@section('content')
<section id="breadcrumbs" class="breadcrumbs" v-if="!hide">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <h4>Reset Your Password</h4>
        </div>
    </div>

</section>
<!-- Nested Row within Card Body -->
<div class="container">
    <div class="row mt-4">

        <div class="col-md-4 offset-md-4 col-sm-10 offset-sm-1 card mt-3 p-3">

            <!-- <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">{{ __('Reset Password') }}</h1>
            </div> -->
            @if(session()->has('reset_sucess_message'))
            <div class="alert alert-success" role="alert">
                {{ session('reset_sucess_message') }}
            </div>
            @endif
            <form class="user" method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label><b>Email</b></label>
                        <input type="email" class="form-control"
                            style="@if(session()->has('token')) border-color: #dc3545; @endif"
                            placeholder="Email Address" id="email" name="email" value="{{ old('email') }}" required
                            autocomplete="email">

                        @if(session()->has('token'))
                        <span style="font-size: .875em; color: #dc3545;">
                            <strong>{{ session()->get('token') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label><b>Password</b></label>
                        <input type="password" placeholder="Password" id="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                        <span style="font-size: .875em; color: #dc3545;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label><b>Confirm Password</b></label>
                        <input type="password" class="form-control" placeholder="Repeat Password" id="password-confirm"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block auth-btn mt-3">
                    {{ __('Reset Password') }}
                </button>
                <!-- <hr> -->

            </form>

        </div>
    </div>
</div>
@endsection