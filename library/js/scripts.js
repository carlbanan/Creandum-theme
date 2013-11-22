/* imgsizer (flexible images for fluid sites) */
var imgSizer={Config:{imgCache:[],spacer:"/path/to/your/spacer.gif"},collate:function(aScope){var isOldIE=(document.all&&!window.opera&&!window.XDomainRequest)?1:0;if(isOldIE&&document.getElementsByTagName){var c=imgSizer;var imgCache=c.Config.imgCache;var images=(aScope&&aScope.length)?aScope:document.getElementsByTagName("img");for(var i=0;i<images.length;i++){images[i].origWidth=images[i].offsetWidth;images[i].origHeight=images[i].offsetHeight;imgCache.push(images[i]);c.ieAlpha(images[i]);images[i].style.width="100%";}
if(imgCache.length){c.resize(function(){for(var i=0;i<imgCache.length;i++){var ratio=(imgCache[i].offsetWidth/imgCache[i].origWidth);imgCache[i].style.height=(imgCache[i].origHeight*ratio)+"px";}});}}},ieAlpha:function(img){var c=imgSizer;if(img.oldSrc){img.src=img.oldSrc;}
var src=img.src;img.style.width=img.offsetWidth+"px";img.style.height=img.offsetHeight+"px";img.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+src+"', sizingMethod='scale')"
img.oldSrc=src;img.src=c.Config.spacer;},resize:function(func){var oldonresize=window.onresize;if(typeof window.onresize!='function'){window.onresize=func;}else{window.onresize=function(){if(oldonresize){oldonresize();}
func();}}}}
// add twitter bootstrap classes and color based on how many times tag is used
function addTwitterBSClass(thisObj) {
  var title = $(thisObj).attr('title');
  if (title) {
    var titles = title.split(' ');
    if (titles[0]) {
      var num = parseInt(titles[0]);
      if (num > 0)
      	$(thisObj).addClass('label');
      if (num == 2)
        $(thisObj).addClass('label label-info');
      if (num > 2 && num < 4)
        $(thisObj).addClass('label label-success');
      if (num >= 5 && num < 10)
        $(thisObj).addClass('label label-warning');
      if (num >=10)
        $(thisObj).addClass('label label-important');
    }
  }
  else
  	$(thisObj).addClass('label');
  return true;
}

