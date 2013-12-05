<?php get_header(); ?>

	<div id="async_content">
		
		<!-- AJAX CONTENT GOES HERE -->
		<?php
			if(SINGLEPOST == 1){
				$_template_file = get_template_directory()."/single-team-content.php";
				load_template( $_template_file);
			}
			else{
				?>
		<!-- LIST VIEW PAGE / FIRST PAGE INVEST CONTENT -->
		<div class"top-post">
				<!-- Big picture -->
				<div class="page-content intro-about">	
								<!--<p class="large_invest_white"></p> -->
							<section class="small content-header-text wrapper clearfix container hidemobile" itemprop="articleBody">
		                  	 <div class='shadowop'>
		                          <h1 class="small shadow">This is team Creandum and also</h1>
		                          <br><h1 class="small shadow">a great part of somewhat 60 companies.</h1>
		                        </div>
		                        <div>
		                          <h1 class="small strip">This is team Creandum and also</h1>
		                          <br><h1 class="small strip">a great part of somewhat 60 companies.</h1>
		                        </div>
							</section>

							<section class="small content-header-text wrapper clearfix container showmobile mobile-team-title" itemprop="articleBody">
		                  	 <div class='shadowop'>
		                          <h1 class="small shadow">This is team Creandum</h1>
		                        </div>
		                        <div>
		                          <h1 class="small strip">This is team Creandum</h1>
		                        </div>
							</section>


						</div>
						<div class="responsive-wrapper">
							<div class="big-image-container"  style='background-image:url(<?php echo get_template_directory_uri(); ?>/images/about_picture.png);'></div>
						</div>	
				</div>	
	</div>	
<?php } ?>

</div>
<div id="hidden_content">
	<!-- HIDDEN CONTENTN IS STORED HERE -->
</div>
<div class="team">
	<div class='lightgreen_bg infront'>

			<div id="content" page='team' class="clearfix clear">
			
				<div id="main" class="clearfix" role="main">


						<?php
						  query_posts( array( 'post_type' => 'team') );
						  $team = array();
						  $menuitem = array();
						  if ( have_posts() ) : while ( have_posts() ) : the_post();

						  	// FOR MENU
						    $pos = $posclass = "";
						  	$pos = get_post_meta($post->ID,"custom_title",true);
						  	$posclass = str_replace(" ","-",$pos);
						  	$posclass = str_replace("&","",$posclass);
						  	$posclass = urldecode($posclass);
						  	$menuitem[$posclass] = $pos;

						  	// FOR LISTING
						  	$post->cotitle = $posclass;
						  	$post->h4title = $pos;
						  	array_push($team,$post);

						  endwhile;
						  endif;
							  if($menuitem){
							  	?>
								<div class='filter-menu orig-filter'>
									<span class='prev left'></span>
									<span class='filter active' id=''>All</span>
							  	<?php
								  	foreach($menuitem as $key => $value){
								  		echo '<span class="filter" id="'.$key.'">' .$value. '</span>';
								  	}
							  	?>
									<span class='next right'></span>
							  	</div>	<!--END FILTER -->
							  	<?php
							  }
					?>
				<div class="container">	
					<div class="row">
					<?php
						  if($team){
						  	foreach($team as $post){
						?>


						<div id="post-<?php the_ID(); ?>" <?php post_class('col-xs-6 col-md-3  col-lg-3  col-sm-4 filterable '.$post->cotitle); ?> role="article">
								
							<a href="<?php the_permalink() ?>"  select="post_<?php the_ID();?>" class='async' rel="bookmark" title="<?php the_title_attribute(); ?>">		
									
								<?php 
									$postid = $post->ID;
									$portrait = "";
									$portrait = get_post_meta($postid,"custom_portrait_image",true);	
									?>
									<div class="portrait_list">
										<div class='over'>
											<div class="team-title">
												<h3><?php the_title();?></h3>
												<h4><?php echo $post->h4title;?>
											</div>
										</div>
										<img src="<?php echo $portrait;?>" alt="<?php the_title();?>">
									</div>
									<div class="showmobile"><h3><?php the_title();?></h3></div>
									<?php

								?>
							</a>
						</div> <!-- end article -->
						
						<?php } ?>	
						
						<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
							
							<?php page_navi(); // use the page navi function ?>

						<?php } else { // if it is disabled, display regular wp prev & next links ?>
							<nav class="wp-prev-next">
								<ul class="clearfix list-unstyled">
									<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
									<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
								</ul>
							</nav>
						<?php } ?>
									
						
						<?php }else{ ?>
						
						<article id="post-not-found">
						    <header>
						    	<h1><?php _e("No Posts Yet", "bonestheme"); ?></h1>
						    </header>
						    <section class="post_content">
						    	<p><?php _e("Sorry, What you were looking for is not here.", "bonestheme"); ?></p>
						    </section>
						    <footer>
						    </footer>
						</article>
						
						<?php } ?>
				
					</div> <!-- end row -->
					
				</div> <!-- end main -->

			</div> <!-- end content -->
		
		</div> <!-- end container -->
	
	</div> <!--end lightgreen_bg-->

</div> <!-- END TEAM -->

<?php get_footer(); ?>