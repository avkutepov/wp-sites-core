<?php
return [
    'layout_hero_block' => [
        'key' => 'layout_hero_block',
        'name' => 'hero_block',
        'label' => 'Hero Block',
        'display' => 'block',
        'sub_fields' => [
            [
                'key' => 'field_hero_usp',
                'label' => 'УТП (Уникальное торговое предложение)',
                'name' => 'hero_usp',
                'type' => 'textarea',
                'rows' => 3,
                'wrapper' => [
                    'width' => '100',
                ],
            ],
            // Используем clone field для CTA компонента
            [
                'key' => 'field_hero_cta',
                'label' => 'CTA Кнопка',
                'name' => 'hero_cta',
                'type' => 'clone',
                'clone' => ['group_component_cta'],
                'display' => 'group',
                'layout' => 'block',
                'prefix_label' => 0,
                'prefix_name' => 0,
            ],
        ],
    ],
];
