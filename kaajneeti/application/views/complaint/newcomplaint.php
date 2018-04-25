<!DOCTYPE html>
<html lang="en">
<head><title>New Complaint</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <?php  require_once './include/css.php';?>

    <style>
    .file_display { float: left;overflow: hidden; width: 80px; height: 100px;border: 1px solid #f9efef; margin: 0 10px 10px 0;padding: 5px; }
    .file_display p {position: absolute; padding: 0px 4px; background: #333; color: white; top: 0; left: 0;}
    </style>

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
                                <ol class="breadcrumb page-breadcrumb">
                                    <?php echo $this->complaint_links; ?>
                                </ol>
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