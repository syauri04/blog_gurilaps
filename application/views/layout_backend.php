<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title><?php  echo $method; if($method!='index'){echo" - ";} echo $controller_name;  ?> | <?php echo $this->appearance->name ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN PLUGIN CSS -->

<link rel="icon" type="image/png" href="<?php echo base_url()."assets/uploads/settings/fav.png" ?>" sizes="16x16">
<link href="<?php echo base_url() ?>assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>

<link href="<?php echo base_url() ?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="<?php echo base_url() ?>assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/plugins/bootstrap-timepicker/jquery.timepicker.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/plugins/bootstrap-timepicker/libbootstrap-datepicker.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
<!-- END PLUGIN CSS -->
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="<?php echo base_url() ?>assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->


<!-- <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script><script type="text/javascript" src="code.jquery.com/jquery-migrate-1.1.0.js"></script> -->
<!-- BEGIN CSS TEMPLATE -->
<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<!-- <script src="<?php echo base_url() ?>assets/plugins/jquery-1.9.1.min.js" type="text/javascript"></script> -->
<script src="<?php echo base_url() ?>assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<!-- END CSS TEMPLATE -->


<!-- CSS JS UPLOAD -->
<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jquery-upload/css/jquery.fileupload.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jquery-upload/css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jquery-upload/css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jquery-upload/css/jquery.fileupload-ui-noscript.css"></noscript>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse ">
  <!-- BEGIN TOP NAVIGATION BAR -->
  <div class="navbar-inner">
    <div class="header-seperation text-center">
      <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">
        <li class="dropdown"> <a id="main-menu-toggle" href="#main-menu"  class="" >
          <div class="iconset top-menu-toggle-white"></div>
          </a> </li>
      </ul>
      <!-- BEGIN LOGO -->
      <a href="<?php echo base_url() ?>admin"><img src="<?php echo base_url() ?>assets/uploads/settings/<?php echo $this->appearance->logo ?>" class="logo" alt=""  data-src="<?php echo base_url() ?>assets/uploads/settings/<?php echo $this->appearance->logo ?>" data-src-retina="<?php echo base_url() ?>assets/uploads/settings/<?php echo $this->appearance->logo ?>" height="40px" style="margin-top: 10px" /></a>
      <!-- END LOGO -->
      <ul class="nav pull-right notifcation-center">
        <li class="dropdown" id="header_task_bar"> <a href="<?php echo base_url() ?>admin" class="dropdown-toggle active" data-toggle="">
          <div class="iconset top-home"></div>
          </a> </li>
      </ul>
    </div>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <div class="header-quick-nav" >
      <!-- BEGIN TOP NAVIGATION MENU -->
      <div class="pull-left">
        <ul class="nav quick-section">
          <li class="quicklinks"> <a href="#" class="" id="layout-condensed-toggle" >
            <div class="iconset top-menu-toggle-dark"></div>
            </a> </li>
        </ul>
       
      </div>
      <!-- END TOP NAVIGATION MENU -->
      <!-- BEGIN CHAT TOGGLER -->
      <div class="pull-right">
        <div class="chat-toggler"> <a href="#" class="dropdown-toggle" id="my-task-list" data-placement="bottom"  data-content='' data-toggle="dropdown" data-original-title="Notifications">
          <div class="user-details">
            <div class="username"> <span class="badge badge-important">3</span> <?php echo $this->session->userdata['admin']['first_name'] ?> <span class="bold"><?php echo $this->session->userdata['admin']['last_name'] ?></span> </div>
          </div>
          <div class="iconset top-down-arrow"></div>
          </a>
          <div id="notification-list" style="display:none">
            <div style="width:300px">
              <div class="notification-messages info">
                <div class="user-profile"> <img src="<?php echo base_url() ?>assets/img/profiles/d.jpg"  alt="" data-src="<?php echo base_url() ?>assets/img/profiles/d.jpg" data-src-retina="<?php echo base_url() ?>assets/img/profiles/d2x.jpg" width="35" height="35"> </div>
                <div class="message-wrapper">
                  <div class="heading"> David Nester - Commented on your wall </div>
                  <div class="description"> Meeting postponed to tomorrow </div>
                  <div class="date pull-left"> A min ago </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="notification-messages danger">
                <div class="iconholder"> <i class="icon-warning-sign"></i> </div>
                <div class="message-wrapper">
                  <div class="heading"> Server load limited </div>
                  <div class="description"> Database server has reached its daily capicity </div>
                  <div class="date pull-left"> 2 mins ago </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="notification-messages success">
                <div class="user-profile"> <img src="<?php echo base_url() ?>assets/img/profiles/h.jpg"  alt="" data-src="<?php echo base_url() ?>assets/img/profiles/h.jpg" data-src-retina="<?php echo base_url() ?>assets/img/profiles/h2x.jpg" width="35" height="35"> </div>
                <div class="message-wrapper">
                  <div class="heading"> You haveve got 150 messages </div>
                  <div class="description"> 150 newly unread messages in your inbox </div>
                  <div class="date pull-left"> An hour ago </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <div class="profile-pic"> <img src="<?php echo base_url() ?>assets/uploads/user-admin/<?php  if($this->session->userdata['admin']['photo']==''){echo"default.jpg";}else{echo $this->session->userdata['admin']['id']."/".$this->session->userdata['admin']['photo'];} ?>"  alt="" data-src="<?php echo base_url() ?>assets/uploads/user-admin/<?php  if($this->session->userdata['admin']['photo']==''){echo"default.jpg";}else{echo $this->session->userdata['admin']['id']."/".$this->session->userdata['admin']['photo'];} ?>" data-src-retina="<?php echo base_url() ?>assets/uploads/user-admin/<?php  if($this->session->userdata['admin']['photo']==''){echo"default.jpg";}else{echo $this->session->userdata['admin']['id']."/".$this->session->userdata['admin']['photo'];} ?>" width="35" height="35" /> </div>
        </div>
        <ul class="nav quick-section ">
          <li class="quicklinks"> <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">
            <div class="iconset top-settings-dark "></div>
            </a>
            <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
              <li><a href="<?php echo base_url() ?>admin/profile"> My Account</a> </li>
              
              <li class="divider"></li>
              <li><a href="<?php echo base_url() ?>admin/logout"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
            </ul>
          </li>
          <li class="quicklinks"> <span class="h-seperate"></span></li>
          
        </ul>
      </div>
      <!-- END CHAT TOGGLER -->
    </div>
    <!-- END TOP NAVIGATION MENU -->
  </div>
  <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar" id="main-menu">
    <!-- BEGIN MINI-PROFILE -->
    <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
      <div class="user-info-wrapper">
        <div class="profile-wrapper"> <img src="<?php echo base_url() ?>assets/uploads/user-admin/<?php  if($this->session->userdata['admin']['photo']==''){echo"default.jpg";}else{echo $this->session->userdata['admin']['id']."/".$this->session->userdata['admin']['photo'];} ?>"  alt="" data-src="<?php echo base_url() ?>assets/uploads/user-admin/<?php  if($this->session->userdata['admin']['photo']==''){echo"default.jpg";}else{echo $this->session->userdata['admin']['id']."/".$this->session->userdata['admin']['photo'];} ?>" data-src-retina="<?php echo base_url() ?>assets/uploads/user-admin/<?php  if($this->session->userdata['admin']['photo']==''){echo"default.jpg";}else{echo $this->session->userdata['admin']['id']."/".$this->session->userdata['admin']['photo'];} ?>" width="69" height="69" /> </div>
        <div class="user-info">
          <div class="greeting">Welcome</div>
          <div class="username"><?php echo $this->session->userdata['admin']['first_name'] ?> <span class="semi-bold"><?php echo $this->session->userdata['admin']['last_name'] ?></span></div>
          <div class="status">Status<a href="#">
            <div class="status-icon green"></div>
            Online</a></div>
        </div>
      </div>
      <!-- END MINI-PROFILE -->
      <!-- BEGIN SIDEBAR MENU -->
      <p class="menu-title">BROWSE <span class="pull-right"><a href="javascript:;"><i class="fa fa-refresh"></i></a></span></p>
      <ul>
        <li class="start"> <a href="<?php echo base_url() ?>admin"> <i class="icon-custom-home"></i> <span class="title">Dashboard</span> <span class="selected"></span></a> 
        </li>
