<?php
/**
* The template for adding Featured Slider Options in Customizer
*
* @package Catch Themes
* @subpackage Clean Magazine
* @since Clean Magazine 0.2
*/
// Featured Slider
if ( 4.3 > get_bloginfo( 'version' ) ) {
	$wp_customize->add_panel( 'clean_magazine_featured_slider', array(
	    'capability'     => 'edit_theme_options',
	    'description'    => __( 'Featured Slider Options', 'clean-magazine' ),
	    'priority'       => 500,
		'title'    		 => __( 'Featured Slider', 'clean-magazine' ),
	) );

	$wp_customize->add_section( 'clean_magazine_featured_slider', array(
		'panel'			=> 'clean_magazine_featured_slider',
		'priority'		=> 1,
		'title'			=> __( 'Featured Slider Options', 'clean-magazine' ),
	) );
}
else {
	$wp_customize->add_section( 'clean_magazine_featured_slider', array(
		'priority'      => 500,
		'title'			=> __( 'Featured Slider', 'clean-magazine' ),
	) );
}

$wp_customize->add_setting( 'clean_magazine_theme_options[featured_slider_option]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slider_option'],
	'sanitize_callback' => 'clean_magazine_sanitize_select',
) );

$featured_slider_content_options = clean_magazine_featured_slider_content_options();
$choices = array();
foreach ( $featured_slider_content_options as $featured_slider_content_option ) {
	$choices[$featured_slider_content_option['value']] = $featured_slider_content_option['label'];
}

$wp_customize->add_control( 'clean_magazine_theme_options[featured_slider_option]', array(
	'choices'   => $choices,
	'label'    	=> __( 'Enable Slider on', 'clean-magazine' ),
	'priority'	=> '2',
	'section'  	=> 'clean_magazine_featured_slider',
	'settings' 	=> 'clean_magazine_theme_options[featured_slider_option]',
	'type'    	=> 'select',
) );

$wp_customize->add_setting( 'clean_magazine_theme_options[featured_slide_transition_effect]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slide_transition_effect'],
	'sanitize_callback'	=> 'clean_magazine_sanitize_select',
) );

$clean_magazine_featured_slide_transition_effects = clean_magazine_featured_slide_transition_effects();
$choices = array();
foreach ( $clean_magazine_featured_slide_transition_effects as $clean_magazine_featured_slide_transition_effect ) {
	$choices[$clean_magazine_featured_slide_transition_effect['value']] = $clean_magazine_featured_slide_transition_effect['label'];
}

$wp_customize->add_control( 'clean_magazine_theme_options[featured_slide_transition_effect]' , array(
	'active_callback'	=> 'clean_magazine_is_slider_active',
	'choices'  	=> $choices,
	'label'		=> __( 'Transition Effect', 'clean-magazine' ),
	'priority'	=> '3',
	'section'  	=> 'clean_magazine_featured_slider',
	'settings' 	=> 'clean_magazine_theme_options[featured_slide_transition_effect]',
	'type'	  	=> 'select',
	)
);

$wp_customize->add_setting( 'clean_magazine_theme_options[featured_slide_transition_delay]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slide_transition_delay'],
	'sanitize_callback'	=> 'absint',
) );

$wp_customize->add_control( 'clean_magazine_theme_options[featured_slide_transition_delay]' , array(
	'active_callback'	=> 'clean_magazine_is_slider_active',
	'description'	=> __( 'seconds(s)', 'clean-magazine' ),
	'input_attrs' => array(
    	'style' => 'width: 40px;'
	),
	'label'    		=> __( 'Transition Delay', 'clean-magazine' ),
	'priority'		=> '4',
	'section'  		=> 'clean_magazine_featured_slider',
	'settings' 		=> 'clean_magazine_theme_options[featured_slide_transition_delay]',
	)
);

$wp_customize->add_setting( 'clean_magazine_theme_options[featured_slide_transition_length]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slide_transition_length'],
	'sanitize_callback'	=> 'absint',
) );

