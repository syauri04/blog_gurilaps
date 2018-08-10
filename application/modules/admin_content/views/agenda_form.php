<div class="row">
  <div class="col-md-12">
    <div class="grid simple">
      <div class="grid-title no-border">
        <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> 
        </div>
      </div>
      <form enctype="multipart/form-data" method="post" action="<?php echo base_url() ?><?php echo $controller."/".$function?>_<?php if(isset($data)){echo"update";}else{echo"add";} ?>">
        <input type="hidden" name="id" value="<?php if(isset($data)){ echo $data->id; } ?>">
        <input type="hidden" name="controller" id="controller" value="<?php echo $controller ?>">
        <input type="hidden" name="method" value="<?php echo $function ?>" id="method">
        <div class="grid-body no-border">
          <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-8">
              <div class="form-group">
                <label class="form-label">Title</label>
                <div class="controls">
                  <input type="text" name="title" required class="form-control" value="<?php if(isset($data)){ echo $data->title; } ?>">
                </div>
              </div>

    <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Add files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple>
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Catatan</h3>
        </div>
        <div class="panel-body">
            <ul>
                <li>The maximum file size for uploads in this demo is <strong>999 KB</strong> (default file size is unlimited).</li>
                <li>Only image files (<strong>JPG, GIF, PNG</strong>) are allowed in this demo (by default there is no file type restriction).</li>
                <li>Uploaded files will be deleted automatically after <strong>5 minutes or less</strong> (demo files are stored in memory).</li>
                <li>You can <strong>drag &amp; drop</strong> files from your desktop on this webpage (see <a href="https://github.com/blueimp/jQuery-File-Upload/wiki/Browser-support">Browser support</a>).</li>
                <li>Please refer to the <a href="https://github.com/blueimp/jQuery-File-Upload">project website</a> and <a href="https://github.com/blueimp/jQuery-File-Upload/wiki">documentation</a> for more information.</li>
                <li>Built with the <a href="http://getbootstrap.com/">Bootstrap</a> CSS framework and Icons from <a href="http://glyphicons.com/">Glyphicons</a>.</li>
            </ul>
        </div>
    </div>


              <div class="form-group">
                <label class="form-label">Images</label>
                <div class="box">
                  <input type="file" name="images" id="file-7" class="inputfile" accept="image/*" onchange="loadFile(event)" />
                  <label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
                </div>
                <img id="output" class="ouput_image_input" <?php if($data){ ?> src="<?php echo base_url() ?>assets/uploads/static-page/<?php if($data->images==''){echo"default.jpg";}else{echo $data->id."/".$data->images;} }?> " />
              </div>
              <div class="form-group">
                <label class="form-label">Summary</label>                       
                <div class="summernote">
                  <textarea id="summernote1" name="summary" placeholder="Enter text ..." class="form-control" rows="10"><?php if(isset($data)){ echo $data->summary; } ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label">Description</label>                       
                <div class="summernote">
                  <textarea id="summernote2" name="description" placeholder="Enter text ..." class="form-control" rows="10"><?php if(isset($data)){ echo $data->description; } ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label">Date Start</label>
                <div class="controls">
                  <input type="text" name="date_start" class="datepicker form-control" required value="<?php if(isset($data)){ echo $data->date_start; } ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="form-label">Date End</label>
                <div class="controls">
                  <input type="text" name="date_end" class="datepicker form-control" required id="" value="<?php if(isset($data)){ echo $data->date_end; } ?>">
                </div>
              </div>
              <div class="form-group ">
                <label class="form-label">Time Start</label>
                <div class="controls">
                  <input type="text" id="time_start" name="time_start" class="form-control" required value="<?php if(isset($data)){ echo $data->time_start; } ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="form-label">Time End</label>
                <div class="controls">
                  <input type="text" name="time_end" class="form-control" required id="time_end" value="<?php if(isset($data)){ echo $data->time_end; } ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="form-label">Lokasi Acara</label>                       
                <div class="controls">
                  <textarea id="location" name="location" placeholder="Enter text ..." class="form-control" rows="6"><?php if(isset($data)){ echo $data->location; } ?></textarea>
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
  $('.summernote').summernote();
  $('#time_start').timepicker({ 'timeFormat': 'H:i' });
  $('#time_end').timepicker({ 'timeFormat': 'H:i' });
});

</script>