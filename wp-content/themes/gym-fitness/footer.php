	<footer class="site-footer container">
		<div class="footer-content">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main-menu',
						'container' => 'nav',
						'container_class' => 'footer-menu'
					)
				);
			?>
			<p>All Rights Reserved <?php echo get_bloginfo("name"); ?> <?php echo date('Y'); ?></p>
		</div><!--.footer-content-->
		<?php wp_footer(); ?>
	</footer><!--.site-footer .container-->
</body>
</html>