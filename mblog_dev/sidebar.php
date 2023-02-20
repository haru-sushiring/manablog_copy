<aside id="sidebar" class="col-xs-12 col-sm-4" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	<div class="col-xs-12 author" itemprop="author" itemscope itemtype="http://schema.org/Person">
		<img src="http://manabubb.xsrv.jp/manablog/wp-content/uploads/2019/10/shutterstock_1123232387.jpg" class="img-responsive img-circle" />
		<h4><span itemprop="name">Taro Yamada</span></h4>
		<hr>
		<p>
			自己紹介です。自己紹介です。自己紹介です。自己紹介です。自己紹介です。自己紹介です。自己紹介です。自己紹介です。自己紹介です。
		</p>
		<!--
		<a href="<?php echo home_url(); ?>/profile/" class="pull-right">プロフィール詳細 <i class="fa fa-angle-right"></i></a>
		<br />
		<a href="<?php echo home_url(); ?>/contact/" class="pull-right">お問い合わせ <i class="fa fa-angle-right"></i></a>
		-->

	</div>

	<div class="col-xs-12 form-group">
		<form method="get" action="<?php echo home_url('/'); ?>" class="search-form">
			<div class="form-group has-feedback">
				<input type="text" name="s" id="s" placeholder="Search for..." class="form-control">
				<span class="glyphicon glyphicon-search form-control-feedback"></span>
			</div>
		</form>
	</div>

	<div class="col-xs-12 popular text-center">
		<h4>よく読まれている記事</h4>
		<hr>
		<?php
		setPostViews(get_the_ID());
		query_posts('meta_key=post_views_count&orderby=meta_value_num&posts_per_page=5&order=DESC');
		while(have_posts()) : the_post();
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
		if ( !empty($thumb['0']) ) {
			$url = $thumb['0'];
		} else {
			$url = get_template_directory_uri() . "/images/no-image.png";
		}
		?>

		<!-- サムネイルの表示 -->
		<div itemscope itemtype='http://schema.org/ImageObject' class="thumbnail">
			<a style="background-image:url(<?=$url?>);" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" itemprop="url" class="thumbnail-img"></a>
		</div>

		<!-- タイトル表示 -->
		<h5 class="title" itemprop="name headline">
			<a href="<?php the_permalink(); ?>" title="<?php printf(the_title_attribute('echo=0') ); ?>" itemprop="url"><?php the_title(); ?></a>
		</h5>
		<?php endwhile; ?>

	</div>

	<div class="col-xs-12 archive">
		<h4>Archive</h4>
		<hr>
		<ul class="list-unstyled">
			<?php
			$args = array(
				'show_post_count' => true
			);
			wp_get_archives( $args ); ?>
		</ul>
	</div>
</aside>