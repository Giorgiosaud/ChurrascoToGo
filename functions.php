<?php
function my_theme_enqueue_styles() {
    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style('responsive-child',get_stylesheet_directory_uri().'/resources/css/responsive.css',array(),wp_get_theme()->get('Version'));
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// Function to change email address

function wpb_sender_email( $original_email_address ) {
    return 'website@churrascotogo.com';
}

// Function to change sender name
function wpb_sender_name( $original_email_from ) {
	return 'Website Contact';
}

// Hooking up our functions to WordPress filters 
add_filter( 'wp_mail_from', 'wpb_sender_email' );
add_filter( 'wp_mail_from_name', 'wpb_sender_name' );
