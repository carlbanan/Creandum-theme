<?php get_header(); ?>

<!-- LIST VIEW PAGE / FIRST PAGE INVEST CONTENT -->
<div class"top-post">
	<!-- Big picture -->
	<div class="page-content intro-about">	

		<!--<p class="large_invest_white"></p> -->
		<section class="small content-header-text wrapper clearfix container" itemprop="articleBody">
                  	 <div class='shadowop'>
                          <h1 class="small shadow">Blog archive.</h1>

                        </div>
                        <div>
                          <h1 class="small strip">Blog archive.</h1>

                        </div>

				</section>
	</div>
	<div class="responsive-wrapper">
		<div class="big-image-container"  style='background-image:url(<?php echo get_template_directory_uri(); ?>/images/news.png);'></div>
	</div>

</div>	

<div class='newspage infront'>
	<div class="lightgreen_bg">
		<div class='container'>
			<div id="content" class="clearfix row">
			
				<div id="main" class="col-sm-12 col-md-12 clearfix feed" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



						<?php get_template_part( 'list-content', get_post_format() ); ?>					
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
					    	<h1><?php _e("Not Found", "bonestheme"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
				
				<div class='clear padblock'></div>
			
    
			</div> <!-- end #content -->

		</div> <!-- CONTAINER -->	

	</div> <!-- BACKGROUND LIGHTGREEB -->	
</div>

<?php get_footer(); ?>