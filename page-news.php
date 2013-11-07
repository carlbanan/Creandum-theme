<?php /* Template Name: News Page */ ?>

<?php get_header(); ?>



<?php 
require_once("library/newsfeed.php");
$n = new newsfeed();
$news = $n->give_newsfeed(10);
?>

<div class='page-wrapper newspage'>
    <div class="big-image-container">
   		<h1>Newsdeck</h1>
    </div>

	<div class="lightgreen_bg">
		<div class="container newsdeck">

		      <div class="newsicon"></div>
		      <h2>Read the latest from Creandum Team and our great network.</h2>
			<div class='filter-menu'>
				View news by:  
				<span class='filter active' id=''>
					All
				</span>
				<span class='filter' id='blog'>
					Our blog
				</span>
				<span class='filter' id='twitter'>
					Twitter
				</span>
				<span class='filter' id='external'>
					News
				</span>
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
									  	<h3 class="green"><?php echo $n['author'];?></h3>
									<? }else{ ?>

									  <!-- OTHERS -->
									 	<h2><?php echo $n['title'];?></h2>
									<?php } ?>

								</div> <!-- END ncard-content -->
								<div class="feedright"></div>
							</div>
						</a>
					<?php
		       		}
		       		?>

	
		    </div><!-- END FEED --> 
     
		</div> <!-- END CONTAINER NEWS -->
	</div><!-- END GREEN-->

		


	
</div>
			
	

	<!-- /Wrapper -->

<?php get_footer(); ?>



