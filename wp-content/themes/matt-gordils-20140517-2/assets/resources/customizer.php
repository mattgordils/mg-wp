<?php 

function my_customizer( $wp_customize ) {
	//All our sections, settings, and controls will be added here
	$colors = array();
	$colors[] = array(
		'slug'=>'content_text_color', 
		'default' => '#333',
		'label' => __('Content Text Color')
	);
	$colors[] = array(
		'slug'=>'content_link_color', 
		'default' => '#1e0fbe',
		'label' => __('Content Link Color')
	);
	$colors[] = array(
		'slug'=>'content_link_hover_color', 
		'default' => '#ff0000',
		'label' => __('Content Link Hover Color')
	);
	$colors[] = array(
		'slug'=>'body_bg_color', 
		'default' => '#ffffff',
		'label' => __('Body Background Color')
	);
	foreach( $colors as $color ) {
		// SETTINGS
		$wp_customize->add_setting(
			$color['slug'], array(
				'default' => $color['default'],
				'type' => 'option', 
				'capability' => 
				'edit_theme_options'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$color['slug'], 
				array('label' => $color['label'], 
				'section' => 'colors',
				'settings' => $color['slug'])
			)
		);
	}
}// End Function
add_action( 'customize_register', 'my_customizer' );

?>