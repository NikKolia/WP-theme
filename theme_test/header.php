<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
	<?php wp_head() ?>
    <title><?php bloginfo('name') ?> <?php wp_title() ?></title>
</head>
<body>
<div class="container">
	<a href="/" title="Главная страница <?php bloginfo('name') ?>">
		<img id="logo" src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="Логотип WordPress"/>
	</a>
	    <?php wp_nav_menu( array(
		    'container' => 'div',
		    'container_class' => 'collapse navbar-collapse',
		    'menu_class' => 'nav navbar-nav',
		    'theme_location' => 'header_menu',
	    )) ?>
    </nav>
	<div class="row">