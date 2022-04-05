@extends('layout.auth_layout')


@section('content')
<div class="card-body p-md-5">
    <div class="text-center">
        <img src="{{asset('assets/images/logo-icon.png')}}" width="80" alt="">
        <h3 class="mt-4 font-weight-bold">Login</h3>
    </div>

    <form action="{{ route('login') }}" method="post">
    @csrf

    <div class="form-group mt-4">
        <label>Email</label>
        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" required autofocus placeholder="Masukkan email" />

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password" name="password" required />

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    </div>
    <div class="form-row">
        <div class="form-group col">
            <div class="custom-control custom-switch">
                <input type="checkbox" name="remember" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="remember"> {{ __('Remember Me') }}</label>
            </div>
        </div>
        @if (Route::has('password.request'))
            <div class="form-group col text-right"> <a href="{{ route('password.request') }}">
                <i class='bx bxs-key mr-2'></i>
                {{ __('Forgot Your Password?') }}</a>
            </div>
        @endif
    </div>
    <div class="btn-group mt-3 w-100">
        <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
        <button type="button" class="btn btn-primary"><i class="lni lni-arrow-right"></i>
        </button>
    </div>
    
</form>
    <hr>
    <div class="text-center">
        <p class="mb-0">Belum punya akun? <a href="{{route('register')}}">Register</a>
        </p>
    </div>
</div>
@endsection