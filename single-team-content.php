

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <!-- SINGLE TEAM CONTENT  -->
      <div  id="post_<?php the_ID();?>">
        <div class="big-image-container" bigimage="<?php echo get_post_meta($postid,"custom_bigprofile_image",true);?>">

        </div>
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
                  ) );

                  // Display connected pages
                  $i = 0;
                  if ( $connected->have_posts() ) :
                  ?>
                    <div class='related_posts'>
                      <span class='relabel'><?php the_title(); ?> works with: </span>

                      <?php while ( $connected->have_posts() ) : $connected->the_post(); 
                             $i++;
                             if($i != 1){ echo ", "; } 
                      ?>
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php endwhile; ?>
                    </div>

                  <?php 
                  // Prevent weirdness
                  wp_reset_postdata();

                  endif;
                  ?>
            
              </section> <!-- end article section -->
              
              <footer>
        
                <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ' ', '</p>'); ?>
                
                <?php 
                // only show edit button if user has permission to edit posts
                if( $user_level > 0 ) { 
                ?>
                <a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success edit-post"><i class="icon-pencil icon-white"></i> <?php _e("Edit post","bonestheme"); ?></a>
                <?php } ?>
                
              </footer> <!-- end article footer -->
            
            </article> <!-- end article -->
            
          </div> <!-- end #main -->
          <div class="col-lg-4 col-md-4 col-sm-4 clearfix">

            <!-- SIDEBAR -->
             <?php
               $twitter_src = get_post_meta($post->ID,"custom_twitter",true);
               $fb_page = get_post_meta($post->ID,"custom_fb",true);
               $email = get_post_meta($post->ID,"custom_email",true);
               $tel = get_post_meta($post->ID,"custom_tel",true);
               $linkedin = get_post_meta($post->ID,"custom_linkedin",true);
              ?>
            
            <!-- GET LATSET BLOG POST -->
            <?php
                 // Find connected pages
                $connected = new WP_Query( array(
                  'connected_type' => 'posts_to_team',
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
            <!-- GET TWEET -->
            <?php
            if($twitter_src){ 

                 include('library/Twitter.php');
                 $twitterUsername = $twitter_src;
                 $twitterCacheFile = "../t.cacheFile";
                 $Twitter = new Twitter($twitterUsername,$twitterCacheFile);
                 if($Twitter->tweet != false) {
                     $tweet = $Twitter->tweet->text;
                     $tweet_user_url = "https://www.twitter.com/".$Twitter->tweet->user->{"screen_name"};
                     $tweet_user = $Twitter->tweet->user->{"screen_name"};
                     $tweet_url = "https://www.twitter.com/".$Twitter->tweet->user->{"screen_name"}."/status/".$Twitter->tweet->{"id_str"};
                     $tweet_date = date('F j, Y \a\t g:i a',strtotime($Twitter->tweet->{"created_at"}));
                }
             }
             ?>

            <!-- LATEST TWITTER -->

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

            <!-- LATEST BLOG POST -->

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

            <!-- FACEBOOK -->

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

            <!-- EMAIL MED -->

            <?php if($email){ ?>
            <div class='sideblock'>
              <div class='sidehead'>
                <div class='sideicon email_icon fill'></div>
                <div class='sidetopic fill'>
                  <a href='mailto:<?php echo $email ?>'>
                    E-mail me
                  </a>
                </div>
              </div>
            </div>
            <?php } ?>

            <!-- LINKEDIN -->

            <?php if($linkedin){ ?>
            <div class='sideblock'>
              <div class='sidehead'>
                <div class='sideicon linkedin_icon fill'></div>
                <div class='sidetopic fill'>
                  <a href='<?php echo $linkedin ?>'>
                   Find med on LinkedIn
                  </a>
                </div>
              </div>
            </div>
            <?php } ?>

            <!-- TELNR -->

            <?php if($tel){ ?>
            <div class='sideblock'>
              <div class='sidehead'>
                <div class='sideicon linkedin_icon fill'></div>
                <div class='sidetopic fill'>

                   <?php echo $tel ?>

                </div>
              </div>
            </div>
            <?php } ?>
          
          </div> <!-- end sidecontent-->

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
      

    

