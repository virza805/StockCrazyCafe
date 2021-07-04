<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Stock
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php
	$enable_preloader = cs_get_option('enable_preloader'); 
	$enable_boxed_layout = cs_get_option('enable_boxed_layout'); 
	//  $head_scripts = cs_get_option('head_scripts'); 
	//  $body_start_scripts = cs_get_option('body_start_scripts');  
	
	
	wp_head(); // echo $head_scripts; ?>
</head>

<body <?php body_class(); ?>>

<?php  echo $body_start_scripts; ?>

<?php if($enable_preloader == true) : ?>
	<!-- preloader -->
	<script>
            jQuery(window).load(function(){
                jQuery(".preloader-wrapper").fadeOut();

            });
    </script>

	<div class="preloader-wrapper">
		<div class="loader">Loading...</div>
	</div>

<?php endif; ?>

<?php wp_body_open(); ?>
<div id="page" class="site<?php if($enable_boxed_layout == true) : ?> stock-boxed-layout<?php endif; ?>">
 
	<div class="header-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 text-lg-center">
					<div class="site-logo">
						<a href="<?php echo esc_url(home_url('/')); ?>">
						
								<?php 
							if(function_exists('cs_get_option')){

							$site = cs_get_option('site_title'); 
							$logo = cs_get_option('logo');
							$img = wp_get_attachment_image_src($logo,'full');
							// print_r($img); 
							$img_show = cs_get_option('logo_swi'); 
							$tit_show = cs_get_option('title_swi');

							}else{

							$site = 'Default';

							}
							?>
							<?php if($img_show == true ) {?>

							<img src="<?php echo esc_url($img[0]); ?>" alt="" class="custom-logo">

							<?php }  ?>
							
							<?php if($tit_show == true ) {?>

							<h2><?php echo esc_html($site); ?></h2>

							<?php }  ?>
						</a>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="header-right-content">
						<?php 
						$header_iconic_boxes = cs_get_option('header_iconic_boxes');

						if(!empty($header_iconic_boxes)) : ?>
							<?php foreach($header_iconic_boxes as $box) : ?>
								<?php if(!empty($box['link'])) : ?><a href="<?php echo $box['link']; ?>" class="stock-contact-box"><?php else : ?><div class="stock-contact-box"> <?php endif; ?>

									<i class="<?php echo esc_attr($box['icon']); ?>"></i>
									<?php echo esc_html($box['title']); ?>
									<h3><?php echo esc_html($box['big_title']); ?></h3>

								<?php if(!empty($box['link'])) : ?></a><?php else : ?></div> <?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>


						<?php 
						if ( class_exists( 'WooCommerce' ) ) {
							stock_crazycafe_woocommerce_cart_link();
						}
						?>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="stock-responsive-menu"></div>
					<div class="mainemnu">
					<script>
						// $(function(){
						// 	$('#primary-menu').slicknav();
						// });
					</script>
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
					?>
					</div>
				</div>
			</div>
		</div>
	</div>


