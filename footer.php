
     <div id="footer">
       <div class="container">
         <ul class="links">          
           
           <?php
           $menu = "Footer";
           $items = wp_get_nav_menu_items( $menu ); 
           
           if($items){
              foreach($items as $item){
                ?>

                  <li>
                      <a href="<?php echo $item->url;?>">
                        <p><?php echo $item->title;?></p>
                      </a>
                  </li>
               
                <?php
              }
           }
           ?>
        </ul>

          <div class="hidemobile icons-right">
                <a href="https://twitter.com/creandum" target="_blank"><button type="button" class="btn2 btn-default btn-lg right">
                	<span class="twitter-icon btntext hidden-xs"></span>
                	Follow us on twitter
                </button>
              </a>

              <a href="http://www.linkedin.com/company/112817?trk=tyah&trkInfo=tas%3Acrean%2Cidx%3A1-1-1" target="_blank">
                <div class="btnmobile">
                <span class="in"></span>
                </div>
               </a> 

               <a href="https://angel.co/creandum" target="_blank">
                <div class="btnmobile">
                  <span class="angellist"></span>
                </div>
               </a> 
          </div>
            
           <div class="showmobile mobilesocial">
             <div class="btnmobile">
              <span class="twitter-icon"></span>
            </div>
             <div class="btnmobile">
              <span class="in"></span>
            </div>
             <div class="btnmobile">
              <span class="angellist"></span>
            </div>
        </div>
        
        <div class="hidemobile">
          <div class="info">
            <ul class="details">
              <li><p>Jacobsbergsgatan 18, Stockholm, 103 86</p></li>
              <li><p>Box 7068, SE-103 86 Stockholm</p></li>
              <li><p>470 Ramona Street, Palo Alto, CA 94301</p></li>
              <li><p>+46 (0)8 524 636 30</p></li>
            </ul>
          </div>
         </div>

       </div>   
      </div>	
		
		
				
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
        <!--social scripts-->
        <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
        <!-- Place this tag after the last +1 button tag. -->
        <script type="text/javascript">
          (function() {
            var po = document.createElement('script');
            po.type = 'text/javascript';
            po.async = true;
            po.src = 'https://apis.google.com/js/plusone.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(po, s);
          })();
        </script>
        <!--end social scripts-->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>