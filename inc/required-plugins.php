<?php

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'stock_crazycafe_register_required_plugins' );

function stock_crazycafe_register_required_plugins() {

	$plugins = array(

		array(
			'name'               => 'Stock ToolKit', 
			'slug'               => 'stock-toolkit',
			'source'             => get_template_directory() . '/inc/plugins/stock-toolkit.zip',
			'required'           => true, 
			'version'            => '1.0', 
			'force_activation'   => true, 
			'force_deactivation' => true,
		),
		array(
			'name'               => 'WPBakery Page Builder', 
			'slug'               => 'js_composer',
			'source'             => get_template_directory() . '/inc/plugins/js_composer.zip',
			'required'           => true, 
			'version'            => '5.6', // 27.11.2018 - ver 5.6
										  // - Update: Compatibility with Wordpress 5.0
			'force_activation'   => false, 
			'force_deactivation' => false,
		),
		array(
			'name'               => 'Codestar Framework', 
			'slug'               => 'codestar-framework',
			'source'             => get_template_directory() . '/inc/plugins/codestar-framework.zip',
			'required'           => true, 
			'version'            => '1.0.2', // 27.11.2018 - ver 5.6
										  // - Update: Compatibility with Wordpress 5.0
			'force_activation'   => false, 
			'force_deactivation' => false,
		),
		array(
			'name'               => 'WooCommerce', 
			'slug'               => 'woocommerce',
			'source'             => get_template_directory() . '/inc/plugins/woocommerce.zip',
			'required'           => false, 
			'version'            => '4.2.2', // 27.11.2018 - ver 5.6
										  // - Update: Compatibility with Wordpress 5.0
			'force_activation'   => false, 
			'force_deactivation' => false,
		),

		array(
			'name'      => 'One click demo import',
			'slug'      => 'one-click-demo-import',
			'required'  => false,
		),
		array(
			'name'      => 'Contact form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => 'Breadcrumb NavXT',
			'slug'      => 'breadcrumb-navxt',
			'version'      => '6.5.0',
			'required'  => true,
		),


	);

	$config = array(
		'id'           => 'stock-crazycafe',       // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'stock-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
		
	);

	tgmpa( $plugins, $config );
}
