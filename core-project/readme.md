# Core Project

Плагин с базовой бизнес-логикой проекта для WordPress:
- регистрация CPT и таксономии;
- кастомная URL-структура для услуг;
- локальная регистрация ACF-полей и Options Page.

## Что делает плагин

### 1) Регистрирует CPT
- `services` (Услуги)  
  Публичный CPT с кастомным `rewrite` через `%service-category%`.
- `reviews` (Отзывы)  
  Только для админки (`public: false`, `show_ui: true`).
- `cases` (Кейсы)  
  Только для админки (`public: false`, `show_ui: true`).

### 2) Регистрирует таксономию
- `service-category` для `services`.

### 3) Настраивает URL для услуг
Класс `Taxonomy_URL_Rewriter` формирует структуру:
- архив категории: `/category-slug/`
- карточка услуги: `/category-slug/post-slug/`
- fallback без категории: `/uncategorized/post-slug/`

### 4) Загружает ACF-группы
- Страница настроек сайта: `site-options`
- Глобальный конструктор блоков (`flexible_content`) для:
  - `services`
  - `page`
  - терминов `service-category`
- Переиспользуемый компонент CTA (через clone field)
- Layout-блоки:
  - `hero_block`
  - `faq_block`
  - `clients_block`

## Требования
- WordPress 6+
- PHP 8.0+ (используются typed properties и type hints)
- Плагин **Advanced Custom Fields Pro** (или версия с поддержкой `acf_add_options_page`)

## Установка
1. Скопировать папку `core-project` в `wp-content/plugins/`.
2. Активировать плагин **Core Project** в админке WordPress.
3. Убедиться, что активирован ACF.
4. После активации обновить правила ссылок:
   `Настройки -> Постоянные ссылки -> Сохранить`.

## Структура
```text
core-project/
  core-project.php
  inc/
    CPT/class-cpt-registrar.php
    Taxonomy/class-taxonomies-registrar.php
    URL/class-taxonomy-url-rewriter.php
    ACF/
      acf-loader.php
      FieldGroups/
      Layouts/
    helper.php
```

## Важно
- Плагин является "ядром" проекта и не предполагается к отключению.
- При изменении логики rewrite рекомендуется повторно сохранять постоянные ссылки.

