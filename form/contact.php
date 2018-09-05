<?php

    /*
     * @package I2sIngenierie
     * @subpackage Contact Form
     * @Author @5Baddi - http://www.baddi.info
     * @Version 1.0.0
     */


?>
    <div class="contact-form" id="contact-form">
        <h6>Contactez nous</h6>
        <hr/>
        <form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="POST" class="form" name="contact">
            <input type="hidden" name="action" value="contact_form"/>
            <?php wp_nonce_field('i2s_contact_form'); ?>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Votre nom" name="name"/>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Votre e-mail" name="email"/>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Sujet" name="subject"/>
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="Votre message ici" name="msg"></textarea>
            </div>
            <div class="form-group pull-right">
                <button class="btn mybtn" type="submit">Envoyer</button>
            </div>
            <?php if(isset($_GET['send']) && intval($_GET['send']) == 0): ?>
                <div class="clearfix"></div>
                <div class="form-group">
                    <p class="text-danger"><i class="fa fa-warning"></i>&nbsp;<?= i2s_trs("Votre message n'est pas envoyé, vérifiez tous les champs et réessayez"); ?></p>
                </div>
            <?php elseif(intval($_GET['send']) == 1): ?>
                <div class="clearfix"></div>
                <div class="form-group">
                    <p class="text-success"><i class="fa fa-send"></i>&nbsp;<?= i2s_trs("Votre message a été envoyé avec succès"); ?></p>
                </div>
            <?php endif; ?>
        </form>
    </div>