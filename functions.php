<?php
/**
 * Stock functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Stock
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'stock_crazycafe_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function stock_crazycafe_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Stock, use a find and replace
		 * to change 'stock-crazycafe' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'stock-crazycafe', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'stock-crazycafe-blog-thumb', 750, 450, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'stock-crazycafe' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'stock_crazycafe_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support('woocommerce');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'stock_crazycafe_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function stock_crazycafe_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'stock_crazycafe_content_width', 640 );
}
add_action( 'after_setup_theme', 'stock_crazycafe_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function stock_crazycafe_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'stock-crazycafe' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'stock-crazycafe' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Project Sidebar', 'stock-crazycafe' ),
			'id'            => 'stock_project_sidebar',
			'description'   => esc_html__( 'Add project sidebar widgets here.', 'stock-crazycafe' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets', 'stock-crazycafe' ),
			'id'            => 'stock_footer',
			'description'   => esc_html__( 'Add footer widgets here.', 'stock-crazycafe' ),
			'before_widget' => '<div class="col-md-6 col-lg-3"> <div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'stock_crazycafe_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function stock_crazycafe_scripts() {

	wp_enqueue_style( 'stock-default', get_template_directory_uri() . '/assets/css/default.css', array(), '1.0.0');
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.3.1');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), '4.7.0');
	wp_enqueue_style( 'stock-crazycafe-style', get_stylesheet_uri() );

	wp_enqueue_script( 'popper-bootstrap', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '4.3.1', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.3.1', true );
	wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/slicknav.min.js', array('jquery'), '4.3.1', true );
	wp_enqueue_script( 'stock-crazycafe-active', get_template_directory_uri() . '/assets/js/active.js', array('jquery'), '4.3.1', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$head_scripts = cs_get_option('head_scripts');
	wp_add_inline_script('stock-crazycafe-active', $head_scripts);

	$stock_custom_css = cs_get_option('stock_custom_css');
	wp_add_inline_style('stock-crazycafe-style', $stock_custom_css);

	$body_end_scripts = cs_get_option('body_end_scripts');
	wp_add_inline_script('stock-crazycafe-active', $body_end_scripts);
}
add_action( 'wp_enqueue_scripts', 'stock_crazycafe_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * metabox-and-options.
 */
require get_template_directory() . '/inc/metabox-and-options.php';

/**
 * theme-option.
 */
require get_template_directory() . '/inc/theme-option.php';
/**
 * Add Google font / Custom Style
 */
require get_template_directory() . '/inc/custom-style.php';
/**
 * Add required-plugins.php
 */
require get_template_directory() . '/inc/required-plugins.php';


if ( class_exists( 'WooCommerce' ) ) {
  // code that requires WooCommerce
	
	// Handle cart in header fragment for ajax add to cart
	add_filter('add_to_cart_fragments', 'header_add_to_cart_fragment');
	function stock_crazycafe_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
	
		ob_start();
	
		stock_crazycafe_woocommerce_cart_link();
	
		$fragments['a.cart-button'] = ob_get_clean();
	
		return $fragments;
	
	}
	
	function stock_crazycafe_woocommerce_cart_link() {
		global $woocommerce;
		?>

		<a title="<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> <?php _e('in your shopping cart', 'woothemes'); ?>" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="stock-cart">
			<i class="fa fa-shopping-cart"></i> <span class="stock-cart-count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?></span>
		</a>
		
		<?php
	}

}
// else {
// 	// you don't appear to have WooCommerce activated
//   }

  // Import demo data =================== 

  function stock_crazycafe_import_files() {
	return array(
		array(
			'import_file_name'           	=> esc_html__('Demo Import 1', 'stock-crazycafe'),

			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo-data/stock-crazycafe-demo-data.xml',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo-data/stock-crazycafe-export.dat',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo-data/stock-crazycafe-widgets.wie',
			
			'import_notice'              	=> __( 'After import demo, just set static homepage from settings > reading, check widgets & menus. You will be done! :-)', 'stock-crazycafe' ),
		)
	);
} // industry_import_files
add_filter( 'pt-ocdi/import_files', 'stock_crazycafe_import_files' );

