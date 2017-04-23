@extends('layouts.app')

@section('topbar')
    @include('layouts.topbar', ['top'=>'404'])
@endsection

@section('content')
<div id="page_meta" class="home-section">
    <div class="inner group">
        <div class="meta-left">
            <h2 class="page-title">Testimonials</h2>
            <div id="slogan">
                <h2>Our <span>customer</span> say..</h2>
            </div>
        </div>
        <div class="meta-right">
            <p id="crumbs" class="theme_breadcumb"><a class="home" href="#">Home Page</a>  //  <a class="no-link" href="#">Portfolio</a>  //  <a class="no-link current" href="#">Full Description</a></p>
        </div>
    </div>
</div>

<div id="primary" class="layout-sidebar-right home-section">
<div class="inner group">
    <!-- START CONTENT -->
    <div id="content" class="group">
     <img class="error-404-image group" src="{{ asset(config('settings.theme')) }}/images/exceptions/404.png " title="404 Error" alt="404 Error" />
     <div class="error-404-text group">
        <h2 />
        {{ trans('404.Something bad happened') }}
        <h2 />
        <h3>{{ trans('404.but don\'t worry, you can') }} <a href="{{ route('home') }}">{{ trans('404.return to the home page') }}</a>.</h3>
     </div>
    </div>
    <!-- END CONTENT -->
@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('footer')
    <div id="footer" class="sidebar-right">
    <div class="group inner footer_row_1 footer_cols_3">
        <div class="quick-contact-widget widget two-third last">
            <div class="widget-last widget quick-contact">
                <h3>Quick Contact</h3>
                <form id="contact-form-example" class="contact-form" method="post" action="{{ route('contacts') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <fieldset>
                        <ul>
                            <li class="text-field">
                                <label for="name-example"> <span class="label">{{ trans('ua.name') }}</span> </label>
                                <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                                <input type="text" name="name" id="name-example" class="required" value="">
                                </div>
                            </li>
                            <li class="text-field">
                                <label for="email-example"> <span class="label">Email</span> </label>
                                <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span>
                                <input type="text" name="email" id="email-example" class="required email-validate" value="">
                                </div>
                            </li>
                            <li class="textarea-field">
                                <label for="message-example"> <span class="label">{{ trans('ua.message') }}</span> </label>
                                <div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
                                    <textarea name="message" id="message-example" rows="8" cols="30" class="required"></textarea>
                                </div>
                            </li>
                                <li class="submit-button">
                                <input type="submit" name="yiw_sendemail" value="{{ trans('ua.send_message') }}" class="sendmail alignright">
                            </li>
                        </ul>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection