<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
  
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <title><?php wp_title( '|', true, 'right' ); ?></title>
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <!-- media-queries.js (fallback) -->
    <!--[if lt IE 9]>
      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>      
    <![endif]-->

    <!-- html5.js -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
      <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <!-- wordpress head functions -->
    <?php wp_head(); ?>
    <!-- end of wordpress head -->

    <!-- theme options from options panel -->
    <?php get_wpbs_theme_options(); ?>

    <!-- typeahead plugin - if top nav search bar enabled -->
    <?php require_once('library/typeahead.php'); ?>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">  

  </head>
  
  <body <?php body_class(); ?>>
      <!--facebook-->
    <div id="fb-root"></div>
    <script>
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=164950143540443";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    <!--end facebook-->  
<div class="cbp-af-header">
  <div class="cbp-af-inner container">
     <a href="<?php echo home_url(); ?>"><h1>Creandum</h1></a>
      <nav>
          <ul>

           <?php
           $menu = "Menu";
           $items = wp_get_nav_menu_items( $menu ); 
           if($items){
              foreach($items as $item){
                ?>

                  <li>
                      <a href="<?php echo $item->url;?>">
                        <span class="<?php echo $item->classes[0];?>  head"></span><?php echo $item->title;?>
                      </a>
                  </li>
               
                <?php
              }
           }

           ?>

          </ul>
      </nav>
  </div>
</div>

    

