<?php get_header(); ?>

<main id="primary" class="<?php echo esc_attr( main_theme_content_class() ); ?>">
    <div class="container layout">
        <div class="content-area">
            <header class="page-header">
                <h1><?php the_archive_title(); ?></h1>
                <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
            </header>

            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/content' ); ?>
                <?php endwhile; ?>
                <?php the_posts_pagination(); ?>
            <?php else : ?>
                <?php get_template_part( 'template-parts/content', 'none' ); ?>
            <?php endif; ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</main>

<?php get_footer(); ?>
