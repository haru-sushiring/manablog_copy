<?php get_header(); ?>
<?php $s = htmlentities($_GET['s']); ?>

<div class="other">
	<h1 class=""  itemprop="name headline">
		<?php if($s){ ?>検索キーワード：<?php echo $s; ?><br><?php } ?>
	</h1>
	<hr>
	<div style="clear:both"></div>

	<?php
	// query_posts( array('s' => $s,));
	?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
	if ( !empty($thumb['0']) ) {
		$url = $thumb['0'];
	} else {
		$url = get_template_directory_uri() . "/images/no-image.png";
	}
	?>

	<div class="col-xs-12 wrap">

		<?php get_template_part( 'meta' ); ?>

		<!-- タイトル表示 -->
		<h2 class="title" itemprop="name headline">
			<a href="<?php the_permalink(); ?>" title="<?php printf(the_title_attribute('echo=0') ); ?>" itemprop="url"><?php the_title(); ?></a>
		</h2>

		<p class="cat"><?php the_category( ' ' ); ?></p>

		<!-- サムネイルの表示 -->
		<div itemscope itemtype='http://schema.org/ImageObject' class="thumbnail">
			<a style="background-image:url(<?=$url?>);" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" itemprop="url" class="thumbnail-img"></a>
		</div>

		<!-- ディスクリプションの表示 -->
		<p itemprop="description" class="description">
			<?php echo get_post_meta($post->ID, '_aioseop_description', true); ?>
		</p>
		<div class="readmore"><a href="<?php echo get_permalink(); ?>">READ MORE</a></div>

	</div>

	<?php endwhile; else : ?>
	<!-- ループ開始 -->

	<div>該当なし</div>
	<?php endif; ?>

</div>

<div class="col-xs-12 navigation">
	<div class="pull-left"><?php previous_posts_link( '<i class="fa fa-angle-left"></i> 前のページ' ); ?></div>
	<div class="pull-right"><?php next_posts_link( '次のページ <i class="fa fa-angle-right"></i>', '' ); ?></div>
</div>

<?php get_footer(); ?>