$wp_customize->add_control( 'clean_magazine_theme_options[featured_slide_transition_length]' , array(
	'active_callback'	=> 'clean_magazine_is_slider_active',
	'description'	=> __( 'seconds(s)', 'clean-magazine' ),
	'input_attrs' => array(
    	'style' => 'width: 40px;'
	),
	'label'    		=> __( 'Transition Length', 'clean-magazine' ),
	'priority'		=> '5',
	'section'  		=> 'clean_magazine_featured_slider',
	'settings' 		=> 'clean_magazine_theme_options[featured_slide_transition_length]',
	)
);

$wp_customize->add_setting( 'clean_magazine_theme_options[featured_slider_image_loader]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slider_image_loader'],
	'sanitize_callback' => 'clean_magazine_sanitize_select',
) );

$featured_slider_image_loader_options = clean_magazine_featured_slider_image_loader();
$choices = array();
foreach ( $featured_slider_image_loader_options as $featured_slider_image_loader_option ) {
	$choices[$featured_slider_image_loader_option['value']] = $featured_slider_image_loader_option['label'];
}

$wp_customize->add_control( 'clean_magazine_theme_options[featured_slider_image_loader]', array(
	'active_callback'	=> 'clean_magazine_is_slider_active',
	'choices'   => $choices,
	'label'    	=> __( 'Image Loader', 'clean-magazine' ),
	'priority'	=> '6',
	'section'  	=> 'clean_magazine_featured_slider',
	'settings' 	=> 'clean_magazine_theme_options[featured_slider_image_loader]',
	'type'    	=> 'select',
) );

$wp_customize->add_setting( 'clean_magazine_theme_options[featured_slider_type]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slider_type'],
	'sanitize_callback'	=> 'clean_magazine_sanitize_select',
) );

$featured_slider_types = clean_magazine_featured_slider_types();
$choices = array();
foreach ( $featured_slider_types as $featured_slider_type ) {
	$choices[$featured_slider_type['value']] = $featured_slider_type['label'];
}

$wp_customize->add_control( 'clean_magazine_theme_options[featured_slider_type]', array(
	'active_callback'	=> 'clean_magazine_is_slider_active',
	'choices'  	=> $choices,
	'label'    	=> __( 'Select Slider Type', 'clean-magazine' ),
	'priority'	=> '7',
	'section'  	=> 'clean_magazine_featured_slider',
	'settings' 	=> 'clean_magazine_theme_options[featured_slider_type]',
	'type'	  	=> 'select',
) );

$wp_customize->add_setting( 'clean_magazine_theme_options[featured_slide_number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slide_number'],
	'sanitize_callback'	=> 'clean_magazine_sanitize_number_range',
) );

$wp_customize->add_control( 'clean_magazine_theme_options[featured_slide_number]' , array(
	'active_callback'	=> 'clean_magazine_is_demo_slider_inactive',
	'description'	=> __( 'Save and refresh the page if No. of Slides is changed (Max no of slides is 20)', 'clean-magazine' ),
	'input_attrs' 	=> array(
        'style' => 'width: 45px;',
        'min'   => 0,
        'max'   => 20,
        'step'  => 1,
    	),
	'label'    		=> __( 'No of Slides', 'clean-magazine' ),
	'priority'		=> '8',
	'section'  		=> 'clean_magazine_featured_slider',
	'settings' 		=> 'clean_magazine_theme_options[featured_slide_number]',
	'type'	   		=> 'number',
	'transport'		=> 'postMessage'
	)
);

//loop for featured page sliders
for ( $i=1; $i <= $options['featured_slide_number'] ; $i++ ) {
	$wp_customize->add_setting( 'clean_magazine_theme_options[featured_slider_page_'. $i .']', array(
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'clean_magazine_sanitize_page',
	) );

	$wp_customize->add_control( 'clean_magazine_theme_options[featured_slider_page_'. $i .']', array(
		'active_callback'	=> 'clean_magazine_is_page_slider_active',
		'label'    	=> __( 'Featured Page', 'clean-magazine' ) . ' # ' . $i ,
		'priority'	=> '11' . $i,
		'section'  	=> 'clean_magazine_featured_slider',
		'settings' 	=> 'clean_magazine_theme_options[featured_slider_page_'. $i .']',
		'type'	   	=> 'dropdown-pages',
	) );
}
// Featured Slider End