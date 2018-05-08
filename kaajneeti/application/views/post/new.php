<!DOCTYPE html>
<html lang="en">
<head><title>Search</title>
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
                                <div class="caption">New Post</div>
                            </div>
                            <div class="portlet-body">
                                

                                <h3 class="mbxl">Save Your New Post</h3>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="post_name"
                                                                       class="control-label">Title <span
                                                class='require'>*</span></label><input id="post_name" name="post_name"
                                                                                       type="text"
                                                                                       placeholder="Post Title"
                                                                                       class="form-control"/><i
                                                class="alert alert-hide">Oops! Forgot something? Let try
                                            again.</i>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="post_description" class="control-label">Description</label>
                                            <textarea
                                                id="post_description" name="post_description" type="text" placeholder="Post Description"
                                                class="form-control"/></textarea>
                                            <i class="alert alert-hide">Oops! Forgot something? Let try again.</i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="post_location"
                                                                       class="control-label">Location <span
                                                class='require'>*</span></label><input id="post_location" name="post_location"
                                                                                       type="text"
                                                                                       placeholder="Post Location"
                                                                                       class="form-control"/><i
                                                class="alert alert-hide">Oops! Forgot something? Let try
                                            again.</i>
                                        </div>
                                    </div>
                                    
                                </div>
                                    


                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="search_attendee"
                                                                       class="control-label">Search</label>
                                            <input id="search_attendee" type="text" name="search" placeholder="search.." class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label>&nbsp;</label><input type="button" class="search_button" value="Search"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="post_attendee"
                                                                       class="control-label">Tag</label><select
                                                id="post_attendee" name="post_attendee" multiple class="form-control">
                                            <option value="">Tag People</option>
                                        </select></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="files" class="control-label">Select Photo</label>
                                            <input type="file" name="file[]" class="form-control fileUploadForm" multiple="true"/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group"><button type="submit" class="btn btn-success post_button">Submit&nbsp;<i class="fa fa-chevron-circle-right"></i></button></div>
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
    document.querySelector('.search_button').onclick = function () {
        var search_attendee = $("#search_attendee").val();

        if (search_attendee.length > 0) {
            //var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

            $.post("<?php echo base_url(); ?>leader/searchLeaderProfiles", {search: search_attendee},
                function (data, status) {

                    if(data != '') {
                        $('#post_attendee').html(data);
                    } else {
                        $('#post_attendee').html('<option value="">No Leader Found</option>');
                    }
                });
        } else {
            sweetAlert("Oops...", "Please enter something to search leaders", "error");
            return false;
        }
    };


    document.querySelector('.post_button').onclick = function () {
        var $this = $(this);
        var post_name          = $("#post_name").val();
        var post_description   = $("#post_description").val();
        var post_location      = $("#post_location").val();


        if (post_name.length > 0) {

            var post_attendeea = '';
            $('#post_attendee :selected').each(function(i, selected) {
                post_attendeea += $(selected).val()+',';
            });
            
            var form_data = new FormData($('input[name^="file"]'));

            jQuery.each($('input[name^="file[]"]')[0].files, function(i, file) {
                form_data.append('file[]', file);
            });

            form_data.append('title', post_name);
            form_data.append('description', post_description);
            form_data.append('location', post_location);
            form_data.append('post_tag', post_attendeea);

            jQuery.ajax({
                type: 'POST',
                cache: false,
                processData: false,
                contentType: false,
                data: form_data,
                url: "<?php echo base_url(); ?>post/newpost",

                success: function(data) {
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else { 
                        $this.button('Submit');
                        if (data.status === "success") {
                            window.location.href="post";
                        }
                    }
                }
            });

        } else {
            sweetAlert("Oops...", "Please enter post title", "error");
            return false;
        }
    };
</script> 

</body>
</html>