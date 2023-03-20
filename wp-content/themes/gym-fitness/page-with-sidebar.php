<?php
	/*
		Template Name: Page With Sidebar
	*/
?>

<?php get_header(); ?>

	<main class="container page section with-sidebar">

		<div class="page-content">

			<?php get_template_part('template-parts/page','loops'); ?>

		</div><!--.page-content-->

		<?php get_sidebar(); ?>

	</main><!--.container .page .section-->
	
<?php get_footer(); ?>