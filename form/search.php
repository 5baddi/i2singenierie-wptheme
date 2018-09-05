<?php

    /*
     * @package I2sIngenierie
     * @subpackage Search Form
     * @Author @5Baddi - http://www.baddi.info
     * @Version 1.0.0
     */

?>


<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>" class="form">
    <div class="form-group">
        <input class="form-control" type="text" value="" name="s" id="s" placeholder="<?php _e('Recherche d\'autre chose', 'i2singenierie'); ?>"/>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary" id="searchsubmit" title="<?php _e('Chercher', 'i2singenierie'); ?>" ><i class="fa fa-search"></i></button>
    </div>
</form>