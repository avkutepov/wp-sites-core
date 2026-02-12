<?php

if ( ! defined('ABSPATH') ) {
    exit;
}

class CPT_Registrar {

    protected string $slug;
    protected string $label;
    protected array $args;

    public function __construct(string $slug, string $label, array $args = []) {
        $this->slug  = $slug;
        $this->label = $label;
        $this->args  = $args;
        add_action('init', [$this, 'register_post_type']);
    }

    public function register_post_type(): void {
        $labels = [
            'name'               => $this->label,
            'singular_name'      => $this->label,
            'add_new'            => 'Добавить',
            'add_new_item'       => 'Добавить',
            'edit_item'          => 'Редактировать',
            'new_item'           => 'Новый',
            'view_item'          => 'Просмотреть',
            'search_items'       => 'Найти',
            'not_found'          => 'Не найдено',
            'menu_name'          => $this->label,
        ];

        $default_args = [
            'labels'        => $labels,
            'public'        => true,
            'has_archive'   => true,
            'show_in_rest'  => true,
            'supports'      => ['title', 'editor', 'thumbnail'],
            'menu_position' => 20,
        ];

        register_post_type(
            $this->slug,
            array_merge($default_args, $this->args)
        );
    }
}
