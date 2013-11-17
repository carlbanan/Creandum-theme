// as the page loads, call these scripts
var customs = 0;
jQuery(document).ready(function($) {
	if($('.upload_image_button_custom').length >= 1){

		$('.insert-media').click(function() {
			customs = 0;
			console.log(customs);
		});
		$('.upload_image_button_custom').click(function() {
   			 customs = 1;
			 imageid = $(this).attr("imageid");
			 formfield = $('#'+imageid).attr('name');
			 console.log("do tb");
			 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
			 console.log("tb fin");

			var original_send_to_editor = window.send_to_editor;

			window.send_to_editor = function(html) {
				 htmlob = $(html);
				 imgurl = htmlob[0]['src'];
				 $('#'+imageid).val(imgurl);

				 console.log(htmlob);

				 $('#preview_'+imageid).css("background-image","url('"+imgurl+"')");
			     tb_remove();
			     window.send_to_editor = original_send_to_editor;
			}
			return false;
		});
		$('.remove_field_custom').click(function() {
			imageid = $(this).attr("imageid");
		  	$('#'+imageid).val("");
		  	$('#preview_'+imageid).css("background-image","");
		  	 customs = 0;
		});
	}
});