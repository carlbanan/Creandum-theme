<?php /* Template Name: Contact Page */ ?>

<?php get_header(); ?>




<!-- Big picture -->



 <div class='content-header-text fixedheight wrapper container'>
   <div class='shadowop'>
    
    <h1 class="shadow">Are you building</h1><br>
    <h1 class="shadow">the next big company?</h1><br>

  </div>
  <div>
   	 <h1 class="strip">Are you building</h1><br>
    <h1 class="strip">the next 	big company?</h1><br>
   
  </div>
  <div class='subtext'>	
	<h3>
		The best way to contact us is throug someone in our connected network. The second best way is to give
		us the 140 charachter pitch. We get contacted by over 600 billion companies every year, we invest in all of them.
	</h3>
	</div>

	
</div>
<div class="big-image-container" style='background:#3da955;'></div>

<div class='page-wrapper contact'>

	<!-- Wrapper -->

	<div class="lightgreen_bg">
		<div class="container padblock">
			<div class='forms'>
				<span class='icon icon-contact'></span>
				<p class="center">
					We read all pitches, but make sure you take the time to formulate your elevator pitch. 
					We get contacted by 800+ companies a year and are use to high standards.
				</p>

				<form id="pitch" class="pitchform" url="<?php bloginfo('template_url'); ?>/sendForm.php">
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="right">
								<span for="problem" class="counter">0 / 140</span>
							</div>
							<textarea id="problem"  name="problem" maxlength="140" placeholder="What problem does your startup solve?"></textarea>
							
							<div class="right">
								<span for="market" name="problem"class="counter" max="140">0 / 140</span>
							</div>
							<textarea id="market" name="market" maxlength="140" placeholder="How big is your market for your solution?"></textarea>
							
							<div class="right">
							<span for="team" class="counter" max="140">0 / 140</span>
							</div>
							<textarea id="team" maxlength="140" name="team" placeholder="What makes your team so great?"></textarea>

							<label>In what stage is your company in?</label>
							<div class="checkform">
								<input type="hidden" id="stage" value="seed"  name="stage"/>
								<div class="checkbox active" value="seed">
									<span>
										Seed<br/>
										(Rasing up to €1M)
									</span>
								</div>
								<div class="checkbox" value="early">
									<span>
										Early A<br/>
										(Rasing €1-5M)
									</span>
								</div>
								<div class="checkbox" value="late">
									<span>
										Late A<br/>
										(Rasing €5-10M)
									</span>
								</div>
								<div class="checkbox" value="expansion">
									<span>
										Expansion<br/>
										(More than €10M)
									</span>
								</div>
								<div class="checkbox" value="other">
									<span>
										Other
									</span>
								</div>
							</div> <!-- CLOSE STAGE GROUP -->

							<label>What sector are you in?</label>
							<div class="checkform">
								<input type="hidden" id="sector" value="" name="sector"/>
								<div class="checkbox" value="consumer">
									<span>
										Consumer Software / Internet
									</span>
								</div>
								<div class="checkbox" value="software">
									<span>
										Enterprise software
									</span>
								</div>
								<div class="checkbox" value="hardware">
									<span>
										Hardware
									</span>
								</div>
								<div class="checkbox" value="other">
									<span>
										Other
									</span>
								</div>

							</div> <!-- CLOSE SECTOR GROUP -->

							<span for="other" class="counter"></span>
							<textarea id="other" placeholder="Other ( optional )" name="other"></textarea>

							<input type="text" id="reference" name="reference" placeholder="Reference person (optional)" />

						</div><!-- END 12 COL -->
						<div class="col-md-6 col-lg-6">
							<input type="text" id="name" name="name" placeholder="Your name" class="col-6"/>
						</div>

						<div class="col-md-6 col-lg-6">
							<input type="text" id="company" name="company" placeholder="Your startup's name"  class="col-6"/>										
						</div>
						<div class="col-md-6 col-lg-6">
							<input type="text" id="website" name="website" placeholder="Website"  class="col-6"/>
						</div>
						<div class="col-md-6 col-lg-6">
							<input type="text" id="email" name="email" placeholder="Your e-mail"  class="col-6"/>	
						</div>
					</div><!-- END ROW -->

					<input type="submit" id="sendform" class="sendform btn btn-default green_bg white" value="Send"/>
					<div id="dialog" class="dialog"></div>
				</form>									

			</div>				
		</div>
	</div>
</div>
			

		

	<!-- /Wrapper -->

<?php get_footer(); ?>



