<div class="wrap about-wrap vl-dashboard">
    

    <h1><?php printf(vinero_dashboard()->strings['dashboard_title'], vinero_dashboard()->theme_name, vinero_dashboard()->theme_version); ?></h1>
    <div class="about-text"><?php printf(vinero_dashboard()->strings['dashboard_subtitle'], vinero_dashboard()->theme_name); ?></div>

    <img class="wp-badge" src="<?php echo VINERO_THEME_DIRECTORY . 'assets/img/favicon.png'; ?>" alt="<?php echo vinero_dashboard()->theme_name; ?>">

    <p class="vl-page-actions">
        <a target="_blank" href="<?php echo vinero_dashboard()->strings['subscribe_link']; ?>" class="button button-primary"><?php echo vinero_dashboard()->strings['subscribe_text']; ?></a>
        <a target="_blank" href="<?php echo vinero_dashboard()->strings['documentation_link']; ?>" class="button button-secondary"><?php echo vinero_dashboard()->strings['documentation_text']; ?></a>
        <a target="_blank" href="<?php echo vinero_dashboard()->strings['support_link']; ?>" class="button button-help"><?php echo vinero_dashboard()->strings['support_text']; ?></a>
    </p>

    <div class="clear"></div>

    <div class="panels vl-panels">
        <?php

            $widgets = vinero_dashboard()->dashboard_widgets();

            foreach($widgets as $widget) {
                require vinero_dashboard()->dashboard_dir . '/widgets/' . $widget . '.php';
            }

        ?>

    </div>

    <div class="clear"></div>

    <p class="vl-thank-you">
        <?php printf(vinero_dashboard()->strings['footer_thank_you'], vinero_dashboard()->theme_name); ?>
    </p>


</div>
<!--end .wrap-->
