<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="msapplication-TileColor" content="#2f2e2e">
	<meta name="theme-color" content="#2f2e2e">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() ?>/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() ?>/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() ?>/images/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri() ?>/images/site.webmanifest">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri() ?>/images/safari-pinned-tab.svg" color="#2f2e2e">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header class="site-header">
		<div class="container header-grid">
			<div class="navigation-bar">
				<div class="logo">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo get_template_directory_uri() . '/images/logo.svg'; ?>">
					</a>
				</div>
				<?php 
					wp_nav_menu(
						array(
							'theme_location' => 'main-menu',
							'container' => 'nav',
							'container_class' => 'main-menu'
						)
					); 
				?>
			</div><!--.navigation-bar-->
		</div><!--.container .header-grid-->
	</header><!--.site-header-->