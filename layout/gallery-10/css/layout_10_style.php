<style type="text/css">

.rf_gallery_<?=$id?>{
	background-color: <?= $meta['gal_bg_color'] ?> ;
}

.rf_gallery_<?=$id?> .gallery_title .title{
	color: <?= $meta['gal_title_color'] ?>;
	text-align: <?= $meta['gal_title_align'] ?>;
	font-size: <?= $meta['gal_title_font_size']?>px;
}

.rf_gallery_<?=$id?> .img_wrapper .img_title .title{	
	color: <?= $meta['img_title_color'] ?>;
  text-align: <?= $meta['img_title_align'] ?>;
	font-size: <?= $meta['img_title_font_size']?>px;
}

.rf_gallery_<?=$id?> .rf_10_wrapper .img_title{
	border-top-color:<?=$meta['img_hover_color']?> !important;
}

</style>