<?php get_header('front'); ?>

<?php while(have_posts()): the_post(); ?>

	<section class="welcome text-center section">
		<h1 class="text-primary"><?php the_field('welcome_heading'); ?></h1>
		<p><?php the_field('welcome_content'); ?></p>
	</section><!--.welcome-->

	<section class="section-areas">	
		<ul class="areas-container">			
			<li class="area">				
				<?php
					$area1 = get_field('area_1');
					$image = wp_get_attachment_image_src($area1['area_image'], 'mediumSize')[0];
				?>
				<img src="<?php echo $image ?>" />
				<p><?php echo $area1['area_content']; ?></p>
			</li><!--.area-->
			<li class="area">				
				<?php
					$area2 = get_field('area_2');
					$image = wp_get_attachment_image_src($area2['area_image'], 'mediumSize')[0];
				?>
				<img src="<?php echo $image ?>" />
				<p><?php echo $area2['area_content']; ?></p>
			</li><!--.area-->
			<li class="area">				
				<?php
					$area3 = get_field('area_3');
					$image = wp_get_attachment_image_src($area3['area_image'], 'mediumSize')[0];
				?>
				<img src="<?php echo $image ?>" />
				<p><?php echo $area3['area_content']; ?></p>
			</li><!--.area-->
			<li class="area">				
				<?php
					$area4 = get_field('area_4');
					$image = wp_get_attachment_image_src($area4['area_image'], 'mediumSize')[0];
				?>
				<img src="<?php echo $image ?>" />
				<p><?php echo $area4['area_content']; ?></p>
			</li><!--.area-->
		</ul><!--.areas-container-->
	</section><!--.section-areas-->

	<section class="classes-homepage">	
		<div class="container section">			
			<h2 class="text-primary text-center">Our Classes</h2>
			<?php gymfitness_classes_list(4); ?>
			<div class="button-container">				
				<a class="button" href="<?php echo get_permalink(get_page_by_title('Classes')); ?>">View More Classes</a>
			</div><!--.button-container-->
		</div><!--.container .section-->
	</section><!--.classes-homepage-->

	<section class="instructors">		
		<div class="container section">			
			<h2 class="text-center">Our Instructors</h2>
			<?php gymfitness_instructors_list(); ?>
		</div><!--.container .section-->
	</section><!--.instructors-->

	<section class="testimonials">
		<h2 class="text-center">Testimonials</h2>
		<div class="container-testimonials">			
			<?php gymfitness_testimonials_list(); ?>
		</div><!--.container-->
	</section><!--.testimonials-->

	<section class="blog container section">
		<h2 class="text-center">Our Blog</h2>
		<ul class="blog-entries">
			<?php 
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 4
				);
				$blog = new WP_Query($args);
			?>
			<?php while($blog->have_posts()): $blog->the_post(); ?>
				<?php get_template_part('template-parts/blog','loops'); ?>
			<?php endwhile; wp_reset_postdata(); ?>
		</ul><!--.blog-entries-->
	</section><!--.blog .container .section-->

<?php endwhile; wp_reset_postdata(); ?>

<?php get_footer(); ?>