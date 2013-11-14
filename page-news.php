<?php /* Template Name: News Page */ ?>

<?php get_header(); ?>



<?php 
require_once("library/newsfeed.php");
$n = new newsfeed();
$news = $n->give_newsfeed(10);
?>


<!-- LIST VIEW PAGE / FIRST PAGE INVEST CONTENT -->
<div class"top-post">
	<div class="page-content intro">	
			<p class="large_invest_white"></p>
			<section class="post_content center clearfix" itemprop="articleBody">
			<h2>
				News from our network.
			</h2>
			</section>
	</div>
	<div class="big-image-container"></div>
	<div class="green_background"></div>
</div>	
<div class='newspage'>
	<div class="lightgreen_bg">
		<div class="container newsdeck">
			<div class='filter-menu'>
				<span class='filter active' id=''>All</span>
				<span class='filter' id='blog'>Our blog</span>
				<span class='filter' id='twitter'>Twitter</span>
				<span class='filter' id='external'>News</span>
			</div>
		       <div class="feed">  

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
            <p class='center padblock'>
              <a href="<?php echo bloginfo("url");?>/blog/">
              <button class='btn btn-default btn-green'>More news</button>
              </a>
            </p>
		</div> <!-- END CONTAINER NEWS -->
	</div><!-- END GREEN-->

		


	
</div>
			
	

	<!-- /Wrapper -->

<?php get_footer(); ?>



