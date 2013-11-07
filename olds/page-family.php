<?php /* Template Name: Family Page */ ?>

<?php get_header(); ?>



	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

<!-- Big picture -->
<div class='content-header-wrap'>
	<div class='content-header bigimage' style='background-image:url(<?php echo get_template_directory_uri(); ?>/img/bigimage/overhead-hi-res.jpg);'>
	</div>
	<div class='content-header-text align-center'>
		<div>
			<h1> -The Creandum family.</h1>
			<h2>Creandum is not the average investment company. With years of experience and a great network of talents,
			we offer the best consultancy for your business.</h2>
		</div>
	</div>
</div>


<div class='page-wrapper family'>

	<div class='darkborder'>

	</div>
	
	<div class='goscroll'>Scroll down and get to know us</div>
	<!-- Wrapper -->

		
		<!-- Section -->
		<section>

			<!-- Article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<?php the_content(); ?>
				

			
			<div class="wrapper">
				<div class="section" style='padding-top:00px'>
					<div class="col four">
						<div class='c fam'>
							<div class='c_icon icon_glasses'></div>
							<h3>- As a creandum portfolio company, </h3>
							<p class='bread'>
								You are always welcome to swing by our office to discuss challenges for you status or just hang in our kitchen drinking coffee.
							</p>
						</div>
					</div>
					<div class="col four">
						<div class='c fam'>
							<div class='c_icon icon_papers'></div>
							<h3>- By being part of our family, </h3>
							<p class='bread'>
								You are always welcome to swing by our office to discuss challenges for you status or just hang in our kitchen drinking coffee.
							</p>
						</div>
					</div>
					<div class="col four">
						<div class='c fam'>
							<div class='c_icon icon_wheel'></div>
							<h3>- When you have specific problems, </h3>
							<p class='bread'>
								You are always welcome to swing by our office to discuss challenges for you status or just hang in our kitchen drinking coffee.
							</p>
						</div>
					</div>
					<div class="col four">
						<div class='c fam'>
							<div class='c_icon icon_chat'></div>
							<h3>- We are encouraging our portfolio startups </h3>
							<p class='bread'>
								You are always welcome to swing by our office to discuss challenges for you status or just hang in our kitchen drinking coffee.
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class='grey'>
				<div class="wrapper">
					
					<div class="section">
						<div class='head'>
							<h1 class='center green' style='font-size:30px;'>
								- Discover our family blog
							</h1>
						</div>
						<div class="col two">
							<div class="c">
								<img src='<?php echo get_template_directory_uri(); ?>/img/family/hampus.jpg' class='radius-top'/>
								<div class='family-content radius-bottom'>	
									<h3 class=''>
										Hampus Jakobsson
									</h3>								
									<p class='dark'>
										Dexplora
									</p>
									
									<p>
										At Videoplaza we really want you to democratically win as a video advertiser. We want videoads to win. 
									</p>
									<p class='dark'>
										Read more <i class='icon-arrow-right'></i>
									</p>
								</div>
							</div>
						</div>
						<div class="col two">
							<div class="c">
								<img src='<?php echo get_template_directory_uri(); ?>/img/family/ek.jpg'  class='radius-top'/>
								<div class='family-content radius-bottom'>	


									<h3 class=''>
										Daniel Ek
									</h3>
									<p class='dark'>
										Spotify
									</p>
									
									<p>
										"At spotify we really want you to democratically win as muscian. We want to win because your music is the best music."
									</p>
									<p class='dark'>
										Read more <i class='icon-arrow-right'></i>
									</p>

								</div>					
							</div>
						</div>
						<div class="clear"></div>
					</div>


					<div class="section">
						<div class="col two">
							<div class="c">
								<img src='<?php echo get_template_directory_uri(); ?>/img/family/mat.jpg'  class='radius-top'/>
								<div class='family-content radius-bottom'>	
									<h3 class=''>
										Alfred Ruth
									</h3>								
									<p class=' dark'>
										Linas matkasse
									</p>
									
									<p>
										At Videoplaza we really want you to democratically win as a video advertiser. 
									</p>
									<p class='dark '>
										Read more <i class='icon-arrow-right'></i>
									</p>
								</div>	
							</div>							
						</div>
						<div class="col two">
							<div class="c">
								<img src='<?php echo get_template_directory_uri(); ?>/img/family/lina.jpg'  class='radius-top'/>
								<div class='family-content radius-bottom'>	
									<h3 class=''>
										Martina Elm
									</h3>								
									<p class=' dark'>
										Tripbirds
									</p>
									
									<p>
										At Videoplaza we really want you to democratically win as a video advertiser. 
									</p>
									<p class='dark '>
										Read more <i class='icon-arrow-right'></i>
									</p>	
								</div>						

							</div>
						</div>
						<div class="clear"></div>
					</div>


					<div class="section">
						<div class="col two">
							<div class="c">
								<img src='<?php echo get_template_directory_uri(); ?>/img/family_green/Niklas_Aronsson_linas_lng.jpg' class='radius-top'/>
									<div class='family-content radius-bottom'>	
									<h3 class=''>
										Alfred Ruth
									</h3>								
									<p class='dark'>
										Linas matkasse
									</p>
									
									<p>
										At Videoplaza we really want you to democratically win as a video advertiser. 
									</p>
									<p class='dark '>
										Read more <i class='icon-arrow-right'></i>
									</p>	
								</div>
							</div>							
						</div>
						<div class="col two">
							<div class="c">
								<img src='<?php echo get_template_directory_uri(); ?>/img/family_green/Martina_Elm_tripbirds_lng.jpg' class='radius-top'/>
								<div class='family-content radius-bottom'>	
									<h3 class=''>
										Martina Elm
									</h3>								
									<p class='dark'>
										Tripbirds
									</p>
									
									<p>
										At Videoplaza we really want you to democratically win as a video advertiser. 
									</p>
									<p class='dark'>
										Read more <i class='icon-arrow-right'></i>
									</p>							
								</div>
							</div>


						</div>
						<div class="clear" style='height:90px;'></div>
					</div>

				<br class='clear'/>			

				
				</div>


				<br class='clear'/>			
			</div>


			</article>
			<!-- /Article -->

		</section>
		<!-- /Section -->

	
</div>
			
		<?php endwhile; ?>
		
		<?php else: ?>
		
			<!-- Article -->
			<article>
				
				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
				
			</article>
			<!-- /Article -->
		
		<?php endif; ?>
		

	<!-- /Wrapper -->

<?php get_footer(); ?>



