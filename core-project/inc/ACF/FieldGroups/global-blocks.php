<?php

// Подключаем компонент CTA
require_once __DIR__ . '/components/cta.php';

if ( ! function_exists('acf_add_local_field_group') ) {
    return;
}

acf_add_local_field_group([
    'key' => 'group_global_block',
    'title' => 'Конструктор блоков',
    // Location: OR (ИЛИ) - показывать либо на services, либо на page, либо на service-category
    'location' => [
        // Вариант 1: CPT Services
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'services',
            ],
        ],
        // Вариант 2: CPT Page (главная страница)
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'page',
            ],
        ],
        // Вариант 3: Термины таксономии Service Category
        [
            [
                'param' => 'taxonomy',
                'operator' => '==',
                'value' => 'service-category',
            ],
        ],
    ],
    'fields' => [
        [
            'key' => 'field_page_blocks',
            'label' => 'Блоки страницы',
            'name' => 'page_blocks',
            'type' => 'flexible_content',
            'button_label' => 'Добавить блок',
            'layouts' => array_merge(
                require __DIR__ . '/../Layouts/hero-block.php',
                require __DIR__ . '/../Layouts/faq-block.php',
                require __DIR__ . '/../Layouts/clients-block.php'
            ),
        ],
    ],
    'menu_order' => 0,
    'position' => 'acf_after_title',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
]);
