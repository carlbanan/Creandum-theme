

      <?php if (have_posts()) : while (have_posts()) : the_post();
        

      ?>

        <!-- SINGLE TEAM CONTENT  -->
      <div  id="post_<?php the_ID();?>">
        <div class="padblock green_bg">
        </div>
        <div class="container padblock page-content">
          <div class="col-lg-8 col-md-8 col-sm-8 clearfix" role="main">

              
              <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                
                <header>
      
                  <div class="page-header"><h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1></div>
                       
                </header> <!-- end article header -->
              
                <section class="post_content clearfix" itemprop="articleBody">
                  <?php the_content(); ?>
                  

              
                </section> <!-- end article section -->
                
              </article> <!-- end article -->
              
            </div> <!-- end #main AND COL-8 -->
   
          </div>  <!-- end container -->
   
      </div>      <!-- end post -->

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
      

    

