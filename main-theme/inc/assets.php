<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'wp_enqueue_scripts', 'main_theme_enqueue_assets' );
function main_theme_enqueue_assets() {
    $theme_version = wp_get_theme()->get( 'Version' );

    $main_css_rel  = '/assets/css/main.css';
    $main_css_path = get_template_directory() . $main_css_rel;
    $main_css_uri  = get_template_directory_uri() . $main_css_rel;
    $main_css_ver  = file_exists( $main_css_path ) ? filemtime( $main_css_path ) : $theme_version;

    wp_enqueue_style( 'main-theme-main', $main_css_uri, array(), (string) $main_css_ver );

    $main_js_rel  = '/assets/js/main.js';
    $main_js_path = get_template_directory() . $main_js_rel;

    if ( file_exists( $main_js_path ) ) {
        wp_enqueue_script(
            'main-theme-main',
            get_template_directory_uri() . $main_js_rel,
            array(),
            (string) filemtime( $main_js_path ),
            true
        );
    }
}
