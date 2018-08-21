<style type="text/css">
  #map{ height: 400px; margin-bottom: 30px; }
  #pac-input{top: 7px !Important; width: 40%;}
  .input-upload{display: block !Important;}
}
</style>
        <div class="row">
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                    <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <form enctype="multipart/form-data" method="post" action="<?php echo base_url() ?><?php echo $controller."/".$function?>_<?php if(isset($data)){echo"update";}else{echo"add";} ?>">
                  <input type="hidden" name="id" value="<?php if(isset($data)){ echo $data->id; } ?>">
                  <input type="hidden" name="type_menu" value="article">
                  <input type="hidden" name="controller" id="controller" value="<?php echo $controller ?>">
                  <input type="hidden" name="method" value="<?php echo $function ?>" id="method">
                    <div class="grid-body no-border">
                      <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-8">
                          <div class="form-group">
                            <label class="form-label">Title</label>
                            <div class="controls">
                              <input type="text" required name="title" class="form-control" value="<?php if(isset($data)){ echo $data->title; } ?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="form-label">Summary</label>
                            <div class="controls">
                             <textarea class="form-control" name="summary" style="min-height: 150px;"><?php if(isset($data)){ echo $data->summary; } ?></textarea>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="form-label">Category</label>

                            <div class="controls">
                              <select required class="form-control" name="category">
                                  <option value="">--select Category--</option>
                                  <!-- <option <?php if($data and $data->id=='0'){echo"selected";} ?> value="0">none</option> -->
                                  <?php foreach ($kategori as $key) { ?>
                                  <option <?php if( $data and $key->id== $data->category){echo"selected";} ?> value="<?php echo $key->id ?>"><?php echo $key->title ?></option><?php } ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="form-label">Provinsi</label>
                            <div class="controls">
                              <select class="form-control" required name="id_provinces" id="id_provinces" onchange="comboCPC('#id_provinces','#id_regencies','ajax/getCity')">
                                  <option value=""> - select - </option>
                                  <?php
                                    if(count($province)>0){
                                      foreach($province as $r){
                                        //debugCode($val);
                                        $t = isset($data->id_provinces)?$data->id_provinces:"";
                                        $s = ($r->fprovinceid==$t)?"selected='selected'":'';
                                        echo "<option value='".$r->fprovinceid."' $s >".$r->fprovincename."</option>";
                                      }
                                    } 
                                  ?>
                              </select>

                              
                            </div>
                          </div>

                       

                          <div class = "form-group">
                              <label class="form-label">Kabupaten/Kota</label>
                              <select class="form-control" required name="id_regencies" id="id_regencies"> 
                                  <option value=""> - select - </option>
                                  <?php

                                    if(count($regencies)>0){
                                      foreach($regencies as $r){
                                        //debugCode($val);
                                        $t = isset($data->id_regencies)?$data->id_regencies:"";
                                        $s = ($r->fcityid==$t)?"selected='selected'":'';
                                        echo "<option value='".$r->fcityid."' $s >".$r->fcityname."</option>";
                                      }
                                    } 
                                  ?>
                              </select>
                          </div>

                          <!-- <div class = "form-group">
                              <label class="form-label">Kecamatan</label>
                              <select class="form-control" name="kecamatan" id="kecamatan"> </select>
                          </div>                                                    

                          <div class = "form-group">
                              <label class="form-label">Kelurahan</label>
                              <select class="form-control" name="kelurahan" id="kelurahan"> </select>
                          </div>                                                    
 -->
                          <div class="form-group">
                              <label class="form-label">Image Header</label>
                              <div class="box">
                                  <input type="file" required name="images" id="file-7" class="inputfile" accept="image/*" onchange="loadFile(event)" />
                                  <label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
                              </div>
                              <img id="output" class="ouput_image_input" <?php if($picture){ ?> src="<?php echo base_url() ?>assets/uploads/article/<?php if($picture->name==''){echo"default.jpg";}else{echo $picture->id_content."/".$picture->name;} }?> " />
                          </div>


                          <div class="form-group">
                            <label class="form-label">Content</label>
                            <div class="controls">
                              <textarea id="summernote" required name="content_1" placeholder="Enter text ..." class="form-control" rows="10"><?php if(isset($data)){ echo $data->content_1; } ?>
                              </textarea>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="form-label">Images Gallery 2 (Dua)</label>
                            <!-- <input type="hidden" name="posisi_gambar" class="form-control" value="1"> -->

                           
                            <?php 
                              if(isset($listpicture) && count($listpicture)>0) { 
                            ?>
                                <table class="table table-striped">
                                  <tbody class="files">
                                    <tr>
                                      <th>Preview</th>
                                     
                                      <th>Action</th>
                                    </tr>
                                   
                                    <?php    
                                        foreach ($listpicture as $key => $picture) {
                                          // debugCode($picture->name);
                                            if (isset($picture->id) && !empty($picture->name)){ 
                                    ?>

                                            <tr>
                                              <td>
                                                  <span class="preview">
                                                          <img src="<?=isset($picture->name)?base_url().'assets/uploads/article/thumbs/'.$picture->name:'' ?>">
                                                          <input type="hidden" name="img_name[]" value="<?=isset($picture->name)?$picture->name:''?>" >
                                                  </span>
                                              </td>
                                          
                                              <td>
                                                      <button class="btn btn-danger remove_uploded" >
                                                          <i class="glyphicon glyphicon-trash"></i>
                                                          <span>Delete</span>
                                                      </button>
                                              </td>
                                            </tr>

                                    <?php 
                                          } 
                                        } 

                                    ?>
                                  </tbody>
                                </table>
                                <hr>
                            <?php } ?>        

                            <div class="controls">
                               <!-- The file upload form  used as target for the file upload widget -->
                                <fieldset id="fileupload" class="fileupload"  data-upload-template-id="template-upload-1" data-download-template-id="template-download-1" action="ablums/do_uplod" method="POST" enctype="multipart/form-data"  >
                                  <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                  <div class="row fileupload-buttonbar">
                                    <div class="col-lg-12">
                                      <!-- The fileinput-button span is used to style the file input field as button -->
                                      <span class="btn btn-success fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Add files...</span>
                                        <input type="file" class="input-upload" name="userfile" multiple>
                                      </span>
                                      <button type="submit" class="btn btn-primary start">
                                        <i class="glyphicon glyphicon-upload"></i>
                                        <span>Upload All</span>
                                      </button>
                                      <button type="reset" class="btn btn-warning cancel">
                                        <i class="glyphicon glyphicon-ban-circle"></i>
                                        <span>Cancel upload</span>
                                      </button>
                                      <button type="button" class="btn btn-danger delete">
                                        <i class="glyphicon glyphicon-trash"></i>
                                        <span>Delete</span>
                                      </button>
                                      <input type="checkbox" class="toggle">
                                      <!-- The global file processing state -->
                                      <span class="fileupload-process"></span>
                                    </div>
                                    <!-- The global progress state -->
                                    <div class="col-lg-5 fileupload-progress fade">
                                      <!-- The global progress bar -->
                                      <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                      </div>
                                      <!-- The extended global progress state -->
                                      <div class="progress-extended">&nbsp;</div>
                                    </div>
                                  </div>
                                  <!-- The table listing the files available for upload/download -->
                                  <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                                </fieldset>
                                <!-- The blueimp Gallery widget -->
                                <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
                                    <div class="slides"></div>
                                    <h3 class="title"></h3>
                                    <a class="prev">‹</a>
                                    <a class="next">›</a>
                                    <a class="close">×</a>
                                    <a class="play-pause"></a>
                                    <ol class="indicator"></ol>
                                </div>
                                <!-- The template to display files available for upload -->
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="form-label">Content 2 (Dua)</label> 
                                                        
                            <div class="controls">
                              <textarea id="summernote2" required name="content_2" placeholder="Enter text ..." class="form-control" rows="10"><?php if(isset($data)){ echo $data->content_2; } ?></textarea>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="form-label">Images Gallery 3 (Tiga)</label>
                            <!-- <input type="hidden" name="posisi_gambar" class="form-control" value="1"> -->
                            <?php 
                              if(isset($listpicture2) && count($listpicture2)>0) { 
                            ?>
                                <table class="table table-striped">
                                  <tbody class="files">
                                    <tr>
                                      <th>Preview</th>
                                     
                                      <th>Action</th>
                                    </tr>
                                   
                                    <?php    
                                        foreach ($listpicture2 as $key2 => $picture2) {
                                          // debugCode($picture->name);
                                            if (isset($picture2->id) && !empty($picture2->name)){ 
                                    ?>

                                            <tr>
                                              <td>
                                                  <span class="preview">
                                                          <img src="<?=isset($picture->name)?base_url().'assets/uploads/article/thumbs/'.$picture2->name:'' ?>">
                                                          <input type="hidden" name="img_name2[]" value="<?=isset($picture2->name)?$picture2->name:''?>" >
                                                  </span>
                                              </td>
                                          
                                              <td>
                                                      <button class="btn btn-danger remove_uploded" >
                                                          <i class="glyphicon glyphicon-trash"></i>
                                                          <span>Delete</span>
                                                      </button>
                                              </td>
                                            </tr>

                                    <?php 
                                          } 
                                        } 

                                    ?>
                                  </tbody>
                                </table>
                                <hr>
                            <?php } ?>  
                                  

                            <div class="controls">
                               <!-- The file upload form used as target for the file upload widget -->
                                <fieldset id="fileupload" class="fileupload" data-upload-template-id="template-upload-2" data-download-template-id="template-download-2" action="ablums/do_uplod" method="POST" enctype="multipart/form-data" >
                                  <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                  <div class="row fileupload-buttonbar">
                                    <div class="col-lg-12">
                                      <!-- The fileinput-button span is used to style the file input field as button -->
                                      <span class="btn btn-success fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Add files...</span>
                                        <input type="file" class="input-upload" name="userfile" multiple>
                                      </span>
                                      <button type="submit" class="btn btn-primary start">
                                        <i class="glyphicon glyphicon-upload"></i>
                                        <span>Upload All</span>
                                      </button>
                                      <button type="reset" class="btn btn-warning cancel">
                                        <i class="glyphicon glyphicon-ban-circle"></i>
                                        <span>Cancel upload</span>
                                      </button>
                                      <button type="button" class="btn btn-danger delete">
                                        <i class="glyphicon glyphicon-trash"></i>
                                        <span>Delete</span>
                                      </button>
                                      <input type="checkbox" class="toggle">
                                      <!-- The global file processing state -->
                                      <span class="fileupload-process"></span>
                                    </div>
                                    <!-- The global progress state -->
                                    <div class="col-lg-5 fileupload-progress fade">
                                      <!-- The global progress bar -->
                                      <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                      </div>
                                      <!-- The extended global progress state -->
                                      <div class="progress-extended">&nbsp;</div>
                                    </div>
                                  </div>
                                  <!-- The table listing the files available for upload/download -->
                                  <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                                </fieldset>
                                <!-- The blueimp Gallery widget -->
                                <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
                                    <div class="slides"></div>
                                    <h3 class="title"></h3>
                                    <a class="prev">‹</a>
                                    <a class="next">›</a>
                                    <a class="close">×</a>
                                    <a class="play-pause"></a>
                                    <ol class="indicator"></ol>
                                </div>
                                <!-- The template to display files available for upload -->
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="form-label">Content 3 (Tiga)</label>                       
                            <div class="controls">
                              <textarea id="summernote3" required name="content_3" placeholder="Enter text ..." class="form-control" rows="10"><?php if(isset($data)){ echo $data->content_3; } ?></textarea>
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


<!-- The template to display files available for upload -->
<script id="template-upload-1" type="text/x-tmpl">

{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p>{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download-1" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
<tr class="template-download fade">

        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                    <input type="hidden" name="img_name[]" value="{%=file.name%}" >
                {% } %}
            </span>
        </td>
        <td>
            <div class="form-group">
                {% if (file.url) { %}
                    <input class="form-control" type="hidden" placeholder="Enter Image Title" name="img_title[]" />
                    <input class="form-control" type="hidden" placeholder="Enter Image Title" name="posisi_gambar[]" value="2" />
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </div>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
   </tr>
{% } %}

</script>

<!-- The template to display files available for upload -->
<script id="template-upload-2" type="text/x-tmpl">

{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p>{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download-2" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
<tr class="template-download fade">

        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                    <input type="hidden" name="img_name2[]" value="{%=file.name%}" >
                {% } %}
            </span>
        </td>
        <td>
            <div class="form-group">
                {% if (file.url) { %}
                    <input class="form-control" type="hidden" placeholder="Enter Image Title" name="img_title2[]" />
                    <input class="form-control" type="hidden" placeholder="Enter Image Title" name="posisi_gambar2[]" value="3" />
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </div>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
   </tr>
{% } %}

</script>

<script  type="text/javascript">

  $(function () {

      'use strict';

      // Initialize the jQuery File Upload widget:
    $('.fileupload').each(function () {
      console.log($(this));
        $(this).fileupload({
            dropZone: $(this)
        });

        $(this).fileupload({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: "<?php echo base_url() ?><?php echo $controller."/do_upload/article"?>"
        });

        // Load existing files:
        $(this).addClass('fileupload-processing');
        $.ajax({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: $(this).fileupload('option', 'url'),
            dataType: 'json',
            context: $(this)[0]
        }).always(function () {
            $(this).removeClass('fileupload-processing');
        }).done(function (result) {
            $(this).fileupload('option', 'done')
                .call(this, $.Event('done'), {result: result});
        });

    });

      // $('#fileupload').fileupload({

      //     // Uncomment the following to send cross-domain cookies:
      //     //xhrFields: {withCredentials: true},
      //     url: "<?php echo base_url() ?><?php echo $controller."/do_upload/article"?>"
      // });

      //     // console.log($('#fileupload').fileupload('option', 'url'));    
      //     $('#fileupload').addClass('fileupload-processing');
      //     $.ajax({
      //         // Uncomment the following to send cross-domain cookies:
      //         //xhrFields: {withCredentials: true},
      //         url: $('#fileupload').fileupload('option', 'url'),
      //         dataType: 'json',
      //         context: $('#fileupload')[0]
      //     }).always(function () {
      //       // console.log('always');
      //         $(this).removeClass('fileupload-processing');
      //     }).done(function (result) {
      //       // console.log(result);
      //         $(this).fileupload('option', 'done')
      //             .call(this, $.Event('done'), {result: result});
      //     });

  });


  var loadFeatured = function(event) {
      var output = document.getElementById('featured_img');
      output.src = URL.createObjectURL(event.target.files[0]);
    };


  $(".remove_uploded").click(function() {
      $(this).parent().parent().remove();
  });

</script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>

<script type="text/javascript"> 
  $(document).ready(function() {
    $('#summernote2').summernote();
    $('#summernote3').summernote();
    $('#time_start').timepicker({ 'timeFormat': 'H:i' });
    $('#time_end').timepicker({ 'timeFormat': 'H:i' });
  });

</script>
