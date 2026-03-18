<?php

/**
 * headless functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package headless
 */

if ( !defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
define( 'THEMEROOT', get_stylesheet_directory_uri() );
define( 'IMG', THEMEROOT . '/dist/img' );

add_action( 'after_setup_theme', 'theme_load' );
function theme_load() {
    require_once 'vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
}

/**
 * Setup
 *
 * @return void
 */

add_theme_support( 'post-thumbnails' );

// create register primary menu
function register_primary_menu() {
    register_nav_menu( 'primary', __( 'Primary Menu', 'headless' ) );
    register_nav_menu( 'footer', __( 'Footer Menu', 'headless' ) );
    register_nav_menu( 'footer_1', __( 'Footer Menu 1', 'headless' ) );
}

add_action( 'after_setup_theme', 'register_primary_menu' );

/**
 * Enqueue scripts and styles for admin
 */

function headless_admin_scripts() {
    wp_enqueue_style( 'headless-admin-style', get_template_directory_uri() . '/admin.css', array(), _S_VERSION, 'all' );
}

add_action( 'admin_enqueue_scripts', 'headless_admin_scripts' );

// add global inc files
require_once get_template_directory() . '/inc/global.php';

/**
 * Blocks
 */
require get_template_directory() . '/inc/blocks.php';

/**
 * Custom Post Types
 */

require get_template_directory() . '/inc/cpt.php';

/**
 * Post Meta
 */

require get_template_directory() . '/inc/post-meta.php';

/**
 * Rest API Routes
 */
require get_template_directory() . '/webhook/next.php';
// require get_template_directory() . '/inc/rest-api/contact_endpoint.php';




function add_noindex() {
    if ( is_front_page() || is_home() || is_category() || is_tag() || is_search() || is_archive() || is_single() ) {
        echo '<meta name="robots" content="noindex, follow">';
    }
}
add_action( 'wp_head', 'add_noindex' );

add_filter( 'xmlrpc_enabled', '__return_false' );



// Allow SVG upload (mime + filetype check + thumbnail fix)
function mytheme_allow_svg_uploads( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'mytheme_allow_svg_uploads' );

/**
 * Allow SVG through WordPress filetype check
 */
function mytheme_fix_svg_filetype_and_ext( $data, $file, $filename, $mimes, $real_mime = '' ) {
    $ext = pathinfo( $filename, PATHINFO_EXTENSION );

    if ( ! $data['type'] ) {
        if ( strtolower( $ext ) === 'svg' || strtolower( $ext ) === 'svgz' ) {
            $data['ext']  = 'svg';
            $data['type'] = 'image/svg+xml';
        }
    }

    return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'mytheme_fix_svg_filetype_and_ext', 10, 5 );

// Note: No extra image editor filters needed for SVG.