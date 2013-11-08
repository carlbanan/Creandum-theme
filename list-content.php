
        <?php
      // Find connected pages
      $connectedz = new WP_Query( array(
        'connected_type' => 'posts_to_team',
        'connected_items' => get_the_ID(),
        'nopaging' => true,
      ) );
      // Display connected pages
      $i = 0;

      if ( $connectedz->have_posts() ) :
        
        while ( $connectedz->have_posts() ) : $connectedz->the_post(); 
                       $imgid = get_the_ID();
                       $author = get_the_title();
         endwhile; 

      // Prevent weirdness
      wp_reset_postdata();

      endif;


      if($imgid){
         $imgurl = get_post_meta($imgid,"custom_portrait_image",true);

      }
     ?>
        <a href="<?php the_permalink() ?>" class='blog filterable'>
          <div class="ncard blog">
            <div class="blogicon icon"></div>

                <?php if($imgurl != ''){ ?>
                  <div class="profile hidden-xs" style="background-image:url('<?php echo $imgurl;?>');"></div>
                <?php } ?>
                
                <!-- BLOG POST -->
                <div class='ncard-content'>
                  <h2 class="bold"><?php  the_title();?></h2>
                  <h3 class="green"><?php echo $author;?></h3>
                </div>


            <div class="feedright"></div>
          </div>
        </a>



