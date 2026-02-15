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

// --------------------------------------------------
// Исключаем некорректные URL из Yoast SEO sitemap
// --------------------------------------------------
add_filter('wpseo_sitemap_entry', function($url, $type, $post) {
    // Если в URL остался placeholder - исключаем его из sitemap
    if (isset($url['loc']) && strpos($url['loc'], '%service-category%') !== false) {
        return false; // Исключаем из sitemap
    }
    return $url;
}, 10, 3);

// Фильтр для post type sitemap (services-sitemap.xml)
add_filter('wpseo_sitemap_post_type_archive_link', function($link, $post_type) {
    // Если это архив services с placeholder - возвращаем false для исключения
    if ($post_type === 'services' && strpos($link, '%service-category%') !== false) {
        return false;
    }
    return $link;
}, 10, 2);