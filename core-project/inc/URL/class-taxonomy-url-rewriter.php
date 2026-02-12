<?php

if ( ! defined('ABSPATH') ) {
    exit;
}

/**
 * Класс для настройки URL структуры вида: /category-slug/post-slug/
 *
 * Использование:
 * new Taxonomy_URL_Rewriter('service-category', 'services');
 */
class Taxonomy_URL_Rewriter {

    protected string $taxonomy;
    protected string $post_type;
    protected string $uncategorized_slug;

    /**
     * @param string $taxonomy Slug таксономии (например, 'service-category')
     * @param string $post_type Slug CPT (например, 'services')
     * @param string $uncategorized_slug Slug для записей без категории (по умолчанию 'uncategorized')
     */
    public function __construct(string $taxonomy, string $post_type, string $uncategorized_slug = 'uncategorized') {
        $this->taxonomy = $taxonomy;
        $this->post_type = $post_type;
        $this->uncategorized_slug = $uncategorized_slug;

        $this->init();
    }

    /**
     * Инициализация фильтров и хуков
     */
    protected function init(): void {
        // Фильтр для генерации ссылок на посты
        add_filter('post_type_link', [$this, 'rewrite_post_link'], 10, 2);

        // Фильтр для генерации ссылок на термины таксономии
        add_filter('term_link', [$this, 'rewrite_term_link'], 10, 3);

        // Регистрация custom rewrite rules
        add_action('init', [$this, 'add_rewrite_rules'], 99);
    }

    /**
     * Заменяем %taxonomy% на реальный slug категории при генерации ссылок
     */
    public function rewrite_post_link($post_link, $post) {
        if ($post->post_type === $this->post_type && strpos($post_link, '%' . $this->taxonomy . '%') !== false) {
            $terms = wp_get_object_terms($post->ID, $this->taxonomy);

            if (!empty($terms) && !is_wp_error($terms)) {
                $post_link = str_replace('%' . $this->taxonomy . '%', $terms[0]->slug, $post_link);
            } else {
                $post_link = str_replace('%' . $this->taxonomy . '%', $this->uncategorized_slug, $post_link);
            }
        }

        return $post_link;
    }

    /**
     * Генерируем чистые URL для терминов таксономии (без префикса)
     */
    public function rewrite_term_link($termlink, $term, $taxonomy) {
        if ($taxonomy === $this->taxonomy) {
            return home_url('/' . $term->slug . '/');
        }

        return $termlink;
    }

    /**
     * Добавляем custom rewrite rules для существующих категорий
     */
    public function add_rewrite_rules(): void {
        // Получаем все термины таксономии
        $terms = get_terms([
            'taxonomy'   => $this->taxonomy,
            'hide_empty' => false,
        ]);

        if (!is_wp_error($terms) && !empty($terms)) {
            foreach ($terms as $term) {
                // Правило для архива категории: /category-slug/
                add_rewrite_rule(
                    '^' . $term->slug . '/?$',
                    'index.php?' . $this->taxonomy . '=' . $term->slug,
                    'top'
                );

                // Правило для постов в категории: /category-slug/post-slug/
                add_rewrite_rule(
                    '^' . $term->slug . '/([^/]+)/?$',
                    'index.php?' . $this->post_type . '=$matches[1]',
                    'top'
                );
            }
        }

        // Правило для записей без категории
        add_rewrite_rule(
            '^' . $this->uncategorized_slug . '/([^/]+)/?$',
            'index.php?' . $this->post_type . '=$matches[1]',
            'top'
        );
    }
}
