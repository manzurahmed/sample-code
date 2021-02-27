<?php
function adhunaarchi_custom_css()
{
	// Background Image in Hero section from CodeStar options
	$adhunaarchi_wework_bg_img = cs_get_option('wework_bg_image');
	
	if( isset( $adhunaarchi_wework_bg_img ) ) {
		$adhunaarchi_wework_bg_full_image = wp_get_attachment_image_src( $adhunaarchi_wework_bg_img, 'full' );
	}

	// Load Custom CSS file
	wp_enqueue_style(
		'adhunaarchi-custom',
		get_template_directory_uri().'/assets/css/custom.css'
	);

	$custom_css = '';
	$custom_css .= '
		.wework.wework-bg::after { background-image: url(' . $adhunaarchi_wework_bg_full_image[0] . '); background-size: cover; background-position: center; background-color: #333; content: ""; position: absolute; left: 11%; top: 0; height: 100%; width: 39%; z-index: -1; }';

	//
	$custom_css .= '
		
	';

	//var_dump($custom_css);

	wp_add_inline_style('adhunaarchi-custom', $custom_css);
}
add_action('wp_enqueue_scripts', 'adhunaarchi_custom_css');

