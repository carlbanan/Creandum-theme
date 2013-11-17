<?php /* Template Name: About Page */ ?>

<?php get_header(); ?>




<!-- Big picture -->
<div class="small-header"></div>

<div class='about'>

	

	<!-- Wrapper -->

	<div class="lightgreen_bg">
		<div class="container about post_content padblock">
			<div class="who">
				<div class="col-md-5">
					<h1>Who we are</h1>
					<p class="lead">Our company motto is "backing the companies of tomorrow". Simply put, our job is to help great entrepreneurs building great companies.</h3>
					<p>Over the years, we have built an international network of VC's, entrepreneurs, executives, technology companies, service providers, and fund investors to ensure we support our companies in every way possible.
	Building companies is our favorite occupation.</p>	
				</div>
				<div class="col-md-7 icon_right">
					<div class="sun"></div>
					<div class="sunrise icon_right"></div>
				</div>
			</div>

			<div class="who">
				<div class="col-md-7 icon_left">
					<div class="globe">
						<div class="cloud-1"></div>
						<div class="cloud-2"></div>
						<div class="cloud-3"></div>
					</div>
				</div>
				<div class="col-md-5">
					<h1>What we do</h1>
					<p class="lead">Our ambition is to help build market leaders.</p>	
					<p>People with vision. People that lead. People that believe in "already done" instead of "will do". People that are obsessed by creating extraordinary things.
Companies that impact, shape, and disrupt markets. Often with a global market opportunity and strong international focus from day one.</p>
				</div>
			</div>

			<div class="who">
				<div class="col-md-5">
					<h1>Our focus</h1>
					<p class="lead">Our company motto is "backing the companies of tomorrow". Simply put, our job is to help great entrepreneurs building great companies.</h3>
					<p>Over the years, we have built an international network of VC's, entrepreneurs, executives, technology companies, service providers, and fund investors to ensure we support our companies in every way possible.
	Building companies is our favorite occupation.</p>	
				</div>
				<div class="col-md-7 icon_right">
					<div class="eye_outer">
					<div class="eye icon_right"></div></div>
				</div>
			</div>

			<div class="who">
				<div class="col-md-7 icon_left">
					<div class="wheel"></div>
				</div>
				<div class="col-md-5">
					<h1>Our approach</h1>
					<p class="lead">Our approach is straightforward - we are your partners.</p>	
					<p> We have an uncomplicated operating style that is direct and results-driven. We have very high ambitions and only invest if this ambition is shared by the individuals we invest in.</p>
				</div>
			</div>

			<div class="who">
				<div class="col-md-5">
					<h1>Our services</h1>
					<p class="lead">We do not only invest in great companies, we help make them stronger and better aswell.</h3>
					<p>We help our investments with recruitments, advisory boards, office spaces and all sorts of great leads to help them build strong networks and grow their businesses. Our network spreads all over the globe in all kinds of operating categories which leaves us with the possibility of helping our investments with pretty much everything.</p>	
				</div>
				<div class="col-md-7 icon_right">
					<div class="box"></div>
				</div>
			</div>

		</div>

	</div>
	
</div>
			
<!-- PRESS AREA -->

<div class='press-area container	'>
	<h1>Press resources</h1>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		content
		<?php the_content(); ?>

	<?php endwhile;  endif; ?>

</div>

	<!-- /Wrapper -->

<?php get_footer(); ?>



