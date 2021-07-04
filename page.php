<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stock
 */

get_header(); while ( have_posts() ) : the_post();

	if(get_post_meta($post->ID, 'stock_page_options', true)){
		$page_meta = get_post_meta($post->ID, 'stock_page_options', true);
	}else{
		$page_meta = array();
	}

	if(array_key_exists('enable_title', $page_meta)) {
		$enable_title = $page_meta['enable_title'];
	} else {
		$enable_title = true;
	}

	if(array_key_exists('custom_title', $page_meta)) {
		$custom_title = $page_meta['custom_title'];
	} else {
		$custom_title = '';
	}
?>
<?php if($enable_title == true) : ?>
<div <?php if(has_post_thumbnail()) : ?>style="background-image:url(<?php echo esc_url(the_post_thumbnail_url('large')); ?>)" <?php endif;?> class="stock-breadcroumb-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php if(!empty($custom_title)) { echo esc_html($custom_title); } else { the_title();} ?></h1>
				<?php if(function_exists('bcn_display')) bcn_display(); ?>
			</div>
		</div>
	</div>
</div>
<?php endif;?>
<div class="stock-internal-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php
				

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				?>
			</div>
		</div>
	</div>
</div>

<?php endwhile; // End of the loop.

// get_sidebar();
get_footer();
