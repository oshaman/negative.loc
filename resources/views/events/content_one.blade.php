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
        <div class="clear"></div>
        <div class="posts">
            <div class="portfolio type-portfolio status-publish hentry hentry-post group portfolio-post internal-post">
                <div class="post_header portfolio_header group">
                    <img src="{{ asset(config('settings.theme')) }}/images/events/{{ $content->img->max ?? '../no-picture.png'}}" class="internal wp-post-image" alt="{{ $content->title }}" title="{{ $content->title }}" />                                
                    <h2>{{ $content->title }}</h2>
                </div>
                <div class="post_content group  no-skills ">
                    <div class="meta-bottom">
                        {!! $content->description !!}
                        {!! $content->text !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->                                  
    <div id="sidebar" class="group one-fourth last">
        <div id="more_projects-2" class="widget-1 widget-first widget-last widget more_projects">
            <h2>{{ trans('ua.featured_events') }}</h2>
            <div class="more-projects-widget">
                <div class="top"><a class="prev" href="#">Prev</a></div>
                <div class="sliderWrap">
                    <ul>
                        @if($content->events)
                        @foreach($content->events as $event)
                            @if($event->alias === $content->alias)
                                @continue
                            @endif
                        <li class="work-item group">
                            <a class="work-thumb" href="{{ route('history', $event->alias) }}"><img width="86" height="86" src="{{ asset(config('settings.theme')) }}/images/events/{{ $event->img->micro ?? '../no-image2.jpg' }}" class="attachment-thumb_more_projects wp-post-image" alt="{{$event->title}}" title="{{$event->title}}" /></a>
                            <a class="meta work-title" href="{{ route('history', $event->alias) }}">{{ $event->title }}</a>
                        </li>
                        @endforeach
                        @else
                            <h3>{{ trans('ua.no_events') }}</h3>
                        @endif
                    </ul>
                </div>
                <div class="controls"><a class="next" href="#">Next</a></div>
            </div>
            <script type="text/javascript">
                jQuery(document).ready(function($){
                    var slider_wrap = $('.more-projects-widget');
                    var height_item = $('li', slider_wrap).outerHeight();
                    var height_ul   = $('ul', slider_wrap).height();
                    var height_wrap = $('.sliderWrap', slider_wrap).height();
                    var n_items     = $('li', slider_wrap).length;
                    var visible     = 4;
                
                    $('.controls, .top', slider_wrap).show();
                
                    // adjust height, according to visible item
                    $('.sliderWrap', slider_wrap).css('height', height_item * visible - 6);
                
                    function check_position() {    
                        var margin_top_ul = $('ul', slider_wrap).css('margin-top');
                        var max_offset  = ( n_items - visible ) * height_item * -1;
                
                        if ( margin_top_ul == '0px' ) {
                            $('.prev', slider_wrap).addClass('disabled');
                        }
                
                        if ( margin_top_ul == max_offset+'px' ) {
                            $('.next', slider_wrap).addClass('disabled');
                        }
                    }
                
                    check_position();
                
                    $('.next:not(.disabled)', slider_wrap).live('click',function(){
                        $('ul', slider_wrap).animate( {marginTop:'-='+height_item}, 200, function(){ check_position(); } );
                        $('.prev', slider_wrap).removeClass('disabled');
                        return false;
                    });
                
                    $('.prev:not(.disabled)', slider_wrap).live('click',function(){
                        $('ul', slider_wrap).animate( {marginTop:'+='+height_item}, 200, function(){ check_position(); } );
                        $('.next', slider_wrap).removeClass('disabled');
                        return false;
                    });
                
                    $('.disabled', slider_wrap).live('click', function(){
                        return false;
                    });
                });
            </script>
        </div>
    </div>
</div>
</div>
<div class="clear"></div>
</div>     
<!-- END WRAPPER -->