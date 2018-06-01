<?php
/**
 * Showcase Lite Theme Customizer
 *
 * @package Showcase Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function showcase_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class showcase_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	function showcase_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}	

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	$wp_customize->add_setting('showcase_color_scheme',array(
			'default'	=> '#95784a',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'showcase_color_scheme',array(
			'label' => __('Color Scheme','showcase-lite'),			
			'description'	=> __('Change color of theme','showcase-lite'),
			'section' => 'colors',
			'settings' => 'showcase_color_scheme'
		))
	);
	
	// Slider Section		
	$wp_customize->add_section('showcase_slider_section', array(
            'title' => __('Slider Settings', 'showcase-lite'),
            'priority' => null,
			'description'	=> __('Featured Image Size Should be same ( 1400x600 ).','showcase-lite'),            			
        )
    );
    $wp_customize->add_setting('number_of_slides', array(
		'default' => '3',
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('number_of_slides',array(
	    'label' => __('Number of slide items','showcase-lite'),
	    'section'   => 'showcase_slider_section',
	    'type'      => 'text'
    ));

    $wp_customize->add_setting('slider_category',array(
			'default' => '1',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));

    $category_array = array(); 

	foreach ( get_categories() as $categories => $category ){
	    $category_array[$category->term_id] = $category->name;
	}
	$wp_customize->add_control('slider_category',array(
			'type' => 'select',
            'choices' => $category_array,
			'label'	=> __('Select a category for the featured post slider','showcase-lite'),
			'section'	=> 'showcase_slider_section'
	));
	
	// Slider Section		 
	
	 
	 //About section
	$wp_customize->add_section('showcase_section_first',array(
			'title'	=> __('About Us Section','showcase-lite'),
			'description'	=> __('Select page for About us','showcase-lite'),
			'priority'	=> null
	));	
	
	$wp_customize->add_setting('showcase_about-page1',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('showcase_about-page1',array(
			'type' => 'dropdown-pages',			
			'section' => 'showcase_section_first',
	));	
	
		
	// Home service Section 	
	$wp_customize->add_section('showcase_section_second', array(
			'title'	=> __('Homepage Service','showcase-lite'),
			'description'	=> __('Select Pages from the dropdown for homepage service section','showcase-lite'),
			'priority'	=> null
	));	
	
	$wp_customize->add_setting('showcase_page-column1',	array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
 
	$wp_customize->add_control(	'showcase_page-column1',array(
			'type' => 'dropdown-pages',
			'section' => 'showcase_section_second',
	));	
	
	$wp_customize->add_setting('showcase_page-column2',	array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
 
	$wp_customize->add_control(	'showcase_page-column2',array(
			'type' => 'dropdown-pages',
			'section' => 'showcase_section_second',
	));
	
	$wp_customize->add_setting('showcase_page-column3',	array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
 
	$wp_customize->add_control(	'showcase_page-column3',array(
			'type' => 'dropdown-pages',
			'section' => 'showcase_section_second',
	));//end four column page boxes	
	
    // Homepage latest news Section
	
	$wp_customize->add_section('showcase_section_third', array(
			'title'	=> __('Homepage Latest News','showcase-lite'),
			'description'	=> __('Manage Latest News in Home Page','showcase-lite'),
			'priority'	=> null
	));	
	
	$wp_customize->add_setting('showcase_disabled_latest_news',array(
			'default' => false,
			'sanitize_callback' => 'showcase_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'showcase_disabled_latest_news', array(
		   'settings' => 'showcase_disabled_latest_news',
		   'section'   => 'showcase_section_third',
		   'label'     => __('Check To Enable Latest News','showcase-lite'),
		   'type'      => 'checkbox'
	 ));//Disable Homepage latest news Section
	
}
add_action( 'customize_register', 'showcase_customize_register' );

function showcase_custom_css(){
		?>
        	<style type="text/css"> 
					
					a, .blog-item h2 a:hover,
					#sidebar ul li a:hover,									
					.blog-item h3 a:hover,
					.cols-4 ul li a:hover, .cols-4 ul li.current_page_item a,
					.recent-post h6:hover,					
					.servicebox:hover h3,
					.footer-icons a:hover,
					.postmeta a:hover,
					.powerby a:hover,
					.nav-links .current
					{ color:<?php echo esc_html( get_theme_mod('showcase_color_scheme','#95784a')); ?>;}
					 
					
					.pagination ul li .current, .pagination ul li a:hover, 
					#commentform input#submit:hover,					
					.nivo-controlNav a.active,
					.readmore:hover,
					.appbutton:hover,					
					.slide_info .slide_more,	
					.sitenav ul li.current-menu-ancestor a.parent,					
					.search-form input.search-submit,				
					.wpcf7 input[type='submit'],
					.services-wrap .servicebox:hover									
					{ background-color:<?php echo esc_html( get_theme_mod('showcase_color_scheme','#95784a')); ?>;}
					
					
					.footer-icons a:hover,
					.sitenav ul li a:hover, .sitenav ul li.current_page_item a,
					h3.widget-title,
					.blog-item,
					.nav-links .page-numbers,
					.search-form input.search-field							
					{ border-color:<?php echo esc_html( get_theme_mod('showcase_color_scheme','#95784a')); ?>;}					
					
					
			</style>
<?php                      
}
         
add_action('wp_head','showcase_custom_css');	  

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function showcase_customize_preview_js() {
	wp_enqueue_script( 'showcase_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20170701', true );
}
add_action( 'customize_preview_init', 'showcase_customize_preview_js' );