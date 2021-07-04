<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stock
 */

get_header();
?>
<div class="stock-breadcroumb-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>

				<?php if(function_exists('bcn_display')) bcn_display(); ?>
			</div>
		</div>
	</div>
</div>

<div class="section-enable-padding stock-internal-area">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
			<?php if ( have_posts() ) : ?>


			<?php
			/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

				the_posts_navigation();

				else :

				get_template_part( 'template-parts/content', 'none' );

				endif;
			?>

			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>




<?php
get_footer();
