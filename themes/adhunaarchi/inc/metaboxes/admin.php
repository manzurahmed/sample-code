<?php
if( !defined('ABSPATH') ) die;

// Theme Options of CodeStar framework in Admin
function adhunaarchi_theme_options( $options ) {

	// remove old options
	$options = array();

	/*
	* Hero Image for Frontpage options
	*/
	$options[] = array(
		'name' => 'home_page_hero_settings',
		'title' => __( 'Hero Image', 'adhunaarchi' ),
		'icon' => 'fa fa-image',
		'fields' => array(
			array(
				'id' => 'hero_image',
				'type' => 'image',
				'title' => __( 'Banner Image', 'adhunaarchi' ),
			),
		)
	);

	/*
	* Contact Details options
	*/
	$options[] = array(
		'name' => 'contact_details',
		'title' => 'Contact Details',
		'icon' => 'fa fa-address-card-o',
		'fields' => array(
			array(
				'id' => 'contact_details_one',
				'type' => 'group',
				'title' => __('Contact Details', 'adhunaarchi'),
				'button_title'    => __('Add New', 'adhunaarchi'),
				'accordion_title' => __('Add New Field', 'adhunaarchi'),
				'fields'          => array(
					array(
						'id'    => 'contact_icon',
						'type'  => 'icon',
						'title' => __('Select icon', 'adhunaarchi')
					),
					array(
						'id'    => 'contact_detail',
						'type'  => 'text',
						'title' => __('Contact Detail', 'adhunaarchi')
					),
				),
			),
			array(
				'id' => 'contact_details_address',
				'type' => 'textarea',
				'title' => __( 'Address', 'adhunaarchi' ),
			),
			array(
				'id' => 'contact_details_callus',
				'type' => 'text',
				'title' => __( 'Call Us Message', 'adhunaarchi' ),
			),
			array(
				'id' => 'contact_details_emailus',
				'type' => 'text',
				'title' => __( 'Email Us Message', 'adhunaarchi' ),
			),
			array(
				'id' => 'contact_details_schedulemeeting',
				'type' => 'text',
				'title' => __( 'Schdule Meeting Message', 'adhunaarchi' ),
			),
		)
	);

	/*
	* Quotes options
	*/
	$options[] = array(
		'name' => 'contact_quotes',
		'title' => 'Quotes',
		'icon' => 'fa fa-quote-left',
		'fields' => array(
			array(
				'id' => 'contact_quotes_1',
				'type' => 'textarea',
				'title' => __( 'Quote 1', 'adhunaarchi' ),
			),
			array(
				'id' => 'contact_quotes_author',
				'type' => 'text',
				'title' => __( 'Quote Author', 'adhunaarchi' ),
			),
			array(
				'id' => 'contact_quotes_2',
				'type' => 'textarea',
				'title' => __( 'Quote 2', 'adhunaarchi' ),
			),
		)
	);

	/*
	* How We Work options
	*/
	$options[] = array(
		'name' => 'contact_howwework',
		'title' => 'How We Work',
		'icon' => 'fa fa-cogs',
		'fields' => array(
			array(
				'id' => 'contact_section_subtitle',
				'type' => 'text',
				'title' => __( 'Section Sub-title', 'adhunaarchi' ),
			),
			array(
				'id' => 'contact_section_title',
				'type' => 'text',
				'title' => __( 'Section Title', 'adhunaarchi' ),
			),
			array(
				'id'          => 'contact_title_wposition',
				'type'        => 'select',
				'title'       => 'Title Emphasis Word Position',
				'placeholder' => 'Select word position',
				'options'     => array(
					'1'  => '1',
					'2'  => '2',
					'3'  => '3',
					'4'  => '4',
					'5'  => '5',
					'6'  => '6',
					'7'  => '7',
					'8'  => '8',
				),
				'default'     => '2'
			),
			array(
				'id' => 'contact_work1_title',
				'type' => 'text',
				'title' => __( 'Title 1', 'adhunaarchi' ),
			),
			array(
				'id' => 'contact_work1_text',
				'type' => 'text',
				'title' => __( 'Text 1', 'adhunaarchi' ),
			),
			array(
				'id' => 'contact_work2_title',
				'type' => 'text',
				'title' => __( 'Title 2', 'adhunaarchi' ),
			),
			array(
				'id' => 'contact_work2_text',
				'type' => 'text',
				'title' => __( 'Text 2', 'adhunaarchi' ),
			),
			array(
				'id' => 'contact_work3_title',
				'type' => 'text',
				'title' => __( 'Title 3', 'adhunaarchi' ),
			),
			array(
				'id' => 'contact_work3_text',
				'type' => 'text',
				'title' => __( 'Text 3', 'adhunaarchi' ),
			),
			array(
				'id' => 'contact_work4_title',
				'type' => 'text',
				'title' => __( 'Title 4', 'adhunaarchi' ),
			),
			array(
				'id' => 'contact_work4_text',
				'type' => 'text',
				'title' => __( 'Text 4', 'adhunaarchi' ),
			),
		)
	);

	/*
	* We Work Differently options
	*/
	$options[] = array(
		'name' => 'wework_differently',
		'title' => 'We Work Differently',
		'icon' => 'fa fa-expand',
		'fields' => array(
			array(
				'id' => 'wework_section_subtitle',
				'type' => 'text',
				'title' => __( 'Section Sub-title', 'adhunaarchi' ),
			),
			array(
				'id' => 'wework_section_title',
				'type' => 'text',
				'title' => __( 'Section Title', 'adhunaarchi' ),
			),
			array(
				'id' => 'wework_section_description',
				'type' => 'textarea',
				'title' => __( 'Description', 'adhunaarchi' ),
			),
			array(
				'id' => 'wework_bg_image',
				'type' => 'image',
				'title' => __( 'Background Image', 'adhunaarchi' ),
			),
			array(
				'id' => 'wework_details_works',
				'type' => 'group',
				'title' => __('Features', 'adhunaarchi'),
				'button_title'    => __('Add New', 'adhunaarchi'),
				'accordion_title' => __('Add New Field', 'adhunaarchi'),
				'fields'          => array(
					array(
						'id' => 'wework_work_title',
						'type' => 'text',
						'title' => __( 'Work title', 'adhunaarchi' ),
					),
					array(
						'id'    => 'wework_work_text',
						'type'  => 'textarea',
						'title' => __('Work Detail', 'adhunaarchi')
					),
				),
			),
		)
	);

	/*
	* Experise options
	*/
	$options[] = array(
		'name' => 'contact_expertise',
		'title' => 'Expertise',
		'icon' => 'fa fa-expand',
		'fields' => array(
			array(
				'id' => 'expertise_section_subtitle',
				'type' => 'text',
				'title' => __( 'Section Sub-title', 'adhunaarchi' ),
			),
			array(
				'id' => 'expertise_section_title',
				'type' => 'text',
				'title' => __( 'Section Title', 'adhunaarchi' ),
			),
			array(
				'id' => 'expertise_number1_number',
				'type' => 'text',
				'title' => __( 'Expertise 1 Number', 'adhunaarchi' ),
			),
			array(
				'id' => 'expertise_number1_text',
				'type' => 'text',
				'title' => __( 'Expertise 1 text', 'adhunaarchi' ),
			),
			array(
				'id' => 'expertise_number2_number',
				'type' => 'text',
				'title' => __( 'Expertise 2 Number', 'adhunaarchi' ),
			),
			array(
				'id' => 'expertise_number2_text',
				'type' => 'text',
				'title' => __( 'Expertise 2 text', 'adhunaarchi' ),
			),
			array(
				'id' => 'expertise_number3_number',
				'type' => 'text',
				'title' => __( 'Expertise 3 Number', 'adhunaarchi' ),
			),
			array(
				'id' => 'expertise_number3_text',
				'type' => 'text',
				'title' => __( 'Expertise 3 text', 'adhunaarchi' ),
			),
		)
	);

	/*
	* Clients options
	*/
	$options[] = array(
		'name' => 'clients',
		'title' => 'Clients',
		'icon' => 'fa fa-briefcase',
		'fields' => array(
			array(
				'id' => 'clients',
				'type' => 'group',
				'title' => __('Clients Profile', 'adhunaarchi'),
				'button_title'    => __('Add New', 'adhunaarchi'),
				'accordion_title' => __('Add New Client', 'adhunaarchi'),
				'fields'          => array(
					array(
						'id'    => 'title',
						'type'  => 'text',
						'title' => __('Client Name', 'adhunaarchi')
					),
					array(
						'id'    => 'logo',
						'type'  => 'image',
						'title' => __('Logo', 'adhunaarchi')
					),
				),
				
			)
		)
	);

	/*
	* Social links options
	*/
	$options[] = array(
		'name' => 'social',
		'title' => 'Social links',
		'icon' => 'fa fa-facebook',
		'fields' => array(
			array(
				'id' => 'socials',
				'type' => 'group',
				'title' => __('Social links', 'adhunaarchi'),
				'button_title'    => __('Add New', 'adhunaarchi'),
				'accordion_title' => __('Add New Field', 'adhunaarchi'),
				'fields'          => array(
					array(
						'id'    => 'icon',
						'type'  => 'icon',
						'title' => __('Select icon', 'adhunaarchi')
					),
					array(
						'id'    => 'link',
						'type'  => 'text',
						'title' => __('Link', 'adhunaarchi')
					),
				),
				
			)
		)
	);

	/*
	* Script settings options
	*/
	$options[] = array(
		'name' => 'adhunaarchi_scripts_settings',
		'title' => 'Script settings',
		'icon' => 'fa fa-code',
		'fields' => array(
			array(
				'id' => 'header_scripts',
				'type' => 'textarea',
				'sanitize' => false,
				'title' => __('Head scripts', 'adhunaarchi'),
				'desc' => __('Scripts goes before closing < / head >', 'adhunaarchi'),
			),
			array(
				'id' => 'body_end_scripts',
				'type' => 'textarea',
				'sanitize' => false,
				'title' => __('Footer scripts', 'adhunaarchi'),
				'desc' => __('Scripts goes just before closing < / body >', 'adhunaarchi'),
			),
			array(
				'id' => 'adhunaarchi_custom_css',
				'type' => 'textarea',
				'sanitize' => false,
				'title' => __('Custom CSS', 'adhunaarchi'),
				'desc' => __('Custom CSS goes here', 'adhunaarchi'),
			),
		)
	);
	
	/*
	* Google Analytics options
	*/
	$options[] = array(
		'name' => 'adhunaarchi_google_settings',
		'title' => 'Google settings',
		'icon' => 'fa fa-code',
		'fields' => array(
			array(
				'id' => 'ga_code',
				'type' => 'textarea',
				'sanitize' => false,
				'title' => __('Google Analytics Code', 'adhunaarchi'),
				'desc' => __('Paste the Google Analytics code here.', 'adhunaarchi'),
			),
		)
	);

	return $options;

}
add_filter( 'cs_framework_options', 'adhunaarchi_theme_options' );