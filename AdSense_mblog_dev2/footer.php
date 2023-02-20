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
				<p>2023年4月からWebエンジニア。仮想通貨・NFTゲーム推し。ゼミでビットコインの自動売買プログラム（Python）を作っています。</p>
			</div>

			<div class="col-xs-12 col-sm-4">
				<h4>information</h4>
				<hr>
				<div style="clear:both"></div>
				<ul class="list-unstyled">
					<li><a href="<?php echo home_url(); ?>/profile">はるのプロフィール【自己紹介】</a></li>
					<li><a href="<?php echo home_url(); ?>/portfolio-page">ポートフォリオ</a></li>
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
				<a class="twitter-timeline" data-width="345" data-height="570" data-theme="light" href="https://twitter.com/sushiring_haru?ref_src=twsrc%5Etfw">Tweets by sushiring_haru</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
		</div>
	</div>

	<div class="container-fluid credit">
		<div class="row">
<!-- 			<p class="col-xs-12 text-center"><small class="d-block">© 2019 すしりんぐblog.</small></p> -->
			<p class="col-xs-12 text-center" style="margin-bottom: 0;">© 2019 すしりんぐblog.</p>
		</div>
	</div>

</footer>

<!-- heatmap（heatmap.me）のトラッキング -->
<!-- <script>
(function(h,e,a,t,m,p) {
m=e.createElement(a);m.async=!0;m.src=t;
p=e.getElementsByTagName(a)[0];p.parentNode.insertBefore(m,p);
})(window,document,'script','https://u.heatmap.it/log.js');
</script> -->
<!-- heatmapのトラッキング END-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-136709543-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-136709543-2');
</script>
<!-- Google Analytics END -->

<!-- Microsoft Clarity start-->
<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "80g1c5npxx");
</script>	
<!-- Microsoft Clarity end -->

</body>

<!-- Webページが読み込まれた後にJSを読み込む -->
<script src="<?php echo get_template_directory_uri(); ?>/scripts/min/myscripts-min.js"></script>
<script type="text/javascript">
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
</script>
<!-- Webページが読み込まれた後にJSを読み込む END-->

<?php wp_footer(); ?>
</html>