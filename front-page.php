<?php
/**
 * The template for displaying front page.
 *
 * @package test theme
 */

get_header(); ?>

<section id="home-info">
	<div class="home-text">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php the_content(); ?>

		<?php endwhile; // End of the loop. ?>
	</div>
</section>


<?php get_footer(); ?>
