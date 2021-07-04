<?php if(!defined('ABSPATH')) {dir;} //Can't access pages directly.

function stock_crazycafe_theme_customizer($options) {
    $options = array(); //remove Old options
}
add_filter('cs_customize_options', 'stock_crazycafe_theme_customizer');

function stock_crazycafe_theme_shortcode_options($options) {
    $options = array(); //remove shortcode options
}
add_filter('cs_shortcode_options', 'stock_crazycafe_theme_shortcode_options');


//register metaboixs options
function stock_theme_metabox($options){
    $options = array(); //remove Old options
    
    //----------------------------------------
    // Page Metabox Options       ---- esc_attr__( , 'stock-crazycafe')
    // ---------------------------------------
    
    $options[] = array(
        'id'        =>  'stock_page_options',
        'title'     =>  esc_html__('Page Options', 'stock-crazycafe'),
        'post_type' =>  'page',
        'context'   =>  'normal',
        'priority'  =>  'high',
        'sections'  =>  array(
            // begin: a section
            array(
                'name'      =>  'stock_page_options_meta',

                // begin: fields
                'fields'    =>  array(
                    array(
                        'id'       =>  'enable_title',
                        'title'    =>  esc_html__( 'Enable Title', 'stock-crazycafe'),
                        'type'     =>  'switcher',
                        'default'  =>  true,
                        'desc'     =>  esc_html__('If you want to enable title, select yes ', 'stock-crazycafe'),     
                    ),
                    array(
                        'id'       =>  'custom_title',
                        'title'    =>  esc_html__( 'Custom Title', 'stock-crazycafe'),
                        'type'     =>  'text',
                        'dependency' => array( 'enable_title', '==', 'true'),
                        'desc'     =>  esc_html__('If you want to custom title ', 'stock-crazycafe'),     
                    ),
                    
                ), // end field
            )
        ),
    );
  
    
    //-----------------------------------------
    // Slide options
    // ---------------------------------------
    
    $options[] = array(
        'id'        =>  'stock_slide_options',
        'title'     =>  'slide Options',
        'post_type' =>  'slide',
        'context'   =>  'normal',
        'priority'  =>  'high',
        'sections'  =>  array(
            // begin: a section
            array(
                'name'      =>  'stock_slide_options_meta',

                // begin: fields
                'fields'    =>  array(
                    array(
                        'id'       =>  'buttons',
                        'title'    =>  'Slide buttons',
                        'type'     =>  'group',
                        'button_title'  =>  'Add New',
                        'accordion_title'  =>  'Add New button',
                        'fields'     =>  array(
                            array(
                                'id' => 'type',
                                'type' => 'select',
                                'title' => 'Button type',
                                'desc' => 'Sleet you Button Style',
                                'options' => array(
                                    'bordered' => 'Bordered Button',
                                    'filled' => 'Filled button',
                                ),
                            ),
                            array(
                                'id' => 'text',
                                'type' => 'text',
                                'title' => 'Button ext',
                                'desc' => 'Enter Button Text',
                                'default' => 'Get free consultation',
                            ),
                            array(
                                'id' => 'link_type',
                                'type' => 'select',
                                'title' => 'Link type',
                                'desc' => 'Chooces URL link',
                                'options' => array(
                                    '1' => 'WordPress Page',
                                    '2' => 'External Link',
                                ), 
                            ),
                            array(
                                'id' => 'link_to_page',
                                'type' => 'select',
                                'title' => 'Select page',
                                'options' => 'page',
                                    'dependency' => array( 'link_type', '==', '1'),
                            ),
                            array(
                                'id' => 'link_to_external',
                                'type' => 'text',
                                'title' => 'Type URL',
                                    'dependency' => array( 'link_type', '==', '2'),
                            ),

                        ),  
                        
                    ),

                    array(
                        'id' => 'enable_overlay',
                        'type' => 'switcher',
                        'title' => 'Enable Overlay ?',
                        'default' => true,
                    ),
                    array(
                        'id' => 'overlay_percentage', // this is must be unique
                        'type' => 'text',
                        'title' => 'Enter Percentage ( % )',
                        'default' => '.7',
                        'desc' => 'Type overlay percentage in floding number. Max value is 1.',
                        'dependency' => array( 'enable_overlay', '==', 'true'),
                    ),
                    array(
                        'id' => 'overlay_color',
                        'type' => 'color_picker',
                        'title' => 'Overlay Color',
                        'default' => '#181a1f',
                        'dependency' => array( 'enable_overlay', '==', 'true'),
                    ),

                ), // end field
            )
            ),
    );
  
    return $options;
}

    //----------------------------------------
    // Stock CrazyCafe Header Settings options       >=====>        >----->
    // ---------------------------------------
