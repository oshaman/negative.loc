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
@if (count($errors) > 0)
    <div class="contact-form">
        
            @foreach ($errors->all() as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
   
    </div>
@endif
@if (session('status'))
    <div  class="contact-form">  <!-- For success/fail messages -->
        <p class="success">{{ trans('ua.' . session('status')) }}</p>
    </div>
@endif
<img src="{{ asset(config('settings.theme')) }}/images/exceptions/under-construction-01.jpg">
</div>