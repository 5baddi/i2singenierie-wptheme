<?php

    /*
     * @package I2s Ingenierie
     * @subpackage Single Page
     * @Author 5Baddi - http://www.baddi.info
     * @Version 1.0.0
     */

    get_template_part('section/simple.header');
?>
<section class="container bg-white">
    <?php if(have_posts()): the_post(); ?>
    <div class="row">
        <div class="col-12">
            <h1 class="text-center"><?= the_title(); ?></h1>
            <hr/>
            <?php
                if(has_post_thumbnail()):
                    echo '<div class="text-center">';
                    the_post_thumbnail('full', ['class' => 'img-thumbnail', 'style' => 'height:320px;width:auto;']);
                    echo '</div>';
                endif;
            ?>
            <p>
                <?= the_content(); ?>
            </p>
            <hr/>
            <span>
                <small><i class="fa fa-calendar"></i>&nbsp;<time><?= the_date('d M Y'); ?></time>&nbsp;|&nbsp;<i class="fa fa-tag"></i>&nbsp;<?= the_category(',', ''); ?></small>
            </span>
        </div>
    </div>
    <?php endif; ?>
</section>
<div class="container">
    <div class="row">
        <div class="col-12 pg-post">
            <span class="pull-left"><?php previous_post_link('%link', '<i class="fa fa-arrow-left"></i>&nbsp;'.i2s_trs('Voir précédent'), true); ?></span>
            <span class="pull-right"><?php next_post_link('%link', i2s_trs('Voir suivant').'&nbsp;<i class="fa fa-arrow-right"></i>', true); ?></span>
        </div>
    </div>
</div>


<?php    get_footer();