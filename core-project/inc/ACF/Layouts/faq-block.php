<?php
return [
    'layout_faq_block' => [
        'key' => 'layout_faq_block',
        'name' => 'faq_block',
        'label' => 'FAQ Block',
        'display' => 'block',
        'sub_fields' => [
            [
                'key' => 'field_faq_title',
                'label' => 'Заголовок FAQ',
                'name' => 'faq_title',
                'type' => 'text',
                'wrapper' => [
                    'width' => '100',
                ],
            ],
            [
                'key' => 'field_faq_items',
                'label' => 'Вопросы и ответы',
                'name' => 'faq_items',
                'type' => 'repeater',
                'button_label' => 'Добавить вопрос',
                'sub_fields' => [
                    [
                        'key' => 'field_faq_question',
                        'label' => 'Вопрос',
                        'name' => 'faq_question',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_faq_answer',
                        'label' => 'Ответ',
                        'name' => 'faq_answer',
                        'type' => 'textarea',
                        'rows' => 4,
                    ],
                ],
            ],
        ],
    ],
];
