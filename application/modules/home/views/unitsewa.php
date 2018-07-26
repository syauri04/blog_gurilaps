
<?php foreach ($unit_sewa as $key) { ?>

<div class="col-sm-4 pb-xlg">
    <div class="appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="300">
            <span class="thumb-info thumb-info-no-zoom thumb-info-custom mb-xl center thumb-custom">
                <span class="thumb-info-side-image-wrapper p-none">
                   <a href="#"> 
                        <img class="img_unit" src="<?php echo base_url() ?>assets/uploads/album-unit/<?php echo $key->id_image ?>/<?php echo $key->image ?>" class="img-responsive" alt="">
                    </a>
                </span>
                <span class="thumb-info-caption">
                    <div class="thumb-info-caption-text title-info-caption">
                        <span class="title-caption"><a id="cap-blue" href="<?php echo base_url()."unit/detail/".$key->id."/".url_title($key->title) ?>"><?php echo $key->title ?></a></span>
                       
                    </div>
                    <div class="specs-highlight-front">
                         <span>LB: <?php echo ($key->luas_bangunan != "0")?$key->luas_bangunan:"N/A";?> m<sup>2</sup></span>
                                <span>LT: <?php echo ($key->luas_tanah != "0")?$key->luas_tanah:"N/A";?> m<sup>2</sup></span>
                                <span>KT: <?php echo ($key->kamar_tidur != "0")?$key->kamar_tidur:"N/A";?></span>
                                <span>KM: <?php echo ($key->kamar_mandi != "0")?$key->kamar_mandi:"N/A";?></span>
                    </div>
                </span>
            </span>
    </div>
</div>



<?php } ?>
                                        
                                  