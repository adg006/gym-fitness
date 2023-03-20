<?php get_header(); ?>

	<main class="container page section">
		<ul class="blog-entries">			
			<?php while(have_posts()) : the_post(); ?>
				<?php get_template_part('template-parts/blog','loops'); ?>	
			<?php endwhile; wp_reset_postdata(); ?>
		</ul><!--.blog-entries-->
	</main><!--.container .page .section-->

<?php get_footer(); ?>