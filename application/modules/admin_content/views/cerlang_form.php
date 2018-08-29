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
        <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> 
        </div>
      </div>
      <form  enctype="multipart/form-data" method="post" action="<?php echo base_url() ?><?php echo $controller."/".$function?>_<?php if(isset($data)){echo"update";}else{echo"add";} ?>">
        <input type="hidden" name="id" value="<?php if(isset($data)){ echo $data->id; } ?>">
        <input type="hidden" name="type_menu" value="cerlang">
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
                <label class="form-label">Summary</label>
                <div class="controls">
                 <textarea class="form-control" required name="summary" style="min-height: 150px;"><?php if(isset($data)){ echo $data->summary; } ?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="form-label">Category</label>

                <div class="controls">
                  <select required class="form-control" name="category_cerlang">
                      <option value="">--select Category--</option>
                      <!-- <option <?php if($data and $data->id=='0'){echo"selected";} ?> value="0">none</option> -->
                      <?php foreach ($kategori as $key) { ?>
                      <option <?php if( $data and $key->id== $data->category_cerlang){echo"selected";} ?> value="<?php echo $key->id ?>"><?php echo $key->title ?></option><?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                  <label class="form-label">Image Content 1</label>
                  <div class="box">
                      <input type="hidden" name="posisi_gambar1" value="1">
                      <input type="file" value="<?php if(isset($picture)){ echo $picture->name; } ?>" name="images_1" id="file-7" class="inputfile" accept="image/*" onchange="loadFile(event)" />
                      <label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
                  </div>
                  <img id="output" class="ouput_image_input" <?php if($picture){ ?> src="<?php echo base_url() ?>assets/uploads/cerlang/<?php if($picture->name==''){echo"default.jpg";}else{echo $picture->id_content."/".$picture->name;} }?> " />
              </div>


              <div class="form-group">
                <label class="form-label">Content 1</label>                       
                <div class="controls">
                  <textarea id="summernote" name="content_1" placeholder="Enter text ..." class="form-control" style="height: 400px" ><?php if(isset($data)){ echo $data->content_1; } ?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="form-label">ID Embed Youtube</label>
                <div class="controls">
                  <input type="text" name="video_embed_1" class="form-control" value="<?php if(isset($data)){ echo $data->video_embed_1; } ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="form-label">Content 2</label>                       
                <div class="controls">
                  <textarea id="summernote2" name="content_2" placeholder="Enter text ..." class="form-control" rows="10"><?php if(isset($data)){ echo $data->content_2; } ?></textarea>
                </div>
              </div>

               <div class="form-group">
                  <label class="form-label">Image Content 3</label>
                  <div class="box">
                      <input type="hidden" name="posisi_gambar3" value="3">
                      <input type="file" <?php if(isset($picture2)){ echo $picture2->name; } ?> name="images_2" id="file-1" class="inputfile" accept="image/*" onchange="loadFile2(event)" />
                      <label for="file-1"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
                  </div>
                  <img id="output2" class="ouput_image_input" <?php if($picture2){ ?> src="<?php echo base_url() ?>assets/uploads/cerlang/<?php if($picture2->name==''){echo"default.jpg";}else{echo $picture2->id_content."/".$picture2->name;} }?> " />
              </div>

              <div class="form-group">
                <label class="form-label">Content 3</label>                       
                <div class="controls">
                  <textarea id="summernote3" name="content_3" placeholder="Enter text ..." class="form-control" rows="10"><?php if(isset($data)){ echo $data->content_3; } ?></textarea>
                </div>
              </div>


             

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
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -6.917464, lng: 107.619125},
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
  $('#summernote3').summernote();
  $('#time_start').timepicker({ 'timeFormat': 'H:i' });
  $('#time_end').timepicker({ 'timeFormat': 'H:i' });
});

</script>

