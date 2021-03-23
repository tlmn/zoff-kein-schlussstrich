<?php
function cpt_schwerpunkt()
{
    $labels = array(
        'name'                  => _x('Schwerpunkte', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Schwerpunkt', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Schwerpunkte', 'text_domain'),
        'name_admin_bar'        => __('Schwerpunkte', 'text_domain'),
        'archives'              => __('Archiv', 'text_domain'),
        'attributes'            => __('Schwerpunkt Eigenschaften', 'text_domain'),
        'parent_item_colon'     => __('Eltern-Schwerpunkt', 'text_domain'),
        'all_items'             => __('Alle Schwerpunkte', 'text_domain'),
        'add_new_item'          => __('Neuer Schwerpunkt', 'text_domain'),
        'add_new'               => __('Neuer Schwerpunkt', 'text_domain'),
        'new_item'              => __('Neuer Schwerpunkt', 'text_domain'),
        'edit_item'             => __('Schwerpunkt bearbeiten', 'text_domain'),
        'update_item'           => __('Schwerpunkt aktualisieren', 'text_domain'),
        'view_item'             => __('Schwerpunkt anzeigen', 'text_domain'),
        'view_items'            => __('Schwerpunkte anzeigen', 'text_domain'),
        'search_items'          => __('Schwerpunkt suchen', 'text_domain'),
        'not_found'             => __('Nicht gefunden', 'text_domain'),
        'not_found_in_trash'    => __('Nicht gefunden im Papierkorb', 'text_domain'),
        'featured_image'        => __('Feature-Bild', 'text_domain'),
        'set_featured_image'    => __('Feature-Bild setzen', 'text_domain'),
        'remove_featured_image' => __('Feature-Bild entfernen', 'text_domain'),
        'use_featured_image'    => __('Als Feature-Bild verwenden', 'text_domain'),
        'insert_into_item'      => __('In Schwerpunkt einfügen', 'text_domain'),
        'uploaded_to_this_item' => __('Zu diesem Schwerpunkt hochgeladen', 'text_domain'),
        'items_list'            => __('Schwerpunkte auflisten', 'text_domain'),
        'items_list_navigation' => __('Schwerpunkte-Navigation', 'text_domain'),
        'filter_items_list'     => __('Schwerpunkte filtern', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Schwerpunkt', 'text_domain'),
        'description'           => __('Post Type für Schwerpunkt-Seiten', 'text_domain'),
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
        'menu_icon'             => 'dashicons-image-filter'
    );
    register_post_type('schwerpunkt', $args);
}

function cpt_projekt()
{
    $labels = array(
        'name'                  => _x('Projekte', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Projekt', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Projekte', 'text_domain'),
        'name_admin_bar'        => __('Projekte', 'text_domain'),
        'archives'              => __('Archiv', 'text_domain'),
        'attributes'            => __('Projekt Eigenschaften', 'text_domain'),
        'parent_item_colon'     => __('Eltern-Projekt', 'text_domain'),
        'all_items'             => __('Alle Projekte', 'text_domain'),
        'add_new_item'          => __('Neues Projekt', 'text_domain'),
        'add_new'               => __('Neues Projekt', 'text_domain'),
        'new_item'              => __('Neues Projekt', 'text_domain'),
        'edit_item'             => __('Projekt bearbeiten', 'text_domain'),
        'update_item'           => __('Projekt aktualisieren', 'text_domain'),
        'view_item'             => __('Projekt anzeigen', 'text_domain'),
        'view_items'            => __('Projekte anzeigen', 'text_domain'),
        'search_items'          => __('Projekt suchen', 'text_domain'),
        'not_found'             => __('Nicht gefunden', 'text_domain'),
        'not_found_in_trash'    => __('Nicht gefunden im Papierkorb', 'text_domain'),
        'featured_image'        => __('Feature-Bild', 'text_domain'),
        'set_featured_image'    => __('Feature-Bild setzen', 'text_domain'),
        'remove_featured_image' => __('Feature-Bild entfernen', 'text_domain'),
        'use_featured_image'    => __('Als Feature-Bild verwenden', 'text_domain'),
        'insert_into_item'      => __('In Projekt einfügen', 'text_domain'),
        'uploaded_to_this_item' => __('Zu diesem Projekt hochgeladen', 'text_domain'),
        'items_list'            => __('Projekte auflisten', 'text_domain'),
        'items_list_navigation' => __('Projekte-Navigation', 'text_domain'),
        'filter_items_list'     => __('Projekte filtern', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Projekt', 'text_domain'),
        'description'           => __('Post Type für Projekt-Seiten', 'text_domain'),
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
        'menu_icon'             => 'dashicons-grid-view'
    );
    register_post_type('projekt', $args);
}
