<?php

function register_menus()
{
    register_nav_menus(
        array(
            'navigation-menu' => __('Top Navigation Menü'),
            'navigation-submenu' => __('Navigation Submenü'),
            'social-media' => __('Social Media'),
            'social-media--white' => __('Social Media weiße Icons'),
            'footer' => __('Footer')
        )
    );
}