<?php foreach ($menu as $submenu) { ?>
  <?php if( $submenu->sub_menu==0){?>
        <li class="<?php if($submenu->target==$this->uri->segment(1)){echo"active open";} ?>"> <a href="javascript:;"> <i class="<?php echo $submenu->icon ?>"></i> <span class="title"><?php echo $submenu->name_menu ?></span> <span class="arrow <?php if($submenu->target==$this->uri->segment(1)){echo" open";} ?>"></span> </a>
          <ul class="sub-menu">
          <?php foreach ($menu as $data) {
            if( $data->sub_menu== $submenu->id){ ?>
            <li class="<?php if($data->target==$this->uri->segment(2) or $data->target."_form"==$this->uri->segment(2)){echo"active";} ?>" > <a href="<?php echo base_url()."".$submenu->target."/".$data->target ?>"><?php echo $data->name_menu ?></a> </li>
          <?php } }?>
          </ul>
        <?php } ?>
        </li>
<?php } ?>
      </ul>
      <div class="clearfix"></div>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>
  <a href="#" class="scrollup">Scroll</a>
  
  <!-- END SIDEBAR -->
  <!-- BEGIN PAGE CONTAINER-->
  <div class="page-content">
  <img id="loading-image" src="<?php echo base_url() ?>assets/img/loading.gif">
    <div class="content">
      <ul class="breadcrumb">
        <li>
          <p><?php echo $controller_name ?></p>
        </li>
        <li><a href="#" class="active"><?php echo $method ?></a> </li>
      </ul>
    <?php echo $page ?>
    </div>
   </div> 
