<?php
/**
 * VW One Page Theme Customizer
 *
 * @package VW One Page
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_one_page_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_one_page_custom_controls' );

function vw_one_page_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_one_page_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_one_page_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$VWOnePageParentPanel = new VW_One_Page_WP_Customize_Panel( $wp_customize, 'vw_one_page_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => 'VW Settings',
		'priority' => 10,
	));

	$wp_customize->add_section( 'vw_one_page_left_right', array(
    	'title'      => __( 'General Settings', 'vw-one-page' ),
		'priority'   => 30,
		'panel' => 'vw_one_page_panel_id'
	));

	$wp_customize->add_setting('vw_one_page_width_option',array(
        'default' => __('Full Width','vw-one-page'),
        'sanitize_callback' => 'vw_one_page_sanitize_choices'
	));
	$wp_customize->add_control(new VW_One_Page_Image_Radio_Control($wp_customize, 'vw_one_page_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-one-page'),
        'description' => __('Here you can change the width layout of Website.','vw-one-page'),
        'section' => 'vw_one_page_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_one_page_theme_options',array(
        'default' => __('Right Sidebar','vw-one-page'),
        'sanitize_callback' => 'vw_one_page_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_one_page_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-one-page'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-one-page'),
        'section' => 'vw_one_page_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-one-page'),
            'Right Sidebar' => __('Right Sidebar','vw-one-page'),
            'One Column' => __('One Column','vw-one-page'),
            'Three Columns' => __('Three Columns','vw-one-page'),
            'Four Columns' => __('Four Columns','vw-one-page'),
            'Grid Layout' => __('Grid Layout','vw-one-page')
        ),
	));

	$wp_customize->add_setting('vw_one_page_page_layout',array(
        'default' => __('One Column','vw-one-page'),
        'sanitize_callback' => 'vw_one_page_sanitize_choices'
	));
	$wp_customize->add_control('vw_one_page_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-one-page'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-one-page'),
        'section' => 'vw_one_page_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-one-page'),
            'Right Sidebar' => __('Right Sidebar','vw-one-page'),
            'One Column' => __('One Column','vw-one-page')
        ),
	));

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_one_page_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_one_page_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_One_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_one_page_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-one-page' ),
		'section' => 'vw_one_page_left_right'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_one_page_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_one_page_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_One_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_one_page_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-one-page' ),
		'section' => 'vw_one_page_left_right'
    )));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_one_page_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_one_page_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_One_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_one_page_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-one-page' ),
        'section' => 'vw_one_page_left_right'
    )));

	$wp_customize->add_setting('vw_one_page_loader_icon',array(
        'default' => __('Two Way','vw-one-page'),
        'sanitize_callback' => 'vw_one_page_sanitize_choices'
	));
	$wp_customize->add_control('vw_one_page_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','vw-one-page'),
        'section' => 'vw_one_page_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','vw-one-page'),
            'Dots' => __('Dots','vw-one-page'),
            'Rotate' => __('Rotate','vw-one-page')
        ),
	) );

	//Topbar
	$wp_customize->add_section( 'vw_one_page_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-one-page' ),
		'priority'   => 30,
		'panel' => 'vw_one_page_panel_id'
	) );

	$wp_customize->add_setting( 'vw_one_page_topbar_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_one_page_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_One_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_one_page_topbar_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-one-page' ),
      'section' => 'vw_one_page_topbar'
    )));

    $wp_customize->add_setting('vw_one_page_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_one_page_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','vw-one-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-one-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-one-page' ),
        ),
		'section'=> 'vw_one_page_topbar',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'vw_one_page_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_one_page_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_One_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_one_page_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-one-page' ),
        'section' => 'vw_one_page_topbar'
    )));

    $wp_customize->add_setting( 'vw_one_page_search_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_one_page_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_One_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_one_page_search_hide_show',array(
		'label' => esc_html__( 'Show / Hide Search','vw-one-page' ),
		'section' => 'vw_one_page_topbar'
    )));

    $wp_customize->add_setting('vw_one_page_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_one_page_search_font_size',array(
		'label'	=> __('Search Font Size','vw-one-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-one-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-one-page' ),
        ),
		'section'=> 'vw_one_page_topbar',
		'type'=> 'text'
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_one_page_phone_number', array( 
		'selector' => '.contact_details ul li', 
		'render_callback' => 'vw_one_page_customize_partial_vw_one_page_phone_number', 
	));

    $wp_customize->add_setting('vw_one_page_phone_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_One_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_one_page_phone_icon',array(
		'label'	=> __('Add Phone Icon','vw-one-page'),
		'transport' => 'refresh',
		'section'	=> 'vw_one_page_topbar',
		'setting'	=> 'vw_one_page_phone_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_one_page_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_one_page_phone_number',array(
		'label'	=> __('Add Phone Number','vw-one-page'),
		'section'=> 'vw_one_page_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_one_page_email_icon',array(
		'default'	=> 'far fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_One_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_one_page_email_icon',array(
		'label'	=> __('Add Email Icon','vw-one-page'),
		'transport' => 'refresh',
		'section'	=> 'vw_one_page_topbar',
		'setting'	=> 'vw_one_page_email_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_one_page_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_one_page_email_address',array(
		'label'	=> __('Add Email Address','vw-one-page'),
		'section'=> 'vw_one_page_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_one_page_time_icon',array(
		'default'	=> 'far fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_One_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_one_page_time_icon',array(
		'label'	=> __('Add Timing Icon','vw-one-page'),
		'transport' => 'refresh',
		'section'	=> 'vw_one_page_topbar',
		'setting'	=> 'vw_one_page_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_one_page_timing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_one_page_timing',array(
		'label'	=> __('Add Timming','vw-one-page'),
		'section'=> 'vw_one_page_topbar',
		'type'=> 'text'
	));
    
	//Slider
	$wp_customize->add_section( 'vw_one_page_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-one-page' ),
		'priority'   => null,
		'panel' => 'vw_one_page_panel_id'
	));

	$wp_customize->add_setting( 'vw_one_page_slider_hide_show',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_one_page_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_One_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_one_page_slider_hide_show', array(
		'label' => esc_html__( 'Show / Hide Slider','vw-one-page' ),
		'section' => 'vw_one_page_slidersettings'
	)));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial(
    	'vw_one_page_slider_hide_show',array(
			'selector'        => '#slider .inner_carousel h1',
			'render_callback' => 'vw_one_page_customize_partial_vw_one_page_slider_hide_show',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_one_page_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_one_page_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'vw_one_page_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-one-page' ),
			'description' => __('Slider image size (1500 x 590)','vw-one-page'),
			'section'  => 'vw_one_page_slidersettings',
			'type'     => 'dropdown-pages'
		));
	}

	//content layout
	$wp_customize->add_setting('vw_one_page_slider_content_option',array(
        'default' => __('Right','vw-one-page'),
        'sanitize_callback' => 'vw_one_page_sanitize_choices'
	));
	$wp_customize->add_control(new VW_One_Page_Image_Radio_Control($wp_customize, 'vw_one_page_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-one-page'),
        'section' => 'vw_one_page_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_one_page_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control( 'vw_one_page_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-one-page' ),
		'section'     => 'vw_one_page_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_one_page_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	));

	//Opacity
	$wp_customize->add_setting('vw_one_page_slider_opacity_color',array(
		'default'              => 0.5,
		'sanitize_callback' => 'vw_one_page_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_one_page_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','vw-one-page' ),
		'section'     => 'vw_one_page_slidersettings',
		'type'        => 'select',
		'settings'    => 'vw_one_page_slider_opacity_color',
		'choices' => array(
			'0' =>  esc_attr('0','vw-one-page'),
			'0.1' =>  esc_attr('0.1','vw-one-page'),
			'0.2' =>  esc_attr('0.2','vw-one-page'),
			'0.3' =>  esc_attr('0.3','vw-one-page'),
			'0.4' =>  esc_attr('0.4','vw-one-page'),
			'0.5' =>  esc_attr('0.5','vw-one-page'),
			'0.6' =>  esc_attr('0.6','vw-one-page'),
			'0.7' =>  esc_attr('0.7','vw-one-page'),
			'0.8' =>  esc_attr('0.8','vw-one-page'),
			'0.9' =>  esc_attr('0.9','vw-one-page')
	),
	));

	//Services
	$wp_customize->add_section( 'vw_one_page_service_section' , array(
    	'title'      => __( 'Services', 'vw-one-page' ),
		'priority'   => null,
		'panel' => 'vw_one_page_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_one_page_services', array( 
		'selector' => '.catgory-box h2 a', 
		'render_callback' => 'vw_one_page_customize_partial_vw_one_page_services',
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_one_page_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_one_page_sanitize_choices',
	));
	$wp_customize->add_control('vw_one_page_services',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display services','vw-one-page'),
		'section' => 'vw_one_page_service_section',
	));	

	//About us
	$wp_customize->add_section( 'vw_one_page_about_section' , array(
    	'title'      => __( 'About us', 'vw-one-page' ),
		'priority'   => null,
		'panel' => 'vw_one_page_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_one_page_about_page', array( 
		'selector' => '#about-us h3', 
		'render_callback' => 'vw_one_page_customize_partial_vw_one_page_about_page',
	));

	$wp_customize->add_setting( 'vw_one_page_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'vw_one_page_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'vw_one_page_about_page', array(
		'label'    => __( 'Select About Page', 'vw-one-page' ),
		'section'  => 'vw_one_page_about_section',
		'type'     => 'dropdown-pages'
	));

	//About excerpt
	$wp_customize->add_setting( 'vw_one_page_about_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control( 'vw_one_page_about_excerpt_number', array(
		'label'       => esc_html__( 'About Excerpt length','vw-one-page' ),
		'section'     => 'vw_one_page_about_section',
		'type'        => 'range',
		'settings'    => 'vw_one_page_about_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	));

	//Blog Post
	$wp_customize->add_panel( $VWOnePageParentPanel );

	$BlogPostParentPanel = new VW_One_Page_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-one-page' ),
		'panel' => 'vw_one_page_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_one_page_post_settings', array(
		'title' => __( 'Post Settings', 'vw-one-page' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial(
		'vw_one_page_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_one_page_customize_partial_vw_one_page_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vw_one_page_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_one_page_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_One_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_one_page_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-one-page' ),
        'section' => 'vw_one_page_post_settings'
    )));

    $wp_customize->add_setting( 'vw_one_page_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_one_page_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_One_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_one_page_toggle_author',array(
		'label' => esc_html__( 'Author','vw-one-page' ),
		'section' => 'vw_one_page_post_settings'
    )));

    $wp_customize->add_setting( 'vw_one_page_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_one_page_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_One_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_one_page_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-one-page' ),
		'section' => 'vw_one_page_post_settings'
    )));

    $wp_customize->add_setting( 'vw_one_page_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_one_page_switch_sanitization'
	));
    $wp_customize->add_control( new VW_One_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_one_page_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-one-page' ),
		'section' => 'vw_one_page_post_settings'
    )));

    $wp_customize->add_setting( 'vw_one_page_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_one_page_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-one-page' ),
		'section'     => 'vw_one_page_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_one_page_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('vw_one_page_blog_layout_option',array(
        'default' => __('Default','vw-one-page'),
        'sanitize_callback' => 'vw_one_page_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_One_Page_Image_Radio_Control($wp_customize, 'vw_one_page_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-one-page'),
        'section' => 'vw_one_page_post_settings',
        'choices' => array(
            'Default' => get_template_directory_uri().'/images/blog-layout1.png',
            'Center' => get_template_directory_uri().'/images/blog-layout2.png',
            'Left' => get_template_directory_uri().'/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_one_page_excerpt_settings',array(
        'default' => __('Excerpt','vw-one-page'),
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_one_page_sanitize_choices'
	));
	$wp_customize->add_control('vw_one_page_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-one-page'),
        'section' => 'vw_one_page_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-one-page'),
            'Excerpt' => __('Excerpt','vw-one-page'),
            'No Content' => __('No Content','vw-one-page')
        ),
	) );

	$wp_customize->add_setting('vw_one_page_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_one_page_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-one-page'),
		'input_attrs' => array(
           	'placeholder' => __( '[...]', 'vw-one-page' ),
        ),
		'section'=> 'vw_one_page_post_settings',
		'type'=> 'text'
	));

    // Button Settings
	$wp_customize->add_section( 'vw_one_page_button_settings', array(
		'title' => __( 'Button Settings', 'vw-one-page' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_one_page_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_one_page_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-one-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-one-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-one-page' ),
        ),
		'section'=> 'vw_one_page_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_one_page_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_one_page_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-one-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-one-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-one-page' ),
        ),
		'section'=> 'vw_one_page_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_one_page_button_border_radius', array(
		'default'              => '',
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_one_page_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-one-page' ),
		'section'     => 'vw_one_page_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_one_page_button_text', array( 
		'selector' => '.post-main-box .content-bttn a', 
		'render_callback' => 'vw_one_page_customize_partial_vw_one_page_button_text', 
	));

    $wp_customize->add_setting('vw_one_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_one_page_button_text',array(
		'label'	=> __('Add Button Text','vw-one-page'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-one-page' ),
        ),
		'section'=> 'vw_one_page_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_one_page_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-one-page' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_one_page_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_one_page_customize_partial_vw_one_page_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_one_page_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_one_page_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_One_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_one_page_related_post',array(
		'label' => esc_html__( 'Related Post','vw-one-page' ),
		'section' => 'vw_one_page_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_one_page_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_one_page_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-one-page'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-one-page' ),
        ),
		'section'=> 'vw_one_page_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_one_page_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_one_page_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-one-page'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-one-page' ),
        ),
		'section'=> 'vw_one_page_related_posts_settings',
		'type'=> 'number'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_one_page_404_page',array(
		'title'	=> __('404 Page Settings','vw-one-page'),
		'panel' => 'vw_one_page_panel_id',
	));	

	$wp_customize->add_setting('vw_one_page_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_one_page_404_page_title',array(
		'label'	=> __('Add Title','vw-one-page'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-one-page' ),
        ),
		'section'=> 'vw_one_page_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_one_page_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_one_page_404_page_content',array(
		'label'	=> __('Add Text','vw-one-page'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-one-page' ),
        ),
		'section'=> 'vw_one_page_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_one_page_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_one_page_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-one-page'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-one-page' ),
        ),
		'section'=> 'vw_one_page_404_page',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('vw_one_page_responsive_media',array(
		'title'	=> __('Responsive Media','vw-one-page'),
		'panel' => 'vw_one_page_panel_id',
	));

	$wp_customize->add_setting( 'vw_one_page_resp_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_one_page_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_One_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_one_page_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-one-page' ),
      'section' => 'vw_one_page_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_one_page_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_one_page_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_One_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_one_page_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-one-page' ),
      'section' => 'vw_one_page_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_one_page_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_one_page_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_One_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_one_page_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-one-page' ),
      'section' => 'vw_one_page_responsive_media'
    )));

	$wp_customize->add_setting( 'vw_one_page_metabox_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_one_page_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_One_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_one_page_metabox_hide_show',array(
      'label' => esc_html__( 'Show / Hide Metabox','vw-one-page' ),
      'section' => 'vw_one_page_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_one_page_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_one_page_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_One_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_one_page_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-one-page' ),
      'section' => 'vw_one_page_responsive_media'
    )));

    $wp_customize->add_setting('vw_one_page_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_One_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_one_page_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-one-page'),
		'transport' => 'refresh',
		'section'	=> 'vw_one_page_responsive_media',
		'setting'	=> 'vw_one_page_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_one_page_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_One_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_one_page_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-one-page'),
		'transport' => 'refresh',
		'section'	=> 'vw_one_page_responsive_media',
		'setting'	=> 'vw_one_page_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	//Content Creation
	$wp_customize->add_section( 'vw_one_page_content_section' , array(
    	'title' => __( 'Customize Home Page Settings', 'vw-one-page' ),
		'priority' => null,
		'panel' => 'vw_one_page_panel_id'
	) );

	$wp_customize->add_setting('vw_one_page_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new vw_one_page_Content_Creation( $wp_customize, 'vw_one_page_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-one-page' ),
		),
		'section' => 'vw_one_page_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-one-page' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('vw_one_page_footer',array(
		'title'	=> __('Footer','vw-one-page'),
		'description'=> __('This section will appear in the footer','vw-one-page'),
		'panel' => 'vw_one_page_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial(
		'vw_one_page_footer_text', array( 
			'selector' => '#footer-2 .copyright p', 
		'render_callback' => 'vw_one_page_customize_partial_vw_one_page_footer_text', 
	));
	
	$wp_customize->add_setting('vw_one_page_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_one_page_footer_text',array(
		'label'	=> __('Copyright Text','vw-one-page'),
		'section'=> 'vw_one_page_footer',
		'setting'=> 'vw_one_page_footer_text',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_one_page_copyright_alingment',array(
        'default' => __('center','vw-one-page'),
        'sanitize_callback' => 'vw_one_page_sanitize_choices'
	));
	$wp_customize->add_control(new VW_One_Page_Image_Radio_Control($wp_customize, 'vw_one_page_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-one-page'),
        'section' => 'vw_one_page_footer',
        'settings' => 'vw_one_page_copyright_alingment',
        'choices' => array(
            'left' => get_template_directory_uri().'/images/copyright1.png',
            'center' => get_template_directory_uri().'/images/copyright2.png',
            'right' => get_template_directory_uri().'/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_one_page_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_one_page_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-one-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-one-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-one-page' ),
        ),
		'section'=> 'vw_one_page_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_one_page_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_one_page_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_One_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_one_page_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-one-page' ),
      	'section' => 'vw_one_page_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_one_page_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_one_page_customize_partial_vw_one_page_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('vw_one_page_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_One_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_one_page_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-one-page'),
		'transport' => 'refresh',
		'section'	=> 'vw_one_page_footer',
		'setting'	=> 'vw_one_page_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_one_page_scroll_top_alignment',array(
        'default' => __('Right','vw-one-page'),
        'sanitize_callback' => 'vw_one_page_sanitize_choices'
	));
	$wp_customize->add_control(new VW_One_Page_Image_Radio_Control($wp_customize, 'vw_one_page_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-one-page'),
        'section' => 'vw_one_page_footer',
        'settings' => 'vw_one_page_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/layout1.png',
            'Center' => get_template_directory_uri().'/images/layout2.png',
            'Right' => get_template_directory_uri().'/images/layout3.png'
    ))));

     // Has to be at the top
	$wp_customize->register_panel_type( 'VW_One_Page_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_One_Page_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_one_page_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_One_Page_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_one_page_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_One_Page_WP_Customize_Section extends WP_Customize_Section { 	
	    public $section;
	    public $type = 'vw_one_page_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_one_page_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_one_page_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_One_Page_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_One_Page_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_One_Page_Customize_Section_Pro($manager,'example_1',array(
			'priority'   => 1,
			'title'    => esc_html__( 'One Page Pro', 'vw-one-page' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-one-page' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/one-page-wordpress-theme/'),
		)));

		$manager->add_section(new VW_One_Page_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-one-page' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-one-page' ),
			'pro_url'  => admin_url('themes.php?page=vw_one_page_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-one-page-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-one-page-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_One_Page_Customize::get_instance();