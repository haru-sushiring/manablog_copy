<!DOCTYPE HTML>
<html lang="ja">
<head>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css"/>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php if(is_category()): ?>
<?php elseif(is_archive()): ?>
<meta name="robots" content="noindex,follow">
<?php elseif(is_search()): ?>
<meta name="robots" content="noindex,follow">
<?php elseif(is_tag()): ?>
<meta name="robots" content="noindex,follow">
<?php elseif(is_paged()): ?>
<meta name="robots" content="noindex,follow">
<?php endif; ?>
<title>
<?php
global $page, $paged;
if(is_front_page()):
elseif(is_single()):
wp_title('|',true,'right');
elseif(is_page()):
wp_title('|',true,'right');
elseif(is_archive()):
wp_title('|',true,'right');
elseif(is_search()):
wp_title('|',true,'right');
elseif(is_404()):
echo'404 |';
endif;
bloginfo('name');
if($paged >= 2 || $page >= 2):
echo'-'.sprintf('%sページ',
max($paged,$page));
endif;
?>
</title>

<!-- OGP設定 -->
<meta property="fb:app_id" content="0000000000000" />
<meta property="fb:admins" content="0000000000000" />
<meta name="twitter:card" value="summary_large_image"/>
<meta name="twitter:site" value="@haruki_otsuka" />
<meta name="twitter:creator" value="@haruki_otsuka" />
<meta name="twitter:title" value="<?php the_title(''); ?>"/>
<?php
			$description = get_post_meta($post->ID, '_aioseop_description', true);
			if (function_exists('aioseo')) {
				$description = aioseo()->meta->metaData->getMetaData()->description;
			}
?>
<meta name="twitter:description" value="<?php echo $description ?>"/>

<?php if (is_single() || is_page()) { ?>
<meta property="og:url" content="<?php the_permalink() ?>"/>
<meta property="og:title" content="<?php the_title(''); ?>" />
<meta property="og:description" content="<?php echo $description ?>" />
<meta property="og:type" content="article" />
<?php
	if(has_post_thumbnail()){ //アイキャッチがある場合
		$image_id = get_post_thumbnail_id();
		$image = wp_get_attachment_image_src($image_id, 'full');
		echo '<meta property="og:image" content="'.$image[0].'" />';echo "\n"; //FBのアイキャッチ画像
		echo '<meta name="twitter:image" value="'.$image[0].'" />'; echo "\n"; //FBのアイキャッチ画像
	} else { //アイキャッチがない場合
		echo '<meta property="og:image" content="/images/no-image.png" />';echo "\n"; //指定の画像
		echo '<meta name="twitter:image" value="/images/no-image.png" />';echo "\n"; //指定の画像
	}
?>

<?php } else { ?>
<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
<meta property="og:description" content="<?php echo $description ?>" />
<meta property="og:type" content="website" />
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/ogp.png" />
<meta name="twitter:image" value="/images/no-image.png" />
<?php } ?>
<!-- /OGP設定 -->

<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">

<!-- schema.org -->
<meta itemprop="name" content="<?php the_title(''); ?>">
<meta itemprop="description" content="<?php the_permalink() ?>">

<?php wp_head(); ?>

</head>
<body>

<header itemscope="itemscope" itemtype="http://schema.org/WPHeader">
	<div class="container">
		<div class="row">

			<!-- スマホ用メニューボタン -->
			<div id="container" class="col-xs-2 sp-nav-btn">
				<div class="menu-btn">&#9776;</div>
			</div>

			<div class="col-xs-8 col-sm-12 blogname">
				<?php if (is_front_page()) { ?>
				<h1 class="title">
				<?php } ?>
					<a href="<?php echo home_url(); ?>" class="sitename">
							<span class="sitename main">すしりんぐblog</span>
							<span class="sitename sub">Written by Haru</span>
					</a>
				<?php if (is_front_page()) { ?>
				</h1>
				<?php } ?>
			</div>
			<div class="col-xs-2"></div>
		</div>
	</div>

	<?php if ( is_mobile() ) : ?>
		<!-- スマホ用 -->
		<?php get_template_part( 'nav-menu' ); ?>

		<!-- Site Overlay -->
		<div class="site-overlay"></div>

	<?php else: ?>
		<!-- PC用 -->
		<div class="container-fluid nav-bg">
			<div class="container">
				<div class="row">
					<?php get_template_part( 'nav-menu' ); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

</header>

<!-- Blogのメインコンテンツエリア -->
<main id="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<div class="container">
		<div class="row">

			<?php if (is_front_page()) { ?>
				<?php get_template_part( 'picks' ); ?>
			<?php } else {} ?>

			<!-- articleタグのマークアップ -->
			<article itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
				<section>
					<!-- 本文の表示 -->

					<?php
						// LPページ用のカスタマイズ
						if ( is_page_template( 'page_lp.php' ) ) {?>
						<div  itemprop="articleBody" class="col-xs-12 col-sm-12 lp">
					<?php	} else { ?>
							<div  itemprop="articleBody" class="col-xs-12 col-sm-12 col-md-8">
						<?php } ?>


