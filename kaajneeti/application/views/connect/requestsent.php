<!DOCTYPE html>
<html lang="en">
<head><title>My Request to Friends</title>
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
    <div id="connect_myfriends" class="page-container">
        
        <?php  require_once './include/left.php';?>

        <!-- Start page content wrapper -->
        <div class="page-content-wrapper animated fadeInRight">
            <div class="page-content">
                <div class="row  border-bottom white-bg dashboard-header">
                    <div class="col-md-12">
                        <div class="portlet box">
                            <div class="portlet-header">
                                <ol class="breadcrumb">
                                    <li> <a class="text-capitalize" href="<?=base_url();?>leader/dashboard">Kaajneeti</a> </li>
                                    <li> <a class="text-capitalize" href="<?=base_url(); ?>connect/myfriends">Connect</a> </li>
                                    <li class="active"><strong><a class="text-capitalize" href="<?=base_url(); ?>connect/requestsent">Requests</a> </strong> </li>
                                </ol>
                            </div>

                            <div class="portlet-body">
                                <div class="mbm">
                                    <!-- <div class="col-md-12"> -->
                                        <!-- <div class="row"> -->
                                            <!-- <div class="col-md-12"> -->
                                                <div class="row head">
                                                    <div class="user-heading">
                                                        <div class="col-md-6">
                                                            <!-- <i class="fa fa-thumbs-up"></i>  -->
                                                            <span class="user-frnd text-uppercase">
                                                                Request
                                                            </span>
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            <div class="pull-right"> 
                                                                <!-- <div class="btn-group" role="group" > -->
                                                                    <!-- <div class="btn-group" role="group"> -->
                                                                         <a href="<?=base_url(); ?>connect/search"><button type="button" class="btn aqua btn-outline btn-sm text-capitalize"><i class="fa fa-plus"></i> Find Connections</button></a>

                                                                        <button type="button" class="btn aqua btn-outline btn-sm text-capitalize">follower
                                                                        <span class="badge">4</span></button>
                                                                        <!-- <i class="fa fa-"></i> -->
                                                                    <!-- </div> -->
                                                                    <!-- <div class="btn-group" role="group"> -->
                                                                        <button type="button" class="btn aqua btn-outline btn-sm text-capitalize">
                                                                         Following <span class="badge">4</span></button>
                                                                    <!-- </div> -->
                                                                      
                                                                <!-- </div > -->

                                                                <div class="dropdown pull-right"style=" margin-left: 4px; ">
                                                                    <button class="btn aqua btn-outline btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                    <i class="fa fa-ellipsis-h"></i>
                                                                    
                                                                    </button>
                                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                                        <li><a href="#">txt</a></li>
                                                                        <li><a href="#">txt</a></li>
                                                                        <li><a href="#">txt</a></li>
                                                                        <li><a href="#">txt</a></li>
                                                                        <li>
                                                                            <a href="#edit-privecy" data-toggle="modal">
                                                                            Edit Privecy
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                   
                                                    </div><!--user headig-->

                                                    <div class="connect-menu">
                                                        <div class="col-md-12">
                                                            <div class="connections-tabs">
                                                                <ul class="connect-tab-menu">
                                                                    <li><a href="<?=base_url();?>connect/myfriends">all connections</a></li>
                                                                    <li class="active"><a href="<?=base_url();?>connect/requestsent">requests</a></li>
                                                                    <li><a href="<?=base_url();?>connect/groups">groups</a></li>
                                                                </ul>
                                                            </div><!--Tabs-->
                                                        </div>

                                                        <!-- <div class="col-md-3" style=" margin-top: 6px; ">
                                                            
                                                            <div class="input-group">
                                                              <input type="text" class="form-control" placeholder="Search for...">
                                                              <span class="input-group-btn">
                                                                <button class="btn btn-default" type="button">Go!</button>
                                                              </span>
                                                            </div>
                                                        </div> -->

                                                    </div>
                                                </div>
                                                
                                                <div class="clearfix"></div>
                                                
                                                <div class="row margin-left-right-0 connect-menu-contents">

                                                    <!-- Nav tabs -->
                                                    <ul class="margin-left-right-0 nav nav-tabs" role="tablist">
                                                        <li role="presentation" class="active"><a href="#request-incoming-post" aria-controls="home" role="tab" data-toggle="tab">Incomming Request <span class="badge">4</span></a></li>

                                                        <li role="presentation"><a href="#request-outgoing-post" aria-controls="home" role="tab" data-toggle="tab">outgoing Request <span class="badge">4</span></a></li>

                                                        <li class="connetions-search col-sm-3 pull-right">
                                                            <div class="row input-group">
                                                              <input type="text" class="form-control" placeholder="Search for...">
                                                              <span class="input-group-btn">
                                                                <button class="btn btn-default" type="button">Go!</button>
                                                              </span>
                                                            </div>
                                                        </li>

                                                    </ul>

                                                    <!-- Tab panes -->
                                                    <div class="margin-left-right-0 tab-content">
                                                        
                                                        <!--              Incomming Post           -->
                                                        <div role="tabpanel" class="tab-pane active" id="request-incoming-post">
                                                            <!-- <div class="row ">Both keys Grid & List view  -->
                                                                <div class="col-sm-12" style=" margin-top: 5px; ">
                                                                    <i class="fa fa-th-list fa-2x pull-right" id="list-view-id"></i>
                                                                    <i class="fa fa-th fa-2x pull-right" id="grid-view-id"></i>
                                                                </div>
                                                            <!-- </div> -->
                                                            <div class="connect_list">
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <a href="<?=base_url();?>profile/profile"">
                                                                                <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            </a>
                                                                            <h3><strong>Jordan Belfort</strong></h3>
                                                                            <p><i class="fa fa-star"></i> 14 Post</p>
                                                                            <p>
                                                                                <button class="btn blue  btn-circle" type="button"><i class="fa fa-check"></i> </button>
                                                                                <button class="btn btn-warning btn-circle" type="button"><i class="fa fa-times"></i> </button>
                                                                            </p> 
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <a href="#">
                                                                              <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            </a>
                                                                            <h3><strong>Jordan Belfort</strong></h3>
                                                                            <p><i class="fa fa-star"></i> 14 Post</p>
                                                                            <p>
                                                                                <button class="btn blue  btn-circle" type="button"><i class="fa fa-check"></i> </button>
                                                                                <button class="btn btn-warning btn-circle" type="button"><i class="fa fa-times"></i> </button>
                                                                            </p> 
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <a href="#">
                                                                              <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            </a>
                                                                            <h3><strong>Jordan Belfort</strong></h3>
                                                                            <p><i class="fa fa-star"></i> 14 Post</p>
                                                                            <p>
                                                                                <button class="btn blue  btn-circle" type="button"><i class="fa fa-check"></i> </button>
                                                                                <button class="btn btn-warning btn-circle" type="button"><i class="fa fa-times"></i> </button>
                                                                            </p> 
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                              
                                                        </div>

                                                        <!--              Incomming Post           -->
                                                        <div role="tabpanel" class="tab-pane" id="request-outgoing-post">
                                                            <!-- <div class="row ">Both keys Grid & List view  -->
                                                                <div class="col-sm-12" style=" margin-top: 5px; ">
                                                                    <i class="fa fa-th-list fa-2x pull-right" id="list-view-id"></i>
                                                                    <i class="fa fa-th fa-2x pull-right" id="grid-view-id"></i>
                                                                </div>
                                                            <!-- </div> -->
                                                            <div class="connect_list">
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <a href="#">
                                                                              <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            </a>
                                                                            <h3><strong>Jordan Belfort</strong></h3>
                                                                            <p><a href="#">Send Request</a></p>
                                                                            <div>
                                                                                <button class="btn btn-default" type="button">Undo</button>
                                                                            </div>  
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <a href="#">
                                                                              <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            </a>
                                                                            <h3><strong>Jordan Belfort</strong></h3>
                                                                            <p><a href="#">Send Request</a></p>
                                                                            <div>
                                                                                <button class="btn btn-default" type="button">Undo</button>
                                                                            </div> 
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <a href="#">
                                                                              <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            </a>
                                                                            <h3><strong>Jordan Belfort</strong></h3>
                                                                            <p><a href="#">Send Request</a></p>
                                                                            <div>
                                                                                <button class="btn btn-default" type="button">Undo</button>
                                                                            </div>  
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                              
                                                        </div>
                                                        
                                                      
                                                    </div>
                                                </div>
                                            <!-- </div> -->
                                        <!-- </div> -->
                                    <!-- </div>        -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- stat timeline and feed  -->
                <div class="top20">
                    
                    <div class="clearfix"> </div>
                    <!-- End projects list -->
                    
                    

                </div>
            </div>
        </div>
    </div>

