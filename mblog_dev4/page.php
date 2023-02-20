<?php get_header(); ?>

<div class="col-xs-12 wrap single">

	<?php get_template_part( 'meta' ); ?>

	<h1><?php the_title(); ?></h1>

	<p class="cat"><?php the_category( ' ' ); ?></p>

	<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; ?>

	<?php get_template_part( 'sns' ); ?>

</div>
<?php get_footer(); ?>