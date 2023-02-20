<?php if ( is_mobile() ) : ?>
<!-- スマホ用 -->
<nav class="pushy pushy-left">
<?php else: ?>
<!-- PC用 -->
<nav>
<?php endif; ?>

	<ul class="nav navbar-nav">
		<li itemprop="name" class="sp-none"><a href="<?php echo home_url(); ?>/" itemprop="url"><span class="icon-home"></span></a></li>
		<li itemprop="name" class="pc-none"><a href="<?php echo home_url(); ?>/profile" itemprop="url"><span class="icon-home"></span> プロフィール</a></li>
		<li class="dropdown" itemprop="name">
			<a href="#" itemprop="url" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="icon-code"></span> プログラミング <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo home_url(); ?>/category/programming">ALL</a></li>
				<li><a href="<?php echo home_url(); ?>/category/programming/website">Web制作</a></li>
				<li><a href="<?php echo home_url(); ?>/category/programming/github">GitHub</a></li>
				<li><a href="<?php echo home_url(); ?>/category/programming/python">Python</a></li>
				<li><a href="<?php echo home_url(); ?>/category/programming/firebase">Firebase</a></li>
				<li><a href="<?php echo home_url(); ?>/category/programming/engineer-employment">エンジニア就職・就活</a></li>
				<li><a href="<?php echo home_url(); ?>/category/programming/beginner">プログラミング初心者</a></li>
				<li><a href="<?php echo home_url(); ?>/category/programming/programming-school">プログラミングスクール</a></li>
			</ul>
		</li>
		<li class="dropdown" itemprop="name">
			<a href="#" itemprop="url" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="icon-leaf"></span> LIFE <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo home_url(); ?>/category/life">ALL</a></li>
				<li><a href="<?php echo home_url(); ?>/category/life/university-life">大学生活</a></li>
				<li><a href="<?php echo home_url(); ?>/category/life/entrance-examination">大学受験</a></li>
			</ul>
		</li>
		<li itemprop="name"><a href="<?php echo home_url(); ?>/category/books" itemprop="url"><span class="icon-book"></span> 読書</a></li>
		<li class="dropdown" itemprop="name">
			<a href="#" itemprop="url" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="icon-bitcoin"></span> 仮想通貨 <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo home_url(); ?>/category/crypto-currency">ALL</a></li>
				<li><a href="<?php echo home_url(); ?>/category/crypto-currency/nftgame">NFTゲーム</a></li>
			</ul>
		</li>
		<li itemprop="name"><a href="<?php echo home_url(); ?>/category/blog" itemprop="url"><span class="icon-pencil"></span> ブログ運営</a></li>
		<li itemprop="name"><a href="<?php echo home_url(); ?>/contact" itemprop="url"><span class="icon-envelope-o"></span> お問い合わせ</a></li>
	</ul>
</nav>

