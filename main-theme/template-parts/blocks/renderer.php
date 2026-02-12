<?php
/**
 * Universal blocks renderer.
 *
 * Usage:
 * get_template_part( 'template-parts/blocks/renderer', null, array(
 *     'field_name' => 'page_blocks',
 *     'post_id'    => get_the_ID(),
 *     'post_type'  => get_post_type(),
 * ) );
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'have_rows' ) ) {
    return;
}

$field_name = isset( $args['field_name'] ) && is_string( $args['field_name'] ) ? $args['field_name'] : 'page_blocks';
$post_id    = isset( $args['post_id'] ) ? $args['post_id'] : get_the_ID();
$post_type  = isset( $args['post_type'] ) && is_string( $args['post_type'] ) ? $args['post_type'] : get_post_type( $post_id );

$post_type = $post_type ? sanitize_key( $post_type ) : 'post';

if ( ! have_rows( $field_name, $post_id ) ) {
    return;
}

while ( have_rows( $field_name, $post_id ) ) {
    the_row();

    $layout = (string) get_row_layout();

    if ( '' === $layout ) {
        continue;
    }

    $layout = sanitize_key( $layout );

    $candidates = array(
        'template-parts/blocks/' . $post_type . '/' . $layout . '.php',
        'template-parts/blocks/common/' . $layout . '.php',
    );

    $template = locate_template( $candidates, false, false );

    if ( ! $template ) {
        continue;
    }

    $block_context = array(
        'layout'    => $layout,
        'post_type' => $post_type,
        'post_id'   => $post_id,
        'field'     => $field_name,
        'row_index' => function_exists( 'get_row_index' ) ? (int) get_row_index() : null,
    );

    include $template;
}
