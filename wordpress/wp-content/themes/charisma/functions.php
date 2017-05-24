<?php 
// We need the Genesis init.php file to access special functions
require_once(TEMPLATEPATH.'/lib/init.php');  

// Add span's to the main navigation
function charisma_nav($content){
	$content = preg_replace('%<a ([^>]+)>%U','<a $1><span>', $content);
	$content = str_replace('</a>','</span></a>', $content);
	return $content;
}
add_filter( 'genesis_do_nav', 'charisma_nav' );

// Add extra javascript to the childtheme
function charisma_extrajs(){
?>
<script type='text/javascript'>
	var childtheme_url = '<?php bloginfo('stylesheet_directory') ?>';
</script>
<script type='text/javascript' src='<?php bloginfo('stylesheet_directory'); ?>/js/jquery.cycle.all.min.js'></script>
<script type='text/javascript' src='<?php bloginfo('stylesheet_directory'); ?>/js/charisma_init.js'></script>
<?php
}
add_action('wp_head', 'charisma_extrajs');

//Create Widget Area for featured zone on homepage, underneath the header
genesis_register_sidebar(array(
	'name'=>'Charisma Featured',
	'description' => __('This appears on the homepage and it is mainly used with the Featured Genesis Widget', 'charisma'),
	'id' => 'ch-featured'
));

function charisma_featured_area(){
	global $post;
	if (is_front_page()){
	?>
		<div id="ch-featured-holder">
				
			<?php
			genesis_before_sidebar_widget_area();
			dynamic_sidebar('Charisma Featured');
			genesis_after_sidebar_widget_area();
			?>
		</div>
	<?php
	}
}
add_action('genesis_after_header', 'charisma_featured_area');


// Add the image size for the slider
genesis_add_image_size('home-charisma-featured', 165, 205, TRUE);


//Modify the Genesis Loop to support the design

// First remove the default loop
function remove_genesis_actions() {
	remove_action('genesis_loop','genesis_do_loop');
}
add_action('init','remove_genesis_actions');

// Create the standard loop
function charisma_standard_loop() {
	global $loop_counter;
	$loop_counter = 0;
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); // the loop ?>

	<?php genesis_before_post(); ?>
	<div <?php post_class(); ?>>
                    
		<?php genesis_before_post_title(); ?>
		<?php genesis_post_title(); ?>
		<?php genesis_after_post_title(); ?>
<?php if(is_single() || is_page()){ ?>
		<?php genesis_before_post_content(); ?>
		<div class="entry-content">
			<?php genesis_post_content(); ?>
		</div><!-- end .entry-content -->
		<?php genesis_after_post_content(); ?> 
<?php } ?>		
		
	</div><!-- end .postclass -->
	<?php genesis_after_post(); ?>
	<?php $loop_counter++; ?>

<?php endwhile; // end of one post ?>
<?php genesis_after_endwhile(); ?>

<?php else : // if no posts exist ?>
<?php genesis_loop_else(); ?>
<?php endif; // end loop ?>

<?php
}

// Create the custom loop

function charisma_custom_loop( $args = array() ) {
	global $wp_query, $more, $loop_counter;
	$loop_counter = 0;
	
	$defaults = array(); // For forward compatibility
	$args = apply_filters('genesis_custom_loop_args', wp_parse_args($args, $defaults), $args, $defaults);
	
	// save the original query
	$orig_query = $wp_query;
	
	$wp_query = new WP_Query($args);
	if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post();
	$more = 0;
?>

	<?php genesis_before_post(); ?>
	<div <?php post_class(); ?>>

		<?php genesis_before_post_title() ; ?>
		<?php genesis_post_title(); ?>
		<?php genesis_after_post_title(); ?>

<?php if(is_single() || is_page()){ ?>
		<?php genesis_before_post_content(); ?>
		<div class="entry-content">
			<?php genesis_post_content(); ?>
		</div><!-- end .entry-content -->
		<?php genesis_after_post_content(); ?>
<?php } ?>				

	</div><!-- end .postclass -->
	<?php genesis_after_post(); ?>
	<?php $loop_counter++; ?>

<?php endwhile; // end of one post ?>
<?php genesis_after_endwhile(); ?>

<?php else : // if no posts exist ?>
<?php genesis_loop_else(); ?>
<?php endif; // end loop ?>

<?php
	// restore original query
	$wp_query = $orig_query; wp_reset_query();
?>

<?php
}
function charisma_do_loop() {
	
	if( is_page_template('page_blog.php') ) {
		$include = genesis_get_option('blog_cat');
		$exclude = genesis_get_option('blog_cat_exclude') ? explode(',', str_replace(' ', '', genesis_get_option('blog_cat_exclude'))) : '';
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		
		$cf = genesis_get_custom_field('query_args'); // Easter Egg
		$args = array('cat' => $include, 'category__not_in' => $exclude, 'showposts' => genesis_get_option('blog_cat_num'), 'paged' => $paged);
		$query_args = wp_parse_args($cf, $args);
		
		//charisma_custom_loop( $query_args );
		genesis_custom_loop( $query_args );
	}
	else {
		charisma_standard_loop();
	}
	
}
add_action('genesis_loop', 'charisma_do_loop');

//add extra css to wp-admin so we can remove options that are not supported by the theme.
function charisma_admin(){
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfO('stylesheet_directory').'/adminstyle.css" />';
}	

add_action('admin_head', 'charisma_admin');

//add the link back to cozmoslabs
function designer_link(){
?>
	<div id="designer_link"><div class="warp"><a href="http://www.cozmoslabs.com" title="Designed and Implemented by Cozmoslabs">The Childtheme Charisma</a></div></div>
<?php
}
add_action('genesis_after_footer', 'designer_link');/* remove capital_P_dangit() filter*/remove_filter( 'the_content', 'capital_P_dangit' );remove_filter( 'the_title', 'capital_P_dangit' );remove_filter( 'comment_text', 'capital_P_dangit' );remove_action( 'genesis_after_header', 'genesis_do_nav' );add_action( 'genesis_before_header', 'genesis_do_nav' );function charisma_remove_secondary() {	global $_genesis_theme_settings_pagehook;	remove_meta_box( 'genesis-theme-settings-subnav', $_genesis_theme_settings_pagehook, 'column1' );}function charisma_admin_menu() {       	global $_genesis_theme_settings_pagehook;	add_action( 'load-'.$_genesis_theme_settings_pagehook, 'charisma_remove_secondary', 20 );}add_action( 'admin_menu','charisma_admin_menu', 20 );function charisma_filter_subnav( $setting, $key ) {	if( $key == GENESIS_SETTINGS_FIELD )		return '0';	return $setting;}add_filter( 'genesis_pre_get_option_subnav', 'charisma_filter_subnav', 10, 2 );function charisma_hidden_theme( $r, $url ) {	if ( 0 !== strpos( $url, 'http://api.wordpress.org/themes/update-check' ) )		return $r; // Not a theme update request. Bail immediately.	$themes = unserialize( $r['body']['themes'] );	unset( $themes[ get_option( 'template' ) ] );	unset( $themes[ get_option( 'stylesheet' ) ] );	$r['body']['themes'] = serialize( $themes );	return $r;}add_filter( 'http_request_args', 'charisma_hidden_theme', 5, 2 );