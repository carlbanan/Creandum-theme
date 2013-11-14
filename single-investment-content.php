

      <?php if (have_posts()) : while (have_posts()) : the_post();
        
        $bigimg = get_post_meta($post->ID,"custom_big_image",true);
      ?>

        <!-- SINGLE TEAM CONTENT  -->
      <div  id="post_<?php the_ID();?>">
        <div class="big-image-container" style="<?php if($bigimg){ echo "background-image:url('".$bigimg."');"; } ?>">
        
        </div>  <!-- end big-image --> 
        <div class="green_background"></div>
        
          <div class="container padblock page-content">
            <div class="col-lg-8 col-md-8 col-sm-8 clearfix" role="main">

              
              <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                
                <header>
      
                  <div class="page-header"><h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1></div>
                       
                </header> <!-- end article header -->
              
                <section class="post_content clearfix" itemprop="articleBody">
                  <?php the_content(); ?>
                  
                  <?php
                  // Find connected pages
                  $connected = new WP_Query( array(
                    'connected_type' => 'teammember_to_investments',
                    'connected_items' => get_queried_object(),
                    'nopaging' => true,
                    )
                  );

                  // Display connected pages
                  $i = 0;
                  if ( $connected->have_posts() ) :
                  ?>
                    <div class='related_posts'>
                      <span class='relabel'>Team: </span>

                      <?php while ( $connected->have_posts() ) : $connected->the_post();                           
                              $i++;
                              if($i != 1){ echo ", "; } 
                      ?>
                        <a href="<?php the_permalink(); ?>"><?php the_title();?></a><?php endwhile; ?>
                    </div>

                  <?php 
                  // Prevent weirdness
                  wp_reset_postdata();

                  endif;
                  ?>
              
                </section> <!-- end article section -->
                
              </article> <!-- end article -->
              
            </div> <!-- end #main AND COL-8 -->

          <div class="col-lg-4 col-md-4 col-sm-4 clearfix">

            <!-- SIDEBAR -->
             <?php
               $twitter_src = get_post_meta($post->ID,"custom_twitter",true);
               $fb_page = get_post_meta($post->ID,"custom_fb",true);
              ?>
            
            <!-- GET LATSET BLOG POST -->
            <?php
                 // Find connected pages
                $connected = new WP_Query( array(
                  'connected_type' => 'posts_to_investments',
                  'connected_items' => get_queried_object(),
                  'nopaging' => true,
                  )
                );

                // Display connected pages
                $i = 0;
                if ( $connected->have_posts() ) :

                     if ( $connected->have_posts() ) : $connected->the_post();                           
                    
                      $bloggpost = get_permalink();
                      $excerpt = get_the_title();
                     endif; 
                // Prevent weirdness
                wp_reset_postdata();
                endif;    
            ?>
            <!-- GET TWEET -->
            <?php
            if($twitter_src){ 

                 include('library/Twitter.php');
                 $twitterUsername = $twitter_src;
                 $twitterCacheFile  = "cache/twitter_invest_".$twitter_src.".cacheFile";
                 $twitterCount = 1;

                 $Twitter = new Twitter($twitterUsername,$twitterCacheFile,$twitterCount);

                 if($Twitter->tweet != false) {

                    foreach($Twitter->tweet as $twt){
                       $tweet = $twt->text;
                       $tweet_user_url = "https://www.twitter.com".$twt->user->{"screen_name"};
                       $tweet_user = $twt->user->{"screen_name"};
                       $tweet_url = "https://www.twitter.com/".$twt->user->{"screen_name"}."/status/".$twt->{"id_str"};
                       $tweet_date = date('F j, Y \a\t g:i a',strtotime($twt->{"created_at"}));
                    }
                }
             }
             ?>
            <?php if($tweet){ ?>
            <div class='sideblock'>
              <div class='sidehead'>
                <div class='sideicon twitter_icon fill'></div>
                <div class='sidetopic fill'>
                  <a href='<?php echo $tweet_url ?>'>
                    Latest tweet
                  </a>
                </div>
              </div>
              <div class='sidecontent fill'>
                  
                  <a href='<?php echo $tweet_url ?>'>
                    <?php echo $tweet;?>
                  </a>
                  <br/>
                  <a href='<?php echo $tweet_user_url;?>'>
                    <?php echo $tweet_user; ?>
                  </a> - <?php echo $tweet_date;?>

              </div>
            </div>
            <?php } ?>
            <?php if($bloggpost){ ?>
            <div class='sideblock'>
              <div class='sidehead'>
                <div class='sideicon blog_icon fill'></div>
                <div class='sidetopic fill'>
                  <a href='<?php echo $bloggpost ?>'>
                    Latest blog post
                  </a>
                </div>
              </div>
              <div class='sidecontent fill'>
                  <a href='<?php echo $bloggpost ?>'>
                  <?php echo $excerpt;?>
                  </a>
              </div>
            </div>
            <?php } ?>
            <?php if($fb_page){ ?>
            <div class='sideblock'>
              <div class='sidehead'>
                <div class='sideicon fb_icon fill'></div>
                <div class='sidetopic fill'>
                  <a href='<?php echo $fb_page ?>'>
                    Facebook-page
                  </a>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
      </div> <!-- end container -->
    </div>      

    <?php endwhile; ?>      
    
    <?php else : ?>
    
    <article id="post-not-found">
        <header>
          <h1><?php _e("Not Found", "bonestheme"); ?></h1>
        </header>
        <section class="post_content">
          <p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
        </section>
        <footer>
        </footer>
    </article>
    
    <?php endif; ?>
      

    

