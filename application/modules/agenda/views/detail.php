<style type="text/css">
     #map{ height: 400px; margin-top: 30px; }
</style>
<div class="sec-container">
                    <div class="breadcumb-menu">
                        <p>Semua Agenda > <span><?php echo $agenda->title; ?></span> </p> 
                    </div>  
                    <div class="side-left">
                        <div class="image-detail">
                            <img src="<?php echo base_url(); ?>assets/uploads/agenda/<?php echo $picture->name; ?>">
                        </div>
                        <div class="title-dsc-blog">
                            <p>Description</p>
                        </div>
                        <div class="desc-blog">
                            <p>
                            <?php echo $agenda->content_1; ?>
                            </p>
                        </div>
                    </div>
                    <div class="side-right">
                        <div class="box-right">
                            <div class="title-blog">
                                <p> <?php echo $agenda->title; ?></p>
                            </div>
                            <div class="tag-gratis">
                                <p>GRATIS</p>
                            </div>
                            <div class="txt-blog">
                                <p>
                                <?php echo $agenda->summary; ?>
                                </p>
                            </div>

                            <div class="box-info-agenda">
                                <div class="info-agenda">
                                    <div class="date-agenda">
                                        <h5>Date</h5>
                                        <p><?php echo indonesian_date($agenda->date_start,"l, j F Y"); ?></p>
                                        <p><?php echo ftime($agenda->time_start); ?> - <?php echo ftime($agenda->time_end); ?> WIB</p>
                                    </div>
                                    <div class="date-agenda">
                                        <h5>Location</h5>
                                       
                                        <p><?php echo $agenda->location; ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="title-map">
                                <p> Maps</p>
                            </div>
                            <div id="map"></div>
                        </div>
                    </div>
                    <div class="clear-float"></div>
                </div>
                

                <section class="sec-blog-join">
                    <div class="join-text">
                        <div class="join-title">
                            <h2>BERGABUNG BERSAMA</h2>
                            <h2>BALAD GURILAPS</h2>
                            <p>
                                These tours are made for lovers and groups alike, as well as offering customized tours and additional single accommodations.

                            </p>
                            <div class="button">
                                    <a href="" class="button-daftar orange">DAFTAR</a>
                            </div>
                        </div>
                    
                    </div>
                </section>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCj5rowk-iF4lQnu6R5p6AosQ6eoWevlkQ&callback=initMap" async defer></script> -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCj5rowk-iF4lQnu6R5p6AosQ6eoWevlkQ&libraries=places&callback=initMap"></script>


<script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: <?php echo $agenda->lat_map; ?>, lng: <?php echo $agenda->long_map; ?>},
          zoom: 15
        });

        var infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);

        service.getDetails({
          placeId: 'ChIJN1t_tDeuEmsRUsoyG83frY4'
        }, function(place, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK) {
            var marker = new google.maps.Marker({
              map: map,
              position: place.geometry.location
            });
            google.maps.event.addListener(marker, 'click', function() {
              infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                'Place ID: ' + place.place_id + '<br>' +
                place.formatted_address + '</div>');
              infowindow.open(map, this);
            });
          }
        });
      }
</script>