<!DOCTYPE html>
<html>
    
    <head>

        <!-- Basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">   

        <title>Blog Gurilaps</title>    

        <meta name="keywords" content="Blog Gurilaps" />
        <meta name="description" content="Blog Gurilaps">
        <meta name="author" content="SIPK">

        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon" />
        <link rel="apple-touch-icon" href="assets/favicon.png">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Theme CSS -->
        
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/css/theme.css">
        <!-- <link rel="stylesheet" href="css/faris.css"> -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/css/responsive.css">

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/css/camera.css">   
        
        <!-- fontawesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
    
        <!-- SCRIPT -->
        <script type='text/javascript' src='<?php echo base_url() ?>assets/theme/js/jquery.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url() ?>assets/theme/js/jquery.mobile.customized.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url() ?>assets/theme/js/jquery.easing.1.3.js'></script> 
        <script type='text/javascript' src='<?php echo base_url() ?>assets/theme/js/camera.min.js'></script> 
        <script>
            jQuery(function(){
                
                jQuery('#camera_wrap_1').camera({
                    height: '40%',
                    pagination: false,
                    playPause: false,
                    loader: 'none',
                    time: 3500,
                    thumbnails: false
                });
            });
        </script>

        <script>
            function openNav() {
                document.getElementById("boxside").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("boxside").style.width = "0";
            }
        </script>


    </head>
    <body>
        <div class="body">
            <header id="header">
                <div class="header-body">
                    <div class="header-container">
                        <div class="header-logo">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/theme/img/logo.png"></a>
                        </div>

                        <div class="header-menu">

                            <ul>
                                <li><a href="<?php echo base_url(); ?>direct">DIRECTORY</a></li>
                                <li><a href="<?php echo base_url(); ?>article">ARTICLE</a></li>
                                <li><a href="<?php echo base_url(); ?>agenda">AGENDA</a></li>
                                <li><a href="<?php echo base_url(); ?>cerlang">CERLANG</a></li>
                                <!-- <li><a href="">BALAD GURILAPS</a></li> -->
                                <li><img src="<?php echo base_url(); ?>assets/theme/img/lang-ina.png"></li>
                            </ul>
                        </div>

                        <!-- MENU MOBILE !-->

                        <div class="header-menu-mobile">
                            <a href="javascript:void(0)" onclick="openNav()">
                                <i class="fa fa-bars"></i>
                            </a>

                            <div id="boxside" class="sidenav">
                                 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                                <ul>
                                    <li><a href="<?php echo base_url(); ?>direct">DIRECTORY</a></li>
                                    <li><a href="<?php echo base_url(); ?>article">ARTICLE</a></li>
                                    <li><a href="<?php echo base_url(); ?>agenda">AGENDA</a></li>
                                    <li><a href="<?php echo base_url(); ?>cerlang">CERLANG</a></li>
                                    <!-- <li><a href="">BALAD GURILAPS</a></li> -->
                                </ul>
                                
                            </div>
                        
                            
                        </div>

                        <div class="clear-float"></div>
                    </div>
                    
                    
                </div>
            </header>

            <div class="main">
                
<?php echo $page ?>
                
            </div>


            <footer id="footer" class="mtnone">
                <div class="footer-container">
                    <div class="footer-logo">
                        <img src="<?php echo base_url() ?>assets/theme/img/logo.png">
                    </div>
                    <div class="footer-info">
                        <div class="footer-alamat">
                            <span class="isi1">Jl. Aceh No. 30 Bandung Jawa Barat 
                                <br><br>
                                <font color="#FF681A">halo@gurilaps.com</font>
                                <br>
                                +62 877 3377 5540<br>
                                www.gurilaps.com
                            </span>
                        </div>
                        <div class="footer-alamat">
                            <ul>
                                <li><a href="">Directory</a></li>
                                <li><a href="">Article</a></li>
                                <li><a href="">Agenda</a></li>
                            </ul>
                        </div>
                        <div class="footer-alamat">
                            <ul>
                                <li><a href="">Cerlang</a></li>
                                <li><a href="">Balad Gurilaps</a></li>
                                
                            </ul>
                        </div>
                        <div class="footer-apps">
                            <ul>
                                <li class="pb15"><img src="<?php echo base_url() ?>assets/theme/img/google-play-badge@2x.png"></li>
                                <li ><img src="<?php echo base_url() ?>assets/theme/img/appstore@2x.png"></li>
                                
                            </ul>
                        </div>
                        <div class="clear-float"></div>
                    </div>
                    <div class="footer-copyright">
                        <div class="cpr">
                            <p>&copy; 2018 Gurilaps. All rights reserved.</p>
                        </div>
                        <div class="sosmed">
                            <ul>
                                <li><i class="fab fa-whatsapp"></i></li>
                                <li><i class="fab fa-facebook-square"></i></li>
                                <li><i class="fab fa-twitter"></i></li>
                                <li><i class="fab fa-google-plus"></i></li>
                                <li><i class="fab fa-youtube"></i></li>
                                <li><i class="fab fa-instagram"></i></li>
                                
                                
                            </ul>
                        </div>
                        <div class="clear-float"></div>
                    </div>
                </div>
            </footer>
        </div>
    
      
    </body>
</html>