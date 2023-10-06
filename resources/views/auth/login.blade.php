@extends('layout.auth')
@section('title', 'Login')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <b>Login </b>SIMKU</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <div class="mt-5">
                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>
                <form action="{{ route('loginStore') }}" method="post">
                    @csrf
                    @error('username')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="text" id="username" name="username" value="{{ old('username') }}"
                            placeholder="User name" class="form-control @error('username') is-invalid @enderror">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    {{-- @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            placeholder="Email" class="form-control @error('email') is-invalid @enderror">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div> --}}
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" value="{{ old('password') }}"
                            placeholder="Password" class="form-control @error('password') is-invalid @enderror">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            {{-- <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div> --}}
                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            <a class="btn btn-warning btn-block" href="{{ route('register') }}">Register</a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
