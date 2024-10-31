<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 

$input_field= array('gal_title','gallery_title_display','img_title_display','img_link_new_tab','gal_title_font_size','img_title_font_size','gal_title_color','gal_bg_color','img_title_color','img_hover_color','gal_title_align','img_title_align','gal_column','gal_light_box','gal_img_hover_effect','gallery_layout','custom_css',);

$img_info = array('img_url'=>'img_url', 'img_title'=>'img_title', 'attach_url'=>'attach_url');  // get the array

if($_POST){

	foreach ($input_field as $field) {

		if(isset($_POST[$field])){

			$data[$field] = $_POST[$field];

		}else{

			$data[$field]  = '';

		}
	}

	foreach($img_info as $field=>$name){      // image information

		if(isset($_POST[$field])){
			foreach($_POST[$field] as $key=>$value){
				$data[$name][$key]  = esc_attr( $value );
			}
		}
	}

	update_post_meta($post, 'RF_gallery_'.$post, serialize($data));
}	


?>

