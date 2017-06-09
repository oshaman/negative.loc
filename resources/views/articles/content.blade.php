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
    <!-- Crumbs -->
    <div id="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
            <a href="{{ route('home') }}" itemprop="item">
                <span itemprop="name" class="label1">{{ trans('ua.home') }}</span>
                <meta itemprop="position" content="1" />
                <span class="arrow"><span></span></span>
            </a>
        </div>
        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
            <a href="{{ url('/news/category') }}" itemprop="item">
                <span itemprop="name" class="label1">{{ trans('ua.news') }}</span>
                <meta itemprop="position" content="2" />
                <span class="arrow"><span></span></span>
            </a>
        </div>
        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
            <a href="{{ route('cat_alias', $content->category->title) }}" itemprop="item">
                <span itemprop="name" class="label1">{{ trans('categories.' . $content->category->title) }}</span>
                <meta itemprop="position" content="3" />
                <span class="arrow"><span></span></span>
            </a>
        </div>
        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
            <span itemprop="name" class="label1">{{ str_limit($content->title, 32) }}</span>
            <meta itemprop="position" content="4" />
            <span class="arrow"><span></span></span>
        </div>
    </div>
<!-- End crumbs -->
    <div class="clear"></div>
    
    <div class="post hentry-post blog-big">
        <div class="meta group">
            <p class="date">
                <i class="icon-calendar"></i>{{ date('d-m-Y H:i', strtotime($content->created_at)) }}
            </p>
            <p class="author">
                <i class="icon-external-link"></i> <span>{{ trans('ua.source') }}:
                <a href="{{ $content->source ?: route('home') }}"  class="link">{{ $content->source }}</a></span>
            </p>
            <p class="categories">
                <i class="icon-tags"></i> <span>{{ trans('ua.cat') }}: <a href="{{ route('cat_alias', $content->category->alias) }}" class="cats">{{ trans('categories.' . $content->category->title) }}</a></span>
            </p>
        </div>
        <div class="thumbnail">
            <h1 class="post-title">{{ $content->title }}</h1>
            <div class="image-wrap">
                <img width="720" height="298" src="{{ asset(config('settings.theme')) }}/images/articles/{{ $content->img->max ?? ('templates/pic'.rand(1,14).'.jpg')}}" class="attachment-blog_big wp-post-image" alt="{{ $content->title }}" title="{{ $content->title }}" />                            
            </div>
        </div>
        <div class="clearer"></div>
        <div class="the-content-single">
            {!! $content->text !!}
        </div>
    </div>
    
    
    
</div>
<!-- END CONTENT -->