<style type="text/css">
  #map{ height: 400px; margin-bottom: 30px; }
  #pac-input{top: 5px !Important; width: 41%;}
  .input-upload{display: block !Important;}
}
</style>

<div class="row">
  <div class="col-md-12">
    <div class="grid simple">
      <div class="grid-title no-border">
        <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> 
        </div>
      </div>
      <form  enctype="multipart/form-data" method="post" action="<?php echo base_url() ?><?php echo $controller."/".$function?>_<?php if(isset($data)){echo"update";}else{echo"add";} ?>">
        <input type="hidden" name="id" value="<?php if(isset($data)){ echo $data->id; } ?>">
        <input type="hidden" name="type_menu" value="agenda">
        <input type="hidden" name="date_created" value="<?php if(isset($data->date_created)){ echo $data->date_created; }else{ echo date("Y-m-d"); } ?>">
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

              <div class="form-group">
                <label class="form-label">Image</label>
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
                            $n=1;   
                            foreach ($listpicture as $key => $picture) {
                              // debugCode($picture->name);
                                if (isset($picture->id) && !empty($picture->name)){ 
                        ?>

                                <tr>
                                  <td>
                                      <span class="preview">
                                              <img src="<?=isset($picture->name)?base_url().'assets/uploads/agenda/thumbs/'.$picture->name:'' ?>">
                                              <input type="hidden" id="name_<?php echo $n; ?>" name="" value="<?=isset($picture->name)?$picture->name:''?>" >
                                              <input type="hidden" id="id_<?php echo $n ?>" name="id_pic" value="<?=isset($picture->id)?$picture->id:''?>">
                                      
                                      </span>
                                  </td>
                              
                                  <td>
                                          <a href="" id="de" onclick="delImage('#id_<?php echo $n; ?>','#name_<?php echo $n;  ?>','agenda')" class="btn btn-danger" >
                                              <i class="glyphicon glyphicon-trash"></i>
                                              <span>Delete</span>
                                          </a>
                                          <!-- <a href="<?php echo base_url(). $controller; ?>/delete_picture/<?php echo 'agenda-'.$picture->id.'/'.$picture->name; ?>" class="btn btn-danger remove_uploded" >
                                              <i class="glyphicon glyphicon-trash"></i>
                                              <span>Delete</span>
                                          </a> -->
                                  </td>
                                </tr>

                        <?php 
                              } 
                              $n++;
                            } 

                        ?>
                      </tbody>
                    </table>
                    <hr>
                <?php } ?>        

                <div class="controls">
                   <!-- The file upload form used as target for the file upload widget -->
                    <fieldset id="fileupload" action="ablums/do_uplodfdsfad" method="POST" enctype="multipart/form-data">
                      <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                      <div class="row fileupload-buttonbar">
                        <div class="col-lg-12">
                          <!-- The fileinput-button span is used to style the file input field as button -->
                          <span class="btn btn-success fileinput-button">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Add files...</span>
                            <input type="file" class="input-upload" name="userfile" multiple>
                          </span>
                          <!-- <button type="submit" class="btn btn-primary start">
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
                          <input type="checkbox" class="toggle">-->
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
             
 <!-- 
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
              </div> -->


              <!-- <div class="form-group">
                <label class="form-label">Images</label>
                <div class="box">
                  <input type="file" name="images" id="file-7" class="inputfile" accept="image/*" onchange="loadFile(event)" />
                  <label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
                </div>
                <img id="output" class="ouput_image_input" <?php if($data){ ?> src="<?php echo base_url() ?>assets/uploads/static-page/<?php if($data->images==''){echo"default.jpg";}else{echo $data->id."/".$data->images;} }?> " />
              
              </div> -->



              <div class="form-group">
                <label class="form-label">Summary</label>                       
                <div class="controls">
                  <textarea name="summary" required="required" placeholder="Enter text ..." class="form-control" style="height: 120px" ><?php if(isset($data)){ echo $data->summary; } ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label">Description</label>                       
                <div class="controls">
                  <textarea id="summernote2" required="required" name="content_1" placeholder="Enter text ..." class="form-control" rows="10"><?php if(isset($data)){ echo $data->content_1; } ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label">Date Start</label>
                <div class="controls">
                  <input type="text" name="date_start" required="required" class="datepicker form-control" required value="<?php if(isset($data)){ echo $data->date_start; } ?>">
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
                  <input type="text" id="time_start" required="required" name="time_start" class="form-control" required value="<?php if(isset($data)){ echo $data->time_start; } ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="form-label">Time End</label>
                <div class="controls">
                  <input type="text" name="time_end" required="required" class="form-control" required id="time_end" value="<?php if(isset($data)){ echo $data->time_end; } ?>">
                </div>
              </div>
              <!-- <div class="form-group">
                <label class="form-label">Lokasi Acara</label>                       
                <div class="controls">
                  <textarea id="location" name="location" placeholder="Enter text ..." class="form-control" rows="6"><?php if(isset($data)){ echo $data->location; } ?></textarea>
                </div>
              </div> -->

              <div class="form-group">
                 <label class="form-label">Lokasi Acara</label> <br>
                  <input type="text" readonly="readonly"  placeholder="Latitude" id="lat" name="lat_map" value="<?php if(isset($data)){ echo $data->lat_map; } ?>">
                  <input type="text" readonly="readonly"  placeholder="langtitude" id="lang" name="long_map" value="<?php if(isset($data)){ echo $data->long_map; } ?>">
                  <input type="text" readonly="readonly"  placeholder="Location" id="loc" name="location"  value="<?php if(isset($data)){ echo $data->location; } ?>">
                 
                 <div class="controls">
                    <label> *Search Location & Click Area on Map</label>
                  
                    
                 
                      <input id="pac-input" class="controls" name="location" type="text" placeholder="Search Box">
                      <div id="map"></div>
                       
                 </div>
                
              <!--     <input id="pac-input" class="controls" type="text" placeholder="Enter a location">
                  <div id="map"></div>
                  <div id="infowindow-content">
                    <span id="place-name"  class="title"></span><br>
                    Place ID <span id="place-id"></span><br>
                    <span id="place-address"></span>
                  </div> -->
              </div>

            

                <!-- <div class="controls">
                  <input type="hidden" name="contact_lat" id="lat" value="">
                  <input type="hidden" name="contact_lang" id="lng" value="">
                  <input type="text" class="form-control" name="address" value="" id="searchLocation" style="width:550px"/>
                </div>
                <div class="controls">
                    <input id="geocodebutton" type="button" value="Cari Lokasi" class="btn btn-primary btn-simpan" onclick="showAddress(); return false"/>
                </div>
              </div>

              <div class="form-group">
                <label class="controls"></label>
                <div class="controls">
                  <div align="center" id="map" style="width: 700px; height: 500px"></div>
                </div>
              </div> -->

              <div class="form-group">
                <label class="form-label">Status</label>
                <div class="controls">
                  <select class="form-control" name="status">
                   <option value="1" <?php echo ((!empty($data)) && ($data->status == 1)) ? " selected='selected' " : "";?>>Publish</option>
                    <option value="0" <?php echo ((!empty($data)) && ($data->status == 0)) ? " selected='selected' " : "";?>>Draft</option>
                   
                  </select>
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
<script id="template-upload" type="text/x-tmpl">

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
<script id="template-download" type="text/x-tmpl">
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
                    <input class="form-control" type="hidden" placeholder="Enter Image Title" name="posisi_gambar[]" value="1" />
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

      $('#fileupload').fileupload({

          // Uncomment the following to send cross-domain cookies:
          //xhrFields: {withCredentials: true},
          url: "<?php echo base_url() ?><?php echo $controller."/do_upload/agenda"?>"
      });

          // console.log($('#fileupload').fileupload('option', 'url'));    
          $('#fileupload').addClass('fileupload-processing');
          $.ajax({
              // Uncomment the following to send cross-domain cookies:
              //xhrFields: {withCredentials: true},
              url: $('#fileupload').fileupload('option', 'url'),
              dataType: 'json',
              context: $('#fileupload')[0]
          }).always(function () {
            // console.log('always');
              $(this).removeClass('fileupload-processing');
          }).done(function (result) {
            // console.log(result);
              $(this).fileupload('option', 'done')
                  .call(this, $.Event('done'), {result: result});
          });

  });


  var loadFeatured = function(event) {
      var output = document.getElementById('featured_img');
      output.src = URL.createObjectURL(event.target.files[0]);
    };


  $(".remove_uploded").click(function() {
      // $.ajax({
      //     type: "POST",
      //     url: "action.php",
      //     data: {
      //         me: me
      //     },
      //     success: function (data) {
      //         alert(data);

      //     }
      // });
      $(this).parent().parent().remove();
  });



