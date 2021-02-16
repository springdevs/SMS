<div class="wrap">
    <h2><?php esc_attr_e('SMS Settings', 'sdevs_wea'); ?></h2>
    <?php settings_errors(); ?>
    <?php include_once 'navs.php'; ?>
    <form method="POST">
        <?php wp_nonce_field('sdevs-sms-setup-formnonce'); ?>
        <div class="card" style="max-width: 100%;">
            <h2 class="title"><?php _e('SMS SERVICE SETTINGS', 'sdevs_wea'); ?></h2>
            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="sms_service"><?php _e('SMS service', 'sdevs_wea'); ?></label>
                        </th>
                        <td>
                            <select name="sms_service" id="sms_service" style="width: 100%;">
                                <option value="twilo"><?php _e('Twilio', 'sdevs_wea'); ?></option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card" style="max-width: 100%;">
            <h2 class="title"><?php _e('TWILIO SETTINGS', 'sdevs_wea'); ?></h2>
            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="twilio_sid"><?php _e('Account SID', 'sdevs_wea'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="twilio_sid" name="twilio_sid" class="regular-text" value="<?php echo get_option("twilio_sid"); ?>" required />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="twilio_token"><?php _e('Account Token', 'sdevs_wea'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="twilio_token" name="twilio_token" class="regular-text" value="<?php echo get_option("twilio_token"); ?>" required />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card" style="max-width: 100%;">
            <h2 class="title"><?php _e('SENDING SETTINGS', 'sdevs_wea'); ?></h2>
            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="twilio_sending_phone"><?php _e('Sender phone number', 'sdevs_wea'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="twilio_sending_phone" name="twilio_sending_phone" class="regular-text" value="<?php echo get_option("twilio_sending_phone_number"); ?>" required />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="admin_phone_numbers"><?php _e('Admin phone', 'sdevs_wea'); ?></label>
                        </th>
                        <td>
                            <input type="text" id="admin_phone_numbers" name="admin_phone_numbers" placeholder="type multiple numbers with coma" class="regular-text" value="<?php echo get_option("admin_phone_numbers"); ?>" required />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php submit_button(); ?>
    </form>
</div>