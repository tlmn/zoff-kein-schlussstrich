<?php

function register_menus()
{
    register_nav_menus(
        array(
            'navigation-menu' => __('Top Navigation Menü'),
            'footer' => __('Footer')
        )
    );
}
