<?php
	/*
		Plugin Name: Gym Fitness - Widgets
		Plugin URI:
		Description: Adds a new Custom Widget to Gym Fitness
		Version: 1.0
		Author: Arindam Dasgupta
		Author URI:
		Text Domain: gymfitness
	*/

if(!defined('ABSPATH')) die();

add_action( 'widgets_init', 'gymfitness_classes_widget' );
function gymfitness_classes_widget() {
    register_widget( 'GymFitness_Classes_Widget' );
}

class GymFitness_Classes_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'gymfitness_classes', // Base ID
			esc_html__( 'Gym Fitness - Classes List', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Displays different classes in the widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

			$quantity = $instance['quantity']; ?>

			<h1 class="text-primary text-center classes-header"><?php echo esc_html($instance['title']); ?></h1>

			<ul class="sidebar-classes-list">

				<?php 
					$arguments = array(
						'post_type' => 'gymfitness_classes',
						'posts_per_page' => $quantity,
						'orderby' => 'rand'
					); 
				?>

				<?php $classes = new WP_Query($arguments); ?>

				<?php while($classes->have_posts()): $classes->the_post(); ?>

					<li class="sidebar-class">

						<div class="sidebar-widget-image">

							<?php the_post_thumbnail('thumbnail'); ?>

						</div><!--.sidebar-widget-image-->

						<div class="class-content">

							<a href="<?php the_permalink(); ?>">

								<h3 class="text-primary"><?php the_title(); ?></h3>

							</a>

							<p><?php the_field('class_days'); ?> - <?php the_field('start_time'); ?> to <?php the_field('end_time'); ?></p>

						</div><!--.class-content-->

					</li><!--.sidebar-class-->

				<?php endwhile; wp_reset_postdata(); ?>

			</ul><!--.sidebar-classes-list-->

		<?php echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );	?>

		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">

		</p>

		<?php $quantity = ! empty( $instance['quantity'] ) ? $instance['quantity'] : esc_html__( '1', 'text_domain' ); ?>

		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'quantity' ) ); ?>"><?php esc_attr_e( 'Amount of classes to display:', 'text_domain' ); ?></label> 

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'quantity' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'quantity' ) ); ?>" type="number" value="<?php echo esc_attr( $quantity ); ?>" min="1">

		</p>
		
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['quantity'] = ( ! empty( $new_instance['quantity'] ) ) ? sanitize_text_field( $new_instance['quantity'] ) : '';

		return $instance;
	}

}

add_action( 'widgets_init', 'gymfitness_blogs_widget' );
function gymfitness_blogs_widget() {
    register_widget( 'GymFitness_Blogs_Widget' );
}

class GymFitness_Blogs_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'gymfitness_blogs', // Base ID
			esc_html__( 'Gym Fitness - Blogs List', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Displays different blogs in the widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

			$quantity = $instance['quantity']; ?>

			<h1 class="text-primary text-center blogs-header"><?php echo esc_html($instance['title']); ?></h1>

			<ul class="sidebar-blogs-list">

				<?php 
					$arguments = array(
						'post_type' => 'post',
						'posts_per_page' => $quantity,
						'orderby' => 'rand'
					); 
				?>

				<?php $blogs = new WP_Query($arguments); ?>

				<?php while($blogs->have_posts()): $blogs->the_post(); ?>

					<li class="sidebar-blog">

						<div class="sidebar-widget-image">

							<?php the_post_thumbnail('thumbnail'); ?>

						</div><!--.sidebar-widget-image-->

						<div class="blog-content">

							<a href="<?php the_permalink(); ?>">

								<h3 class="text-primary"><?php the_title(); ?></h3>

							</a>

							<p class="meta"><span class="text-primary">By: </span><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author_meta('display_name'); ?></a></p>

						</div><!--.class-content-->

					</li><!--.sidebar-class-->

				<?php endwhile; wp_reset_postdata(); ?>

			</ul><!--.sidebar-classes-list-->

		<?php echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );	?>

		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">

		</p>

		<?php $quantity = ! empty( $instance['quantity'] ) ? $instance['quantity'] : esc_html__( '1', 'text_domain' ); ?>

		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'quantity' ) ); ?>"><?php esc_attr_e( 'Amount of blogs to display:', 'text_domain' ); ?></label> 

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'quantity' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'quantity' ) ); ?>" type="number" value="<?php echo esc_attr( $quantity ); ?>" min="1">

		</p>
		
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['quantity'] = ( ! empty( $new_instance['quantity'] ) ) ? sanitize_text_field( $new_instance['quantity'] ) : '';

		return $instance;
	}

}

?>