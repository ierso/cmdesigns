<?php
/**
 * Template Name: Gallery Page
 *
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			<div class="gallery">
				<div class="gallery-thumbs">
					<?php if(get_field('gallery')): $i = 0; ?>

	        <div class="image-grp">

	        <?php while( have_rows('gallery') ): the_row(); $i++;

	            // vars
	            $imageThumb = get_sub_field('image_thumb');

	        ?>

	            <div id="image-button-<?php echo $i; ?>" class="image-button">
	                <img src="<?php echo $imageThumb['url']; ?>" alt="<?php echo $imageThumb['alt'] ?>" />
	            </div>

	        <?php endwhile; ?>

	        </div>

    			<?php endif; ?>
				</div>

				<div class="slide-show">
					<div class="arrows">
						<div id="left-arrow" class="arrow">
							<<	Previous Photo
						</div>
						<div id="right-arrow" class="arrow">
							Next Photo >>
						</div>
					</div>
					<div class="slider">
            <div class="slide-viewer">

                <?php if( have_rows('gallery') ): ?>

                    <div class="slide-group">

                        <?php while( have_rows('gallery') ): the_row();

                            // vars
                            $imageSlide = get_sub_field('image_slide');
														$imageInfo = get_sub_field('image_info');


                        ?>

                            <div class="slide" style="background-image: url(<?php echo $imageSlide; ?>);">
															<div class="slide-content">
																<?php echo $imageInfo; ?>
															</div>
														</div>



                        <?php endwhile; ?>

                    </div>

                <?php endif; ?>

            </div>

        </div>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
