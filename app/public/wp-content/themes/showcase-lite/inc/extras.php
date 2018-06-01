<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Showcase Lite
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function showcase_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'showcase_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 */
function showcase_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'showcase_body_classes' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function showcase_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'showcase_enhanced_image_navigation', 10, 2 );

// Featured image slider 
function showcase_featured_slider() {
    if ( is_front_page() && ! is_home() ) {
        global $post;
        echo '<section id="home_slider">
              <div class="slider-wrapper theme-default">';          
        $count = get_theme_mod('number_of_slides','3');
        $slidecat =get_theme_mod('slider_category','1');

        $query = new WP_Query( array( 'cat' =>$slidecat,'posts_per_page' =>$count ) );
        $i= 1;
        if ($query->have_posts()) :
          	echo '<div id="slider" class="nivoSlider">';
            while ($query->have_posts()) : $query->the_post();  
            $ids[] = $post->ID;
            if ( has_post_thumbnail() ) {
            	echo '<img src="'. get_the_post_thumbnail_url() .'" title="#slidecaption'.$i.'" />';
            }else{	
                echo '<img src="'.esc_url( get_template_directory_uri() ).'/images/slides/slider.jpg" title="#slidecaption'.$i.'" />';
            }
            $i++;
            endwhile;
            wp_reset_postdata();
            echo '</div>';
        endif;
        $p=1;
        foreach($ids as $id){ 
          	$title        = get_the_title( $id ); 
            $post_data    = get_post($id); 
            $content      = wp_trim_words( $post_data->post_content, 30, '' );
            echo '<div id="slidecaption'.$p.'" class="nivo-html-caption">';
            echo '<div class="slide_info">';
            if($p%2==0){
            	echo '<h2 class="fadeInLeft">'.$title.'</h2>';
                echo '<p class="bounceInUp">'.$content.'</p>';
                echo '<a class="slide_more" href="'.get_the_permalink($id).'">Read More</a>';
            } else {
            	echo '<h2 class="fadeInRight">'.$title.'</h2>';
                echo '<p class="bounceInDown">'.$content.'</p>';
                echo '<a class="slide_more" href="'.get_the_permalink($id).'">Read More</a>';
            }            
            echo '</div>';
            echo '</div>';
            $p++;
        }            
            
        echo '</div></section>';
        echo '<div class="clear"></div>';    
    } else {
      // Do nothing
    }
}


// about us section 
function showcase_about_section() {
	if ( is_front_page() && ! is_home() ) {
		if( get_theme_mod('showcase_about-page1')) { ?>
			<section id="Mainwrap">
            <div class="container">
            <div class="aboutwrap"> 
                <?php 
                $queryvar = new WP_query('page_id='.absint(get_theme_mod('showcase_about-page1' ,true)));
                while( $queryvar->have_posts() ) : $queryvar->the_post();
                ?> 
                <div class="about-left fadeInLeft">
                <h2 class="section-title bounce"><?php the_title(); ?></h2>
                <div class="about-content">
                <p><?php echo wp_trim_words( get_the_content(),350, '&hellip;' ); ?></p>
                <a class="readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','showcase-lite'); ?></a> 
                </div>
                </div>
                <div class="about-image fadeInRight">
                <?php the_post_thumbnail(array(500,500)); ?>
                </div>
                <?php 
                endwhile;
                wp_reset_postdata(); 
                ?> 
            </div> 
            <div class="clear"></div>
            </div><!-- container -->
            </section>
<?php   }
	} else {
      // Do nothing
    }
}	

//service section

function showcase_service_section(){
	if ( is_front_page() && ! is_home() ) { ?>
	    <section id="wrapsecond">
        <div class="container">
        <div class="services-wrap">  
        <h2 class="section-title bounce"><?php esc_html_e('Our Services','showcase-lite'); ?></h2>
        <?php for($p=1; $p<4; $p++) { ?>       
        <?php if( get_theme_mod('showcase_page-column'.$p,false)) { ?>          
            <?php $queryvar = new WP_query('page_id='.absint(get_theme_mod('showcase_page-column'.$p,true))); ?>                
                    <?php while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
                    <div class="servicebox <?php if($p % 3 == 0) { echo "last_column"; } ?>">           
                        <div class="pagecontent">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>       <p><?php echo wp_trim_words( get_the_content(), 40, '&hellip;' ); ?></p>
                            <a class="readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','showcase-lite'); ?></a> 
                        </div>                                   
                    </div>
                    <?php endwhile;
                    wp_reset_postdata();                     
        } } ?>  
        <div class="clear"></div>  
        </div><!-- services-wrap-->
        <div class="clear"></div>
        </div><!-- container -->
        </section> 
	<?php }else{
		//Do nothing
	}
}
?>