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

/**
 * Вывод FAQ Schema.org разметки в формате JSON-LD
 *
 * @param array $faq_items Массив FAQ элементов из ACF
 *                         Каждый элемент должен содержать: faq_question, faq_answer
 */
function main_theme_faq_schema( $faq_items ) {
    if ( empty( $faq_items ) || ! is_array( $faq_items ) ) {
        return;
    }

    $schema = array(
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => array(),
    );

    foreach ( $faq_items as $item ) {
        $question = isset( $item['faq_question'] ) ? $item['faq_question'] : '';
        $answer   = isset( $item['faq_answer'] ) ? $item['faq_answer'] : '';

        if ( empty( $question ) || empty( $answer ) ) {
            continue;
        }

        $schema['mainEntity'][] = array(
            '@type'          => 'Question',
            'name'           => $question,
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text'  => $answer,
            ),
        );
    }

    // Выводим только если есть хотя бы один вопрос
    if ( ! empty( $schema['mainEntity'] ) ) {
        echo '<script type="application/ld+json">';
        echo wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
        echo '</script>';
    }
}
