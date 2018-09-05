<?php

/*
 * @package Filters functions
 * @subpackage I2s Ingenierie
 * Developed by @5Baddi
 */



// Hide admin bar from Website
add_filter('show_admin_bar', '__return_false');

/*
 * Mail From
 */
function i2s_mail_from(){
    // Site name
    $sitename = strtolower($_SERVER['SERVER_NAME']);
    if(substr($sitename, 0, 4) == "www."){
        $sitename = substr($sitename, 4);
    }
    // From Mail
    $from = 'no-replay@'.$sitename;

    return $from;

}
// Add Mail From filter
add_filter('wp_mail_from', 'i2s_mail_from');

/*
 * Mail Name
 */
function i2s_mail_name(){
    // Site name
    $sitename = get_bloginfo('name');
    return $sitename;
}
// Add Mail Name Filter
add_filter('wp_mail_form_name', 'i2s_mail_name');

/*
 * Short Codes
 */
// contact-form to show contact form section
add_shortcode('contact-form', 'i2s_section_contact');
// info to show info section
add_shortcode('contact-info', 'i2s_section_info');

/*
 * Excerpt Filters
 */
 // Excerpt more
 function i2s_excerpt_more($more){
	 return "...";
 }
 add_filter('excerpt_more', 'i2s_excerpt_more');
 
 // Excerpt length
 function i2s_excerpt_length($length){
	 return 35;
 }
 add_filter('excerpt_length', 'i2s_excerpt_length');