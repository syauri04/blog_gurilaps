<section class="sec-blog">
                    <div class="breadcumb">
                        <h2>CERLANG</h2>    
                    </div>
                    <div class="widget">
                        <div class="cerlang-box">
                            <a href="<?php echo base_url(); ?>cerlang/diskusi">
                                <div class="bgbox1">
                                        <img src="<?php echo base_url(); ?>assets/theme/img/cerlang-diskusi@2x.png">
                                        <p>DISKUSI</p>
                                </div>  
                            </a>
                            
                        </div>
                    
                        <div class="cerlang-box">
                            <a href="<?php echo base_url(); ?>cerlang/lomba">
                                <div class="bgbox2">
                                        <img src="<?php echo base_url(); ?>assets/theme/img/cerlang-lomba@2x.png">
                                        <p>LOMBA</p>
                                </div>
                            </a>
                        </div>
                    
                        <div class="cerlang-box">
                            <a href="<?php echo base_url(); ?>cerlang/pameran">
                                <div class="bgbox3">
                                    <img src="<?php echo base_url(); ?>assets/theme/img/cerlang-pameran@2x.png">
                                    <p>PAMERAN</p>
                                </div>
                            </a>
                        </div>
                    
                        <div class="cerlang-box mrnone">
                            <a href="<?php echo base_url(); ?>cerlang/pembinaan">
                                <div class="bgbox4">
                                    <img src="<?php echo base_url(); ?>assets/theme/img/cerlang-pembinaan@2x.png">
                                    <p>PEMBINAAN</p>
                                </div>
                            </a>
                        </div>
                        <div class="clear-float"></div>
                    </div>

                </section>
                <section class="sec-blog">
                    <div class="breadcumb">
                        <div class="kiri">
                            <h2><?php echo $breadcumb; ?></h2>
                        </div>
                        <div class="kanan">

                           <!--  <ul>
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
                            
                            
                        </div>
                        <div class="clear-float"></div>
                    
                    </div>
                    <div class="widget2">
                <?php 
                    if(count($cerlang) > 0 ){
                        $n=1;
                        foreach ($cerlang as $key => $data) {
                            $picture = select_multiwhere($this->tbl_picture, 'id_content', $data->id,'posisi_gambar', '1')->row();
                                        
                ?>
                            
                        
                            <div class="cols2 <?php  if($n == 3){ echo "mrnone"; } ?>">
                                <a href="<?php echo base_url(); ?>cerlang/detail/<?php echo $data->id; ?>"><img src="<?php echo base_url(); ?>assets/uploads/cerlang/<?php echo $picture->id_content; ?>/<?php echo $picture->name; ?>"></a>
                                <div class="cols-sum-whitout-box-shadow">
                                    <div class="title-content"><a href="<?php echo base_url(); ?>cerlang/detail/<?php echo $data->id; ?>"><?php echo $data->title; ?></a></div>
                                    
                                    <div class="summary-content-blog">
                                        <a href=""><h4><p style="color: #FF681A"><?php echo strtoupper(get_title($data->category_cerlang, $this->tbl_category_cerlang)); ?></p><p>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo indonesian_date($data->date_created,"j F Y"); ?></p></h4></a>
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
                    }
                ?>
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