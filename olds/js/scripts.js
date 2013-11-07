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
		console.log(r);
		if(r == 'investment' || r == 'team'){
			ajax_nav();
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
				});	

						
			};

			var updateContent = function(State) {

				var selector = "#"+State.data.select;

			    if ($(selector).length) { //  content is already in #hidden_content
			    
			        $('#async_content').children().appendTo('#hidden_content');

			        $('#async_content').html("");
			        $(selector).appendTo('#async_content');
			        image_update();

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
					$(".async.active").removeClass("active")
					$(this).addClass("active");

					var urlPath = $(this).attr('href');
					var select = $(this).attr("select");

					var title = $(this).text();
					History.pushState({urlPath: urlPath, select : select}, title, urlPath);

					hig = $("#async_content .page-content").offset();
					console.log(hig.top);
					 $('html, body').delay(100).animate({
				         scrollTop: hig.top -200
					 }, 250);


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
				console.log("src "+bigimage_src);
				if(bigimage_src){
					bigimage.css("background-image","url('"+bigimage_src+"')");
				}				
			}
	}


}); /* end of as page load scripts */