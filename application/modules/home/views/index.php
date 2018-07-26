<div class="main">
                <div class="slider-container rev_slider_wrapper" style="height: 650px;">
                    <div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 650, 'disableProgressBar': 'on', 'navigation': {'bullets': {'enable': true, 'direction': 'vertical', 'h_align': 'right', 'v_align': 'center', 'space': 5}, 'arrows': {'enable': false}}}">
                        <ul>
                            <?php foreach ($banner as $key) { ?>
                                <li data-transition="fade">
                                    <img src="<?php echo base_url() ?>assets/uploads/banner/<?php echo $key->id ?>/<?php echo $key->images ?>"
                                        alt=""
                                        data-bgposition="center center"
                                        data-bgfit="cover"
                                        data-bgrepeat="no-repeat"
                                        class="rev-slidebg">

                                    <div class="tp-caption main-label"
                                        data-x="left" data-hoffset="25"
                                        data-y="center" data-voffset="-5"
                                        data-start="1500"
                                        data-whitespace="nowrap"
                                        data-transform_in="y:[100%];s:500;"
                                        data-transform_out="opacity:0;s:500;"
                                        style="z-index: 5; font-size: 1.5em; text-transform: uppercase;"
                                        data-mask_in="x:0px;y:0px;"><?php if(isset($key->summary)){ echo $key->summary; }else{ echo "";} ?></div>

                                    <div class="tp-caption main-label"
                                        data-x="left" data-hoffset="25"
                                        data-y="center" data-voffset="-55"
                                        data-start="500"
                                        style="z-index: 5; text-transform: uppercase; font-size: 52px;"
                                        data-transform_in="y:[-300%];opacity:0;s:500;"><?php if(isset($key->title)){ echo $key->title; }else{ echo "";} ?> </div>

                                    <div class="tp-caption bottom-label"
                                        data-x="left" data-hoffset="25"
                                        data-y="center" data-voffset="40"
                                        data-start="2000"
                                        style="z-index: 5; border-bottom: 1px solid #fff; padding-bottom: 3px;"
                                        data-transform_in="y:[100%];opacity:0;s:500;" style="font-size: 1.2em;"></div>
                                </li>
                            <?php } ?>
                            
                            
                        </ul>
                    </div>
                </div>
             
    
                    <div class="container ">
                        <div class="rox" >
                            <div class="feature-box feature-box-style-2 mb-xl appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="300">
                                <ul class="i_info">
                                <li>
                                    <img src="<?php echo base_url();?>assets/theme/img/i_cabang.png" />
                                </li>
                                <li>
                                    <img src="<?php echo base_url();?>assets/theme/img/i_air.png" />
                                </li>
                                <li>
                                    <img src="<?php echo base_url();?>assets/theme/img/i_pelanggan.png" />
                                </li>
                            </ul>
                            </div>
                            
                        </div>
                        
                    </div>
                
                
                <div class="container ">
                    <div class="rox" >
                        <div class="head">
                            <h1>INFO TERKINI </h1>
                        </div>
                        <div class="bg-info">
                            <div class="content_info appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="300">
                                <ul class="info">
                                    <?php
                                        foreach ($news as $key => $vn) {
                                    ?>
                                        <li>
                                            <div class="info_title">
                                                <p><a href="<?php echo base_url()."news/detail/".$vn->id."/".url_title($vn->title) ?>"> <?php echo $vn->title ?></a></p>
                                            </div>
                                            <div class="info_summary">
                                               <?php echo substr(strip_tags($vn->content), 0,200)."..."; ?>
                                            </div>
                                        </li>
                                    <?php
                                        }
                                    ?>
                                    
                                   

                                </ul>
                                
                                <div style="clear:both;"></div>
                                <div class="con-center">
                                    <a href="<?php echo base_url('news') ?>" class="btn btn-primary">LIHAT SEMUA BERITA</a>
                                </div>
                                

                            </div>
                        </div>
                    </div>
                    
                </div>
            
                
                <div class="container ">
                    <div class="row" >
                        <div class="head">
                            <h1>Lakukan Pembayaran Tagihan Pelanggan Disini </h1>
                        </div>
                        <div class="list_tagihan">
                            <div class="owl-carousel owl-theme">
                            <div class="item">
                                <img class="logo_tagihan" src="<?php echo base_url();?>assets/theme/img/indomaret.png" />
                            </div>
                            <div class="item">
                             <img class="logo_tagihan" src="<?php echo base_url();?>assets/theme/img/alfamart.png" />
                            </div>
                            <div class="item">
                             <img class="logo_tagihan" src="<?php echo base_url();?>assets/theme/img/alfamidi.png" />
                            </div>
                            <div class="item">
                              <img class="logo_tagihan" src="<?php echo base_url();?>assets/theme/img/posindo.png" />
                            </div>
                            
                         </div>
                        </div>
                         
                        
                    </div>
                    
                </div>

            </div>