<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
?>

<div class="rf_gallery_5 rf_gallery_<?=$id?>">
    <div class="img_gallery">
        <div class="container-fluid">
            <div class="row">
                <div class="gallery_title">
                    <?php if( $meta['gallery_title_display']==1 ) { ?>
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
                $GLOBALS['count'] = 0 ;

                ?>
                <div class="rf_slider">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <?php array_map(function($img_title,$attach_url,$img_url){ ?>
                                <?php $GLOBALS['count']++ ; ?>                                
                                <div class="item <?php if($GLOBALS['count']==1){echo "active";} ?>">
                                    <img class="image img-responsive" src="<?php echo esc_url($img_url) ?>" alt="slide Image">                                        
                                        <div class="img_content">
                                            <a href="<?php echo esc_url($attach_url) ?>" target="<?php echo esc_attr($GLOBALS['target']); ?>">
                                                <h1 class="img_title">
                                                    <?php echo _e($img_title,'redfox-gallery') ?>
                                                </h1>
                                            </a>
                                        </div>
                                    </div>
                                <?php  },$meta['img_title'], $meta['attach_url'],$meta['img_url']) ?> 
                            </div>
                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="fa fa-chevron-left"></span>
                                <span class="sr-only"></span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="fa fa-chevron-right"></span>
                                <span class="sr-only"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div> 


<style type="text/css"> 

<?php echo esc_attr($GLOBALS['custom_css']); ?>

</style>
