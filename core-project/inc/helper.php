<?php
if ( ! defined('ABSPATH') ) {
    exit; // Запрет прямого доступа
}

// --------------------------------------------------
// Подключение классов URL Rewriter
// --------------------------------------------------
require_once __DIR__ . '/URL/class-taxonomy-url-rewriter.php';

// --------------------------------------------------
// Инициализация URL структуры для service-category
// --------------------------------------------------
new Taxonomy_URL_Rewriter('service-category', 'services');
