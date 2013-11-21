<?php
	require_once("library/newsfeed.php");
	$n = new newsfeed();
	$tweets = $n->give_tweets(3);
?>
    <!-- TWEETS -->
	<?php 
	if($tweets){ 
		foreach($tweets as $twt){ ?>
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
	<?php 
		}
	 } 
?>
