<?php if ( is_mobile() ) : ?>
<!-- スマホ用 -->
<nav class="pushy pushy-left">
<?php else: ?>
<!-- PC用 -->
<nav>
<?php endif; ?>

	<ul class="nav navbar-nav">
		<li itemprop="name" class="sp-none"><a href="<?php echo home_url(); ?>/" itemprop="url"><i class="fa fa-home" aria-hidden="true"></i></a></li>
		<li itemprop="name" class="pc-none"><a href="<?php echo home_url(); ?>/profile/" itemprop="url"><i class="fa fa-home" aria-hidden="true"></i> プロフィール</a></li>
		<li class="dropdown" itemprop="name">
			<a href="#" itemprop="url" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-line-chart" aria-hidden="true"></i> Menu01 <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo home_url(); ?>/seo/">Nav01</a></li>
				<li><a href="<?php echo home_url(); ?>/seo/">Nav01</a></li>
			</ul>
		</li>
		<li class="dropdown" itemprop="name">
			<a href="#" itemprop="url" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-code" aria-hidden="true"></i> Menu02 <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo home_url(); ?>/seo/">Nav01</a></li>
				<li><a href="<?php echo home_url(); ?>/seo/">Nav01</a></li>
			</ul>
		</li>
		<li itemprop="name"><a href="<?php echo home_url(); ?>/category/crypto-currency/" itemprop="url"><i class="fa fa-btc" aria-hidden="true"></i> Menu03</a></li>
		<li itemprop="name"><a href="<?php echo home_url(); ?>/category/travel/" itemprop="url"><i class="fa fa-plane" aria-hidden="true"></i> Menu04</a></li>
		<li itemprop="name"><a href="<?php echo home_url(); ?>/category/thought/" itemprop="url"><i class="fa fa-spinner" aria-hidden="true"></i> Menu05</a></li>
		<li itemprop="name"><a href="<?php echo home_url(); ?>/category/party/" itemprop="url"><i class="fa fa-glass" aria-hidden="true"></i> Menu06</a></li>
	</ul>
</nav>

