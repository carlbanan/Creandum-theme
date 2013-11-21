<?php /* Template Name: About Page */ ?>

<?php get_header(); ?>




<!-- Big picture -->
<div class="page-content intro-about">	
				<!--<p class="large_invest_white"></p> -->
				<section class="small oneline content-header-text wrapper clearfix container" itemprop="articleBody">
		                  	 <div class='shadowop'>
		                          <h1 class="small shadow">backing the companies of tomorrow.</h1>
		                        </div>
		                        <div>
		                          <h1 class="small strip">backing the companies of tomorrow.</h1>
		                        </div>
				</section>
		</div>
		<div class="responsive-wrapper">
			<div class="big-image-container"  style='background-image:url(<?php echo get_template_directory_uri(); ?>/images/about.png);'></div>
			<div class="green_background"></div>
		</div>

<div class='about'>

	

	<!-- Wrapper -->

	<div class="lightgreen_bg infront">
		<div class="container about post_content padblock">
			<div class="who">
				<div class="col-md-5">
					<h1>Who we are</h1>
					<p class="lead">Our company motto is "backing the companies of tomorrow."</h3>
					<p>Simply put, our job is to help great entrepreneurs building great companies.
Over the years, we have built an international network of VC's, entrepreneurs, executives, technology companies, service providers, and fund investors to ensure we support our companies in every way possible.
Building companies is our favorite occupation.</p>	
				</div>
				<div class="col-md-7 icon_right hidemobile">
					<div class="sun"></div>
					<div class="sunrise icon_right"></div>
				</div>
			</div>

			<div class="who">
				<div class="col-md-7 icon_left hidemobile">
					<div class="globe">
						<div class="cloud-1"></div>
						<div class="cloud-2"></div>
						<div class="cloud-3"></div>
					</div>
				</div>
				<div class="col-md-5">
					<h1>What we do</h1>
					<p class="lead">We invest in the best innovative and fast-growing companies that can change industries and the people that make it happen.</p>	
					<p>Our initial investment can be as small as a couple of hundred thousand euros and can go up to 10 million euros over the life cycle of a company. We have invested in companies before they incorporated as well as in companies with tens of millions of euros in revenue.
Once we invest in a company we take an active role and all of our team contributes with time, expertise, and extensive networks to help the company succeed.</p>
				</div>
			</div>

			<div class="who">
				<div class="col-md-5">
					<h1>Our focus</h1>
					<p class="lead">Our ambition is to help build market leaders.</h3>
					<p>People with vision. People that lead. People that believe in "already done" instead of "will do". People that are obsessed by creating extraordinary things.
Companies that impact, shape, and disrupt markets. Often with a global market opportunity and strong international focus from day one.</p>	
				</div>
				<div class="col-md-7 icon_right hidemobile">
					<div class="eye_outer">
					<div class="eye icon_right"></div></div>
				</div>
			</div>

			<div class="who">
				<div class="col-md-7 icon_left hidemobile">
					<div class="wheel"></div>
				</div>
				<div class="col-md-5">
					<h1>Our approach</h1>
					<p class="lead">Our approach is straightforward - we are your partners.</p>	
					<p>We have an uncomplicated operating style that is direct and results-driven. We have very high ambitions and only invest if this ambition is shared by the individuals we invest in.</p>
				</div>
			</div>

			<div class="who">
				<div class="col-md-5">
					<h1>Our services</h1>
					<p class="lead">We do not only invest in great companies, we help make them stronger and better aswell.</h3>
					<p>We help our investments with recruitments, advisory boards, office spaces and all sorts of great leads to help them build strong networks and grow their businesses. Our network spreads all over the globe in all kinds of operating categories which leaves us with the possibility of helping our investments with pretty much everything.</p>	
				</div>
				<div class="col-md-7 icon_right hidemobile">
					<div class="box"></div>
				</div>
			</div>

		</div>

	</div>
	
</div>
			


<div class='press-area container' style='background:#fff;z-index:9999;position:relative;padding:60px 0;'>
	<h1>Press resources</h1>
<?php
if ( method_exists( $media_cat_lib, 'get_mediacategory_shortcode' ) && method_exists( $media_cat_lib, 'get_media_categories' ) ):
     
     $cat = "Press";
	 $posts= $media_cat_lib->get_mediacategory_shortcode( array( 'returnposts' => 1,'cats' => $cat, 'orderby' => "date", 'order' => "DESC" ) );
	 
	 ?>
	 <div class="row">
	<?php foreach ( $posts as $rpost ): 
		$caption = $img = "";
		$caption = $rpost->post_title;
		$img = wp_get_attachment_image_src( $rpost->ID, "thumbnail-size" );
		$ext = substr($img[0],-4);

		if($ext == ".jpg" || $ext == ".png" || $ext == ".gif" || $ext == "jpeg" || $ext == ".JPG" || $ext == ".PNG" || $ext == "JPEG"){
		?>

	        
		        <a target="_blank" href="<?php echo wp_get_attachment_url( $rpost->ID ); ?>">
		        	<div class="col-md-3 col-lg-3">
			        	 <img src='<?php echo $img[0]; ?>' class="pressimg"/>
			       		 <h4><?php echo $caption; ?></h4>
			       		 <span class='green'>Download</span>
		       		 </div>
		        </a>
	       

	     <?php }
	     else{
	     	$files .= '<a target="_blank" href="'.wp_get_attachment_url( $rpost->ID ).'"> 
	     		<h4>'.$caption.' <span class="green">Download &darr;</span> </h4> </a>';
	     }
	      ?>
	      
	<?php endforeach; ?>

	</div>	 <!-- ROW -->
	<?php if($files != ''){ ?>
	<h2>Files</h2>
	<?php echo $files ?>
	<?php } ?>
</div>

	

<?php endif; ?>

<?php get_footer(); ?>



