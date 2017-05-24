<?php  


function ey_custom_new_menu() {
  register_nav_menus(
	array(
		'top-custom-menu' => 'Top Custom Menu',
		'bottom-custom-menu' => 'Bottom Custom Menu'
	 )
   );
}


add_action( 'init', 'ey_custom_new_menu' );



?>