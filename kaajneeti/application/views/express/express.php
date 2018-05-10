<!DOCTYPE html>
<html lang="en">
<head><title>My Team</title>
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
                    <div class="col-md-12">
                        <div class="portlet box">
                            <div class="portlet-header">
                                <div class="row">
                                    <div class="col-md-6">
                                <h3>Express</h3>
                                </div>

                              
                                <div class="actions action-right">
                                  <!-- <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" class="btn btn-info btn-xs" onClick="return newTeam();"><i class="fa fa-plus"></i>&nbsp;Team</a>&nbsp;
                        <a href="<?=base_url();?>organize/fleet" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;Fleet</a>&nbsp;
                                    <a href="<?=base_url();?>organize/documents" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;Documents</a>&nbsp;
                                     -->
                                     <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn"><!-- <i class="fa fa-plus-circle"></i> -->&nbsp;Manage <span class="caret"></span>   </button>&nbsp;
                        <div id="myDropdown" class="dropdown-content">
                      <a href="#home"> Post</a>
                      <a href="#about"> Poll</a>
                       <a href="#home"> Event</a>
                      <a href="#about">Task</a>
                      <a href="#about">Calender</a>
                      <a href="#about">Social Post</a>


                      <a  data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newTeam();"  href="#contact"> New Documents</a>
                      <a href="#about"> New Group</a>
                    </div>
                  </div>
                                </div>
                            </div>
                            </div>

                            <div class="portlet-body">
                             
                              <div class="row">
                                <div class="col-md-12">

                                  <ul class="nav navbar-nav">
                                    <li><a href="javascript:void(0);"> <i class="fa fa-pencil" aria-hidden="true"></i> Compose Post</a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-picture-o" aria-hidden="true"></i> Photo/Video Album</a></li>
                                    <li><a href="javascript:void(0);"  data-toggle="modal" data-target="#exampleModalCenter"> <i class="fa fa-video-camera" aria-hidden="true"></i> Live Video</a></li>



                                  </ul>

                                </div>
                              </div>


                            <!-- Modal -->
                            <div class="modal fade custom-fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered model-top" role="document">
                                <div class="modal-content">
                                  <div class="modal-header express-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                        <div class="button-group ">
                                      <button type="button" class="btn btn-primary camera-btn"><i class="fa fa-video-camera" aria-hidden="true"></i> Camera</button>
                                      <button type="button" class="btn btn-default connect-btn"><i class="fa fa-plug" aria-hidden="true"></i> Connect</button>
                                      </div>

                                      <h1 class="text-center camerah1">Unable to find camera</h1>
                                      <p class="text-center">Please connect a camera and verify that camera permissions are correct in your browser</p><br>
                                       <div class="button-group ">
                                       <button type="button" class="btn btn-primary  ">Done</button></div>


                                    </div>
                                  </div>
                                  </div>
                               <!--    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div> -->
                                </div>
                              </div>
                            </div>                                                                                 
                             
                                <div class="row">
                                <div class="col-xs-12">
                                       <div class="textarea-img">
                                       <img src="https://www.toptene.com/wp-content/uploads/2017/10/top-10-most-handsome-men-in-the-world.jpg"  width="50"  height="50" class="img-circle">
                                       </div>
                          <!--                  <div class="expires-button">

                                    <button type="button" class="btn btn-info express-info">Submit</button>
                                    </div> -->


                                     <div class="form-group">

                                      <textarea class="form-control placeholder"  placeholder="Write Somthing here  ......" rows="8"></textarea>
                                 

                                    </div>
                                
                                </div>
                              </div>

                              <div class="row" style="max-height: 100px; overflow-y: auto; overflow-x: none; max-width: 100%;">
                                
                                <div class="col-md-3">
                                <!--     <button type="button" class="btn btn-default default-border">
                                        <i class=" fa fa-envelope"></i> Post
                                      </button><br><br> -->
                                     <button type="button" class="btn btn-default default-border">
                                      <i class=" fa fa-list-ul"></i> Poll
                                    </button><br><br>

                                     <button type="button" class="btn btn-default default-border">
                                      <i class=" fa fa-calendar"></i> Event
                                    </button><br><br>
                                    <button type="button" class="btn btn-default default-border">
                                      <i class="fa fa-tasks"></i> Task
                                    </button>
                                </div>
                                    
                                    
                    

                                 <div class="col-md-3">
                                     <button type="button" class="btn btn-default default-border"><i class="fa fa-envelope"></i> Social Post</button><br><br>
                                       <button type="button" class="btn btn-default default-border"><i class="fa fa-calendar"></i> Calender</button><br><br>
                                    
                                   
                                  
                              
                    
                                </div>

                                  <div class="col-md-3">
                                  
                                   <button type="button" class="btn btn-default default-border"> <i class="fa fa-tasks"></i> Task </button><br><br>
                                     
                                   
                                      <button type="button" class="btn btn-default default-border"><i class="fa fa-users" aria-hidden="true"></i> New Group</button>
                    
                                  </div>

                                  <div class="col-md-3">
                                  
                                      
                                     <button type="button" class="btn btn-default default-border"> <i class=" fa fa-calendar"></i> Event   </button><br><br>
                                   
                               
                                      <button type="button" class="btn btn-default default-border"><i class="fa fa-file" aria-hidden="true"></i> New Document</button>
                    
                                  </div>

                              </div>

                              <div class="row">
                                <div class="col-md-12">
                                  
                                  <div class="dropup express-dropdown pull-right" id="my-id">
                                      <button class="btn btn-default dropdown-toggle" type="button"  id="my-id2" data-toggle="dropdown">Public
                                          <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu dropdown-menu2">
                                          <li><a href="#">Public</a></li>
                                          <li><a href="#">My followers</a></li>
                                          <li><a href="#">My Connect</a></li>
                                          <li><a href="#">Only Me</a></li>
                                          <li><a href="#">Specific form</a></li>
                                      </ul>

                                      <button class="btn btn-primary " type="button">Post  </button>
                                  </div>
          
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <?php  require_once './include/scroll_top.php';?>

<?php  require_once './include/footer.php';?>
</body>

<?php  require_once './include/js.php';?>


<div id="modal-stackable" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        // Flexible table

        $('#table_id').DataTable();

    });
    function newTeam() {

        $.post("<?php echo base_url(); ?>organize/newTeam", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    }
</script>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
    var myDropdown = document.getElementById("myDropdown");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
  }
}
</script>

<script>
$(document).ready(function(){

$("#activate_user").click(function(){
    $("#activate").show();
});
$(".nav-tabs li a").click(function(){
    $('#activate').css("display","none");
});

   $("#user").click(function(){
    $("#user2").show();
});

       $(".nav-tabs li a").click(function(){
    $('#user2').css("display","none");
});



  



});
</script>

</body>
</html>