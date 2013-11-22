<?php
  query_posts( array( 'post_type' => 'podio') );
  if ( have_posts() ) : while ( have_posts() ) : the_post();
    $c = get_the_content();
    $c = str_replace(";","<br/>",$c);
?>
    <div class='sideblock news'>
      <div class='sidehead'>
        <div class='sideicon fill'><div class="sprite-podio"></div></div>
        <div class='sidetopic fill'>

            <?php the_title(); ?>

        </div>
      </div>
      <div class='sidecontent fill'>
          
          <?php echo $c; ?>

      </div>
    </div>
	<?php 
  endwhile;
  endif;
?>
