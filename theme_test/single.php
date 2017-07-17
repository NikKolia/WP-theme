<?php get_header() ?>
<?php the_post() ?>
		<div class="col-md-9">
	        <div class="post">
		        <h1><?php the_title() ?></h1>
		        <?php the_content() ?>
				<p><?php echo get_post_meta($post->ID, 'description', true); ?></p>
				<a href="#0" class="cd-popup-trigger">Оформить заказ</a>
	        </div>
        </div>
		<div class="col-md-3">
            <div class="sidebar">
	            <?php dynamic_sidebar('right_sidebar'); ?>
            </div>
        </div>
<?php get_footer() ?>
