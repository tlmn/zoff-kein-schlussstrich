<?php

function register_menus()
{
    register_nav_menus(
        array(
            'navigation-menu' => __('Top Navigation Menü'),
            'navigation-submenu' => __('Navigation Submenü'),
            'social-media' => __('Social Media'),
            'footer' => __('Footer')
        )
    );
}
