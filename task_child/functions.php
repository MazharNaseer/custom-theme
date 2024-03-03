<?php

//code for register CPT Project Start
function my_custom_post_type() {
    register_post_type('projects',
        array(
            'labels'      => array(
                'name'          => __('Projects', 'textdomain'),
                'singular_name' => __('Product', 'textdomain'),
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'    => array('title', 'editor', 'thumbnail', 'page-attributes'),
        )
    );

    register_taxonomy(
        'project_type',  
        'projects',     
        array(
            'label'        => __('Project Type', 'textdomain'),
            'rewrite'      => array('slug' => 'project-type'),
            'hierarchical' => true,
        )
    );
}
add_action('init', 'my_custom_post_type');

//code for register CPT Project End

add_theme_support( 'post-thumbnails' );


//code for enque styale and script start

function enqueue_custom_css() {
  
    wp_enqueue_style('custom-style', get_theme_file_uri('/assets/custom.css'));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_css');

function custom_theme_enqueue_scripts() {
    wp_enqueue_script( 'my-custom-theme-script', get_theme_file_uri('/assets/script.js'));
}
add_action( 'wp_enqueue_scripts', 'custom_theme_enqueue_scripts' );

//code for enque styale and script end

function custom_posts_per_page( $query ) {

    if ( $query->is_archive('project') ) {
        set_query_var('posts_per_page', -1);
    }
    }
    add_action( 'pre_get_posts', 'custom_posts_per_page' );

//code for Rwdirect user if ip start from
function ip_based_login() {
    $visitor = $_SERVER['REMOTE_ADDR'];
    $redirectTo = 'https://ikonicsolution.com/'; 

    if (strpos($visitor, '77.29') === 0) { 
        wp_redirect($redirectTo);
        exit; 
    }
}
add_action('template_redirect', 'ip_based_login'); 
//code for Rwdirect user if ip start from  end

//code for Register menu here
function register_custom_menus() {
    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu', 'your-theme-text-domain' ),
            
        )
    );
}
add_action( 'init', 'register_custom_menus' );

//code for Register menu end here
?>

