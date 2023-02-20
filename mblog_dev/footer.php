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
				<p>自己紹介です。自己紹介です。自己紹介です。自己紹介です。自己紹介です。自己紹介です。自己紹介です。自己紹介です。自己紹介です。</p>
				<!--
				<a href="https://manablog.org/profile/" style="color:#337ab7;">&raquo; プロフィール詳細はこちら</a><br />
				<a href="https://manablog.org/contact/" style="color:#337ab7;">&raquo; お問い合わせはこちら</a><br />
			-->
			</div>

			<div class="col-xs-12 col-sm-4">
				<h4>Portfolio</h4>
				<hr>
				<div style="clear:both"></div>
				<ul class="list-unstyled">
					<li><a href="" target="new" rel="nofollow">Coming soon...</a></li>
					<li><a href="" target="new" rel="nofollow">Coming soon...</a></li>
					<li><a href="" target="new" rel="nofollow">Coming soon...</a></li>
				</ul>
			</div>

			<div class="col-xs-12 col-sm-4">
				<h4>Twitter</h4>
				<hr class="twitter">
				<div style="clear:both"></div>
				<a class="twitter-timeline"  href="https://twitter.com/manabubannai" data-widget-id="302814657645789185">Tweets by @manabubannai</a>
			</div>
		</div>
	</div>

	<div class="container-fluid credit">
		<div class="row">
			<p class="col-xs-12 text-center">Copyright - <a href="https://manablog.org/">Minimal</a>, 2019 All Rights Reserved.</p>
		</div>
	</div>

</footer>

</body>

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

<?php wp_footer(); ?>
</html>