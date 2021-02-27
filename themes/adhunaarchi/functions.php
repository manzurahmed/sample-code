<?php
/**
 * adhunaarchi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package adhunaarchi
 */

// Load CodeStar Framework
require_once get_theme_file_path( "/lib/cs-framework/cs-framework.php" );
// Load CodeStar-based Theme-wide Metaboxes
require_once get_theme_file_path( "/inc/metaboxes/admin.php" );
// Load CodeStar-based Metaboxes for Projects CPT
require_once get_theme_file_path( "/inc/metaboxes/projects.php" );

// Initialize CodeStar features
define( 'CS_ACTIVE_FRAMEWORK',   true  ); // default true
define( 'CS_ACTIVE_METABOX',     true ); // default true
define( 'CS_ACTIVE_TAXONOMY',    false ); // default true
define( 'CS_ACTIVE_SHORTCODE',   false ); // default true
define( 'CS_ACTIVE_CUSTOMIZE',   false ); // default true

/*
* Codestar Initialization
*/
function adhunaarchi_codestar_init() {
	CSFramework_Metabox::instance( array() );
}
add_action( 'init', 'adhunaarchi_codestar_init' );


// Find version of WP. We will add it to the assets
if( site_url() == 'http://localhost/alpha' ) {
	define( 'VERSION', time() );
}
else {
define( 'VERSION', wp_get_theme()->get("Version") );
}

