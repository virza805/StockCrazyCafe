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

get_header(); ?>


<div class="stock-breadcroumb-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php esc_html_e('Shop', 'stock-crazycafe'); ?></h1>
				<?php if(function_exists('bcn_display')) bcn_display(); ?>
			</div>
		</div>
	</div>
</div>

<div class="stock-internal-area section-enable-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php
                
                woocommerce_content();
                
				?>
			</div>
		</div>
	</div>
</div>

<?php 

// get_sidebar();
get_footer();
