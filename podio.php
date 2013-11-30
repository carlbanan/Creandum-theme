<h4>Upcoming events where you can meet us.</h4>
<div class='podio-wrapper'>
<?php
  $events = array();
  query_posts( array( 'post_type' => 'podio', 'posts_per_page' => 15) );
  if ( have_posts() ) : while ( have_posts() ) : the_post();
    
      $c = get_the_content();
      $c = explode(";",$c);
      $ev = array();

      $ev['attend'] = $c[0];
      $ev['title']  = get_the_title();
      $ev['date']   = date('j M',strtotime($c[1]));
      $ev['city']   = $c[2];
      $ev['cdate']  = date('Y-m-d',strtotime($c[1])); // COMPARE DATE

      $todate = date("Y-m-d");

      if($ev['cdate'] >= $todate){   // DATE PASSED ? 
        array_push($events,$ev);
      }
    endwhile;
  endif;

  // SORT BY CDATE
  if($events){
     // SORT ARRAY ON DATE
     foreach ($events as $key => $row) {
          $ddate[$key]  = $row['cdate'];
          $ttype[$key]  = $row['city'];
      }
      array_multisort($ddate, SORT_ASC, $ttype, SORT_ASC, $events);
  }

  if($events){
    foreach($events as $event){

  ?>
      <div class='sideblock news podio'>
        <div class='sidehead'>
          <div class='sideicon fill podio-date'> <?php echo $event['date'];?></div>
          <div class='sidetopic fill'>

            <?php echo $event['city'];?>
            <br/>
            <?php echo $event['title'] ?>
            
           
          </div>
        </div>

      </div>
  	<?php 
    }
  }
?>
</div>
<div style="clear: both"></div>
<div class="tweet-title"><h4>Portfolio feed.</h4></div>
