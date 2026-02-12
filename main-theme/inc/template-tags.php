<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function main_theme_posted_on() {
    $time_string = sprintf(
        '<time class="entry-date published" datetime="%1$s">%2$s</time>',
        esc_attr( get_the_date( DATE_W3C ) ),
        esc_html( get_the_date() )
    );

    echo '<span class="posted-on">' . wp_kses_post( $time_string ) . '</span>';
}