</script>




<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCj5rowk-iF4lQnu6R5p6AosQ6eoWevlkQ&libraries=places&callback=initAutocomplete" async defer></script>

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
<!-- <script src="http://maps.google.com/maps?file=api&amp;v=3&amp;key=ABQIAAAAgrj58PbXr2YriiRDqbnL1RSqrCjdkglBijPNIIYrqkVvD1R4QxRl47Yh2D_0C1l5KXQJGrbkSDvXFA" type="text/javascript"></script> -->

 <script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initAutocomplete() {
        <?php
          if(isset($data)){
            $latm = $data->lat_map;
            $langm = $data->long_map;
           
          }else{
       
            $latm = 107.619125;
            $langm = -6.917464;

       
          }
        ?>

        // console.log(lang_m);
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: <?php echo $latm; ?>  , lng: <?php echo $langm; ?>},
          zoom: 13,
          mapTypeId: 'roadmap'
        });


        // Update lat/long value of div when anywhere in the map is clicked 

        // google.maps.event.addListener(map,'click',function(event) {      
        // console.log("sdsd");          
        //     document.getElementById('latclicked').innerHTML = event.latLng.lat();
        //     document.getElementById('longclicked').innerHTML =  event.latLng.lng();
        // });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];

        google.maps.event.addListener(map, 'click', function( event ){
          // alert( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() ); 
           document.getElementById("lat").value = event.latLng.lat();
           document.getElementById("lang").value = event.latLng.lng();
           document.getElementById("loc").value = input;
        });

        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });


          map.fitBounds(bounds);
        });

      }

