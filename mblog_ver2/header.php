<!DOCTYPE HTML>
<html lang="ja">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-136709543-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-136709543-2');
</script>

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
<?php $facebook_app_id = esc_html(get_option(ORIGINAL_FIELD_FACEBOOK_APP_ID)); ?>
<?php $facebook_admins_id = esc_html(get_option(ORIGINAL_FIELD_FACEBOOK_ADMINS_ID)); ?>
<?php $twitte_id = esc_html(get_option(ORIGINAL_FIELD_TWITTER, '@manabubannai')); ?>
<meta property="fb:app_id" content="<?php echo $facebook_app_id; ?>" />
<meta property="fb:admins" content="<?php echo $facebook_admins_id; ?>" />
<meta name="twitter:card" value="summary_large_image"/>
<meta name="twitter:site" value="<?php echo $twitte_id; ?>" />
<meta name="twitter:creator" value="<?php echo $twitte_id; ?>" />
<meta name="twitter:title" value="<?php the_title(''); ?>"/>
<meta name="twitter:description" value="<?php echo get_post_meta($post->ID, '_aioseop_description', true); ?>"/>

<?php if (is_single() || is_page()) { ?>
<meta property="og:url" content="<?php the_permalink() ?>"/>
<meta property="og:title" content="<?php the_title(''); ?>" />
<meta property="og:description" content="<?php echo get_post_meta($post->ID, '_aioseop_description', true); ?>" />
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
<meta property="og:description" content="<?php echo get_post_meta($post->ID, '_aioseop_description', true); ?>" />
<meta property="og:type" content="website" />
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/ogp.png" />
<meta name="twitter:image" value="/images/no-image.png" />
<?php } ?>
<!-- /OGP設定 -->

<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>rakky-icon">

<!-- schema.org -->
<meta itemprop="name" content="<?php the_title(''); ?>">
<meta itemprop="description" content="<?php the_permalink() ?>">
	
<?php wp_head(); ?>
<!-- <script data-ad-client="ca-pub-9555866221676505" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
	<!-- User Heat Tag -->
<script type="text/javascript">
(function(add, cla){window['UserHeatTag']=cla;window[cla]=window[cla]||function(){(window[cla].q=window[cla].q||[]).push(arguments)},window[cla].l=1*new Date();var ul=document.createElement('script');var tag = document.getElementsByTagName('script')[0];ul.async=1;ul.src=add;tag.parentNode.insertBefore(ul,tag);})('//uh.nakanohito.jp/uhj2/uh.js', '_uhtracker');_uhtracker({id:'uh8jloO1oA'});
</script>
<!-- End User Heat Tag -->
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
					<?php $sitename_main = esc_html(get_option(ORIGINAL_FIELD_SITENAME_MAIN)); ?>
					<?php $sitename_sub = esc_html(get_option(ORIGINAL_FIELD_SITENAME_SUB)); ?>	
					<a href="<?php echo home_url(); ?>" class="sitename">
							<span class="sitename main"><?php echo $sitename_main; ?></span>
							<span class="sitename sub"><?php echo $sitename_sub; ?></span>
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
							<div  itemprop="articleBody" class="col-xs-12 col-sm-8">
						<?php } ?>