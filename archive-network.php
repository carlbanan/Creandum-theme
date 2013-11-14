
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
				<p class="large_invest_white"></p>
				<section class="post_content center clearfix" itemprop="articleBody">
				<h2>
				 Stories from our Network.
				</h2>
				</section>
		</div>
		<div class="big-image-container"></div>
		<div class="green_background"></div>
	<?php } ?>
	</div>

	<div id="hidden_content">
		<!-- HIDDEN CONTENTN IS STORED HERE -->
	</div>
			
	<div class=' lightgreen_bg padblock'>
		<div class="container">
			<div id="content" page='network' class="clearfix clear">
		
				<?php
					  query_posts( array( 'post_type' => 'network') );
					  if ( have_posts() ) : while ( have_posts() ) : the_post();
				?>
				<div class="col-lg-3 col-md-4 clearfix network-post" role="main">	
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
					<a href="<?php the_permalink() ?>" class="async" rel="bookmark" title="<?php the_title_attribute(); ?>">
								
						<section class="post_content">
						
							<?php the_post_thumbnail("thumbnal-size"); ?>
							<div class="tcontent">
								<h3><?php the_title(); ?></h3>
							
								<?php the_excerpt(); ?>
							</div>

						</section> <!-- end article section -->
						
					</a>	


					</article> <!-- end article -->

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
		
			</div> <!-- END lightgreen_bg -->

		</div> <!-- end #container -->
	
	</div> <!-- end #content -->

<?php get_footer(); ?>