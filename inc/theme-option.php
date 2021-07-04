<?php 

define( 'CS_ACTIVE_FRAMEWORK',   true  ); // default true 
define( 'CS_ACTIVE_METABOX',     true ); // default true
define( 'CS_ACTIVE_TAXONOMY',    false ); // default true
define( 'CS_ACTIVE_SHORTCODE',   false ); // default true
define( 'CS_ACTIVE_CUSTOMIZE',   false ); // default true
define( 'CS_ACTIVE_LIGHT_THEME', false ); // default false
//setting theme option
add_filter('cs_framework_settings','stock_crazycafe_theme_options_setting');


//----------------------------------------
// Stock CrazyCafe Codestar Framework Settings    >=====>    >----->
// ---------------------------------------
	

function stock_crazycafe_theme_options_setting($settings){
	$settings = array(); // Removing default theme options

	$settings = array(
		'menu_title'=>'Stock-CrazyCafe Options',
		'menu_slug' =>'Stock-CrazyCafe-theme-options',
		'menu_type'	=>'menu',  // menu, submenu, options, theme, etc.
		'ajax_save'       => true,
  		'show_reset_all'  => true,
  		'framework_title' => 'Stock-CrazyCafe <small>Powered by Codestar Framework Version 1.0.2</small>',
	);

	return $settings;
}
add_filter('cs_framework_options','stock_crazycafe_theme_logo_options');

function stock_crazycafe_theme_logo_options($options){
	// $options = array(); // Removing default theme options
	$options[]=array(
		'name' => 'stock_crazycafe-header',
		'title' => 'Set-Logo by Raihan Islam',
		'description' => 'This system create to teach Raihan Islam vi his https://github.com/raihancsegit',
		'icon' => 'fa fa-snowflake-o',
		'fields' => array(
			array(
				'id' => 'title_swi',
				'type' => 'switcher',
				'title' => esc_html__( 'Site Title On/Off','stock-crazycafe')
			),
			array(
				'id' => 'site_title',
				'type' => 'text',
				'title' =>  esc_html__('Site Title from theme-option.php','stock-crazycafe'),
				'dependency'=> array('title_swi','==','true')
			),

			array(
				'id' => 'logo_swi',
				'type' => 'switcher',
				'title' =>  esc_html__('Site logo On/Off','stock-crazycafe')
			),
			array(
				'id' => 'logo',
				'type' => 'image',
				'title' =>  esc_html__('Logo Upload','stock-crazycafe'),
				'dependency'=> array('logo_swi','==','true')
			),
		)
	);
	return $options;
}