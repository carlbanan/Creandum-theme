<?php get_header(); ?>
			
			
	<div id="async_content">
	
	<!-- AJAX CONTENT GOES HERE -->
	<?php
		if(SINGLEPOST == 1){
			$_template_file = get_template_directory()."/single-investment-content.php";
			load_template( $_template_file);
		}
		else{
	?>
	
	<!-- LIST VIEW PAGE / FIRST PAGE INVEST CONTENT -->
	<div class"top-post">
		<div class="page-content intro">	
				<!--<p class="large_invest_white"></p> -->
				<section class="small content-header-text wrapper clearfix container" itemprop="articleBody">
		                  	 <div class='shadowop'>
		                          <h1 class="small shadow">Our ambition is to help build</h1>
		                          <br><h1 class="small shadow">market leaders.</h1>
		                        </div>
		                        <div>
		                          <h1 class="small strip">Our ambition is to help build</h1>
		                          <br><h1 class="small strip">market leaders.</h1>
		                        </div>

				</section>

		</div>
		<div class="responsive-wrapper">
			<div class="big-image-container"  style='background-image:url(<?php echo get_template_directory_uri(); ?>/images/investments.png);'></div>
		</div>
	</div>	
	<?php } ?>
	</div>

	<div id="hidden_content">
		<!-- HIDDEN CONTENTN IS STORED HERE -->
	</div>

<div class="investments">
	<div class='lightgreen_bg investpadblock infront'>

			<div id="content" page='investment' class="clearfix clear">
			
				<div id="main" class="clearfix" role="main">
				
				<div class='filter-menu orig-filter' <?php if(SINGLEPOST == 1){ echo "style='display:none;'"; } ?>>
					<span class='prev left'></span>
					<span class='filter active' id=''>All</span>
					<span class='filter' id='hardware'>Hardware</span>
					<span class='filter' id='software'>Software</span>
					<span class='filter' id='consumer'>Consumer</span>
					<span class='next right'></span>
				</div>
		
				<div class="container">

					<div class="row">	
						<?php
						  query_posts( array( 'post_type' => 'investment') );
						  if ( have_posts() ) : while ( have_posts() ) : the_post();

						  // TAXONOMIES
						  $ts = get_the_terms( $post->ID, 'investment_category');
						  $tax = "";
						  if($ts){
							  foreach($ts as $ax){
								$tax .= $ax->slug." ";
							  }
						  }
						?>
												
						<div id="post-<?php the_ID(); ?>" <?php post_class('col-xs-6 col-md-3  col-lg-3  col-sm-4 filterable '.$tax); ?> role="article">
								
							<a href="<?php the_permalink() ?>"  select="post_<?php the_ID();?>" class='async' rel="bookmark" title="<?php the_title_attribute(); ?>">		
									
								<?php 
									$postid = $post->ID;
									$portrait = "";
									$portrait = get_post_meta($postid,"custom_logo_image",true);	
									?>
									<div class="portrait_list">
										<div class='over hidemobile'>
											<button type="button" class="btn btn-default btn-white"><?php the_title();?></button>
										</div>
										<img src="<?php echo $portrait;?>" alt="<?php the_title();?>">
									</div>

			
							</a>
						</div> <!-- end article -->
						
						<?php endwhile; ?>	
						
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
									
						
						<?php else : ?>
						
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
						
						<?php endif; ?>
				
					</div> <!-- end row -->
					
				</div> <!-- end main -->

			</div> <!-- end content -->
		
		</div> <!-- end container -->
	
	</div> <!--end lightgreen_bg-->
</div>

<?php get_footer(); ?>