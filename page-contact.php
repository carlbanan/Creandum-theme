<?php /* Template Name: Contact Page */ ?>

<?php get_header(); ?>




<!-- Big picture -->

<div class="responsive-wrapper">

	<div class"top-post">
		<div class="page-content intro">	
				<!--<p class="large_invest_white"></p> -->
				<section class="small content-header-text wrapper clearfix container" itemprop="articleBody">
		                  	 <div class='shadowop'>
		                          <h1 class="small shadow">Are you building</h1>
		                          <br><h1 class="small shadow">the company of tomorrow?</h1>
		                        </div>
		                        <div>
		                          <h1 class="small strip">Are you building</h1>
		                          <br><h1 class="small strip">the company of tomorrow?</h1>
		                        </div>

				</section>

		</div>
	
</div>
	<div class="contact">
		<div class="big-image-container contact"  style='background-image:url(<?php echo get_template_directory_uri(); ?>/images/laptop.png);'></div>
	</div>
</div>

<div class='page-wrapper contact'>

	<!-- Wrapper -->

	<div class="lightgreen_bg">
		<div class="container padblock">
			<div class='forms'>
				<div class="center contactblock">
                      <div class="icon_center sprite-large_contact"></div> 
                      <h2>We read all pitches, but make sure you take the time to formulate your pitch.
					We get contacted by 800+ companies a year and are used to high standards.</h2>
                    </div>

				<form id="pitch" class="pitchform" url="<?php bloginfo('template_url'); ?>/">
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="right">
								<span for="problem" class="counter">0 / 140</span>
							</div>
							<textarea id="problem"  name="problem" maxlength="140" placeholder="Why would someone pay for your product/service?"></textarea>
							
							<div class="right">
								<span for="market" name="problem"class="counter" max="140">0 / 140</span>
							</div>
							<textarea id="market" name="market" maxlength="140" placeholder="How big is the market for your product/service?"></textarea>
							
							<div class="right">
							<span for="team" class="counter" max="140">0 / 140</span>
							</div>
							<textarea id="team" maxlength="140" name="team" placeholder="What makes your team extraordinary?"></textarea>

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
							</div> 

							<label>What sector are you in?</label>
							<div class="checkform">
								<input type="hidden" id="sector" value="consumer" name="sector"/>
								<div class="checkbox active" value="consumer">
									<span>
										Consumer
									</span>
								</div>
								<div class="checkbox" value="software">
									<span>
										Software
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
							</div> 
							<div class='clear'></div>
							
							<div id="filearea" class="optional filearea">

								Upload file ( optional )
								<input type="button" id="uploadbtn" value="Upload file" class="optional uploadbtn btn btn-default green_bg white"/>
								<ul id="filelist"></ul>
							</div>

							<span for="other" class="counter"></span>
							<textarea id="other" class="optional"  placeholder="Other ( optional )" name="other"></textarea>

						
						</div>
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
							<input type="email" id="email" name="email" placeholder="Your e-mail"  class="col-6"/>	
						</div>
					</div>
					<div id="dialog" class="dialog" style="text-align:center;margin-top:10px;"></div>
					<input type="submit" id="sendform" class="sendform btn btn-default green_bg white" value="Send"/>
					
				</form>									


			</div>				
		</div>
	</div>
	<div class="lightgreen_bg">
		<iframe width="100%" height="550" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.se/maps?t=m&amp;q=Jacobsbergsgatan+18,+Stockholm,+103+86&amp;ie=UTF8&amp;hq=&amp;hnear=Jakobsbergsgatan+18,+111+44+Stockholm,+Stockholms+l%C3%A4n&amp;z=14&amp;ll=59.33553,18.069616&amp;output=embed"></iframe>
		<div class="container padblock center maps-footer">
          <!--<button type="button" class="btn2 btn-default btn-lg btn-white-bg">
          	<span class=" btntext hidden-xs"></span>
          		E-mail for other inquries
          </button> -->
          <button type="button" class="btn2 btn-default btn-lg btn2 btn-default btn-lg btn-white-bg">
          	<div class="btntextcontact hidden-xs"><div class="sprite-contact_email contact-con-email"></div></div>E-mail for other inquries
          </button>
          <button type="button" class="btn2 btn-default btn-lg btn-white-bg">
          	<div class="btntextcontact hidden-xs"><div class="sprite-contact_phone contact-con"></div></div>+46 (0)8 524 636 30
          </button>
          <a href="https://www.google.se/maps?t=m&amp;q=Jacobsbergsgatan+18,+Stockholm,+103+86&amp;ie=UTF8&amp;hq=&amp;hnear=Jakobsbergsgatan+18,+111+44+Stockholm,+Stockholms+l%C3%A4n&amp;z=14&amp;ll=59.33553,18.069616&amp;source=embed" style="color:#0000FF;text-align:left">	
	          <button type="button" class="btn2 btn-default btn-lg btn-white-bg">
	          	<div class="btntextcontact hidden-xs"><div class="sprite-contact_pin contact-con"></div></div>
	          		Go to Google maps
	          </button>
		   </a>
		</div>
	</div>
</div>
		


		

	<!-- /Wrapper -->

<?php get_footer(); ?>



