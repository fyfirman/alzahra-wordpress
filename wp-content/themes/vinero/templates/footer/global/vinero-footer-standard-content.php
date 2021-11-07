<?php

$footer_columns = get_theme_mod('footer_columns', 4);

switch ($footer_columns) {
	case 1:
		$column_class = 'col-md-12';
		break;
	case 2:
		$column_class = 'col-md-6';
		break;
	case 3:
		$column_class = 'col-md-4';
		break;
	case 4:
		$column_class = 'col-md-3';
		break;
}


for ($i = 1; $i < $footer_columns + 1; $i++) {
	if(is_active_sidebar('footer_sidebar_' . $i)) {
		echo '<div class="'.$column_class.'">';
		dynamic_sidebar('footer_sidebar_' . $i);
		echo '</div>';
	}
}
