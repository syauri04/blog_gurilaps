        <div class="row">
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                    <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <form enctype="multipart/form-data" method="post" action="<?php echo base_url() ?><?php echo $controller."/".$function?>_<?php if(isset($data)){echo"update";}else{echo"add";} ?>">
                  <input type="hidden" name="id" value="<?php if(isset($data)){ echo $data->id; } ?>">
                   <input type="hidden" name="date_created" value="<?php if(isset($data->date_created)){ echo $data->date_created; }else{ echo date("Y-m-d"); } ?>">
                  <input type="hidden" name="controller" id="controller" value="<?php echo $controller ?>">
                  <input type="hidden" name="method" value="<?php echo $function ?>" id="method">
                    <div class="grid-body no-border">
                      <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-8">
                          <div class="form-group">
                            <label class="form-label">Title</label>
                            <div class="controls">
                              <input type="text" name="title" class="form-control" value="<?php if(isset($data)){ echo $data->title; } ?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="form-label">Kategori</label>

                            <div class="controls">
                              <select required class="form-control" name="kategori">
                                  <option value="">--select Kategori--</option>
                                  <option <?php if($data and $data->id=='0'){echo"selected";} ?> value="0">none</option>
                                  <?php foreach ($kategori as $key) { ?>
                                  <option <?php if( $data and $key->id== $data->kategori){echo"selected";} ?> value="<?php echo $key->id ?>"><?php echo $key->title ?></option><?php } ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="form-label">Provinsi</label>
                            <div class="controls">
                                <select required class="form-control" name="Provinsi">
                                    <option value="">--select Provinsi--</option>
                                    <option <?php if($data and $data->id=='0'){echo"selected";} ?> value="0">none</option>
                                    <?php foreach ($provinsi as $key) { ?>
                                    <option <?php if( $data and $key->id== $data->provinsi){echo"selected";} ?> value="<?php echo $key->id ?>"><?php echo $key->name ?></option><?php } ?>
                                </select>
                            </div>
                          </div>

                          <div class = "form-group">
                              <label class="form-label">Kabupaten/Kota</label>
                              <select class="form-control" id="kabupaten"> </select>
                          </div>

                          <div class = "form-group">
                              <label class="form-label">Kecamatan</label>
                              <select class="form-control" id="kecamatan"> </select>
                          </div>                                                    

                          <div class = "form-group">
                              <label class="form-label">Kelurahan</label>
                              <select class="form-control" id="kelurahan"> </select>
                          </div>                                                    

                          <div class="form-group">
                              <label class="form-label">Image Header</label>
                              <div class="box">
                                  <input type="file" name="images" id="file-7" class="inputfile" accept="image/*" onchange="loadFile(event)" />
                                  <label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
                              </div>
                              <img id="output" class="ouput_image_input" <?php if($data){ ?> src="<?php echo base_url() ?>assets/uploads/directory-page/<?php if($data->images==''){echo"default.jpg";}else{echo $data->id."/".$data->images;} }?> " />
                          </div>
                          <div class="form-group">
                            <label class="form-label">Content 01</label>
                            <div class="summernote">
                              <textarea id="summernote01" name="summernote01" placeholder="Enter text ..." class="form-control" rows="10"><?php if(isset($data)){ echo $data->content; } ?>
                              </textarea>
                            </div>
                          </div>

                          <div class="form-group">
                              <label class="form-label">Image Detail 1</label>
                              <div class="box">
                                  <input type="file" name="images01" id="file-7" class="inputfile" accept="image/*" onchange="loadFile(event)" />
                                  <label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
                              </div>
                              <img id="output" class="ouput_image_input" <?php if($data){ ?> src="<?php echo base_url() ?>assets/uploads/directory-page/<?php if($data->images==''){echo"default.jpg";}else{echo $data->id."/".$data->images;} }?> " />
                          </div>

                          <div class="form-group">
                             <label class="form-label">Content 02</label>
                            <div class="summernote">
                              <textarea id="summernote02" name="summernote02" placeholder="Enter text ..." class="form-control" rows="10"><?php if(isset($data)){ echo $data->content; } ?>
                              </textarea>
                            </div>
                          </div>

                          <div class="form-group">
                              <label class="form-label">Image Detail 2</label>
                              <div class="box">
                                  <input type="file" name="images01" id="file-7" class="inputfile" accept="image/*" onchange="loadFile(event)" />
                                  <label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
                              </div>
                              <img id="output" class="ouput_image_input" <?php if($data){ ?> src="<?php echo base_url() ?>assets/uploads/directory-page/<?php if($data->images==''){echo"default.jpg";}else{echo $data->id."/".$data->images;} }?> " />
                          </div>

                          <div class="form-group">
                             <label class="form-label">Content 03</label>
                            <div class="summernote">
                              <textarea id="summernote03" name="summernote03" placeholder="Enter text ..." class="form-control" rows="10"><?php if(isset($data)){ echo $data->content; } ?>
                              </textarea>
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
        x</div>

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
<script type="text/javascript"> 
$(document).ready(function() { 
    $('.summernote').summernote();
    $("#provinsi").append('<option value="">Pilih</option>'); 
    $("#kabupaten").html(''); 
    $("#kecamatan").html(''); 
    $("#kelurahan").html(''); 
    $("#kabupaten").append('<option value="">Pilih</option>'); 
    $("#kecamatan").append('<option value="">Pilih</option>'); 
    $("#kelurahan").append('<option value="">Pilih</option>'); 
    url = 'get_provinsi.php'; 
    $.ajax({ url: url, 
        type: 'GET', 
        dataType: 'json', 
        success: function(result) { 
        for (var i = 0; i < result.length; i++) 
          $("#provinsi").append('<option value="' + result[i].id_prov + '">' + result[i].nama + '</option>'); 
    } 
}); 
}); 
$("#provinsi").change(function(){ 
var id_prov = $("#provinsi").val(); 
var url = 'get_kabupaten.php?id_prov=' + id_prov; 
$("#kabupaten").html(''); $("#kecamatan").html(''); 
$("#kelurahan").html(''); $("#kabupaten").append('<option value="">Pilih</option>'); 
$("#kecamatan").append('<option value="">Pilih</option>'); 
$("#kelurahan").append('<option value="">Pilih</option>'); 
$.ajax({ url : url, 
type: 'GET', 
dataType : 'json', 
success : function(result){ 
for(var i = 0; i < result.length; i++) 
$("#kabupaten").append('<option value="'+ result[i].id_kab +'">' + result[i].nama + '</option>'); 
} 
});  
}); 
$("#kabupaten").change(function(){ 
var id_kab = $("#kabupaten").val(); 
var url = 'get_kecamatan.php?id_kab=' + id_kab; 
$("#kecamatan").html(''); $("#kelurahan").html(''); 
$("#kecamatan").append('<option value="">Pilih</option>'); 
$("#kelurahan").append('<option value="">Pilih</option>'); 
$.ajax({ url : url, 
type: 'GET', 
dataType : 'json', 
success : function(result){ 
for(var i = 0; i < result.length; i++) 
$("#kecamatan").append('<option value="'+ result[i].id_kec +'">' + result[i].nama + '</option>'); 
} 
});  
}); 
$("#kecamatan").change(function(){ 
var id_kec = $("#kecamatan").val(); 
var url = 'get_kelurahan.php?id_kec=' + id_kec; $("#kelurahan").html(''); 
$("#kelurahan").append('<option value="">Pilih</option>'); 
$.ajax({ url : url, 
type: 'GET', 
dataType : 'json', 
success : function(result){ 
for(var i = 0; i < result.length; i++) 
$("#kelurahan").append('<option value="'+ result[i].id_kel +'">' + result[i].nama + '</option>'); 
} 
});  
}); 
</script>