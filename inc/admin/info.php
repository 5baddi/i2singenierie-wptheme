<?php

/*
 * @package Admin Info page
 * @subpackage I2s Ingenierie
 * Developed by @5Baddi
 */

?>
<div class="wrap">
    <h1>Page de garde Coordennées</h1>
    <form method="POST" action="<?= esc_url(admin_url('admin-post.php')); ?>">
        <input type="hidden" name="action" value="i2s_save_info"/>
        <?php wp_nonce_field('i2s_verify_info'); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Titre de la page de garde</th>
                <td><input type="text" class="regular-text" name="info_title" value="<?= esc_attr($gets['info_title']); ?>"/></td>
            </tr>
            <tr>
                <th scope="row">Description de la page de garde</th>
                <td><textarea class="large-text" style="width:25em;" name="info_description"><?= esc_attr($gets['info_desc']); ?></textarea></td>
            </tr>
            <tr>
                <th scope="row">Email du contact</th>
                <td><input type="email" class="regular-text" name="info_email" value="<?= esc_attr($gets['info_mail']); ?>" placeholder="salim@i2singenierie.ma"/></td>
            </tr>
            <tr>
                <th scope="row" colspan="2"><h4><?= get_bloginfo('name'); ?> Coordennées</h4></th>
            </tr>
            <tr>
                <th scope="row">GSM</th>
                <td><input type="text" class="regular-text" name="info_gsm" value="<?= esc_attr($gets['info_gsm']); ?>" placeholder="+212 6 61 64 80 40"/></td>
            </tr>
            <tr>
                <th scope="row">Tel</th>
                <td><input type="text" class="regular-text" name="info_tel" value="<?= esc_attr($gets['info_tel']); ?>" placeholder="+212 5 37 56 21 25"/></td>
            </tr>
            <tr>
                <th scope="row">Fax</th>
                <td><input type="text" class="regular-text" name="info_fax" value="<?= esc_attr($gets['info_fax']); ?>" placeholder="+212 5 37 56 23 95"/></td>
            </tr>
            <tr>
                <th scope="row">Adresse</th>
                <td><input type="text" class="regular-text" name="info_address" value="<?= esc_attr($gets['info_adr']); ?>" placeholder="272 Guiche Oudaya Témara"/></td>
            </tr>
        </table>
        <?php submit_button('Sauvegarder les modifications'); ?>
    </form>
</div>
