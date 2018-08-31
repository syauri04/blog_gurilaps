        <div class="row">
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">        
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <form enctype="multipart/form-data" method="post" action="<?php echo base_url() ?><?php echo $controller."/".$function?>_<?php if(isset($data)){echo"update";}else{echo"add";} ?>">
                  <input type="hidden" name="fcityid" value="<?php if(isset($data)){ echo $data->fcityid; } ?>">
                  <input type="hidden" name="fcitystatus" value="<?php if(isset($data)){ echo $data->fcitystatus; } ?>">
                  <input type="hidden" name="fcountrycode" value="<?php if(isset($data)){ echo $data->fcountrycode; } ?>">
                  <input type="hidden" name="fprovinceid" value="<?php if(isset($data)){ echo $data->fprovinceid; } ?>">
                  <input type="hidden" name="controller" id="controller" value="<?php echo $controller ?>">
                  <input type="hidden" name="method" value="<?php echo $function ?>" id="method">
                    <div class="grid-body no-border">
                      <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-8">
                          <div class="form-group">
                            <label class="form-label">Kota/kabupaten</label>
                            <div class="controls">
                              <input type="text" readonly="readonly" name="fcityname" class="form-control" value="<?php if(isset($data)){ echo $data->fcityname; } ?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="form-label">Images Home</label>
                            <div class="box">
                              <input type="file" name="image" value="<?php if(isset($data)){ echo $data->image; } ?>" id="file-7" class="inputfile" accept="image/*" onchange="loadFile(event)" />
                              <label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
                            </div>
                            <img id="output" class="ouput_image_input" <?php if($data){ ?> src="<?php echo base_url() ?>assets/uploads/kabupaten/<?php if($data->image==''){echo"default.png";}else{echo $data->fcityid."/".$data->image;} }?> " />
                          </div>

                          <div class="form-group">
                            <label class="form-label">Images Detail</label>
                            <div class="box">
                              <input type="file" name="image_detail" value="<?php if(isset($data)){ echo $data->image_detail; } ?>" id="file-1" class="inputfile" accept="image/*" onchange="loadFile2(event)" />
                              <label for="file-1"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
                            </div>
                            <img id="output2" class="ouput_image_input" <?php if($data){ ?> src="<?php echo base_url() ?>assets/uploads/kabupaten/<?php if($data->image_detail==''){echo"default.png";}else{echo $data->fcityid."/".$data->image_detail;} }?> " />
                          </div>

                          <div class="form-group">
                            <label class="form-label">Summary Images Header</label>

                            <div class="controls">
                              <textarea name="summary" placeholder="Enter text ..." class="form-control" rows="10"><?php if(isset($data)){ echo $data->summary; } ?></textarea>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="form-label">Content</label>                       
                            <div class="controls">
                              <textarea id="summernote2" name="content" placeholder="Enter text ..." class="form-control" rows="10"><?php if(isset($data)){ echo $data->content; } ?></textarea>
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

<script type="text/javascript"> 
$(document).ready(function() {
  $('#summernote2').summernote();
  // $('#time_start').timepicker({ 'timeFormat': 'H:i' });
  // $('#time_end').timepicker({ 'timeFormat': 'H:i' });
});

</script>