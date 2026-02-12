<?php
/**
 * Hero Block Template
 *
 * Простой шаблон вывода hero блока без стилизации.
 * Данные берутся из ACF flexible content через get_sub_field().
 * Вызывается автоматически через renderer.php.
 *
 * ACF поля:
 * - hero_bg_image (image) - Фоновое изображение
 * - hero_usp (textarea) - УТП (Уникальное торговое предложение)
 * - hero_cta (clone group) - CTA кнопка (cta_text, cta_desc, cta_url, cta_class)
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Получаем данные из ACF
$hero_bg_image = get_sub_field( 'hero_bg_image' );
$hero_usp      = get_sub_field( 'hero_usp' );

// CTA данные через helper
$cta_data = main_theme_get_cta_data( 'hero_cta', true );
?>

<section class="hero-block" 
                        <?php if (isset($hero_bg_image['url'])): ?>
                            style="background-image: url('<?php echo esc_url( $hero_bg_image['url'] ); ?>');"
                        <?php endif; ?>>

    <?php if ( $hero_usp ) : ?>
        <div>
            <?php echo esc_html( $hero_usp ); ?>
        </div>
    <?php endif; ?>


    <?php
    // Подключаем компонент CTA кнопки
    if ( $cta_data['text'] ) {
        get_template_part( 'template-parts/components/cta-button', null, $cta_data );
    }
    ?>
</section>
