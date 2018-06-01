<?php 
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Showcase Lite
 */
get_header(); ?>
<div class="container">
    <div class="page_content">
        <section class="site-main" id="sitemain">
            <header class="page-header">
                <h1 class="entry-title"><?php esc_html_e( 'Oops! page Not Found', 'showcase-lite' ); ?></h1>
            </header><!-- .page-header -->
            <div class="page-content">
                <p class="text-404"><?php esc_html_e( 'It looks like nothing was found at this location.', 'showcase-lite' ); ?></p>               
            </div><!-- .page-content -->
        </section>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>