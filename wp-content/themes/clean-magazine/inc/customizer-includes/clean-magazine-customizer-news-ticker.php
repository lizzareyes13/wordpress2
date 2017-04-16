<?php
/**
* The template for adding News Ticker Settings in Customizer
*
* @package Catch Themes
* @subpackage Clean Magazine Pro
* @since Clean Magazine 0.2
*/
// News Ticker Options

if ( 4.3 > get_bloginfo( 'version' ) ) {
	$wp_customize->add_panel( 'clean_magazine_news_ticker_options', array(
	    'capability'     => 'edit_theme_options',
		'description'    => __( 'News Ticker Options', 'clean-magazine' ),
	    'priority'       => 400,
	    'title'    		 => __( 'News Ticker', 'clean-magazine' ),
	) );


	$wp_customize->add_section( 'clean_magazine_news_ticker_settings', array(
		'panel'			=> 'clean_magazine_news_ticker_options',
		'priority'		=> 1,
		'title'			=> __( 'News Ticker Options', 'clean-magazine' ),
	) );
}
else {
	$wp_customize->add_section( 'clean_magazine_news_ticker_settings', array(
		'priority'      => 400,
		'title'			=> __( 'News Ticker', 'clean-magazine' ),
	) );
}

$wp_customize->add_setting( 'clean_magazine_theme_options[news_ticker_option]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['news_ticker_option'],
	'sanitize_callback' => 'clean_magazine_sanitize_select',
) );

$clean_magazine_featured_slider_content_options = clean_magazine_featured_slider_content_options();
$choices = array();
foreach ( $clean_magazine_featured_slider_content_options as $clean_magazine_featured_slider_content_option ) {
	$choices[$clean_magazine_featured_slider_content_option['value']] = $clean_magazine_featured_slider_content_option['label'];
}

$wp_customize->add_control( 'clean_magazine_theme_options[news_ticker_option]', array(
	'choices'  	=> $choices,
	'label'    	=> __( 'Enable News Ticker on', 'clean-magazine' ),
	'priority'	=> '1',
	'section'  	=> 'clean_magazine_news_ticker_settings',
	'settings' 	=> 'clean_magazine_theme_options[news_ticker_option]',
	'type'	  	=> 'select',
) );

$wp_customize->add_setting( 'clean_magazine_theme_options[news_ticker_position]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['news_ticker_position'],
	'sanitize_callback'	=> 'clean_magazine_sanitize_select',
) );

$clean_magazine_news_ticker_positions = clean_magazine_news_ticker_positions();
$choices = array();
foreach ( $clean_magazine_news_ticker_positions as $clean_magazine_news_ticker_position ) {
	$choices[$clean_magazine_news_ticker_position['value']] = $clean_magazine_news_ticker_position['label'];
}

$wp_customize->add_control( 'clean_magazine_theme_options[news_ticker_position]', array(
	'active_callback'	=> 'clean_magazine_is_news_ticker_active',
	'choices'  	=> $choices,
	'label'    	=> __( 'News Ticker Position', 'clean-magazine' ),
	'priority'	=> '3',
	'section'  	=> 'clean_magazine_news_ticker_settings',
	'settings' 	=> 'clean_magazine_theme_options[news_ticker_position]',
	'type'	  	=> 'select',
) );

$wp_customize->add_setting( 'clean_magazine_theme_options[news_ticker_transition_effect]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['news_ticker_transition_effect'],
	'sanitize_callback'	=> 'clean_magazine_sanitize_select',
) );

$clean_magazine_news_ticker_transition_effects = clean_magazine_featured_slide_transition_effects();
$choices = array();
foreach ( $clean_magazine_news_ticker_transition_effects as $clean_magazine_news_ticker_transition_effect ) {
	$choices[$clean_magazine_news_ticker_transition_effect['value']] = $clean_magazine_news_ticker_transition_effect['label'];
}

