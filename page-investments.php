<?php /* Template Name: Investments Page*/ ?>

<?php get_header(); ?>



	<?php if (have_posts()): while (have_posts()) : the_post(); ?>


<div class='page-wrapper invest'>

	
		<!-- Section -->
		<section>

			<!-- Article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<?php the_content(); ?>
				


				<div class="grey">
					<div class="wrapper">
						<div class="section">
							<div class='pagetitle alignright'>
								<h1 class='green'>- Our investments.</h1>
							</div>
							<div class='clear'></div>

							<div class="col two table">
								<div class='cell'>
									We invest in fast growing companies with outstanding teams and compelling offerings in eary- and later stages.
								</div>
							</div>
							<div class="col four">
								<div class='logoimg'></div>
							</div>
							<div class="col four">
								<div class='logoimg'></div>
							</div>
							<div class="col four">
								<div class='logoimg'></div>
							</div>
							<div class="col four">
								<div class='logoimg'></div>
							</div>
							<div class="col four">
								<div class='logoimg'></div>
							</div>
							<div class="col four">
								<div class='logoimg'></div>
							</div>
							<div class="col four">
								<div class='logoimg'></div>
							</div>
							<div class="col four">
								<div class='logoimg'></div>
							</div>
							<div class="col four">
								<div class='logoimg'></div>
							</div>
							<div class="col four">
								<div class='logoimg'></div>
							</div>


						<br class="clear">	
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



