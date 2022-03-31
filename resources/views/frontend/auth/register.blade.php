@extends('layout.auth_layout')


@section('content')
<div class="card-body p-md-5">
    <div class="text-center">
        <img src="{{asset('assets/images/logo-icon.png')}}" width="80" alt="">
        <h3 class="mt-4 font-weight-bold">Welcome Back</h3>
    </div>
    <div class="input-group shadow-sm rounded mt-5">
        <div class="input-group-prepend">	<span class="input-group-text bg-transparent border-0 cursor-pointer"><img src="assets/images/icons/search.svg" alt="" width="16"></span>
        </div>
        <input type="button" class="form-control  border-0" value="Log in with google">
    </div>
    <div class="login-separater text-center"> <span>OR LOGIN WITH EMAIL</span>
        <hr/>
    </div>
    <div class="form-group mt-4">
        <label>Email Address</label>
        <input type="text" class="form-control" placeholder="Enter your email address" />
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Enter your password" />
    </div>
    <div class="form-row">
        <div class="form-group col">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                <label class="custom-control-label" for="customSwitch1">Remember Me</label>
            </div>
        </div>
        <div class="form-group col text-right"> <a href="authentication-forgot-password.html"><i class='bx bxs-key mr-2'></i>Forget Password?</a>
        </div>
    </div>
    <div class="btn-group mt-3 w-100">
        <button type="button" class="btn btn-primary btn-block">Log In</button>
        <button type="button" class="btn btn-primary"><i class="lni lni-arrow-right"></i>
        </button>
    </div>
    <hr>
    <div class="text-center">
        <p class="mb-0">Don't have an account? <a href="authentication-register.html">Sign up</a>
        </p>
    </div>
</div>
@endsection