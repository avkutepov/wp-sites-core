<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/content' ); ?>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
