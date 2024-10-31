<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
?>

<div class="rf_gallery_9 rf_gallery_<?=$id?>">
	<div class="rf_9_gallery">
		<div class="container-fluid">
			<div class="row">
				<div class="gallery_title">
					<?php if( $meta['gallery_title_display']==1 ) {	?>
						<h2 class="title">
							<?php echo _e(get_the_title($id),'redfox-gallery') ?>
						</h2>
					<?php } ?>
				</div>
			</div>	
			<div class="row">
				<?php
				$GLOBALS['column'] = $meta['gal_column'];
				$GLOBALS['img_title_display'] = $meta['img_title_display'];
				$GLOBALS['img_link_new_tab'] = $meta['img_link_new_tab'];
				$GLOBALS['custom_css'] = $meta['custom_css']; 

				if( $GLOBALS['img_link_new_tab']==1 ) { $target = "_blank"; } 
				else{ $target = "self"; }

				$GLOBALS['target'] = $target ;
				?>
				<?php array_map(function($img_title,$attach_url,$img_url){ ?>
					<div class="rf_9_wrapper <?php echo $GLOBALS['column'];?>">
						<div class="img_wrapper">
							<div class="image">
								<a class="rf_swipebox" href="<?php echo esc_url($img_url) ?>" title="<?=$img_title;?>">
									<img class="img-responsive" src="<?php echo esc_url($img_url) ?>">
								</a>
							</div>
						</div>
					</div>
				<?php  },$meta['img_title'], $meta['attach_url'],$meta['img_url']) ?> 
			</div>
		</div>
	</div>
</div>

<style type="text/css">	

<?php echo esc_attr($GLOBALS['custom_css']); ?>

</style>