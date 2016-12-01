<div class="the-post-image">
	<span class="fa fa-file-text-o"></span>
	<?php if ( has_post_thumbnail()):
	echo the_post_thumbnail('wpcontented-home-1000'); 
	else: ?>
	<div class="no-featured-image">
		<div class="table">
			<div class="table-cell">
				<?php _e('No Featured Image','wpcontented'); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>

<div class="item-description">
	<div class="the-post-title">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="date">
			<?php _e('By ','wpcontented'); ?>
			<?php esc_url(the_author_posts_link()); ?>
			<?php printf( __( ' / <span>%2$s</span> / ', 'wpcontented' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format'))); ?><?php $category_list = get_the_category_list( __( ', ', 'wpcontented' ) ); printf( __('%s', 'wpcontented'), $category_list); ?>
		</div>
	</div>
	<div class="excerpt"><?php the_excerpt(); ?></div>
</div>