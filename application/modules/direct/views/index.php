<section class="sec-container">
                    <div class="home-dir-wisata">
                        <div class="hdw-summary">
                            <h2><!-- KABUPATEN<br> --> <?php echo $direct_prop->fprovincename; ?></h2>
                            <p>
                              <?php echo $direct_prop->content; ?>
                            </p>
                        </div>
                        <div class=hdw-summary2>
                            <p> Direktori Lainnya: </p>
                            <a href=""><h3>Kota di <?php echo $direct_prop->fprovincename; ?>  →</h3></a>
                        </div>
                    </div>
                    <div class="home-galeri-wisata">
                        <?php
                            if(count($direct_kota) > 0){
                                foreach ($direct_kota as $key => $value) {
                        ?>
                                    <a href="<?php echo base_url() ?>direct/regencies/<?php echo $value->fcityid; ?>">
                                    <div class="image-gw">
                                        <a href="<?php echo base_url() ?>direct/regencies/<?php echo $value->fcityid; ?>">
                                            <img src="<?php echo base_url(); ?>assets/uploads/kabupaten/<?php echo $value->fcityid ; ?>/<?php echo $value->image; ?>">
                                        </a>
                                        <a href="<?php echo base_url() ?>direct/regencies/<?php echo $value->fcityid; ?>"><div class="image-gw-title"> Kabupaten <?php echo $value->fcityname; ?></div></a>
                                    </div> 
                                    </a>
                        <?php
                                }

                            }
                        ?>
                       
                        
                    </div>
                    <div class="clear-float"></div>
                    
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
                            <p>
                                These tours are made for lovers and groups alike, as well as offering customized tours and additional single accommodations.

                            </p>
                            <div class="button">
                                    <a href="" class="button-daftar orange">DAFTAR</a>
                            </div>
                        </div>
                    
                    </div>
                </section>