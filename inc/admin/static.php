<?php

/*
 * @package Admin Front page setting
 * @subpackage I2s Ingenierie
 * Developed by @5Baddi
 */

    // Order arrtibutes
    $ord = ['first', 'second', 'third'];

?>

<div class="wrap">
    <h1>Page de garde Sections</h1>
    <form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="POST">
        <input name="action" type="hidden" value="i2s_save_static"/>
        <?php wp_nonce_field('i2s_verify_static'); ?>
        <table class="form-table">
            <?php
                for($i = 0; $i < 3; $i++):
                    if($i != 0):
            ?>
            <tr>
                <th scope="row"><h4><?= $i+1; ?>eme section</h4></th>
                <td><hr/></td>
            </tr>
            <?php endif; ?>
            <tr>
                <th scope="row">Titre</th>
                <td><input type="text" class="regular-text" name="<?= $ord[$i]; ?>_title_static" value="<?= esc_attr($gets['static_'.$ord[$i]][1]); ?>"/></td>
            </tr>
            <tr>
                <th scope="row">Icon</th>
                <td><input type="text" name="<?= $ord[$i]; ?>_icon_static" value="<?= esc_attr($gets['static_'.$ord[$i]][2]); ?>"/></td>
            </tr>
            <tr>
                <th scope="row">Paragraphe</th>
                <td><textarea class="large-text code" rows="5" name="<?= $ord[$i]; ?>_static"><?= esc_attr($gets['static_'.$ord[$i]][0]); ?></textarea></td>
            </tr>
            <?php endfor; ?>
        </table>
        <?php submit_button('Sauvegarder les modifications'); ?>
    </form>
</div>