</div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->

<script src="<?php echo base_url() ?>assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="<?php echo base_url() ?>assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/lodash.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url() ?>assets/js/datatables.js" type="text/javascript"></script>
<!-- <script src="https://cdn.datatables.net/1.9.4/js/jquery.dataTables.js" type="text/javascript"></script> -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-timepicker/jquery.timepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-timepicker/lib/bootstrap-datepicker.js" type="text/javascript"></script>


<!-- JS MULTIPLE ULPOAD -->

<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?php echo base_url() ?>assets/plugins/jquery-upload/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<!-- blueimp Gallery script -->
<script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->

<script src="<?php echo base_url() ?>assets/plugins/jquery-upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo base_url() ?>assets/plugins/jquery-upload/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo base_url() ?>assets/plugins/jquery-upload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo base_url() ?>assets/plugins/jquery-upload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?php echo base_url() ?>assets/plugins/jquery-upload/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="<?php echo base_url() ?>assets/plugins/jquery-upload/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo base_url() ?>assets/plugins/jquery-upload/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo base_url() ?>assets/plugins/jquery-upload/js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="<?php echo base_url() ?>assets/plugins/jquery-upload/js/main.js"></script>


<!-- BEGIN CORE TEMPLATE JS -->


<script src="<?php echo base_url() ?>assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/core.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/chat.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/demo.js" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS -->
<!-- END JAVASCRIPTS -->

<!-- ONCANGE WILAYAH -->
<script type="text/javascript">
  function comboCPC(id,target,url) {
      c = $(id);
      <?php //echo "asas ". site_url('"+url+"');?>
        urlCountry = "<?php echo site_url('"+url+"');?>";
        console.log(urlCountry);
            var id = c.val();
            $.ajax({
              type: "POST",
              url: urlCountry+"/"+id,
        dataType:"json",
              success: function(json){
                $(target).find('option').remove();
                console.log(json);
                 $.each(json.rows, function(i, value) {
                  if (url =='ajax/getProvince') {
                      $(target).append($('<option>').text(value.province_title).attr('value', value.province_id));
                  } else if (url == 'ajax/getCity') {
                      $(target).append($('<option>').text(value.fcityname).attr('value', value.fcityid));
                  } else if (url == 'ajax/getDepartement'){
                      $(target).append($('<option>').text(value.departement_title).attr('value', value.departement_id));
                  }
            });
              }
            }); 
    }
</script>
<!-- END ONCANGE WILAYAH -->
</body>
</html>
