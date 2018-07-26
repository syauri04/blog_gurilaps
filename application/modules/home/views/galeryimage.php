
                                    <?php

                                        $no =0;
                                    foreach ($galeryImager as $key) {

$no++;
                                     ?>
                                    
                                    
                                      <div class="masonry-item <?php if($no==2){ ?>w2<?php }?>">
                                                <span class="thumb-info thumb-info-centered-icons thumb-info-no-borders">
                                                    <span class="thumb-info-wrapper">
                                                        <img src="<?php echo base_url() ?>assets/uploads/gallery/<?php echo $key->id?>/<?php echo $key->images ?>" class="img-responsive" alt="">
                                                        <span class="thumb-info-action thumb-info-action-custom">
                                                            <a href="<?php echo base_url() ?>assets/uploads/gallery/<?php echo $key->id ?>/<?php echo $key->images ?>">
                                                                <span class="thumb-info-icon-custom"></span>
                                                            </a>
                                                        </span>
                                                    </span>
                                                </span>
                                            </div>


                                       <?php } ?>
                          