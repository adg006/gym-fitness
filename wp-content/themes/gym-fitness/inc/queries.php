<?php

/***** QUERIES FOR DISPLAYING LIST OF CLASSES *****/
function gymfitness_classes_list($number = -1){ ?>
	<ul class="classes-list">
		<?php 
			$args = array(
				'post_type' => 'gymfitness_classes', 
				'posts_per_page' => $number
			); 
			$classes = new WP_Query($args); 
		?>
		<?php while($classes->have_posts()): $classes->the_post(); ?>
			<li class="gym-class card gradient">
				<?php the_post_thumbnail('mediumSize'); ?>
				<div class="card-content">
					<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
					<p><?php the_field('class_days'); ?> - <?php the_field('start_time'); ?> to <?php the_field('end_time'); ?></p>
				</div><!--.card-content-->
			</li><!--.gym-class .card .gradient -->
		<?php endwhile; wp_reset_postdata(); ?>
	</ul><!--.classes-list-->
<?php }


/***** QUERIES FOR DISPLAYING LIST OF INSTRUCTORS *****/
function gymfitness_instructors_list($number = -1){ ?>
	<ul class="instructor-list">
		<?php
			$args = array(
				'post_type' => 'instructors',
				'posts_per_page' => $number
			);
			$instructors = new WP_Query($args);
		?>
		<?php while($instructors->have_posts()): $instructors->the_post(); ?>
			<li class="instructor">
				<?php the_post_thumbnail('mediumSize'); ?>
				<div class="content text-center">
					<h3><?php the_title(); ?></h3>
					<?php the_content(); ?>
					<div class="specialty">					
						<?php $specialty = get_field('specialty'); ?>
						<?php foreach($specialty as $s): ?>
							<span class="tag"><?php echo $s; ?></span>
						<?php endforeach; ?>
					</div><!--.specialty-->
				</div><!--.text-center-->
			</li><!--.instructor-->
		<?php endwhile; wp_reset_postdata(); ?>
	</ul><!--.instructor-list-->
<?php }


/***** QUERIES FOR DISPLAYING LIST OF TESTIMONIALS *****/
function gymfitness_testimonials_list() { ?>
	<ul class="testimonials-list">				
		<?php
			$args = array(
				'post_type' => 'testimonials',
				'posts_per_page' => 10
			);
			$testimonials = new WP_Query($args);
		?>
		<?php while($testimonials->have_posts()): $testimonials->the_post(); ?>
			<li class="testimonial text-center">				
				<blockquote><?php the_content(); ?></blockquote>
				<div class="testimonial-footer">					
					<?php the_post_thumbnail('thumbnail'); ?>
					<p><?php the_title(); ?></p>
				</div><!--.testimonial-footer-->
			</li><!--.testimonial-->
		<?php endwhile; wp_reset_postdata(); ?>
	</ul><!--.testimonials-list-->
<?php } ?>

