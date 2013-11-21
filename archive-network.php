
<?php get_header(); ?>
			
			
	<div id="async_content">
	
	<!-- AJAX CONTENT GOES HERE -->
	<?php
		if(SINGLEPOST == 1){
			$_template_file = get_template_directory()."/single-network-content.php";
			load_template( $_template_file);
		}
		else{
	?>
		<!-- LIST VIEW PAGE / FIRST PAGE INVEST CONTENT -->

		<div class="page-content intro">	
				<!--<p class="large_invest_white"></p> -->
				<section class="small oneline content-header-text wrapper clearfix container" itemprop="articleBody">
		                  	 <div class='shadowop'>
		                          <h1 class="small shadow">Meet some of the people we meet.</h1>
		                        </div>
		                        <div>
		                          <h1 class="small strip">Meet some of the people we meet.</h1>
		                        </div>
				</section>
		</div>
		<div class="big-image-container"  style='background-image:url(<?php echo get_template_directory_uri(); ?>/images/header-network.jpg);'></div>
		<div class="green_background"></div>
	<?php } ?>
	</div>

	<div id="hidden_content">
		<!-- HIDDEN CONTENTN IS STORED HERE -->
	</div>
			
<div class="network">
	<div class='lightgreen_bg infront'>

		<div id="content" page='network' class="clearfix clear">
		
			<div id="main" class="clearfix" role="main">
				
				<div class='filter-menu'>
					<span class='filter active' id=''>All</span>
					<?php
						$taxonomy = 'network_category';
						$tax_terms = get_terms($taxonomy);

						foreach ($tax_terms as $tax_term) {
							echo '<span class="filter" id="'.$tax_term->slug.'">' .$tax_term->name. '</span>';

						}
					?>
				</div>

				<div class="container">

					<div class="row">
		
						<?php
						  query_posts( array( 'post_type' => 'network') );
						  if ( have_posts() ) : while ( have_posts() ) : the_post();
							  // TAXONOMIES
							  $ts = get_the_terms( $post->ID, 'network_category');
							  $tax = "";
							  if($ts){
								  foreach($ts as $ax){
									$tax .= $ax->slug." ";
								  }
							  }
							  // CUSTOM META
							$postid = $post->ID;
							$linkurl = "";
							$linkurl = get_post_meta($postid,"custom_url",true);
						?>
						<div class="col-lg-3 col-md-4 clearfix network-post  filterable <?php echo $tax;?>" role="main">	
							
								<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
									
								<!--
								<a href="<?php the_permalink() ?>" class="async" rel="bookmark" title="<?php the_title_attribute(); ?>">
								-->			
									<section class="post_content">
										<a href="<?php echo $linkurl;?>" target="_blank">
											<?php the_post_thumbnail("wpbs-featured-network"); ?>
										
											<div class="tcontent">
											
												<h3><?php the_title(); ?></h3>
											
										
												<?php the_excerpt(); ?>
												<br/>
												Read more
											</div>
										</a>

									</section> <!-- end article section -->
								<!--
								</a>	
								-->


								</article> <!-- end article -->
							</a>

						</div>
					
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