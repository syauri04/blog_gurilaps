          <?php if($this->session->flashdata('notif')){ ?> 
    <div class="alert alert-<?php echo $this->session->flashdata('notif') ?>">
<button class="close" data-dismiss="alert"></button>
<?php echo $this->session->flashdata('notif') ?>:&nbsp;<?php echo $this->session->flashdata('msg') ?></div>
<?php } ?>
        <div class="row">
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                  
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <form enctype="multipart/form-data" method="post" action="<?php echo base_url() ?><?php echo $controller."/".$function?>_<?php if(isset($data)){echo"update";}else{echo"add";} ?>">
                <input type="hidden" name="id" value="<?php if(isset($data)){ echo $data->id; } ?>">
                <input type="hidden" name="controller" id="controller" value="<?php echo $controller ?>">
              <input type="hidden" name="method" value="<?php echo $function ?>" id="method">
                <div class="grid-body no-border">
                  <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-8">
                      <div class="form-group">
                        <label class="form-label">First Name</label>
                        <div class="controls">
                          <input type="text" required name="first_name" class="form-control" value="<?php if(isset($data)){ echo $data->first_name; } ?>">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="form-label">Last Name</label>
                        <div class="controls">
                          <input type="text" required name="last_name" class="form-control" value="<?php if(isset($data)){ echo $data->last_name; } ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Username</label>
                        <div class="controls">
                          <input type="text" required name="username" class="form-control" value="<?php if(isset($data)){ echo $data->username; } ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Email</label>
                        <div class="controls">
                          <input type="text" name="email" required class="form-control" value="<?php if(isset($data)){ echo $data->email; } ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Photo</label>
                        <div class="controls">
                          <input type="file" name="photo" class="form-control" value="<?php if(isset($data)){ echo $data->photo; } ?>">
                        </div>

                        <div class="box">
          <input type="file" name="photo" id="file-7" class="inputfile" accept="image/*" onchange="loadFile(event)" />
          <label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
        </div>

        <img id="output" class="ouput_image_input" src="<?php echo base_url() ?>assets/uploads/user-admin/<?php if($data->photo==''){echo"default.jpg";}else{echo $data->id."/".$data->photo;} ?>" />
        </div>

<div class="">
  <div class="text-center border-grey">
    <h4>Change Password</h4>

    <div class="text-left pad10">
      <div class="form-group">
                        <label class="form-label">Old Password</label>
                        <div class="controls">
                          <input type="password" name="old_password" class="form-control" value="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">New Password</label>
                        <div class="controls">
                          <input type="password" name="password" class="form-control" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Confirm Password</label>
                        <div class="controls">
                          <input type="password" name="cpassword" class="form-control">
                        </div>
                      </div>
    </div>
  </div>


</div>
                     
                        <div class="form-group">
                        <div class="controls">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
