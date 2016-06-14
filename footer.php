<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cmdesigns
 */

?>

	</div><!-- #content -->

	<footer id="footer" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="town">
				<div class="town-title">
					<h4>Middlesex County</h4>
					<hr>
				</div>
				<nav class="town-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'middlesex-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>
			<div class="town">
				<div class="town-title">
					<h4>Middlesex County</h4>
					<hr>
				</div>
				<nav class="town-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'somerset-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>
			<div class="town">
				<div class="town-title">
					<h4>Middlesex County</h4>
					<hr>
				</div>
				<nav class="town-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'union-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>
			<div class="town">
				<div class="town-title">
					<h4>Middlesex County</h4>
					<hr>
				</div>
				<nav class="town-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'monmouth-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
