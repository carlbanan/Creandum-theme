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
				<section class="post_content center clearfix" itemprop="articleBody">

				<h2>
				 Our ambition is to help build market leaders.
				</h2>
		</div>
		<div class="big-image-container"></div>
		<div class="green_background"></div>
	</div>	
	<?php } ?>
	</div>

	<div id="hidden_content">
		<!-- HIDDEN CONTENTN IS STORED HERE -->
	</div>

	<div class='lightgreen_bg investpadblock infront'>

			<div id="content" page='investment' class="clearfix clear">
			
				<div id="main" class="clearfix" role="main">

					<div class='filter-menu'>
						<span class='filter active' id=''>All</span>
						<span class='filter' id='hardware'>Hardware companies</span>
						<span class='filter' id='software'>Software companies</span>
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
												
						<div id="post-<?php the_ID(); ?>" <?php post_class('col-md-3  col-lg-3  col-sm-6 filterable '.$tax); ?> role="article">
								
							<a href="<?php the_permalink() ?>"  select="post_<?php the_ID();?>" class='async' rel="bookmark" title="<?php the_title_attribute(); ?>">		
									
								<?php 
									$postid = $post->ID;
									$portrait = "";
									$portrait = get_post_meta($postid,"custom_logo_image",true);	
									?>
									<div class="portrait_list">
										<div class='over'>
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

<?php get_footer(); ?>