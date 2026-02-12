<?php
/**
 * CTA Button Component
 *
 * Переиспользуемый компонент для вывода CTA кнопки.
 *
 * Использование:
 * get_template_part( 'template-parts/components/cta-button', null, array(
 *     'text'  => 'Текст кнопки',
 *     'desc'  => 'Описание кнопки',
 *     'url'   => 'https://example.com',
 *     'class' => 'btn-cta',
 * ) );
 *
 * @param array $args {
 *     @type string $text  Текст кнопки (обязательно)
 *     @type string $desc  Описание кнопки (опционально)
 *     @type string $url   URL ссылки (опционально, по умолчанию #)
 *     @type string $class CSS класс (опционально, по умолчанию btn-cta)
 * }
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Получаем параметры из $args
$text  = isset( $args['text'] ) ? $args['text'] : '';
$desc  = isset( $args['desc'] ) ? $args['desc'] : '';
$url   = isset( $args['url'] ) ? $args['url'] : '#';
$class = isset( $args['class'] ) ? $args['class'] : 'btn-cta';

// Проверяем что есть обязательные параметры
if ( empty( $text ) ) {
    return;
}
?>

<div>
    <a href="<?php echo esc_url( $url ); ?>" class="<?php echo esc_attr( $class ); ?>">
        <?php echo esc_html( $text ); ?>
        <?php if ( $desc ) : ?>
            <span class="cta-button-desc"><?php echo esc_html( $desc ); ?></span>
        <?php endif; ?>
    </a>
</div>
