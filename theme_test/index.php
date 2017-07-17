<?php get_header() ?>
	<div class="col-md-9">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="post-preview">
				<h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
				<?php the_content() ?>
				<p><?php echo get_post_meta($post->ID, 'descript', true); ?></p>
				<a href="#0" class="cd-popup-trigger">Оформить заказ</a>
			</div>
			<?php endwhile; else: ?>
				 <?php $products = new WP_Query( array( 'post_type' => 'products', 'posts_per_page' => 24 ) ); ?>
				 <?php while ( $products->have_posts() ) : $products->the_post(); ?>
					 <div class="post-preview">
						<h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
						<?php the_content() ?>
						<p><?php echo get_post_meta($post->ID, 'descript', true); ?></p>
						<a href="#0" class="cd-popup-trigger">Оформить заказ</a>
					</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</div>
	<div class="col-md-3">
		<div class="sidebar">
			<?php dynamic_sidebar('right_sidebar'); ?>
		</div>
	</div>	
<?php get_footer() ?>