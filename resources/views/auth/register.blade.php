@extends('layouts.app')

@section('content')
    <!-- Nested Row within Card Body -->
    <div class="row">
         <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> 
        <div class="col-lg-6">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>
                <form class="user" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        
                        <div class="col-sm-6 mb-3 mb-sm-0">

                            <input type="text" class="form-control-for-auth form-control-user @error('first_name') is-invalid @enderror" placeholder="First Name" id="first_name" name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus>

                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 

                        </div>
                        <div class="col-sm-6">
                            
                            <input type="text" class="form-control-for-auth form-control-user @error('last_name') is-invalid @enderror" placeholder="Last Name" id="last_name" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>

                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 

                        </div>

                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control-for-auth form-control-user @error('email') is-invalid @enderror" placeholder="Email Address" id="email" name="email" value="{{ old('email') }}" autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    
                    </div>

                    <div class="form-group">
                        <!-- <label for="password">Roles</label>  -->
                        <select class="form-control-for-auth form-control-user @error('role') is-invalid @enderror"  id="role" name="role" value="{{ old('role') }}">
                                <option value="">Select Role</option>
                            @foreach($roles as $role)
                                <option value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                        </select>

                        @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" placeholder="Password" id="password" class="form-control-for-auth form-control-user @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control-for-auth form-control-user"  placeholder="Repeat Password" id="password-confirm" name="password_confirmation" autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group">

                        <label for="password">Profile Picture</label>                 
                        <input type="file" class=" @error('profile_image_file') is-invalid @enderror" accept="image/x-png,image/gif,image/jpeg" id="profile_image_file" name="profile_image_file" value="{{ old('profile_image_file') }}" autocomplete="profile_image_file">

                        @error('profile_image_file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 

                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Register Account
                    </button>
                </form>
                <hr>
                @if (Route::has('password.request'))
                    <div class="text-center">
                        <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                @endif
                
                @if (Route::has('password.request'))
                    <div class="text-center">
                        <a class="small" href="{{ url('/login') }}">Already have an account? Login!</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
