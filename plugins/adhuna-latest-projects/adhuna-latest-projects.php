<?php
/*
Plugin Name:  Adhuna Architects Latest Projects
Plugin URI:   http://adhunaarchitects.com/adhuna-latest-projects/
Description:  Shows latest project of Adhuna Architects
Version:      1.0.0
Author:       Manzur Ahmed
Author URI:   http://www.webtechriser.com
License:      GPL2
License URI:  http://www.webtechriser.com
Text Domain:  adhunaa-latpro
Domain Path:  /languages
*/

class AdhunaLatestProjects extends WP_Widget
{
	var $defaults;		// default values
	var $bools_false;	// key names of bool variables of value 'false'
	var $bools_true;	// key names of bool variables of value 'true'
	var $ints;			// key names of integer variables of any value
	var $customs;		// user defined values

    public function __construct() {

		$widget_name = 'Adhuna Architects Latest Projects';
		$widget_desc = 'Display most recent projects with title and thumbnail in the website.';

		$this->defaults[ 'category_ids' ]		= array( 0 ); // selected categories
		$this->defaults[ 'category_label' ]		= _x( 'In', '{categories}', 'adhunaa-latpro' ); // label for category list
		$this->defaults[ 'css_file_path' ]		= dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'public.css'; // path of the public css file
		$this->defaults[ 'number_posts' ]		= 4; // number of posts to show in the widget
		$this->defaults[ 'plugin_slug' ]		= 'adhuna-latest-projects'; // identifier of this plugin for WP
		$this->defaults[ 'plugin_version' ]		= '1.0.0'; // number of current plugin version
		$this->defaults[ 'site_protocol' ]		= ( is_ssl() ) ? 'https' : 'http'; // HTTP type of WP site
		$this->defaults[ 'site_url' ]			= home_url(); // URL of the current site
		$this->defaults[ 'widget_title' ]		= ''; // title of the widget
		$this->ints = array( 'number_posts' );

		$widget_ops = array( 'classname' => $this->defaults[ 'plugin_slug' ], 'description' => $widget_desc );
		parent::__construct( $this->defaults[ 'plugin_slug' ], $widget_name, $widget_ops );

		add_action( 'admin_init',	array( $this, 'load_plugin_textdomain' ) );
		add_action( 'save_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( $this, 'flush_widget_cache' ) );
		add_action( 'wp_enqueue_scripts',	array( $this, 'enqueue_public_style' ) );

		// not in use, just for the po-editor to display the translation on the plugins overview list
		$widget_name = __( 'Adhuna Architects Latest Projects', 'adhunaa-latpro' );
		$widget_desc = __( 'Display most recent projects with title and thumbnail in the website.', 'adhunaa-latpro' );
    }

    
	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'adhunaa-latpro', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	
  	public function widget( $args, $instance )
	{
		global $post;
		
		if ( ! isset( $args[ 'widget_id' ] ) ) {
			$args[ 'widget_id' ] = $this->id;
		}

		// get and sanitize values
		$title	= ( !empty( $instance[ 'title' ] ) ) ? $instance[ 'title' ] : $this->defaults[ 'widget_title' ];
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$category_ids = ( ! empty( $instance[ 'category_ids' ] ) ) ? array_map( 'absint', $instance[ 'category_ids' ] )	: $this->defaults[ 'category_ids' ];

		// initialize integer variables
		$ints = array();
		foreach ( $this->ints as $key ) {
			$ints[ $key ] = ( ! empty( $instance[ $key ] ) ) ? absint( $instance[ $key ] ) : $this->defaults[ $key ];
		}

		// if 'all categories' was selected ignore other selections of categories
		if ( in_array( 0, $category_ids ) ) {
			$category_ids = $this->defaults[ 'category_ids' ];
		}

		// print_r($category_ids);
		// echo 'Post per page: ' . $ints[ 'number_posts' ];

		// standard params
		$query_args = array(
			'posts_per_page' => $ints[ 'number_posts' ],
			'no_found_rows' => true,
			'post_status' => 'publish',
			'post_type'	=> 'projects',
		);

		$query_args[ 'order' ] = 'DESC';

		// add categories param only if 'all categories' was not selected
		if ( ! in_array( 0, $category_ids ) ) {
			$query_args[ 'category__in' ] = $category_ids;
		}

		// run the query: get the latest posts
		$r = new WP_Query( apply_filters( 'adhunaa_latpro_args', $query_args ) );

		if ( $r->have_posts()) :

			// print list
			include 'includes/widget.php';

			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();
		
		else:

			echo '<p>No projects found</p>';

		endif;
    }

	/*
	* Widget value update
	*/
	public function update( $new_widget_settings, $old_widget_settings )
	{
		$instance = $old_widget_settings;
		// sanitize user input before update
		$instance[ 'title' ] = ( isset( $new_widget_settings[ 'title' ] ) )	
			? strip_tags( $new_widget_settings[ 'title' ] ) 
			: $this->defaults[ 'widget_title' ];
		$instance[ 'category_ids' ] = ( isset( $new_widget_settings[ 'category_ids' ] ) ) 
			? array_map( 'absint', $new_widget_settings[ 'category_ids' ] )
			: $this->defaults[ 'category_ids' ];
		
		// initialize integer variables
		foreach ( $this->ints as $key ) {
			$instance[ $key ] = ( isset( $new_widget_settings[ $key ] ) ) ? absint( $new_widget_settings[ $key ] ) : $this->defaults[ $key ];
		}

		// empty widget cache
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions[ $this->defaults[ 'plugin_slug' ] ] ) ) {
			delete_option( $this->defaults[ 'plugin_slug' ] );
		}

