<?php

// Подключаем компонент CTA
require_once __DIR__ . '/components/cta.php';

if ( ! function_exists('acf_add_options_page') ) {
    return;
}

acf_add_options_page([
    'page_title' => 'Настройки сайта',
    'menu_title' => 'Настройки сайта',
    'menu_slug'  => 'site-options',
    'capability' => 'edit_posts',
    'redirect'   => false,
]);

if ( ! function_exists('acf_add_local_field_group') ) {
    return;
}

acf_add_local_field_group([
    'key' => 'group_site_options',
    'title' => 'Настройки сайта',
    'location' => [
        [
            [
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'site-options',
            ],
        ],
    ],
    'fields' => [

        // ===============================
        // БЛОК БРЕНДА
        // ===============================
        [
            'key' => 'field_brand_tab',
            'label' => 'Бренд',
            'type' => 'tab',
        ],
        [
            'key' => 'field_brand_logo',
            'label' => 'Логотип',
            'name' => 'brand_logo',
            'type' => 'image',
            'return_format' => 'id',
        ],
       
        // ===============================
        // КОНТАКТЫ
        // ===============================

        [
            'key' => 'field_contacts_tg',
            'label' => 'Telegram',
            'name' => 'contact_telegram',
            'type' => 'url',
        ],
        [
            'key' => 'field_contacts_text',
            'label' => 'Текст',
            'name' => 'contact_text',
            'type' => 'text',
            'default_value' => 'Звоните, пн–пт: 9:00–18:00',
        ],
        [
            'key' => 'field_contacts_phone',
            'label' => 'Телефон',
            'name' => 'contact_phone',
            'type' => 'text',
            'instructions' => '+7 900 000-00-00',
        ],
        [
            'key' => 'field_contacts_callback',
            'label' => 'Заказать звонок',
            'name' => 'contact_callback',
            'type' => 'link',
        ],
        // ===============================
        // КОПИРАЙТ
        // ===============================
        [
            'key' => 'field_footer_copyright',
            'label' => 'Копирайт',
            'name' => 'footer_copyright',
            'type' => 'text',
            'default_value' => '© Компания',
        ],
        
        // ===============================
        // CTA
        // ===============================
        [
            'key' => 'field_cta_tab',
            'label' => 'CTA',
            'type' => 'tab',
        ],
        [
            'key' => 'field_cta_button',
            'label' => 'Кнопка',
            'name' => 'cta_button',
            'type' => 'clone',
            'clone' => ['group_component_cta'],
            'display' => 'group',
            'layout' => 'block',
            'prefix_label' => 0,
            'prefix_name' => 0,
        ],

        // ===============================
        // ЮРИДИЧЕСКИЙ БЛОК
        // ===============================
        [
            'key' => 'field_legal_tab',
            'label' => 'Юридическая информация',
            'type' => 'tab',
        ],
        [
            'key' => 'field_legal_privacy',
            'label' => 'Политика конфиденциальности',
            'name' => 'legal_privacy',
            'type' => 'link',
        ],
        [
            'key' => 'field_legal_terms',
            'label' => 'Пользовательское соглашение',
            'name' => 'legal_terms',
            'type' => 'link',
        ],
        [
            'key' => 'field_legal_cookie',
            'label' => 'Политика Cookie',
            'name' => 'legal_cookie',
            'type' => 'link',
        ],
    ],
]);
