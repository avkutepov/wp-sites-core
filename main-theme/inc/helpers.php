<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function main_theme_content_class() {
    return is_active_sidebar( 'sidebar-1' ) ? 'site-main has-sidebar' : 'site-main';
}
