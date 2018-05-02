<!DOCTYPE html>
<html lang="en">
<head><title>Report</title>
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
                    <div class="col-lg-12">
                        <div class="portlet box portlet-green">
                            <div class="portlet-header">
                                <h1>Report</h1>
                            </div>
                            <div class="portlet-body">
                                <?php /*<h3 style="text-align:right;">Wallet Balance: &#8377; <?php echo $result->MyWalletBalance;?></h3> */ ?>
                                <?php
                                // echo '<pre>';
                                // print_r($result);
                                // echo '</pre>';
                                ?>
                            

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <span class="input-group-btn"> <a href="javascript:;" class="btn submit"> <i class="icon-magnifier"></i> </a> </span>
                                    </div>
                                </div>
                                    <br><br>
                            </div>


                            <div class="tabs-container">
                                <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab-1" data-toggle="tab" >Recommended</a></li>
                                    <li ><a href="#tab-2" data-toggle="tab" >Plan Run </a></li>
                                    <li ><a href="#tab-3" data-toggle="tab" >Frequently Run </a></li>
                                    <li ><a href="#tab-4" data-toggle="tab" >Yearly/Monthly Report </a></li>
                                    <li role="presentation" class="dropdown"> <a  href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents">My Custom Reports <span class="caret"></span></a>
                                        <ul class="dropdown-menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
                                            <li><a href="#tab-5"  data-toggle="tab" >Plan Report</a></li>
                                            <li><a href="#tab-6"  data-toggle="tab" >Custom Report 1</a></li>
                                            <li><a href="#tab-7"  data-toggle="tab" >Custom Report 2</a></li>
                                        </ul>
                                    </li>
                                    <li ><a href="#tab-8" data-toggle="tab" >All Reports </a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-1">
                                        <div class="panel-body"> <strong>Lorem ipsum dolor sit amet1</strong>
                                            <div class="widgets-container">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading"> Default Panel </div>
                                                            <div class="panel-body">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="panel panel-primary">
                                                            <div class="panel-heading"> Primary Panel </div>
                                                            <div class="panel-body">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="panel panel-success">
                                                            <div class="panel-heading"> Success Panel </div>
                                                            <div class="panel-body">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="panel panel-info">
                                                            <div class="panel-heading"> <i class="fa fa-info-circle"></i> Info Panel </div>
                                                            <div class="panel-body">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="panel panel-warning">
                                                            <div class="panel-heading"> <i class="fa fa-warning"></i> Warning Panel </div>
                                                            <div class="panel-body">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="panel panel-danger">
                                                            <div class="panel-heading"> Danger Panel with Footer </div>
                                                            <div class="panel-body">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                                                            </div>
                                                            <div class="panel-footer"> Panel Footer </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-2">
                                        <div class="panel-body"> <strong>Lorem ipsum dolor sit amet2</strong>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                                            <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                                sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-3">
                                        <div class="panel-body"> <strong>Lorem ipsum dolor sit amet3</strong>
                                            <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap. </p>
                                            <p> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, </p>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-4">
                                        <div class="panel-body"> <strong>Lorem ipsum dolor sit amet4</strong>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                                            <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                                sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-5">
                                        <div class="panel-body"> <strong>Lorem ipsum dolor sit amet5</strong>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                                            <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                                sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-6">
                                        <div class="panel-body"> <strong>Lorem ipsum dolor sit amet6</strong>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                                            <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                                sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-7">
                                        <div class="panel-body"> <strong>Lorem ipsum dolor sit amet7</strong>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                                            <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                                sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-8">
                                        <div class="panel-body"> <strong>Lorem ipsum dolor sit amet8</strong>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                                            <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                                sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                                        </div>
                                    </div>
                                </div>
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
    
    <?php  require_once './include/scroll_top.php';?>

</body>

<?php  require_once './include/js.php';?>

<script>
    $(document).ready(function() {
        // Flexible table

        $('#table_id').DataTable();

    });
</script>

<script>
    var prev_leader_leader = '';
    function searchLeader() {
        var search_attendee = $("#search_attendee").val();

        if(prev_leader_leader == '') {
            prev_leader_leader = $('#assign_to_profile_id').html();
        }

        if (search_attendee.length > 0) {
            //var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

            $.post("<?php echo base_url(); ?>leader/searchLeaderProfiles", {search: search_attendee},
                function (data, status) {

                    if(data != '') {
                        $('#assign_to_profile_id').html(data);
                    } else {
                        $('#assign_to_profile_id').html(prev_leader_leader+'<option value="">No Leader Found</option>');
                    }
                });
        } else {
            $('#assign_to_profile_id').html(prev_leader_leader);
            //sweetAlert("Oops...", "Please enter something to search leaders", "error");
            return false;
        }
    };


    document.querySelector('.complaint_button').onclick = function () {
        var $this = $(this);
        var complaint_type_id       = $("#complaint_type_id").val();
        var complaint_subject       = $("#complaint_subject").val();
        var complaint_description   = $("#complaint_description").val();
        var applicant_name          = $("#applicant_name").val();
        var applicant_father_name   = $("#applicant_father_name").val();
        var applicant_mobile        = $("#applicant_mobile").val();
        var assign_to_profile_id    = $("#assign_to_profile_id").val();


        if (complaint_subject.length > 0) {
            $this.button('Uploading...');

            var complaint_member = '';
            $('#complaint_member :selected').each(function(i, selected) {
                complaint_member += $(selected).val()+',';
            });
            
            var form_data = new FormData($('input[name^="file"]'));

            jQuery.each($('input[name^="file[]"]')[0].files, function(i, file) {
                form_data.append('file[]', file);
            });

            form_data.append('complaint_type_id', complaint_type_id);
            form_data.append('complaint_subject', complaint_subject);
            form_data.append('complaint_description', complaint_description);
            form_data.append('applicant_name', applicant_name);
            form_data.append('applicant_father_name', applicant_father_name);
            form_data.append('applicant_mobile', applicant_mobile);
            form_data.append('assign_to_profile_id', assign_to_profile_id);
            form_data.append('complaint_member', complaint_member);


            jQuery.ajax({
                type: 'POST',
                cache: false,
                processData: false,
                contentType: false,
                data: form_data,
                url: "<?php echo base_url(); ?>complaint/newcomplaint",

                success: function(data) {
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else { 
                        $this.button('Submit');
                        if (data.status === "success") {
                            window.location.href="mycomplaint";
                        }
                    }
                }
            });

        } else {
            sweetAlert("Oops...", "Please enter event name", "error");
            return false;
        }
    };
</script> 

</body>
</html>