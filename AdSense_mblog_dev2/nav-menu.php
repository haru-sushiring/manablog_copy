<?php if ( is_mobile() ) : ?>
<!-- スマホ用 -->
<nav class="pushy pushy-left">
<?php else: ?>
<!-- PC用 -->
<nav>
<?php endif; ?>

	<ul class="nav navbar-nav">
		<li itemprop="name" class="sp-none"><a href="<?php echo home_url(); ?>/" itemprop="url"><i class="fa fa-home" aria-hidden="true"></i></a></li>
		<li itemprop="name" class="pc-none"><a href="<?php echo home_url(); ?>/profile" itemprop="url"><i class="fa fa-home" aria-hidden="true"></i> プロフィール</a></li>
		<li class="dropdown" itemprop="name">
			<a href="#" itemprop="url" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-btc" aria-hidden="true"></i> 仮想通貨 <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo home_url(); ?>/category/crypto-currency">ALL</a></li>
				<li><a href="<?php echo home_url(); ?>/category/crypto-currency/nftgame">NFTゲーム</a></li>
			</ul>
		</li>
		<li class="dropdown" itemprop="name">
			<a href="#" itemprop="url" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-code" aria-hidden="true"></i> プログラミング <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo home_url(); ?>/category/programming">ALL</a></li>
				<li><a href="<?php echo home_url(); ?>/category/programming/website">Web制作</a></li>
				<li><a href="<?php echo home_url(); ?>/category/programming/github">GitHub</a></li>
				<li><a href="<?php echo home_url(); ?>/category/programming/python">Python</a></li>
				<li><a href="<?php echo home_url(); ?>/category/programming/firebase">Firebase</a></li>
			</ul>
		</li>
		<li itemprop="name"><a href="<?php echo home_url(); ?>/category/books" itemprop="url"><i class="fa fa-book" aria-hidden="true"></i> 読書</a></li>
		<li class="dropdown" itemprop="name">
			<a href="#" itemprop="url" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-leaf" aria-hidden="true"></i> LIFE <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo home_url(); ?>/category/life">ALL</a></li>
				<li><a href="<?php echo home_url(); ?>/category/life/senmon">専門学校</a></li>
			</ul>
		</li>
		<li itemprop="name"><a href="<?php echo home_url(); ?>/category/blog" itemprop="url"><i class="fa fa-pencil" aria-hidden="true"></i> ブログ運営</a></li>
		<li itemprop="name"><a href="<?php echo home_url(); ?>/category/activity-log" itemprop="url"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> はるの活動記録</a></li>
		<li itemprop="name"><a href="<?php echo home_url(); ?>/contact" itemprop="url"><i class="fa fa-envelope-o" aria-hidden="true"></i> お問い合わせ</a></li>
	</ul>
</nav>

