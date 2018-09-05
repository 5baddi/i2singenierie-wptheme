<?php

    /*
     * @package I2sIngenierie
     * @subpackage Mail Admin Page
     * @Author @5Baddi - http://www.baddi.info
     * @Version 1.0.0
     */

?>
<div class="wrap">
    <h1><?= i2s_trs('Envoyer des fichiers'); ?></h1>
    <form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="POST">
        <input name="action" type="hidden" value="i2s_admin_send_mail"/>
        <?php wp_nonce_field('i2s_verify_mail'); ?>
        <table class="form-table">
            <tr>
                <th scope="row"><?= i2s_trs('À'); ?></th>
                <td>
                    <input type="email" class="regular-text" name="to" list="mails" placeholder="Envoyer à ..." autofocus/>
                    <datalist id="mails">
                        <?php
                            $users = get_users(['exclude' => get_current_user_id()]);
                            foreach($users as $user):
                                echo '<option value="'.$user->user_email.'">';
                            endforeach;
                        ?>
                    </datalist>
                </td>
            </tr>
            <tr>
                <th scope="row"><?= i2s_trs('Le message'); ?></th>
                <td><textarea class="large-text code" rows="5" name="msg" placeholder="Votre message supplémentaire ici ..."></textarea></td>
            </tr>
            <tr>
                <th scope="row"><?= i2s_trs('Les fichiers'); ?></th>
                <td>
                    <p><?= i2s_trs('Si vous devez envoyer un fichier tout d\'abord téléchargé'); ?></p>
                    <button type="button" class="button" id="uploader"><?= i2s_trs('téléchargé'); ?></button>
                    <input type="hidden" name="result"/>
                    <p>Vous avez selectionnez <span id="num"></span> fichiers.</p>
                </td>
            </tr>
        </table>
        <?php submit_button('Envoyer'); ?>
    </form>
    <?php do_shortcode('[support]'); ?>
</div>
