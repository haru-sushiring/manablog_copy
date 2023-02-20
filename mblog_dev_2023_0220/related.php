<div class="relatedposts">


<?php
	$orig_post = $post;
	global $post;
	$tags = wp_get_post_tags($post->ID);

	if ($tags) {
		$tag_ids = array();

		foreach($tags as $individual_tag)
			$tag_ids[] = $individual_tag->term_id;
			$args = array(
			'tag__in' => $tag_ids,
			'post__not_in' => array($post->ID),
			'posts_per_page'=>4, // 表示する関連記事の数
			'caller_get_posts'=>1,
			'orderby' => 'rand', // 過去記事に内部リンクできるので割と重要
		);

		$my_query = new wp_query( $args );
		?>

		<h4>RELATED</h4>

		<div class="col-xs-12">

		<?php
		while( $my_query->have_posts() ) {
			$my_query->the_post();

			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
			if ( !empty($thumb['0']) ) {
				$url = $thumb['0'];
			} else {
				$url = "http://design-ec.com/d/e_others_50/l_e_others_500.png";
		} ?>

		<div class="col-xs-6 inner">
			<div itemscope itemtype='http://schema.org/ImageObject' class="thumbnail">
				<a style="background-image:url(<?=$url?>);" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" itemprop="url" class="thumbnail-img"></a>
			</div>
			<h5>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php if (strlen($post->post_title) > 30) {
					echo mb_substr(the_title($before = '', $after = '', FALSE), 0, 60,  'UTF-8') . '...'; } else {
					the_title();
					} ?>
				</a>
			</h5>
			<p>
				<?php
					$cat = get_the_category(); $cat = $cat[0]; echo '<a href="' . get_bloginfo('url') . '/category/' . $cat->category_nicename . '">';
					echo $cat->cat_name;
					echo  '</a>';
				?>
			</p>
		</div>

		<?php } // while文ここまで
		?>
		</div>

	<?php
	} // IF文ここまで

	$post = $orig_post;
	wp_reset_query(); ?>
</div>

<div style="clear:both"></div>

<!--
<div class="relatedposts">
	<h4>お仕事の依頼はこちらからどうぞ</h4>
	<div class="col-xs-12">
		<div class="col-xs-6 inner">
			<div itemscope itemtype='http://schema.org/ImageObject' class="thumbnail">
				<a style="background-image:url(xxx.jpg);" href="#"  itemprop="url" class="thumbnail-img"></a>
			</div>
			<h5>
				<a href="#">
					ここに入力
				</a>
			</h5>
			<p>
				<a href="#">SEO</a>
			</p>
		</div>
		<div class="col-xs-6 inner">
			<div itemscope itemtype='http://schema.org/ImageObject' class="thumbnail">
				<a style="background-image:url(xxx.jpg);" href="#"  itemprop="url" class="thumbnail-img"></a>
			</div>
			<h5>
				<a href="#">
					ここに入力
				</a>
			</h5>
			<p>
				<a href="#">SEO</a>
			</p>
		</div>
	</div>
</div>
-->