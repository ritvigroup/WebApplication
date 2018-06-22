<div class="modal-header">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title">Express yourself <?php echo $this->session->userdata('Name'); ?></h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-xs-12">
            <div class="textarea-img">
                <img src="<?php echo $this->session->userdata('UserProfilePic'); ?>"  width="50"  height="50" class="img-circle">
            </div>
            <div class="form-group">
                <select name="express_public_private" id="express_public_private" class="btn btn-default express_pub_pri">
                    <option value="1">Public</option>
                    <option value="0">Private</option>
                </select>
                <textarea class="form-control placeholder" id="express_yourself_text"  placeholder="What is happening?" rows="2"></textarea>
                <?php
                // echo '<pre>';
                // print_r($Connections);
                // echo '</pre>';
                ?>
                <input type="text" id="1post_location" name="post_location" placeholder="Enter Your Location" class="form-control controls" style="display: none;">

                <input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text">
                

                <select class="js-example-basic-single" name="post_attendee[]" multiple id="post_attendee" class="form-control" style="display: none;">
                    <?php
                    foreach($Connections->result AS $my_connect) {
                        echo '<option value="'.$my_connect->UserProfileId.'">'.$my_connect->FirstName.' '.$my_connect->LastName.'</option>';
                    }
                    ?>
                </select>
                

                <img src="<?php echo base_url()?>assets/images/location.png" class="location_express" id="location_express" onclick="return location_box_display();">
                <img src="<?php echo base_url()?>assets/images/tag-connect.png" class="tag_express" id="tag_express" onclick="return tag_box_display();">
            </div>
            <div id="image_selected"></div>

            
        </div>
    </div>


    <div class="row" style="max-height: 100px; overflow-y: auto; overflow-x: none; max-width: 100%;">

        <div class="col-md-3" style="text-align:center;">
            <button type="button" class="btn btn-default round-border blue_bg" onClick="return newExpressPopupPoll();">
                <img src="<?php echo base_url(); ?>/assets/images/ic_poll_white.png" style="width: 35px; height: 35px;"> 
            </button><br>
            <span>Poll</span>
        </div>
        <div class="col-md-3" style="text-align:center;">
            <button type="button" class="btn btn-default round-border blue_bg" onClick="return newExpressPopupEvent();">
                <img src="<?php echo base_url(); ?>/assets/images/ic_event_white.png" style="width: 35px; height: 35px;"> 
            </button><br>
            <span>Event</span>
        </div>
        <div class="col-md-3" style="text-align:center;">
            <button type="button" class="btn btn-default round-border blue_bg">
                <img src="<?php echo base_url(); ?>/assets/images/ic_event_white.png" class="explore_popup_photo" style="width: 35px; height: 35px;" aria-hidden="true">
                <input type="file" name="file[]" id="imgUpload" multiple class="upload-file" style="display: none;">
            </button><br>
            <span>Photo/Video</span>
        </div>
        <div class="col-md-3" style="text-align:center;">
            <button type="button" class="btn btn-default round-border blue_bg" data-toggle="modal" data-target="#exampleModalCenter">
                <img src="<?php echo base_url(); ?>/assets/images/ic_event_white.png" style="width: 35px; height: 35px;"> 
            </button><br>
            <span>Live Video</span>
        </div>

    </div>
   
</div>
<div class="modal-footer" style="padding: 5px !important; ">
    <div class="col-md-2">
        <?php /*<div class="dropup express-dropdown pull-right" id="my-id">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>*/ ?>
    </div>
    <div class="col-md-10 pull-right" >
        <div class="dropup express-dropdown " id="my-id">
            
            <?php /*<button class="btn btn-default dropdown-toggle" type="button"  id="my-id2" data-toggle="dropdown">Public
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu2">
                <li><a href="#">Public</a></li>
                <li><a href="#">Only Me</a></li>
                <!-- <li><a href="#">My followers</a></li>
                <li><a href="#">My Connect</a></li>
                <li><a href="#">Only Me</a></li>
                <li><a href="#">Specific form</a></li> -->
            </ul>*/ ?>

             <button type="button" class="btn btn-success save_explore_post" onClick="return saveExplorePost();">Submit</button>

        </div>

       
    </div>
</div>
<script>
      // This example displays an address form, using the autocomplete feature
  // of the Google Places API to help users fill in the information.

  // This example requires the Places library. Include the libraries=places
  // parameter when you first load the API. For example:
  // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

  var placeSearch, autocomplete;
  var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
  };

  function initAutocomplete() {
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    autocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
        {types: ['geocode']});

    // When the user selects an address from the dropdown, populate the address
    // fields in the form.
    //autocomplete.addListener('place_changed', fillInAddress);
  }

  function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();

    for (var component in componentForm) {
      document.getElementById(component).value = '';
      document.getElementById(component).disabled = false;
    }

    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
      var addressType = place.address_components[i].types[0];
      if (componentForm[addressType]) {
        var val = place.address_components[i][componentForm[addressType]];
        document.getElementById(addressType).value = val;
      }
    }
  }

  // Bias the autocomplete object to the user's geographical location,
  // as supplied by the browser's 'navigator.geolocation' object.
  function geolocate() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var geolocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        var circle = new google.maps.Circle({
          center: geolocation,
          radius: position.coords.accuracy
        });
        autocomplete.setBounds(circle.getBounds());
      });
    }
  }
</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUB9PGavJl7oOlE-30gtTyY1pf-uN75iU&libraries=places&callback=initAutocomplete"
        async defer></script>