// as the page loads, call these scripts
jQuery(document).ready(function($) {


	var windowHeight = $(window).height();
	

	// modify tag cloud links to match up with twitter bootstrap
	$("#tag-cloud a").each(function() {
	    addTwitterBSClass(this);
	    return true;
	});
	
	$("p.tags a").each(function() {
		addTwitterBSClass(this);
		return true;
	});
	
	$("ol.commentlist a.comment-reply-link").each(function() {
		$(this).addClass('btn btn-success btn-mini');
		return true;
	});
	
	$('#cancel-comment-reply-link').each(function() {
		$(this).addClass('btn btn-danger btn-mini');
		return true;
	});
	
	$('article.post').hover(function(){
		$('a.edit-post').show();
	},function(){
		$('a.edit-post').hide();
	});
	
	// Input placeholder text fix for IE
	$('[placeholder]').focus(function() {
	  var input = $(this);
	  if (input.val() == input.attr('placeholder')) {
		input.val('');
		input.removeClass('placeholder');
	  }
	}).blur(function() {
	  var input = $(this);
	  if (input.val() == '' || input.val() == input.attr('placeholder')) {
		input.addClass('placeholder');
		input.val(input.attr('placeholder'));
	  }
	}).blur();
	
	// Prevent submission of empty form
	$('[placeholder]').parents('form').submit(function() {
	  $(this).find('[placeholder]').each(function() {
		var input = $(this);
		if (input.val() == input.attr('placeholder')) {
		  input.val('');
		}
	  })
	});
	
				
	$('.alert-message').alert();
	
	$('.dropdown-toggle').dropdown();

	var route = router();
 



	function router(){
		var r = $("#content").attr("page");
		if(r){
			if(r == 'investment' || r == 'team'  || r == 'network'){
				ajax_nav();
			}
		}
	}
	function ajax_nav(){


			if (History.enabled) {
				State = History.getState();
				// set initial state to first page that was loaded
				History.pushState({urlPath: window.location.pathname}, $("title").text(), State.urlPath);
			}
			else {
				return false;

			}


			var loadAjaxContent = function(target, urlBase) {

				var reqData = { async : 1}

				// EXEC
				$.get(urlBase, reqData, function(d) {
					$("#async_content").html(d);
					image_update();
					$(".loader").removeClass("show");
					$('html, body').animate({
				         scrollTop: 0
					 },250);
				});	

						
			};

			var updateContent = function(State) {

				var selector = "#"+State.data.select;

			    if ($(selector).length) { //  content is already in #hidden_content
			    
			        $('#async_content').children().appendTo('#hidden_content');

			        $('#async_content').html("");
			        $(selector).appendTo('#async_content');
			        image_update();
			        $(".loader").removeClass("show");
					$('html, body').animate({
				         scrollTop: 0
					 },0);

			    }
			    else { 

		        	$('#async_content').children().clone().appendTo('#hidden_content');
			        
			        loadAjaxContent('#async_content', State.url);

			    }

				// GO TOPSIDE
				 /*


				 */
				

		 	 };
		 	 var linkHandler = function(){

		 	 	$("a.async").unbind("click");
				$("a.async").click(function(e){
					e.preventDefault();

					// SHOW LOADER
					$(".loader").addClass("show");
					$(".async.active").removeClass("active")
					$(this).addClass("active");

					var urlPath = $(this).attr('href');
					var select = $(this).attr("select");

					var title = $(this).text();
					History.pushState({urlPath: urlPath, select : select}, title, urlPath);


					return false; // prevents default click action of <a ...>

				});	 	 	
		 	 }

			// Content update and back/forward button handler
			History.Adapter.bind(window, 'statechange', function() {
			  	updateContent(History.getState());
			});


			linkHandler();

			var image_update = function(){
				var bigimage = $("#async_content .big-image-container");
				var bigimage_src = bigimage.attr("bigimage");

				if(bigimage_src){
					bigimage.css("background-image","url('"+bigimage_src+"')");
				}				
			}



	}  /* END AJAX NAV */

	

	
	var cbpAnimatedHeader = (function() {
	 
	    var docElem = document.documentElement,
	        didScroll = false,
	        changeHeaderOn = 3;
	 	var header = $(".cbp-af-header");

	    function init() {
	        window.addEventListener( 'scroll', function( event ) {
	            if( !didScroll ) {
	                didScroll = true;
	                setTimeout( scrollPage, 3 );
	            }
	        }, false );
	    }
	 
	    function scrollPage() {
	        var sy = scrollY(3);
	        if ( sy >= changeHeaderOn ) {
	            if(!header.hasClass("cbp-af-header-shrink")){
	            	header.addClass("cbp-af-header-shrink");
	            }
	        }
	        else {
	        	header.removeClass("cbp-af-header-shrink");
	        }
	        didScroll = false;
	    }
	    function scrollY() {
	        return window.pageYOffset || docElem.scrollTop;
	    }

	 
	    init();
	 
	})();

	




    $('li.one').hover(function(){
    	$(".ticker2.init").removeClass("init");     	    	    
    	$(".ticker2 h2").css("top",0);
    });
 
    $('.two').hover(function(){  
        	$(".ticker2 h2").css("top","-103px" ); 
			$(".ticker2.init").removeClass("init");     		
	}); 
    $('.three').hover(function(){     
			$(".ticker2.init").removeClass("init");     	
          	$(".ticker2 h2").css("top","-222px" );   	
 	});


    var $window = $(window);
    var $box = $('.sunrise');
    var $sun = $('.sun');
    var $eye = $('.eye')
    var $globe = $('.globe')
    var $circle = $('.circle')
    var $wheel = $('.wheel')
    var $tools = $('.box')
    var $outerEye = $('.eye_outer')
    var height = $('.who').css('height'); // get the height value from the css
    var parseHeight = parseInt(height); // parse the height value from 300px to 300

    $window.on('scroll', function(e) {
    	var position = $(this).scrollTop(); // on scroll update the position value
    	var changeValue = 100 + ((parseHeight * 2 - position) / 10)

    	if (position + 300 <= parseHeight ) { // start value is 0, stop when the value reach 300

    		$sun.css({
    			'top': position / 1.7, // 300 - whatever scroll says
    			/*'-webkit-transform': 'rotate(' + position + 'deg)'*/
    		})

    		$box.css({
    			'height': parseHeight - position - 100 * 1.3, // 300 - whatever scroll says
    		})
    	}

    	if (position >= parseHeight && position <= parseHeight * 2 ) {
    		
    		$globe.css({
    			'marginTop': ((position - parseHeight) / 4)
    		})
    	}

    	if (position >= parseHeight * 2 && position <= parseHeight * 3 ) { // start value is parseheight("800"), stop when the value reach parseheight * 2 = 800*2 = 1600

    		$outerEye.css({
    			'marginTop' : ((position - parseHeight * 2) / 3)
    		})

    		if(changeValue > 10) {

	    		$eye.css({
	    			'width':  changeValue,
	    			'height':  changeValue,
	    			'marginLeft':  -(changeValue) / 2,
	    			'marginTop':  -(changeValue) / 2,
	    		})

	    	}

    	} 

    	if (position >= parseHeight * 3 && position <= parseHeight * 4 - 200 ) { // start value is parseheight("800"), stop when the value reach parseheight * 2 = 800*2 = 1600

    		$wheel.css({
    			'top': parseInt((position - parseHeight * 3) / 3), // 300 - whatever scroll says
    			'-webkit-transform': 'rotate(' + parseInt((position - parseHeight * 3) / 1) + 'deg)'
    		})

    	}

    	if ((position >= (parseHeight * 4))  && position <= parseHeight * 5 - 50 ) {
    		console.log(position)
    		console.log((parseHeight * 4) - (parseHeight / 20))

    		$tools.css({
    			'marginTop': ((position - parseHeight  * 4)) / 2
    		})
    	}

    })


	var gobig = $(".content-header").hasClass("bigimage"); 
	if(gobig){
		//squarebox();
		setBigImageHeight(1);		
	}
	function setBigImageHeight(t){

		//CHECK HEIGHT IF RESIZE
		if(t == 2){
			windowHeight = $(window).height();			
		}
		
		// SET HEIGHT
		windowHeight = windowHeight;
		
		if(windowHeight > 800){
			windowHeight = 800;
			$(".content-header-text").addClass("bigheight");
			$(".content-header-text").addClass("bigheight");
		}
		
		$(".content-header-wrap,.slider-bigimage .item, #slider-bigimage").css("height",windowHeight);
		$(".content-header-text div.htext").css("margin-top", ((windowHeight/2) - 270) );
		$(".content-header-text div.htext2").css("margin-top", ((windowHeight/2) - 270) );


		//var slider = new Swiper('.startpage')

		// CHANGE IMG
		$('#slider-bigimage').each(function(){
		    (function(obj){
		        setInterval(function(){
		            var $cur = obj.find('.active').removeClass('active');
		            var $next = $cur.next().length?$cur.next():obj.children().eq(0);
		            $next.addClass('active');
		        },7000);
		    })($(this));
		        
		});
	}


	var spinBigImage = function(){
		var images = $("#slider-bigimage");
		$("#nextbig").click(function(){
			
			act = $(".content-header-wrap.active");
			next = act.next(".content-header-wrap").attr("id");
			
			console.log(next);

			nextimg = $("#"+id+" .bigimage").attr("style");
			console.log(nextimg);
			if(next.length == 0){
				next = $("#img1.content-header-wrap");
			}
			next.addClass("active");

			act.removeClass("active");
			
		});
	}	
	if($("#slider-bigimage").length >= 1){
		spinBigImage();
	}
	if ( ! Modernizr.touch){
    	$(window).bind('scroll',function(e){
    		bigScroll();
	    });
	 }
	function bigScroll(){
		var yp = $(window).scrollTop();
		var gobig = $(".content-header").hasClass("bigimage"); 
		if(gobig){
			$('.bigimage').css('top',(0-(yp*.2))+'px');	
			
			if(yp >= 40){
				$(".goscroll").fadeOut();	
			}		
		}
	}
	if($(".forms").length >= 1){
		form_init();
	}
	function form_init(){

		// TEXAREA COUNTER
		$("textarea, input").on("focus",function(){
			var counter;
			inputid = $(this).attr("id");
			pcounter = $(".counter[for='"+inputid+"']");
			if(pcounter.length >= 1){
				pcounter.addClass("active");
				max = $(this).attr("maxlength");
				$(this).on("keyup",function(){
					var count = $(this).val().length;
					pcounter.html(count+" / "+max);
				});
			}
		});

		// CHECKBOX VALUE
		$(".checkbox").on("click",function(){
			$(this).parent("div.checkform").children(".active").removeClass("active");
			$(this).addClass("active");
			var cval = $(this).attr("value");
			$(this).parent("div.checkform").children("input").attr("value",cval);
		});

		// SEND FORM
		$("#pitch").submit(function( event ) {
			event.preventDefault();
			$("#dialog").hide().removeClass("success").html("");
			var data = $(this).serializeArray();
			url = $(this).attr("url");
			 $.post(url,data).done(function(d){
			 	dd = JSON.parse(d);
			 	if(dd.response == 1){
			 		$("#dialog").fadeIn().addClass("success").html(dd.message);		 		
			 	} 
			 	else{
			 		$("#dialog").fadeIn().html(dd.message);
			 	}
	 	

			 },'json');
		  	 
		});

	}


    function Swiper(element) {
        var $element = $(element);

        var current = 0;
        var $window = $(window);
        
        var length = $element.find('li').length;

        function setDimensions () {
            var width = $window.width();
            $element.find('ul').width(width * length);
            $element.find('li').width(width);
        }
        
        setDimensions();

        function slideImage () {
            var width = $window.width();
            $element.find('ul').animate({
                'marginLeft': -( current * width)
            }, 'slow');
        }

        function setCurrent (dir) {
            var pos = current;
            pos += ( ~~( dir === 'next' ) || -1 );

            current = ( pos < 0 ) ? length - 1 : pos % length;
            return pos;
        }

        return {
            slide: function(dir) {
                setCurrent(dir);
                slideImage();
            },
            setDimensions: function() {
                setDimensions();
            }
        };

    }
    $("#menutoggle").click(function(){
    	$(".cbp-af-header").toggleClass("mobile");

    });


    function scrollY() {
        return window.pageYOffset || document.documentElement.scrollTop;
    }
    var show;
    // STICKY FILTER
    if($(".filter-menu").length >= 1){
    	 fixh = $(".filter-menu").offset().top;
    	$(window).scroll(function(){
	        var sy = scrollY();
	       

	  	    if (sy >= fixh ) {	

	        	$(".filter-menu").addClass("fix");
	       	}
	       	else{
	       		$(".filter-menu").removeClass("fix");
	       	}
	       	
    	});
		$(".filter").bind("click",function(){
			show = $(this).attr("id");
			$(".filterable").css( "display", "block" );
			if(show != ""){
				$(".filterable").not("."+show).css( "display", "none" );
			}
			$(this).parent(".filter-menu").children(".active").removeClass("active");
			$(this).addClass("active");		
			$('html, body').animate({
		         scrollTop: ( fixh - 50 )
			 },250);
		});
    }
 
    // NEWSDECK INFINITE SCROLL
 
	 var newsdeck = function(){
	 	
	 	// NEWSDECK CONFIG
 		page = 0;
 		ant = 3;	

 		// START
 		checkHeight();

	 	function checkHeight(){
	 		page = 1;
	 		fetchNews(page);
	 		$(window).scroll(function(){

				var tot 		= $(document).height();
				var wheight 	= $(window).height();
				var offset 		= scrollY();
				
				

				if ($("#more").length >= 1){			// LOAD ONE MORE

					var offset_more = $("#more").offset().top;
					console.log(offset_more+" "+(wheight + offset));

					if( (offset_more - 200) <= (wheight + offset) ){

						page++;
						fetchNews(page);
					}
				}
			});
	 	}
	 	function fetchNews(page){
	 		var filter = "";
	 		if(show){
	 			filter = show;
	 		}
	 		console.log(ant+" "+page);
			var reqData = { async : 1, paginate : page , ant : ant, content : 'feed', filter : filter }
			var urlBase = $("#feed").attr("url");
			// EXEC
			$.get(urlBase, reqData, function(d) {
				if(d == 1){
					$("#more").remove();
				}
				else{
					$("#more").remove();
					$("#feed").append(d);
					if(page == 1){
						if (document.documentElement.clientWidth > 1070) {
							fetchPodio();
						}
					}
				}

			});	
	 	}
	 	function fetchPodio(){
	 		
			var reqData = { async : 1, content : 'podio' }
			var urlBase = $("#feed").attr("url");
			// EXEC
			$.get(urlBase, reqData, function(d) {
				
				$("#tweets").append(d);
				fetchTweets();

			});	
	 	}
	 	function fetchTweets(){
	 		
			var reqData = { async : 1, content : 'side' }
			var urlBase = $("#feed").attr("url");
			// EXEC
			$.get(urlBase, reqData, function(d) {
				
				$("#tweets").append(d);

			});	
	 	}	 	
	 	
	 }
     if($(".newsdeck .feed").length >= 1){
     	newsdeck();
     }
}); /* end of as page load scripts */


