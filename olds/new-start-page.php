<?php
/*
Template Name: News startpage
*/
?>

<?php get_header(); ?>
      
<style>
body{
  padding-top: 60px;
}
</style>
      <div style="">

        <?php //echo do_shortcode('[slideshow id=1]'); ?>
        <?php do_action('slideshow_deploy', '153'); ?>

      </div>
      <div class='container'>
        <div class="row">
          <div class="col-lg-12">

          </div>
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <h1>Hello, I'm John Transue, a Digital Marketing, Social Media Strategist and Graphic Designer currently working at <a href="http://coca-cola.com" target="_Blank"><span style="white-space: nowrap;">Coca-Cola</span></a> in Philadelphia.</h1>
                <p class="lead">As a marketing and design coordinator at Coca-Cola, I help create, produce, manage, oversee and ensure the organization's quality of creative product supports the high standards of Coca-Cola and aligns with our style guide for some of the world's most valuable brands: Coca-Cola, Dasani, Sprite, Powerade, Honest Tea, Glac&eacute;au Vitaminwater and many more.</p>
              </div>
              <!--pay attention-->
              <div class="col-lg-4 col-sm-4">
                <h2>Graphic Design</h2>
                <p>As graphic designer at Coca-Cola, I create advertising for print and web, design billboards, utilize brand assets to reinvigorate existing designs and ensure high quality creative product.</p>
                <p>I've worked on many campaigns and with many brands like Walmart, ShopRite, Six Flags, Philadelphia Eagles, Phillies, Union and other venues local to the east coast.</p>
              </div>
              <div class="col-lg-4 col-sm-4">
                <h2>Social Media</h2>
                <p>Social Media has always been an important part of my interest in connecting and networking via the internet.&nbsp;Marketing practices have dramatically shifted with the rise of social media and proliferation of devices, platforms, and applications.</p>
                <p>The ability to listen, respond in a shifting environment presents new opportunities and challenges for marketers - challenges I think are important and fun.</p>
              </div>
              <div class="col-lg-4 col-sm-4">
                <h2>Marketing</h2>
                <p>I develop and Implement marketing materials for Coca-Cola brands, work with agencies and vendors to fulfill requests for strategic brand activation, provide project deliverables such as print ads, billboards, point of sale, Powerpoint presentations and web banners.</p>
                <p>Additionally, I help the Coca-Cola organization to learn and navigate a proprietary global web-based digital asset management system.</p>
              </div>
              <!--pay attention-->
            </div>



        </div>


<?php get_footer(); ?>