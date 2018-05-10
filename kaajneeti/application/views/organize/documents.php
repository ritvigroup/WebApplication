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
                                <ol class="breadcrumb page-breadcrumb">
                                    <li><a href="<?=base_url();?>organize/team">Team</a></li>
                                    <li class="activelink"><a href="<?=base_url();?>organize/documents">Document</a>&nbsp;&nbsp;</li>
                                </ol>
                            </div>

                            <div class="portlet-body">
                                <div class="row mbm">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="folder_id" class="control-label">Select Folder</label>
                                            <select name="folder_id" id="folder_id" class="form-control">
                                                <option value="">-Select-</option>
                                                <?php foreach($DocumentFolder->result AS $key => $val) { ?>
                                                <option value="<?php echo $val->DocumentFolderId; ?>"><?php echo $val->DocumentFolderName; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="files"
                                                                       class="control-label">Select Documents</label>
                                            <input type="file" name="file[]" class="form-control fileUploadForm" multiple="true"/><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"><button type="submit" class="btn btn-success document_button">Submit&nbsp;<i class="fa fa-chevron-circle-right"></i></button></div>

                            </div>

                            <div class="portlet-body">

                                <div class="row"> 
                                        
                                       <div class="col-md-1"> <i class="fa fa-folder fa-4x" aria-hidden="true" style="color: #e5cb5c;"></i><br>Folder</div>
                                        
                                        <div class="col-md-1"><i class="fa fa-folder fa-4x" aria-hidden="true" style="color: #e5cb5c;"></i><br>Folder</div>
                                        <div class="col-md-1"><i class="fa fa-folder fa-4x" aria-hidden="true" style="color: #e5cb5c;"></i><br>Folder</div>


                                        <div class="col-md-1"><i class="fa fa-folder fa-4x" aria-hidden="true" style="color: #e5cb5c;"></i><br>Folder</div>
                                        <div class="col-md-1"><i class="fa fa-folder fa-4x" aria-hidden="true" style="color: #e5cb5c;"></i><br>Folder</div>
                                        <div class="col-md-1"><i class="fa fa-folder fa-4x" aria-hidden="true" style="color: #e5cb5c;"></i><br>Folder</div>


                                        <div class="col-md-1"><i class="fa fa fa-folder fa-4x" aria-hidden="true" style="color: #e5cb5c;"></i><br>Folder</div>
                                        
                                        <div class="col-md-1"><i class="fa fa fa-folder fa-4x" aria-hidden="true" style="color: #e5cb5c;"></i><br>Folder</div>
                                        <div class="col-md-1"><i class="fa fa-folder fa-4x" aria-hidden="true" style="color: #e5cb5c;"></i><br>Folder</div>


                                        <div class="col-md-1"><i class="fa fa fa-folder fa-4x" aria-hidden="true" style="color: #e5cb5c;"></i><br>Folder</div>
                                        <div class="col-md-1"><i class="fa fa fa-folder fa-4x" aria-hidden="true" style="color: #e5cb5c;"></i><br>Folder</div>
                                        <div class="col-md-1"><i class="fa fa-folder fa-4x" aria-hidden="true" style="color: #e5cb5c;"></i><br>Folder</div>
                                </div>
                                <h3 class="mbxl">Documents</h3>
                                <div class="table-responsive">
                                    <table id="user-last-logged-table"
                                           class="table table-striped table-hover thumb-small">
                                        <thead>
                                        <tr class="condensed">
                                            <th scope="col"><span class="column-sorter"></span></th>
                                            <th scope="col">Name<span class="column-sorter"></span></th>
                                            <th scope="col">Folder<span class="column-sorter"></span></th>
                                            <th scope="col">Download<span class="column-sorter"></span></th>
                                            <th scope="col">Added On<span class="column-sorter"></span></th>
                                        </tr>
                                        </thead>
                                        <tbody class="media-thumb">
                                            <?php foreach($Document->result AS $key => $val) { ?>
                                            <tr>
                                                <td></td>
                                                <td><?php echo $val->DocumentName; ?></td>
                                                <td><?php echo $val->DocumentFolderName; ?></td>
                                                <td>Download</td>
                                                <td>
                                                    <ul class="data">
                                                        <li><strong class="user-list-ip"><?php echo $val->AddedOn; ?></strong></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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

    document.querySelector('.document_button').onclick = function () {
        var $this = $(this);
        var folder_id          = $("#folder_id").val();


        if (folder_id > 0) {
            $this.button('Uploading...');

            
            var form_data = new FormData($('input[name^="file"]'));

            var files_selected = 0;
            jQuery.each($('input[name^="file[]"]')[0].files, function(i, file) {
                form_data.append('file[]', file);
                files_selected++;
            });

            if(files_selected > 0) {
                form_data.append('folder_id', folder_id);

                jQuery.ajax({
                    type: 'POST',
                    cache: false,
                    processData: false,
                    contentType: false,
                    data: form_data,
                    url: "<?php echo base_url(); ?>organize/documents",

                    success: function(data) {
                        if (data.status === "failed") {
                            sweetAlert("Oops...", data.message, "error");
                            return false;
                        } else { 
                            $this.button('Submit');
                            if (data.status === "success") {
                                window.location.href="documents";
                            }
                        }
                    }
                });
            } else {
                sweetAlert("Oops...", "Please select atleast one file", "error");
                return false;
            }

        } else {
            sweetAlert("Oops...", "Please select any folder", "error");
            return false;
        }
    };
</script> 

</body>
</html>