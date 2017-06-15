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
                    @isset($rates)
                        @foreach($rates as $rate)
                        <tr>
                            <td>{{ $rate->cc }}</td>
                            <td>
                                {{ $rate->cc !== 'RUB' ? round($rate->rate*0.99+0.01, 2) : round($rate->rate*0.96, 4) }}
                            </td>
                            <td>
                                
                                {{ $rate->cc !== 'RUB' ? round($rate->rate*1.01+0.01, 2) : round($rate->rate*1.04, 4) }}
                            </td>
                            <td>{{  round($rate->rate, 4) }}
                                    @if ($rate->flag == 1) <span class="up">&uArr;
                                    @elseif ($rate->flag == 2) <span class="down">&dArr;
                                    @else <span>&hArr;
                                </span>
                                    @endif
                            </td>
                        </tr>
                        @endforeach
                    @endisset
                    </tbody>
                    </table>
                </div>
                <div id="tab2" class="panel group">
                    <table class="table-grey">
                    <thead>
                        <tr><th>{{ trans('ua.weather') . ' ' . trans('ua.on') . ' - ' . date('d.m.Y')}}</th></tr>
                    </thead>
                    <tbody>
                    @isset($weather)
                        @foreach($weather as $val)
                        <tr><td>
                        <div>
                            <div class="weather">
                            <div class="cityname"><h3>{{trans('ua.' . $val->city)}}</h3></div>
                                <div  class="wparam">
                                    <div class="pic"><img src="{{ asset(config('settings.theme')) }}/images/thermometer.png"></div>
                                    <div class="temp">{{ $val->temp_curr>0 ? '+' : ''}}{{ $val->temp_curr}}&deg;</div>
                                    <div class="pic">
                                        <img src="http://openweathermap.org/img/w/{{ $val->icon }}.png">
                                    </div>
                                </div>
                                <div  class="wparam-right">
                                    <p>вологість: <span>{{ $val->humidity }}%</span></p>
                                    <p>тиск: <span>{{ $val->pressure . ' ' . trans('ua.mm')}}</span></p>
                                    <p>вітер: 
                                        <span>{{ $val->wind_speed  . ' ' . trans('ua.ms')}}</span>
                                        @if ($val->wind_deg < 23 || $val->wind_deg >= 338)
                                            <img src="{{ asset(config('settings.theme')) }}/images/icons/wind/n.png" alt="{{ trans('ua.n') }}" title="{{ trans('ua.n') }}">
                                        @elseif ($val->wind_deg >= 23 && $val->wind_deg < 68)
                                            <img src="{{ asset(config('settings.theme')) }}/images/icons/wind/ne.png" alt="{{ trans('ua.ne') }}" title="{{ trans('ua.ne') }}">
                                        @elseif ($val->wind_deg >= 68 && $val->wind_deg < 113)
                                            <img src="{{ asset(config('settings.theme')) }}/images/icons/wind/e.png" alt="{{ trans('ua.e') }}" title="{{ trans('ua.e') }}">
                                        @elseif ($val->wind_deg >= 113 && $val->wind_deg < 158)
                                            <img src="{{ asset(config('settings.theme')) }}/images/icons/wind/se.png" alt="{{ trans('ua.se') }}" title="{{ trans('ua.se') }}">
                                        @elseif ($val->wind_deg >= 158 && $val->wind_deg < 203)
                                            <img src="{{ asset(config('settings.theme')) }}/images/icons/wind/s.png" alt="{{ trans('ua.s') }}" title="{{ trans('ua.s') }}">
                                        @elseif ($val->wind_deg >= 203 && $val->wind_deg < 248)
                                            <img src="{{ asset(config('settings.theme')) }}/images/icons/wind/sw.png"
                                            alt="{{ trans('ua.sw') }}" title="{{ trans('ua.sw') }}">
                                        @elseif ($val->wind_deg >= 248 && $val->wind_deg < 293)
                                            <img src="{{ asset(config('settings.theme')) }}/images/icons/wind/w.png" alt="{{ trans('ua.w') }}" title="{{ trans('ua.w') }}">
                                        @else
                                            <img src="{{ asset(config('settings.theme')) }}/images/icons/wind/nw.png" alt="{{ trans('ua.nw') }}" title="{{ trans('ua.nw') }}">
                                        @endif
                                    </p>
                                </div>
                                <div class="temp_m">
                                    <div class="sun">{{ trans('ua.min') }} <span>{{ $val->temp_min>0 ? '+' : ''}}{{ $val->temp_min }}&deg;</span></div>
                                    <div class="sun">{{ trans('ua.max') }} <span>{{ $val->temp_max>0 ? '+' : ''}}{{ $val->temp_max }}&deg;</span></div>
                                    
                                </div>
                                <div>
                                    <div  class="sun">Cхід {{ date("H:i", strtotime($val->sunrise)) }}</div>
                                    <div  class="sun">Захід {{ date("H:i", strtotime($val->sunset)) }}</div>
                                </div>
                            </div>
                        </div>
                        </td></tr>
                        @endforeach
                    @endisset
                    </tbody>
                    </table>
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