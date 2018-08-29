<div class="sec-header3">
                    <img src="<?php echo base_url(); ?>assets/uploads/kabupaten/<?php echo $regencies->fcityid; ?>/<?php echo $regencies->image; ?>">
                    <a href="#" ><h1>Kabupaten <?php echo $regencies->fcityname; ?></h1></a>
                        <!-- <h4>EVENT &nbsp;&nbsp;|&nbsp;&nbsp;25 JULI 2018</h4> -->
                    
                    
                    <p><?php echo $regencies->summary; ?></p>
                <div class="clear-float"></div>
                </div>

                
                <section class="sec-article">

                    <div class="content-article">
                 
                      <?php echo $regencies->content; ?>
                    
                    </div>


                    <div class="clear-float"></div>
                    
                </section>
                <?php 
                    if(count($category) > 0 ){
                        foreach ($category as $key => $value) {
                ?>
                            <section class="sec-blog">
                        
                                <div class="breadcumb">
                                    <div class="kiri">
                                        <h2><?php echo $value->title; ?></h2>
                                    </div>
                                
                                    <div class="clear-float"></div>
                                
                                </div>

                                <div class="widget2">
                                    <?php
                                        $data_article = select_where_content_cat($this->tbl_content,"type_menu","article","category", $value->id,"id_regencies", $regencies->fcityid,"3" );
                                        
                                            $n=1;
                                            foreach ($data_article as $keydat => $data) {
                                            $picture = select_multiwhere($this->tbl_picture, 'id_content', $data->id,'posisi_gambar', '1')->row();
                                            // debugCode($picture);
                                    ?>
                                            <div class="cols2 <?php  if($n == 3){ echo "mrnone"; } ?>">
                                                <img src="<?php echo base_url(); ?>assets/uploads/article/<?php echo $picture->id_content; ?>/<?php echo $picture->name; ?>">
                                                <div class="cols-sum-whitout-box-shadow">
                                                    <div class="title-content"><a href="<?php echo base_url(); ?>direct/detail/<?php echo $data->id; ?>"><?php echo $data->title; ?></a></div>
                                                    <div class="summary-content-blog">
                                                        <h4><p style="color: #FF681A"><?php echo strtoupper(get_title($data->category, $this->tbl_category)); ?> </p><p>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo indonesian_date($data->date_created,"j F Y"); ?></p></h4>
                                                    </div>
                                                    <div class="summary-content-blog">
                                                        <p>
                                                            <br>
                                                            <br>
                                                            <?php echo $data->summary; ?>
                                                        </p>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                    <?php
                                             $n++;
                                            }
                                           
                                        
                                    ?>
                                    

                                   

                                    <div class="clear-float"></div>
                                </div>
                            </section>
                <?php
                        }
                    }
                ?>
                

                <!-- <section class="sec-blog">
                    
                    <div class="breadcumb">
                        <div class="kiri">
                            <h2>Kuliner</h2>
                        </div>
                    
                        <div class="clear-float"></div>
                    
                    </div>

                    <div class="widget2">
                        <div class="cols2">
                            <img src="<?php echo base_url(); ?>assets/theme/img/kuliner3.png">
                            <div class="cols-sum-whitout-box-shadow">
                                <div class="title-content"><a href="<?php echo base_url(); ?>direct/detail/1">Soto Mang Ndik</a></div>
                                
                                <div class="summary-content-blog">
                                    <a href="article_detail"><h4><p style="color: #FF681A">JELAJAH </p><p>&nbsp;&nbsp;|&nbsp;&nbsp;29 JULI 2018</p></h4></a>
                                </div>
                                <div class="summary-content-blog">
                                    <p>
                                        <br><br>Bogor (Sundanese: ᮘᮧᮌᮧᮁ, Dutch: Buitenzorg) is a city in the West Java province, Indonesia. Located around 60 kilometers (37 mi) south from the national capital of Jakarta, Bogor is the 6th largest city of Jabodetabek (Jakarta metropolitan region) and the 14th nationwide.
                                    </p>
                                </div>
                                
                            </div>
                        </div>

                        <div class="cols2">
                            <img src="<?php echo base_url(); ?>assets/theme/img/kuliner2.png">
                            <div class="cols-sum-whitout-box-shadow">
                                <div class="title-content"><a href="<?php echo base_url(); ?>direct/detail/1">Ayam Penyet Bajret</a></div>
                                <div class="summary-content-blog">
                                    <a href="#"><h4><p style="color: #FF681A">ARTIKEL </p><p>&nbsp;&nbsp;|&nbsp;&nbsp;28 JULI 2018</p></h4></a>
                                </div>
                                <div class="summary-content-blog">
                                    <p>
                                        <br><br>The city covers an area of 118.5 km2, and it had a population of 950,334 at the 2010 Census; the latest official estimate (as at January 2014) was 1,030,720. Bogor is an important economic, scientific, cultural and tourist center, as well as a mountain resort.
                                    </p>
                                </div>
                                
                            </div>
                        </div>

                        <div class="cols2 mrnone">
                            <img src="<?php echo base_url(); ?>assets/theme/img/kuliner1.png">
                            <div class="cols-sum-whitout-box-shadow">
                                <div class="title-content"><a href="<?php echo base_url(); ?>direct/detail/1">Bubur Ayam Kumis</a></div>
                                <div class="summary-content-blog">
                                    <a href="#"><h4><p style="color: #FF681A">EVENT </p><p>&nbsp;&nbsp;|&nbsp;&nbsp;27 JULI 2018</p></h4></a>
                                </div>
                                <div class="summary-content-blog">
                                    <p>
                                        <br><br>Bogor is an important economic, scientific, cultural and tourist 
                                    </p>
                                </div>
                                
                            </div>
                        </div>



                        <div class="clear-float"></div>
                    </div>
                </section>

                <section class="sec-blog">
                    
                    <div class="breadcumb">
                        <div class="kiri">
                            <h2>Tempat Bersejarah</h2>
                        </div>
                    
                        <div class="clear-float"></div>
                    
                    </div>

                    <div class="widget2">
                        <div class="cols2">
                            <img src="<?php echo base_url(); ?>assets/theme/img/Group3Copy4.png">
                            <div class="cols-sum-whitout-box-shadow">
                                <div class="title-content"><a href="<?php echo base_url(); ?>direct/detail/1">Klanteng Dhanangun / Klenteng Hok Tek Bio</a></div>
                                
                                <div class="summary-content-blog">
                                    <a href="article_detail"><h4><p style="color: #FF681A">JELAJAH </p><p>&nbsp;&nbsp;|&nbsp;&nbsp;29 JULI 2018</p></h4></a>
                                </div>
                                <div class="summary-content-blog">
                                    <p>
                                        <br><br>Bogor (Sundanese: ᮘᮧᮌᮧᮁ, Dutch: Buitenzorg) is a city in the West Java province, Indonesia. Located around 60 kilometers (37 mi) south from the national capital of Jakarta, Bogor is the 6th largest city of Jabodetabek (Jakarta metropolitan region) and the 14th nationwide.
                                    </p>
                                </div>
                                
                            </div>
                        </div>

                        <div class="cols2">
                            <img src="<?php echo base_url(); ?>assets/theme/img/Group3Copy8.png">
                            <div class="cols-sum-whitout-box-shadow">
                                <div class="title-content"><a href="<?php echo base_url(); ?>direct/detail/1">Kampung Adat Urug, Cigudeg</a></div>
                                <div class="summary-content-blog">
                                    <a href="#"><h4><p style="color: #FF681A">ARTIKEL </p><p>&nbsp;&nbsp;|&nbsp;&nbsp;28 JULI 2018</p></h4></a>
                                </div>
                                <div class="summary-content-blog">
                                    <p>
                                        <br><br>The city covers an area of 118.5 km2, and it had a population of 950,334 at the 2010 Census; the latest official estimate (as at January 2014) was 1,030,720. Bogor is an important economic, scientific, cultural and tourist center, as well as a mountain resort.
                                    </p>
                                </div>
                                
                            </div>
                        </div>

                        <div class="cols2 mrnone">
                            <img src="<?php echo base_url(); ?>assets/theme/img/Group3Copy9.png">
                            <div class="cols-sum-whitout-box-shadow">
                                <div class="title-content"><a href="<?php echo base_url(); ?>direct/detail/1">Panorama Wangun Jayas</a></div>
                                <div class="summary-content-blog">
                                    <a href="#"><h4><p style="color: #FF681A">EVENT </p><p>&nbsp;&nbsp;|&nbsp;&nbsp;27 JULI 2018</p></h4></a>
                                </div>
                                <div class="summary-content-blog">
                                    <p>
                                        <br><br>Bogor is an important economic, scientific, cultural and tourist 
                                    </p>
                                </div>
                                
                            </div>
                        </div>



                        <div class="clear-float"></div>
                    </div>
                </section> -->


<!-- SECTION NAV NEXT & PREVIUS PAGE -->
                <!-- <section class="sec-nav-page">
                    <div class="pagination">
                          <a href="#">&#8592;</a>
                          <a href="#"  class="active">1</a>
                          <a href="#">2</a>
                          <a href="#">3</a>
                          <a href="#">4</a>
                          <a href="#">5</a>
                          <a href="#">6</a>
                          <a href="#">&#8594;</a>
                    </div>
                </section> -->

            <div class="pra-footer">
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
            </div>