<?php

/*
 * @package Functions
 * @subpackage I2s Ingenierie
 * Developed by @5Baddi
 */

/*
 * Included PHP script
 */
// WP Filters
include_once 'inc/inc_filter.php';
// WP Registers
include_once 'inc/inc_register.php';
// Bootstarp NavWalker
require_once 'inc/bs4navwalker.php';
// Admin page functions
require_once 'inc/admin/use.php';



/* 
 * Get Assets directory url
 */
function i2s_assets($dir = null){
    return get_template_directory_uri().'/assets/'.$dir;
}

/*
 * Short Call statement for Translate function
 */
function i2s_trs($text){
    return __($text, 'i2singenierie');
}
/*
 * Home page html tag direct link
 */
function i2s_home($direct = false){
    if(!$direct){
        return '<a href="'.esc_url(home_url('/')).'">'.get_bloginfo('name').'</a>';
    }else{
        return esc_url(home_url('/'));
    }
}

/*
 * Enqueue styles & scripts
 */
function i2s_scripts(){
    // Normalize css
    wp_enqueue_style('i2s-normalize', i2s_assets('css/normalize.css'));
    // Bootstrap framework stylesheet
    wp_enqueue_style('i2s-bootstrap-style', i2s_assets('css/bootstrap.min.css'));
    // Light Slider css
    wp_enqueue_style('i2s-lightslider-style', i2s_assets('css/lightslider.min.css'));
    // Theme Stylesheet
    wp_enqueue_style('i2s-style', get_stylesheet_uri());
    // Add IE conditions
    i2s_ShivRes();
    // JQuery library
    i2s_jquery();
    // Bootstrap framework script
    wp_enqueue_script('i2s-bootstrap-script', i2s_assets('js/bootstrap.min.js'), array('jquery'), false, true);
    // Light Slider JQ
    wp_enqueue_script('i2s-lightslider-script', i2s_assets('js/lightslider.min.js'), array('jquery'), false, true);
    // Validate form JQ
    wp_enqueue_script('i2s-validate-script', i2s_assets('js/validate.min.js'), array('jquery'), false, true);
    // Theme js & jquery script
    wp_enqueue_script('i2s-script', i2s_assets('js/custom_script.js'), '', false, true);
}

// HTML5Shiv & Respond
function i2s_ShivRes(){
    // HTML 5 Shiv
    wp_enqueue_script('i2s-html5shiv', i2s_assets('js/html5shiv.min.js'));
    // Respond js
    wp_enqueue_script('i2s-respond', i2s_assets('js/respond.min.js'));
    // Add script condition
    wp_script_add_data('i2s-html5shiv', 'conditional', 'lt IE 9');
    wp_script_add_data('i2s-respond', 'conditional', 'lt IE 9');
}

/*
 * Theme Favicon
 */
function i2s_fav(){
    if(!has_site_icon() && !is_customize_preview()){
        echo '<link rel="apple-touch-icon" sizes="180x180" href="'.i2s_assets('ico/apple-touch-icon.png').'"/>'
           . '<link rel="icon" type="image/png" sizes="32x32" href="'.i2s_assets('ico/favicon-32x32.png').'"/>'
           . '<link rel="icon" type="image/png" sizes="16x16" href="'.i2s_assets('ico/favicon-16x16.png').'"/>'
           . '<link rel="manifest" href="'.i2s_assets('ico/manifest.json').'"/>'
           . '<link rel="mask-icon" href="'.i2s_assets('ico/safari-pinned-tab.svg').'" color="#5bbad5"/>'
           . '<link name="theme-color" content="#ffffff"/>';
    }
}

/*
 * Page title
 */
function i2s_title($sep = ' | '){
    $title = bloginfo('name');
    if(!is_home()){
        $title .= wp_title($sep);
    }
    return $title;
}

/*
 * Custom nav menu
 */
function i2s_nav_menu(){
    // Top navbar
    wp_nav_menu(array(
        'theme_location' => 'nav-menu',
        'container_class'=> 'collapse navbar-collapse',
        'menu_class'     => 'navbar-nav mr-auto',
        'container'      => false,
        'depth'          => 2,
        'walker'         => new wp_bootstrap4_navwalker()
    ));
}
// Top Menu for pages or socials
function i2s_top_menu(){
    wp_nav_menu(array(
        'theme_location' => 'top-menu',
        'container_class'=> '',
        'menu_class'     => 'col-md-6 text-right list-inline usernav',
        'container'      => 'list-inline-item',
        'depth'          => 1
    ));
}

/*
 * Contact form
 */
function contact_form(){
    $gets = get_option('i2s_up_info');
    $status = 0;
    $i2s_mail = (!empty($gets['info_mail'])) ? $gets['info_mail'] : 'salim@i2singenierie.ma';
    if(isset($_POST)):
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['msg']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)):
            $headers = array('Content-Type: text/html; charset=UTF-8', 'Par: '.sanitize_text_field($_POST['name']).' <'.sanitize_text_field($_POST['email']).'>');
            $send = wp_mail($i2s_mail, sanitize_text_field($_POST['subject']), sanitize_textarea_field($_POST['msg']), $headers);
            if($send){
                $status = 1;
            }
        endif;
    endif;
    wp_redirect(i2s_home(true).'?send='.$status.'#contact-form');
}
// Contact section
function i2s_section_contact(){
    return get_template_part('form/contact');
}
// Info section
function i2s_section_info(){
    return get_template_part('section/info');
}

/*
 * Return Partners section images
 */
function i2s_partners(){
    return get_template_part('section/partner');
}

/*
 * WP Actions
 */
// Setup Theme support features
add_action('after_setup_theme', 'i2s_setup');
// Enqueue script & style
add_action('wp_enqueue_scripts', 'i2s_scripts');
// Show Site favicon
add_action('wp_head', 'i2s_fav');
// Add custom menu
add_action('init', 'i2s_menus');
// Add Partner post type
add_action('init', 'i2s_partner_type');
// Add Contact Form
add_action('admin_post_nopriv_contact_form', 'contact_form');
/*
 * Admin action
 */
if(is_admin()) {
    // Add admin menu
    add_action('admin_menu', 'i2s_admin_menu');
    // Admin initialize
    add_action('admin_init', 'i2s_admin_init');
    // Admin Head
    add_action('admin_head', 'i2s_fav');
    // Admin Enqueue Script
    add_action('admin_enqueue_scripts', 'i2s_admin_scripts');
}