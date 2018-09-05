<?php

    /*
     * @package I2sIngenierie
     * @subpackage Simple Header
     * @Author @5Baddi - http://www.baddi.info
     * @Version 1.0.0
     */

$gets = get_option('i2s_up_info');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="container-fluid">
    <header class="row page-header" style="margin-bottom:1rem;">
        <div class="container">
            <div class="col-12 topmenu d-md-flex d-none">
                <div class="col-md-6">
                            <span>
                                <?php
                                if(!empty($gets['info_tel'])):
                                    echo '<i class="fa fa-phone"></i>&nbsp;'.i2s_trs('Des questions? Appelez-nous:').'&nbsp;'.$gets['info_tel'];
                                endif;
                                ?>
                            </span>
                    <span>
                                <?php
                                if(!empty($gets['info_mail'])):
                                    echo '<i class="fa fa-envelope"></i>&nbsp<a href="'.$gets['info_mail'].'">'.$gets['info_mail'].'</a>';
                                    i2s_trs('Des questions? Appelez-nous:');
                                endif;
                                ?>
                            </span>
                </div>
                <?php
                    if(has_nav_menu('top-menu')):
                        i2s_top_menu();
                    endif;
                ?>
            </div>
        </div>
        <div class="col-12 main-header">
            <nav class="container navbar navbar-expand-lg navbar-light bg-faded">
                <a class="navbar-brand" href="<?= i2s_home(true); ?>">
                    <?php
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    ?>
                    <img src="<?php if(!has_custom_logo()): echo i2s_assets('img/logo.png'); else: echo esc_url($logo[0]); endif; ?>" title="<?php bloginfo('name'); ?>"/>
                </a>
                <?php if(has_nav_menu('nav-menu')): ?>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="<?php _e('Toggle navigation', 'i2singenierie'); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse text-center" id="navMenu">
                        <?php i2s_nav_menu(); ?>
                    </div>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <div class="content">
