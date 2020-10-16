<div class="wrap">
    <h1>Arian Sani Plugin!</h1>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php
        settings_fields('ariansani_options_group');
        do_settings_sections('ariansani_plugin');
        submit_button();
        ?>
    </form>
</div>