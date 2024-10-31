<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 

class RF_admin{

	function __construct(){
		
		add_action( 'admin_enqueue_scripts', array(&$this,'RF_fun_admin_style') );
		add_action( 'add_meta_boxes', array(&$this,'RF_metaboxes') );
		add_action( 'init', array(&$this,'RF_PostCustom') );
		add_action( 'save_post', array(&$this,'RF_metabox_save'));
		add_action( 'wp_ajax_RF_get_thumbnails_data', array(&$this,'RF_get_thumbnails_data_img'));
							//ajax page action id
		add_filter( 'manage_edit-hi_gallery_columns',array(&$this, 'RF_gallery_columns') ) ;
		add_action( 'manage_hi_gallery_posts_custom_column',array(&$this, 'RF_gallery_manage_columns' ), 10, 2);
	}

	function RF_PostCustom(){
		$labels = array(
			'name'               => _x( 'RedFox Gallery', 'redfox-gallery' ),
			'singular_name'      => _x( 'Gallery', 'redfox-gallery' ),
			'menu_name'          => _x( 'RedFox Gallery', 'admin menu', 'redfox-gallery' ),
			'add_new'            => _x( 'Add New Gallery',  'redfox-gallery' ),
			'add_new_item'       => __( 'Add New Gallery', 'redfox-gallery' ),
			'new_item'           => __( 'New Gallery', 'redfox-gallery' ),
			'edit_item'          => __( 'Edit Gallery', 'redfox-gallery' ),
			'view_item'          => __( 'View Gallery', 'redfox-gallery' ),
			'all_items'          => __( 'All Galleries', 'redfox-gallery' ),
			'search_items'       => __( 'Search Gallery', 'redfox-gallery' ),
			'parent_item_colon'  => __( 'Parent Gallery:', 'redfox-gallery' ),
			'not_found'          => __( 'No gallery found.', 'redfox-gallery' ),
			'not_found_in_trash' => __( 'No gallery found in Trash.', 'redfox-gallery' )
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'redfox-gallery' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'gallery' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array( 'title', ),
			'menu_icon'          => 'dashicons-format-gallery'
		);
		register_post_type( 'hi_gallery', $args ); 
	}

	function RF_fun_admin_style(){

		global $typenow;
		if($typenow=='hi_gallery'){	

			wp_enqueue_style('wp-color-picker'); 		// color picker link
			wp_enqueue_script( array('jquery','wp-color-picker'));

			wp_enqueue_media();               //image add

			wp_enqueue_style( 'RF_admin_style', RF_URL . '/css/admin_style.css' );

			wp_enqueue_style( 'RF_font_style', RF_URL . '/css/font-awesome-4.7.0/css-in/font-awesome.css' );
			
			wp_enqueue_style('RF_boot_style', RF_URL . 'css/bootstrap.css');

			wp_enqueue_script( 'RF_admin_script', RF_URL . '/js/admin_scripts.js', array('jquery-ui-sortable','jquery'), '1.0.0' ,true);
			
			wp_enqueue_script( 'RF_boot_script', RF_URL . '/js/bootstrap.js');
		}

	}

	function RF_metaboxes(){

		add_meta_box( 'rf_meta_1', __( 'Gallery Images ', 'redfox-gallery' ), array(&$this,'RF_metabox_images_callback'), 'hi_gallery' );

		add_meta_box( 'rf_meta_2', __( 'Gallery Settings ', 'redfox-gallery' ), array(&$this,'RF_gallery_settings_callback'), 'hi_gallery' );

		add_meta_box( 'rf_meta_3', __( 'Shortcode Section', 'redfox-gallery' ), array(&$this,'RF_shortcode_section_callback'), 'hi_gallery' ,'side','low');
	}

	function RF_metabox_images_callback($post){

		include(RF_PATH.'/partials/images_adder.php');
	}

	function RF_gallery_settings_callback($post){

		include(RF_PATH.'/partials/gallery_settings.php');
	}

	function RF_shortcode_section_callback($post){     // show shortcode 
		
		echo '<input type="text" style="background: #f1f1f1; color:#000;" onclick="jQuery(this).select()" value="[RF_GALLERY id='.get_the_ID().']" readonly/>';
	}

	function RF_metabox_save($post){

		include(RF_PATH.'/partials/gallery_settings_save.php');
	}
	
	public function RF_get_thumbnails_data_img($post){ //get action statement from ajax in admin_script.js
		
		if($_POST['action']){	

			$img_id = $_POST['Img_id'];            //get image unique id

			$img_url = wp_get_attachment_image_src($img_id,'full'); //get image path

			$this->Get_li($img_id,$img_url[0]);	   // call the Get_li function
		}

		wp_die();
	}

	public function Get_li($id, $img, $attach_url=null, $title=null){	

		?>
		<li>
			<div class="img-box">
				<a href="#remove" class="trash_btn">
					<span class="fa fa-close pull-right"></span>
				</a>
				<img src="<?php echo esc_url($img) ?>">
				<input type="hidden" name="img_url[<?php echo $id; ?>]" value="<?php echo isset($img)? $img:'' ?>">
				<hr>

				<label><?php echo _e('Title','redfox-gallery') ?></label>
				<input type="text" name="img_title[<?php echo $id; ?>]" value="<?php echo isset($title)? $title:'' ?>">

				<label><?php echo _e('URL','redfox-gallery') ?></label>
				<input type="text" name="attach_url[<?php echo $id; ?>]" value="<?php echo isset($attach_url)? $attach_url : '' ?>">
			</div>
		</li>
		<?php
	}

	public function RF_gallery_columns( $columns ){

		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Gallery' ),
			'shortcode' => __( 'Shortcode' ),
			'date' => __( 'Date' )
		);
		return $columns;
	}

	public function RF_gallery_manage_columns($columns, $post_id ){
		global $post;
		switch( $columns ) {
			case 'shortcode' :
			echo '<input style="background: ##dfdfdf9c; padding-left:10px; color:#000000;" type="text" value="[RF_GALLERY id='.$post_id.']" readonly="readonly" />';
			break;
			default :
			break;
		}
	}
}
