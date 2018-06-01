<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Showcase Lite
 */
?>
<div id="footer-wrapper">
    	<div class="container">       
                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                    <div class="cols-4 widget-column-1" role="complementary">
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    </div><!-- .widget-area .first -->
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                    <div class="cols-4 widget-column-2" role="complementary">
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                    </div><!-- .widget-area .first -->
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                    <div class="cols-4 widget-column-3" role="complementary">
                        <?php dynamic_sidebar( 'footer-3' ); ?>
                    </div><!-- .widget-area .first -->
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                    <div class="cols-4 widget-column-4" role="complementary">
                        <?php dynamic_sidebar( 'footer-4' ); ?>
                    </div><!-- .widget-area .first -->
                <?php endif; ?>              
            <div class="clear"></div>
          </div><!--end .container-->        
        <div class="copyright-wrapper">
        	<div class="container">            	
                <div class="powerby">
				<a href="<?php echo esc_url( esc_html_e( 'https://wordpress.org/', 'showcase-lite' ) ); ?>"><?php echo esc_html_e( 'Proudly powered by WordPress', 'showcase-lite' ); ?></a>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div><!--#end pageholder-->
<?php wp_footer(); ?>
</body>
</html>