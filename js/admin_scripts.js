jQuery(function(){

	jQuery('.rf_color_picker').wpColorPicker();   // It creates a color picker

	var media_uploader = null;

	function RFopenMediaUploaderImage()
	{	
		media_uploader = wp.media({
			frame:    "post",
			state:    "insert",
			multiple: true                   // to upload multiple images set true
		});

		var imageSection = jQuery("#imageSection");        // image section id

		media_uploader.on("insert", function(){
			var selection = media_uploader.state().get("selection");
			selection.map( function( attachment ) {    // .map() used to map an array
				jQuery.post(ajaxurl,{Img_id:attachment.id,action:'RF_get_thumbnails_data'},function(response) {						
					 imageSection.append(response);        // ajax calling statement
					 
					});
			});
		});
		media_uploader.on('select', function() {
			media_uploader.Jcrop();
		});

		media_uploader.open();
	}
							//button id                    //function calling
							jQuery(document).find("#RF_new_img_add").on('click',RFopenMediaUploaderImage);

	jQuery(document).on('click','.trash_btn',function(){      //remove image from selection
		var $this = jQuery(this);
		var $temp = $this.parent('.img-box');
		$temp.parent('li').remove();
	});

	jQuery( "#imageSection" ).sortable();

});
