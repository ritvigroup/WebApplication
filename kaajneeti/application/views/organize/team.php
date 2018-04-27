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
                            <?php /*
                            <div class="portlet-header">
                                <h1>My Team</h1>
                                <div class="actions">
                                    <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" class="btn btn-info btn-xs" onClick="return newTeam();"><i class="fa fa-plus"></i>&nbsp;New Team</a>&nbsp;
                                    <a href="<?=base_url();?>organize/fleet" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;Fleet</a>&nbsp;
                                    <a href="<?=base_url();?>organize/documents" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;Documents</a>&nbsp;
                                </div>
                            </div>
                            */ ?>

                            <div class="portlet-header">
                                <ol class="breadcrumb page-breadcrumb">
                                    <li class="activelink"><a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newTeam();">New Team</a></li>
                                    <li><a href="<?=base_url();?>organize/documents">Document</a>&nbsp;&nbsp;</li>
                                </ol>
                            </div>

                            <div class="portlet-body">
                                <div class="row mbm">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table id="table_id"
                                                   class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead>
                                                <tr>
                                                    <th style="width: 3%; padding: 10px; background: #efefef"><input
                                                            type="checkbox" class="checkall"/></th>
                                                    <th>Pic</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Department</th>
                                                    <th>Status</th>
                                                    <th>Added On</th>
                                                    <th>Action</th>

                                                </tr>

                                                <?php 
                                                if(count($MyTeam->result) > 0) { ?>
                                                <tbody>
                                                <?php foreach($MyTeam->result AS $my_team) { ?>
                                                    <?php
                                                    $Status = ($my_team->user_profile_detail->profile->ProfileStatus == 1) ? 'Active' : 'Not Accepted';

                                                    $UserProfileHrefLink = base_url().'profile/subprofile/'.$my_team->user_profile_detail->user_info->UserUniqueId.'/'.$my_team->user_profile_detail->profile->UserProfileId;

                                                    if($my_team->user_profile_detail->profile->ProfilePhotoPath != '') {
                                                        $profile_pic = ($my_team->user_profile_detail->profile->ProfilePhotoPath != '') ? $my_team->user_profile_detail->profile->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                    } else {
                                                        $profile_pic = ($my_team->user_profile_detail->user_info->ProfilePhotoPath != '') ? $my_team->user_profile_detail->user_info->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                    }

                                                    ?>
                                                    <tr>
                                                        <td><input type="checkbox"/></td>
                                                        <td><img
                                                    src="<?php echo $profile_pic; ?>"
                                                    style="border: 1px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);width: 50px; height: 50px;"
                                                    class="img-circle"/></td>
                                                        <td><a href="<?php echo $UserProfileHrefLink; ?>" target="_blank"><?php echo $my_team->user_profile_detail->profile->FirstName.' '.$my_team->user_profile_detail->profile->LastName; ?></a></td>
                                                        <td><?php echo $my_team->user_profile_detail->profile->Email; ?></td>
                                                        <td><?php echo $my_team->user_profile_detail->profile->DepartmentName; ?></td>
                                                        <td><?php echo $Status; ?></td>
                                                        <td><?php echo $my_team->user_profile_detail->profile->AddedOn; ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-default btn-xs" data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return editTeam('<?php echo $my_team->user_profile_detail->user_info->UserUniqueId; ?>');"><i
                                                                    class="fa fa-edit"></i>&nbsp;
                                                                Edit
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                
                                                </tbody>
                                                <?php }  ?> 
                                                </thead>
                                            </table>
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


    function editTeam(unique_profile_id) {

        $.post("<?php echo base_url(); ?>organize/editTeam/"+unique_profile_id, {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    }
</script>

</body>
</html>