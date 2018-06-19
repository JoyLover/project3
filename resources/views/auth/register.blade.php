@extends('layouts.app')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-50 p-r-50 p-t-20 p-b-20">
                <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
                    @csrf

					<span class="login100-form-title p-b-20">
						Register
					</span>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "First name is required">
                        <input id="first-name" type="text" placeholder="First Name"
                               class="input100 form-control{{ $errors->has('first-name') ? ' is-invalid' : '' }}"
                               name="first-name" value="{{ old('first-name') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<span class="fa fa-user"></span>
						</span>

                        @if ($errors->has('first-name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('first-name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Last name is required">
                        <input id="last-name" type="text" placeholder="Last Name"
                               class="input100 form-control{{ $errors->has('last-name') ? ' is-invalid' : '' }}"
                               name="last-name" value="{{ old('last-name') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<span class="fa fa-user"></span>
						</span>

                        @if ($errors->has('last-name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('last-name') }}</strong>
                            </span>
                        @endif
                    </div>

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

                    <div class="wrap-input100 m-b-16">
                        <input id="mobile" type="text" placeholder="Phone number"
                               class="input100 form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                               name="mobile" value="{{ old('mobile') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<span class="lnr lnr-phone-handset"></span>
						</span>
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

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
                        <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}"
                               class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                               name="password_confirmation">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button type="submit" class="login100-form-btn">
                            {{ __('Register') }}
                        </button>
                    </div>

                    <div class="text-center w-full p-t-32 p-b-22">
						<span class="txt1">
							Or login with
						</span>
                    </div>

                    <a href="#" class="btn-face m-b-5">
                        <i class="fa fa-facebook-official"></i>
                        Facebook
                    </a>

                    <a href="#" class="btn-google m-b-5">
                        <img src="{{ asset('images/icons/icon-google.png') }}" alt="GOOGLE">
                        Google
                    </a>

                    <div class="text-center w-full p-t-20">
						<span class="txt1">
							Already has an account?&nbsp;&nbsp;
						</span>

                        <a class="txt1 bo1 hov1" href="{{ route('login') }}">
                            Sign In
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

