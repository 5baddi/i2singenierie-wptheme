<?php

    /*
     * @package I2sIngenierie
     * @subpackage Contact Info Section
     * @Author @5Baddi - http://www.baddi.info
     * @Version 1.0.0
     */

    $info = get_option('i2s_up_info');
    $contact_info = array_slice($info, 2);
    $icons = ['envelope', 'phone', 'phone-square', 'fax', 'map'];
    if($info && !empty($contact_info)):
?>
        <h6>Nos Coordonnées</h6>
        <hr/>
        <table class="table contact-info" id="contact-info">
            <tbody>
            <?php
                foreach(array_combine($contact_info, $icons) as $value => $fa):
                    if(!empty($value) && $value != ''):
            ?>
                <tr><th class="text-right"><i class="fa fa-<?= $fa; ?>"></i></th><td><?= $value; ?></td></tr>
            <?php
                    endif;
                endforeach;
            ?>
            </tbody>
        </table>
<?php endif; ?>
