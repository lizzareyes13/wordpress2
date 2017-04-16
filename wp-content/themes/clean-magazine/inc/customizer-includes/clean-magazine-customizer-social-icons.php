<?php
/**
 * The template for Social Links in Customizer
 *
 * @package Catch Themes
 * @subpackage Clean Magazine
 * @since Clean Magazine 0.2
 */

// Social Icons
$wp_customize->add_section( 'clean_magazine_social_links', array(
	'priority' => 700,
	'title'    => __( 'Social Links', 'clean-magazine' ),
) );

$clean_magazine_social_icons 	=	clean_magazine_get_social_icons_list();

foreach ( $clean_magazine_social_icons as $key => $value ){
	if( 'skype_link' == $key ){
		$wp_customize->add_setting( 'clean_magazine_theme_options['. $key .']', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback' => 'esc_attr',
			) );

		$wp_customize->add_control( 'clean_magazine_theme_options['. $key .']', array(
			'description'	=> __( 'Skype link can be of formats:<br>callto://+{number}<br> skype:{username}?{action}. More Information in readme file', 'clean-magazine' ),
			'label'    		=> $value['label'],
			'section'  		=> 'clean_magazine_social_links',
			'settings' 		=> 'clean_magazine_theme_options['. $key .']',
			'type'	   		=> 'url',
		) );
	}
	else {
		if( 'email_link' == $key ){
			$wp_customize->add_setting( 'clean_magazine_theme_options['. $key .']', array(
					'capability'		=> 'edit_theme_options',
					'sanitize_callback' => 'sanitize_email',
				) );
		}
		else if( 'handset_link' == $key || 'phone_link' == $key ){
			$wp_customize->add_setting( 'clean_magazine_theme_options['. $key .']', array(
					'capability'		=> 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				) );
		}
		else {
			$wp_customize->add_setting( 'clean_magazine_theme_options['. $key .']', array(
					'capability'		=> 'edit_theme_options',
					'sanitize_callback' => 'esc_url_raw',
				) );
		}

		$wp_customize->add_control( 'clean_magazine_theme_options['. $key .']', array(
			'label'    => $value['label'],
			'section'  => 'clean_magazine_social_links',
			'settings' => 'clean_magazine_theme_options['. $key .']',
			'type'	   => 'url',
		) );
	}
}
// Social Icons End