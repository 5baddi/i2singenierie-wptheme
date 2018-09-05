<?php

    /*
     * @package I2sIngenierie
     * @subpackage Static Content View
     * @Author @5Baddi - http://www.baddi.info
     * @Version 1.0.0
     */

    $gets = get_option('i2s_up_info');
    $static = get_option('i2s_up_static');
 if(!empty($static)):
?>
<section class="row white-bg">
    <div class="container intersite">
        <div class="row">
            <?php foreach($static as $value): ?>
            <div class="col-md-4 text-center">
                <i class="fa <?= $value[2]; ?> intericon"></i>
                <h3><?= strtoupper($value[1]); ?></h3>
                <p><?= $value[0]; ?></p>
                <!--<a href="#" class="intermore">Lire la suite&nbsp;<i class="fa fa-arrow-right"></i></a>-->
            </div>
            <?php endforeach; ?>
        </div>
		<!--<hr/>-->
    </div>
</section>
<?php 
	endif; 
    $lastpost = new WP_Query(array(
            'posts_per_page' =>  3
    ));
    if($lastpost->have_posts()):
?>
<section class="row white-bg">
    <div class="container">
        <div class="row">
<?php while($lastpost->have_posts()): $lastpost->the_post(); ?>
                <div class="col-md-4">
                    <div class="card">
                        <?php
                            if(has_post_thumbnail()):
                                the_post_thumbnail('full', ['class' => 'card-img-top img-small']);
                            else:
                                echo '<img class="card-img-top" src="'.i2s_assets('img/NoImage.jpg').'"/>';
                            endif;
                        ?>
                        <div class="card-body text-center">
                            <div class="small-title"><h4 class="card-title"><?= substr(get_the_title(), 0, 50); ?></h4></div>
                            <div class="card-text small-text">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php esc_url(the_permalink()); ?>" class="btn btn-primary"><?= i2s_trs("Lire la suite"); ?></a>
                        </div>
                    </div>
                </div>
<?php endwhile; ?>
        </div>
    </div>
</section>
<?php
    endif;
    // The Partners Section
    i2s_partners();
?>
<section class="row white-bg no-footer-margin">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?= do_shortcode('[contact-info]'); ?>
            </div>
            <div class="col-md-4">
                <?= do_shortcode('[contact-form]'); ?>
            </div>
            <div class="col-md-12" style="height:640px;" id="localMap"></div>
            <script>
                function initMap(){
                    var local = {
                        center: new google.maps.LatLng(33.9416652, -6.8839139,15),
                        zoom: 12,
                    };
                    var map = new google.maps.Map(document.getElementById("localMap"), local);
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2ZgKkwikv63XYVsEdEdR2uMwwwcpUuLA&callback=initMap"></script>
        </div>
    </div>
</section>