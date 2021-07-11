<?php

/**
 * medspa functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package medspa
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'medspa_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function medspa_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on medspa, use a find and replace
		 * to change 'medspa' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'medspa', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'primary-menu' => esc_html__( 'Primary', 'theneutritips' ),
				'footer-menu' => esc_html__( 'Footer', 'theneutritips' )
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'medspa_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'medspa_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function medspa_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'medspa_content_width', 640 );
}
add_action( 'after_setup_theme', 'medspa_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function medspa_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'medspa' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'medspa' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'medspa' ),
			'id'            => 'footer-widget',
			'description'   => esc_html__( 'Add widgets here.', 'medspa' ),
			'before_widget' => '<div id="%1$s" class="widget footerlinks %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'medspa_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function medspa_scripts() {
	wp_enqueue_style( 'medspa-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'medspa-style', 'rtl', 'replace' );

	wp_enqueue_script( 'medspa-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );

	/*custom-css-call*/
	wp_enqueue_style( 'popins', 'https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500;600&display=swap', false );
	wp_enqueue_style( 'bootsrap-style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', false );
	wp_enqueue_style( 'Fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', false );
	wp_enqueue_style( 'carusel-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css' );
	wp_enqueue_style( 'lightbox-css', 'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css' );
	wp_enqueue_style( 'mobilemenu-css', get_template_directory_uri(). '/assets/css/mob-menu.css?1' );
	/*wp_enqueue_style( 'remove-style', get_template_directory_uri(). '/assets/css/remove.css' );*/
	wp_enqueue_style( 'common-style', get_template_directory_uri(). '/common-style.css?'.time() );
	wp_enqueue_style( 'custom-style', get_template_directory_uri(). '/custom-style.css?'.time() );


	/*custom-js-call*/
	//wp_enqueue_script( 'jquery-lib', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array('jquery'), 3.5, true);
	wp_enqueue_script( 'popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', array('jquery'), 4.5, true);
	wp_enqueue_script( 'bootstrapscript', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), 4.5, true);
	wp_enqueue_script( 'mobilemenu-jss', get_template_directory_uri() . '/assets/js/mob-menu.js', '', '2.0', true);
	wp_enqueue_script( 'carousel-jss', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), 2.3, true);
	wp_enqueue_script( 'lightbox-jss', 'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js', '', '2.0', true);
	wp_enqueue_script( 'theia-sticky', 'https://cdn.jsdelivr.net/npm/theia-sticky-sidebar@1.7.0/dist/theia-sticky-sidebar.min.js', '', '1.7', true);
	wp_enqueue_script( 'customscript', get_template_directory_uri() . '/assets/js/custom-script.js?'.time(), '', '2.0', true);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'medspa_scripts' );

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

//customize

/**
 * theme-options
 */
	require get_template_directory() . '/inc/theme-options.php';


/*wp-admin login page*/
function wp_login_stylesheet() {
	wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/common-style.css?1' );
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	$login_background  = get_field('login_background', 'options');
	echo '<style>.wp-core-ui{ background-image:url('.$login_background.') !important;}
	.wp-core-ui div#login h1 a{background:url('.$image[0].') no-repeat #fff;}
	</style>';
}
add_action( 'login_enqueue_scripts', 'wp_login_stylesheet' );

function wp_login_logo_url() {
	return home_url();
}
add_filter( 'login_headerurl', 'wp_login_logo_url' );

function wp_login_logo_url_title() {
	return home_url();
}
add_filter( 'login_headertitle', 'wp_login_logo_url_title' );
function string_limit_words($string, $word_limit){  $words = explode(' ', $string, ($word_limit + 1));  if(count($words) > $word_limit)  array_pop($words);  return implode(' ', $words);}


//favicon


