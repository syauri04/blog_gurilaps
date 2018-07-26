     
    <?php if($this->session->flashdata('notif')){ ?> 
    <div class="alert alert-<?php echo $this->session->flashdata('notif') ?>">
<button class="close" data-dismiss="alert"></button>
<?php echo $this->session->flashdata('notif') ?>:&nbsp;<?php echo $this->session->flashdata('msg') ?></div>
<?php } ?>

     <div class="row-fluid">
        <div class="span12">
          <div class="grid simple ">
            <div class="grid-title">
              <h4><span class="semi-bold">List <?php echo $method ?></span></h4>
              <input type="hidden" name="base_url" value="<?php echo base_url() ?>" id="base_url">
              <input type="hidden" name="controller" id="controller" value="<?php echo $controller ?>">
              <input type="hidden" name="method" value="<?php echo $function ?>" id="method">
              <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" class="reload"></a> </div>
            </div>
            <div class="grid-body ">
            <form action="<?php echo base_url().$controller.'/'.$function.'_update' ?>" method="post" >
               <div class="form-group">
               <div class="row">
                 <div class="col-md-2"><label class="form-label">Group User : </label></div>
                 <div class="col-md-6 ">
                 <div class="controls">
                        <select name="group_id" id="group_id">
                          <option value="">--select group user--</option>
                          <?php foreach ($group as $key) { ?>
                        <option value="<?php echo $key->id ?>"><?php echo $key->name_group ?></option>
                        <?php  } ?>
                        </select>
                  </div></div>
               </div>
                      </div>
              <div class="form-group">
             <div id="content_ajax" class="border-line-top"></div>
             
            </div>
            <div class="form-group" id="button-access">
<div class="controls">
<button class="btn btn-primary" type="submit">Submit</button>
</div>
</div>
            </form>
            </div>
          </div>
        </div>
      </div>

<script src="<?php echo base_url() ?>assets/js/accsess.js" type="text/javascript"></script>