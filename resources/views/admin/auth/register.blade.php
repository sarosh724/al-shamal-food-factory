@extends('template.auth.template')

@section('page-title')
    Register
@stop

@section('content')
    <div class="card shadow-none pd-20 mx-auto wd-280 text-center bd-1 align-self-center">
        <h4 class="card-title mt-3 text-center">Create Account</h4>
        <p class="text-center">Get started with your free account</p>
        <p>
            <a href="" class="btn btn-block btn-twitter tx-13 hover-white"> <i class="fa fa-twitter"></i>   Login via Twitter</a>
            <a href="" class="btn btn-block btn-facebook tx-13 hover-white"> <i class="fa fa-facebook-f"></i>   Login via facebook</a>
        </p>
        <p class="divider-text">
            <span class="bg-light">OR</span>
        </p>
        <form>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input class="form-control form-control-sm" placeholder="Full name" type="text">
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text pd-x-9"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input class="form-control form-control-sm" placeholder="Email address" type="email">
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                </div>
                <select class="custom-select custom-select-sm" style="max-width: 120px;">
                    <option selected="">+971</option>
                    <option value="1">+972</option>
                    <option value="2">+198</option>
                    <option value="3">+701</option>
                </select>
                <input class="form-control form-control-sm" placeholder="Phone number" type="text">
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text pd-x-9"> <i class="fa fa-building"></i> </span>
                </div>
                <select class="form-control form-control-sm">
                    <option selected=""> Select job type</option>
                    <option>Designer</option>
                    <option>Manager</option>
                    <option>Accaunting</option>
                </select>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input class="form-control form-control-sm" placeholder="Create password" type="password">
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input class="form-control form-control-sm" placeholder="Repeat password" type="password">
            </div>
            <div class="custom-control custom-checkbox mg-t-25" style="display: initial;">
                <input type="checkbox" class="custom-control-input form-control-sm" id="customCheck1">
                <label class="custom-control-label tx-12 tx-gray-500" for="customCheck1">I agree to this <a href="">Terms & Conditions</a></label>
            </div>
            <div class="custom-control custom-checkbox mg-b-10 pd-l-0">
                <input type="checkbox" class="custom-control-input form-control-sm" id="customCheck2">
                <label class="custom-control-label tx-12 tx-gray-500" for="customCheck2">I agree to this <a href="">Privacy & Policy</a></label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-custom-primary btn-block tx-13"> Create Account </button>
            </div>
            <p class="text-center">Already Singed Up? <a href="page-singin.html">Sing In</a> </p>
        </form>
    </div>
@stop
