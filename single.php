<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Stock
 */
$vc_check = get_post_meta($post->ID, '_wpb_vc_js_status', true);

if($vc_check == true) {
	$vc_class = '';
} else {
	$vc_class = 'section-enable-padding';
}

get_header();
?>

<div <?php if(has_post_thumbnail()) : ?>style="background-image:url(<?php echo esc_url(the_post_thumbnail_url('large')); ?>)" <?php endif;?> class="stock-breadcroumb-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php if(!empty($custom_title)) { echo $custom_title; } else { the_title();} ?></h1>
				<?php if(function_exists('bcn_display') && get_post_type() != 'project') bcn_display(); ?>
			</div>
		</div>
	</div>
</div>

<div class="stock-internal-area <?php esc_attr($vc_class); ?>">
	<div class="container">
		<div class="row justify-content-center">
		<?php if(get_post_type() == 'project' && is_active_sidebar('stock_project_sidebar')) : ?>
			<div class="col-md-4">
				<div class="project-widgets">
					<?php dynamic_sidebar('stock_project_sidebar'); ?>
				</div>
			</div>
		<?php endif; ?>

			<div class="<?php if(get_post_type() == 'project') : ?><?php if(is_active_sidebar('stock_project_sidebar')): ?>col-md-8<?php else : ?>col-md-8<?php endif; ?><?php else : ?>col-md-8 col-md-offset-1 <?php endif; ?>">
			<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					$display_post_nav = cs_get_option('display_post_nav');
					if($display_post_nav != true) { } else

					if(get_post_type() != 'project') {if($display_post_nav != true) { } else {the_post_navigation();}}

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
			?>
			</div>

			<?php if(get_post_type() != 'project') { get_sidebar(); } ?>

		</div>
	</div>
</div>

<?php
get_footer();
