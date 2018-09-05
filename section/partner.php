<?php

    /*
     * @package I2sIngenierie
     * @subpackage Partner Type View
     * @Author @5Baddi - http://www.baddi.info
     * @Version 1.0.0
     */


$partner = new WP_Query(array(
    'post_type'        =>   'partner',
    'order'            =>   'asc'
));
    if($partner->have_posts()):
?>
<section class="container">
    <div class="row">
        <div class="col-12">
            <ul class="company-slider">
                <?php
                    while($partner->have_posts()):
						$partner->the_post();
						global $post;
						$link = get_post_meta($post->ID, '_partner_link', true);
				?>
				<li><a href="<?= (!empty($link) ? $link : '#'); ?>" target="_blank"><img src="<?= get_the_post_thumbnail_url(); ?>" title="<?php the_title(); ?>"/></a></li>
				<?php
					endwhile;
                ?>
            </ul>
        </div>
    </div>
</section>
<?php endif; ?>