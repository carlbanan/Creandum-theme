<?php get_header(); ?>
			
	<div id="content" class="clearfix row">
		<div class="big-image-container">
			<h1><span>Network</span></h1>
		</div>	
		<div class='lightgreen_bg'>		
			<div class='container padblock'  id="main" >
		
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="col-lg-3 col-md-4 clearfix network-post" role="main">	
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
								
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