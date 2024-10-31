<?php 

if ( ! defined( 'ABSPATH' ) ) exit; 

$id = $post->ID;
$data = unserialize(get_post_meta($id, 'RF_gallery_'.$id,true));

?>

<div class="rf_meta_11">

	<div class="rf_meta_1_heading">
		<h1>All Images</h1>
	</div>

	<div class="rf_upload_btn">
		<input id="RF_new_img_add" type="button" class="btn btn-info" value="<?php _e( 'Upload image' ); ?>" />	
	</div>

	<div class="selected_img_wrapper">		
		<ul id="imageSection" class="">
			<!-- ajax_request.php page code paste here when an image is uploading -->
			<?php 
			if(isset($data['img_url'])){
				foreach ($data['img_url'] as $key => $value) {
					$img_id = $key;
					$img_url = $value;
					$img_title = $data['img_title'][$key];
					$attach_url = $data['attach_url'][$key];

					$this->Get_li($img_id, $img_url, $attach_url, $img_title  );  // after this Get_li() function will execute
				}	
			}		
			?>
		</ul>
	</div>
</div>