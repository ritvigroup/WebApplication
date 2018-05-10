<!DOCTYPE html>
<html lang="en">
<head><title>Plan</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">

    
    <?php  require_once './include/css.php';?>

</head>
<body class="page-header-fixed ">
    
    <?php  require_once './include/top.php';?>

    <div class="clearfix"> </div>
    <div class="page-container">
        
        <?php  require_once './include/left.php';?>

        <!-- Start page content wrapper -->
        <div class="page-content-wrapper animated fadeInRight">
            <div class="page-content">
                <div class="row  border-bottom white-bg dashboard-header">
                    <div class="col-md-6">
                        <div class="portlet box">
                            <div class="portlet-header">
                                <ol class="breadcrumb">
                                    <li> <a class="text-capitalize" href="<?=base_url();?>leader/dashboard">Kaajneeti</a> </li>
                                    <li class="active"><strong><a class="text-capitalize" href="<?=base_url(); ?>plan/plan">Plan</a> </strong> </li>
                                </ol>
                            </div>
                            
                        </div>
                    </div>

                     <div class="col-md-6">
                    

                        <div class="portlet-header portlet box  breadcrumb page-breadcrumb pull-right" style=" margin-top: 10px;">
                    
                                
                            <li><a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return nextScreen(0);" title="Let's begin with your Goal" class="btn btn-success">Create a Plan</a>&nbsp;</li>
                      
                        </div>
                    </div>

                    <?php /*
                    <div class="row">
                        <input type="text" id="target_specific_area" name="target_specific_area" placeholder="Please specify your area" class="form-control controls" style="margin-top: 10px;">

                        <div id="map" style="width: 90%; height: 400px;"></div>
                    </div>
                    */ ?>
                    <div class="col-md-12 header-table">
                        <table class="table" style="margin-bottom: 0px;">
                            <thead>
                                <tr>
                                    <th class="plan-icon"><a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return nextScreen(0);"><i class="fa fa-bullseye fa-2x" aria-hidden="true"></i><br>Goal </a></th>
                                    <th class="plan-icon"><hr></th>
                                    <th class="plan-icon"><a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return nextScreen(3);"><i class="fa fa-map-marker fa-2x"></i><br>Geography</a></th>
                                        <th class="plan-icon"><hr></th>
                                    <th class="plan-icon"><a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return nextScreen(4);"><i class="fa fa-users fa-2x" aria-hidden="true"></i><br>Audience</a></th>
                                    <th class="plan-icon"><hr></th>
                                    <th class="plan-icon"><a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return nextScreen(5);"><i class="fa fa-bar-chart fa-2x" aria-hidden="true"></i><br>Forecast</a></th>
                                </tr>
                            </thead>
                        </table>
                    </div> 
                </div>

            </div>
        </div>
    </div>

<div id="modal-stackable" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/sweetalert-dev.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script> 

<?php  require_once './include/scroll_top.php';?>

<?php  require_once './include/footer.php';?>

</body>

<?php  require_once './include/js.php';?>


<script>
        $( document ).ready(function() {
            
        });
    function nextScreen(next_screen_id) {

        var all_data = Get_All_Page_Data();

        $.post("<?php echo base_url(); ?>plan/nextScreen", {'next_screen': next_screen_id},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
                $('.form_datetime').datetimepicker({
                    dateFormat: 'yyyy-mm-dd',
                    autoclose: true,
                    todayBtn: true,
                });
            });
    }



    function prevScreen(next_screen_id) {

        var all_data = Get_All_Page_Data();

        $.post("<?php echo base_url(); ?>plan/nextScreen", {'next_screen': next_screen_id},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
                $('.form_datetime').datetimepicker({
                    dateFormat: 'yyyy-mm-dd',
                    autoclose: true,
                    todayBtn: true,
                });
            });
    }


    function Get_All_Page_Data()
    {
        var All_Page_Data = {};
        $('input, select, textarea').each(function(){  
            var input = $(this);
            var Element_Name;
            var Element_Value;

            if((input.attr('type') == 'submit') || (input.attr('type') == 'button'))
            {
                return true;
            }
            if((input.attr('name') != undefined) && (input.attr('name') != ''))
            {
                if(input.attr('type') == 'text') {
                    Element_Name = input.attr('name');
                    Element_Value = input.val();

                    if(Element_Value != '') {
                        All_Page_Data[Element_Name] = Element_Value;
                        //alert(Element_Name+': '+Element_Value);
                    }
                }
            }
            

            /*if((input.attr('name') != undefined) && (input.attr('name') != ''))
            {
                Element_Name = input.attr('name');
            }
            else if((input.attr('id') != undefined) && (input.attr('id') != ''))
            {
                Element_Name = input.attr('id');
            }
            else if((input.attr('class') != undefined) && (input.attr('class') != ''))
            {
                Element_Name = input.attr('class');
            }

            if(input.val() != undefined)
            {
                if(input.attr('type')  == 'radio')
                {
                    Element_Value = jQuery('input[name='+Element_Name+']:checked').val();
                }
                else
                {
                    Element_Value = input.val();
                }
            }
            else if(input.val() != undefined)
            {
                Element_Value = input.val();
            }
            else if(input.text() != undefined)
            {
                Element_Value = input.text();
            }
            

            if(Element_Name != undefined)
            {
                All_Page_Data[Element_Name] = Element_Value;
                alert(Element_Name+': '+Element_Value);
            }*/
        });
        return All_Page_Data;
    }

    
</script>
<script>
    function resetFormPage() {
        //$('#create_plan_form').reset();
        document.create_plan_form.reset();
    }
</script>

<?php /*
<script>
// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.

// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

function initAutocomplete() {
var map = new google.maps.Map(document.getElementById('map'), {
  center: {lat: -33.8688, lng: 151.2195},
  zoom: 13,
  mapTypeId: 'roadmap'
});

// Create the search box and link it to the UI element.
var input = document.getElementById('target_specific_area');
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZDxgtcuaHCuoVZ8S8wcdkWFXKqwiYQqg&libraries=places&callback=initAutocomplete"
 async defer></script>

*/ ?>


</body>
</html>