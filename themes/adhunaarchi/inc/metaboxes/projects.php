<?php

/*
* Metabox for Projects CPT using CodeStar framework
*/
function adhunaarchi_projects_metabox( $metaboxes ) {

	$metaboxes[] = array(
		'id' => 'adhunaarchi-projects-type',
		'title' => __( 'Projects Info', 'adhunaarchi' ),
		'post_type' => 'projects',
		'context' => 'normal',
		'priority' => 'default',
		'sections' => array(
			array(
				'name' => 'adhunaarchi-projects-section-one',
                'icon' => 'fa fa-image',
                'title' => "Info",
				'fields' => array(
					array(
						'id' => 'architect1',
						'title' => __( 'Architect Name 1', 'adhunaarchi' ),
						'type' => 'text',
                    ),
                    array(
						'id' => 'architect2',
						'title' => __( 'Architect Name 2', 'adhunaarchi' ),
						'type' => 'text',
                    ),
                    array(
						'id' => 'designer1',
						'title' => __( 'Designer Name 1', 'adhunaarchi' ),
						'type' => 'text',
                    ),
                    array(
						'id' => 'designer2',
						'title' => __( 'Designer Name 2', 'adhunaarchi' ),
						'type' => 'text',
					),
				)
            ),
            array(
                'name' => 'adhunaarchi-projects-section-two',
                'icon' => 'fa fa-image',
                'title' => 'Portfolio',
                'fields' => array(
                    array(
                        'id' => 'portfolio',
                        'type' => 'group',
                        'title' => __('Portfolio', 'adhunaarchi'),
                        'button_title' => __( 'New Image', 'adhunaarchi' ),
                        'accordion_title' => __( 'Add New Image', 'adhunaarchi' ),
                        'fields' => array(
                            array(
                                'id' => 'image',
                                'title' => __( 'Image', 'adhunaarchi' ),
                                'type' => 'image',
                            ),
                        )
                    ),
                )
            ),
		)
	);

	return $metaboxes;
}
add_filter( 'cs_metabox_options', 'adhunaarchi_projects_metabox' );
