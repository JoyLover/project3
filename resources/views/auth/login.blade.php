@extends('layouts.app')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf

					<span class="login100-form-title p-b-55">
						Login
					</span>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
                        <input id="email" type="email" placeholder="Email"
                               class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="email" value="{{ old('email') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
                        <input id="password" type="password" placeholder="Password"
                               class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                               name="password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="contact100-form-checkbox m-l-4">
                        <input class="input-checkbox100" id="ckb1" type="checkbox"
                               name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>

                    <div class="container-login100-form-btn p-t-25">
                        <button type="submit" class="login100-form-btn">
                            {{ __('Login') }}
                        </button>
                    </div>

                    <div class="text-center w-full p-t-10">
                        <a class="txt1 bo1 hov1" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>

                    <div class="text-center w-full p-t-42 p-b-22">
						<span class="txt1">
							Or login with
						</span>
                    </div>

                    <a href="#" class="btn-face m-b-10">
                        <i class="fa fa-facebook-official"></i>
                        Facebook
                    </a>

                    <a href="#" class="btn-google m-b-10">
                        <img src="{{ asset('images/icons/icon-google.png') }}" alt="GOOGLE">
                        Google
                    </a>

                    <div class="text-center w-full p-t-115">
						<span class="txt1">
							Not a member?&nbsp;&nbsp;
						</span>

                        <a class="txt1 bo1 hov1" href="{{ route('register') }}">
                            Sign Up
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
