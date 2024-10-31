<?php  if( ! defined( 'ABSPATH' ) ) exit;  ?>

<div class="rf_gallery_2 rf_gallery_<?=$id?>">
	<div class="container-fluid">
		<div class="row">
			<div class="rf_2_heading">
				<?php if( $meta['gallery_title_display']==1 ) {	?>
					<h1 class="gallery_title">
						<?php echo _e(get_the_title($id),'redfox-gallery') ?>
					</h1>
				<?php } ?>
			</div>
		</div>
		<div class="rf_masonry">
			<div class="row">
				<?php
				$GLOBALS['column'] = $meta['gal_column'];
				$GLOBALS['img_title_display'] = $meta['img_title_display'];
				$GLOBALS['img_link_new_tab'] = $meta['img_link_new_tab'];
				$GLOBALS['custom_css'] = $meta['custom_css'];

				array_map(function($img_title,$attach_url,$img_url){

					if( $GLOBALS['img_link_new_tab']==1 ) { $target = "_blank"; } 
					else{ $target = "self"; }
					?>

					<div class="rf_image <?php echo $GLOBALS['column'];?> ">
						<a class="rf_swipebox" href="<?php echo esc_url($img_url); ?>" title="<?=$img_title;?>">
							<img class="selected_image" src="<?php echo esc_url($img_url); ?>" >
						</a>
					</div>
				<?php  },$meta['img_title'], $meta['attach_url'],$meta['img_url']) ?> 
			</div>
		</div>
	</div>
</div>

<style type="text/css">
<?php echo esc_attr($GLOBALS['custom_css']); ?>
</style>