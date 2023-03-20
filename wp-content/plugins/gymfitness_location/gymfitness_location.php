<?php
	/*
		Plugin Name: Gym Fitness - Location
		Plugin URI:
		Description: Add a new location to Gym Fitness
		Version: 1.0
		Author: Arindam Dasgupta
		Author URI:
		Text Domain: gymfitness
	*/

/***** ENQUEUING CSS & JS FILES FOR MAPS *****/
add_action('wp_enqueue_scripts', 'gymfitness_location_setups');
function gymfitness_location_setups(){
	if(is_page('contact-us')):
		wp_enqueue_style('leaflet-css', 'https://unpkg.com/leaflet@1.6.0/dist/leaflet.css', array(), '1.6.0');
		wp_enqueue_script('leaflet-js', 'https://unpkg.com/leaflet@1.6.0/dist/leaflet.js', array(), '1.6.0', true);
		wp_enqueue_script('gymfitness-leaflet-js', plugins_url('/js/gymfitness_leaflet.js', __FILE__), array('leaflet-js'), '1.0.0', true);

	endif;
}

/***** SHORTCODE FUNCTION FOR DISPLAYING THE MAP IN CONTACT PAGE *****/
add_shortcode('gymfitness_location', 'gymfitness_location_shortcode');
function gymfitness_location_shortcode(){ ?>
	<?php $location = get_field('location'); ?>
	<div class="location">
		<input type="hidden" id="lat" value="<?php echo $location['lat']; ?>">
		<input type="hidden" id="lng" value="<?php echo $location['lng']; ?>">
		<input type="hidden" id="address" value="<?php echo $location['address']; ?>">
		<div id="map"></div>
	</div><!--.location-->
<?php }

?>