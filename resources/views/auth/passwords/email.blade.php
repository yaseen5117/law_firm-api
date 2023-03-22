@extends('layouts.app')
@section('title','Forgot Password')

@section('content')
<section id="breadcrumbs" class="breadcrumbs" v-if="!hide">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <h4>Forgot Your Password?</h4>
        </div>
    </div>

</section>
<!-- Nested Row within Card Body -->
<div class="container">
    <div class="row mt-4">

        <div class="col-md-4 offset-md-4 col-sm-10 offset-sm-1 card mt-3 p-3">

            <div class="text-center">
                <!-- <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1> -->
                <!-- <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link
                    to reset your password!</p> -->
            </div>

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form class="user" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <label><b>Email</b></label>
                    <input type="email" class="form-control  @error('email') is-invalid @enderror"
                        id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..."
                        value="{{ old('email') }}" name="email" id="email" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-block reset-btn">
                        {{ __('Reset Password') }}
                    </button>
                </div>
                <!-- <hr> -->

            </form>
            <!-- <hr> -->
            <div class="text-center mt-3">
                <a class="small badge rounded-pill btn-success" style="margin-right:1px"
                    href="https://elawfirmpk.com/sign-up">Create an
                    Account!</a>

                <a class="small badge rounded-pill btn-primary" href="https://elawfirmpk.com/login">Already have an
                    account? Login!</a>
            </div>
            <!-- <div class="text-center">
                <a class="small badge rounded-pill bg-primary" href="https://elawfirmpk.com/login">Already have an
                    account? Login!</a>
            </div> -->

        </div>
    </div>
</div>
@endsection