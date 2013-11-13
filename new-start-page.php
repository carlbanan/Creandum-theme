<?php
/*
Template Name: New startpage
*/
?>

<?php get_header(); ?>
      

      <div class='startpage'>



        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

         
          
          <?php 
          $c = 0;

           // IS SLIDER PLUGIN ACTIVEED ? 
          include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
          $plugin = "simple-fields/simple_fields.php";
          if(is_plugin_active($plugin)){
            if ($slider = page_has_slider(get_the_ID())) { 
              ?>
              <div id='slider-bigimage'>
              <?php
                $slides = get_slider_images($slider);
                foreach ($slides as $slide) {
                  $c++;
                  $active = "";
                  if($c == 1){
                    $active = " active";
                  }
                  $textline = explode("\n", $slide['Slide text line 1']);
              ?>
               <div class="content-header-wrap<?php echo $active;?>" id='img<?php echo $c;?>'>
                 <div class='green_background_main'></div>
                 <div class='content-header bigimage'  style='background-image:url("<?php echo $slide['img']['src'];?>");'>
                 </div>
                 <div class='content-header-text wrapper container'>
                   <div class='shadowop'>
                    <?php foreach($textline as $txt){ ?>
                    <h1 class="shadow"><?php echo $txt;?></h1><br>
                    <?php } ?>
                  </div>
                  <div>
                    <?php foreach($textline as $txt){ ?>
                    <h1 class="strip"><?php echo $txt;?></h1><br>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <?php if(!$active){ ?>
              <img src="<?php echo $slide['src'];?>" class="preload"/>
              <?php  
                  } 
                }
              }
            }
          ?>
          </div>
          <a class="right carousel-control" href="javascript:;" id='nextbig'><div class="righticon"></div></a>
      </div>
      <!-- <div class="container goscroll"></div> -->
      <div class="start-content">
        <div class="container">
          <div class="row padblock">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 center padblock">
                  <div class="ticker">
                  <h2 style='background:orange'>We are a leading venture capital firm, based in the Nordics.</h2>
                  <h2 style='background:yellow'>We are a leading venture capital firm, based in the Nordics.</h2>
                  <h2 style='background:blue'>We are a leading venture capital firm, based in the Nordics.</h2>
                  </div>
                  <div class="ticker_icons"><span class="one"></span><span class="two"></span><span class="three"></span></div>
                </div>
                <!--pay attention-->
              </div>
            </div>
          </div>
        </div>


        <?php
        /* POSTS */
        $args = array(
          'posts_per_page'   => 9,
          'offset'           => 0,
          'orderby'          => 'post_date',
          'order'            => 'DESC',
          'post_type'        => 'investment',
          'post_status'      => 'publish'
          );
        $posts_array = get_posts( $args );

        $myposts = get_posts( $args );
        ?>
        <div class='lightgreen_bg'>
          <div class='container'>
            <div class="row padblock">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <h2 class='center'>Our investments.</h2>
                    <br/>
                    <?php
                    foreach ( $myposts as $post ) : setup_postdata( $post );
                      $postid = $post->ID;
                      $portrait = "";
                      $portrait = get_post_meta($postid,"custom_logo_image",true);  
                     ?>
                      <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-3  col-lg-3  col-sm-6 filterable '.$tax); ?> role="article">
                        <a href="<?php the_permalink() ?>"  select="post_<?php the_ID();?>" class='async' rel="bookmark" title="<?php the_title_attribute(); ?>">   
                            <div class="portrait_list">
                              <div class='over'>
                                <button type="button" class="btn btn-default btn-white">Learn more</button>
                              </div>
                              <img src="<?php echo $portrait;?>" alt="<?php the_title();?>">
                            </div>
                        </a>
                      </div> <!-- end article -->
                    <?php endforeach; 
                    wp_reset_postdata();?>
                  </div>
                  <!--pay attention-->
                </div>
              </div>
            </div>
          </div>
        </div>



      <div id="myCarousel" class="carousel slide">

          <div class="carousel-inner">

                <?php

              // IS SLIDER PLUGIN ACTIVEED ? 
              if(is_plugin_active($plugin)){

                  $c = 0;
                
                  // Find connected pages
                  $connected = new WP_Query( array(
                    'connected_type' => 'page_to_page',
                    'connected_items' => get_queried_object(),
                    'nopaging' => true,
                    )
                  );
                  // GET ID FROM  connected page
                  $i = 0;

                  if ( $connected->have_posts() ) :
                    while ( $connected->have_posts() ) : $connected->the_post();                           
                              $page_id = get_the_ID();
                    endwhile; 
                  // Prevent weirdness
                  wp_reset_postdata();

                  endif;
                  // GET SLIDER FOR PAGE
                  if ($slider2 = page_has_slider($page_id)) { 
                    $slides2 = get_slider_images($slider2);
                    foreach ($slides2 as $slide2) {
                      $c++;
                      if($c != 5){

                        $active = "";

                        if($c == 1){
                          $active = " active";
                        }
                        $textline = explode("\n", $slide2['Slide text line 1']);
                        ?>
                        <div class="item <?php echo $active;?>">
                          <img src="<?php echo $slide2['img']['src'];?>" alt="First slide">

                            <div class="carousel-caption">
                              <?php foreach($textline as $txt){ ?>
                              <h2 class="strip2"><?php echo $txt;?></h2><br>
                              <?php } ?>
                              <div class"title" style="margin-top:10px;">
                                <p class="strip3"><?php echo $slide2['Slide text line 2'];?></p><br>
                                <p class="strip3"><?php echo $slide2['Slide text line 3'];?></p>
                              </div>

                          </div>
                        </div>
                        <?php
                      }
                    }
                  }
                }
              ?>
            </div>
            <!--pay attention-->
            <?php if($c != 0){ ?>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><div class="lefticon"></div></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><div class="righticon"></div></a>
            <?php } ?>
        </div><!-- /.carousel -->

        <div class='lightgreen_bg'>
          <div class='container'>
            <div class="row padblock">

              <h2 class="center">Newsdeck</h2>

            <?php 
            require_once("library/newsfeed.php");
            $n = new newsfeed();
            $news = $n->give_newsfeed(1);
            ?>

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
            <p class='center padblock'>
              <a href="<?php echo bloginfo("url");?>/news/">
              <button class='btn btn-default btn-green'>More news</button>
              </a>
            </p>

            </div>
          </div>
        </div>


      </div>
      <?php endwhile; ?>
      
      <?php endif; ?>

      </div> <!-- END STARTAPGE -->
    </div><!-- END startpage-content -->



<?php get_footer(); ?>