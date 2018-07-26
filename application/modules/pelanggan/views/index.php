<section class="page-header page-header-color page-header-primary page-header-float-breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="mt-xs"><?php echo $breadcumb ?> <span><?php echo $title ?></span></h1>
				<ul class="breadcrumb breadcrumb-valign-mid">
					<li><a href="#">Home</a></li>
					<li class="active"><?php echo $breadcumb ?></li>
				</ul>
			</div>
		</div>
	</div>
</section>

	<div class="container">

		<div class="row">
			<div class="col-md-9">
				<div class="blog-posts">
					<?php 
						foreach ($data as $key ) {
					?>
						<article class="post post-large">
							<div class="post-image">
								<div class="owl-carousel owl-theme" data-plugin-options="{'items':1}">
									<div>
										<div class="img-thumbnail">
											<img class="img-responsive" src="<?php echo base_url() ?>assets/uploads/pelanggan/<?php echo $key->id?>/<?php echo $key->images ?>" alt="<?php echo $key->title ?>" class="img-responsive">
					
										</div>
									</div>
									
								</div>
							</div>

							<div class="post-date">
								<span class="day">10</span>
								<span class="month">Jan</span>
							</div>

							<div class="post-content">

								<h2><a href="<?php echo base_url()."pelanggan/detail/".$key->id."/".url_title($key->title) ?>"><?php echo $key->title; ?></a></h2>
								<p><?php echo $key->content; ?></p>
								

							</div>
						</article>
					<?php	
						}
					?>
					


			

				<!-- 	<ul class="pagination pagination-lg pull-right">
						<li><a href="#">«</a></li>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">»</a></li>
					</ul> -->

				</div>
			</div>

			<div class="col-md-3">
				<aside class="sidebar">
				
				
				
					<div class="tabs mb-xlg">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#popularPosts" data-toggle="tab"><i class="fa fa-star"></i> Popular</a></li>
							
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="popularPosts">
								<ul class="simple-post-list">
									<?php
                                    	foreach ($this->news_side_bar as $key) {
                                     ?>
                                     	<li>
											<div class="post-image">
												<div class="img-thumbnail">
													<a href="<?php echo base_url()."news/detail/".$key->id."/".url_title($key->title) ?>">
														<img src="<?php echo base_url() ?>assets/uploads/news/<?php echo $key->id?>/<?php echo $key->images ?>" width="100%">
													</a>
												</div>
											</div>
											<div class="post-info">
												<a href="blog-post.html"><?php echo $key->title; ?></a>
												
											</div>
										</li>
                                     <?php
                                 		}
                                     ?>
									
								
								</ul>
							</div>
							
						</div>
					</div>
				
					<hr>
				
				
				</aside>
			</div>
		</div>

	</div>


