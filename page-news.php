<?php /* Template Name: News Page */ ?>

<?php get_header(); ?>



<?php 
require_once("library/newsfeed.php");
$n = new newsfeed();
$news = $n->give_newsfeed(10);
$tweets = $n->give_tweets(3);
?>


<!-- LIST VIEW PAGE / FIRST PAGE INVEST CONTENT -->
<div class"top-post">
	<!-- Big picture -->
<div class="page-content intro-about">	
				<!--<p class="large_invest_white"></p> -->
				<section class="post_content center clearfix" itemprop="articleBody">
				<h2>
				 Here's what we're up to and whats going on in our network.
				</h2>
				</section>
		</div>
		<div class="big-image-container"  style='background-image:url(<?php echo get_template_directory_uri(); ?>/images/news.png);'></div>
		<div class="green_background"></div>
</div>	

<div class='newspage infront'>
	<div class="lightgreen_bg">
		<div class='filter-menu'>
					<span class='filter active' id=''>All</span>
					<span class='filter' id='blog'>Our blog</span>
					<span class='filter' id='twitter'>Twitter</span>
					<span class='filter' id='external'>News</span>
				</div>
		<div class="container newsdeck">
			<div class="row">
				
			    <div class="feed col-md-9 col-lg-9">  

			       		<?php

			       		foreach($news as $n){
			       		?>
			       			<a href='<?php echo $n['url'];?>' class='<?php echo $n['type'];?> filterable' <?php if($n['type'] != 'blog'){ echo "target='_blank'";} ?>>
								<div class="ncard <?php echo $n['type'];?>">
									<div class="<?php echo $n['type'];?>icon icon"></div>
									<?php if($n['type']=='blog' && $n['author_img'] != ''){ ?>
										<div class="profile hidden-xs" style="background-image:url('<?php echo $n['author_img'];?>');"></div>
									<?php } ?>
									<div class='ncard-content'>
									<?php  if($n['type']=='blog'){ ?>
										
										  <!-- BLOG POST -->
										  	<h2 class="bold"><?php echo $n['title'];?></h2>
										  	<h3 class="green"><?php echo date("M j, Y",strtotime($n['date']));?><?php if($n['author']){ echo " by ".$n['author']; } ?></h3>
										<? }else{ ?>

										  <!-- OTHERS -->
										 	<h2><?php echo $n['title'];?></h2>
												<?php if($n['type'] == 'external'){ ?>
													<h3 class="green"><?php echo date("M j, Y",strtotime($n['date']));?></h3>
												<?php } ?>
										<?php } ?>

									</div> <!-- END ncard-content -->
									<div class="feedright"></div>
								</div>
							</a>
						<?php
			       		}
			       		?>

		
			    </div><!-- END FEED -->
			    <div class="twitter col-md-3 col-lg-3">  
			    
			    <!-- TWEETS -->
				<?php foreach($tweets as $twt){ ?>
	            <div class='sideblock news'>
	              <div class='sidehead'>
	                <div class='sideicon fill'><div class="sprite-twitter"></div></div>
	                <div class='sidetopic fill'>
	                  <a href='<?php echo $twt['tweet_user_url'] ?>'>
	                    @<?php echo  $twt['tweet_user'];?>
	                  </a>
	                </div>
	              </div>
	              <div class='sidecontent fill'>
	                  
	                  <a href='<?php echo $tweet_url ?>'>
	                    <?php echo $twt['tweet']; ?>
	                  </a>
	                  <br/>
	                  <a href='<?php echo $tweet_user_url;?>'>
	                   <?php echo  $twt['tweet_user'];?>
	                  </a> - <?php echo $twt['tweet_date']; ?>

	              </div>
	            </div>
				<?php } ?>
			    </div>

		        <div class="clearfix"></div>
		 
	        </div> <!-- ROW -->

		</div> <!-- END CONTAINER NEWS -->

		 <p class='center'>
              <a href="<?php echo bloginfo("url");?>/blog/">
              <button class='btn btn-default btn-green more'>More news</button>
              </a>
            </p>
	</div><!-- END GREEN-->

		


	
</div>
			
	

	<!-- /Wrapper -->

<?php get_footer(); ?>



