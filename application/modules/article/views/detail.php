<div class="sec-container">
                    <div class="breadcumb-menu">
                        <p>Article > <span><?php echo $article->title; ?></span> </p> 
                    </div>  
                    <div class="side-left">
                        <div class="image-detail">
                            <img src="<?php echo base_url(); ?>assets/uploads/article/<?php echo $pic_header->id_content; ?>/<?php echo $pic_header->name; ?>">
                        </div>
                        <div class="row-det">
                            <h2><?php echo $article->title; ?></h2>
                        </div>
                        <div class="row-det">
                            <span class="txt-oren"><?php echo strtoupper(get_title($article->category, $this->tbl_category)); ?></span> <span> | <?php echo indonesian_date($article->date_created,"j F Y"); ?></span>
                        </div>
                        <div class="row-det">
                            <div class="box-left-head">
                                <div class="img-author">
                                   <!--  <img src="<?php echo base_url(); ?>assets/theme/img/author.png">
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
                               <?php
                                echo $article->content_1;
                               ?>
                            </p>
                            <div class="gallery-artcl-detil">
                                <ul>
                                <?php 
                                    if(count($listpicture) > 0 ){
                                        $no=1;
                                        foreach ($listpicture as $key => $value) {
                                ?>
                                        <li><img src="<?=isset($value->name)?base_url().'assets/uploads/article/'.$value->name:'' ?>"></li>
                                <?php
                                        }
                                    }
                                ?>
                                    
                                   
                                </ul>
                                
                                
                                
                                
                            </div>
                            <p>
                                <?php echo $article->content_2; ?>
                            </p>
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
                                        <?php
                                            if (count($category) > 0) {
                                                $n=1;
                                                foreach ($category as $key => $value) {
                                        ?>
                                                <li><a href="" class="button-gurilaps <?php  if($no == 1){ echo "active"; } ?>"><?php echo $value->title ?></a></li>
                                        <?php
                                                $n++;
                                                }
                                            }
                                        ?>
                                        
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
                       <?php
                         
                            if (count($hot_deals->data->packages) > 0) {
                                $n=1;
                                foreach ($hot_deals->data->packages as $key => $dat) {
                                   if($dat->featured_image != ""){
                                    $getimg = $dat->featured_image;
                                   }else{
                                    $getimg = base_url()."assets/theme/img/image_not_avaliable.png";
                                   }
                                   
                        ?>
                                <div class="cols <?php  if($n == 3){ echo "mrnone"; } ?>">
                                    <a target="_blank" href="<?php echo $dat->target_url; ?>"><img src="<?php echo $getimg; ?>"></a>
                                    <div class="cols-sum">
                                        <div class="title-content"><a target="_blank" href="<?php echo $dat->target_url; ?>"><?php echo $dat->package_name; ?></a></div>
                                        
                                        <div class="summary-content-blog">
                                            <p>
                                               <?php echo limite_character($dat->description,200); ?>
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
                            <p>
                                These tours are made for lovers and groups alike, as well as offering customized tours and additional single accommodations.

                            </p>
                            <div class="button">
                                    <a href="" class="button-daftar orange">DAFTAR</a>
                            </div>
                        </div>
                    
                    </div>
                </section>