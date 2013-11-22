<?php /* Template Name: News Page */ ?>

<?php 

if($_GET['async'] == 1){ 

	/* ASYNC */

	if($_GET['content'] == "feed"){
		
		require_once("feed.php");
		feed($_GET['ant']);
	}
	elseif($_GET['content'] == "side"){

		require_once("tweets.php");
	}
}
else{ ?>
<?php get_header(); ?>


<!-- LIST VIEW PAGE / FIRST PAGE INVEST CONTENT -->
<div class"top-post">
	<!-- Big picture -->
	<div class="page-content intro-about">	

		<!--<p class="large_invest_white"></p> -->
		<section class="small content-header-text wrapper clearfix container" itemprop="articleBody">
                  	 <div class='shadowop'>
                          <h1 class="small shadow">Here's what we're up to</h1>
                          <br><h1 class="small shadow">and whats going on in our network.</h1>
                        </div>
                        <div>
                          <h1 class="small strip">Here's what we're up to</h1>
                          <br><h1 class="small strip">and whats going on in our network.</h1>
                        </div>

				</section>
	</div>
	<div class="responsive-wrapper">
		<div class="big-image-container"  style='background-image:url(<?php echo get_template_directory_uri(); ?>/images/news.png);'></div>
	</div>

</div>	

<div class='newspage infront'>
	<div class="lightgreen_bg">
		<div class='filter-menu'>
			<span class='filter active' id=''>All</span>
			<span class='filter' id='blog'>Our blog</span>
			<span class='filter' id='twitter'>Twitter</span>
			<span class='filter' id='external'>News</span>
			<span class='filter' id='jobs'>Jobs</span>
		</div>
		<div class="container newsdeck">
			<div class="row">
				
			    <div class="feed col-md-9 col-lg-9" id="feed" url="<?php echo site_url(); ?>/news/">  

			    	<?php 
			    		require_once("feed.php");
			    		feed(1);
			    	 ?>
		
			    </div><!-- END FEED -->
			    <div class="twitter col-md-3 col-lg-3" id="tweets">  
			    	
			    	<!-- ASYNC TWITTER-CONTENT GOES HERE -->
			    	
			    </div>

		        <div class="clearfix"></div>
		 
	        </div> <!-- ROW -->

		</div> <!-- END CONTAINER NEWS -->


		 <p class='center'>
              <a href="<?php echo bloginfo("url");?>/blog/">
              <button class='btn btn-default btn-green more'>Blog archive</button>
              </a>
         </p>
	</div><!-- END GREEN-->
	
</div>
			
	

	<!-- /Wrapper -->

<?php get_footer(); ?>

<?php } ?> <!-- END IF NOT ASYNC -->

