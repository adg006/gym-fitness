<?php 

/***** LINKING THE OTHER FUNCTIONS FILE *****/
require get_template_directory() . '/inc/queries.php';

/***** ENQUEUING ALL STYLE AND SCRIPTS *****/	
add_action('wp_enqueue_scripts','gym_fitness_styles');
function gym_fitness_styles(){

	/***** ENQUEUING THEME CSS FILES *****/
	wp_enqueue_style('theme-css', get_template_directory_uri() . '/style.css', array(), '1.0');
	wp_enqueue_style('gym-fitness-css', get_template_directory_uri() . '/css/gym-fitness.css', array('theme-css'), '1.0');
	wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0');
	wp_enqueue_style('slickNav-css', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.10');

	/***** ENQUEUING CDN CSS FILES *****/
	wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900|Staatliches&display=swap', array(), '1.0');

	/***** ENQUEUING THEME JS FILES *****/
	wp_enqueue_script('jquery');
	wp_enqueue_script('gym-fitness-js', get_template_directory_uri() . '/js/gym-fitness.js', array('jquery'), '1.0', true);
	wp_enqueue_script('slickNav-js', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.10', true);

	/***** ENQUEUING LIGHTBOX ONLY FOR GALLERY PAGE *****/
	if(basename(get_page_template())==='gallery.php'):
		wp_enqueue_style('lightbox-css', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.1');
		wp_enqueue_script('lightbox-js', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.1', true);
	endif;

	/***** ENQUEUING BXSLIDER ONLY FOR FRONT PAGE *****/
	if(is_front_page()):
		wp_enqueue_style('bxslider-css', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css', array(), '4.2.12');
		wp_enqueue_script('bxslider-js', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery'), '4.2.12', true);
	endif;
}

/***** ACTIVATING BASIC FEATURES *****/
add_action('after_setup_theme', 'gym_fitness_setups');
function gym_fitness_setups(){
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_image_size('square', 350, 350, true);
	add_image_size('portrait', 350, 724, true);
	add_image_size('box', 400, 375, true);
	add_image_size('mediumSize', 700, 400, true);
	add_image_size('blog', 966, 644, true);
}

/***** REGISTERING MENUS *****/
add_action('init','gym_fitness_menus');
function gym_fitness_menus(){
	register_nav_menus(array(
		'main-menu' => __('Main Menu','gym_fitness')
	));
}

/***** REGISTERING WIDGETS & SIDEBARS *****/
add_action('widgets_init','gym_fitness_sidebar');
function gym_fitness_sidebar(){
	register_sidebar(
		array(
			'name' => 'Sidebar For Class',
			'id' => 'sidebar-class',
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="text-primary">',
			'after_title' => '</h3>'
		)
	);

	register_sidebar(
		array(
			'name' => 'Sidebar For Blog',
			'id' => 'sidebar-blog',
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="text-primary">',
			'after_title' => '</h3>'
		)
	);
}

/***** DISPLAY THE HERO IMAGE AS A BACKGROUND *****/
add_action('init', 'gymfitnesss_hero_image');
function gymfitnesss_hero_image(){
	$front_page_id = get_option('page_on_front');
	$image_id = get_field('hero_image', $front_page_id);
	$image = $image_id['url'];
	$feature_image_css = " 
		.home .site-header { 
			background-image: linear-gradient( rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url($image); 
		} 
	";

	wp_register_style('custom', false);
	wp_enqueue_style('custom');
	wp_add_inline_style('custom', $feature_image_css);
}

?>