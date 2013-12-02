<?php
function feed($ant = 1,$type = ""){

	if($ant){
		$ant = $ant;
	}else{
		$ant = 1;
	}
	$f = $_GET['filter'];

	require_once("library/newsfeed.php");
	$n = new newsfeed();

	$news = $n->give_newsfeed($ant,$type,$_GET['paginate']);
	
	if($news){
		foreach($news as $n){
			?>
			<a href='<?php echo $n['url'];?>' class='<?php echo $n['type'];?> filterable' <?php if($n['type'] != 'blog'){ echo "target='_blank'";} ?> <?php if($f != "" && $f != $n['type']){ echo "style='display:none;'"; } ?>>
			<div class="ncard <?php echo $n['type'];?>">
				<div class="<?php echo $n['type'];?>icon icon">
				<?php if($n['type']=='blog' && $n['author_img'] != ''){ ?>
					<div class="profile hidden-xs" style="background-image:url('<?php echo $n['author_img'];?>');"></div>
				<?php } ?>
				</div>

				<div class='ncard-content'>
				<?php  if($n['type']=='blog'){ ?>
					
					  <!-- BLOG POST -->
					  	<h2><?php echo $n['title'];?></h2>
					  	<h3 class="green"><?php echo date("M j, Y",strtotime($n['date']));?><?php if($n['author']){ echo " by ".$n['author']; } ?></h3>
					<?php }else{ ?>

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
		?><div id="more"></div><?php
	}
	else{
		return 1;
	}
}
?>