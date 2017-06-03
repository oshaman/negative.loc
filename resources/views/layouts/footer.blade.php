<div id="footer" class="sidebar-right">
    <div class="group inner footer_row_1 footer_cols_3">
        <div class="widget-first widget recent-posts">
            <h3>{{ trans('ua.latest_news') }}</h3>
            <div class="recent-post group">
                <div class="hentry-post group">
                    <p class="post-date"><span class="day">2</span><span class="month">May</span><span class="year">2045</span></p>
                    <h3><a href="#" class="title">Another great article of the blog</a></h3>
                    <p class="meta"> <span class="comments"><a href="#">2 comments</a></span><br>
                    <a href="#" class="read-more"></a> </p>
                </div>
                <div class="hentry-post group">
                    <p class="post-date"><span class="day">30</span><span class="month">April</span><span class="year">2045</span></p>
                    <h3><a href="#" class="title">Fall in Love with Mem&eacute;nto theme!</a></h3>
                    <p class="meta"><span class="comments"><a href="">No comments</a></span><br>
                    <a href="#" class="read-more"></a> </p>
                </div>
            </div>
        </div>
        <div class="widget widget_nav_menu">
            <h3>{{ trans('ua.navi') }}</h3>
            @if (!empty($footer))
            <div class="menu-footer-menu-container">
                    {!! Menu::get('simpleNav')->asUl(array('id' => 'menu-footer-menu', 'class' => 'menu')) !!}
            </div>
            @endif
        </div>
        <div class="quick-contact-widget widget two-third last">
            <div class="widget-last widget quick-contact">
                <h3>{{ trans('ua.contact_us') }}</h3>
                <p>{{ trans('ua.required') }} - *</p>
                <form id="contact-form-example" class="contact-form" method="post" action="{{ route('contacts') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <fieldset>
                        <ul>
                            <li class="text-field">
                                <label for="name-example"> <span class="label">{{ old('name') ? '' : trans('ua.name') . '*' }}</span> </label>
                                <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                                <input type="text" name="name" id="name-example" class="required" value="{{ old('name') }}" required>
                                </div>
                            </li>
                            <li class="text-field">
                                <label for="email-example"> <span class="label">{{ old('email') ? '' : trans('ua.email') . '*' }}</span> </label>
                                <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span>
                                <input type="email" name="email" id="email-example" class="required email-validate" value="{{ old('email') }}" required>
                                </div>
                            </li>
                            <li class="textarea-field">
                                <label for="message-example"> <span class="label">{{ old('message') ? '' : trans('ua.message') . '*' }}</span> </label>
                                <div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
                                    <textarea name="message" id="message-example" rows="8" cols="30" class="required"required>{{ old('message') }}</textarea>
                                </div>
                            </li>
                                <li class="submit-button">
                                <input type="submit" name="yiw_sendemail" value="{{ trans('ua.send_message') }}" class="sendmail alignright">
                            </li>
                        </ul>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>