function stock_theme_options($options) {
    $options = array(); // Removing default theme options

    $options[] = array(
        'name'   => 'stock_crazycafe_header_settings',
        'title'       => esc_html__( 'Header Settings', 'stock-crazycafe'),
        'description' => 'This system create to teach RRF',
        'icon' => 'fa fa-header', //  fa-diamond
        'fields'      => array(
    
            array(
                'id'        => 'header_iconic_boxes',
                'type'      => 'group',
                'title'     => esc_html__( 'Iconic Boxes', 'stock-crazycafe'),
                'desc'     => 'If you want to show Iconic Box on header. Add those here',
                'button_title'     => 'Add New',
                'accordion_title'     => 'Add New Box',
                'fields'    => array(
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => esc_html__( 'Title', 'stock-crazycafe'),
                    ),
                    array(
                        'id'    => 'icon',
                        'type'  => 'icon',
                        'title' => esc_html__( 'Box icon', 'stock-crazycafe'),
                    ),
                    array(
                        'id'    => 'big_title',
                        'type'  => 'text',
                        'title' => esc_html__( 'Big Title', 'stock-crazycafe'),
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => esc_html__('Box Link', 'stock-crazycafe'),
                        'desc' => 'Leave blank if you do not want a link',
                    ),
                ),
            ),    
        )
      );

 // Stock CrazyCafe Font family / Typography  >----->
    $options[] = array(
        'name'      => 'stock_crazycafe_typography_settings',
        'title'   => esc_html__( 'Typography Settings', 'stock-crazycafe'),
        'icon' => 'fa fa-font',
        'fields' => array(
            array(
            'id'       => 'body_font',
            'type' => 'typography',
            'title'   => esc_html__( 'Body font', 'stock-crazycafe'),
            'desc'   => esc_html__('Default font "Roboto & regular". If you want to show different font family, you can change now . From Google', 'stock-crazycafe'),
            'default' => array(
                'font-family' => 'Roboto',
                'variant'        => 'regular',
                'type'        => 'google', 
                'font'        => 'google', // this is helper for output
                
                ),
            ),
            array(
                'id'         => 'body_font_variant',
                'type'       => 'checkbox',
                'title'      => esc_html__( 'Body font types', 'stock-crazycafe'),
                'options'    => array(
                  '100' => '100',
                  '100i' => '100i',
                  '200' => '200',
                  '200i' => '200i',
                  '300' => '300',
                  '300i' => '300i',
                  '400' => '400',
                  '400i' => '400i',
                  '500' => '500',
                  '500i' => '500i',
                  '700' => '700',
                  '700i' => '700i',
                  '900' => '900',
                  '900i' => '900i',
                ),
                'default'    => array( '400', '400i', '700i', '700i' )
            ),
            array(
            'id'       => 'heading_font',
            'type' => 'typography',
            'title'   => esc_html__( 'Heading font', 'stock-crazycafe'),
            'desc'   => esc_html__('Default font "Noto Serif & 700" .If you want to change heading font family, you can do... From Google', 'stock-crazycafe'),
            'default' => array(
                'font-family' => 'Noto Serif',
                'variant'        => '700', 
                'type'        => 'google',
                'font'        => 'google', // this is helper for output
                
                ),
            ),
            array(
                'id'         => 'heading_font_variant',
                'type'       => 'checkbox',
                'title'      => esc_html__( 'Body font types', 'stock-crazycafe'),
                'options'    => array(
                  '100' => '100',
                  '100i' => '100i',
                  '200' => '200',
                  '200i' => '200i',
                  '300' => '300',
                  '300i' => '300i',
                  '400' => '400',
                  '400i' => '400i',
                  '500' => '500',
                  '500i' => '500i',
                  '700' => '700',
                  '700i' => '700i',
                  '900' => '900',
                  '900i' => '900i',
                ),
                'default'    => array( '400', '400i', '700i', '700i' )
            ),
              
        )
    );

 // Stock CrazyCafe Styling/PreLoader>----->
    $options[] = array(
        'name'      => 'stock_crazycafe_styling_settings',
        'title'   => esc_html__( 'Styling Settings', 'stock-crazycafe'),
        'icon' => 'fa fa-diamond',
        'fields' => array(
            array(
            'id'       => 'theme_color',
            'type' => 'color_picker',
            'title'   => esc_html__( 'Theme Color', 'stock-crazycafe'),
            'default'   => esc_attr__('#278cc1', 'stock-crazycafe'),
            ),
            array(
            'id'       => 'theme_seconday_color',
            'type' => 'color_picker',
            'title'   => esc_html__( 'Theme Secondary Color', 'stock-crazycafe'),
            'default'   => esc_attr__('#fef14a', 'stock-crazycafe'),
            ),
            array(
            'id'       => 'enable_preloader',
            'type' => 'switcher',
            'title'   => esc_html__( 'Enable Preloader', 'stock-crazycafe'),
            'desc'   => esc_html__( 'Enable Theme Preloader', 'stock-crazycafe'),
            'default'   => true,
            ),
            array(
            'id'       => 'enable_s_preloader',
            'type' => 'switcher',
            'title'   => esc_html__('Enable Slid Preloader', 'stock-crazycafe'),
            'desc'   => esc_html__('Enable Slid Preloader', 'stock-crazycafe'),
            'default'   => true,
            ),
            array(
            'id'       => 'enable_boxed_layout',
            'type' => 'switcher',
            'title'   => esc_html__( 'Enable boxed_layout', 'stock-crazycafe'),
            'default'   => false,
            ),
            array(
            'id'       => 'body_bg',
            'type' => 'image',
            'title'   => esc_html__('Body background image', 'stock-crazycafe'),
            'dependency' => array('enable_boxed_layout', '==', 'true'),
            ),
            array(
            'id'       => 'body_bg_color',
            'type' => 'color_picker',
            'title'   => esc_html__('Body background color', 'stock-crazycafe'),
            'dependency' => array('enable_boxed_layout', '==', 'true'),
            ),
            array(
            'id'       => 'body_bg_repeat',
            'type' => 'select',
            'default' =>'repeat',
            'options' => array(
                'repeat' => 'Repeat',
                'no-repeat' => 'No Repeat',
                'cover' => 'Cover',
            ),
            'title'   => esc_html__( 'Body Background Style', 'stock-crazycafe'),
            'dependency' => array('enable_boxed_layout', '==', 'true'),
            ),
            array(
            'id'       => 'body_bg_attachment',
            'type' => 'select',
            'default' =>'scroll',
            'options' => array(
                'scroll' => 'Scroll',
                'fixed' => 'Fixed',
                'center' => 'Center',
            ),
            'title'   => esc_html__( 'Body Background Position', 'stock-crazycafe'),
            'dependency' => array('enable_boxed_layout', '==', 'true'),
            ),
        )
    );

 // Stock CrazyCafe Blog / News Settings >----->
    $options[] = array(
        'name'      => 'stock_crazycafe_blog_settings',
        'title'   => esc_html__( 'Blog Settings', 'stock-crazycafe'),
        'icon' => 'fa fa-rss',
        'fields' => array(
            array(
                'id'    => 'blog_title',
                'type'  => 'text',
                'title' => esc_html__( 'Blog Title', 'stock-crazycafe'),
                'default'   => esc_html__('Blogs', 'stock-crazycafe'),
                'desc' => esc_html__('You can change blog/news title', 'stock-crazycafe'),
            ),
            array(
            'id'       => 'display_post_by',
            'type' => 'switcher',
            'title'   => esc_html__( 'Display post by ?', 'stock-crazycafe'),
            'default'   => true,
            'desc'   => esc_html__('If you want to show blog post author name on blog index page &  single blog, Select on', 'stock-crazycafe'),
            ),
            array(
            'id'       => 'display_post_date',
            'type' => 'switcher',
            'title'   => esc_html__( 'Display post date ?', 'stock-crazycafe'),
            'default'   => true,
            'desc'   => esc_html__('If you want to show blog post date on blog index page &  single blog, Select on', 'stock-crazycafe'),
            ),
            array(
            'id'       => 'display_post_comment_count',
            'type' => 'switcher',
            'title'   => esc_html__( 'Display post comment count ?', 'stock-crazycafe'),
            'default'   => true,
            'desc'   => esc_html__('If you want to show blog post comment count on blog index page &  single blog, Select on', 'stock-crazycafe'),
            ),
            array(
            'id'       => 'display_post_category',
            'type' => 'switcher',
            'title'   => esc_html__( 'Display posted ind categories ?', 'stock-crazycafe'),
            'default'   => true,
            'desc'   => esc_html__('If you want to show blog post category on blog index page &  single blog, Select on', 'stock-crazycafe'),
            ),
            array(
            'id'       => 'display_post_tag',
            'type' => 'switcher',
            'title'   => esc_html__( 'Display posted in tags ?', 'stock-crazycafe'),
            'default'   => true,
            'desc'   => esc_html__('If you want to show tags on blog index page &  single blog, Select on', 'stock-crazycafe'),
            ),
            array(
            'id'       => 'display_post_nav',
            'type' => 'switcher',
            'title'   => esc_html__('Enable next previous link on single post ?', 'stock-crazycafe'),
            'default'   => true,
            'desc'   => esc_html__('If you want to show next previous link on blog index page &  single blog, Select on', 'stock-crazycafe'),
            ),
        )
    );
 // Stock CrazyCafe Footer Settings >----->
    $options[] = array(
        'name'      => 'stock_crazycafe_footer_settings',
        'title'   => esc_html__('Footer Settings', 'stock-crazycafe'),
        'icon' => 'fa fa-spinner',
        'fields' => array(
            
            array(
            'id'       => 'footer_bg',
            'type' => 'color_picker',
            'title'   => esc_html__('Footer background color', 'stock-crazycafe'),
            'default'   => esc_attr__('#2a2d2f', 'stock-crazycafe'),
            'desc'   => esc_html__('If you want to show different footer widget background color you can change now ', 'stock-crazycafe'),
            ),
            array(
            'id'       => 'footer_text_color',
            'type' => 'color_picker',
            'title'   => esc_html__('Footer text color', 'stock-crazycafe'),
            'default'   => esc_attr__('#afb9c0', 'stock-crazycafe'),
            'desc'   => esc_html__('If you want to show different footer widget text color you can change now ', 'stock-crazycafe'),
            ),
            array(
            'id'       => 'footer_heading_color',
            'type' => 'color_picker',
            'title'   => esc_html__( 'Footer Heading color', 'stock-crazycafe'),
            'default'   => esc_attr__('#ffffff', 'stock-crazycafe'),
            'desc'   => esc_html__('If you want to show different footer widget heading color you can change now ', 'stock-crazycafe'),
            ),
            array(
            'id'       => 'footer_copyright_text',
            'type' => 'textarea',
            'title'   => esc_html__('Footer CopyRight Text', 'stock-crazycafe'),
            'default'   => esc_html__('Copyright © 2020 vir-za.com - All Rights Reserved', 'stock-crazycafe'),
            'desc'   => esc_html__('Now, you can change copyright area...', 'stock-crazycafe'),
            ),
            array(
                'id'        => 'footer_last_menu',
                'type'      => 'group',
                'title'     => esc_html__( 'Footer Last Menu', 'stock-crazycafe'),
                'desc'   => esc_html__('Now, you can set last menu after copyright area...', 'stock-crazycafe'),
                
                'button_title'     => 'Add New',
                'accordion_title'     => 'Add New Footer Menu item',
                'fields'    => array(
                  
                  
                    array(
                        'id'    => 'last_menu_title',
                        'type'  => 'text',
                        'title' => esc_html__( 'Footer Last Menu item', 'stock-crazycafe'),
                        'default'   => esc_html__('Privacy policy     |     Terms & Conditions', 'stock-crazycafe'),
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => esc_html__('Last Menu Link', 'stock-crazycafe'),
                        'desc' => 'Leave blank if you do not want a link',
                    ),
                ),
            ),
            
        )
    );

