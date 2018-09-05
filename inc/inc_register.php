<?php

/*
 * @package Register functions
 * @subpackage I2s Ingenierie
 * Developed by @5Baddi
 */

/* 
 * Enqueue JQuery script in the footer of theme
*/
function i2s_jquery(){
    // Deregister default jquery
    wp_deregister_script('jquery');
    // Register jquery into footer
    wp_register_script('jquery', i2s_assets('js/jquery.min.js'), '', '3.1.1', true);
    // Enqueue the new JQuery
    wp_enqueue_script('jquery');
}

/*
 * Register Nav Menus support
 */
function i2s_menus(){ 
    register_nav_menus(array(
        'nav-menu' => 'Barre de navigation',
        'top-menu' => 'Menu de top'
    ));
}

/*
 * Register Theme Features
 */
function i2s_setup(){
    // Add Theme support for featured Images on Post & Page
    add_theme_support('post-thumbnails', ['post', 'page', 'partner']);
    // Add Theme support for Custom Background
    add_theme_support('custom-background', array(
            'default-color'             => '#efefef'
    ));
    // Add Theme support for Custom Header
    add_theme_support('custom-header', array(
            'height'                    =>  300,
            'width'                     => 1500,
            'default-text-color'        =>  '#ffffff',
            'default-image'             =>  i2s_assets('img/i2s_cover.jpg')
    ));
    // Add Theme support title tag
    add_theme_support('title-tag');
    // Add Theme support Custom Logo
    add_theme_support('custom-logo', array(
            'height'                    =>  90,
            'width'                     =>  400
    ));
}


/*
 * Register Partner post type
 */
function i2s_partner_type(){
    $labels = array(
            'name'                      =>  'Partner',
            'singular_name'             =>  'Partner',
            'add_new'                   =>  'Add Partner',
            'add_new_item'              =>  'Add new Partner',
            'edit_item'                 =>  'Edit Partner',
            'new_item'                  =>  'New Partner',
            'view_item'                 =>  'View Partner',
            'view_items'                =>  'View Partners',
            'search_items'              =>  'Search Partners',
            'not_found'                 =>  'No partners found',
            'not_found_in_trash'        =>  'No partners found in trash',
            'all_items'                 =>  'All partners',
            'parent_item_colon'         =>  '',
            'menu_name'                 =>  'Partners'
    );
    register_post_type('partner', array(
            'public'                    =>  true,
            'public_queryable'          =>  false,
            'labels'                    =>  $labels,
            'menu_icon'                 =>  'dashicons-images-alt',
            'menu_position'             =>  3,
            'capability_type'           =>  'post',
            'supports'                  =>  array('title', 'thumbnail')
    ));

    // Add Custom partner image size
    add_image_size('partners', 360, 100, true);
}
