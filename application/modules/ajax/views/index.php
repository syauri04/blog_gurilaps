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

<link rel="icon" type="image/png" href="<?php echo base_url()."assets/uploads/settings/favicon.png" ?>" sizes="16x16">
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="<?php echo base_url() ?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="<?php echo base_url() ?>assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->
<!-- BEGIN CSS TEMPLATE -->
<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-body no-top lazy" style="background: #22262e!important;"> 
<div class="container">

  <div class="row login-container animated fadeInUp"> 
        <?php if($this->session->flashdata('notif')){ ?> 
        <div class="col-md-7 col-md-offset-2  white no-padding">
    <div class="alert alert-<?php echo $this->session->flashdata('notif') ?>">
<button class="close" data-dismiss="alert"></button>
<?php echo $this->session->flashdata('notif') ?>:&nbsp;<?php echo $this->session->flashdata('msg') ?></div>
</div>
<br>
<?php } ?> 
        <div class="col-md-7 col-md-offset-2 tiles white no-padding">
     <div class="p-t-30 p-l-40 p-b-20 xs-p-t-10 xs-p-l-10 xs-p-b-10 text-center"> 
         <img src="<?php echo base_url() ?>assets/uploads/settings/<?php echo $this->appearance->logo ?>" width="50%" >
        </div>
    <div class="tiles grey p-t-20 p-b-20 text-black">
      <form id="frm_login" class="animated fadeIn" action="<?php echo base_url() ?>admin/do_login" method="post">
      <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>">   
                    <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                      <div class="col-md-6 col-sm-6 ">
                        <input required name="username" id="login_username" type="text"  class="form-control" placeholder="Username">
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <input name="password" required id="login_pass" type="password"  class="form-control" placeholder="Password">
                      </div>
                    </div>
        <div class="row p-t-10 m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
          <div class="control-group  col-md-10">
          <div class="checkbox checkbox check-success"> 
            <button type="submit" class="btn btn-primary btn-cons" id="login_toggle">Login</button>
          <a href="#">Trouble login in?</a>&nbsp;&nbsp;
            <input type="checkbox" id="checkbox1" value="1">
            <label for="checkbox1">Keep me reminded </label>

          </div>
          </div>
          </div>
        </form>
    </div>   
      </div>   
  </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="<?php echo base_url() ?>assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-lazyload/jquery.lazyload.min.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<!-- END CORE TEMPLATE JS -->
</body>

</html>