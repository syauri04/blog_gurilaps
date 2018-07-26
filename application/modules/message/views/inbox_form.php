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
                        <label class="form-label">Email</label>
                        <div class="controls">
                          <input type="text" name="email" class="form-control" value="<?php if(isset($email)){ echo urldecode($email); } ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Subject</label>
                        <div class="controls">
                          <input type="text" name="subject" class="form-control" value="<?php if(isset($data)){ echo $data->title; } ?>">
                        </div>
                      </div>

                      

                      <div class="form-group">
                        <label class="form-label">Content</label>
                       
                        <div class="controls">
                           <textarea id="summernote" name="content" placeholder="Enter text ..." class="form-control" rows="10"><?php if(isset($data)){ echo $data->content; } ?></textarea>
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

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
