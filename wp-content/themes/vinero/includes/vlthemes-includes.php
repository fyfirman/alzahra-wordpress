<?php

/*
 * Infinity Load
 * */

require_once VINERO_REQUIRE_DIRECTORY . 'includes/helper/infinity-load/infinity-load.php';

/*
 * Typekit
 * */

require_once VINERO_REQUIRE_DIRECTORY . 'includes/helper/typekit/VlthemesTypekitClass.php';

/*
 * TGM
 * */

require_once VINERO_REQUIRE_DIRECTORY . 'includes/helper/class-tgm-plugin-activation.php';

/*
 * Typekit
 * */

if(class_exists('Kirki')){
	require_once VINERO_REQUIRE_DIRECTORY . 'framework/customizer.php';
}