		// return sanitized current widget settings
		return $instance;
	}

	// Cleans widget cache
    public function flush_widget_cache() {
		wp_cache_delete( $this->defaults[ 'plugin_slug' ], 'widget' );
	}

	// Widget options form
	public function form( $instance ) {

		// get and sanitize values
		$title = ( isset( $instance[ 'title' ] ) )
			? $instance[ 'title' ] : $this->defaults[ 'widget_title' ];
		$category_ids = ( isset( $instance[ 'category_ids' ] ) )
			? $instance[ 'category_ids' ] : $this->defaults[ 'category_ids' ];
		
		// initialize integer variables
		$ints = array();
		foreach ( $this->ints as $key ) {
			$ints[ $key ] = ( isset( $instance[ $key ] ) ) ? absint( $instance[ $key ] ) : $this->defaults[ $key ];
		}

		// compute ids only once to improve performance
		$field_ids = array();
		$field_ids[ 'category_ids' ]	= $this->get_field_id( 'category_ids' );
		$field_ids[ 'title' ]			= $this->get_field_id( 'title' );

		foreach ( $this->ints as $key ) {
			$field_ids[ $key ] = $this->get_field_id( $key );
		}

		// get texts and values for categories dropdown
		#$none_text = 'All Categories';
		$all_text = 'All Categories';
		$label_all_cats = __( $all_text, 'adhunaa-latpro' );

		// get categories
		$categories = get_categories( array( 'hide_empty' => 0, 'hierarchical' => 1 ) );
		$number_of_cats = count( $categories );

		// get size (number of rows to display) of selection box: not more than 10
		$number_of_rows = ( 10 > $number_of_cats ) ? $number_of_cats + 1 : 10;

		// start selection box
		$selection_element = sprintf(
			'<select name="%s[]" id="%s" class="adhuna-projects-cat-select" multiple size="%d">',
			$this->get_field_name( 'category_ids' ),
			$field_ids[ 'category_ids' ],
			$number_of_rows
		);
		$selection_element .= "\n";

		// make selection box entries
		$cat_list = array();
		if ( 0 < $number_of_cats ) {

			// make a hierarchical list of categories
			while ( $categories ) {
				// go on with the first element in the categories list:
				// if there is no parent
				if ( '0' == $categories[ 0 ]->parent ) {
					// get and remove it from the categories list
					$current_entry = array_shift( $categories );
					// append the current entry to the new list
					$cat_list[] = array(
						'id'	=> absint( $current_entry->term_id ),
						'name'	=> esc_html( $current_entry->name ),
						'depth'	=> 0
					);
					// go on looping
					continue;
				}
				// if there is a parent:
				// try to find parent in new list and get its array index
				$parent_index = $this->get_cat_parent_index( $cat_list, $categories[ 0 ]->parent );
				// if parent is not yet in the new list: try to find the parent later in the loop
				if ( false === $parent_index ) {
					// get and remove current entry from the categories list
					$current_entry = array_shift( $categories );
					// append it at the end of the categories list
					$categories[] = $current_entry;
					// go on looping
					continue;
				}
				// if there is a parent and parent is in new list:
				// set depth of current item: +1 of parent's depth
				$depth = $cat_list[ $parent_index ][ 'depth' ] + 1;
				// set new index as next to parent index
				$new_index = $parent_index + 1;
				// find the correct index where to insert the current item
				foreach( $cat_list as $entry ) {
					// if there are items with same or higher depth than current item
					if ( $depth <= $entry[ 'depth' ] ) {
						// increase new index
						$new_index = $new_index + 1;
						// go on looping in foreach()
						continue;
					}
					// if the correct index is found:
					// get current entry and remove it from the categories list
					$current_entry = array_shift( $categories );
					// insert current item into the new list at correct index
					$end_array = array_splice( $cat_list, $new_index ); // $cat_list is changed, too
					$cat_list[] = array(
						'id'	=> absint( $current_entry->term_id ),
						'name'	=> esc_html( $current_entry->name ),
						'depth'	=> $depth
					);
					$cat_list = array_merge( $cat_list, $end_array );
					// quit foreach(), go on while-looping
					break;
				} // foreach( cat_list )
			} // while( categories )

			// make HTML of selection box
			$selected = ( in_array( 0, $category_ids ) ) ? ' selected="selected"' : '';
			$selection_element .= "\t";
			$selection_element .= '<option value="0"' . $selected . '>' . $label_all_cats . '</option>';
			$selection_element .= "\n";

			foreach ( $cat_list as $category ) {
				$cat_name = apply_filters( 'adhuna_projects_list_cats', $category[ 'name' ], $category );
				$pad = ( 0 < $category[ 'depth' ] ) ? str_repeat('&ndash;&nbsp;', $category[ 'depth' ] ) : '';
				$selection_element .= "\t";
				$selection_element .= '<option value="' . $category[ 'id' ] . '"';
				$selection_element .= ( in_array( $category[ 'id' ], $category_ids ) ) ? ' selected="selected"' : '';
				$selection_element .= '>' . $pad . $cat_name . '</option>';
				$selection_element .= "\n";
			}
		}

		// close selection box
		$selection_element .= "</select>\n";

		// print form in widgets page
		include 'includes/form.php';
	}


	/**
	 * Return the array index of a given ID
	 *
	 * @since 4.1
	 */
	private function get_cat_parent_index( $arr, $id ) {
		$len = count( $arr );
		if ( 0 == $len ) {
			return false;
		}
		$id = absint( $id );
		for ( $i = 0; $i < $len; $i++ ) {
			if ( $id == $arr[ $i ][ 'id' ] ) {
				return $i;
			}
		}
		return false; 
	}

	/*
	* Enqueue style for public view
	*/
	public function enqueue_public_style () {
			
		// enqueue the style if there is a file
		wp_enqueue_style(
			$this->defaults[ 'plugin_slug' ] . '-public-style',
			plugin_dir_url( __FILE__ ) . 'public.css',
			array(),
			$this->defaults[ 'plugin_version' ],
			'all' 
		);
	}
		
	/*
	* Construct CSS file
	*/
	private function make_css_file () {
		$success = true;

		return $success;
	}
}


/**
 * Register widget on init
 *
 * @since 1.0
 */
function register_adhuna_latest_rojects () {
	register_widget( 'AdhunaLatestProjects' );
}
add_action( 'widgets_init', 'register_adhuna_latest_rojects', 1 );
