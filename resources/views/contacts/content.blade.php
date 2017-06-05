<div id="page_meta" class="home-section">
    <div class="inner group">
        <div class="meta-left">
            <div id="crumbs">
                <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
                    <a href="{{ route('home') }}" itemprop="url">
                        <span itemprop="title">{{ trans('ua.home') }}</span>
                    </a>
                </div>
                <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="crumb">
                    <a href="{{ route('contacts') }}" itemprop="url">
                        <span itemprop="title">{{ trans('ua.contacts') }}</span>
                    </a>
                </div>
                </ul>
            </div>
        </div>
        <div class="meta-right">
            <h2 class="page-title">Testimonials</h2>
            <div id="slogan">
                <h2>Our <span>customer</span> say..</h2>
            </div>
        </div>
    </div>
</div>

<div id="primary" class="layout-sidebar-right home-section">
    <div class="inner group">
<!-- START CONTENT -->
<div id="content" class="group">
@if (count($errors) > 0)
    <div class="contact-form">
            <p class="error">
            @foreach ($errors->toArray() as $key=>$error)
                {!! str_replace($key, '<strong>' . trans('ua.' . $key) . '</strong>', $error[0]) !!}</br>
            @endforeach
            </p>
    </div>
@endif
@if (session('status'))
    <div  class="contact-form">  <!-- For success/fail messages -->
        <p class="success">{{ trans('ua.' . session('status')) }}</p>
    </div>
@endif
<img src="{{ asset(config('settings.theme')) }}/images/exceptions/under-construction-01.jpg">
</div>