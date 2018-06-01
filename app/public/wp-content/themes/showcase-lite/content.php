<?php
/**
 * @package Showcase Lite
 */
?> 
<div class="blog-item">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>        
         <?php if (has_post_thumbnail() ){ ?>
			<div class="post-thumb">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			</div>
		<?php }  ?>          
        <header class="entry-header">           
            <h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>        
        </header><!-- .entry-header -->
        <?php if ( 'post' == get_post_type() ) : ?>
                <div class="postmeta">
                    <div class="post-date"><?php the_date(); ?></div><!-- post-date -->
                    <div class="post-author">
                    <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ));?>">&nbsp;|&nbsp;<?php the_author(); ?></a>
                    </div>
                    <div class="post-comment"> &nbsp;|&nbsp; <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></div>
                    <div class="post-categories"> &nbsp;|&nbsp; <?php esc_html_e('Category:','showcase-lite'); ?> <?php the_category( ', '); ?></div>                
                </div><!-- postmeta -->
            <?php endif; ?>                 
        <?php if ( is_search() || !is_single() ) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
           	<?php the_excerpt(); ?>
            <a class="readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More ','showcase-lite'); ?></a>
        </div><!-- .entry-summary -->
        <?php else : ?>
        <div class="entry-content">
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'showcase-lite' ) ); ?>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'showcase-lite' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
        <?php endif; ?>
        <div class="clear"></div>   
    </article><!-- #post-## -->
</div><!-- postlayout-repeat -->