<ul class="sns_button list-unstyled clearfix">
	<li class="facebook-btn-icon col-xs-2">
		<a class="facebook-btn-icon-link" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>" target="_blank">
			<span class="icon-facebook"></span>
			facebook
		</a>
	</li>
	<li class="twitter-btn-icon col-xs-2">
		<a class="twitter-btn-icon-link" href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank">
			<span class="icon-twitter"></span>
			<span class="sns-share-small_text">Tweet</span>
		</a>
	</li>
	<li class="hatena-btn-icon col-xs-2">
		<a class="hatena-btn-icon-link" href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank">
			<span class="icon-hatebu"></span>
			<span class="sns-share-small_text">hatebu</span>
		</a>
	</li>
	<li class="google-plus-btn-icon col-xs-2">
		<a href="//line.naver.jp/R/msg/text/?<?php the_title(); ?>%0D%0A<?php the_permalink(); ?>"  class="google-plus-btn-icon-link" target="_blank">
			<span class="icon-line"></span>
			<span class="sns-share-small_text">LINE</span>
		</a>
	</li>
	<li class="pocket-btn-icon col-xs-2">
		<a href="http://getpocket.com/edit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>"  class="pocket-btn-icon-link" target="_blank">
			<span class="icon-pocket"></span>
			<span class="sns-share-small_text">Read Later</span>
		</a>
	</li>
	<li class="fb-like-btn-icon col-xs-2">
		<fb:like href="<?php the_permalink(); ?>" layout="button_count" action="like" show_faces="false" share="false" class="fb-like"></fb:like>
	</li>
</ul>
