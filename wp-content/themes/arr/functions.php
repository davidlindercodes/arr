<?php

//** Arr 2021 Functions
remove_action('wp_head', 'wp_generator');

// Remove Windows Live Writer link in header
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

// Remove WP version info
function hide_wp_vers() {
	return '';
}
add_filter('the_generator','hide_wp_vers');

// Add Stylesheets
function queue_styles () {
    wp_register_style('arr', get_stylesheet_directory_uri() . '/arr.css', array(), filemtime(get_stylesheet_directory() . '/arr.css'), false);
    wp_enqueue_style('arr');
    wp_register_style('arr-custom', get_stylesheet_directory_uri() . '/arr-custom.css', array(), filemtime(get_stylesheet_directory() . '/arr-custom.css'), false);
	wp_enqueue_style('arr-custom');
    wp_register_style('splide', get_stylesheet_directory_uri() . '/src/css/vendor/splide.min.css', array(), null, 'all');
    wp_enqueue_style('splide');
    wp_register_style('splide-default', get_stylesheet_directory_uri() . '/src/css/vendor/splide-default.min.css', array(), null, 'all');
	wp_enqueue_style('splide-default');

}
add_action('wp_enqueue_scripts', 'queue_styles');

// Add Scripts
function queue_scripts () {
    wp_register_script('splide', get_template_directory_uri() . '/src/js/splide.min.js', array(), false , true);
    wp_enqueue_script('splide');
    wp_register_script('custom', get_stylesheet_directory_uri() . '/src/js/custom/arr.js', array(), "1.4" , true);
	wp_enqueue_script('custom');
}
add_action('wp_enqueue_scripts', 'queue_scripts');


// Hide ACF Menu for NonAdmins

function remove_acf_menu() {
    // provide a list of usernames who can edit custom field definitions here
    $admins = array(
        'admin'
    );
    // get the current user
    $current_user = wp_get_current_user();
    // match and remove if needed
    if( !in_array( $current_user->user_login, $admins ) )
    {
        remove_menu_page('edit.php?post_type=acf');
    }
}

// Check function exists.
if( function_exists('acf_add_options_page') ) {

    // Add parent.
    $parent = acf_add_options_page(array(
        'page_title'  => __('arr Global Options'),
        'menu_title'  => __('Global Options'),
        'redirect'    => false,
    ));

    // Add sub page.
    $child = acf_add_options_page(array(
        'page_title'  => __('Events Options'),
        'menu_title'  => __('Events'),
        'parent_slug' => $parent['menu_slug'],
    ));
}

// Nav Menus

// function posts_nav_link( $sep = '', $prelabel = '', $nxtlabel = '' ) {
//     $args = array_filter( compact( 'sep', 'prelabel', 'nxtlabel' ) );
//     echo get_posts_nav_link( $args );
// }

function register_my_menu() {
    register_nav_menu('main-nav', __( 'Main Navigation'));
    register_nav_menu('slideout-nav', __( 'Slideout Navigation'));
    register_nav_menu('footer-left-menu', __( 'footer-left-menu'));
    register_nav_menu('footer-right-menu', __( 'footer-right-menu'));
}

add_action( 'init', 'register_my_menu' );


// function remove_page_from_query_string($query_string)
// { 
//     if ($query_string['name'] == 'page' && isset($query_string['page'])) {
//         unset($query_string['name']);
//         $query_string['paged'] = $query_string['page'];
//     }      
//     return $query_string;
// }
// add_filter('request', 'remove_page_from_query_string');

// Register Custom Post Type - Events
function arr_events() {
    register_post_type(
        'events',
        array(
            'labels' => array(
				'name' => __( 'Events' ),
				'singular_name' => __( 'Event' ),
				'add_new' => __( 'Add New Event' ),
				'add_new_item' => __( 'Add New Event' ),
				'edit_item' => __( 'Edit Event' ),
				'new_item' => __( 'New Event' ),
				'all_items' => __( 'All Events' ),
				'view_item' => __( 'View Event' ),
				'search_items' => __( 'Search Events' ),
				'not_found' => __( 'Event not found' ),
				'not_found_in_trash' => __( 'Event not found in Trash' ),
				'parent_item_colon' => '',
				'menu_name' => __( 'Events' )
			),
            'hierarchical' => true,
            'public' => true,
            'show_in_nav_menus' => true,
            'menu_icon' => 'dashicons-hammer',
            'has_archive' => true,
            'rewrite' => array(
                'slug'       => 'events',
                'with_front' => false,
            ),
            'supports' => array(
                'page-attributes',
                'title',
                'editor', 
                'thumbnail'
            ),
        ));
};

add_action( 'init', 'arr_events' );

// Add Featured Image Support
add_theme_support( 'post-thumbnails' );