// Stock CrazyCafe Footer Social icon  >-----> 
     $options[] = array(
        'name'   => 'stock_crazycafe_social_settings',
        'title'       => esc_html__( 'Social Settings', 'stock-crazycafe'),
        'description' => 'This system create to teach RRF',
        'icon' => 'fa fa-share',
        'fields'      => array(
    
            array(
                'id'        => 'social_links',
                'type'      => 'group',
                'title'     => esc_html__( 'Social Links', 'stock-crazycafe'),
                'button_title'     => 'Add New',
                'accordion_title'     => 'Add New link',
                'fields'    => array(
                  
                  array(
                    'id'    => 'icon',
                    'type'  => 'icon',
                    'title' => esc_html__( 'Box icon', 'stock-crazycafe'),
                  ),
                  array(
                    'id'    => 'link',
                    'type'  => 'text',
                    'title' => esc_html__( 'Link', 'stock-crazycafe'),
                  ),
                ),
            ),    
        )
    );

 // Stock CrazyCafe Scripts Settings >-----> 
    $options[] = array(
        'name'   => 'stock_crazycafe_scripts_settings',
        'title'       => esc_html__('Scripts Settings', 'stock-crazycafe'),
        'icon' => 'fa fa-file-text-o',
        'fields'      => array(
            array(
                'id'    => 'head_scripts',
                'type'  => 'textarea',
                'sanitize' => false,
                'title' => esc_html__( 'Head Scripts', 'stock-crazycafe'),
                'desc' => esc_html__('Scripts goes before closing < / head >', 'stock-crazycafe'),
            ),    
            array(
                'id'    => 'stock_custom_css',
                'type'  => 'textarea',
                'sanitize' => false,
                'title' => esc_html__( 'Custom CSS', 'stock-crazycafe'),
                'desc' => esc_html__( 'Add your custom CSS here', 'stock-crazycafe'),
            ),    
            array(
                'id'    => 'body_end_scripts',
                'type'  => 'textarea',
                'sanitize' => false,
                'title' => esc_html__('Footer scripts', 'stock-crazycafe'),
                'desc' => esc_html__( 'Scripts goes just before < / body >', 'stock-crazycafe'),
            ),    
                
        )
    );

      return $options;
}
add_filter('cs_framework_options', 'stock_theme_options');