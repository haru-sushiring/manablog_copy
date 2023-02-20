<div class="col-xs-12 picks">
	<?php $pickup_id = esc_html(get_option(ORIGINAL_FIELD_PICKUP, '')); ?>
	<?php $pickup_ids = explode(",", $pickup_id); ?>
	<?php if ($pickup_ids !== ''): ?>
		<?php
		$the_query = new WP_Query(array(
			'post_type'=>'any',
			'orderby'=>'post__in',
			'post__in' => $pickup_ids,
			'posts_per_page' => 3,
		));
		?>
		<?php if ($the_query->have_posts()) : ?>
		<?php $count =0 ;?>
		<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
			<div class="col-xs-12 col-sm-4 wrap <?php if($count === 1){echo "center";}  ?>">
				<div itemscope="" itemtype="http://schema.org/ImageObject" class="thumbnail">
					<a style="background-image:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>)" itemprop="url" class="thumbnail-img"></a>
				</div>
				<h2 class="title" itemprop="name headline">
					<a href="<?php echo get_permalink(); ?>"  itemprop="url"><?php echo get_the_title(); ?></a>
				</h2>
				<div class="readmore"><a href="<?php echo get_permalink(); ?>">READ MORE</a></div>
			</div>
		<?php $count++; ?>
		<?php endwhile; ?>
		<?php endif; ?>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
</div>


