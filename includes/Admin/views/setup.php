<div class="wrap">
    <h2><?php esc_attr_e('SMS Settings', 'sdevs_wea'); ?></h2>
    <?php settings_errors(); ?>
    <?php include_once 'navs.php'; ?>
    <form method="POST" id="sdevs_sms_setup">
        <Setup />
    </form>
</div>