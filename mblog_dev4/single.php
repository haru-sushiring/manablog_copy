<?php get_header(); ?>

<div class="col-xs-12 wrap single">

	<?php get_template_part( 'meta' ); ?>

	<h1 itemprop="headline"><?php the_title(); ?></h1>

	<p class="cat"><?php the_category( ' ' ); ?></p>

	<!-- サムネイルの表示 -->
	<?php if ( has_post_thumbnail() ) { ?>
	<figure><div class="thumbnail">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<span itemprop="image">
				<?php
					the_post_thumbnail( 'post-thumbnail' ,array('itemprop'=>'image', 'class' => 'img-responsive max-width') );
				?>
				</span>
		</a>
	</div></figure>
	<?php } else {
		echo "<br />";
	} ?>
	<!-- /サムネイルの表示 -->

	<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; ?>

	<p itemprop="keywords" class="keywords"><span class="icon-tags"></span> <?php the_tags('',' ',''); ?></p>
	<?php get_template_part( 'sns' ); ?>
	
	<!-- （PC）SNSボタン下にAdSense Multiplex -->
	<?php if ( !wp_is_mobile() && !is_single('1539') ) : ?>
	<div class="ad-multiplex">
		<ins class="adsbygoogle"
		 style="display:inline-block;width:600px;height:500px"
		 data-ad-client="ca-pub-9555866221676505"
		 data-ad-slot="9258054405"></ins>
		<script>
			 (adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	<p style="clear:both"></p>
	<?php endif; ?>
	<!-- （PC）AdSense Multiplex END-->
	
	<!-- （スマホ）SNSボタン下にAdSense -->
	<?php if ( wp_is_mobile() && !is_single('1539') ) : ?>
	<div class="ad-single">
		<!-- 幅336×高さ280 SNSボタン下 -->
		<ins class="adsbygoogle"
			 style="display:inline-block;width:336px;height:280px"
			 data-ad-client="ca-pub-9555866221676505"
			 data-ad-slot="3207952694"></ins>
		<script>
			 (adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	<div style="clear:both"></div>
	<?php endif; ?>
	<!-- （スマホ）AdSense Multiplex END-->
	
	<?php get_template_part( 'related' ); ?>

</div>
<?php get_footer(); ?>