@extends('layouts.app')

@section('topbar')
@include('layouts.topbar')
@endsection



@section('footer')
<div id="footer" class="sidebar-right">
    <div class="group inner footer_row_1 footer_cols_3">
        <div class="container">
            <div class="quick-contact-widget widget two-third last">
                <div class="widget-last widget quick-contact">
                    <h3>Reset Password</h3>
                @if (session('status'))
                    <div class="alert alert-success">
                    {{ session('status') }}
                    </div>
                @endif
                    <form id="contact-form-example" class="contact-form" method="post" action="{{ route('login') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <fieldset>
                        <ul>
                            <li class="text-field">
                                <label for="email"> <span class="label">Email</span> </label>
                                <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span>
                                    <input type="email" name="email" id="email" class="required email-validate" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                                </div>
                            </li>
                            <li class="submit-button">
                                <input type="submit" class="sendmail alignright" value="Send Password Reset Link">
                                    
                            </li>
                        </ul>
                        </fieldset>
                    </form>
                </div>
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
