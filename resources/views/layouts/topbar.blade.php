<div id="topbar">
    <div class="inner group">
        <div class="topbar-left"><a href="{{ route('home') }}">Negative.In.Ua</a></div>
        <div class="topbar-right">
            <ul class="topbar-level-1">
                <li><a href="#">Top bar menu</a>
                <ul class="sub-menu">
                    <li><a href="#">And submenu</a></li>
                    <li><a href="#"><i class="icon-home"></i>with icons</a></li>
                </ul>
                </li>
                <li><a href="{{ route('contacts') }}"><i class="icon-envelope"></i> Mail us</a></li>
                <li class="login_link"><i class="{{ Auth::check() ? 'icon-key' : 'icon-signin' }}"></i><a href="{{ Auth::check() ? route('logout') : route('login') }}">{{ Auth::check() ? Auth::user()->name : 'Login' }}</a>
                    @if (Auth::check())
                    <ul class="sub-menu">
                        <li><a href="{{ route('logout') }}"><i class="icon-signout"></i> Logout</a></li>
                    </ul>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>