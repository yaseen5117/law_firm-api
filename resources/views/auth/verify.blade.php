@extends('layouts.app')

@section('content')
  <!-- Nested Row within Card Body -->
        <div class="row">
             <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">{{ __('Verify Your Email Address') }}</h1>
                    </div>

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="user" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ __('click here to request another') }}
                        </button>

                    </form>
                    <hr>
                </div>
            </div>
        </div>
@endsection
