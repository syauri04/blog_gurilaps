<div class="sec-header">

                        <img src="<?php echo base_url(); ?>assets/uploads/article/<?php echo $pic_header->id_content; ?>/<?php echo $pic_header->name; ?>">         
                        <h2>KABUPATEN <?php echo strtoupper($regencies->fcityname); ?></h2>
                        <p><?php echo $article->title; ?></p>
        
                </div>

                <div class="clear-float"></div>

                <section class="sec-article">

                    <div class="content-article">
                   <?php echo $article->content_1; ?>
                    </div>


                    <div class="clear-float"></div>
                    
                </section>

                <section class="sec-image">
                    <div class="widget">
                        <?php 
                            if(count($listpicture) > 0 ){
                                $no=1;
                                foreach ($listpicture as $key => $value) {
                        ?>
                                <div class="cols1 <?php  if($no == 3){ echo "mrnone"; } ?>">
                                    <img src="<?=isset($value->name)?base_url().'assets/uploads/article/'.$value->name:'' ?>">
                                </div>
                        <?php
                                 $no++;
                                }
                               
                            }
                        ?>
                        

                        <!-- <div class="cols1">
                            <img src="<?php echo base_url(); ?>assets/theme/img/dir-5@2x.jpg">
                        </div>

                        <div class="cols1 mrnone">
                            <img src="<?php echo base_url(); ?>assets/theme/img/cianjur.jpg">
                        </div> -->

                        <div class="clear-float"></div>
                    </div>
                </section>


                <section class="sec-article">

                    <div class="content-article">
                    <?php echo $article->content_2; ?>
                    </div>


                    <div class="clear-float"></div>
                    
                </section>

                <?php 
                    if(count($listpicture2) > 0 ){
                ?>
                        <section class="sec-image">
                            <div class="widget">
                                <?php
                                    $cols=2;
                                    foreach ($listpicture2 as $key => $value2) {
                                ?>  
                                    <div class="cols<?php echo $cols; ?>">
                                        <img src="<?=isset($value2->name)?base_url().'assets/uploads/article/'.$value2->name:'' ?>">
                                    </div>
                                <?php
                                    $cols++;
                                    }
                                ?>
                                

                                <!-- <div class="cols3">
                                    <img src="<?php echo base_url(); ?>assets/theme/img/hero.jpg">
                                </div> -->

                                <div class="clear-float"></div>
                            </div>
                        </section>      

                        <section class="sec-article">
                                <div class="content-article">
                                   <?php echo $article->content_3; ?>
                                </div>
                            <div class="clear-float"></div>
                            
                        </section>
                <?php
                    }
                ?>

                

                <section class="sec-share">
                        <div class="share-title">
                                <p>BAGIKAN</p>
                        </div>
                        <div class="sec-icon">

                                <i class="fab fa-facebook-square"></i>
                                <i class="fab fa-twitter"></i>
                                <i class="fab fa-instagram"></i>
                        </div>
                </section>

                <section class="sec-blog">
                    <div class="breadcumb">
                        <h2>Paket Jelajah</h2>  
                    </div>

                    <div class="widget">
                        <div class="cols">
                            <a href=""><img src="<?php echo base_url(); ?>assets/theme/img/piramida.jpg"></a>
                            <span class="favorite">
                                    <img src="<?php echo base_url(); ?>assets/theme/img/heart@2x.png">
                            </span>
                            <div class="cols-sum">
                                <div class="title-content"><a href="">Menapaki  Piramida Penuh Misteri</a></div>
                                
                                <div class="summary-content-blog">
                                    <p>
                                        Banyak kontroversi tentang situs Gunung Padang ini. Ada yang mengatakan bahwa inilah bukti bahwa Atlantis itu ada di wilayah Indonesia.
                                    </p>
                                </div>
                                <div class="rating">
                                        <span class="star"></span>    
                                        <span class="star"></span>    
                                        <span class="star"></span>    
                                        <span class="star"></span>    
                                        <span class="star"></span>    
                                </div>
                            </div>
                        </div>

                        <div class="cols">
                            <a href=""><img src="<?php echo base_url(); ?>assets/theme/img/maenpo.jpg"></a>
                            <span class="favorite">
                                    <img src="<?php echo base_url(); ?>assets/theme/img/heart@2x.png">
                            </span>
                            <div class="cols-sum">
                                <div class="title-content"><a href="">Belajar Maenpo, Yuk!</a></div>
                                
                                <div class="summary-content-blog">
                                    <p>
                                        Banyak kontroversi tentang situs Gunung Padang ini. Ada yang mengatakan bahwa inilah bukti bahwa Atlantis itu ada di wilayah Indonesia.
                                    </p>
                                </div>
                                <div class="rating">
                                        <span class="star"></span>    
                                        <span class="star"></span>    
                                        <span class="star"></span>    
                                        <span class="star"></span>    
                                        <span class="star"></span>    
                                </div>
                            </div>
                        </div>

                        <div class="cols fr mrnone">
                            <a href=""><img src="<?php echo base_url(); ?>assets/theme/img/gua.jpg"></a>
                            <span class="favorite">
                                    <img src="<?php echo base_url(); ?>assets/theme/img/heart@2x.png">
                            </span>
                            
                            <div class="cols-sum">
                                <div class="title-content"><a href="">Menguak Misteri Gua "Siluman"</a></div>
                                
                                <div class="summary-content-blog">
                                    <p>
                                        Banyak kontroversi tentang situs Gunung Padang ini. Ada yang mengatakan bahwa inilah bukti bahwa Atlantis itu ada di wilayah Indonesia.
                                    </p>
                                </div>
                                <div class="rating">
                                        <span class="star"></span>    
                                        <span class="star"></span>    
                                        <span class="star"></span>    
                                        <span class="star"></span>    
                                        <span class="star"></span>    
                                </div>
                            </div>
                        </div>

                        <div class="clear-float"></div>
                    </div>
                </section>

                <section class="sec-blog-join">
                    <div class="join-text">
                        <div class="join-title">
                            <h2>BERGABUNG BERSAMA</h2>
                            <h2>BALAD GURILAPS</h2>
                            <div class="join-p">
                                <p>
                                These tours are made for lovers and groups alike, as well as offering customized tours and additional single accommodations.

                                </p>
                            </div>
                            <div class="button">
                                    <a href="" class="button-daftar orange">DAFTAR</a>
                            </div>
                        </div>
                    
                    </div>
                </section>