<div id="page_meta" class="home-section">
    <div class="inner group">
        <div class="meta-left">
            <h2 class="page-title">Testimonials</h2>
            <div id="slogan">
                <h2>Our <span>customer</span> say..CAT</h2>
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
        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
            <a href="{{ url('/news/category') }}" itemprop="item">
                <span itemprop="name" class="label1">{{ trans('ua.news') }}</span>
                <meta itemprop="position" content="2" />
                <span class="arrow"><span></span></span>
            </a>
        </div>
        <div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="button">
                <span itemprop="name" class="label1">{{ $title }}</span>
                <meta itemprop="position" content="3" />
                <span class="arrow"><span></span></span>
            </a>
        </div>
    </div>
<!-- End crumbs -->
<h2>Negative: <span>{{ $title ?: trans('ua.home') }}</span></h2>
<div class="border-line"></div>
    @if($content)
    @foreach($content as $article)
    <div class="blog-small">
        <div class="thumbnail">
            <img src="{{ asset(config('settings.theme')) }}/images/articles/{{ $article->img->mini ?? ('templates/pic'.rand(1,14).'.jpg')}}" class="attachment-blog_small wp-post-image" alt="{{ $article->alias }}" title="{{ $article->title }}" />                        
        </div>
        <h2>{{ $article->title }}</h2>
        <div>
            <div class="meta-bottom">
                {!! str_limit($article->description, 288, '&#8230;') !!}
            </div>
            <div class="the-content">
                <p><a href="{{ route('articles', $article->alias) }}" class="btn btn-retro-package-3 btn-more-link">{{ trans('ua.read_more') }}</a></p>
                <p class="date-cat">
                    <i class="icon-calendar"></i>{{ date("d-m-Y H:i", strtotime($article->created_at)) }}
                    <i class="icon-external-link"></i> <span>{{ trans('ua.source') }}: <a href="http://{{ $article->source }}" class="link" rel="nofollow">{{ $article->source }}</a></span>
                </p>
            </div>
        </div>
    </div>
    @endforeach
    <!--PAGINATION-->
    
    <div class="general-pagination group">
    
    @if($content->lastPage() > 1) 
            
        @if($content->currentPage() !== 1)
            <a href="{{ $content->url(($content->currentPage() - 1)) }}">{{ Lang::get('pagination.previous') }}</a>
        @endif
        
        @for($i = 1; $i <= $content->lastPage(); $i++)
            @if($content->currentPage() == $i)
                <a class="selected disabled">{{ $i }}</a>
            @else
                <a href="{{ $content->url($i) }}">{{ $i }}</a>
            @endif		
        @endfor
        
        @if($content->currentPage() !== $content->lastPage())
            <a href="{{ $content->url(($content->currentPage() + 1)) }}">{{ Lang::get('pagination.next') }}</a>
        @endif
        
        
        @endif

    </div>
@else
    <h3>{{ trans('ua.no_events') }}</h3>
@endif
    
</div>