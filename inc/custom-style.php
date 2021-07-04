<?php 

if ( ! function_exists( 'stock_crazycafe_google_fonts_url' ) ) :
    /**
     * Register Google fonts.
     *
     * @return string Google fonts URL for the theme.
     */
    function stock_crazycafe_google_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        $body_font_variant = cs_get_option('body_font_variant');
        $body_font_variant_processed = implode(',', $body_font_variant);
        $body_subsets   = ':'.$body_font_variant_processed.'';

        $heading_font_variant = cs_get_option('heading_font_variant');
        $heading_font_variant_processed = implode(',', $heading_font_variant);
        $heading_subsets   = ':'.$heading_font_variant_processed.'';

        $body_font = cs_get_option('body_font')['family'];
        $body_font .=  $body_subsets;

        $heading_font = cs_get_option('heading_font')['family'];
        $heading_font .=  $heading_subsets;
    
        /* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== esc_html_x( 'on', 'Karla font: on or off', 'stock-crazycafe' ) ) {
            $fonts[] = $body_font;
        }
    
        /* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== esc_html_x( 'on', 'Lato font: on or off', 'stock-crazycafe' ) ) {
            $fonts[] = $heading_font;
        }
    
        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
            ), 'https://fonts.googleapis.com/css' );
        }
    
        return $fonts_url;
    }
    endif;
    
    
    /**
     * Enqueue scripts and styles.
     */
    function stock_crazycafe_prefix_scripts() {
    
        // Add custom fonts, used in the main stylesheet.
        wp_enqueue_style( 'stock_crazycafe_google_fonts', stock_crazycafe_google_fonts_url(), array(), null );
    }
    add_action( 'wp_enqueue_scripts', 'stock_crazycafe_prefix_scripts' );


    /**
 * Add color styling from theme
 */
function stock_crazycafe_custom_css() {
    wp_enqueue_style(
        'stock-crazycafe-custom-style',
        get_template_directory_uri() . '/assets/css/custom-style.css'
    );
        $body_font = cs_get_option('body_font')['family'];
        $body_font_variant = cs_get_option('body_font')['variant'];
        $heading_font = cs_get_option('heading_font')['family'];
        $heading_font_variant = cs_get_option('heading_font')['variant'];
        
        $enable_boxed_layout = cs_get_option('enable_boxed_layout');
        $body_bg_color = cs_get_option('body_bg_color');
        $body_bg = cs_get_option('body_bg');
        $body_bg_img_array = wp_get_attachment_image_src( $body_bg, 'large', false);
        $body_bg_repeat = cs_get_option('body_bg_repeat');
        $body_bg_attachment = cs_get_option('body_bg_attachment');

        // // Stock CrazyCafe Footer Settings >-----> css3
        $footer_bg = cs_get_option('footer_bg');
        $footer_text_color = cs_get_option('footer_text_color');
        $footer_heading_color = cs_get_option('footer_heading_color');

         // Stock CrazyCafe Theme Color Settings >-----> css3
        $theme_color = cs_get_option('theme_color');
        $theme_seconday_color = cs_get_option('theme_seconday_color');

        $custom_css = '
            body {font-family: '.esc_html($body_font).'; font-weight: '.esc_attr($body_font_variant).'}
            h1, h2, h3, h4, h5, h6 {font-family: '.esc_html($heading_font).'; font-weight: '.esc_attr($heading_font_variant).'}
        ';
        if($enable_boxed_layout == true){
            if(!empty($body_bg_color)) {
                $custom_css .= '
                    body {background-color: '.esc_attr($body_bg_color).'}
                ';
            }
            if(!empty($body_bg)) {
                $custom_css .= '
                    body {background-image:url('.esc_url($body_bg_img_array[0]).')}
                ';
            }
            if(!empty($body_bg_repeat)) {
                $custom_css .= '
                    body {background-repeat: '.esc_attr($body_bg_repeat).'}
                ';
            }
            if(!empty($body_bg_attachment)) {
                $custom_css .= '
                    body {background-attachment: '.esc_attr($body_bg_attachment).'}
                ';
            }
        }


        if(!empty($footer_bg)) {
            $custom_css .= '
                .site-footer {background: '.esc_attr($footer_bg).'}
            ';
        }
        if(!empty($footer_text_color)) {
            $custom_css .= '
                .site-footer, .site-footer a {color: '.esc_attr($footer_text_color).'}
            ';
        }
        if(!empty($footer_heading_color)) {
            $custom_css .= '
            .site-footer h4.widget-title {color: '.esc_attr($footer_heading_color).'}
            ';
        }
        if(!empty($theme_color)) {
            $custom_css .= '
            input[type="submit"], button[type="submit"], .stock-breadcroumb-area, .stock-breadcroumb-area::after , .stock-readmore-btn, .entry-content .page-links a, .comments-area table th, .comment-reply-link, .mainemnu li ul, .stock-cart:hover i.fa, .stock-contact-box:hover i.fa, .preloader-wrapper, .mainemnu li ul, .stock-cart span, .stock-slides .owl-nav button:hover i.fa, .stock-cta-box.stock-cta-box-theme-2, .vc_wp_custommenu li a:before, ul.stock-project-shorting li:before, .work-box-bg:after, .stock-project-shorting-2 li.active:after, .comments-area table th, .comment-reply-link  {background: '.esc_attr($theme_color).'}

            .stock-cart i.fa, .stock-contact-box i.fa, .widget.widget_rss .rss-date, .stock-contact-box:hover i.fa, .social-icons a i.fa, .mainemnu li:hover > a, .stock-cart i.fa, .stock-contact-box i.fa, .list-box ul, .stock-project-shorting-2 li.active {color: '.esc_attr($theme_color).'}
            ';
        }
        if(!empty($theme_seconday_color)) {
            $custom_css .= '
            .site-footer h4.widget-title {color: '.esc_attr($theme_seconday_color).'}
            ';
        }

        wp_add_inline_style( 'stock-crazycafe-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'stock_crazycafe_custom_css' ); 