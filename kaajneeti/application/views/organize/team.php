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
                                    <li class="activelink"><a href="javascript:void(0);">My Team</a></li>
                                    <li><a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newTeam();">New Team</a></li>
                                    <?php /*<li><a href="<?=base_url();?>organize/documents">Document</a>&nbsp;&nbsp;</li>*/ ?>
                                </ol>
                            </div>

                            <div class="portlet-body">
                                <div class="row mbm">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead>
                                                    <tr>
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
                                                            $Status = ($my_team->ProfileStatus == 1) ? 'Active' : (($my_team->ProfileStatus == 2) ? 'In-Active' :'Not Accepted');
                                                            $StatusColor = ($my_team->ProfileStatus == 1) ? 'green' : (($my_team->ProfileStatus == 2) ? 'red' :'blue');

                                                            $UserProfileHrefLink = base_url().'profile/subprofile/'.$my_team->UserUniqueId.'/'.$my_team->UserProfileId;

                                                            if($my_team->ProfilePhotoPath != '') {
                                                                $profile_pic = ($my_team->ProfilePhotoPath != '') ? $my_team->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                            } else {
                                                                $profile_pic = ($my_team->ProfilePhotoPath != '') ? $my_team->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                            }

                                                            ?>
                                                            <tr>
                                                                <td><img src="<?php echo $profile_pic; ?>" style="border: 1px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);width: 50px; height: 50px;" class="img-circle"/></td>
                                                                <td><a href="<?php echo $UserProfileHrefLink; ?>" target="_blank"><?php echo $my_team->FirstName.' '.$my_team->LastName; ?></a></td>
                                                                <td><?php echo $my_team->Email; ?></td>
                                                                <td><?php echo $my_team->DepartmentName; ?></td>
                                                                <td><span class="btn <?php echo $StatusColor; ?> btn-xs"><?php echo $Status; ?></span></td>
                                                                <td><?php echo $my_team->AddedOn; ?></td>
                                                                <td>
                                                                    <button type="button" class="btn btn-default btn-xs" data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return editTeam('<?php echo $my_team->UserUniqueId; ?>', '<?php echo $my_team->UserProfileId; ?>');"><i
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
                    
                    

                </div>
            </div>
        </div>
    </div>

</div>    
    <?php  require_once './include/scroll_top.php';?>

<?php  require_once './include/footer.php';?>


<div id="modal-stackable" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            
        </div>
    </div>
</div>

</body>

<?php  require_once './include/js.php';?>


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


    function editTeam(unique_profile_id, friend_user_profile_id) {

        $.post("<?php echo base_url(); ?>organize/editTeam/"+unique_profile_id+'/'+friend_user_profile_id, {'display': 'Y'},
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