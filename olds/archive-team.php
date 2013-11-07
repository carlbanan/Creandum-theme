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
		<div class="big-image-container">

		</div>
		<div class="container padblock page-content">	
            <header>
              
              <div class="page-header">
              	<h1 class="single-title center" itemprop="headline">Team</h1>
              </div>
                   
            </header> <!-- end article header -->
          
            <section class="post_content center clearfix" itemprop="articleBody">
            <p>
           	The people behind creandum and our investments.
            </p>
			</section>

		</div>
	<?php } ?>

	</div>
	<div id="hidden_content">
		<!-- HIDDEN CONTENTN IS STORED HERE -->
	</div>

	<div class='lightgreen_bg padblock'>

		<div class="container">

			<div id="content" page='team' class="clearfix clear">
			
				<div id="main" class="row clearfix" role="main">

					<?php
					  query_posts( array( 'post_type' => 'team') );
					  if ( have_posts() ) : while ( have_posts() ) : the_post();
					?>
											
					<div id="post-<?php the_ID(); ?>" <?php post_class('col-md-3  col-lg-3  col-sm-6'); ?> role="article">
							
						<a href="<?php the_permalink() ?>"  select="post_<?php the_ID();?>" class='async' rel="bookmark" title="<?php the_title_attribute(); ?>">		
								
							<?php 
								$postid = $post->ID;
								$portrait = "";
								$portrait = get_post_meta($postid,"custom_portrait_image",true);	
								?>
								<div class="portrait_list">
									<img src="<?php echo $portrait;?>" alt="<?php the_title();?>">
									<div class='content'></div>
									<h3 class="h2"><?php the_title(); ?></h3>
									<span class='title'><?php echo get_post_meta($postid,"custom_title",true); ?></span>
								</div>
								<?php

							?>
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
			
				</div> <!-- end #main -->
    
				
			</div> <!-- end #content -->
		</div>
	</div>

<?php get_footer(); ?>