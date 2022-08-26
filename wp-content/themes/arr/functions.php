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

    wp_register_script('blockui', get_stylesheet_directory_uri() . '/src/js/jquery-blockui.js', array('jquery'), "2.70.0" , true);
    wp_enqueue_script('blockui');

    wp_register_script('splide', get_template_directory_uri() . '/src/js/splide.min.js', array(), false , true);
    wp_enqueue_script('splide');
    wp_register_script('custom', get_stylesheet_directory_uri() . '/src/js/custom/arr.js', array('jquery'), "1.4" , true);
	wp_enqueue_script('custom');

    $localized_obj = array(
        'ajax_url'    => admin_url( 'admin-ajax.php' ),
        // 'loader'      => MCFSR_URL."/assets/images/loader.gif",
        // 'wpiuf_nonce' => wp_create_nonce( 'mcfsr-users-table-nonce' ),
    );
    
    wp_localize_script( 'custom', 'mcf_vars', $localized_obj );
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



// Ajax Filters functions

/**
 * Print array
*/
function mcf_pa($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

/**
 * WP Ajax Hook for filters
*/
add_action( 'wp_ajax_mcf_filters_form_action', 'mcf_filters_form_action' );
add_action( 'wp_ajax_nopriv_mcf_filters_form_action', 'mcf_filters_form_action' );
function mcf_filters_form_action(){

    $mcf_post_type  = isset($_POST['mcf_post_type']) ? $_POST['mcf_post_type'] : '';
    
    $response_meta = array();
    $date_query = array();
    $event_type_query = array();

    if ($mcf_post_type == 'events') {
        $content = mcf_events_filter_callback();
    }else{
         $content = mcf_posts_filter_callback();        
    }

    if ($content) {        
        $response_meta = array('status' => 'success', 'message' => __('Filters Added','wpacf-filters'), 'html' => $content );
    } else {
        $response_meta = array('status' => 'error', 'message' => __('Erro! Please Contact To Admin','wpacf-filters'), 'html' => $content );
    }

    wp_send_json($response_meta);
}

/**
 * Events filter ajax callback
*/
function mcf_events_filter_callback(){

    $start_date  = isset($_POST['start_date']) ? $_POST['start_date'] : '';
    $end_date    = isset($_POST['end_date']) ? $_POST['end_date'] : '';
    $event_type  = isset($_POST['event_type']) ? $_POST['event_type'] : '';
    $paged       = isset($_POST['mcf_current_page']) ? $_POST['mcf_current_page'] : '';
    $date_query = array();
    $event_type_query = array();

    $args = array(
        'post_type'      => 'events',
        'post_status'    => 'publish',
        'posts_per_page' => 15,
        'paged'          => $paged,
        'meta_key'       => 'date',
        'orderby'        => 'meta_value_num',
        'order'          => 'ASC',
        'meta_query'     => array(
            array(
                array(
                  'key' => 'date',
                  'compare' => '>=',
                  'value'   => date("Y-m-d"),
                  'type'    => 'DATE'
                ),
            ),
        )
    );

    if (!empty($start_date) && !empty($end_date) && !empty($event_type)) {
        $args['meta_query'] = array(
            'relation' => 'OR',
            array(
                array(
                  'key' => 'date',
                  'compare' => '<=',
                  'value'   => $end_date,
                  'type' => 'DATE'
                ),
                array(
                  'key' => 'date',
                  'compare' => '>=',
                  'value'   => $start_date,
                  'type' => 'DATE'
                ),
            ),
            array(
                'key'   => 'category',
                'value' => $event_type,
            )
        );
    }else if(!empty($start_date) && !empty($end_date)){
        $args['meta_query'] = array(
            array(
                array(
                  'key' => 'date',
                  'compare' => '<=',
                  'value'   => $end_date,
                  'type' => 'DATE'
                ),
                array(
                  'key' => 'date',
                  'compare' => '>=',
                  'value'   => $start_date,
                  'type' => 'DATE'
                ),
            )
        );
    }else if(!empty($event_type)){
        $args['meta_query'] = array(
            array(
                'key'   => 'category',
                'value' => $event_type,
            )
        );
    }

    $query         = new WP_Query( $args );
    $paginate_args = mcf_pagination_args($query, $paged);

    ob_start();
    if ( $query->have_posts() ) {   
        while( $query->have_posts() ){
            $query->the_post();
            if (strtotime(get_field('date')) > strtotime(date('jS F Y'))){
                get_template_part('templates/event-template');                
            }
        }
        ?>
        <div class="pagination container">
            <?php echo paginate_links( $paginate_args ); ?>
        </div>
        <?php
        wp_reset_postdata();
    }else{
        ?>
        <div class="wpacf-filters-content-error" style="margin: 0 auto;">           
            <h3><?php echo _e('Content Not Found','wpacf-filters'); ?></h3>
        </div>
        <?php
    }
    $content = ob_get_clean();

    return $content;
}

/**
 * Posts filter ajax callback
*/
function mcf_posts_filter_callback(){

    $start_date  = isset($_POST['start_date']) ? $_POST['start_date'] : '';
    $end_date    = isset($_POST['end_date']) ? $_POST['end_date'] : '';
    $post_cat  = isset($_POST['post_cat']) ? $_POST['post_cat'] : '';
    $paged       = isset($_POST['mcf_current_page']) ? $_POST['mcf_current_page'] : '';

    $args = array(  
        'post_type'      => 'post',
        'posts_per_page' => 9, 
        'paged'          => $paged,
        'orderby'        => 'date', 
        'order'          => 'DESC',
    );

    if (!empty($start_date) && !empty($end_date)) {            
        $args['date_query'] = array(
            'after' => sanitize_text_field( $start_date ),
            'before' => sanitize_text_field( $end_date ),
            'inclusive' => true,
            'column'    => 'post_date'
        );
    }

    if (!empty($post_cat)) {
        $args['category_name'] = $post_cat;
    }

    $query         = new WP_Query( $args );
    $paginate_args = mcf_posts_pagination_args($query, $paged);
    
    ob_start();
    if ( $query->have_posts() ) {   
        while( $query->have_posts() ){
            $query->the_post();
            get_template_part('templates/blog-template');
        }
        ?>
        <div class="pagination container">
            <?php echo paginate_links( $paginate_args ); ?>
        </div>
        <?php
        wp_reset_postdata();
    }else{
        ?>
        <div class="wpacf-filters-content-error" style="margin: 0 auto;">           
            <h3><?php echo _e('Content Not Found','wpacf-filters'); ?></h3>
        </div>
        <?php
    }
    $content = ob_get_clean();

    return $content;    
}

/**
 * Events Query args callback
*/
function mcf_events_query_callback(){

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $event_type = isset($_GET['event_type']) ? $_GET['event_type'] : '';
    
    $args = array(  
        'posts_per_page' => 15, 
        'paged'          => $paged,
        'post_type'      => 'events',
        'post_status'    => 'publish',
        'meta_key'       => 'date',
        'orderby'        => 'meta_value_num',
        'order'          => 'ASC',
        'meta_query'     => array(
            array(
                array(
                  'key' => 'date',
                  'compare' => '>=',
                  'value'   => date("Y-m-d"),
                  'type'    => 'DATE'
                ),
            ),
        )
    );

    if (!empty($event_type)) {
        $args['meta_query'] = array(
            'relation' => 'AND',
            array(
              'key' => 'date',
              'compare' => '>=',
              'value'   => date("Y-m-d"),
              'type'    => 'DATE'
            ),
            array(
                'key'   => 'category',
                'value' => $event_type,
            )
        );
    }

    // mcf_pa($args);
    
    $query = new WP_Query($args);

    return $query;
}

/**
 * Events pagination args callback
*/
function mcf_pagination_args($query, $paged){
    $args = array(
        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
        'total'        => $query->max_num_pages,
        'current'      => max( 1, $paged ),
        'format'       => '?paged=%#%',
        'show_all'     => false,
        'type'         => 'plain',
        'end_size'     => 2,
        'mid_size'     => 1,
        'prev_next'    => true,
        'prev_text'    => sprintf( '<i></i> %1$s', __( 'Previous', 'text-domain' ) ),
        'next_text'    => sprintf( '%1$s <i></i>', __( 'Next', 'text-domain' ) ),
        'add_args'     => false,
        'add_fragment' => '',
    );
    return $args;
}

/**
 * Posts query args callback
*/
function mcf_posts_query_callback(){

    $paged      = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $category   = isset($_GET['category']) ? $_GET['category'] : '';

    $args = array(  
        'post_type'      => 'post',
        'posts_per_page' => 9, 
        'paged'          => $paged,        
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    if (!empty($category)) {
        $args['category_name'] = $category;
    }

    $query = new WP_Query($args);

    return $query;
}

/**
 * Posts pagination args callback
*/
function mcf_posts_pagination_args($query, $paged){

    $args = array(
        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
        'total'        => $query->max_num_pages,
        'current'      => max( 1, $paged ),
        'format'       => '?paged=%#%',
        'show_all'     => false,
        'type'         => 'plain',
        'end_size'     => 2,
        'mid_size'     => 1,
        'prev_next'    => true,
        'prev_text'    => sprintf( '<i></i> %1$s', __( 'Previous', 'text-domain' ) ),
        'next_text'    => sprintf( '%1$s <i></i>', __( 'Next', 'text-domain' ) ),
        'add_args'     => false,
        'add_fragment' => '',
    );

    return $args;
}