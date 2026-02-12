<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <section class="error-404 not-found">
            <h1><?php esc_html_e( 'Page not found', 'main-theme' ); ?></h1>
            <p><?php esc_html_e( 'The page you requested does not exist or has moved.', 'main-theme' ); ?></p>
        </section>
    </div>
</main>

<?php get_footer(); ?>