</script>
<!-- <script>
  // This example adds a search box to a map, using the Google Place Autocomplete
  // feature. People can enter geographical searches. The search box will return a
  // pick list containing a mix of places and predicted search terms.

  // This example requires the Places library. Include the libraries=places
  // parameter when you first load the API. For example:
  // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

  function initAutocomplete() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -6.917464, lng: 107.619125},
      zoom: 13,
      mapTypeId: 'roadmap'
    });

    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
      searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
      var places = searchBox.getPlaces();

      if (places.length == 0) {
        return;
      }

      // Clear out the old markers.
      markers.forEach(function(marker) {
        marker.setMap(null);
      });
      markers = [];

      // For each place, get the icon, name and location.
      var bounds = new google.maps.LatLngBounds();
      places.forEach(function(place) {
        if (!place.geometry) {
          console.log("Returned place contains no geometry");
          return;
        }
        var icon = {
          url: place.icon,
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 25)
        };

        // Create a marker for each place.
        markers.push(new google.maps.Marker({
          map: map,
          icon: icon,
          title: place.name,
          position: place.geometry.location
        }));

        if (place.geometry.viewport) {
          // Only geocodes have viewport.
          bounds.union(place.geometry.viewport);
        } else {
          bounds.extend(place.geometry.location);
        }
      });
      map.fitBounds(bounds);
    });
  }

</script> -->

<script type="text/javascript"> 
$(document).ready(function() {
  $('#summernote2').summernote();
  $('#time_start').timepicker({ 'timeFormat': 'H:i' });
  $('#time_end').timepicker({ 'timeFormat': 'H:i' });
});

</script>

