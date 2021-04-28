<?php
function cpt_event()
{
    $labels = array(
        'name'                  => _x('Veranstaltungen', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Veranstaltung', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Veranstaltungen', 'text_domain'),
        'name_admin_bar'        => __('Veranstaltungen', 'text_domain'),
        'archives'              => __('Archiv', 'text_domain'),
        'attributes'            => __('Veranstaltung Eigenschaften', 'text_domain'),
        'parent_item_colon'     => __('Eltern-Veranstaltung', 'text_domain'),
        'all_items'             => __('Alle Veranstaltungen', 'text_domain'),
        'add_new_item'          => __('Neue Veranstaltung', 'text_domain'),
        'add_new'               => __('Neue Veranstaltung', 'text_domain'),
        'new_item'              => __('Neue Veranstaltung', 'text_domain'),
        'edit_item'             => __('Veranstaltung bearbeiten', 'text_domain'),
        'update_item'           => __('Veranstaltung aktualisieren', 'text_domain'),
        'view_item'             => __('Veranstaltung anzeigen', 'text_domain'),
        'view_items'            => __('Veranstaltungen anzeigen', 'text_domain'),
        'search_items'          => __('Veranstaltung suchen', 'text_domain'),
        'not_found'             => __('Nicht gefunden', 'text_domain'),
        'not_found_in_trash'    => __('Nicht gefunden im Papierkorb', 'text_domain'),
        'featured_image'        => __('Feature-Bild', 'text_domain'),
        'set_featured_image'    => __('Feature-Bild setzen', 'text_domain'),
        'remove_featured_image' => __('Feature-Bild entfernen', 'text_domain'),
        'use_featured_image'    => __('Als Feature-Bild verwenden', 'text_domain'),
        'insert_into_item'      => __('In Veranstaltung einfügen', 'text_domain'),
        'uploaded_to_this_item' => __('Zu diesem Veranstaltung hochgeladen', 'text_domain'),
        'items_list'            => __('Veranstaltungen auflisten', 'text_domain'),
        'items_list_navigation' => __('Veranstaltungen-Navigation', 'text_domain'),
        'filter_items_list'     => __('Veranstaltungen filtern', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Veranstaltung', 'text_domain'),
        'description'           => __('Post Type für Veranstaltung-Seiten', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'revisions'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'show_in_rest'          => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'menu_icon'             => 'dashicons-calendar-alt'
    );
    register_post_type('event', $args);
}

function cpt_eventLocation()
{
    $labels = array(
        'name'                  => _x('Veranstaltungen', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Veranstaltungsort', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Veranstaltungsorte', 'text_domain'),
        'name_admin_bar'        => __('Veranstaltungsorte', 'text_domain'),
        'archives'              => __('Archiv', 'text_domain'),
        'attributes'            => __('Veranstaltungsort Eigenschaften', 'text_domain'),
        'parent_item_colon'     => __('Eltern-Veranstaltungsort', 'text_domain'),
        'all_items'             => __('Alle Veranstaltungsorte', 'text_domain'),
        'add_new_item'          => __('Neuer Veranstaltungsort', 'text_domain'),
        'add_new'               => __('Neuer Veranstaltungsort', 'text_domain'),
        'new_item'              => __('Neuer Veranstaltungsort', 'text_domain'),
        'edit_item'             => __('Veranstaltungsort bearbeiten', 'text_domain'),
        'update_item'           => __('Veranstaltungsort aktualisieren', 'text_domain'),
        'view_item'             => __('Veranstaltungsort anzeigen', 'text_domain'),
        'view_items'            => __('Veranstaltungsorte anzeigen', 'text_domain'),
        'search_items'          => __('Veranstaltungsort suchen', 'text_domain'),
        'not_found'             => __('Nicht gefunden', 'text_domain'),
        'not_found_in_trash'    => __('Nicht gefunden im Papierkorb', 'text_domain'),
        'featured_image'        => __('Feature-Bild', 'text_domain'),
        'set_featured_image'    => __('Feature-Bild setzen', 'text_domain'),
        'remove_featured_image' => __('Feature-Bild entfernen', 'text_domain'),
        'use_featured_image'    => __('Als Feature-Bild verwenden', 'text_domain'),
        'insert_into_item'      => __('In Veranstaltungsort einfügen', 'text_domain'),
        'uploaded_to_this_item' => __('Zu diesem Veranstaltungsort hochgeladen', 'text_domain'),
        'items_list'            => __('Veranstaltungsorte auflisten', 'text_domain'),
        'items_list_navigation' => __('Veranstaltungsorte-Navigation', 'text_domain'),
        'filter_items_list'     => __('Veranstaltungsorte filtern', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Veranstaltungsort', 'text_domain'),
        'description'           => __('Post Type für Veranstaltungsort-Seiten', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'revisions'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'show_in_rest'          => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'menu_icon'             => 'dashicons-admin-post'
    );
    register_post_type('eventLocation', $args);
}