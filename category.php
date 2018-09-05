<?php

    /*
     * @package I2sIngenierie
     * @subpackage Category
     * @Author @5Baddi - http://www.baddi.info
     * @Version 1.0.0
     */

    get_template_part('section/simple.header');
?>

    <section class="container bg-white">
        <div class="row">
            <div class="col-12 text-center">
                <h1><?php single_cat_title(); ?></h1>
                <hr/>
            </div>
        </div>
    <?php
    $query = new WP_Query(array(
        'category_name'     =>  single_post_title('', false),
        'post_type'         =>  'post'
    ));
    if($query->have_posts()):
        while($query->have_posts()): $query->the_post();
            ?>
            <div class="row m-4">
                <div class="col-md-4">
                    <?php
                    if(has_post_thumbnail()):
                        the_post_thumbnail('full', ['class' => 'img-fluid img-full']);
                    else:
                        echo '<img class="img-fluid" src="'.i2s_assets('img/NoImage.jpg').'"/>';
                    endif;
                    ?>
                </div>
                <div class="col-md-8">
                    <div class="col-12">
                        <h4 class="bog-title"><?= get_the_title(); ?></h4>
                        <div class="blog-text">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php esc_url(the_permalink()); ?>" class="btn btn-primary blog-read"><?= i2s_trs("Lire la suite"); ?></a>
                    </div>
                </div>
            </div>
            <?php
            wp_reset_postdata();
        endwhile;
    endif;
    ?>
</section>

<?php get_footer();

