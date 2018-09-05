<?php

/*
 * @package I2s Ingenierie
 * @subpackage Page
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
                </div>
            </div>
        <?php endif; ?>
    </section>


<?php    get_footer();