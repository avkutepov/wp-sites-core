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
            [
                'key' => 'field_faq_enable_schema',
                'label' => 'Выводить Schema.org разметку',
                'name' => 'faq_enable_schema',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => 'Да',
                'ui_off_text' => 'Нет',
                'instructions' => 'Включает вывод микроразметки Schema.org для FAQ. Помогает Google отображать вопросы в результатах поиска.',
                'wrapper' => [
                    'width' => '100',
                ],
            ],
        ],
    ],
];
