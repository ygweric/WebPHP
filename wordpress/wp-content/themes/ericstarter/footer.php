<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ericstarter
 */

?>

	</div><!-- #content -->

	<div id="site-navigation" class="main-navigation" role="navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'ericstarter' ); ?></button>
		<?php wp_nav_menu( array( 'theme_location' => 'bottom-custom-menu')); ?>
	</div>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			Proudly powered by <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ericstarter' ) ); ?>"><?php printf( esc_html__( '%s', 'ericstarter' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'ericstarter' ), '<a href="https://automattic.com/" rel="designer">Eric Yang</a>', '<a href="https://automattic.com/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</div>
</body>
</html>
