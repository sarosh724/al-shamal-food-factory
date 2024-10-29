@extends('template.auth.template')

@section('page-title')
    Forgot Password
@stop

@section('content')
    <div class="card shadow-none pd-20 mx-auto wd-300 text-center bd-1 align-self-center">
        <h4 class="card-title mt-3 text-center">Forgot Password</h4>
        <p class="text-center">Enter email to recover passowrd</p>
        <form method="POST" action="{{url('forgot-password')}}" name="forgot-form" id="forgot-form">
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text pd-x-9"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input class="form-control form-control-sm" placeholder="Email" type="email" name="email" id="email">
                </div>
                <label id="email-error" class="error" for="email" style="display: none;"></label>
            </div>
{{--            <p class="text-center"><a href="{{route("login")}}">Login</a></p>--}}
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{session()->get('error')}}
                </div>
            @endif

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <button type="submit" class="btn btn-custom-primary btn-block tx-13 hover-white">
                    Confirm email<i class="fa fa-arrow-circle-right ml-1"></i>
                </button>
            </div>
        </form>
    </div>
@stop


@section('scripts')
    <script type="text/javascript">
        $(document).ready(function (){
            $("#forgot-form").validate({
                rules:{
                    email: {
                        required:true,
                        email: true
                    }
                },
                messages:{
                    email: {
                        required:"Email is Required*",
                        email: "Please enter valid email address"
                    }
                },
                submitHandler:function(form){
                    return true;
                }
            });
        });
    </script>
@stop
