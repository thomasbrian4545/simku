@extends('layout.auth')
@section('title', 'Register')
@section('content')
    <div class="register-box">
        <div class="register-logo">
            <b>Register </b>SIMKU</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>
                <div class="mt-5">
                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>
                <form action="{{ route('register.store') }}" method="post">
                    @csrf
                    @error('fullname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="text" id="fullname" name="fullname" value="{{ old('fullname') }}"
                            placeholder="Full name" class="form-control @error('fullname') is-invalid @enderror">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-tie"></span>
                            </div>
                        </div>
                    </div>
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
                    @error('email')
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
                    </div>
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
                    {{-- <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password_confirmation"
                            placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-0">
                            {{-- <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div> --}}
                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="login-box-msg"><a href="{{ route('login') }}" class="text-center">I already have a membership</a></p>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
@endsection
