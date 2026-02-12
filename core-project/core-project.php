<?php
/**
 * Plugin Name: Core Project
 * Plugin URI:  https://ak-web.ru
 * Description: Core functionality: CPT, ACF, Options Pages, business logic. НЕ ОТКЛЮЧАТЬ!!!
 * Version:     1.0.0
 * Author:      ANDREI KUTEPOV
 * Author URI:  https://ak-web.ru/
 * Text Domain: core-project
 */

if ( ! defined('ABSPATH') ) {
    exit; // Запрет прямого доступа
}

// --------------------------------------------------
// Requires
// --------------------------------------------------

define('CORE_PROJECT_PATH', plugin_dir_path(__FILE__));

require_once CORE_PROJECT_PATH . 'inc/CPT/class-cpt-registrar.php';
require_once CORE_PROJECT_PATH . 'inc/Taxonomy/class-taxonomies-registrar.php';
require_once CORE_PROJECT_PATH . 'inc/ACF/acf-loader.php';
require_once CORE_PROJECT_PATH . 'inc/helper.php';



// --------------------------------------------------
// CPT
// --------------------------------------------------

new CPT_Registrar('services', 'Услуги',
    [
        'menu_icon' => 'dashicons-admin-tools',
        'supports'  => ['title'], // Только заголовок, без редактора и миниатюры
        'rewrite'   => [
            'slug'       => '%service-category%',
            'with_front' => false,
        ],
    ]
);

new CPT_Registrar('reviews', 'Отзывы',
    [
        'menu_icon' => 'dashicons-testimonial',
        'supports'  => ['title'], // Только заголовок, без редактора и миниатюры
        'public'        => false, // CPT не отображается на фронтенде
        'show_ui' => true, // Показываем в админке
        'publicly_queryable' => false, // Запрет на запросы к этому CPT через URL
        'rewrite' => false, // Отключаем rewrite, так как CPT не публичный 
        'has_archive' => false   ,
    ]
);

new CPT_Registrar('cases', 'Кейсы',
    [
        'menu_icon' => 'dashicons-portfolio',
        'supports'  => ['title'], // Только заголовок, без редактора и миниатюры
        'public'        => false, // CPT не отображается на фронтенде
        'show_ui' => true, // Показываем в админке
        'publicly_queryable' => false, // Запрет на запросы к этому CPT через URL
        'rewrite' => false, // Отключаем rewrite, так как CPT не публичный 
        'has_archive' => false   ,
    ]
);

// --------------------------------------------------
// Taxonomy
// --------------------------------------------------

new Taxonomies_Registrar('service-category', 'Категории услуг', ['services'], [
    'rewrite' => false, // Отключаем стандартный rewrite, используем custom
]);

// --------------------------------------------------
// ACF
// --------------------------------------------------
    ACF_Loader::init();

