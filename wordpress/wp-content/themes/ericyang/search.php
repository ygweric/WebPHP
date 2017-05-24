<!DOCTYPE html>
<html>
<head>
	<title><?php echo get_bloginfo( ); ?></title>

	<?php if ( have_posts() ) : ?>
			<h1><?php echo 'Search Results for: '. '<span>' . get_search_query() . '</span>' ; ?></h1>
		<?php else : ?>
			<h1><?php echo 'Nothing Found: '.get_search_query( );; ?></h1>
		<?php endif; ?>

</head>
<body>
<?php get_search_form( ); ?>
		
	
</body>
</html>