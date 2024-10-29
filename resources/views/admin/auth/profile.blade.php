@extends('template.index')

@section('title')
    Profile
@stop

@section('breadcrumb')
    <a class="breadcrumb-item active">Profile</a>
@stop

@section('content')
    <div class="bg-white shadow p-2">
        <h5 class="m-0">Basic Details</h5>
        <form method="post" name="basic-detail-form" id="basic-detail-form" action="{{route("admin.update-profile")}}">
            @csrf
            <input type="hidden" name="id" value="{{@$user->id}}">
            <div class="row">
                <div class="col-lg-4">
                    @include('template.partials.form.input', ['type' => 'text', 'label' => 'Name', 'name' => 'name', 'required' => true, 'placeholder' => 'e,g John Doe', 'value' => @$user->name])
                </div>
                <div class="col-lg-4">
                    @include('template.partials.form.input', ['type' => 'email', 'label' => 'Email', 'name' => 'email', 'readonly' => true, 'value' => @$user->email])
                </div>
                {{-- <div class="col-lg-4">
                    @include('template.partials.form.input', ['type' => 'text', 'label' => 'Mobile No.', 'name' => 'mobile_number', 'required' => true, 'placeholder' => 'e.g 03053609490', 'value' => @$user->mobile_number])
                </div> --}}
                <div class="col-lg-12 mt-2">
                    @include('template.partials.submit-button', ['txt' => 'Update'])
                </div>
            </div>
        </form>
    </div>

    <div class="bg-white shadow p-2 mt-3">
        <h5 class="m-0">Change Password</h5>
        <form method="post" name="change-password-form" id="change-password-form" autocomplete="off" action="{{route("admin.change-password")}}">
            @csrf
            <input type="hidden" name="id" value="{{@$user->id}}">
            <div class="row">
                <div class="col-lg-4">
                    @include('template.partials.form.input', ['type' => 'password', 'label' => 'New Password', 'name' => 'password', 'required' => true])
                </div>
                <div class="col-lg-4">
                    @include('template.partials.form.input', ['type' => 'password', 'label' => 'Confirm Password', 'name' => 'password_confirmation', 'required' => true])
                </div>
                <div class="col-lg-12 mt-2">
                    @include('template.partials.submit-button', ['txt' => 'Change'])
                </div>
            </div>
        </form>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#basic-detail-form").validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 255
                    }
                    // mobile_number: {
                    //     required: true,
                    //     maxlength: 11
                    // }
                },
                messages: {
                    name: {
                        required: "Name is required",
                        maxlength: "Maximum length is 255 characters"
                    }
                    // mobile_number: {
                    //     required: "Mobile Number is required*",
                    //     maxlength: "Maximum length is 11 digits"
                    // }
                },
                submitHandler: function(form) {
                    return true;
                }
            });
        });

        $(document).ready(function() {
            $("#change-password-form").validate({
                rules: {
                    password: {
                        required: true,
                        minlength: 8
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 8,
                        equalTo: "#password"
                    }
                },
                messages: {
                    password: {
                        required: "Password is required*",
                        minlength: "Minimum length should be 6 characters"
                    },
                    password_confirmation: {
                        required: "Password is required*",
                        minlength: "Minimum length should be 6 characters",
                        equalTo: "Password should be same as new password"
                    }
                },
                submitHandler: function(form) {
                    return true;
                }
            });
        });
    </script>
@stop
