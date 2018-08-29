<div class="sec-header2">

                        <img src="<?php echo base_url(); ?>assets/theme/img/featured.jpg">     
                        <h1>PAMERAN FOTO<br>JELAJAH LAUT<br>INDONESIA →</h1>
                        <h4>EVENT &nbsp;&nbsp;|&nbsp;&nbsp;25 JULI 2018</h4>
                    
                    
                        <p>Bogor (Sundanese: ᮘᮧᮌᮧᮁ, Dutch: Buitenzorg) is a city in the West Java province, Indonesia. Located around<br> 60 kilometers (37 mi) south from the national capital of Jakarta, Bogor is the 6th largest city of Jabodetabek<br> (Jakarta metropolitan region) and the 14th nationwide.</p></a>
        
                </div>

                <div class="clear-float"></div>

                

                
                <section class="sec-blog">
                    
                    <div class="breadcumb">
                        <div class="kiri">
                            <h2>ARTIKEL</h2>
                        </div>
                        <div class="kanan">

                            <!-- <ul>
                                <li>Category</li>
                                <li>
                                    <select class="sort-article">
                                        <option value="0">Semua:</option>
                                        <option value="1">Audi</option>
                                        <option value="2">BMW</option>
                                        <option value="3">Citroen</option>
                                        <option value="4">Ford</option>

                                    </select>
                                </li>
                            </ul> -->

                            
                            <!-- <div class="custom-select" style="width:160px; height: 50px;">
                                <select>
                                    <option value="0">Semua:</option>
                                    <option value="1">Audi</option>
                                    <option value="2">BMW</option>
                                    <option value="3">Citroen</option>
                                    <option value="4">Ford</option>

                                </select>
                            </div>
                            <h3>Category</h3>
                            <h1>|</h1> -->
                            <!-- <img src="assets/icon/search.png"> -->
                            
                        </div>
                        <div class="clear-float"></div>
                    
                    </div>

                    <div class="widget2">
                        <?php
                            if (count($article) > 0) {
                                foreach ($article as $key => $value) {
                                    // debugCode($value);
                                    $pic1 = get_pic_1($value->id);
                        ?>
                                <div class="cols2">
                                    <img src="<?php echo base_url(); ?>assets/uploads/article/<?php echo $value->id ; ?>/<?php echo $pic1->name; ?>">
                                    <div class="cols-sum-whitout-box-shadow">
                                        <div class="title-content"><a href="<?php echo base_url(); ?>article/detail/<?php echo $value->id; ?>"><?php echo $value->title; ?></a></div>
                                        
                                        <div class="summary-content-blog">
                                            <a href=""><h4><p style="color: #FF681A"><?php echo strtoupper(get_title($value->category, $this->tbl_category)); ?> </p><p>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo indonesian_date($value->date_created,"j F Y"); ?></p></h4></a>
                                        </div>
                                        <div class="summary-content-blog">
                                            <p>
                                                <br><br>
                                                <?php echo $value->summary; ?>
                                            </p>
                                        </div>
                                        
                                    </div>
                                </div>
                        <?php
                                }
                            }
                        ?>
                        

                       


                        <div class="clear-float"></div>
                    </div>
                </section>

               

<!-- SECTION NAV NEXT & PREVIUS PAGE -->
               <!--  <section class="sec-nav-page">
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