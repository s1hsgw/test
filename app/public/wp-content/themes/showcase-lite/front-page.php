<?php
/**
 * The template for displaying front page.
 *
 * This is the template that displays front page by default.
 * Please note that this is the WordPress construct of front page
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Showcase Lite
 */
if ( get_option( 'show_on_front' ) == 'posts' ) {
        get_template_part( 'index' );
    } elseif ( 'page' == get_option( 'show_on_front' ) ) {

    get_header(); 
     
    //slider section
    showcase_featured_slider(); 

    //about us section
    showcase_about_section();
    
    //service section
    showcase_service_section();
?>        
<?php if ( is_front_page() && ! is_home() ) { 
$hide_latest_news  = get_theme_mod('showcase_disabled_latest_news', '0');
if( $hide_latest_news != ''){
?>
<section id="homeBlogPost">
    <div class="container">
        <div class="blogpostwrap fadeInRight">
                    <h2 class="section-title bounce"><?php esc_html_e('Latest News','showcase-lite'); ?></h2>            
            <?php $i=1; ?>       
            <?php $newsquery = new WP_query(array( 'post_type' => 'post','posts_per_page' => 4,'ignore_sticky_posts' => 1  )); ?>              
            <?php while( $newsquery->have_posts() ) : $newsquery->the_post(); ?> 
                    <div class="servicebox <?php if($i % 2 == 0) { echo "last_column"; } ?>">                                    
                        <?php if(has_post_thumbnail() ) { ?>
                            <div class="thumbbx"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>
                        <?php } ?>
                        <div class="pagecontent">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>                                    
                            <p><?php echo wp_trim_words( get_the_content(), 40, '&hellip;' ); ?></p>
                            <a class="readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','showcase-lite'); ?></a> 
                        </div>                                   
                    </div>
            <?php $i++;
                  endwhile;
                  wp_reset_postdata(); 
            ?>                    
        
        <div class="clear"></div>  
        </div><!-- services-wrap-->
    <div class="clear"></div>
    </div><!-- container -->
</section>    
<?php } ?>   
<?php } ?>          
<?php get_footer(); 
}
?>
