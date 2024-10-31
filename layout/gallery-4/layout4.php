<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div class="rf_gallery_4 rf_gallery_<?=$id?>">
	<div class="img_gallery">
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
				$GLOBALS['img_title_display'] = $meta['img_title_display'];
				$GLOBALS['img_link_new_tab'] = $meta['img_link_new_tab'];
				$GLOBALS['custom_css'] = $meta['custom_css']; 

				if( $GLOBALS['img_link_new_tab']==1 ) { $target = "_blank"; } 
				else{ $target = "self"; }

				$GLOBALS['target'] = $target ;
				
				?>

				<div id="rf_img_wrapper" class="owl-carousel">
					<?php array_map(function($img_title,$attach_url,$img_url){ ?>
						<div class="item">
							<a class="rf_swipebox" href="<?php echo esc_url($img_url) ?>" title="<?=$img_title;?>">	
								<img class="image"src="<?php echo esc_url($img_url) ?>" alt="Image">
							</a>
							<div class="content">
								<a href="<?php echo esc_url($attach_url); ?>" target="<?php echo esc_attr($GLOBALS['target']); ?>">
									<h1 class="img_title">
										<?php echo _e($img_title,'redfox-gallery') ?>
									</h1>
								</a>
							</div>
						</div>
					<?php  },$meta['img_title'], $meta['attach_url'],$meta['img_url']) ?> 
				</div>
			</div>
		</div> 
	</div> 
</div> 
<style type="text/css">	
<?php echo esc_attr($GLOBALS['custom_css']); ?>
</style>

<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery("#rf_img_wrapper").owlCarousel({
				autoPlay: 3000, //Set AutoPlay to 3 seconds
				items : 4,
				itemsDesktop : [1199,3],
				itemsDesktopSmall : [979,3]
			});
	});
</script>
