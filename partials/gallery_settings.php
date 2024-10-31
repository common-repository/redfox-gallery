<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
$id=$post->ID;
$meta = unserialize(get_post_meta($id,'RF_gallery_'.$id, true));
if(!(isset($data_setting['redfox_action']) && isset($id))){
	$meta = unserialize(get_option('RF_default_setting', true));
} 

?>
<div class="rf_meta_2">
	<div class="rf_meta_2_heading">
		<h1><?php echo _e('Gallery Settings','redfox-gallery') ?></h1>
	</div>
	<div class="rf_meta_2_form">	
		
		<!-----------Navbar----------->
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" href="#home"><?php echo _e('Title','redfox-gallery') ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#font_size"><?php echo _e('Font Size','redfox-gallery') ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#color"><?php echo _e('Color','redfox-gallery') ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#align"><?php echo _e('Alignment','redfox-gallery') ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#other"><?php echo _e('Advanced','redfox-gallery') ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#custom_css"><?php echo _e('Custom CSS','redfox-gallery') ?></a>
			</li>
		</ul>
		<br><br>

		<input type="hidden" name="redfox_action" value="redfox_action">
		<!-----------Title----------->
		<div class="tab-content">
			<div id="home" class="tab-pane fade in active show">
				<div class="form-group row">
					<div class="col-md-4"><?php echo _e('Gallery Title Show','redfox-gallery') ?></div>
					<div class="col-md-8">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" name="gallery_title_display" value="1" id="gridCheck1" <?php if(isset($meta['gallery_title_display'])) {echo 'checked';} ?> >
							<label class="form-check-label" for="gridCheck1"></label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-4"><?php echo _e('Image Title Show','redfox-gallery') ?></div>
					<div class="col-md-8">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" name="img_title_display" value="1" id="gridCheck1" <?php if(isset($meta['img_title_display']) && $meta['img_title_display']==1) {echo 'checked';} ?> >
							<label class="form-check-label" for="gridCheck1"></label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-4"><?php echo _e('Image Link Open In New Tab','redfox-gallery') ?></div>
					<div class="col-md-8">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" name="img_link_new_tab" value="1" id="gridCheck1" <?php if(isset($meta['img_link_new_tab']) && $meta['img_link_new_tab']==1) {echo 'checked';} ?> >
							<label class="form-check-label" for="gridCheck1"></label>
						</div>
					</div>
				</div>
			</div>

			<!-----------Font Size----------->
			<div id="font_size" class="tab-pane fade">
				<div class="form-group row">
					<label for="g_font_size" class="col-md-4 col-form-label"><?php echo _e('Gallery Title Font-Size (px) ','redfox-gallery') ?></label>
					<div class="col-sm-8">
						<input type="number" name="gal_title_font_size" class="form-control" id="g_font_size" value="<?php echo !empty($meta['gal_title_font_size']) ? $meta['gal_title_font_size'] :'30'; ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="img_font_size" class="col-md-4 col-form-label"><?php echo _e('Image Title Font-Size (px) ','redfox-gallery') ?></label>
					<div class="col-sm-8">
						<input type="number" name="img_title_font_size" class="form-control" id="img_font_size" value="<?php echo !empty($meta['img_title_font_size']) ? $meta['img_title_font_size'] :'18'; ?>">
					</div>
				</div>
			</div>

			<!-----------Color----------->
			<div id="color" class="tab-pane fade">
				<fieldset class="form-group row">
					<div class="row">
						<legend class="col-form-label col-md-4 pt-0"><?php echo _e('Gallery Title Color ','redfox-gallery') ?></legend>
						<div class="col-sm-8">
							<input type="text" name="gal_title_color" class="rf_color_picker" value="<?php echo isset($meta['gal_title_color']) ? $meta['gal_title_color'] :''; ?>" data-default-color="#dddddd">
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group row">
					<div class="row">
						<legend class="col-form-label col-md-4 pt-0"><?php echo _e('Gallery Background Color','redfox-gallery') ?></legend>
						<div class="col-sm-8">
							<input type="text" name="gal_bg_color" class="rf_color_picker" value="<?php echo isset($meta['gal_bg_color']) ? $meta['gal_bg_color'] :''; ?>" data-default-color="#dddddd">
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group row">
					<div class="row">
						<legend class="col-form-label col-md-4 pt-0"><?php echo _e('Image Title Color ','redfox-gallery') ?></legend>
						<div class="col-sm-8">
							<input type="text" name="img_title_color" class="rf_color_picker" value="<?php echo isset($meta['img_title_color']) ? $meta['img_title_color'] :''; ?>" data-default-color="#dddddd">
						</div>
					</div>
				</fieldset>
				<?php if($meta['gallery_layout']=='layout10') { ?>
					<fieldset class="form-group row">
						<div class="row">
							<legend class="col-form-label col-md-4 pt-0"><?php echo _e('Top Border Color','redfox-gallery') ?></legend>
							<div class="col-sm-8">
								<input type="text" name="img_hover_color" class="rf_color_picker" value="<?php echo isset($meta['img_hover_color']) ? $meta['img_hover_color'] :''; ?>" data-default-color="#dddddd">
							</div>
						</div>
					</fieldset>
				<?php } ?>
			</div>

			<!-----------Align----------->
			<div id="align" class="tab-pane fade">
				<fieldset class="form-group row">
					<div class="row">
						<legend class="col-form-label col-md-3"><?php echo _e('Gallery Title Align','redfox-gallery') ?></legend>
						<div class="col-md-9">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="gal_title_align" id="gridRadios1" value="left" <?php if($meta['gal_title_align']=='left'){echo 'checked';} ?>>
								<label class="form-check-label" for="gridRadios1">
									<?php echo _e('Left','redfox-gallery') ?>
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="gal_title_align" id="gridRadios2" value="center" <?php if($meta['gal_title_align']=='center'){echo 'checked';} ?>>
								<label class="form-check-label" for="gridRadios2">
									<?php echo _e('Center','redfox-gallery') ?>
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="gal_title_align" id="gridRadios3" value="right" <?php if($meta['gal_title_align']=='right'){echo 'checked';} ?>>
								<label class="form-check-label" for="gridRadios3">
									<?php echo _e('Right','redfox-gallery') ?>
								</label>
							</div>
						</div>
					</div>
				</fieldset>

				<fieldset class="form-group row">
					<div class="row">

						<legend class="col-form-label col-md-3"><?php echo _e('Image Title Align','redfox-gallery') ?></legend>
						<div class="col-md-9">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="img_title_align" id="gridRadios1" value="left" <?php if($meta['img_title_align']=='left'){echo 'checked';} ?>>
								<label class="form-check-label" for="gridRadios1">
									<?php echo _e('Left','redfox-gallery') ?>
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="img_title_align" id="gridRadios2" value="center" <?php if($meta['img_title_align']=='center'){echo 'checked';} ?>>
								<label class="form-check-label" for="gridRadios2">
									<?php echo _e('Center','redfox-gallery') ?>
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="img_title_align" id="gridRadios3" value="right" <?php if($meta['img_title_align']=='right'){echo 'checked';} ?>>
								<label class="form-check-label" for="gridRadios3">
									<?php echo _e('Right','redfox-gallery') ?>
								</label>
							</div>
						</div>
					</div>
				</fieldset>
			</div>

			<!-----------Other----------->
			<div id="other" class="tab-pane fade">
				<div class="form-group row">
					<div class="col-md-3"><?php echo _e('Gallery Column','redfox-gallery') ?></div>
					<div class="col-md-9">
						<div class="form-check">
							<select class="col-md-9 form-control" name="gal_column" >
								<option value="col-md-3" <?php if($meta['gal_column']=='col-md-3'){echo 'selected';} ?> > <?php echo _e('Column 4','redfox-gallery') ?> </option>
								<option value="col-md-4" <?php if($meta['gal_column']=='col-md-4'){echo 'selected';} ?> > <?php echo _e('Column 3','redfox-gallery') ?> </option>
								<?php if($meta['gallery_layout']!='layout8') { ?>
									<option value="col-md-2" <?php if($meta['gal_column']=='col-md-2'){echo 'selected';} ?> > <?php echo _e('Column 6','redfox-gallery') ?> </option>
								<?php } 

								elseif($meta['gallery_layout']!='layout9') { ?>
									<option value="col-md-2" <?php if($meta['gal_column']=='col-md-2'){echo 'selected';} ?> > <?php echo _e('Column 6','redfox-gallery') ?> </option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3"><?php echo _e('Light Box','redfox-gallery') ?></div>
					<div class="col-md-9">
						<div class="form-check">
							<select class="col-md-9 form-control" name="gal_light_box">
								<option value="swipe_box" <?php if($meta['gal_light_box']=='swipe_box'){echo 'selected';} ?> > <?php echo _e('Swipe Box','redfox-gallery') ?> </option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-3"><?php echo _e('Gallery Layout','redfox-gallery') ?></div>
					<div class="col-md-9">
						<div class="form-check">
							<select class="col-md-9 form-control" name="gallery_layout">
								<option value="layout1" <?php if($meta['gallery_layout']=='layout1'){echo 'selected';} ?> > <?php echo _e('Layout 1','redfox-gallery') ?> </option>
								<option value="layout2" <?php if($meta['gallery_layout']=='layout2'){echo 'selected';} ?> > <?php echo _e('Layout 2','redfox-gallery') ?> </option>
								<option value="layout3" <?php if($meta['gallery_layout']=='layout3'){echo 'selected';} ?> > <?php echo _e('Layout 3','redfox-gallery') ?> </option>
								<option value="layout4" <?php if($meta['gallery_layout']=='layout4'){echo 'selected';} ?> > <?php echo _e('Layout 4','redfox-gallery') ?> </option>
								<option value="layout5" <?php if($meta['gallery_layout']=='layout5'){echo 'selected';} ?> > <?php echo _e('Layout 5','redfox-gallery') ?> </option>
								<option value="layout6" <?php if($meta['gallery_layout']=='layout6'){echo 'selected';} ?> > <?php echo _e('Layout 6','redfox-gallery') ?> </option>
								<option value="layout7" <?php if($meta['gallery_layout']=='layout7'){echo 'selected';} ?> > <?php echo _e('Layout 7','redfox-gallery') ?> </option>
								<option value="layout8" <?php if($meta['gallery_layout']=='layout8'){echo 'selected';} ?> > <?php echo _e('Layout 8','redfox-gallery') ?> </option>
								<option value="layout9" <?php if($meta['gallery_layout']=='layout9'){echo 'selected';} ?> > <?php echo _e('Layout 9','redfox-gallery') ?> </option>
								<option value="layout10" <?php if($meta['gallery_layout']=='layout10'){echo 'selected';} ?> > <?php echo _e('Layout 10','redfox-gallery') ?> </option>
							</select>
						</div>
					</div>
				</div>
			</div>

			<!-----------Custom Css----------->
			<div id="custom_css" class="tab-pane fade">
				<div class="form-group row">
					<div class="col-md-3">
						<label class="css">  <?php echo _e('Custom Css : ','redfox-gallery') ?> </label><br>
					</div>
					<div class="col-md-9">
						<textarea cols="60" rows="5" name="custom_css" class="form-control" value="<?php echo $meta['custom_css']; ?>" placeholder="Write Your Custom Css Here!"></textarea>
					</div>
				</div>
			</div>
		</div>    <!-- .tab-content -->
	</div>       <!-- .rf_meta_2_form -->

	<!-----------Navbar Script----------->
	<script>
		$(document).ready(function(){
			$(".nav-tabs a").click(function(){
				$(this).tab('show');
			});
		});
	</script>

</div>     <!-- .rf_meta_2_form -->
