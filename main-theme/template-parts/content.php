<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-card' ); ?>>
    <header class="entry-header">
        <?php if ( is_singular() ) : ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php else : ?>
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php endif; ?>

        <?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta"><?php main_theme_posted_on(); ?></div>
        <?php endif; ?>
    </header>

    <div class="entry-content">
        <?php
        if ( is_singular() ) {
            // Выводим ACF блоки если они есть
            get_template_part( 'template-parts/blocks/renderer', null, array(
                'field_name' => 'page_blocks',
                'post_id'    => get_the_ID(),
                'post_type'  => get_post_type(),
            ) );
            the_content();
        } else {
            the_excerpt();
        }
        ?>
    </div>
</article>
