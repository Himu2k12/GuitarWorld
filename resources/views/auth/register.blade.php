
@extends('layouts.app')

@section('content')

    <div class="limiter">
        <div class="container-login100" style="background-image: url('{{asset('/sty/')}}/images/bg-01.jpg');">
            <div class="wrap-login100">
                <form class="login100-form validate-form"  method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

                    <span class="login100-form-title p-b-34 p-t-27">
						Register
					</span>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="wrap-input100 validate-input" data-validate = "Enter name">
                            <input id="name" class="input100" type="text" name="name" placeholder="Name">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>
                        @if ($errors->has('name'))

                            <span class="help-block">
                                <h5 style="color: black"><strong>{{ $errors->first('name') }}</strong></h5>
                            </span>
                        @endif
                    </div>
                    {{--<input id="role" type="number" class="form-control" name="role" required>--}}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="wrap-input100 validate-input" data-validate = "Enter username">
                            <input id="email" class="input100" type="email" name="email" placeholder="Email Address">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>
                        @if ($errors->has('email'))

                            <span class="help-block">
                                <h5 style="color: black"><strong>{{ $errors->first('email') }}</strong></h5>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input id="password" class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>

                        </div>

                        @if ($errors->has('password'))
                            <span class="help-block">
                            <h5 style="color: black"><strong>{{ $errors->first('password') }}</strong></h5>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password-confirm') ? ' has-error' : '' }}">
                        <div class="wrap-input100 validate-input" data-validate="Enter confirm password">
                            <input id="password-confirm" class="input100" type="password" name="password_confirmation" placeholder="Confirm Password">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>

                        </div>

                        @if ($errors->has('password-confirm'))
                            <span class="help-block">
                            <h5 style="color: black"><strong>{{ $errors->first('password-confirm') }}</strong></h5>
                                    </span>
                        @endif
                    </div>

                    <div class="contact100-form-checkbox">

                        <div class="wrap-input100 validate-input" data-validate="Enter confirm password">
                            <select id="password-confirm" class="input100" name="role">
                                <option value="customer" style="color:black">Customer</option>
                                <option value="dealer" style="color:black">Dealer</option>
                                <option value="brand" style="color:black">Brand/Company</option>
                                <option value="artist" style="color:black">Artist</option>
                            </select>
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>

                        </div>

                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            reigster
                        </button>
                    </div>

                    <div class="text-center p-t-90">
                        <a class="txt1" href="{{url('/login') }}">
                            Already Registered?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>



@endsection
