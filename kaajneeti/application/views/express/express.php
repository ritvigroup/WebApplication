<!DOCTYPE html>
<html lang="en">
<head><title>Express yourself</title>
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
                                <!-- <ol class="breadcrumb page-breadcrumb">
                                    <li class="activelink"><a href="#">Express</a>&nbsp;</li>
                                </ol> -->
                                <button type="button" class="btn purple  btn-sm pull-right" data-toggle="modal" data-target="#myModal">Express</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- stat timeline and feed  -->
                <div class="top20">
                    
                    <div class="clearfix"> </div>
                    <!-- End projects list -->
                    
                    <?php  require_once './include/footer.php';?>

                </div>
            </div>
        </div>
    </div>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Express</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">

                    <textarea class="form-control" id="message" name="message" placeholder="Write your feelings..." rows="5"></textarea>

                </div>

                <div class="row">


                    <div class="col-md-12"><!-- Button trigger modal -->

                        <div class="col-md-4"> 
                            <i class="fa fa-picture-o fa-2x"></i>
                        </div>

                        <div class="col-md-8"> 
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>     
                            <div class="dropdown pull-right">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Public
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu2">
                                    <li><a href="#">Public</a></li>
                                    <li><a href="#">My followers</a></li>
                                    <li><a href="#">My Connect</a></li>
                                    <li><a href="#">Only Me</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">Specific form</a></li>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-success express_post">Express</button> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                                <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Specific Friend</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-right: 16px; margin-top: -18px; float: left;">&times;</span>

                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <i class="fa fa-search pull-right" aria-hidden="true"></i>
                    <input type="text" name="" placeholder="Search..." class="form-control" style="position: relative;">
                </div>

                <h4 style="color: #333; text-align: left;">Friends</h4>
                <div  class="row" style="height: 100px; overflow-y: auto; overflow-x: none;width: 100%;">
                        <div class="col-md-6">
                            <div class="image">
                                <img src="https://demo.opencart.com/image/cache/catalog/demo/apple_cinema_30-228x228.jpg"  class="img-responsive">
                            </div>
                            <div class="caption">
                                <h4>Rajesh</h4>
                            </div>
                            <div class="form-group gender">
                                <input type="radio" name="gender">
                            </div>
                        </div>                   
                        <div class="col-md-6">
                            <div class="image">
                                <img src="https://demo.opencart.com/image/cache/catalog/demo/apple_cinema_30-228x228.jpg"  class="img-responsive">
                            </div>
                            <div class="caption">
                                <h4>Rajesh</h4>
                            </div>
                            <div class="form-group gender">
                                <input type="radio" name="gender">
                            </div>
                        </div>                   
                        <div class="col-md-6">
                            <div class="image">
                                <img src="https://demo.opencart.com/image/cache/catalog/demo/apple_cinema_30-228x228.jpg"  class="img-responsive">
                            </div>
                            <div class="caption">
                                <h4>Rajesh</h4>
                            </div>
                            <div class="form-group gender">
                                <input type="radio" name="gender">
                            </div>
                        </div>                   
                        <div class="col-md-6">
                            <div class="image">
                                <img src="https://demo.opencart.com/image/cache/catalog/demo/apple_cinema_30-228x228.jpg"  class="img-responsive">
                            </div>
                            <div class="caption">
                                <h4>Rajesh</h4>
                            </div>
                            <div class="form-group gender">
                                <input type="radio" name="gender">
                            </div>
                        </div>                   
                        <div class="col-md-6">
                            <div class="image">
                                <img src="https://demo.opencart.com/image/cache/catalog/demo/apple_cinema_30-228x228.jpg"  class="img-responsive">
                            </div>
                            <div class="caption">
                                <h4>Rajesh</h4>
                            </div>
                            <div class="form-group gender">
                                <input type="radio" name="gender">
                            </div>
                        </div>                   
                    </div>
                </div>

                 <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  require_once './include/scroll_top.php';?>

</body>

<?php  require_once './include/js.php';?>

<script>
document.querySelector('.express_post').onclick = function () {
    var $this = $(this);
    var title  = $("#message").val();

    

    if (title.length > 0) {
        $('.express_post').html('Validating...');
                    
        var form_data = new FormData($('input[name^="file"]'));

        jQuery.each($('input[name^="file"]')[0].files, function(i, file) {
            form_data.append('file', file);
        });

        form_data.append('save_post', 'Y');

        jQuery.ajax({
            type: 'POST',
            cache: false,
            processData: false,
            contentType: false,
            data: form_data,
            url: "<?php echo base_url(); ?>express/express",

            success: function(data) {
                alert(data);
                /*
                if (data.status === "failed") {
                    sweetAlert("Oops...", data.message, "error");
                    $('.express_post').html('Express');
                    return false;
                } else { 
                    if (data.status === "success") {
                        $('.express_post').html('Saved');
                        window.location.href="express";
                    }
                }*/
            }
        });

    } else {
        sweetAlert("Oops...", "Please enter some text to express your feelings", "error");
        return false;
    }
};
</script>

</body>
</html>