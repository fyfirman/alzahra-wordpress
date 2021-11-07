

<?php if(get_theme_mod('navbar_show_social', false)): ?>

	<div class="vl-navigation-socials">
		<ul>
			<?php
				$navbar_socials = get_theme_mod('navbar_socials');
				if($navbar_socials) {
					foreach ($navbar_socials as $navbar_social) {
						echo '<li><a href="'.$navbar_social['navbar_social_url'].'" class="tooltip" title="'.$navbar_social['navbar_social_name'].'"><i class="fa '.$navbar_social['navbar_social_icon'].'"></i></a></li>';
					}	
				}
			?>
		</ul>
	</div>
	<!--/.vl-navigation-socials-->

<?php endif; ?>

