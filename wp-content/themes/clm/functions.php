<?php
/**
 * clm functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package clm
 */

if ( ! function_exists( 'clm_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function clm_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on clm, use a find and replace
		 * to change 'clm' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'clm', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'clm' ),
			'menu-2' => esc_html__( 'Mobile', 'clm' ),
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
		add_theme_support( 'custom-background', apply_filters( 'clm_custom_background_args', array(
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
	}
endif;
add_action( 'after_setup_theme', 'clm_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function clm_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'clm_content_width', 640 );
}
add_action( 'after_setup_theme', 'clm_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function clm_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'clm' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'clm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'clm_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function clm_scripts() {

	wp_enqueue_style( 'bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );

	wp_enqueue_style( 'fontawesome_css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

	wp_enqueue_style( '', '' );

	wp_enqueue_style( 'owl_css', get_template_directory_uri() . '/node_modules/owl.carousel/dist/assets/owl.carousel.min.css' );

	wp_enqueue_style( 'clm-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.2.1.min.js' );

	wp_enqueue_script( 'clm-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'clm-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'owl_js', get_template_directory_uri() . '/node_modules/owl.carousel/dist/owl.carousel.min.js' );

	wp_enqueue_script( 'bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');

	wp_enqueue_script( '', '');

	wp_enqueue_script( 'custom_js', get_template_directory_uri() . '/assets/js/custom.min.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'clm_scripts' );

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function create_post_type() {
	/**
	 * Cocktails Post Type
	 */
  register_post_type( 'cocktails',
    array(
      'labels' => array(
        'name' => __( 'Cocktails' ),
        'singular_name' => __( 'Cocktail' )
      ),
      'public' => true,
			'menu_icon'   => 'dashicons-palmtree',
			'supports' => array( 'title', 'editor', 'thumbnail', 'cat' ),
			'taxonomies' => array( 'category' ),
    )
  );

	register_taxonomy(
    		'cocktail_tag',
    		'cocktails',
    		array(
    			'hierarchical'  => false,
    			'label'         => __( 'Taste', CURRENT_THEME ),
    			'singular_name' => __( 'Taste', CURRENT_THEME ),
    			'rewrite'       => true,
    			'query_var'     => true
    		)
    	);
}
add_action( 'init', 'create_post_type' );



// Remove Sidebar on all the Single Product Pages
add_action( 'wp', 'remove_sidebar_product_pages' );

function remove_sidebar_product_pages() {
	if (is_product()) {
		remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);
	}
}

// add menu description to wp menu
function add_description_to_menu($item_output, $item, $depth, $args) {
	$menu_locations = get_nav_menu_locations();

    if ( has_term($menu_locations['menu-1'], 'nav_menu', $item) ) {
    if (strlen($item->description) > 0 ) {
        // append description after link
        $item_output .= sprintf('<span class="description">%s</span>', esc_html($item->description));
    }
	}
	return $item_output;
}
add_filter('walker_nav_menu_start_el', 'add_description_to_menu', 10, 4);

function prefix_nav_description( $item_output, $item, $depth, $args ) {

	$menu_locations = get_nav_menu_locations();

    if ( has_term($menu_locations['menu-2'], 'nav_menu', $item) ) {
			if ( !empty( $item->description ) ) {
					$item_output = str_replace( $args->link_after . '</a>', '<p class="description">' . $item->description . '</p>' . $args->link_after . '</a>', $item_output );
			}
    }
		return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );

// ACF options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'CLM Settings',
		'menu_title'	=> 'CLM Settings',
		'menu_slug' 	=> 'clm-settings',
	));
}

add_filter( 'get_terms', 'organicweb_exclude_category', 10, 3 );
function organicweb_exclude_category( $terms, $taxonomies, $args ) {
  $new_terms = array();
  // if a product category and on a page
  if ( in_array( 'product_cat', $taxonomies ) && ! is_admin() && is_page() ) {
    foreach ( $terms as $key => $term ) {
// Enter the name of the category you want to exclude in place of 'uncategorised'
      if ( ! in_array( $term->slug, array( 'uncategorized' ) ) ) {
        $new_terms[] = $term;
      }
    }
    $terms = $new_terms;
  }
  return $terms;
}

add_action( 'after_setup_theme', 'remove_pgz_theme_support', 100 );

function remove_pgz_theme_support() {
remove_theme_support( 'wc-product-gallery-zoom' );
}
