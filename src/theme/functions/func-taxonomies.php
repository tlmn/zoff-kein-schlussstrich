<?php
function custom_taxonomy_labels()
{
    $labels = array(
        'name'                       => _x('Labels', 'Taxonomy General Name', 'text_domain'),
        'singular_name'              => _x('Label', 'Taxonomy Singular Name', 'text_domain'),
        'menu_name'                  => __('Labels', 'text_domain'),
        'all_items'                  => __('Alle Labels', 'text_domain'),
        'parent_item'                => __('Eltern-Element:', 'text_domain'),
        'parent_item_colon'          => __('Eltern-Element:', 'text_domain'),
        'new_item_name'              => __('Neue Label', 'text_domain'),
        'add_new_item'               => __('Label hinzufügen', 'text_domain'),
        'edit_item'                  => __('Label bearbeiten', 'text_domain'),
        'update_item'                => __('Label aktualisieren', 'text_domain'),
        'view_item'                  => __('Label anzeigen', 'text_domain'),
        'no_terms'                   => __('Keine Elemente', 'text_domain'),
        'items_list'                 => __('Liste von Elementen', 'text_domain'),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
    );
    register_taxonomy('label', array('event'), $args);
}

function custom_taxonomy_tags()
{
    $labels = array(
        'name'                       => _x('Tags', 'Taxonomy General Name', 'text_domain'),
        'singular_name'              => _x('Tag', 'Taxonomy Singular Name', 'text_domain'),
        'menu_name'                  => __('Tags', 'text_domain'),
        'all_items'                  => __('Alle Tags', 'text_domain'),
        'parent_item'                => __('Eltern-Element:', 'text_domain'),
        'parent_item_colon'          => __('Eltern-Element:', 'text_domain'),
        'new_item_name'              => __('Neuer Tag', 'text_domain'),
        'add_new_item'               => __('Tag hinzufügen', 'text_domain'),
        'edit_item'                  => __('Tag bearbeiten', 'text_domain'),
        'update_item'                => __('Tag aktualisieren', 'text_domain'),
        'view_item'                  => __('Tag anzeigen', 'text_domain'),
        'no_terms'                   => __('Keine Elemente', 'text_domain'),
        'items_list'                 => __('Liste von Elementen', 'text_domain'),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
    );
    register_taxonomy('tag', array('event'), $args);
}


function custom_taxonomy_divisions()
{
    $labels = array(
        'name'                       => _x('Säulen', 'Taxonomy General Name', 'text_domain'),
        'singular_name'              => _x('Säule', 'Taxonomy Singular Name', 'text_domain'),
        'menu_name'                  => __('Säulen', 'text_domain'),
        'all_items'                  => __('Alle Säulen', 'text_domain'),
        'parent_item'                => __('Eltern-Element:', 'text_domain'),
        'parent_item_colon'          => __('Eltern-Element:', 'text_domain'),
        'new_item_name'              => __('Neue Säule', 'text_domain'),
        'add_new_item'               => __('Säule hinzufügen', 'text_domain'),
        'edit_item'                  => __('Säule bearbeiten', 'text_domain'),
        'update_item'                => __('Säule aktualisieren', 'text_domain'),
        'view_item'                  => __('Säule anzeigen', 'text_domain'),
        'no_terms'                   => __('Keine Elemente', 'text_domain'),
        'items_list'                 => __('Liste von Elementen', 'text_domain'),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
    );
    register_taxonomy('division', array('event'), $args);
}
