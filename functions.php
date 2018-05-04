<?php

add_theme_support('menus');

/**
 * Register Menus
 * http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 *
 * Foundation Nav Walker from https://gist.github.com/awshout/3943026
 */

register_nav_menus(array(
    'top-bar-l' => 'Left Top Bar', // registers the menu in the WordPress admin menu editor
    'top-bar-r' => 'Right Top Bar'
));


/**
 * Left top bar
 * http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
function foundation_top_bar_l() {
    wp_nav_menu(array(
        'container' => false,                           // remove nav container
        'container_class' => '',           		// class of container
        'menu' => '',                      	        // menu name
        'menu_class' => 'top-bar-menu left',         	// adding custom nav class
        'theme_location' => 'top-bar-l',                // where it's located in the theme
        'before' => '',                                 // before each link <a>
        'after' => '',                                  // after each link </a>
        'link_before' => '',                            // before each link text
        'link_after' => '',                             // after each link text
        'depth' => 5,                                   // limit the depth of the nav
    	'fallback_cb' => false,                         // fallback function (see below)
        'walker' => new top_bar_walker()
	));
}

/**
 * Right top bar
 */
function foundation_top_bar_r() {
    wp_nav_menu(array(
        'container' => false,                           // remove nav container
        'container_class' => '',           		// class of container
        'menu' => '',                      	        // menu name
        'menu_class' => 'top-bar-menu right',         	// adding custom nav class
        'theme_location' => 'top-bar-r',                // where it's located in the theme
        'before' => '',                                 // before each link <a>
        'after' => '',                                  // after each link </a>
        'link_before' => '',                            // before each link text
        'link_after' => '',                             // after each link text
        'depth' => 5,                                   // limit the depth of the nav
    	'fallback_cb' => false,                         // fallback function (see below)
        'walker' => new top_bar_walker()
	));
}

/**
 * Customize the output of menus for Foundation top bar
 */

class top_bar_walker extends Walker_Nav_Menu {
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $element->has_children = !empty( $children_elements[$element->ID] );
        $element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
        $element->classes[] = ( $element->has_children ) ? 'has-dropdown' : '';
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

    function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
        $item_html = '';
        parent::start_el( $item_html, $object, $depth, $args );
        $output .= ( $depth == 0 ) ? '<li class="divider"></li>' : '';
        $classes = empty( $object->classes ) ? array() : (array) $object->classes;

        if( in_array('label', $classes) ) {
            $output .= '<li class="divider"></li>';
            $item_html = preg_replace( '/<a[^>]*>(.*)<\/a>/iU', '<label>$1</label>', $item_html );
        }

	if ( in_array('divider', $classes) ) {
		$item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '', $item_html );
	}

        $output .= $item_html;
    }

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "\n<ul class=\"sub-menu dropdown\">\n";
    }

}

/**
 * Set the content width based on the theme's design and stylesheet (from zircon)
 */
if ( ! isset( $content_width ) ) {
	$content_width = 750; /* pixels */
}

