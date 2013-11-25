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
                  $textline2 = "";
                  $textline3 = ""; 
                  if($c == 1){
                    $active = " active";
                  }
                  $textline = explode("\n", $slide['Slide text line 1']);
                  $textline2 = $slide['Slide text line 2'];
                  $textline3 = $slide['Slide text line 3'];

              ?>
               <div class="content-header-wrap<?php echo $active;?>" id='img<?php echo $c;?>' bigid='<?php echo $c;?>'>
                 <div class='green_background_main'></div>
                 <div class='content-header bigimage'  style='background-image:url("<?php echo $slide['img']['src'];?>");'>
                 </div>


                 <div class='content-header-text wrapper container'>
                  <div class="hidemobile htext">
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

                    <div class="showmobile htext">
                        <div class='shadowop'>
                          <h1 class="shadow">Backing the companies</h1>
                          <br><h1 class="shadow">of tomorrow</h1>
                        </div>
                        <div>
                          <h1 class="strip">Backing the companies</h1>
                          <br><h1 class="strip">of tomorrow</h1>
                        </div>
                    </div>  
                  <div class="htext2">
                    <?php if($textline2!=""){ echo "<h4>".$textline2."</h4>"; }?>
                    <?php if($textline3!=""){ echo "<h5>".$textline3."</h5>"; }?>
                  </div>
                </div>


              </div>



              <?php 
                  if(!$active){ 
                     $pr .= "<img src='".$slide['src']."' class='preload'/>"; 
                  } 
                }
              }
            }
          ?>
          </div>

         

      </div>

      <?php echo $pr; ?>
      <div class="container goscroll"></div>
       <div class="start-content">
        <div class="container">
          <div class="row padblock_one">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 center">
                   <div class="tick2 tick showmobile"><h2>We are a leading venture capitalfirm based in the Nordics.</h2></div>
                   <div class="ticker2 init hidemobile"> 
                    <div class="tick2 tick"><h2>We are a leading Nordic based Venture Capital firm.</h2></div>
                  <div class="tick2"><h2>We focus on being the first institutional backer of top entrepreneurs within consumer and hardware.</h2></div>
                  <div class="tick2"><h2>We use our extensive company building backgrounds to serve top entrepreneurs.</h2></div>
                 <div class="tick2"><h2>We use our extensive company building backgrounds to serve top entrepreneurs.</h2></div>
                  </h2>
                   </div> 
                  <div class="ticker_icons hidemobile">
                    <ul>
                      <li class="one">
                      <span class="sprite-spinn_sun icon"></span>
                        <span class="text">We are</span>
                      </li>

                      <li class="two">
                        <span class="sprite-spinneye icon focus"></span>
                        <span class="text">Our focus</span>
                      </li>

                      <li class="three">
                        <span class="sprite-spin_service icon"></span>
                        <span class="text">Our service</span>
                      </li>

                    </ul>

                  </div>  
                </div>
                <!--pay attention-->

              </div>
            </div>
          </div>
        </div>

        <?php
        /* POSTS */
        $args = array(
          'posts_per_page'   => 7,
          'offset'           => 0,
          'orderby'          => 'post_date',
          'order'            => 'DESC',
          'post_type'        => 'investment',
          'post_status'      => 'publish',
          'investment_category' => 'Bump startpage'
          );
        $posts_array = get_posts( $args );

        $myposts = get_posts( $args );
        ?>
        <div class='lightgreen_bg'>
          <div class='container'>
            <div class="row padblock_two">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="center homeblock">
                      <div class="icon_center sprite-large_invest hidemobile"></div> 
                      <h2 class="mobile">We invest in fast-growing companies in early- and later stages.</h2>
                    </div>
                    <?php
                    foreach ( $myposts as $post ) : setup_postdata( $post );
                      $postid = $post->ID;
                      $portrait = "";
                      $portrait = get_post_meta($postid,"custom_logo_image",true);  
                     ?>
                      <div id="post-<?php the_ID(); ?>" <?php post_class('col-xs-6 col-md-3  col-lg-3  col-sm-4 filterable '.$tax); ?> role="article">
                        <a href="<?php the_permalink() ?>"  select="post_<?php the_ID();?>" rel="bookmark" title="<?php the_title_attribute(); ?>">   
                            <div class="portrait_list">
                              <div class='over'>
                                <button type="button" class="btn btn-default btn-white"><?php the_title();?></button>
                              </div>
                              <img src="<?php echo $portrait;?>" alt="<?php the_title();?>">
                            </div>
                        </a>
                      </div> <!-- end article -->
                    <?php endforeach; 
                    wp_reset_postdata();?>

                    <!-- COULD YOU BE THE NEXT COMPANY STATIC BOX -->
                      <div <?php post_class('col-xs-6 col-md-3  col-lg-3  col-sm-4 static-bump');?> role="article">
                       <a href="<?php echo bloginfo("url");?>/contact/">  
                            <div class="portrait_list">
                              <span class="green">Are you building the company of tomorrow?</span>
                              <div class='over'>
                                <button type="button" class="btn btn-default btn-white">Contact us</button>
                              </div>
                              <img src="<?php echo $portrait;?>">

                            </div>
                        </a>
                      </div> <!-- end article -->

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
                          <img src="<?php echo $slide2['img']['src'];?>" alt="First slide"/>

                            <div class="carousel-caption">
                              <?php foreach($textline as $txt){ ?>
                              <h2 class="strip2"><?php echo $txt;?></h2><br/>
                              <?php } ?>
                              <div class"title" style="margin-top:10px;">
                                <p class="strip3"><?php echo $slide2['Slide text line 2'];?></p><br/>
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
            <!--pay attention-->

        </div><!-- /.carousel -->
            <?php if($c != 0){ ?>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><div class="lefticon"></div></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><div class="righticon"></div></a>
            <?php } ?>
      </div>

        <div class='lightgreen_bg'>
          <div class='container'>
            <div class="row padblock_two">

              <div class="center homeblock mobile">
                      <div class="icon_center sprite-large_news hidemobile"></div> 
                      <h2 class="mobile">Find out what we are up to and what's happening in our network.</h2>
              </div>



               <div class="feed">  

              <?php 
                  require_once("feed.php");
                  feed(1);
              ?>

        
                </div><!-- END FEED --> 
              

            </div>
          </div>
            <p class='center'>
              <a href="<?php echo bloginfo("url");?>/news/">
              <button class='btn btn-default btn-green more'>More news</button>
              </a>
            </p>
        </div>


   
      <?php endwhile; ?>
      
      <?php endif; ?>

      </div> <!-- END STARTAPGE -->
    </div><!-- END startpage-content -->



<?php get_footer(); ?>