<div id="page_meta" class="home-section">
    <div class="inner group">
        <div class="meta-left">
            <h2 class="page-title">3 Columns</h2>
        </div>
        <div class="meta-right">
            <p id="crumbs" class="theme_breadcumb"><a class="home" href="index.html">Home Page</a>  //  <a class="no-link" href="portfolio.html">Portfolio</a>  //  <a class="no-link current" href="#">3 Columns</a></p>
        </div>
    </div>
</div>
<div id="primary" class="layout-sidebar-no home-section">
    <div class="inner group">
<!-- START CONTENT -->
<div id="content" class="group">
    <ul id="portfolio">
        @if($content)
            @foreach($content as $event)
        {{dd($event)}}
            <li class="status-publish hentry col1_3 col">
                <a class="img" href="images/portfolio/{{ $event->img }}"><img src="{{ asset(config('settings.theme')) }}/images/portfolio/{{ $event->img }}" class="attachment-thumb_portfolio_3cols wp-post-image" alt="{{ $event->title }}" title="{{ $event->title }}" /></a>
                <h5><a href="{{ route('history'). '/' .$event->alias }}">{{ $event->title }}</a></h5>
                <p>{{ $event->desc }} &#8230;</p>
                <a class="read-more" href="{{ route('history'). '/' .$event->alias }}" /><a href="{{ route('history'). '/' .$event->alias }}" class="btn btn-son-1 "><i class="icon-search"></i>{{ trans('ua.read_more') }}</a></a>                
            </li>
        @endforeach
        @else
            <h3>No Events</h3>
        @endif
    </ul>
    <div class="general-pagination group"><a href="#" class="selected">1</a><a href="#">2</a><a href="#">&rsaquo;</a></div>
</div>
<!-- END CONTENT --> 