$wp_customize->add_control( 'clean_magazine_theme_options[news_ticker_transition_effect]' , array(
	'active_callback' => 'clean_magazine_is_news_ticker_active',
	'choices'         => $choices,
	'label'           => __( 'Transition Effect', 'clean-magazine' ),
	'priority'        => '4',
	'section'         => 'clean_magazine_news_ticker_settings',
	'settings'        => 'clean_magazine_theme_options[news_ticker_transition_effect]',
	'type'            => 'select',
	)
);

$wp_customize->add_setting( 'clean_magazine_theme_options[news_ticker_type]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['news_ticker_type'],
	'sanitize_callback'	=> 'clean_magazine_sanitize_select',
) );

$clean_magazine_news_ticker_types = clean_magazine_news_ticker_types();
$choices = array();
foreach ( $clean_magazine_news_ticker_types as $clean_magazine_news_ticker_type ) {
	$choices[$clean_magazine_news_ticker_type['value']] = $clean_magazine_news_ticker_type['label'];
}

$wp_customize->add_control( 'clean_magazine_theme_options[news_ticker_type]', array(
	'active_callback'	=> 'clean_magazine_is_news_ticker_active',
	'choices'  	=> $choices,
	'label'    	=> __( 'Select Ticker Type', 'clean-magazine' ),
	'priority'	=> '3',
	'section'  	=> 'clean_magazine_news_ticker_settings',
	'settings' 	=> 'clean_magazine_theme_options[news_ticker_type]',
	'type'	  	=> 'select',
) );

$wp_customize->add_setting( 'clean_magazine_theme_options[news_ticker_label]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['news_ticker_label'],
	'sanitize_callback'	=> 'wp_kses_post',
) );

$wp_customize->add_control( 'clean_magazine_theme_options[news_ticker_label]' , array(
	'active_callback' => 'clean_magazine_is_demo_news_ticker_inactive',
	'description'     => __( 'Leave field empty if you want to remove Headline', 'clean-magazine' ),
	'label'           => __( 'News Ticker Label', 'clean-magazine' ),
	'priority'        => '4',
	'section'         => 'clean_magazine_news_ticker_settings',
	'settings'        => 'clean_magazine_theme_options[news_ticker_label]',
	'type'            => 'text',
	)
);

$wp_customize->add_setting( 'clean_magazine_theme_options[news_ticker_number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['news_ticker_number'],
	'sanitize_callback'	=> 'clean_magazine_sanitize_number_range',
) );

$wp_customize->add_control( 'clean_magazine_theme_options[news_ticker_number]' , array(
	'active_callback'	=> 'clean_magazine_is_demo_news_ticker_inactive',
	'description'	=> __( 'Save and refresh the page if No. of News Ticker is changed (Max no of News Ticker is 20)', 'clean-magazine' ),
	'input_attrs' 	=> array(
        'style' => 'width: 45px;',
        'min'   => 0,
        'max'   => 20,
        'step'  => 1,
    	),
	'label'    		=> __( 'No of News Ticker', 'clean-magazine' ),
	'priority'		=> '6',
	'section'  		=> 'clean_magazine_news_ticker_settings',
	'settings' 		=> 'clean_magazine_theme_options[news_ticker_number]',
	'type'	   		=> 'number',
	'transport'		=> 'postMessage'
	)
);

for ( $i=1; $i <=  $options['news_ticker_number'] ; $i++ ) {
	//Page News Ticker
	$wp_customize->add_setting( 'clean_magazine_theme_options[news_ticker_page_'. $i .']', array(
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'clean_magazine_sanitize_page',
	) );

	$wp_customize->add_control( 'clean_magazine_news_ticker_page_'. $i .'', array(
		'active_callback' => 'clean_magazine_is_page_news_ticker_active',
		'label'           => __( 'Page', 'clean-magazine' ) . ' ' . $i ,
		'section'         => 'clean_magazine_news_ticker_settings',
		'settings'        => 'clean_magazine_theme_options[news_ticker_page_'. $i .']',
		'type'            => 'dropdown-pages',
	) );
}
// News Ticker Setting End