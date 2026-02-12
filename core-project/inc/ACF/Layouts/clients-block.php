<?php
return [
    'layout_clients_block' => [
        'key' => 'layout_clients_block',
        'name' => 'clients_block',
        'label' => 'Наши клиенты (Карусель)',
        'display' => 'block',
        'sub_fields' => [
            [
                'key' => 'field_clients_heading',
                'label' => 'Заголовок блока',
                'name' => 'clients_heading',
                'type' => 'text',
                'default_value' => 'Наши клиенты',
                'wrapper' => [
                    'width' => '100',
                ],
            ],
            [
                'key' => 'field_clients_carousel',
                'label' => 'Карусель клиентов',
                'name' => 'clients_carousel',
                'type' => 'repeater',
                'instructions' => 'Добавьте логотипы компаний-клиентов для отображения в карусели',
                'layout' => 'block',
                'button_label' => 'Добавить клиента',
                'sub_fields' => [
                    [
                        'key' => 'field_clients_carousel_logo',
                        'label' => 'Логотип компании',
                        'name' => 'logo',
                        'type' => 'image',
                        'required' => 1,
                        'return_format' => 'id',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'wrapper' => [
                            'width' => '50',
                        ],
                    ],
                    [
                        'key' => 'field_clients_carousel_name',
                        'label' => 'Название компании',
                        'name' => 'name',
                        'type' => 'text',
                        'required' => 1,
                        'placeholder' => 'ООО "Название компании"',
                        'wrapper' => [
                            'width' => '50',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
