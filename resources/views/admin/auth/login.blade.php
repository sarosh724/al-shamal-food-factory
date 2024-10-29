@extends('template.auth.template')

@section('page-title')
    Login
@stop

@section('content')
    <div class="card shadow-none pd-20 mx-auto wd-300 text-center bd-1 align-self-center">
        <h4 class="card-title mt-3 text-center">Sign In</h4>
        <p class="text-center">Sign in to your account</p>
        {{--        <p> --}}
        {{--            <a href="" class="btn btn-block btn-twitter tx-13 hover-white"> <i class="fa fa-twitter"></i>   Login via Twitter</a> --}}
        {{--            <a href="" class="btn btn-block btn-facebook tx-13 hover-white"> <i class="fa fa-facebook-f"></i>   Login via facebook</a> --}}
        {{--        </p> --}}
        {{--        <p class="divider-text"> --}}
        {{--            <span class="bg-light">OR</span> --}}
        {{--        </p> --}}
        <form method="post" name="login-form" id="login-form" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input class="form-control form-control-sm" placeholder="Email" type="email" name="email">
                </div>
                <label id="email-error" class="error" for="email" style="display: none;"></label>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control form-control-sm" placeholder="Password" type="password" name="password">
                </div>
                <label id="password-error" class="error" for="password" style="display: none;"></label>
            </div>
            {{-- <p class="text-center"><a href="{{ route('forgot-password') }}">Forget Password?</a></p> --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="list-style: none;" class="p-0 m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <button type="submit" class="btn btn-custom-primary btn-block tx-13 hover-white">
                    Login<i class="fa fa-sign-in ml-1"></i></button>
            </div>
            {{--            <p class="text-center">Don't have an account?<br/> <a href="page-singup.html">Create Account</a> </p> --}}
        </form>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#login-form").validate({
                rules: {
                    email: {
                        required: true,
                        maxlength: 255,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    email: {
                        required: "Please enter email"
                    },
                    password: {
                        required: "Please enter password"
                    }
                },
                submitHandler: function(form) {
                    return true;
                }
            });
        });
    </script>
@stop