// Theme Setup
function wpf_theme_setup(){

    // Add Featured Image Support
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail');
    add_image_size('banner-image', 2000, 280, array( 'center', 'center' ));
    add_image_size('related-image', 400, 275, true);

    // Add Post Format Support See http://codex.wordpress.org/Post_Formats
    add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));
    /*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5(from zircon)
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

    // Let WordPress manage the document title (from Zircon)
    add_theme_support( 'title-tag' );

    // Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
    
    add_theme_support( 'woocommerce' );
    
    /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'visionbypixels', get_template_directory() . '/languages' );
}

add_action('after_setup_theme', 'wpf_theme_setup');

// Excerpt Length
function set_excerpt_length(){
    return 25;
}
add_filter('excerpt_length', 'set_excerpt_length');


// Widget Locations

function wpf_init_widgets($id){
    register_sidebar(array(
    'name'  =>  'Blog Sidebar 1',
    'id'    =>  'blog-sidebar1',
    'before_widget' =>  '<div class="widget-item">',
    'after_widget' =>  '</div>',
    'before_title' =>  '<h3 class="widget-title">',
    'after_title' =>  '</h3>'
    ));

    register_sidebar(array(
    'name'  =>  'Blog Sidebar 2',
    'id'    =>  'blog-sidebar2',
    'before_widget' =>  '<div class="widget-item">',
    'after_widget' =>  '</div>',
    'before_title' =>  '<h3 class="widget-title">',
    'after_title' =>  '</h3>'
    ));

    register_sidebar(array(
    'name'  =>  'Blog Sidebar 3',
    'id'    =>  'blog-sidebar3',
    'before_widget' =>  '<div class="widget-item">',
    'after_widget' =>  '</div>',
    'before_title' =>  '<h3 class="widget-title">',
    'after_title' =>  '</h3>'
    ));
    
    register_sidebar(array(
    'name'  =>  'Portfolio Sidebar 1',
    'id'    =>  'portfolio-sidebar1',
    'before_widget' =>  '<div class="widget-item">',
    'after_widget' =>  '</div>',
    'before_title' =>  '<h3 class="widget-title">',
    'after_title' =>  '</h3>'
    ));

    register_sidebar(array(
    'name'  =>  'Portfolio Sidebar 2',
    'id'    =>  'portfolio-sidebar2',
    'before_widget' =>  '<div class="widget-item">',
    'after_widget' =>  '</div>',
    'before_title' =>  '<h3 class="widget-title">',
    'after_title' =>  '</h3>'
    ));

    register_sidebar(array(
    'name'  =>  'Portfolio Sidebar 3',
    'id'    =>  'portfolio-sidebar3',
    'before_widget' =>  '<div class="widget-item">',
    'after_widget' =>  '</div>',
    'before_title' =>  '<h3 class="widget-title">',
    'after_title' =>  '</h3>'
    ));
    
    register_sidebar(array(
    'name'  =>  'Sharing Sidebar 1',
    'id'    =>  'sharing-sidebar1',
    'before_widget' =>  '<div class="widget-item">',
    'after_widget' =>  '</div>',
    'before_title' =>  '<h3 class="widget-title">',
    'after_title' =>  '</h3>'
    ));
}

add_action('widgets_init', 'wpf_init_widgets');

// Custom header image https://codex.wordpress.org/Custom_Headers#Use_flexible_headers

$args = array(
	'width'         => 2000,
	'height'        => 375,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
	'uploads'       => true,
);

add_theme_support( 'custom-header', $args );

// Enqueue Styles https://www.youtube.com/watch?v=eT2njM2E9sE

function visionbypixels_theme_styles() {
  wp_enqueue_style('foundation_css', get_template_directory_uri() . '/css/foundation.min.css');
  wp_enqueue_style('style_css', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('font_awesome_css', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.min.css');
  wp_enqueue_style('woocommerce_css', get_template_directory_uri() . '/woocommerce.css');
}

add_action('wp_enqueue_scripts', 'visionbypixels_theme_styles');


// Enqueue Scripts http://foundation.zurb.com/forum/posts/2284-foundation-5-to-wordpress-js-jquery-scripts

function visionbypixels_theme_js() {
  wp_deregister_script('jquery');
  wp_register_script('jquery', "https://code.jquery.com/jquery-2.1.0.js", array(),'2.1.0',false);
  wp_register_script('foundation', get_template_directory_uri()."/js/vendor/foundation.min.js", array('jquery'),'5.1.1',true);
  wp_register_script('masonry', get_template_directory_uri()."/js/masonry.pkgd.min.js", array('jquery'),'4.1.1',true);
  wp_register_script('what-input', get_template_directory_uri()."/js/vendor/what-input.js", array('jquery'),'',true);
  wp_enqueue_script(array('jquery','foundation', 'masonry', 'what-input'));
}

add_action('wp_print_scripts','visionbypixels_theme_js');


// Enqueue Google Fonts https://premium.wpmudev.org/blog/custom-google-fonts/

function google_fonts() {
	$query_args = array(
		'family' => 'Lato:400,400i,700|Montserrat:400,700|Quattrocento+Sans',
		'subset' => 'latin,latin-text',
	);
	wp_register_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
}
            
add_action('wp_enqueue_scripts', 'google_fonts');

$defaults = array(
	'default-color'          => '#1A1A1A',
	'default-image'          => get_template_directory_uri() . '/images/default_background.jpg',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);

add_theme_support( 'custom-background', $defaults );

/**
 * Registers an editor stylesheet for the theme. https://developer.wordpress.org/reference/functions/add_editor_style/
 */
function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}

add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );

/**
 * Excludes categories from front page
 */

function exclude_category_home( $query ) {
if ( $query->is_home ) {
$query->set( 'cat', '-92' );
}
return $query;
}

add_filter( 'pre_get_posts', 'exclude_category_home' );

remove_action('wp_head', 'wlwmanifest_link');

remove_action('wp_head', 'rsd_link');



?>
