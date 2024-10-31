<?php
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<div class="rf_gallery rf_gallery_<?=$id?>">
	<div class="container">
		<div class="row">
			<div class="rf_heading">	
				<?php if($meta['gallery_title_display']==1) {	?>
					<h1 class="gallery_title" <?php echo esc_attr($target) ?> >
						<?php echo _e(get_the_title($id),'redfox-gallery') ?>

					</h1>
				<?php } ?>
			</div>
		</div>
		<div class="row content">
			<?php
			$GLOBALS['column'] = $meta['gal_column'];
			$GLOBALS['img_link_new_tab'] = $meta['img_link_new_tab'];
			$GLOBALS['img_title_display'] = $meta['img_title_display'];
			$GLOBALS['custom_css'] = $meta['custom_css'];

			array_map(function($img_title,$attach_url,$img_url){

				if( $GLOBALS['img_link_new_tab']==1 ) { $target = "_blank"; } 
				else{ $target = "self"; }

				?>

				<div class="<?php echo $GLOBALS['column'];?> rf_item">  
					<div class="img_wrapper">
						<div class="overlay_effect">
							<a class="rf_swipebox" href="<?php echo esc_url($img_url) ?>" title="<?=$img_title;?>">
								<img src="<?php echo esc_url($img_url) ?>" class="image">
							</a>
						</div>
						<div class="img_heading">
							<?php if($GLOBALS['img_title_display']==1) { ?>
								<h4 class="image_title"> 
									<a href="<?php echo esc_url($attach_url); ?>" target="<?php echo esc_attr($target) ?>" >
										<?php echo _e($img_title,'redfox-gallery') ?> 
									</a>
								</h4>
							<?php } ?>
						</div>
					</div>		<!-- End of img_wrapper -->
				</div>		<!-- End of rf_item -->
			<?php  },$meta['img_title'], $meta['attach_url'],$meta['img_url']) ?>
		</div>		<!-- End of row -->
	</div>		<!-- End of container -->	
</div>		<!-- End of rf_gallery -->

<style type="text/css">	

<?php echo esc_attr($GLOBALS['custom_css']); ?>

</style>