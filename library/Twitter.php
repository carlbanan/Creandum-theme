<?php
   class Twitter {
      
      private $consumerKey = "iPzjdLRN8qXy9QxRQBGw";
      private $consumerSec = "LOtjNcv3hcCFmcC7lnqSbj8nuaZWFS3MnhFVlpM4";
      public $tweet = false;
      private $tweetcount = 1;

      function __construct($username,$filename,$count = 1) {


         $this->tweetcount = $count;

         $data = @file_get_contents($filename);

         if($data === false) {
            $tweet = $this->fetchNewTweet($username);
            $this->updateSaveFile($filename,$tweet);
            $this->tweet = $tweet;
         }else{
            $data = json_decode($data);
            if($data->{"last_update"}+3600 < time()) {

               $tweet = $this->fetchNewTweet($username);

               $this->updateSaveFile($filename,$tweet);
               $this->tweet = $tweet;
            }else{
               $this->tweet = $data->{"tweet"};
            }
         }
      }
      function updateSaveFile($filename,$tweet) {
         $f = fopen($filename,'w');
         if($f == false) {
            return false;
         }
         $data = array(
            'last_update' => time(),
            'tweet' => $tweet
         );
         fwrite($f,json_encode($data));
         fclose($f);
         return true;
      }
      function fetchNewTweet($username) {
         $count = $this->tweetcount;

         $consumerEncoded = base64_encode($this->consumerKey.':'.$this->consumerSec);
         $bearerToken = $this->request("https://api.twitter.com/oauth2/token",'Basic',$consumerEncoded,true);
         if($bearerToken == false) {
            return false;
         }

         $tweet = $this->request("https://api.twitter.com/1.1/statuses/user_timeline.json?count=".$count."&screen_name=".$username,'Bearer',$bearerToken);

         $tweet = json_decode($tweet);

         if($tweet == false || $tweet == null) {
            return false;
         }

         return $tweet;

      }
      function request($url,$authType,$authValue,$bearer=false) {
         $ch = curl_init();
         if($bearer == true) {
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_POSTFIELDS,"grant_type=client_credentials");
         }
         curl_setopt($ch,CURLOPT_URL,$url);
         curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
         curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 5);
         curl_setopt($ch,CURLOPT_USERAGENT, "Tweet Fetcher PHP 0.0.1");
         curl_setopt($ch,CURLOPT_FOLLOWLOCATION, 1);
         curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
         curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,2);
         curl_setopt($ch,CURLOPT_HTTPHEADER,array('Authorization: '.$authType.' '.$authValue,'Content-Type: application/x-www-form-urlencoded;charset=UTF-8'));
         $result = curl_exec($ch);
         curl_close($ch);
         if($bearer == true) {
            $json = json_decode($result);
            if(isset($json->{'access_token'})) {
               return $json->{'access_token'};
            }
            return false;
         }
         return $result;
      }
   }
?>