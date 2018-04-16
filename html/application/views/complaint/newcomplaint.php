<!DOCTYPE html>
<html lang="en">
<head><title>New Complaint</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <link rel="shortcut icon" href="<?=base_url();?>assets/images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="<?=base_url();?>assets/images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=base_url();?>assets/images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=base_url();?>assets/images/icons/favicon-114x114.png">


    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet"
          href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet"
          href="<?=base_url();?>assets/vendors/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap/css/bootstrap.min.css">

    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert.css?ver=1.04">

    <!--LOADING STYLESHEET FOR PAGE-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-colorpicker/css/colorpicker.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-datepicker/css/datepicker.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker-bs3.css">
    <link type="text/css" rel="stylesheet"
          href="<?=base_url();?>assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-clockface/css/clockface.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-switch/css/bootstrap-switch.css">
    <!--Loading style vendors-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/animate.css/animate.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/jquery-pace/pace.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/iCheck/skins/all.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/jquery-notific8/jquery.notific8.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker-bs3.css">
    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/themes/style1/orange-blue.css" class="default-style">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/themes/style1/orange-blue.css" id="theme-change"
          class="style-change color-change">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/style-responsive.css">

    <style>
    .file_display { float: left;overflow: hidden; width: 80px; height: 100px;border: 1px solid #f9efef; margin: 0 10px 10px 0;padding: 5px; }
    .file_display p {position: absolute; padding: 0px 4px; background: #333; color: white; top: 0; left: 0;}
    </style>

</head>
<body class=" ">
<div>
    <!--BEGIN BACK TO TOP--><a id="totop" href="#"><i class="fa fa-angle-up"></i></a><!--END BACK TO TOP-->
    <!--BEGIN TOPBAR-->
    <?php  require_once './include/top.php';?>
    <!--END TOPBAR-->
    <div id="wrapper"><!--BEGIN SIDEBAR MENU-->
        
        <?php  require_once './include/left.php';?>

        <!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper"><!--BEGIN TITLE & BREADCRUMB PAGE-->
            <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                <div class="page-header pull-left">
                    <div class="page-title">Complaint</div>
                </div>
                <ol class="breadcrumb page-breadcrumb">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="<?=base_url();?>leader/home">Home</a>&nbsp;&nbsp;<i
                            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li><a href="#">Complaint</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="active">New</li>
                </ol>
                <div class="btn btn-blue reportrange hide"><i class="fa fa-calendar"></i>&nbsp;<span></span>&nbsp;report&nbsp;<i
                        class="fa fa-angle-down"></i><input type="hidden" name="datestart"/><input type="hidden"
                                                                                                   name="endstart"/>
                </div>
                <div class="clearfix"></div>
            </div>
            <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
            <div class="page-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="portlet box portlet-green">
                            <div class="portlet-header">
                                <div class="caption">New Complaint</div>
                                <div class="actions">
                                    <a href="<?=base_url();?>complaint/complaintReceived" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;Complaint Received</a>&nbsp;
                                    <a href="<?=base_url();?>complaint/mycomplaint" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;My Complaint</a>&nbsp;
                                </div>
                            </div>
                            <div class="portlet-body">
                                
                                <h3 class="mbxl">Save Your New Complaint</h3>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="complaint_type_id" class="control-label">Title <span
                                                class='require'>*</span>
                                            </label>
                                            <select id="complaint_type_id" name="complaint_type_id" class="form-control">
                                                <?php
                                                foreach($ComplaintType->result AS $complaint_type) {
                                                    echo '<option value="'.$complaint_type->ComplaintTypeId.'">'.$complaint_type->TypeName.'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="complaint_subject"
                                                                       class="control-label">Subject <span
                                                class='require'>*</span></label>
                                                <input id="complaint_subject" name="complaint_subject" type="text" placeholder="Complaint Subject" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="complaint_description" class="control-label">Description</label>
                                            <textarea
                                                id="complaint_description" name="complaint_description" type="text" placeholder="Complaint Description"
                                                class="form-control"/></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="applicant_name"
                                                                       class="control-label">Applicant Name <span
                                                class='require'>*</span></label><input id="applicant_name" name="applicant_name"
                                                                                       type="text"
                                                                                       placeholder="Applicant Name"
                                                                                       class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="applicant_father_name"
                                                                       class="control-label">Applicant Father Name <span
                                                class='require'>*</span></label><input id="applicant_father_name" name="applicant_father_name"
                                                                                       type="text"
                                                                                       placeholder="Applicant Father Name"
                                                                                       class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="applicant_mobile"
                                                                       class="control-label">Applicant Mobile <span
                                                class='require'>*</span></label><input id="applicant_mobile" name="applicant_mobile"
                                                                                       type="text"
                                                                                       placeholder="Applicant Mobile"
                                                                                       class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                    

                                <?php
                                // echo '<pre>';
                                // print_r($FavouriteLeader);
                                // print_r($MyFriend);
                                // echo '</pre>';
                                ?>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="search_attendee" class="control-label">Search</label>
                                            <input id="search_attendee" type="text" name="search" placeholder="search.." class="form-control" onkeyup="return searchLeader();" autocomplete="off" /><!--&nbsp;<input type="button" class="search_button" value="Search">-->
                                        </div>
                                        <div class="form-group">
                                            <select id="assign_to_profile_id" name="assign_to_profile_id" class="form-control">
                                                <option value="">Select Leader</option>
                                                <?php
                                                foreach($FavouriteLeader->result AS $favourite_leader) {
                                                    echo '<option value="'.$favourite_leader->UserProfileLeader->UserProfileId.'">'.$favourite_leader->UserProfileLeader->FirstName."".$favourite_leader->UserProfileLeader->LastName.'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="complaint_member" class="control-label">Complaint Members</label>
                                            <select id="complaint_member" name="complaint_member" multiple="multiple" class="form-control">
                                                <option value="">None</option>
                                                <?php
                                                foreach($MyFriend->result AS $my_friend) {
                                                    echo '<option value="'.$my_friend->user_profile_detail->profile->UserProfileId.'">'.$my_friend->user_profile_detail->profile->FirstName." ".$my_friend->user_profile_detail->profile->LastName.'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="files"
                                                                       class="control-label">Select Files</label>
                                            <input type="file" name="file[]" id="select_files" class="form-control fileUploadForm" multiple="true" /><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" id="previewImage">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group" style="float: right;">
                                            <button type="submit" class="btn btn-success complaint_button">Submit&nbsp;<i class="fa fa-chevron-circle-right"></i></button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            <!--END CONTENT--></div>
        <!--BEGIN FOOTER-->
        
        <?php  require_once './include/footer.php';?>

        <!--END FOOTER--><!--END PAGE WRAPPER--></div>
</div>
<script src="<?php echo base_url(); ?>assets/js/sweetalert-dev.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script> 

<script src="<?=base_url();?>assets/js/jquery-1.10.2.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="<?=base_url();?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
<script src="<?=base_url();?>assets/js/html5shiv.js"></script>
<script src="<?=base_url();?>assets/js/respond.min.js"></script>
<script src="<?=base_url();?>assets/vendors/metisMenu/jquery.metisMenu.js"></script>
<script src="<?=base_url();?>assets/vendors/slimScroll/jquery.slimscroll.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-cookie/jquery.cookie.js"></script>
<script src="<?=base_url();?>assets/vendors/iCheck/icheck.min.js"></script>
<script src="<?=base_url();?>assets/vendors/iCheck/custom.min.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-notific8/jquery.notific8.min.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-highcharts/highcharts.js"></script>
<script src="<?=base_url();?>assets/js/jquery.menu.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-pace/pace.min.js"></script>
<script src="<?=base_url();?>assets/vendors/holder/holder.js"></script>
<script src="<?=base_url();?>assets/vendors/responsive-tabs/responsive-tabs.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-news-ticker/jquery.newsTicker.min.js"></script>
<script src="<?=base_url();?>assets/vendors/moment/moment.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!--CORE JAVASCRIPT-->
<script src="<?=base_url();?>assets/js/main.js"></script>
<!--LOADING SCRIPTS FOR PAGE-->
<script src="<?=base_url();?>assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?=base_url();?>assets/vendors/moment/moment.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-clockface/js/clockface.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-maskedinput/jquery-maskedinput.js"></script>
<script src="<?=base_url();?>assets/vendors/charCount.js"></script>
<script src="<?=base_url();?>assets/js/form-components.js"></script>



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
    }

    var selDiv = "";
        
    document.addEventListener("DOMContentLoaded", init, false);
    
    function init() {
        document.querySelector('#select_files').addEventListener('change', handleFileSelect, false);
        selDiv = document.querySelector("#previewImage");
    }
        
    function handleFileSelect(e) {
        
        if(!e.target.files || !window.FileReader) return;

        selDiv.innerHTML = "";
        
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        var i = j = 0;
        filesArr.forEach(function(f) {
            var f = files[i];
            /*if(!f.type.match("image.*")) {
                //return;

            } else {*/

                var file_type_array = {
                                        'video/mp4'             : 'default-mp4-file.png',
                                        'application/pdf'       : 'default-pdf-file.png',
                                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document' : 'default-doc-file.png',
                                        'application/msword'    : 'default-doc-file.png',
                                        'text/plain'            : 'default-txt-file.png',
                                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' : 'default-xls-file.png',
                                        'application/vnd.ms-excel'  : 'default-xls-file.png'
                                        };

                var reader = new FileReader();
                reader.onload = function (e) {
                    //var html = '<img src="' + e.target.result + '" style="width: 100px; height: 100px">' + f.name + '<br clear="left"/>';

                    if(f.type.match('image')) {
                        var html = '<div class="col-md-1 file_display"><p>'+(j+1)+'</p><img src="' + e.target.result + '" style="width: 60px; height: 60px; margin: 0 10px 10px 0;"><br />' + f.name + '</div>';
                    } else {

                        var default_image = '<?php echo base_url();?>assets/images/default-file.png';
                        $.each(file_type_array, function( index, value ) {
                            if(index == f.type) {
                                default_image = '<?php echo base_url();?>assets/images/'+file_type_array[index];
                            }
                        });
                        var html = '<div class="col-md-1 file_display"><p>'+(j+1)+'</p><img src="'+default_image+'" style="width: 60px; height: 60px; margin: 0 10px 10px 0;"><br />' + f.name + '</div>';
                    }
                    j++;
                    selDiv.innerHTML += html;   
                                
                }
                reader.readAsDataURL(f); 
            //}
            i++;
        });
        
    }


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