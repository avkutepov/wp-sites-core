<?php

if ( ! defined('ABSPATH') ) {
    exit;
}

class Taxonomies_Registrar {

    protected string $slug;
    protected string $label;
    protected array $object_types;
    protected array $args;

    public function __construct(string $slug, string $label, array $object_types = [], array $args = []) {
        $this->slug         = $slug;
        $this->label        = $label;
        $this->object_types = $object_types;
        $this->args         = $args;
        add_action('init', [$this, 'register_taxonomy']);
    }

    public function register_taxonomy(): void {
        $labels = [
            'name'                       => $this->label,
            'singular_name'              => $this->label,
            'menu_name'                  => $this->label,
            'all_items'                  => 'Все',
            'edit_item'                  => 'Редактировать',
            'view_item'                  => 'Просмотреть',
            'update_item'                => 'Обновить',
            'add_new_item'               => 'Добавить',
            'new_item_name'              => 'Новое название',
            'parent_item'                => 'Родительский элемент',
            'parent_item_colon'          => 'Родительский элемент:',
            'search_items'               => 'Найти',
            'popular_items'              => 'Популярные',
            'separate_items_with_commas' => 'Разделяйте элементы запятыми',
            'add_or_remove_items'        => 'Добавить или удалить',
            'choose_from_most_used'      => 'Выбрать из часто используемых',
            'not_found'                  => 'Не найдено',
        ];

        $default_args = [
            'labels'            => $labels,
            'hierarchical'      => true,
            'public'            => true,
            'show_ui'           => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => ['slug' => $this->slug],
        ];

        register_taxonomy(
            $this->slug,
            $this->object_types,
            array_merge($default_args, $this->args)
        );
    }
}