//blog-content
function render_feature_content($id, $data){

		$thumb = esc_url( get_template_directory_uri() ).'/assets/images/default-thumb.png';
		if ( has_post_thumbnail( $id) ) {
		  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $id),'single-post-thumbnail')[0];
		}

		$content_post = get_post($id);
		$content = $content_post->post_content;
		$trimmed_content = wp_trim_words( $content,30, NULL );
		$html = '
		<div class="col-md-'.$data['per_row_for_blog'].' text-'.$data['text_align'].'">

				<a href="'.get_the_permalink($id).'" class="box '.$data['box_shadow'].'">
					<div class="header" style="background-image:url('.$thumb.')"></div>
					<div class="description">
						<h5 class="cat">'.$data['cat'].'</h5>
						<h2 class="title">'.get_the_title($id).'</h2>
						<p>'.$trimmed_content.'</p>
						<button class="btn">Learn More</button>
					</div>
				</a>
		</div>';
		return $html;
}
function render_blogcontent($id, $data){

		$thumb = esc_url( get_template_directory_uri() ).'/assets/images/default-thumb.png';
		if ( has_post_thumbnail( $id) ) {
		  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $id),'single-post-thumbnail')[0];
		}

		$content_post = get_post($id);
		$content = $content_post->post_content;
		$trimmed_content = wp_trim_words( $content, 15, NULL );
		$html = '
		<div class="col-md-'.$data['per_row_for_blog'].' text-'.$data['text_align'].'">

				<a href="'.get_the_permalink($id).'" class="box '.$data['box_shadow'].'">
					<div class="header" style="background-image:url('.$thumb.')"></div>
					<div class="description">
						<h4>'.get_the_title($id).'</h4>
						<p>'.$trimmed_content.'</p>
						<button class="btn btn-secondary rounded-pill white_btn">Learn More</button>
					</div>
				</a>
		</div>';
		return $html;
}
function blogRecentPost($data){
	$recent_args = array(
	    "posts_per_page" => 3,
	    "orderby"        => "date",
	    "order"          => "DESC"
	);
	$recent_posts = new WP_Query( $recent_args );
	$html = '';
	if ( $recent_posts -> have_posts() ) :
		while ( $recent_posts -> have_posts() ) :
		  $recent_posts -> the_post();
		   //if ( has_post_thumbnail( get_the_ID()) ) {
		      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()),'single-post-thumbnail');
					$html .= render_blogcontent(get_the_ID(), $data);
		    //}
			endwhile;
		endif;
		wp_reset_postdata();
		return $html;
}

function medspa_load_more_scripts() {
	global $wp_query;
	wp_enqueue_script('jquery');
	wp_register_script( 'medspa_loadmore', get_stylesheet_directory_uri() . '/assets/js/loadmore-posts.js', array('jquery') );
	wp_localize_script( 'medspa_loadmore', 'medspa_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
		'posts' => json_encode( $wp_query->query_vars ),
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );

 	wp_enqueue_script( 'medspa_loadmore' );
}
add_action( 'wp_enqueue_scripts', 'medspa_load_more_scripts' );

function medspa_loadmore_ajax_handler(){
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1;
	$args['post_status'] = 'publish';
	query_posts( $args );
	if( have_posts() ) :
		while( have_posts() ): the_post();
			echo render_blogcontent(get_the_ID());
		endwhile;
	endif;
	die;
}

add_action('wp_ajax_loadmore_posts', 'medspa_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore_posts', 'medspa_loadmore_ajax_handler');


/**
 * Implement the CPT include feature.
 */
require get_template_directory() . '/inc/post-type-nutrips.php';

//social-profile

function social_profile ($attr = null){
	$class = '';
	$color = '';
	if (isset($attr['class'])) {
		$class = $attr['class'];
	}

	if (isset($attr['class'])) {
		$color = 'style=color:'.$attr['color'].';';
	}
	$html = '';
	if( have_rows('social_links', 'option') ) {
			$html .= '<ul class="social '.$class.'">';
			while( have_rows('social_links', 'option') ) : the_row();
					$link = get_sub_field('link');
					$html .= '<li><a href="'.$link.'" '.$color.'><i class="fa '.get_sub_field('icon').'" aria-hidden="true" ></i></a></li>';
			endwhile;
			$html .= '</ul>';
	}
	return $html;
}
add_shortcode('social-profile', 'social_profile');