// Pluggable function
if ( ! function_exists( 'adhunaarchi_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function adhunaarchi_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on adhunaarchi, use a find and replace
		 * to change 'adhunaarchi' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'adhunaarchi', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'adhunaarchi' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'adhunaarchi_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// For projects
		add_image_size( "adhunaarchi_project_portrait", 480, 760, true );
	}
endif;
add_action( 'after_setup_theme', 'adhunaarchi_setup' );

/*
 * Remove WordPress Generator Tag
 */
function adhunaarchi_remove_version() {
	return '';
}
add_filter('the_generator', 'adhunaarchi_remove_version');


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function adhunaarchi_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'adhunaarchi_content_width', 640 );
}
add_action( 'after_setup_theme', 'adhunaarchi_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function adhunaarchi_widgets_init() {
	register_sidebar(
		array(
			'name'					=> __( "Footer Left Sidebar", 'adhunaarchi' ),
			'id'					=> 'footer-left',
			'description'			=> __( 'Footer Left Sidebar', 'adhunaarchi' ),
			'before_widget'			=> '<section id="%1$s" class="widget %2$s">',
			'after_widget'			=> '</section>',
			'before_title'			=> '<h4>',
			'after_title'			=> '</h4>'
		)
	);

	register_sidebar(
		array(
			'name'					=> __( "Contact Info", 'adhunaarchi' ),
			'id'					=> 'contact-us',
			'description'			=> __( 'Contact Info Sidebar', 'adhunaarchi' ),
			'before_widget'			=> '<section id="%1$s" class="widget contact %2$s">',
			'after_widget'			=> '</section>',
			'before_title'			=> '<h4>',
			'after_title'			=> '</h4>'
		)
	);

	register_sidebar(
		array(
			'name'					=> __( "Quick Links", 'adhunaarchi' ),
			'id'					=> 'quick-links',
			'description'			=> __( 'Quick Links Sidebar', 'adhunaarchi' ),
			'before_widget'			=> '<section id="%1$s" class="widget qlinks %2$s">',
			'after_widget'			=> '</section>',
			'before_title'			=> '<h4>',
			'after_title'			=> '</h4>'
		)
	);

	register_sidebar( array(
		'name'          => esc_html__( 'Adhuna Latest Projects', 'adhunaarchi' ),
		'id'            => 'adhuna-lat-proj',
		'description'   => esc_html__( 'Add Latest Projects widgets here.', 'adhunaarchi' ),
		'before_widget' => '<section id="%1$s" class="%2$s widget">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="latest-projects-widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'adhunaarchi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function adhunaarchi_scripts() {

	// Bootstrap
	wp_enqueue_style( 'bootstrap', get_theme_file_uri('/assets/css/bootstrap.min.css'), null, '4.1.1', 'all');
	// Slicknav
	wp_enqueue_style( 'slicknav', get_theme_file_uri('/assets/css/slicknav.min.css'), null, '1.0.10', 'all');
	// Styling specific to AdhunaArchi Theme
	wp_enqueue_style( 'adhunaarchi-style', get_template_directory_uri().'/assets/css/adhunaarchi.min.css', null, '1.0', 'all');
	// Styling command/default
	wp_enqueue_style( 'adhunaarchi-default', get_theme_file_uri('/assets/css/default.min.css'), null, '1.0', 'all');
	// Fontawesome
	wp_enqueue_style( 'fontawesome', get_theme_file_uri('/assets/css/font-awesome.min.css'), null, '4.7.0', 'all');

	// Load theme style.css
	wp_enqueue_style( 'adhunaarchi', get_stylesheet_uri(), null, VERSION );

	wp_enqueue_script( 'popper', get_theme_file_uri('/assets/js/popper.min.js'), array('jquery'), '4.1.1', true );
	wp_enqueue_script( 'bootstrap', get_theme_file_uri('/assets/js/bootstrap.min.js'), array('jquery'), '4.1.1', true );
	wp_enqueue_script( 'sticky', get_theme_file_uri('/assets/js/jquery.sticky.min.js'), array('jquery'), '1.0.4', false );
	wp_enqueue_script( 'slicknav', get_theme_file_uri('/assets/js/jquery.slicknav.min.js'), array('jquery'), '1.0.10', true );
	wp_enqueue_script( 'adhunaarchi-active', get_theme_file_uri('/assets/js/active.js'), array('jquery'), VERSION, true );

	// Waypoint, CounterUp works on the front page
	if( is_home() && !is_single() ):
	wp_enqueue_script( 'waypoint-js', 'https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js', array('jquery'), '2.0.3', true );
	wp_enqueue_script( 'counterup-js', get_theme_file_uri('/assets/js/jquery.counterup.min.js'), array('jquery'), '1.0', true );
	wp_enqueue_script( 'initcounterup-js', get_theme_file_uri('/assets/js/initcounterup.min.js'), array('jquery'), VERSION, true );
	endif;

	// Load Portfolio CSS, IsoTop on Portfolio page only
	if( is_page( array( 'portfolio' ) ) ):
	wp_enqueue_style( 'portfolio', get_template_directory_uri().'/assets/css/portfolio.css', null, '1.0', 'all');
	wp_enqueue_script( 'isotope', get_theme_file_uri('/assets/js/jquery.isotop.3.0.5.min.js'), array('jquery'), '3.0.5', true );
	wp_enqueue_script( 'portfolio-js', get_theme_file_uri('/assets/js/portfolio.js'), array(), VERSION, true );
	endif;

	// Load OwlCarousel on Projects Single page only
	if ( is_singular( 'projects' ) ):
	wp_enqueue_style( 'owlcarousel', get_theme_file_uri('/assets/css/owl.carousel.min.css'), null, '2.3.4', 'all');
	wp_enqueue_script( 'owlcarousel', get_theme_file_uri('/assets/js/owl.carousel.min.js'), array('jquery'), '2.3.4', true );
	wp_enqueue_script( 'initowl-js', get_theme_file_uri('/assets/js/initowl.min.js'), array('jquery'), VERSION, true );
	endif;

	// Load GoogleMap Lib on "Contact Us" page
	if( is_page( array( 'contact-us' ) ) ):
	wp_enqueue_script( 'gmap3', get_theme_file_uri('/assets/js/gmap3.min.js'), array('jquery'), '7.2.0', true );
    wp_enqueue_script( 'gmap', get_theme_file_uri('/assets/js/map.js'), array(), '1.0.0', true );
    // Google Map
	wp_enqueue_script( 'google-api', "https://maps.googleapis.com/maps/api/js?key=AIzaSyBBWsJ5xbR44-O3-FSIYJWdSsVuArg1CWs&callback=myMap", array(), null, true );
    endif;

	// Load Main JS
  	wp_enqueue_script( 'mainjs', get_theme_file_uri('/assets/js/main.min.js'), array('jquery'), VERSION, true );

	// Standard Navigation, Skip link JS
	wp_enqueue_script( 'adhunaarchi-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), VERSION, true );
	wp_enqueue_script( 'adhunaarchi-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), VERSION, true );

	// Load comment JS interaction on Single page, availability of comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'adhunaarchi_scripts' );


/*
* Highlight search terms, but, NOT in the Admin area
*/
function adhunaarchi_highlight_search_results( $text )
{
	if( is_search() && !is_admin() )
	{
		// the regex pattern is: /(hello|world)/i
		$pattern = '/('. join('|', explode(' ', get_search_query() ) ) . ')/i';
		$text = preg_replace( $pattern, '<span class="search-highlight">\0</span>', $text );
	}
	return $text;
}
add_filter( 'the_content', 'adhunaarchi_highlight_search_results' );
add_filter( 'the_excerpt', 'adhunaarchi_highlight_search_results' );
add_filter( 'the_title', 'adhunaarchi_highlight_search_results' );


/*
* Get rid of the “Category:”, “Tag:”, “Author:”, “Archives:” and “Other taxonomy name:” in the archive title
*/
function my_theme_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );

/*
* Add category name slug after CPT slug
*/
function adhunaarchi_cpt_slug_fix( $post_link, $id ) {

	$p = get_post( $id );

	// For project
	if( is_object( $p ) && 'projects' == get_post_type( $id )) {

		$cat = get_the_category( $p->ID );

		if( is_array( $cat ) && count( $cat ) > 0 ) {
			$slug = $cat[0]->slug;
			$post_link = str_replace( "%category%", $slug, $post_link );
		} else {
			$slug = 'generic';
			$post_link = str_replace( "%category%", $slug, $post_link );
		}
	}

	return $post_link;
}
add_filter( 'post_type_link', 'adhunaarchi_cpt_slug_fix', 1, 2 );


/*
* Add "custom class" to body_class
*/
function adhunaarchi_body_class( $classes )
{
	if(is_home()) {
		$classes[] = 'bg-gray';
	}

	return $classes;
}
add_filter( "body_class", "adhunaarchi_body_class" );


/**
 * my_terms_clauses
 *
 * filter the terms clauses
 *
 * @param $clauses array
 * @param $taxonomy string
 * @param $args array
 * @return array
 * @link http://wordpress.stackexchange.com/a/183200/45728
 **/
function my_terms_clauses( $clauses, $taxonomy, $args ) {
	global $wpdb;
	if ( $args['post_types'] ) {
		$post_types = $args['post_types'];
		// allow for arrays
		if ( is_array($args['post_types']) ) {
		$post_types = implode("','", $args['post_types']);
		}
		$clauses['join'] .= " INNER JOIN $wpdb->term_relationships AS r ON r.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN $wpdb->posts AS p ON p.ID = r.object_id";
		$clauses['where'] .= " AND p.post_type IN ('". esc_sql( $post_types ). "') GROUP BY t.term_id";
	}
	return $clauses;
}
add_filter('terms_clauses', 'my_terms_clauses', 99999, 3);


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/theme-style.php';

/*
 * Inject Google Analytics code inside Website header
 */
function adhunaarchi_ga_settings()
{
	if( !stripos( site_url(), 'localhost' ) ) {
		$adhunaarchi_googleanalytics_code = cs_get_option('ga_code');
		echo $adhunaarchi_googleanalytics_code;
	}
}
add_action( 'wp_head', 'adhunaarchi_ga_settings', 11 );
