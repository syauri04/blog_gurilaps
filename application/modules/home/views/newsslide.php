  <div class="owl-carousel owl-theme show-nav-title mt-xlg mb-none" data-plugin-options='{"items": 1, "margin": 10, "loop": true, "nav": true, "dots": false, "autoplay": true, "autoplayTimeout": 4000}'>
                        
                                    <?php

                                        $no =0;
                                    foreach ($newsslide as $key) {

$no++;
                                     ?>
                                    
                         <?php  if($no ==1){?>           
                                            <div>
                                                <?php }?> 
<span class="thumb-info thumb-info-side-image thumb-info-no-zoom thumb-info-no-borders thumb-info-blog-custom mb-xl">
                                                
                                          <span class="thumb-info-side-image-wrapper p-none">
                                                         <img src="<?php echo base_url() ?>assets/uploads/news/<?php echo $key->id?>/<?php echo $key->images ?>" class="img-responsive" alt="" style="width: 165px;">
                                                   

                                                    </span>
                                                    <span class="thumb-info-caption">
                                                        <span class="thumb-info-caption-text">
                                                            <h4 class="mb-none mt-xs heading-dark"><?php echo $key->title ?></h4>
                                                            <p class="font-size-md"><?php echo substr(strip_tags($key->content), 0,100)."..."; ?></p>
                                                            <a class="mt-md" href="<?php echo base_url()."news/detail/".$key->id."/".url_title($key->title) ?>">Read More <i class="fa fa-long-arrow-right"></i></a>
                                                        </span>
                                                    </span>
                                                </span>

                                          <?php  if($no ==2){ $no=0;?>    
                                            </div>
                                     
                                            <?php  } ?>
                                       <?php  } ?>
                             </div>
  