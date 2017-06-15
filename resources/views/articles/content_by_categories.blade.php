<div id="page_meta" class="home-section">
    <div class="inner group">
        <div class="meta-left">
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
<!-- Crumbs -->
<div id="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
    <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
        <a href="{{ route('home') }}" itemprop="item">
            <span itemprop="name" class="label1">{{ trans('ua.home') }}</span>
            <meta itemprop="position" content="1" />
            <span class="arrow"><span></span></span>
        </a>
    </div>
    <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"  class="button">
        <span itemprop="name" class="label1">{{ trans('ua.news') }}</span>
        <span class="arrow"><span></span></span>
        <meta itemprop="position" content="2" />
    </div>
</div>
<!-- End crumbs -->
<h2>Negative: <span>{{ $title ?: trans('ua.home') }}</span></h2>
<div class="border-line"></div>
@if($content)
    @foreach($content as $cat=>$articles)
    <div  class="category">    
        <h2><a href="{{ route('cat_alias', $cat) }}">{{trans('categories.title_' . $cat)}}</a></h2>
        <div class="border-line"></div>
        @if($articles)
        @foreach($articles as $article)
                <time>{{ date('H-i', strtotime($article->created_at)) }}</time>
                <div class="block">
                    <a href="{{ route('articles',  $article->alias ) }}" class="links">{{ $article->title }}</a>
                </div>
        @endforeach
        @else
            <h3>{{ trans('ua.no_events') }}</h3>
        @endif
    </div>
    @endforeach
@else
    <h3>{{ trans('ua.no_events') }}</h3>
@endif
</div>