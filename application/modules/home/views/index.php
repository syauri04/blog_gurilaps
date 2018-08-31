<div class="fluid_container">
                    <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
                        
                        <?php 
                            //debugCode($banner);
                            if(count($banner) > 0){
                                foreach ($banner as $key => $value) {
                        ?>
                                     <div  data-src="<?php echo base_url(); ?>assets/uploads/banner/<?php echo $value->id; ?>/<?php echo $value->images; ?>">
                                        <div class="camera_caption"><?php echo isset($value->title)?$value->title:""; ?></div>
                                     </div>
                                     <!-- <div  data-src="<?php echo base_url(); ?>assets/theme/img/hero.jpg">
                                      <div class="camera_caption">JELAJAH PANTAI DI PESISIR JAWA BARAT</div>
                                    </div> -->
                        <?php
                                }
                            }
                        ?>

                        <div  data-src="<?php echo base_url(); ?>assets/theme/img/hero.jpg">
                          <div class="camera_caption">JELAJAH PANTAI DI PESISIR JAWA BARAT</div>
                        </div>
                                     
                    </div>
                </div>
                <div class="clear-float"></div>

                <section class="sec-blog">
                    <div class="home-dir-wisata">
                        <div class="hdw-summary">
                            <h2>DIREKTORI WISATA <br> <?php echo $direct_prop->fprovincename; ?></h2>
                            <p>
                               <?php echo $direct_prop->content; ?>
                            </p>
                            <div class="button">
                                    <a href="<?php echo base_url() ?>direct" class="button-gurilaps">LIHAT SEMUA</a>
                            </div>
                        </div>
                    </div>
                    <div class="home-galeri-wisata">
                        <?php
                            // debugCode($direct_kota);
                            if(count($direct_kota) > 0){
                                foreach ($direct_kota as $key => $value) {
                                // debugCode($value);
                        ?>
                                   <div class="image-gw">
                                        <a href="<?php echo base_url() ?>direct/regencies/<?php echo $value->fcityid; ?>">
                                            <img src="<?php echo base_url(); ?>assets/uploads/kabupaten/<?php echo $value->fcityid ; ?>/<?php echo $value->image; ?>">
                                        </a>
                                        <a href="<?php echo base_url() ?>direct/regencies/<?php echo $value->fcityid; ?>"><div class="image-gw-title"> Kabupaten <?php echo $value->fcityname; ?></div></a>
                                    </div> 
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

                <section class="sec-blog">
                    <div class="breadcumb">
                        <h2>Article</h2>    
                    </div>
                    <div class="widget">
                        <?php

                            if(count($article) > 0){
                                $n = 1;
                                foreach ($article as $key => $value) {
                                    $pic1 = get_pic_1($value->id);
                                   
                                    // debugCode($pic1);
                        ?>
                                    
                                    <div class="cols-article <?php  if($n == 2){ echo "fr"; } ?>">
                                        <a href="<?php echo base_url() ?>article/detail/<?php echo $value->id; ?>"><img src="<?php echo base_url(); ?>assets/uploads/article/<?php echo $value->id ; ?>/<?php echo $pic1->name; ?>"></a>
                                        <div class="cols-sum-title"><a href="<?php echo base_url() ?>article/detail/<?php echo $value->id; ?>"> <p><?php echo $value->title; ?></p></a></div>
                                        <div class="cols-sum-desc"> 
                                            <p> 
                                                <?php echo $value->summary; ?>
                                            </p>
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

                <section class="sec-blog">
                    <div class="breadcumb">
                        <h2>Video</h2>  
                    </div>
                    <div class="widget">
                        <div class="video-yt">

                             <div>
                                <iframe name="framevideo" id="framevideo"  src="https://www.youtube.com/embed/<?php if(isset($video)){ echo $video->id_embed; } ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                             </div>
                             <div class="video-sum">
                                <p id="ptitle"><?php if(isset($video)){ echo $video->title; } ?></p>
                             </div>
                             <div class="video-time">
                                <p id="pdate"><?php echo indonesian_date($video->date_created,"l, j F Y"); ?></p>
                             </div>
                        </div>
                        <div class="video-row">
                            <div class="video-list">
                                <?php
                                    if(count($listvideo)){
                                        $v=1;
                                        foreach ($listvideo as $key => $value) {
                                    ?>
                                            <div class="cols-list">
                                                <a id="vid<?php echo $v; ?>" class="vid" target="framevideo" href="https://www.youtube.com/embed/<?php if(isset($value)){ echo $value->id_embed; } ?>"><p class="cl-title"><?php echo $value->title; ?></p></a>
                                                <p class="cl-time"><?php echo indonesian_date($value->date_created,"l, j F Y"); ?></p>
                                                <input type="hidden" name="title" id="vtitle_<?php echo $v; ?>" value="<?php echo $value->title ?>">
                                                <input type="hidden" name="date" id="vdate_<?php echo $v; ?>" value="<?php echo indonesian_date($value->date_created,"l, j F Y") ?>">
                                            </div>
                                    <?php
                                        $v++;
                                        }
                                    }
                                ?>
                                
                               
                                
                            </div>

                            <div class="button">
                                    <a href="<?php echo base_url() ?>video" class="button-gurilaps">LIHAT SEMUA VIDEO</a>
                            </div>
                        </div>
                        <div class="clear-float"></div>
                        
                        
                    </div>
                </section>
                <script>
                    $(document).ready(function(){
                        <?php
                            $vv=1;
                            foreach ($listvideo as $key => $value) {
                        ?>
                                $("#vid<?php echo $vv ?>").click(function(e) {
                                     // alert("#vid<?php echo $vv ?>");
                                    e.preventDefault();
                                   
                                   
                                   $("#framevideo").attr("src", $(this).attr("href"));
                                   $("#ptitle").text($("#vtitle_<?php echo $vv ?>").val());
                                   $("#pdate").text($("#vdate_<?php echo $vv ?>").val());

                                })
                        <?php
                            $vv++;
                            }
                        ?>

                    });
                                    
                </script>

                <section class="sec-blog-image">
                    <div class="agenda-text">
                        <div class="agenda-title">
                            <h2>AGENDA</h2>
                            <p>
                                These tours are made for lovers and groups alike, as well as offering customized tours and additional single accommodations.
                                <br>
                                <br>
                                These tours are made for lovers and groups alike, as well as offering customized tours and additional single accommodations.
                                

                            </p>
                            <div class="button">
                                    <a href="<?php echo base_url() ?>agenda" class="button-gurilaps white">SEMUA AGENDA</a>
                            </div>
                        </div>
                    
                    </div>
                    <div class="agenda-list">
                        <div class="agenda-box">

                            <div class="list-top-ag">
                                <?php
                                    if(isset($agenda)){ 
                                        $pic_agend = get_pic_1($agenda->id);
                                        // debugCode($pic_agend);
                                ?>
                                        <div class="image-ag">
                                            <img src="<?php echo base_url(); ?>assets/uploads/agenda/thumbs/<?php echo $pic_agend->name; ?>">
                                        </div>
                                        <div class="summary-ag">
                                            <div class="list-top-title">
                                                <a href="<?php echo base_url() ?>agenda/detail/<?php echo $agenda->id; ?>"><p><?php echo $agenda->title; ?></p></a>
                                            </div>
                                            <div class="list-top-sum">
                                                <p>
                                                    <?php echo limite_character($agenda->summary,200); ?>
                                                </p>
                                            </div>
                                            <div class="list-date">
                                                <p class="ld-date"><i class="far fa-calendar-alt"></i> Date</p>
                                                <p class="ld-loc"><i class="fas fa-map-marker-alt"></i> Location</p>
                                            </div>
                                            <div class="list-date-td">
                                                <p ><?php echo date("d M", strtotime($agenda->date_start)); ?></p>
                                                <p class="td-loc" ><?php echo nmloc($agenda->location); ?></p>
                                            </div>
                                        </div>
                                        <div class="clear-float"></div>
                                <?php
                                    }
                                ?>
                                

                            </div>
                            <div class="list-ag">
                                <?php
                                    if(count($listagenda) > 0){
                                        foreach ($listagenda as $key => $value) {
                                ?>
                                            <div class="list-ag-head">
                                                <div class="list-ag-cat">
                                                    <a href="<?php echo base_url() ?>agenda/detail/<?php echo $value->id; ?>">
                                                        <p>
                                                            <?php echo $value->title; ?>
                                                        </p>
                                                    </a>
                                                </div>
                                                <div class="list-ag-date">
                                                    <p>
                                                       <?php echo date("d M Y", strtotime($value->date_start)); ?>
                                                    </p>
                                                </div>
                                                <div class="clear-float"></div>
                                                <div class="list-ag-sum">
                                                    <p>
                                                         <?php echo limite_character($value->summary, 100); ?>
                                                    </p>
                                                       
                                                    
                                                </div>
                                            </div>
                                <?php
                                        }
                                    }
                                ?>
                                

                               
                            </div>
                        </div>
                    </div>
                    <div class="clear-float"></div>


                </section>

                <section class="sec-blog mbf">
                    <div class="breadcumb">
                        <h2>CERLANG GURILAPS</h2>   
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