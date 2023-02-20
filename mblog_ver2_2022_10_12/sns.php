<ul class="sns_button list-unstyled clearfix">
	<li class="facebook-btn-icon col-xs-2">
		<a class="facebook-btn-icon-link" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>" target="_blank" rel="noopener">
			<span class="icon-facebook"></span>
			facebook
		</a>
	</li>
	<li class="twitter-btn-icon col-xs-2">
		<a class="twitter-btn-icon-link" href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank" rel="noopener">
			<span class="icon-twitter"></span>
			<span class="sns-share-small_text">Tweet</span>
		</a>
	</li>
	<li class="hatena-btn-icon col-xs-2">
		<a class="hatena-btn-icon-link" href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" rel="noopener">
			<span class="icon-hatebu"></span>
			<span class="sns-share-small_text">hatebu</span>
		</a>
	</li>
	<li class="pocket-btn-icon col-xs-2">
		<a href="http://getpocket.com/edit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>"  class="pocket-btn-icon-link" target="_blank" rel="noopener">
			<span class="icon-pocket"></span>
			<span class="sns-share-small_text">Pocket</span>
		</a>
	</li>
	<li class="line-btn-icon col-xs-2">
		<a href="http://line.me/R/msg/text/?<?php the_title(); ?>%0D%0A<?php the_permalink(); ?>"  class="line-btn-icon-link" target="_blank" rel="noopener">
			<span class="sns-share-small_text">LINE</span>
		</a>
	</li>
	<li class="copy-btn-icon col-xs-2">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/clipboard.js/1.5.13/clipboard.min.js"></script>
<a  class="copy-btn-icon-link">
<i class="fa fa-clipboard" aria-hidden="true"></i> <span id="share_btn" data-clipboard-text="<?php echo get_the_title(); ?> | <?php echo get_permalink(); ?>">コピー</span></a>
<script>
var clipboard = new Clipboard('#share_btn');
    clipboard.on('success', function(e) {
    //コピー成功時
    $("#share_btn").addClass('is-copied').text('コピーされました');
});
clipboard.on('error', function(e) {
    //エラー時
    $("#share_btn").addClass('is-copied').text('お使いの端末はこの機能に対応していません');
});
</script>
		</li>
	</ul>


