<?php get_header(); ?>

<main id="primary" class="<?php echo esc_attr( main_theme_content_class() ); ?>">
    <div class="container layout">
        <div class="content-area">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/content' ); ?>

                <?php if ( comments_open() || get_comments_number() ) : ?>
                    <?php comments_template(); ?>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</main>

<?php get_footer(); ?>
