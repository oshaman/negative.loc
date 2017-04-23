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
<h2>Negative: <span>{{ $title ?: trans('ua.home') }}</span></h2>
<div class="border-line"></div>
    @if($content)
    {{dd($content)}}
        @foreach($content as $article)
        
    @endforeach
@else
    <h3>{{ trans('ua.no_events') }}</h3>
@endif
    
</div>