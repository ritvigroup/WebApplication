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
                        
                        <!-- <h2> Express</h2> -->
                        <button type="button" class="btn purple  btn-sm pull-right" data-toggle="modal" data-target="#myModal">Express</button>
                    </div>
                </div>
                <div class="wrapper-content ">
                    <div class="row blog">

                        <?php
                        // echo '<pre>';
                        // print_r($result);
                        // echo '</pre>';

                        foreach($result AS $result_data) { ?>
                        <div class="col-lg-4">
                            
                            <?php if($result_data->feedtype == 'post') { ?>
                                <?php
                                $PostTitle          = $result_data->postdata->PostTitle;
                                $PostDescription    = $result_data->postdata->PostDescription;
                                $PostBy             = $result_data->postdata->PostProfile->FirstName. ' '.$result_data->postdata->PostProfile->LastName;
                                $PostOn             = $result_data->postdata->AddedOn;

                                $PostTag = $result_data->postdata->PostTag;

                                $PostTagDisplay = '';
                                if(count($PostTag) > 0) {
                                    $pt = 0;
                                    foreach($PostTag AS $post_tag) {

                                        $post_tag_name = $post_tag->FirstName. ' '.$post_tag->LastName;
                                        $PostTagDisplay .= '<button type="button" class="btn green btn-outline sbold btn-xs">'.$post_tag_name.'</button>';
                                        $pt++;
                                        //if($PostTag == $pt)
                                    }
                                }
                                ?>
                                <div class="ibox"> 
                                    <!-- <img alt="" class="full-width" src="assets/images/blogs/1.jpg"> -->
                                    <div class="widgets-container padding-top10"> 
                                        <a class="btn-link" href="#">Post
                                            <h2 class="hed"> <?php echo $PostTitle; ?> </h2>
                                        </a>
                                        <div class="small bottom5"> <strong><?php echo $PostBy; ?></strong> <span class="text-muted right"><i class="fa fa-clock-o"></i> <?php echo $PostOn; ?></span> </div>
                                        <?php if($PostDescription != '') { ?>
                                        <p> <?php echo $PostDescription; ?> </p>
                                        <?php } ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?php if($PostTagDisplay != '') { ?>
                                                <h5>Tags:</h5>
                                                    <?php echo $PostTagDisplay; ?>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="small text-right">
                                                    <h5>&nbsp;</h5>
                                                    <div> 
                                                        <i class="fa fa-comments-o"> </i> 80 &nbsp;
                                                        <i class="fa fa-eye"> </i> 200 views 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($result_data->feedtype == 'suggestion') { ?>
                                <?php
                                $SuggestionSubject      = $result_data->suggestiondata->SuggestionSubject;
                                $SuggestionDescription  = $result_data->suggestiondata->SuggestionDescription;
                                $PostBy                 = $result_data->suggestiondata->SuggestionProfile->FirstName. ' '.$result_data->suggestiondata->SuggestionProfile->LastName;
                                $PostOn                 = $result_data->suggestiondata->AddedOn;

                                $PostTag = $result_data->suggestiondata->PostTag;

                                $PostTagDisplay = '';
                                if(count($PostTag) > 0) {
                                    $pt = 0;
                                    foreach($PostTag AS $post_tag) {

                                        $post_tag_name = $post_tag->FirstName. ' '.$post_tag->LastName;
                                        $PostTagDisplay .= '<button type="button" class="btn green btn-outline sbold btn-xs">'.$post_tag_name.'</button>';
                                        $pt++;
                                        //if($PostTag == $pt)
                                    }
                                }
                                ?>
                                <div class="ibox"> 
                                    <!-- <img alt="" class="full-width" src="assets/images/blogs/1.jpg"> -->
                                    <div class="widgets-container padding-top10"> 
                                        <a class="btn-link" href="#">Suggestion
                                            <h2 class="hed"> <?php echo $SuggestionSubject; ?> </h2>
                                        </a>
                                        <div class="small bottom5"> <strong><?php echo $PostBy; ?></strong> <span class="text-muted right"><i class="fa fa-clock-o"></i> <?php echo $PostOn; ?></span> </div>
                                        <?php if($SuggestionDescription != '') { ?>
                                        <p> <?php echo $SuggestionDescription; ?> </p>
                                        <?php } ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?php if($PostTagDisplay != '') { ?>
                                                <h5>Tags:</h5>
                                                    <?php echo $PostTagDisplay; ?>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="small text-right">
                                                    <h5>&nbsp;</h5>
                                                    <div> 
                                                        <i class="fa fa-comments-o"> </i> 80 &nbsp;
                                                        <i class="fa fa-eye"> </i> 200 views 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($result_data->feedtype == 'complaint') { ?>
                                <?php
                                $ComplaintSubject      = $result_data->complaintdata->ComplaintSubject;
                                $ComplaintDescription  = $result_data->complaintdata->ComplaintDescription;
                                $PostBy                 = $result_data->complaintdata->ComplaintProfile->FirstName. ' '.$result_data->complaintdata->ComplaintProfile->LastName;
                                $PostOn                 = $result_data->complaintdata->AddedOn;

                                $ComplaintMember = $result_data->complaintdata->ComplaintMember;

                                $ComplaintMemberDisplay = '';
                                if(count($ComplaintMember) > 0) {
                                    $pt = 0;
                                    foreach($ComplaintMember AS $complaint_tag) {

                                        $complaint_tag_name = $complaint_tag->FirstName. ' '.$complaint_tag->LastName;
                                        $ComplaintMemberDisplay .= '<button type="button" class="btn green btn-outline sbold btn-xs">'.$complaint_tag_name.'</button>';
                                        $pt++;
                                        //if($PostTag == $pt)
                                    }
                                }
                                ?>
                                <div class="ibox"> 
                                    <!-- <img alt="" class="full-width" src="assets/images/blogs/1.jpg"> -->
                                    <div class="widgets-container padding-top10"> 
                                        <a class="btn-link" href="#">Complaint
                                            <h2 class="hed"> <?php echo $ComplaintSubject; ?> </h2>
                                        </a>
                                        <div class="small bottom5"> <strong><?php echo $PostBy; ?></strong> <span class="text-muted right"><i class="fa fa-clock-o"></i> <?php echo $PostOn; ?></span> </div>
                                        <?php if($ComplaintDescription != '') { ?>
                                        <p> <?php echo $ComplaintDescription; ?> </p>
                                        <?php } ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?php if($ComplaintMemberDisplay != '') { ?>
                                                <h5>Tags:</h5>
                                                    <?php echo $ComplaintMemberDisplay; ?>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="small text-right">
                                                    <h5>&nbsp;</h5>
                                                    <div> 
                                                        <i class="fa fa-comments-o"> </i> 80 &nbsp;
                                                        <i class="fa fa-eye"> </i> 200 views 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <?php } ?>
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
                            <input type="file" name="file" style="display: hidden;">
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
<?php  require_once './include/footer.php';?>
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

        form_data.append('title', title);
        form_data.append('save_post', 'Y');

        jQuery.ajax({
            type: 'POST',
            cache: false,
            processData: false,
            contentType: false,
            data: form_data,
            url: "<?php echo base_url(); ?>express/express",

            success: function(data) {
 
                if (data.status === "failed") {
                    sweetAlert("Oops...", data.message, "error");
                    $('.express_post').html('Express');
                    return false;
                } else { 
                    if (data.status === "success") {
                        $('.express_post').html('Saved');
                        window.location.href="express";
                    }
                }
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