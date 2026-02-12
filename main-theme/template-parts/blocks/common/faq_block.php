<?php
/**
 * FAQ Block Template
 *
 * Простой шаблон вывода FAQ блока без стилизации.
 * Данные берутся из ACF flexible content через get_sub_field().
 * Вызывается автоматически через renderer.php.
 *
 * ACF поля:
 * - faq_title (text) - Заголовок FAQ блока
 * - faq_items (repeater) - Массив вопросов и ответов
 *   - faq_question (text) - Вопрос
 *   - faq_answer (textarea) - Ответ
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Получаем данные из ACF
$faq_title = get_sub_field( 'faq_title' );
$faq_items = get_sub_field( 'faq_items' );

// Выводим Schema.org разметку для FAQ
main_theme_faq_schema( $faq_items );
?>

<section class="faq-block">
    <?php if ( $faq_title ) : ?>
        <div>
            <?php echo esc_html( $faq_title ); ?>
        </div>
    <?php endif; ?>

    <?php if ( $faq_items && is_array( $faq_items ) ) : ?>
        <div>
            <?php foreach ( $faq_items as $item ) : ?>
                <?php
                $question = isset( $item['faq_question'] ) ? $item['faq_question'] : '';
                $answer   = isset( $item['faq_answer'] ) ? $item['faq_answer'] : '';
                ?>

                <?php if ( $question || $answer ) : ?>
                    <div>
                        <?php if ( $question ) : ?>
                            <div>
                                <?php echo esc_html( $question ); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( $answer ) : ?>
                            <div>
                                <?php echo esc_html( $answer ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
