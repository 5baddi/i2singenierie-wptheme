<?php

    /*
     * @package I2sIngenierie
     * @subpackage 404 Page
     * @Author @5Baddi - http://www.baddi.info
     * @Version 1.0.0
     */

wp_head(); ?>
<style>
    body{
        background-color: #34343E !important;
    }
</style>
<!-- .wrap #primary -->
<div class="wrap error-main" id="primary" style="height: 100%;">
    <!-- #main -->
        <main id="main" class="site-main" role="main">
            <!-- .error-404 -->
            <section class="row error-404 not-found vcenter">
                <!-- .page-header-->
                    <header class="col-12 page-header">
                        <h1 class="page-title"><?php _e( 'Oops! Cette page ne peut être trouv&eacute;e.', 'i2singenierie' ); ?></h1>
                    </header>
                <!-- .page-header -->
                <!-- .page-content -->
                    <div class="container-fluid page-content">
                        <div class="row">
                            <div class="col error-search">
                                <p class="text-muted1"><?php _e( 'Il semble que rien n\'a &eacute;t&eacute; trouv&eacute; &agrave; cet endroit. Peut-&ecirc;tre essayer une recherche?', 'i2singenierie' ); ?></p>
                                <div class="form-group"><?php get_search_form(); ?></div>
                                <div class="row">
                                    <div class="col error-link">
                                        <a href="<?= esc_url(home_url('/')); ?>"><i class="fa fa-home"></i>&nbsp;<?php _e('Accueil', 'i2singenierie'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- .page-content -->
            </section>
            <!-- .error-404 -->
        </main>
    <!-- #main -->
</div>
<!-- .wrap #primary -->


<?php wp_footer();

