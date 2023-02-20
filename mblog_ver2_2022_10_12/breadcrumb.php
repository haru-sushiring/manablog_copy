<div class="container-fluid breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				
			<div class="breadcrumbs-inner" itemscope itemtype="http://schema.org/BreadcrumbList">
					<span class="" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
						
						<a href="<?php echo home_url(); ?>" itemprop="item">
							<span itemprop="name">HOME</span>
						</a>
						
				<meta itemprop="position" content="1" />
						> 
					</span>
					

					<?php if ( is_single() ) { ?>

						<span class="breadcrumbs" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
							<a href="<?php $cat = get_the_category(); echo get_category_link($cat[0]->cat_ID); ?>" itemprop="item">
								<span itemprop="name"><?php echo $cat[0]->name; ?></span>
							</a>
							
								<meta itemprop="position" content="2" />
							> 
						</span>					
					

					<?php } else { ?>
					<?php } ?>

					<span class="" style="color: #7B7B7B;font-size: 14px;font-weight: 300;" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name"><?php the_title(); ?></span><meta itemprop="position" content="3" /></span>

				</div>
			</div>
		</div>
	</div>
</div>