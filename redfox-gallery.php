<?php 
/*
* Plugin Name: RedFox Gallery
* Version: 1.0
* description: RedFox gallery is a WordPress free gallery plugin.
* Author: redfoxthemes
* Author URI: http://redfoxthemes.com
* Text Domain: redfox-gallery
*/

if ( ! defined( 'ABSPATH' ) ) exit; 

define('RF_URL',plugin_dir_url (__FILE__ ));
define('RF_PATH',plugin_dir_path(__FILE__));

register_activation_hook(__FILE__, 'RF_default_setting');

function RF_default_setting(){
	$setting_array=serialize(array(
		'gallery_title_display'=>1,
		'img_title_display'=>1,
		'img_link_new_tab'=>1,
		'gal_title_font_size'=>28,
		'img_title_font_size'=>18,
		'gal_title_color'=>'#545454',
		'gal_bg_color'=>'#f7f7f7',
		'img_title_color'=>'#7f7f7f',
		'img_hover_color'=>'#F37117',
		'gal_title_align'=>'center',
		'img_title_align'=>'center',
		'gal_column'=>'col-md-3',
		'gal_light_box'=>'swipe_box',
		'gallery_layout'=>'layout1',
		'custom_css'=>'',
	));
	add_option("RF_default_setting",$setting_array);
}

register_deactivation_hook(__FILE__, 'RF_deactivation_setting');

function RF_deactivation_setting(){
	delete_option('RF_default_setting');
}

include(RF_PATH.'/classes/RF_admin.php');
include(RF_PATH.'/classes/RF_shortcode.php');

new RF_admin();     // RF_admin() Class Calling 
new RF_shortcode(); // RF_shortcode() Class Calling 