<?php  require_once './include/scroll_top.php';?>
<?php  require_once './include/footer.php';?>
</body>

<?php  require_once './include/js.php';?>

<script>
$(document).ready(function() {
        // Flexible table

        $('#table_id').DataTable();

    });
function cancelRequest(id) {

    if (id > 0) {
        $.post("<?php echo base_url(); ?>connect/undoUserProfileFriendRequest", {id: id},
            function (data, status) {

               if (data.status === "failed") {
                    
                    sweetAlert("Oops...", data.message, "error");
                    return false;
                } else {
                    $('#request_id_'+id).html('<td colspan="100%" style="text-align: center;">'+data.message+'</td>');
                }
            });
    } else {
        sweetAlert("Oops...", "Please select user to cancel", "error");
        return false;
    }
}

$('#request-incoming-post #list-view-id, #request-outgoing-post #list-view-id').on('click', function(){
        $(' .grid-list-view').removeClass('grid col-md-4 col-sm-6');
        $('.grid-list-view').addClass('list col-md-12 col-sm-12');
});

$('#request-incoming-post #grid-view-id, #request-outgoing-post #grid-view-id').on('click', function(){
    $('.grid-list-view').removeClass('list col-md-12 col-sm-12');
    $('.grid-list-view').addClass('grid col-md-4 col-sm-6');
});

</script>

</body>
</html>