<?php
/**
* The template for adding Header Highlight Content in Customizer
*
* @package Catch Themes
* @subpackage Clean Magazine
* @since Clean Magazine 0.2
*/
// Header Highlight Content Options

$wp_customize->add_section( 'clean_magazine_header_highlight_content', array(
	'priority'      => 400,
	'title'			=> __( 'Header Highlight Content', 'clean-magazine' ),
) );

$wp_customize->add_setting( 'clean_magazine_theme_options[header_highlight_content_option]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['header_highlight_content_option'],
	'sanitize_callback' => 'clean_magazine_sanitize_select',
) );

$clean_magazine_featured_slider_content_options = clean_magazine_featured_slider_content_options();
$choices = array();
foreach ( $clean_magazine_featured_slider_content_options as $clean_magazine_featured_slider_content_option ) {
	$choices[$clean_magazine_featured_slider_content_option['value']] = $clean_magazine_featured_slider_content_option['label'];
}

$wp_customize->add_control( 'clean_magazine_theme_options[header_highlight_content_option]', array(
	'choices'  	=> $choices,
	'label'    	=> __( 'Enable Header Highlight Content on', 'clean-magazine' ),
	'priority'	=> '1',
	'section'  	=> 'clean_magazine_header_highlight_content',
	'settings' 	=> 'clean_magazine_theme_options[header_highlight_content_option]',
	'type'	  	=> 'select',
) );

$wp_customize->add_setting( 'clean_magazine_theme_options[header_highlight_content_type]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['header_highlight_content_type'],
	'sanitize_callback'	=> 'clean_magazine_sanitize_select',
) );

$clean_magazine_header_highlight_content_types = clean_magazine_header_highlight_content_types();
$choices = array();
foreach ( $clean_magazine_header_highlight_content_types as $clean_magazine_header_highlight_content_type ) {
	$choices[$clean_magazine_header_highlight_content_type['value']] = $clean_magazine_header_highlight_content_type['label'];
}

$wp_customize->add_control( 'clean_magazine_theme_options[header_highlight_content_type]', array(
	'active_callback' => 'clean_magazine_is_header_highlight_content_active',
	'choices'         => $choices,
	'label'           => __( 'Select Content Type', 'clean-magazine' ),
	'priority'        => '3',
	'section'         => 'clean_magazine_header_highlight_content',
	'settings'        => 'clean_magazine_theme_options[header_highlight_content_type]',
	'type'            => 'select',
) );

$wp_customize->add_setting( 'clean_magazine_theme_options[header_highlight_content_headline]', array(
	'capability'		=> 'edit_theme_options',
	'sanitize_callback'	=> 'wp_kses_post',
) );

$wp_customize->add_control( 'clean_magazine_theme_options[header_highlight_content_headline]' , array(
	'active_callback'	=> 'clean_magazine_is_header_highlight_content_active',
	'description'	=> __( 'Leave field empty if you want to remove Headline', 'clean-magazine' ),
	'label'    		=> __( 'Headline for Header Highlight Content', 'clean-magazine' ),
	'priority'		=> '4',
	'section'  		=> 'clean_magazine_header_highlight_content',
	'settings' 		=> 'clean_magazine_theme_options[header_highlight_content_headline]',
	'type'	   		=> 'text',
	)
);

$wp_customize->add_setting( 'clean_magazine_theme_options[header_highlight_content_subheadline]', array(
	'capability'		=> 'edit_theme_options',
	'sanitize_callback'	=> 'wp_kses_post',
) );

$wp_customize->add_control( 'clean_magazine_theme_options[header_highlight_content_subheadline]' , array(
	'active_callback'	=> 'clean_magazine_is_header_highlight_content_active',
	'description'	=> __( 'Leave field empty if you want to remove Sub-headline', 'clean-magazine' ),
	'label'    		=> __( 'Sub-headline for Header Highlight Content', 'clean-magazine' ),
	'priority'		=> '5',
	'section'  		=> 'clean_magazine_header_highlight_content',
	'settings' 		=> 'clean_magazine_theme_options[header_highlight_content_subheadline]',
	'type'	   		=> 'text',
	)
);

$wp_customize->add_setting( 'clean_magazine_theme_options[header_highlight_content_show]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['header_highlight_content_show'],
	'sanitize_callback'	=> 'clean_magazine_sanitize_select',
) );

$clean_magazine_header_highlight_content_show = clean_magazine_featured_content_show();
$choices = array();
foreach ( $clean_magazine_header_highlight_content_show as $clean_magazine_header_highlight_content_shows ) {
	$choices[$clean_magazine_header_highlight_content_shows['value']] = $clean_magazine_header_highlight_content_shows['label'];
}

$wp_customize->add_control( 'clean_magazine_theme_options[header_highlight_content_show]', array(
	'active_callback' => 'clean_magazine_is_demo_header_highlight_content_inactive',
	'choices'         => $choices,
	'label'           => __( 'Display Content', 'clean-magazine' ),
	'section'         => 'clean_magazine_header_highlight_content',
	'settings'        => 'clean_magazine_theme_options[header_highlight_content_show]',
	'type'            => 'select',
) );

$wp_customize->add_setting( 'clean_magazine_theme_options[header_highlight_content_number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['header_highlight_content_number'],
	'sanitize_callback'	=> 'clean_magazine_sanitize_number_range',
	'transport'			=> 'postMessage'
) );

$wp_customize->add_control( 'clean_magazine_theme_options[header_highlight_content_number]' , array(
		'active_callback' => 'clean_magazine_is_demo_header_highlight_content_inactive',
		'description'     => __( 'Save and refresh the page if No. of Header Highlight Content is changed (Max no of Header Highlight Content is 21)', 'clean-magazine' ),
		'input_attrs'     => array(
			'style' => 'width: 45px;',
			'min'   => 1,
			'max'   => 21,
			'step'  => 1,
		),
		'label'           => __( 'No of Header Highlight Content', 'clean-magazine' ),
		'priority'        => '6',
		'section'         => 'clean_magazine_header_highlight_content',
		'settings'        => 'clean_magazine_theme_options[header_highlight_content_number]',
		'type'            => 'number',
	)
);

$wp_customize->add_setting( 'clean_magazine_theme_options[header_highlight_content_hide_category]', array(
    'capability'		=> 'edit_theme_options',
	'sanitize_callback'	=> 'clean_magazine_sanitize_checkbox',
) );

//loop for content types
for ( $i=1; $i <=  $options['header_highlight_content_number'] ; $i++ ) {
	//Page Content
	$wp_customize->add_setting( 'clean_magazine_theme_options[header_highlight_content_page_'. $i .']', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback'	=> 'clean_magazine_sanitize_page',
	) );

	$wp_customize->add_control( 'clean_magazine_theme_options[header_highlight_content_page_'. $i .']', array(
		'active_callback' => 'clean_magazine_is_header_highlight_page_content_active',
		'label'           => __( 'Page Content', 'clean-magazine' ) . ' ' . $i ,
		'section'         => 'clean_magazine_header_highlight_content',
		'settings'        => 'clean_magazine_theme_options[header_highlight_content_page_'. $i .']',
		'type'            => 'dropdown-pages',
	) );
}
// Header Highlight Content Setting End