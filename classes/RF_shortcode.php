<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 

class RF_shortcode{

	function __construct(){

		add_shortcode( 'RF_GALLERY' ,array(&$this,'gallery_shortcode'));
	}

	function gallery_shortcode($post){

		ob_start();
		$id = $post['id'];		
		$meta = unserialize(get_post_meta($id,'RF_gallery_'.$id, true));

		if($meta['gallery_layout'] == 'layout1'){

			$this->layout_1_shortcode_style();
			$this->light_box_style();
			include(RF_PATH.'/layout/gallery-1/css/layout_1_style.php');
			include(RF_PATH.'/layout/gallery-1/layout1.php');

		}

		elseif($meta['gallery_layout'] == 'layout2') {

			$this->layout_2_shortcode_style();
			$this->light_box_style();
			include(RF_PATH.'/layout/gallery-2/css/layout_2_style.php');
			include(RF_PATH.'/layout/gallery-2/layout2.php');
		}

		elseif($meta['gallery_layout'] == 'layout3') {

			$this->layout_3_shortcode_style();
			$this->light_box_style();
			include(RF_PATH.'/layout/gallery-3/css/layout_3_style.php');
			include(RF_PATH.'/layout/gallery-3/layout3.php');
		}

		elseif($meta['gallery_layout'] == 'layout4') {

			$this->layout_4_shortcode_style();
			$this->light_box_style();
			include(RF_PATH.'/layout/gallery-4/css/layout_4_style.php');
			include(RF_PATH.'/layout/gallery-4/layout4.php');
		}

		elseif($meta['gallery_layout'] == 'layout5') {

			$this->layout_5_shortcode_style();
			include(RF_PATH.'/layout/gallery-5/css/layout_5_style.php');
			include(RF_PATH.'/layout/gallery-5/layout5.php');
		}

		elseif($meta['gallery_layout'] == 'layout6') {

			$this->layout_6_shortcode_style();
			$this->light_box_style();
			include(RF_PATH.'/layout/gallery-6/css/layout_6_style.php');
			include(RF_PATH.'/layout/gallery-6/layout6.php');
		}

		elseif($meta['gallery_layout'] == 'layout7') {

			$this->layout_7_shortcode_style();
			$this->light_box_style();
			include(RF_PATH.'/layout/gallery-7/css/layout_7_style.php');
			include(RF_PATH.'/layout/gallery-7/layout7.php');
		}

		elseif($meta['gallery_layout'] == 'layout8') {

			$this->layout_8_shortcode_style();
			$this->light_box_style();
			include(RF_PATH.'/layout/gallery-8/css/layout_8_style.php');
			include(RF_PATH.'/layout/gallery-8/layout8.php');
		}

		elseif($meta['gallery_layout'] == 'layout9') {

			$this->layout_9_shortcode_style();
			$this->light_box_style();
			include(RF_PATH.'/layout/gallery-9/css/layout_9_style.php');
			include(RF_PATH.'/layout/gallery-9/layout9.php');
		}

		elseif($meta['gallery_layout'] == 'layout10') {

			$this->layout_10_shortcode_style();
			$this->light_box_style();
			include(RF_PATH.'/layout/gallery-10/css/layout_10_style.php');
			include(RF_PATH.'/layout/gallery-10/layout10.php');
		}
		
		return ob_get_clean();		
	}

	function layout_1_shortcode_style(){	

		wp_enqueue_style('RF_default_style', RF_URL.'/layout/gallery-1/css/layout_1_default.css');
		wp_enqueue_style('RF_font_awesome', RF_URL.'/css/font-awesome-4.7.0/css-in/font-awesome.css');
		wp_enqueue_style('RF_1_bootstrap', RF_URL.'/css/bootstrap.css');		
	}

	function layout_2_shortcode_style(){

		wp_enqueue_style('RF_Layout_2_default_style', RF_URL.'/layout/gallery-2/css/layout_2_style_default.css');
		wp_enqueue_style('RF_2_bootstrap', RF_URL.'/css/bootstrap.css');
	}

	function layout_3_shortcode_style(){

		wp_enqueue_style('RF_Layout_3_default_style', RF_URL.'/layout/gallery-3/css/layout_3_style_default.css');
		wp_enqueue_style('RF_3_bootstrap', RF_URL.'/css/bootstrap.css');
	}

	function layout_4_shortcode_style(){

		wp_enqueue_style('RF_owl_carousel_style', RF_URL.'/layout/gallery-4/css/owl_style.css');
		wp_enqueue_style('RF_owl_carousel_css', RF_URL.'/layout/gallery-4/css/owl.carousel.css');
		wp_enqueue_style('RF_4_bootstrap', RF_URL.'/css/bootstrap.css');
		wp_enqueue_script( 'RF_owl_carousel_js', RF_URL.'/layout/gallery-5/js/owl.carousel.js');	
	}

	function layout_5_shortcode_style(){

		wp_enqueue_style('RF_owl_carousel_style', RF_URL.'/layout/gallery-5/css/owl_default_style.css');
		wp_enqueue_style('RF_font_style', RF_URL.'/css/font-awesome-4.7.0/css-in/font-awesome.css');
		wp_enqueue_style('RF_bootstrap_style', RF_URL.'/css/bootstrap-carousel.css');
		wp_enqueue_script('RF_5_bootstrap', RF_URL.'/js/bootstrap.min.js');
		wp_enqueue_script( 'RF_5_carousel_js', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');	
	}

	function layout_6_shortcode_style(){

		wp_enqueue_style('RF_10_bootstrap', RF_URL.'/css/bootstrap.css');
		wp_enqueue_style('RF_layout_6_style', RF_URL.'/layout/gallery-6/css/layout_6_style.css');
	}

	function layout_7_shortcode_style(){

		wp_enqueue_style('RF_layout_7_style', RF_URL.'/layout/gallery-7/css/layout_7_style.css');
		wp_enqueue_style('RF_7_bootstrap', RF_URL.'/css/bootstrap.css');	
	}

	function layout_8_shortcode_style(){

		wp_enqueue_style('RF_8_bootstrap', RF_URL.'/css/bootstrap.css');
		wp_enqueue_style('RF_layout_8_style', RF_URL.'/layout/gallery-8/css/layout_8_style.css');
	}

	function layout_9_shortcode_style(){

		wp_enqueue_style('RF_9_bootstrap', RF_URL.'/css/bootstrap.css');
		wp_enqueue_style('RF_layout_9_style', RF_URL.'/layout/gallery-9/css/layout_9_style.css');
	}

	function layout_10_shortcode_style(){

		wp_enqueue_style('RF_layout_10_style', RF_URL.'/layout/gallery-10/css/layout_10_style.css');
		wp_enqueue_style('RF_10_bootstrap', RF_URL.'/css/bootstrap.css');
	}


	function light_box_style(){

		wp_enqueue_style('RF_light_box_style', RF_URL.'/light-box/swipe-box/swipebox.css');
		wp_enqueue_script( 'RF_light_box_js', RF_URL.'/light-box/swipe-box/jquery.swipebox.js');
		wp_enqueue_script( 'RF_swipe_box_js', RF_URL.'/light-box/swipe-box/swipebox.js');
	}


} //class
