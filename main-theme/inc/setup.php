<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'after_setup_theme', 'main_theme_setup' );
function main_theme_setup() {
    load_theme_textdomain( 'main-theme', get_template_directory() . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ) );
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    add_theme_support( 'customize-selective-refresh-widgets' );

    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu', 'main-theme' ),
            'footer'  => __( 'Footer Menu', 'main-theme' ),
        )
    );
}

add_action( 'widgets_init', 'main_theme_widgets_init' );
function main_theme_widgets_init() {
    register_sidebar(
        array(
            'name'          => __( 'Sidebar', 'main-theme' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Main sidebar area', 'main-theme' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}

/**
 * Убирает префиксы "Категория:", "Метка:" и т.д. из заголовков архивов
 */
add_filter( 'get_the_archive_title_prefix', '__return_empty_string' );
