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
	
	<p itemprop="keywords" class="keywords"><i class="fa fa-tags" aria-hidden="true"></i> <?php the_tags('',' ',''); ?></p>
	<?php get_template_part( 'sns' ); ?>
	<?php get_template_part( 'related' ); ?>

</div>
<?php get_footer(); ?>