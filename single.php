<?php get_header(); ?>
      
      <div id="content" class="clearfix row">
      
        <div class="container padblock page-content">

          <div class="col-lg-9 col-md-9 col-sm-9 clearfix" role="main">

          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          
          <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
            
            <header>
            
              <?php the_post_thumbnail( 'wpbs-featured' ); ?>
              
              <div class="page-header"><h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1></div>
              
            
            
            </header> <!-- end article header -->
          
            <section class="post_content clearfix" itemprop="articleBody">
              <?php the_content(); ?>
          
            </section> <!-- end article section -->
            
            <footer>
      
              <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ' ', '</p>'); ?>
              
            </footer> <!-- end article footer -->
          
          </article> <!-- end article -->
          
          
          
      
        </div> <!-- end #main -->
        <div class="col-lg-3 col-md-3 col-sm-3 clearfix">
          <!-- AUTHOUR META -->
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

                  while ( $connected->have_posts() ) : $connected->the_post();                           

                      $auth_id = get_the_ID();
                      $auth_url = get_permalink();
                      $auth_title = get_the_title();
              
                  endwhile; 

                // Prevent weirdness
                wp_reset_postdata();

                endif;

                $postid = $auth_id;
                $portrait = "";
                $portrait = get_post_meta($postid,"custom_portrait_image",true);  
          ?>
            <p class="meta">

                <img src='<?php echo $portrait;?>'/>
                <span>Written by</span>
                <a href='<?php echo $auth_url;?>' class='metanfo green'><?php echo $auth_title;?></a>

                <span>Published</span>
                <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate  class='metanfo green'><?php the_date(); ?></time>

            </p>

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

      </div>


      <?php 
      require_once("library/newsfeed.php");
      $n = new newsfeed();
      $news = $n->give_newsfeed(10,"blog");
      ?>

      <div class='page-wrapper newspage'>
        <div class="lightgreen_bg">
          <div class="container newsdeck">

                <div class="newsicon"></div>
                <h2>Read the latest from Creandum Team and our great network.</h2>

                 <div class="feed">  

                    <?php

                    foreach($news as $n){
                    ?>
                      <a href='<?php echo $n['url'];?>' <?php if($n['type'] != 'blog'){ echo "target='_blank'";} ?>>
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
          
            <p class='center padblock'>
              <a href="<?php echo bloginfo("url");?>/news/">
              <button class='btn btn-default btn-green'>More news</button>
              </a>
            </p>
          </div> <!-- END CONTAINER NEWS -->

        </div><!-- END GREEN-->
        
      </div>
      
  

  <!-- /Wrapper -->

</div> <!-- end #content -->

<?php get_footer(); ?>