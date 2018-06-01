<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Showcase Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="pageholder">
<div class="header <?php if( !is_front_page() && !is_home() ){ ?>headerinner<?php } ?>">
        <div class="container">
            <div class="logo">
            			<?php showcase_the_custom_logo(); ?>
                        <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                        <span><?php bloginfo('description'); ?></span>
            </div><!-- logo -->
             <div class="hdrright">
             <div class="toggle">
                <a class="toggleMenu" href="#"><?php esc_html_e('Menu','showcase-lite'); ?></a>
             </div><!-- toggle --> 
            
            <div class="sitenav">
                    <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
            </div><!-- site-nav -->
            </div>
            <div class="clear"></div>
            
        </div><!-- container -->
  </div><!--.header -->