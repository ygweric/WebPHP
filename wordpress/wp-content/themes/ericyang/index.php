<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<head>
	<title><?php echo get_bloginfo(); ?></title>
</head>
<body>

<?php get_header( ); ?>

<div>
<?php 
wp_nav_menu( 
    array('theme_location' => 'top-custom-menu',
          'container_class' => 'top-custom-menu-class',
     )
  ); 
?> 
</div>


<?php 
wp_nav_menu( 
    array('theme_location' => 'bottom-custom-menu',
          'container_class' => 'bottom-custom-menu-class',
     )
  ); 
?> 

<?php get_footer( ); ?>
</body>
</html>