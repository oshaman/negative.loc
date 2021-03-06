@extends('layouts.app')

@section('topbar')
    @include('layouts.topbar', ['top' => 'Log In'])
@endsection



@section('footer')

<div id="footer" class="sidebar-right">
    <div class="group inner footer_row_1 footer_cols_3">
        <div class="quick-contact-widget widget two-third last">
        <div class="widget-last widget quick-contact">
            <h3>Login</h3>
            <form id="contact-form-example" class="contact-form" method="post" action="{{ route('login') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <fieldset>
                    <ul>
                        <li class="text-field">
                            <label for="email"> <span class="label">{{ old('email') ? '' : trans('ua.email') . '*' }}</span> </label>
                            <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span>
                                <input type="email" name="email" id="email" class="required email-validate" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            </div>
                        </li>
                        <li class="text-field">
                            <label for="password"> <span class="label">Password</span> </label>
                            <div class="input-prepend"><span class="add-on"><i class="icon-key"></i></span>
                                <input type="password" name="password" id="password" class="required" value="">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            </div>
                        </li>
                        <li class="submit-button">
                            <div class="checkbox">
                                <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </li>
                        <li class="submit-button">
                            <input type="submit" name="yiw_sendemail" value="Login" class="sendmail alignright">
                        </li>
                        <a class="btn-safron-umbrella-2" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>

                        <a class="btn-safron-umbrella-2" href="{{ route('register') }}">
                            Register
                        </a>
                    </ul>
                </fieldset>
            </form>
        </div>
    </div>
    </div>
</div>
<div id="page_meta" class="home-section">
    <div id="content" class="group">
        <img src="{{ asset(config('settings.theme')) }}/images/exceptions/under-construction-01.jpg">
    </div>			    
</div>
@endsection