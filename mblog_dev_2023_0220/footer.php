				</div> <!-- end of articleBody -->
			</section>
		</article>
		<?php
			// LPページ用のカスタマイズ
			if ( is_page_template( 'page_lp.php' ) ) {
			} else {
				get_sidebar();
			}
		?>
	</div> <!-- end onf row -->
</div> <!-- end onf container -->

</main><!-- end main -->

<!-- パンくずリスト -->
<?php wp_reset_query(); ?>
<?php if ( !is_home() && !is_category() && !is_tag() && !is_search()  ) { ?>
<?php get_template_part( 'breadcrumb' ); ?>
<?php } else { ?>
<?php } ?>
<!-- /パンくずリスト -->

<footer id="footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-4">
				<h4>About me!</h4>
				<hr>
				<div style="clear:both"></div>
				<p>2023年4月からエンジニア / 22歳 / 個人事業主3年目 / 『すしりんぐblog』の運営者 / エンジニア就活＆大学生活情報を発信 / btc eth 毎日積み立て / 🐈</p>
			</div>

			<div class="col-xs-12 col-sm-4">
				<h4>information</h4>
				<hr>
				<div style="clear:both"></div>
				<ul class="list-unstyled">
					<li><a href="<?php echo home_url(); ?>/profile">はるのプロフィール【自己紹介】</a></li>
					<li><a href="<?php echo home_url(); ?>/portfolio-page">ポートフォリオ一覧</a></li>
<!-- 					<li><a href="https://www.resume.id/haruki_otsuka" target="new" rel="nofollow noopener">Web制作用ポートフォリオ</a></li> -->
					<li><a href="<?php echo home_url(); ?>/contact">お問い合わせ</a></li>
<!-- 					<li><a href="/sitemap">サイトマップ</a></li> -->
					<li><a href="<?php echo home_url(); ?>/privacypolicy">プライバシーポリシー</a></li>
				</ul>
			</div>

			<div class="col-xs-12 col-sm-4">
				<h4>Twitter</h4>
				<hr class="twitter">
				<div style="clear:both"></div>
				<a class="twitter-timeline" data-width="345" data-height="570" data-theme="light" href="https://twitter.com/sushiring_haru?ref_src=twsrc%5Etfw">Tweets by sushiring_haru</a>
			</div>
		</div>
	</div>

	<div class="container-fluid credit">
		<div class="row">
<!-- 			<p class="col-xs-12 text-center"><small class="d-block">© 2019 すしりんぐblog.</small></p> -->
			<p class="col-xs-12 text-center" style="margin-bottom: 0;">© 2019-2023 すしりんぐblog.</p>
		</div>
	</div>

</footer>

</body>

<!-- Webページが読み込まれた後にJSを読み込む -->
<!-- <script src="<?php echo get_template_directory_uri(); ?>/scripts/min/myscripts-min.js"></script> -->
<!-- <script type="text/javascript">
function downloadJSAtOnload() {
	var element = document.createElement("script");
	element.src = "<?php echo get_template_directory_uri(); ?>/scripts/min/defer-min.js";
	document.body.appendChild(element);
}
if (window.addEventListener)
	window.addEventListener("load", downloadJSAtOnload, false);
else if (window.attachEvent)
	window.attachEvent("onload", downloadJSAtOnload);
else window.onload = downloadJSAtOnload;
</script> -->
<!-- Webページが読み込まれた後にJSを読み込む END-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136709543-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-136709543-2');
</script> -->
<!-- Google Analytics END -->

<script src="<?php echo get_template_directory_uri(); ?>/scripts/jquery-3.1.0.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/scripts/prism.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/scripts/pushy.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/scripts/bootstrap.min.js"></script>

<?php include_once("analytics.php") ?>
<?php include_once("ad.php") ?>
<?php include_once("tweet.php") ?>

<?php wp_footer(); ?>
</html>