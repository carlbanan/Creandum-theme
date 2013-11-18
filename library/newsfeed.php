<?php
   class newsfeed {
         
      private $ant;

      function __construct() {

      }
      function give_newsfeed($ant = 10, $ptype = '') {

         $this->ant = $ant;
         $nfeed = array();
         $count = 0;

         if($ptype == '' || $ptype == 'blog' ){
           // GET POSTS
           $args = array(
              'posts_per_page'   => $ant,
              'offset'           => 0,
              'category'         => '',
              'orderby'          => 'post_date',
              'order'            => 'DESC',
              'include'          => '',
              'exclude'          => '',
              'meta_key'         => '',
              'meta_value'       => '',
              'post_type'        => 'post',
              'post_mime_type'   => '',
              'post_parent'      => '',
              'post_status'      => 'publish',
              'suppress_filters' => true );

           $posts_array = get_posts( $args );

           $type = "blog";
           foreach($posts_array as $post){
                // Find connected pages
                $connected = new WP_Query( array(
                  'connected_type' => 'posts_to_team',
                  'connected_items' => $post,
                  'nopaging' => true,
                  )
                );

                // Display connected pages
                $i = 0;
                if ( $connected->have_posts() ) :

                  while ( $connected->have_posts() ) : $connected->the_post();                           
                         $imgid = get_the_ID();
                         $author = get_the_title();
                  endwhile;        

                // Prevent weirdness
                wp_reset_postdata();
                endif;

              $imgurl = get_post_meta($imgid,"custom_portrait_image",true);

              $b_item = array(
                          'type'   => $type,
                          'date'   => $post->post_date,
                          'title'  => $post->post_title,
                          'url'    => get_bloginfo('url')."/".$post->post_name,
                          'author'  => $author,
                          'author_img' =>  $imgurl
                        );

                array_push($nfeed,$b_item);
                $count++;
            }
          } // END BLOG

         // TWITTER

        if($ptype == '' || $ptype == 'twitter' ){
          require_once('Twitter.php');
          
          $twitterCount      = $ant; 
          $twitterUsername   = "creandum";
          $twitterCacheFile  = "cache/twitter_".$twitterCount.".cacheFile";

          $Twitter = new Twitter($twitterUsername,$twitterCacheFile,$twitterCount);


          if($Twitter->tweet != false) {

              $type = "twitter";

              foreach($Twitter->tweet as $twt){

                 $title = $twt->text;
                 $url = "https://www.twitter.com/".$twt->user->{"screen_name"}."/status/".$twt->{"id_str"};
                 $date = date('Y-m-d H:i:s',strtotime($twt->{"created_at"}));
                 $tweet_user_url = "https://www.twitter.com/".$twt->user->{"screen_name"};
                 $authour = $twt->user->{"screen_name"};    

                 $t_item = array(
                            'type'   => $type,
                            'date'   => $date,
                            'title'  => $title,
                            'url'    => $url,
                            'author'=> $authour
                          );

                 array_push($nfeed,$t_item);
                
              }

           }
        } // end twitter


         // XML FEED
        if($ptype == '' || $ptype == 'xml' ){
           $xmlsource = "http://swedishstartupspace.com/tag/swedish-startup-space/feed/rss";
           $xmlsource = "http://swedishstartupspace.com/feed/";
           //$rawFeed = file_get_contents($xmlsource);

           $max_age = 2*60*60;     // 2 HOURE
           $feed = $this->get_xml($xmlsource,$max_age);

           $doc = new DOMDocument();
           $doc->loadXML($feed);
           //$x = $doc->documentElement;
           $x = $doc->getElementsByTagName('item');
           
           $type = "external";
           $ant_xml = 0;
           foreach ($x AS $item){
                $title = $item->getElementsByTagName('title')->item(0)->nodeValue;
                $date  = date("Y-m-d H:i:s",strtotime($item->getElementsByTagName('pubDate')->item(0)->nodeValue));
                $url  = $item->getElementsByTagName('link')->item(0)->nodeValue;
                $authour = "";
                $x_item = array(
                            'type'   => $type,
                            'date'   => $date,
                            'title'  => $title,
                            'url'    => $url,
                            'author'=> $authour
                          );
                if($ant_xml < ($ant*3)){
                    $ant_xml++;
                    array_push($nfeed,$x_item);
                }
           }
        }

         // SORT ARRAY ON DATE
         foreach ($nfeed as $key => $row) {
              $ddate[$key]  = $row['date'];
              $ttype[$key]  = $row['type'];
          }
          array_multisort($ddate, SORT_DESC, $ttype, SORT_ASC, $nfeed);

          return $nfeed;


      }
      function give_tweets($ant){

            $ret = array();
            $max = 8;

            query_posts( array( 'post_type' => 'investment', 'posts_per_page' => 10) );
            if ( have_posts() ) : while ( have_posts() ) : the_post();

              $postid = get_the_ID();
              $twitter_src = "";
              $twitter_src = get_post_meta($postid,"custom_twitter",true);
             

              if($twitter_src && $t <= $max){ 
                   $t++;
                   require_once('Twitter.php');
                   $twitterUsername = $twitter_src;
                   $twitterCacheFile  = "cache/twitter_invests_".$twitter_src.".cacheFile";
                   $twitterCount = 1;

                   $Twitter = new Twitter($twitterUsername,$twitterCacheFile,$twitterCount);

                   if($Twitter->tweet != false) {

                      foreach($Twitter->tweet as $twt){
                         $d['tweet'] = $twt->text;
                         $d['tweet_user_url'] = "https://www.twitter.com/".$twt->user->{"screen_name"};
                         $d['tweet_user'] = $twt->user->{"screen_name"};
                         $d['tweet_url'] = "https://www.twitter.com/".$twt->user->{"screen_name"}."/status/".$twt->{"id_str"};
                         $d['tweet_date'] = date('F j, Y \a\t g:i a',strtotime($twt->{"created_at"}));
                         $d['tweet_date_time'] = date('Y-m-d H:i:s',strtotime($twt->{"created_at"}));
                        
                         array_push($ret,$d);
                      }

                  }
              }
            endwhile;  
            endif;
         // SORT ARRAY ON DATE
        if($ret){
             foreach ($ret as $key => $row) {
                $ddate[$key]  = $row['tweet_date_time'];
                $ttype[$key]  = $row['tweet_user'];
            }
            array_multisort($ddate, SORT_DESC, $ttype, SORT_ASC, $ret);
        }
        return $ret;
      }

      function get_xml($url, $max_age){

          $file = 'cache/' . md5($url);

          if (file_exists($file)
           && filemtime($file) >= time() - $max_age)
          {
              // the cache file exists and is fresh enough
              return file_get_contents($file);
          }

          $xml = file_get_contents($url);
          $feed = file_put_contents($file, $xml);
          return $xml;
      }



   }
?>