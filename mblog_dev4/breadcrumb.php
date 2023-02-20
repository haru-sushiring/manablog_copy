<div class="container-fluid breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="breadcrumbs-inner">

					<!-- <span class="" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"> -->
					<span class="" itemscope itemtype="http://schema.org/ListItem">
						<a href="<?php echo home_url(); ?>" itemprop="url">
							<span itemprop="title">HOME</span>
						</a>&gt;&nbsp;
					</span>

					<?php if ( is_single() ) { ?>

						<!-- <span class="breadcrumbs" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"> -->
						<span class="breadcrumbs" itemscope itemtype="http://schema.org/ListItem">
							<a href="<?php $cat = get_the_category(); echo get_category_link($cat[0]->cat_ID); ?>" itemprop="url">
								<span itemprop="title"><?php echo $cat[0]->name; ?></span>
							</a>&gt;&nbsp;
						</span>

					<?php } else { ?>
					<?php } ?>

					<strong style="color: #7B7B7B;font-size: 14px;font-weight: 300;"><?php the_title(); ?></strong>

				</div>
			</div>
		</div>
	</div>
</div>
