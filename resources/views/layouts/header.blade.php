<div id="header" class="group">
    <div class="group inner">
        <div id="logo" class="group">
            <h1> <a class="logo-text" href="#">Nega<span>t</span>ive</a></h1>
            <p>{{ trans('ua.only_trash') }}</p>
        </div>
        @if ($menu)
        <div id="nav" class="group">
            {!! Menu::get('MyNav')->asUl(array('id' => 'menu-main-nav', 'class' => 'level-1')) !!}
        </div>
        @endif
    </div>
</div>