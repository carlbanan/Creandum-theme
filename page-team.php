<?php /* Template Name: Team Page */ ?>

<?php get_header(); ?>



	<?php if (have_posts()): while (have_posts()) : the_post(); ?>


<div class='page-wrapper about'>

	
		<!-- Section -->
		<section>

			<!-- Article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<?php the_content(); ?>
				


				<div class="grey">
					<div class="wrapper">
						<div class="section">
							<div class='pagetitle alignright'>
								<h1 class='green'>The creandum team.</h1>
							</div>
							<div class='clear'></div>
							<div class="col sidebar">
								<div class="">
									<div class="">
										<h3 class='green italy smaller'>
											- “At Creandum we believe in a team approach where we all contribute to the success of our investments“
										</h3>
										<div class='c_icon icon_family green'>
											Our team
										</div>
									</div>
								</div>
							</div>

							<div class="col rest">

									<img src='<?php echo get_template_directory_uri(); ?>/img/bigimage/Creandum_team.jpg'/>
								
							</div>	
							
							<div class="clear"></div>

							<div class='reach'>
								<div class='con'>

								<div class="col four">
									<div class="c">
										<img src='<?php echo get_template_directory_uri(); ?>/img/family_green/family_creandum_fredrik_sq.jpg'>
										<div class='text'>
											<h3 class='green'>Andreas Cassel</h3>
											<p class='bold small'>
												Generel partner
											</p>
											<p class='small'>
												Fredrik has a background with Schibsted, Scandinavia Online and Eniro, which has brought him significant experience from building media- and Internet businesses across Europe.
												<p class='bold small green-light'>Read more <i class='icon-arrow-right green-light'></i></p>

											</p>	
										</div>
									</div>
								</div>
								<div class="col padz"></div>
								<div class="col four">
									<div class="c">
										<img src='<?php echo get_template_directory_uri(); ?>/img/family_green/johan_brenner_creandum_sq.jpg'>
										<div class='text'>
											<h3 class='green'>Johan Brenner</h3>
											<p class='bold small'>
												Generel partner
											</p>
											<p class='small'>
												Daniel brings solid start-up experience from the software and telecom industry.
												<p class='bold small green-light'>Read more <i class='icon-arrow-right green-light'></i></p>
											</p>

										</div>
									</div>
								</div>
								<div class="col padz"></div>
								<div class="col four">
									<div class="c">
										<img src='<?php echo get_template_directory_uri(); ?>/img/family_green/family_creandum_haug_sq.jpg'>
										<div class='text'>
											<h3 class='green'>Martin Hauge</h3>
											<p class='bold small'>
												Generel partner
											</p>
											<p class='small'>
												Martin is an entrepreneur and co-founder of several startups in Scandinavia. Among them Interaction Design and Creuna.
												<p class='bold small green-light'>Read more <i class='icon-arrow-right green-light'></i></p>
											</p>	
										</div>
									</div>
								</div>
								<div class="col padz"></div>
								<div class="col four">
									<div class="c">
										<img src='<?php echo get_template_directory_uri(); ?>/img/family_green/daniel_blomquist_creandum_sq.jpg'>
										<div class='text'>
											<h3 class='green'>Daniel Blomquist</h3>
											<p class='bold small'>
												Principal
											</p>
											<p class='small'>
											Daniel brings solid start-up experience from the software and telecom industry.
											</p>	
										</div>
									</div>
								</div>	


							</div>		

							</div>
			
							<br class="clear">
			


							<div class='reach'>
								<div class='con'>

	
								<div class="col four">
									<div class="c">
										<img src='<?php echo get_template_directory_uri(); ?>/img/family_green/family_creandum_Andres.jpg'>
										<div class='text'>
											<h3 class='green'>Andreas Cassel</h3>
											<p class='bold small'>
												Generel partner
											</p>
											<p class='small'>
												Fredrik has a background with Schibsted, Scandinavia Online and Eniro, which has brought him significant experience from building media- and Internet businesses across Europe.
											</p>	
										</div>
									</div>
								</div>
								<div class="col padz">
								</div>
								<div class="col four">
									<div class="c">
										<img src='<?php echo get_template_directory_uri(); ?>/img/family_green/daniel_blomquist_creandum_sq.jpg'>
										<div class='text'>
											<h3 class='green'>Andreas Cassel</h3>
											<p class='bold small'>
												Generel partner
											</p>
											<p class='small'>
												Fredrik has a background with Schibsted, Scandinavia Online and Eniro, which has brought him significant experience from building media- and Internet businesses across Europe.
											</p>	
										</div>
									</div>
								</div>
								<div class="col padz">
								</div>
								<div class="col four">
									<div class="c">
										<img src='<?php echo get_template_directory_uri(); ?>/img/family_green/johan_brenner_creandum_sq.jpg'>
										<div class='text'>
											<h3 class='green'>Andreas Cassel</h3>
											<p class='bold small'>
												Generel partner
											</p>
											<p class='small'>
												Fredrik has a background with Schibsted, Scandinavia Online and Eniro, which has brought him significant experience from building media- and Internet businesses across Europe.
											</p>	
										</div>
									</div>
								</div>
								<div class="col padz">
								</div>
								<div class="col four">
									<div class="c">
										<img src='<?php echo get_template_directory_uri(); ?>/img/family_green/family_creandum_Andres.jpg'>
										<div class='text'>
											<h3 class='green'>Andreas Cassel</h3>
											<p class='bold small'>
												Generel partner
											</p>
											<p class='small'>
												Fredrik has a background with Schibsted, Scandinavia Online and Eniro, which has brought him significant experience from building media- and Internet businesses across Europe.
											</p>	
										</div>
									</div>
								</div>	


							</div>		

							</div>



						<br class="clear">				
								</div>		

							</div>

						<br class="clear">					

						</div>
					</div>
				</div>


				<br class="clear">

				</div>



				<br class='clear'/>			
				
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



