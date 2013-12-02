jQuery(window).bind("load", function() {
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
});

// as the page loads, call these scripts
jQuery(document).ready(function($) {


	var windowHeight = $(window).height();

	var route = router();
 
	function router(){
		var r = $("#content").attr("page");
		if(r){
			if(r == 'investment' || r == 'team'  || r == 'network'){
				if(navigator.appName.indexOf("Internet Explorer")==-1){ 
					ajax_nav();
				}
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

					// SETUP LINKS
					filter_menu();
					next_prev_menu();
					linkHandler();

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

					// SETUP LINKS
					next_prev_menu();
					linkHandler();

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



		 	 	$("a.async,.async a").unbind("click");
				$("a.async,.async a").click(function(e){
					e.preventDefault();

					$(".orig-filter").delay(100).fadeOut();

					// SHOW LOADER
					$(".loader").addClass("show");
					$(".async.active").removeClass("active")
					$(this).addClass("active");

					var urlPath = $(this).attr('href');
					var select = $(this).attr("select");

					var title = $(this).find("button").text();
					if(title == ""){
						 title = $(this).text();
					}
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

	



	
	if($("#myCarousel").length >= 1){
		var intv = $("#myCarousel").attr("data-interval");
		$('#myCarousel').carousel({
		  interval: intv
		});
	}

	//HERO TICKER
	var current = 1; 
	var height = jQuery('.ticker').height(); 
	var numberDivs = jQuery('.ticker').children().length; 
	var first = jQuery('.ticker h2:nth-child(1)'); 
	$(".icon-"+current).addClass("activeicon");
	setInterval(function() {
	    var number = current * -height;
	    first.css('margin-top', number + 'px');

            // SET ICON LI
            $(".activeicon").removeClass("activeicon");
            $(".icon-"+(current+1)).addClass("activeicon");

	    if (current === numberDivs) {
	        first.css('margin-top', '0px');
	        current = 1;
	        $(".icon-"+current).addClass("activeicon");
	    } else current++;
	}, 5000);

    /* ABOUT PAGE */
    if($(".about").length >= 1){


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
	    			
	    		})

	    	}

	    	if ((position >= (parseHeight * 4))  && position <= parseHeight * 5 - 50 ) {



	    		$tools.css({
	    			'marginTop': ((position - parseHeight  * 4)) / 2
	    		})
	    	}

	    });

		/* SCROLL FILTERMENU */
		$(".scrollto").click(function(){
			$(".active").removeClass("active");
			$(this).addClass("active");
			todiv = $(this).attr("scroll");
			$("html,body").animate({
				scrollTop: $("#"+todiv).offset().top 
				},1500);
		});
	 }
	 /* END ABOUT */

	 $(window).bind('load', function(){
		var gobig = $(".content-header").hasClass("bigimage"); 
		if(gobig){
			//squarebox();
			setBigImageHeight(1);		
		}
	});
	function setBigImageHeight(t){

		//CHECK HEIGHT IF RESIZE
		if(t == 2){
			windowHeight = $(window).height();			
		}
		$(".startoff").delay(150).animate({
			opacity: 0
		}, 250);			

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
			


			nextimg = $("#"+id+" .bigimage").attr("style");

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
		$("textarea:not(.optional), input").on("focus",function(){
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

		// UPLOAD 
		inuploader();

		// SEND FORM
		$("#pitch").submit(function( event ) {
			event.preventDefault();
			if(validateForm()){
				$("#dialog").hide().removeClass("success").html("");
				var data = $(this).serializeArray();
				$(".loadedfiles").each(function(e){
					data.push({file: 'username', value: 'this is username'});
				});
				console.log(data);
				
				url = $(this).attr("url");
				$("#sendform").val("Sending");

				 $.post(url+"sendForm.php",data).done(function(d){

				 	dd = JSON.parse(d);
				 	console.log(dd.response);
				 	$("#sendform").val("Sent!");	 		
				 	if(dd.response == 1){
				 		$("#dialog").fadeIn().html(dd.message);
				 		$('#sendform').attr("disabled", true);

				 	} 
				 	else{
				 		$("#dialog").fadeIn().html(dd.message);
				 	}
		 	

				 },'json');
			 }
		  	 
		});
		function validateForm(){
			fail = 0;
			failpos = '';
			$(".validate").removeClass("validate");
			$("textarea:not(.optional)").each(function(tx){
				
				if($(this).val() == ''){
					$(this).addClass("validate");
					if(!failpos){
						failpos = $(this).attr("id");
						
					}
					fail = 1;
				}
			});
			$("input[type='text']:not(.optional),input[type='email']:not(.optional)").each(function(tx){

				if($(this).val() == ''){
					$(this).addClass("validate");
					if(!failpos){
						failpos = $(this).attr("id");
					}
					fail = 1;
				}
				else if($(this).attr("type") == "email"){
					if(!validateEmail($(this).val())){
						$(this).addClass("validate");
						fail = 1;
						if(!failpos){
							failpos = $(this).attr("id");
						}					
					}	
				}
			});

			// SCROLL UP ON FAILS
			if(fail == 1){
				if(failpos == ''){
					failpos = "pitch";
				}
				$('html, body').animate({
			         scrollTop: ($("#"+failpos).offset().top - 15 )
				 },1050);
				return false;
			}
			else{
				return true;
			}
		}

	}
	function validateEmail(email) {
	    var re = /\S+@\S+\.\S+/;
	    return re.test(email);
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

    function next_prev_menu(){
    	if($("#async_content .paginate #prevpost").length >= 1){
    		$(".filter-menu .prev").html($("#async_content .paginate #prevpost").html());

    	}
    	else{
       		$(".filter-menu .prev").html("");		    		
    	}
     	if($("#async_content .paginate #nextpost").length >= 1){
    		$(".filter-menu .next").html($("#async_content .paginate #nextpost").html());

    	}
    	else{
       		$(".filter-menu .next").html("");		    		
    	}   	
    }
    // STICKY FILTER
    if($(".filter-menu").length >= 1){
    	filter_menu();
		if(window.location.hash) {
	   		if($(window.location.hash).length >= 1){
				$(window.location.hash).click();
			}
	    }
    }
	function filter_menu(){
    	fixh = $(".filter-menu").offset().top;
    	if($("#main").length >= 1){
    		gotopos = $("#main").offset().top;
    	}
    	else{
    		gotopos = fixh;
    	}
    	next_prev_menu();


		//REPLACE
		filterhtml = $(".filter-menu.orig-filter").html();
		$(".filter-menu").not(".orig-filter").html(filterhtml);

    	$(window).scroll(function(){
	        var sy = scrollY();
	       

	  	    if (sy >= fixh ) {	

	        	$(".filter-menu").addClass("fix");
	       	}
	       	else{
	       		$(".filter-menu").removeClass("fix");
	       	}
	       	
    	});
    	$(".filter").unbind("click");
		$(".filter").bind("click",function(){
			show = $(this).attr("id");
			$(".filterable").css( "display", "block" );
			if(show != ""){
				$(".filterable").not("."+show).css( "display", "none" );
			}
			$(this).parent(".filter-menu").children(".active").removeClass("active");
			$(this).addClass("active");		
			$('html, body').animate({
		         scrollTop: ( gotopos - 40 )
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
	function inuploader(){

		var maxfiles = 1;
		var serv = $("#pitch").attr("url");
	    var uploader = new plupload.Uploader({
	        runtimes: 'html5,html4',
	        browse_button: 'uploadbtn',
			max_file_size : '5mb',
			max_file_count: maxfiles,
	        url: serv+'upload.php',
			unique_name:true
			
	    });

	    uploader.init();

	    uploader.bind('FilesAdded', function(up, files) {
			// loop through the files array
			var i = up.files.length;
			if(i>maxfiles){
				 alert("Max "+maxfiles+" files");
				 plupload.each(files, function (file) {
					uploader.removeFile(file);
				});
			}
			else{
			
				for (var i in files) {
					document.getElementById('filelist').innerHTML += '<li  id="' + files[i].id + '" class="loadedfiles">' + files[i].name + ' <b>(' + plupload.formatSize(files[i].size) + ')</b> </li>';		   
				}
				setTimeout(function () { uploader.start(); }, 150);
			 	
			}
	    });
	    uploader.bind('UploadProgress', function(up, file) {

			
	        document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = "<span>" + file.percent + "%</span> Uploading ... ";
	    
	    });	
	    uploader.bind('FileUploaded', function(up, file, info) {

	    	if(info.response != ''){

		    	document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = "<span>Uploaded</span> <span class='remove' id='remove"+file.id+"'>Remove</span><input type='hidden' value='"+info.response+"' name='file' />";
		    	$("#remove"+file.id).click(function(){
		    		$("#"+file.id).remove();
		    	});
	    	}
			setTimeout(function () { 
					uploader.removeFile(file);
			}, 750);

	    });	
	    
	    uploader.bind('Error', function(up, args) {
			mes = "";
			if(args.message=="File size error."){
				mes = "Filstorleken får vara max 40 Mb";
			}
	        alert(args.message+' '+mes);
	    });
	   
	   
	}

}); /* end of as page load scripts */


