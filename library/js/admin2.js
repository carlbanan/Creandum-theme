// as the page loads, call these scripts
var active =
jQuery(document).ready(function($) {
	if($('.upload_image_button_custom').length >= 1){
		$('.upload_image_button_custom').click(function() {
			 imageid = $(this).attr("imageid");
			 formfield = $('#'+imageid).attr('name');
			 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
			 return false;
		});
		$('.remove_field_custom').click(function() {
			imageid = $(this).attr("imageid");
		  	$('#'+imageid).val("");
		  	$('#preview_'+imageid).css("background-image","");
		});




	}
});



