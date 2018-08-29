<div class="sec-container">
                    <div class="breadcumb-menu">
                        <p>Semua Agenda > <span><?php echo $cerlang->title; ?></span> </p> 
                    </div>  
                    <div class="side-left">
                        <div class="image-detail">
                            <img src="<?php echo base_url(); ?>assets/uploads/cerlang/<?php echo $pic_head->id_content; ?>/<?php echo $pic_head->name; ?>">
                        </div>
                        <div class="row-det">
                            <h2><?php echo $cerlang->title; ?></h2>
                        </div>
                        <div class="row-det">
                            <span class="txt-oren"><?php echo strtoupper(get_title($cerlang->category_cerlang, $this->tbl_category_cerlang)); ?></span> <span> | <?php echo indonesian_date($cerlang->date_created,"j F Y"); ?></span>
                        </div>
                        <div class="row-det">
                            <div class="box-left-head">
                                <div class="img-author">
                                    <!-- <img src="<?php echo base_url(); ?>/assets/theme//img/author.png">
                                    <div class="name-author">
                                        <p><strong>Contributor</strong></p>
                                        <p>Gurlips Admin</p>
                                    </div> -->
                                </div>
                            </div>
                            <div class="box-right-head">
                                <div class="share">
                                    <p>SHARE</p>
                                    <ul>
                                        
                                        <li><i class="fab fa-facebook-square"></i></li>
                                        <li><i class="fab fa-twitter"></i></li>
                                        <li><i class="fab fa-instagram"></i></li>
                                        
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="clear-float"></div>
                        </div>
                        <div class="desc-blog">
                            <p>
                                <?php echo $cerlang->content_1; ?>
                            </p>
                            <div class="yt-article">
                                <iframe  src="https://www.youtube.com/embed/<?php echo $cerlang->video_embed_1; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>

                            <p>
                                 <?php echo $cerlang->content_2; ?>
                            </p>
                            <div class="image-article">
                                <img src="<?php echo base_url(); ?>assets/uploads/cerlang/<?php echo $picture->id_content; ?>/<?php echo $picture->name; ?>">             
                            </div>

                            <p> <?php echo $cerlang->content_3; ?></p>
                        </div>
                    </div>
                    <div class="side-right">
                        <div class="box-right">
                            <div class="title-blog-artcl">
                                <p>Newsletter</p>
                            </div>
                            <div class="tag-gratis">
                                <input class="nwslt" placeholder="Masukkan alamat e-mail" type="text" name="newsletter">
                                <button class="btn-nwslt" type="submit">Daftar</button>
                            </div>
                            <div class="txt-nwslt">
                                <p>
                                Don't worry, we won't spam your e-mail address.
                                </p>
                            </div>

                            

                            <div class="box-cat-article">
                                <div class="title-blog-artcl">
                                    <p>Kategori</p>
                                </div>
                                <div class="cat-article">
                                    <ul>
                                        <li><a href="" class="button-gurilaps active">Semua</a></li>
                                        <li><a href="" class="button-gurilaps">Event</a></li>
                                        <li><a href="" class="button-gurilaps">Article</a></li>
                                        <li><a href="" class="button-gurilaps">Jelajah Laut</a></li>
                                        <li><a href="" class="button-gurilaps">Info</a></li>
                                        <li><a href="" class="button-gurilaps">Wisata</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear-float"></div>
                </div>
                

                <section class="sec-blog">
                    <div class="breadcumb">
                        <h2>Paket Jelajah</h2>  
                    </div>

                    <div class="widget">
                        <div class="cols">
                            <a href=""><img src="<?php echo base_url(); ?>/assets/theme//img/piramida.jpg"></a>
                            <div class="cols-s um">
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
                            <a href=""><img src="<?php echo base_url(); ?>/assets/theme//img/maenpo.jpg"></a>
                            <div class="cols-sum">
                                <div class="title-content"><a href="">Belajar Maenpo, Yuk!</a></div>
                                
                                <div class="summary-content-blog">
                                    <p>
                                        Banyak kontroversi tentang situs Gunung Padang ini. Ada yang mengatakan bahwa inilah bukti bahwa Atlantis itu ada di wilayah Indonesia.
                                    </p>
                                </div>
                                <div class="rating ">
                                        <span class="star"></span>    
                                        <span class="star"></span>    
                                        <span class="star"></span>    
                                        <span class="star"></span>    
                                        <span class="star"></span>    
                                </div>
                            </div>
                        </div>

                        <div class="cols mrnone">
                            <a href=""><img src="<?php echo base_url(); ?>/assets/theme//img/gua.jpg"></a>
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