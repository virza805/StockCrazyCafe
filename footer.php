<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Stock
 */

$footer_copyright_text = cs_get_option('footer_copyright_text');
$footer_copyright_text_allowed_tags = array(
    'a' => array(
        'href' => array(),
        'title' => array()
    ),
    'img' => array(
        'alt' => array(),
        'src' => array()
    ),
    'br' => array(),
    'em' => array(),
    'strong' => array(),
);

?>

	<footer id="colophon" class="site-footer">
		<div class="container">
		<?php if(is_active_sidebar('stock_footer')) : ?>
			<div class="row">
				<?php dynamic_sidebar('stock_footer');?>
			</div>
		<?php endif; ?>
			<div class="row">
				<div class="col-md-12">
					<div class="stock-footer-bototm">
						<div class="row">
							<div class="col-lg-4 text-md-center">
								<?php 
								if(!empty($footer_copyright_text)) {

									 echo wp_kses($footer_copyright_text, $footer_copyright_text_allowed_tags );
									} else {
										esc_html_e('Copyright c 2020 FairDealiab - All Right Reserved', 'stock-crazycafe');
									}
								?>
							</div>
							<div class="col-lg-4 text-md-center">
							<!-- Privacy policy     |     Terms & Conditions -->
							<?php 
						$footer_last_menu = cs_get_option('footer_last_menu');

						if(!empty($footer_last_menu)) : ?>
							<?php foreach($footer_last_menu as $box) : ?>
								<?php if(!empty($box['link'])) : ?><a href="<?php echo $box['link']; ?>" class="stock-footer-last-menu"><?php else : ?><div class="stock-footer-last-menu"> <?php endif; ?>

								<?php echo esc_html($box['last_menu_title']); ?>

								<?php if(!empty($box['link'])) : ?></a><?php else : ?></div> <?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>


							<?php
								// wp_nav_menu(
								// 	array(
								// 		'theme_location' => 'footer-menu'
								// 	)
								// );
							?>
							</div>
							<div class="col-lg-4 text-md-center">
		 					<?php 
						$social_links = cs_get_option('social_links');

						if(!empty($social_links)) : ?>
							
								<div class="social-icons">
								<?php foreach($social_links as $link) : ?>
									<a href="<?php echo esc_url($link['link']); ?>" target="_blank"><i class="<?php echo esc_attr($link['icon']); ?>"></i></a>
									<?php endforeach; ?>
								</div>
								
						<?php endif; ?>
							</div>
						</div>
					</div>
				</div> 
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php 
// $body_end_scripts = cs_get_option('body_end_scripts');  
//echo $body_end_scripts; 
wp_footer(); ?>

</body>
</html>
