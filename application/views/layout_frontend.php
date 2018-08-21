<!DOCTYPE html>
<html>
    
<head>

        <!-- Basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">   

        <title><?php if($this->uri->segment('2')=='detail'){  echo $data->title; }else{ echo $controller_name;}?> | <?php echo  $this->appearance->name ?></title>    

        <meta name="keywords" content="PDAM" />
        <meta name="description" content="PDAM">
        <meta name="author" content="SIP">

        <meta property="og:title" content="blog, gurilaps" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="<?php echo base_url() ?>assets/uploads/settings/<?php echo $this->appearance->logo ?>" />
        <meta property="og:url" content="<?php echo base_url() ?>" />
        <meta property="og:description" content="pdam sukabumi" /> 

        <!-- for Twitter -->
         <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="pdam sukabumi" />
        <meta name="twitter:description" content="pdam sukabumi" />
        <meta name="twitter:image" content="<?php echo base_url() ?>assets/uploads/settings/<?php echo $this->appearance->logo ?>" /> 

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="<?php echo base_url()."assets/uploads/settings/fav.png" ?>" sizes="16x16">
        <link rel="shortcut icon" href="<?php echo base_url()."assets/uploads/settings/fav.png" ?>" type="image/x-icon" />
        <link rel="apple-touch-icon" href="img/apple-touch-icon.png">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        
        <!-- Vendor CSS -->
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/test/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/test/vendor/animate/animate.min.css">
    
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/test/vendor/owl.carousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/test/vendor/owl.carousel/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/test/vendor/magnific-popup/magnific-popup.min.css">

        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/test/css/theme.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/test/css/theme-elements.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/test/css/theme-blog.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/test/css/theme-shop.css">

        <!-- Current Page CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/test/vendor/rs-plugin/css/settings.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/test/vendor/rs-plugin/css/layers.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/test/vendor/rs-plugin/css/navigation.css">

        <!-- Skin CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/test/css/skins/skin-medical.css">      
        

        <!-- Demo CSS -->       
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/test/css/demos/demo-medical.css">

        
         <?php 
            if($this->uri->segment('2') == 'detail' OR $this->uri->segment('1') != 'home' AND $this->uri->segment('1') !=""){
        ?>
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/test/vendor/bootstrap/css/bootstrap.min.css">
        <?php
            }else{
        ?>
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/bootstrap.css">
        <?php
            }
         ?>
        
        <!-- Theme CSS -->
        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/dekstop.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/style.css">
       
        
         <!-- Owl Stylesheets -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/js/owlcarousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/js/owlcarousel/assets/owl.theme.default.min.css">
        
        <link href="<?php echo base_url(); ?>assets/theme/css/tinyslide.css" rel="stylesheet" />
        
    </head>
    <body>

        <div class="body">
            <?php //debugCode($this->uri->segment('1')); ?>
            <?php if($this->uri->segment('2') == 'detail' OR $this->uri->segment('1') != 'home' AND $this->uri->segment('1') !=""){ ?>
            <header id="header" class="header-narrow" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 35, 'stickySetTop': '-35px', 'stickyChangeLogo': false}">
                <div class="header-body">
                    <div class="header-top header-top header-top-style-3 header-top-custom">
                      
                    </div>
                    <div class="header-container container">
                        <div class="header-row">
                            <div class="header-column">
                                <div class="header-logo">
                                    <a href="<?php echo base_url(); ?>">
                                        <img alt="Porto" width="140"  src="<?php echo base_url(); ?>assets/theme/img/logo_pdam.png">
                                    </a>
                                </div>
                            </div>
                            <div class="header-column">
                                <div class="header-row">
                                    <div class="header-nav pt-xs">
                                        <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                        <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                                            <nav>
                                                <ul class="nav nav-pills" id="mainNav">
                                                    <li class="activedropdown-full-color dropdown-secondary">
                                                        <a href="<?php echo base_url(); ?>">
                                                            Beranda
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-full-color dropdown-secondary">
                                                        <a href="<?php echo base_url(); ?>profil">
                                                            Profil
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-full-color dropdown-secondary">
                                                        <a href="<?php echo base_url(); ?>news">
                                                            Info
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-full-color dropdown-secondary">
                                                        <a href="<?php echo base_url(); ?>pelanggan">
                                                            Pelanggan
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-full-color dropdown-secondary">
                                                        <a href="<?php echo base_url(); ?>kontak">
                                                            Kontak
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <?php }else{?>
            <header id="header" class="header-narrow" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 84, "stickySetTop": "-84px"}'>
                <div class="logoP">
                    <img src="<?php echo base_url(); ?>assets/theme/img/logo_pdam.png" />
                </div>
                <div class="header-nav">
                    <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                        <nav>
                            <ul class="nav nav-pills" id="mainNav">
                                <li class="activedropdown-full-color dropdown-secondary">
                                    <a href="<?php echo base_url(); ?>">
                                        Beranda
                                    </a>
                                </li>
                                <li class="dropdown-full-color dropdown-secondary">
                                    <a href="<?php echo base_url(); ?>profil">
                                        Profil
                                    </a>
                                </li>
                                <li class="dropdown-full-color dropdown-secondary">
                                    <a href="<?php echo base_url(); ?>news">
                                        Info
                                    </a>
                                </li>
                                <li class="dropdown-full-color dropdown-secondary">
                                    <a href="<?php echo base_url(); ?>pleanggan">
                                        Pelanggan
                                    </a>
                                </li>
                                <li class="dropdown-full-color dropdown-secondary">
                                    <a href="<?php echo base_url(); ?>kontak">
                                        Kontak
                                    </a>
                                </li>
                            
                                
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="bg-menu">
                    <div class="container">
                        <ul class="menu">
                            <li>
                                <a href="<?php echo base_url('home'); ?>"> BERANDA </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>profil">PROFIL</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>news">INFO</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>pelanggan">PEALANGGAN</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>kontak">KONTAK</a>
                            </li>
                        </ul>
                    </div>
                        
                    
                    
                </div>
            </header>

            <?php } ?>

            <div role="main" class="main">
                
<?php echo $page ?>
                
            </div>

            <footer class="short" id="footer">
                <div class="container">
                    
                    
                </div>
            </footer>
        </div>
    
        
        <script src="<?php echo base_url(); ?>assets/theme/js/jquery/jquery.min.js"></script>
        <!-- Theme Base, Components and Settings -->
        <script src="<?php echo base_url(); ?>assets/theme/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme/js/owlcarousel/owl.carousel.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme/js/tinyslide.js" /></script>
        
        <!-- Theme Base, Components and Settings -->
        <script src="<?php echo base_url(); ?>assets/theme/test/js/theme.js"></script>
        
        <!-- Current Page Vendor and Views -->
        <script src="<?php echo base_url(); ?>assets/theme/test/vendor/jquery.appear/jquery.appear.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme/test/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>     
        <script src="<?php echo base_url(); ?>assets/theme/test/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>


        <!-- Theme Initialization Files -->
        <script src="<?php echo base_url(); ?>assets/theme/test/js/theme.init.js"></script>
         <script>
          var tiny = $('#tiny').tiny().data('api_tiny');
        </script>
         <script>
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                items: 4,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true
              });
              $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [1000])
              })
              $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
              })
            })
          </script>
    

<!-- Mirrored from preview.oklerthemes.com/porto/5.1.0/demo-digital-agency.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Dec 2016 14:59:50 GMT -->
</html>