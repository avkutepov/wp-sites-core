<?php

/**
 * Компонент CTA кнопки для ACF
 * Используется как переиспользуемый компонент через clone field
 */

if ( ! function_exists('acf_add_local_field_group') ) {
    return;
}

// Регистрируем группу полей CTA как компонент для клонирования
acf_add_local_field_group([
    'key' => 'group_component_cta',
    'title' => 'Компонент: CTA Кнопка',
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'non_existent_post_type', // Не показывать нигде, только для клонирования
            ],
        ],
    ],
    'fields' => [
        [
            'key' => 'field_cta_text',
            'label' => 'Текст кнопки',
            'name' => 'cta_text',
            'type' => 'text',
            'default_value' => 'Обсудить задачу',
            'placeholder' => 'Обсудить задачу',
            'wrapper' => [
                'width' => '100',
            ],
        ],
        [
            'key' => 'field_cta_desc',
            'label' => 'Описание',
            'name' => 'cta_desc',
            'type' => 'text',
            'required' => 0,
            'default_value' => '',
            'placeholder' => '',
            'wrapper' => [
                'width' => '100',
            ],
        ],
        [
            'key' => 'field_cta_url',
            'label' => 'Ссылка',
            'name' => 'cta_url',
            'type' => 'url',
            'placeholder' => 'https://example.com',
            'wrapper' => [
                'width' => '50',
            ],
        ],
        [
            'key' => 'field_cta_class',
            'label' => 'CSS Класс',
            'name' => 'cta_class',
            'type' => 'text',
            'placeholder' => 'btn btn-primary',
            'default_value' => 'btn-cta',
            'wrapper' => [
                'width' => '50',
            ],
        ],
    ],
    'menu_order' => 0,
    'style' => 'default',
]);
