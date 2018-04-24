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
                    <div class="col-md-12">
                        <div class="portlet box">
                            <div class="portlet-header">
                                <h1>Search Profile</h1>
                                <div class="actions">
                                    <?php echo $this->plan_links; ?>
                                </div>
                            </div>


                            <div class="portlet-body pan">
                                <div class="table-responsive">
                                    <table id="user-last-logged-table"
                                           class="table table-striped table-hover thumb-small">
                                        <tr>
                                            <td>Search:</td>
                                            <td><input type="text" id="search_text" class="form-control" autocomplete="off"></td>
                                        </tr>
                                        <tr>
                                            <td>Gender:</td>
                                            <td>
                                                <select id="gender" class="form-control">
                                                    <option value="">-All-</option>
                                                    <?php foreach($Gender AS $gender) { ?>
                                                    <option value="<?php echo $gender->GenderId; ?>"><?php echo $gender->GenderName; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Political Party:</td>
                                            <td>
                                                <select id="political_party" class="form-control">
                                                    <option value="">-All-</option>
                                                    <?php foreach($PoliticalParty AS $political_party) { ?>
                                                    <option value="<?php echo $political_party->PoliticalPartyId; ?>"><?php echo $political_party->PoliticalPartyName; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><input type="button" value="Search" onClick="return searchLeader();"></td>
                                        </tr>
                                        
                                        
                                    </table>
                                </div>
                            </div>
                            <div class="table-responsive" id="search_result_show">
                                <div class="portlet-body">
                                    <div class="row mbm">
                                        <div class="col-lg-12">
                                            <h3>Search Result</h3>
                                            <div class="table-responsive">
                                                <table id="table_id"
                                                       class="table table-hover table-striped table-bordered table-advanced tablesorter display">

                                                </table>
                                            </div>
                                        </div>
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
function searchLeader() {
    var search_text         = $('#search_text').val();
    var gender              = $('#gender').val();
    var political_party     = $('#political_party').val();
    if (search_text != '' || gender != '' || political_party != '') {
        
        $.post("<?php echo base_url(); ?>connect/search_result", {search_text: search_text, gender: gender, political_party: political_party, },
            function (data, status) {

               if (data.status === "failed") {
                    
                    sweetAlert("Error", data.message, "error");
                    return false;
                } else {
                    $('#table_id').html(data);
                }

                $('#table_id').DataTable();
            });
    } else {
        sweetAlert("Error", "Please enter or select something to search", "error");
        return false;
    }
}

function deleteRequest(id) {

    if (id > 0) {
        $.post("<?php echo base_url(); ?>connect/cancelUserProfileFriendRequest", {id: id},
            function (data, status) {

               if (data.status === "failed") {
                    
                    sweetAlert("Error", data.message, "error");
                    return false;
                } else {
                    $('#request_id_'+id).html('<button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>&nbsp;  Request Deleted</button>');
                }
            });
    } else {
        sweetAlert("Error", "Please select user to cancel", "error");
        return false;
    }
}

function sendRequest(id) {

    if (id > 0) {
        $.post("<?php echo base_url(); ?>connect/sendUserProfileFriendRequest", {id: id},
            function (data, status) {

               if (data.status === "failed") {
                    
                    sweetAlert("Error", data.message, "error");
                    return false;
                } else {
                    $('#request_id_'+id).html('<button type="button" class="btn btn-success btn-xs"><i class="fa fa-trash-o"></i>&nbsp;Request Sent</button>');
                }
            });
    } else {
        sweetAlert("Error", "Please select user to accept request", "error");
        return false;
    }
}


function acceptRequest(id) {

    if (id > 0) {
        $.post("<?php echo base_url(); ?>connect/sendUserProfileFriendRequest", {id: id},
            function (data, status) {

               if (data.status === "failed") {
                    
                    sweetAlert("Error", data.message, "error");
                    return false;
                } else {
                    $('#request_id_'+id).html('<button type="button" class="btn btn-success btn-xs"><i class="fa fa-trash-o"></i>&nbsp;Friend</button>');
                }
            });
    } else {
        sweetAlert("Error", "Please select user to accept request", "error");
        return false;
    }
}

function unFriend(id) {

    if (id > 0) {
        $.post("<?php echo base_url(); ?>connect/sendUserProfileFriendRequest", {id: id},
            function (data, status) {

               if (data.status === "failed") {
                    
                    sweetAlert("Error", data.message, "error");
                    return false;
                } else {
                    $('#request_id_'+id).html('');
                }
            });
    } else {
        sweetAlert("Error", "Please select user to unfriend", "error");
        return false;
    }
}

function cancelRequest(id) {

    if (id > 0) {
        $.post("<?php echo base_url(); ?>connect/undoUserProfileFriendRequest", {id: id},
            function (data, status) {

               if (data.status === "failed") {
                    
                    sweetAlert("Error", data.message, "error");
                    return false;
                } else {
                    $('#request_id_'+id).html('<button type="button" class="btn btn-success btn-xs"><i class="fa fa-trash-o"></i>&nbsp;Request Cancelled</button>');
                }
            });
    } else {
        sweetAlert("Error", "Please select user to cancel", "error");
        return false;
    }
}
</script>

</body>
</html>