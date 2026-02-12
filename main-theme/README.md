# Main Theme Starter (frontend-only)

Эта тема предназначена только для фронта.

- Вся backend-логика (CPT, таксономии, ACF-поля, бизнес-правила) живет в плагине `core-project`.
- Тема отвечает за шаблоны, верстку, стили и JS.

## 1. Как использовать на новом сайте

1. Установите WordPress.
2. Установите и активируйте плагин `core-project`.
3. Установите и активируйте тему `main-theme`.
4. Зарегистрируйте нужные CPT/таксономии в коде плагина (через классы регистратора, например `CPT_Registrar` и `Taxonomies_Registrar`).
5. После изменения CPT/таксономий обновите постоянные ссылки: `Настройки -> Постоянные ссылки -> Сохранить`.
6. В админке заполните контент для созданных CPT/терминов.
7. В теме создайте/добавьте нужные layout-шаблоны блоков в `template-parts/blocks`.
8. Сверстайте блоки в `assets/css/main.css` и при необходимости добавьте JS в `assets/js/main.js`.

## 2. Структура темы

- Корневые шаблоны (`front-page.php`, `single.php`, `archive.php`, и т.д.) выбираются WordPress автоматически.
- `header.php` и `footer.php` в корне нужны для совместимости с WP.
- Реальная разметка лежит в `template-parts/*`.
- Общие настройки темы: `inc/setup.php`
- Подключение ассетов: `inc/assets.php`

## 3. Рендер flexible blocks

Файл рендера: `template-parts/blocks/renderer.php`

Логика поиска шаблона layout:
1. `template-parts/blocks/{post_type}/{layout}.php`
2. `template-parts/blocks/common/{layout}.php`

Это позволяет:
- переиспользовать общие блоки между CPT;
- переопределять отдельные блоки для конкретного CPT.

### Важно для текущего плагина

Единое имя flexible field в теме: `page_blocks` (дефолт в `renderer.php`).
Если в плагине используется то же имя, параметр `field_name` можно не передавать.

Пример для страницы/CPT:

```php
<?php
get_template_part( 'template-parts/blocks/renderer', null, array(
    'post_id'    => get_the_ID(),
    'post_type'  => get_post_type(),
) );
```

Пример для термина таксономии (`service-category`):

```php
<?php
$term = get_queried_object();

get_template_part( 'template-parts/blocks/renderer', null, array(
    'post_id'    => 'service-category_' . $term->term_id,
    'post_type'  => 'service-category',
) );
```

## 4. Как называть файлы блоков

Имя файла должно совпадать с `name` layout в ACF.

Пример:
- layout name: `hero_block`
- файл: `template-parts/blocks/common/hero_block.php`

Для CPT-специфичной версии:
- `template-parts/blocks/services/hero_block.php`

## 5. Почему два CSS-файла

В теме есть два файла с разной ролью:

1. `style.css` (в корне темы)
- Это служебный файл WordPress с метаданными темы (`Theme Name`, `Version` и т.д.).
- WP использует его для распознавания темы в админке.
- Здесь можно держать только шапку-комментарий и не писать рабочие стили.

2. `assets/css/main.css`
- Это основной файл ваших фронтовых стилей.
- Он подключается из `inc/assets.php`.

## 6. Рекомендуемый рабочий процесс

1. Добавили или изменили CPT/таксономию в коде плагина (классы-регистраторы).
2. При необходимости добавили/изменили ACF layout в плагине.
3. Создали файл шаблона в теме (`blocks/common` или `blocks/{cpt}`).
4. Добавили стили/JS.
5. Проверили вывод на соответствующем шаблоне (`single-{cpt}.php`, `page.php`, `front-page.php` и т.д.).

## 7. Принцип архитектуры

- Плагин = данные и правила.
- Тема = отображение.

Такой подход упрощает перенос темы между проектами и не ломает данные при смене темы.
