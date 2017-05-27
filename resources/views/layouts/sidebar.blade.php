<div id="sidebar" class="group one-fourth last">
        <div id="contentt">
        <div class="tabs-container">
            <ul class="tabs">
                <li>
                    <h4><a href="#tab1" title="Currency">{{ trans('ua.currency') }}</a></h4>
                </li>
                <li>
                    <h4><a href="#tab2" title="Weather">{{ trans('ua.weather') }}</a></h4>
                </li>
            </ul>
            <div class="border-box group">
                <div id="tab1" class="panel group">
                    <table class="table-grey">
                    <thead>
                        <tr><th></th><th>{{ trans('ua.buy') }}</th><th>{{ trans('ua.sell') }}</th><th>{{ trans('ua.nbu') }}</th><tr>
                    </thead>
                    <tbody>
                        <tr><td>USD</td><td>15.00</td><td>16.00</td><td>15.10<span class="up"> &uarr;</span></td></tr>
                        <tr><td>EUR</td><td>15.00</td><td>16.00</td><td>15.10<span class="down"> &darr;</span></td></tr>
                        <tr><td>RUB</td><td>15.00</td><td>16.00</td><td>15.10<span class="up"> &uarr;</span></td></tr>
                    </tbody>
                    </table>
                </div>
                <div id="tab2" class="panel group">
                    <h4>Your Title of Tab 3</h4>
                    <div id='openweathermap-widget'></div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-first widget popular-posts">
        <h3>From the <span>blog</span></h3>
        <div class="recent-post group">
        <div class="hentry-post group">
        <div class="thumb-img"><img src="{{ asset(config('settings.theme')) }}/images/blog/blog1-55x55.jpg" class="attachment-thumb_recentposts wp-post-image" alt="website template image" title=""></div>
        <a href="#" class="title">Another great article of the blog</a>
        <p class="post-date">May 2, 2045</p>
        </div>
        <div class="hentry-post group">
        <div class="thumb-img"><img src="{{ asset(config('settings.theme')) }}/images/blog/Fotolia_2885999_Subscription_XL-720x367-55x55.jpg" class="attachment-thumb_recentposts wp-post-image" alt="website template image" title=""></div>
        <a href="#" class="title">Meet Mem&eacute;nto WordPress theme</a>
        <p class="post-date">February 26, 2045</p>
        </div>
        <div class="hentry-post group">
        <div class="thumb-img"><img src="{{ asset(config('settings.theme')) }}/images/blog/Fotolia_26908_Subscription_XL-720x296-55x55.jpg" class="attachment-thumb_recentposts wp-post-image" alt="website template image" title=""></div>
        <a href="#" class="title">A fresh WordPress theme for your site</a>
        <p class="post-date">March 4, 2045</p>
        </div>
        </div>
    </div>
</div>

 <script type='text/javascript'>
                    window.myWidgetParam = {
                        id: 24,
                        cityid: 703448,
                        appid: 'a58b1469c263b1d43f666468b1ed1757',
                        units: 'metric',
                        containerid: 'openweathermap-widget',
                    };
                    (function() {
                        var script = document.createElement('script');
                        script.type = 'text/javascript';
                        script.async = true;
                        script.src = 'https://openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js';
                        var s = document.getElementsByTagName('script')[0];
                        s.parentNode.insertBefore(script, s);
                    })();
                  </script>