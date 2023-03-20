<?php
	/*
		Template Name: Gallery
	*/
?>

<?php get_header(); ?>

	<main class="container page section">
		<?php while(have_posts()) : the_post(); ?>
			<h1 class="text-center text-primary"><?php the_title(); ?></h1>
			<?php $gallery = get_post_gallery(get_the_id(), false); ?>
			<?php $gallery_image_ids = explode(',', $gallery['ids']); ?>
			<ul class="gallery-images">
				<?php $i = 0; ?>
				<?php foreach($gallery_image_ids as $id): ?>
					<?php $size = ($i === 3 || $i === 6 ) ? 'portrait' : 'square'; ?>
					<?php $imageThumb = wp_get_attachment_image_src($id, $size); ?>
					<?php $image = wp_get_attachment_image_src($id, 'large'); ?>
					<li>
						<a href="<?php echo $image[0]?>" data-lightbox="gallery">
							<img src="<?php echo $imageThumb[0]?>" />
						</a>
					</li>
				<?php $i++; endforeach; ?>
			</ul><!--.gallery-images-->			
		<?php endwhile; wp_reset_postdata(); ?>
	</main><!--.container .page .section-->

<?php get_footer(); ?>
