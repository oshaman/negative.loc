<div id="page_meta" class="home-section">
    <div class="inner group">
        <div class="meta-left">
            <h2 class="page-title">3 Columns</h2>
        </div>
        <div class="meta-right">
            <p id="crumbs" class="theme_breadcumb"><a class="home" href="index.html">Home Page</a>  //  <a class="no-link" href="">Portfolio</a>  //  <a class="no-link current" href="#">3 Columns</a></p>
        </div>
    </div>
</div>
<div id="primary" class="layout-sidebar-no home-section">
    <div class="inner group">
<!-- START CONTENT -->
<div id="content" class="group">
    <ul id="portfolio">
        @if($content)
        @foreach($content as $key => $event)
            <li class="status-publish hentry {{ (0 == $key or ($key%3) == 0) ? 'first' : (0 == ($key+1)%3 ? 'last' : '') }} col1_3 col">
                <a class="img" href="images/events/{{ $event->img }}">
                    <img src="{{ asset(config('settings.theme')) }}/images/portfolio/{{ $event->img }}" class="attachment-thumb_portfolio_3cols wp-post-image" alt="{{ $event->title }}" title="{{ $event->title }}" />
                </a>
                <h5><a href="{{ route('history'). '/' .$event->alias }}">{{ $event->title }}</a></h5>
                <p>{{ $event->desc }} &#8230;</p>
                <a href="{{ route('history'). '/' .$event->alias }}" class="btn btn-son-1 "><i class="icon-search"></i>{{ trans('ua.read_more') }}</a></a>                
            </li>
        @endforeach
    </ul>
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
</div>
<!-- END CONTENT --> 