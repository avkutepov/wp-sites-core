<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function main_theme_content_class() {
    return is_active_sidebar( 'sidebar-1' ) ? 'site-main has-sidebar' : 'site-main';
}

/**
 * Получить данные CTA из ACF
 *
 * Универсальная функция для получения CTA данных из flexible content или ACF options.
 * Обрабатывает оба формата: clone группу и прямые поля.
 *
 * @param string $field_name Имя поля (для sub_field) или null для options
 * @param bool   $is_sub_field true если используется get_sub_field(), false для get_field()
 * @param mixed  $post_id ID поста или 'option' для options
 *
 * @return array Массив с ключами: text, desc, url, class
 */
function main_theme_get_cta_data( $field_name = 'cta_button', $is_sub_field = false, $post_id = 'option' ) {
    // Получаем данные в зависимости от типа поля
    if ( $is_sub_field ) {
        $cta_button = get_sub_field( $field_name );
    } else {
        $cta_button = get_field( $field_name, $post_id );
    }

    // Если это группа (clone), достаем поля из массива
    if ( is_array( $cta_button ) && isset( $cta_button['cta_text'] ) ) {
        return array(
            'text'  => isset( $cta_button['cta_text'] ) ? $cta_button['cta_text'] : '',
            'desc'  => isset( $cta_button['cta_desc'] ) ? $cta_button['cta_desc'] : '',
            'url'   => isset( $cta_button['cta_url'] ) ? $cta_button['cta_url'] : '',
            'class' => isset( $cta_button['cta_class'] ) ? $cta_button['cta_class'] : 'btn-cta',
        );
    }

    // Если prefix_name = 0, поля доступны напрямую
    if ( $is_sub_field ) {
        return array(
            'text'  => get_sub_field( 'cta_text' ) ?: '',
            'desc'  => get_sub_field( 'cta_desc' ) ?: '',
            'url'   => get_sub_field( 'cta_url' ) ?: '',
            'class' => get_sub_field( 'cta_class' ) ?: 'btn-cta',
        );
    } else {
        return array(
            'text'  => get_field( 'cta_text', $post_id ) ?: '',
            'desc'  => get_field( 'cta_desc', $post_id ) ?: '',
            'url'   => get_field( 'cta_url', $post_id ) ?: '',
            'class' => get_field( 'cta_class', $post_id ) ?: 'btn-cta',
        );
    }
}
