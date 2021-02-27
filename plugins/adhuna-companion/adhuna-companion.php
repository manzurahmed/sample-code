<?php
/*
Plugin Name: Adhuna Companion Plugin
Plugin URI:
Description: Companion plugin for Adhuna Architects Theme
Version: 1.0
Author: Manzur Ahmed
Author URI: https://www.webtechriser.com
License: GPLv2 or later
Text Domain: adhunaa-companion
Domain Path: /languages/
*/

function adhunaa_load_text_domain(){
	load_plugin_textdomain( 'adhunaa-companion', false, dirname(__FILE__).'/languages' );
}
add_action( 'plugins_loaded', 'adhunaa_load_text_domain' );

function adhunaa_register_my_cpts_section() {

	/**
	 * Post Type: Recipes.
	 */

	$labels = array(
		"name" => __( "Projects", "Projects", "adhunaarchi" ),
		"singular_name" => __( "project", "Project", "adhunaarchi" ),
		'menu_name'          => _x( 'Projects', 'Projects', 'adhunaarchi' ),
		'name_admin_bar'     => _x( 'Project', 'Add new project', 'adhunaarchi' ),
		'add_new'            => _x( 'Add New', 'project', 'adhunaarchi' ),
		'add_new_item'       => __( 'Add New Project', 'adhunaarchi' ),
		'new_item'           => __( 'New Project', 'adhunaarchi' ),
		'edit_item'          => __( 'Edit Project', 'adhunaarchi' ),
		'view_item'          => __( 'View Project', 'adhunaarchi' ),
		'all_items'          => __( 'All Projects', 'adhunaarchi' ),
		'search_items'       => __( 'Search Projects', 'adhunaarchi' ),
		'parent_item_colon'  => __( 'Parent Projects:', 'adhunaarchi' ),
		'not_found'          => __( 'No projects found.', 'adhunaarchi' ),
		'not_found_in_trash' => __( 'No projects found in Trash.', 'adhunaarchi' ),
	);

	$args = array(
		"label" => __( "Projects", "adhunaarchi" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array(
			"slug" => "project/%category%",
			"with_front" => false
		),
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-building",
		"supports" => array( "title", "editor", "thumbnail" ),
		"taxonomies" => array("category")
	);

	register_post_type( "projects", $args );

}

add_action( 'init', 'adhunaa_register_my_cpts_section' );

