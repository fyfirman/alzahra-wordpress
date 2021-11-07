<div class="vl-dashboard-widget">

    <div class="vl-dashboard-widget--title">
        <mark><?php echo vinero_dashboard()->strings['widget_demoimport_title']; ?></mark>
    </div>

    <div class="vl-dashboard-widget--content">
        <div class="vl-widget-demoimport">
            <p>
            	<?php echo vinero_dashboard()->strings['widget_demoimport_text']; ?>
            </p>

            <?php if(class_exists('OCDI_Plugin')): ?>
           
            	<a target="_self" href="<?php echo admin_url('themes.php?page='.vinero_dashboard()->demoimportslug.''); ?>" class="button button-secondary"><?php echo vinero_dashboard()->strings['widget_demoimport_btn']; ?></a>

        	<?php else: ?>
                
                <a target="_self" href="<?php echo admin_url('admin.php?page=' . vinero_dashboard()->tgmslug); ?>" class="button button-secondary"><?php echo vinero_dashboard()->strings['widget_demoimport_install_plugins']; ?></a>

            <?php endif; ?>

        </div>
    </div>

</div>
<!--end .vl-dashboard-widget-->
