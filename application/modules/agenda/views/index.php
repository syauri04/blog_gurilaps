<section class="sec-container">
                    <div class="breadcumb">
                        <h2>List Agenda</h2>  
                    </div>

                    <?php
                        if (count($agenda) > 0) {
                            foreach ($agenda as $key => $value) {
                                $pic1 = get_pic_1($value->id);
                    ?>
                            <div class="widget mb80">
                                <div class="cols-agenda">
                                    <img src="<?php echo base_url(); ?>assets/uploads/agenda/<?php echo $pic1->name; ?>">
                                </div>

                                <div class="cols-agenda-text">
                                    <h2><?php echo $value->title; ?></h2>
                                    <span><?php echo indonesian_date($value->date_start,"j F Y") ?></span>

                                    <p>
                                        <?php echo $value->summary; ?>
                                    </p>
                                    <div class="button3">
                                            <a href="<?php echo base_url(); ?>agenda/detail/<?php echo $value->id; ?>" class="button-daftar orange">LIHAT</a>
                                    </div>
                                </div>


                                <div class="clear-float"></div>
                            </div>
                    <?php
                            }
                        }
                    ?>
                    

                    

                </section>

    

    

                <!--
                <section class="sec-nav-page">
                    <div class="pagination">
                          <a href="#">&#8592;</a>
                          <a href="#">1</a>
                          <a href="#">2</a>
                          <a href="#">3</a>
                          <a href="#">4</a>
                          <a href="#">5</a>
                          <a href="#">6</a>
                          <a href="#">&#8594;</a>
                    </div>
                </section> 
                -->

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