@extends('layout.auth_layout')


@section('content')
<div class="card-body p-md-5">
    <div class="text-center">
        <img src="{{asset('assets/images/logo-icon.png')}}" width="80" alt="">
        <h3 class="mt-4 font-weight-bold">Login</h3>
    </div>

    <div class="form-group mt-4">
        <label>Email</label>
        <input type="text" class="form-control" placeholder="Masukkan email" />
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Masukkan password" />
    </div>
    <div class="form-row">
        <div class="form-group col">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch1">
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
        <p class="mb-0">Belum punya akun? <a href="{{$register}}">Register</a>
        </p>
    </div>
</div>
@endsection