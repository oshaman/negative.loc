<div id="footer" class="sidebar-right">
    <div class="group inner footer_row_1 footer_cols_3">
        <div class="widget widget_nav_menu">
            <h3>Custom menu</h3>
            @if (!empty($footer))
            <div class="menu-footer-menu-container">
                {!! Menu::get('simpleNav')->asUl(array('id' => 'menu-footer-menu', 'class' => 'menu')) !!}
            </div>
            @endif
        </div>
    </div>
</div>