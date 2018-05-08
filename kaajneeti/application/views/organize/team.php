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
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Organize</h3>
                                    </div>


                                    <div class="actions action-right">
                                        <div class="dropdown">
                                            <button onclick="myFunction()" class="dropbtn"><!-- <i class="fa fa-plus-circle"></i> -->&nbsp;Manage <span class="caret"></span>   </button>&nbsp;
                                            <div id="myDropdown" class="dropdown-content">
                                                <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newTeam();"> New Team</a>
                                                <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newFleet();"> New Fleet</a>
                                                <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newDocument();"> New Documents</a>
                                                <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newGroup();"> New Group</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="portlet-body">

                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#team">Team</a></li>
                                    <li><a data-toggle="tab" href="#fleet"> Fleet</a></li>
                                    <li><a data-toggle="tab" href="#documents"> Documents</a></li>
                                    <li><a data-toggle="tab" href="#group">Group</a></li>

                                </ul>

                                <div class="tab-content">
                                    <div id="team" class="tab-pane fade in active">

                                        <div class="row">
                                            <div class="col-md-9">
                                            </div>

                                            <div class="col-md-3 main_drp_links" style="float: right;">
                                                <div class="dropdown ">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Active Users
                                                        <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#" id="user">Active Users</a></li>
                                                        <li><a href="#">Inactive Users</a></li>
                                                        <li><a href="#">Unconfirmed Users</a></li>
                                                        <li><a href="#">Deleted Users</a></li>
                                                        <li><a href="#" id="activate_user">Activate Users</a></li>
                                                    </ul>
                                                </div>

                                                <div class="dropdown  ractive-user">
                                                    <div class="dropdown  organize-user ">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                        <ul class="dropdown-menu " >

                                                            <li><a href="#">Task</a></li>
                                                            <li><a href="#">Call</a></li>
                                                            <li><a href="#">Event</a></li>
                                                            <li><a href="#" id="">Text</a></li>
                                                        </ul>
                                                    </div>
                                                </div>




                                                <div class="dropdown  organize-user active-user">
                                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="dropdown-menu organize-user">
                                                        <li><a href="#">Deactivate</a></li>
                                                        <li><a href="#">Delete </a></li>
                                                        <li><a href="#">active</a></li>
                                                        <li><a href="#">Text</a></li>
                                                        <li><a href="#" id="">Unconfirmed</a></li>
                                                        <li><a href="#" id="">Print</a></li>
                                                        <li><a href="#" id=""> export to PDF</a></li>
                                                        <li><a href="#" id="">export to excel</a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 " >
                                                    <div class="table-responsive">
                                                        <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
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
                                                                $Status = ($my_team->ProfileStatus == 1) ? 'Active' : 'Not Accepted';

                                                                $UserProfileHrefLink = base_url().'profile/subprofile/'.$my_team->user_profile_detail->user_info->UserUniqueId.'/'.$my_team->UserProfileId;

                                                                if($my_team->ProfilePhotoPath != '') {
                                                                    $profile_pic = ($my_team->ProfilePhotoPath != '') ? $my_team->ProfilePhotoPath : base_url().'assets/images/default-user.png';
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
                                                                    <td><a href="<?php echo $UserProfileHrefLink; ?>" target="_blank"><?php echo $my_team->FirstName.' '.$my_team->LastName; ?></a></td>
                                                                    <td><?php echo $my_team->Email; ?></td>
                                                                    <td><?php echo $my_team->DepartmentName; ?></td>
                                                                    <td><?php echo $Status; ?></td>
                                                                    <td><?php echo $my_team->AddedOn; ?></td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-default btn-xs"><i
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


                                    <div id="fleet" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-md-9">
                                            </div>

                                            <div class="col-md-3 main_drp_links" style="float: right;">
                                                <div class="dropdown ">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Active Fleet
                                                        <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#" id="user">Active Fleet</a></li>
                                                        <li><a href="#">Inactive Fleet</a></li>
                                                        <li><a href="#">Unconfirmed Fleet</a></li>
                                                        <li><a href="#">Deleted Fleet</a></li>
                                                        <li><a href="#" id="activate_user">Activate Fleet</a></li>
                                                    </ul>
                                                </div>

                                                <div class="dropdown  ractive-user">
                                                    <div class="dropdown  organize-user ">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                        <ul class="dropdown-menu " >

                                                            <li><a href="#">Task</a></li>
                                                            <li><a href="#">Call</a></li>
                                                            <li><a href="#">Event</a></li>
                                                            <li><a href="#" id="">Text</a></li>
                                                        </ul>
                                                    </div>
                                                </div>




                                                <div class="dropdown  organize-user active-user">
                                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="dropdown-menu organize-user">
                                                        <li><a href="#">Deactivate</a></li>
                                                        <li><a href="#">Delete </a></li>
                                                        <li><a href="#">active</a></li>
                                                        <li><a href="#">Text</a></li>
                                                        <li><a href="#" id="">Unconfirmed</a></li>
                                                        <li><a href="#" id="">Print</a></li>
                                                        <li><a href="#" id=""> export to PDF</a></li>
                                                        <li><a href="#" id="">export to excel</a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 " >
                                                    <div class="table-responsive">
                                                        <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
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
                                                                $Status = ($my_team->ProfileStatus == 1) ? 'Active' : 'Not Accepted';

                                                                $UserProfileHrefLink = base_url().'profile/subprofile/'.$my_team->user_profile_detail->user_info->UserUniqueId.'/'.$my_team->UserProfileId;

                                                                if($my_team->ProfilePhotoPath != '') {
                                                                    $profile_pic = ($my_team->ProfilePhotoPath != '') ? $my_team->ProfilePhotoPath : base_url().'assets/images/default-user.png';
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
                                                                    <td><a href="<?php echo $UserProfileHrefLink; ?>" target="_blank"><?php echo $my_team->FirstName.' '.$my_team->LastName; ?></a></td>
                                                                    <td><?php echo $my_team->Email; ?></td>
                                                                    <td><?php echo $my_team->DepartmentName; ?></td>
                                                                    <td><?php echo $Status; ?></td>
                                                                    <td><?php echo $my_team->AddedOn; ?></td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-default btn-xs"><i
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

                                    <div id="documents"  class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-md-9">
                                            </div>

                                            <div class="col-md-3 main_drp_links" style="float: right;">
                                                <div class="dropdown ">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Active Document
                                                        <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#" id="user">Active Document</a></li>
                                                        <li><a href="#">Inactive Document</a></li>
                                                        <li><a href="#">Unconfirmed Document</a></li>
                                                        <li><a href="#">Deleted Document</a></li>
                                                        <li><a href="#" id="activate_user">Activate Document</a></li>
                                                    </ul>
                                                </div>

                                                <div class="dropdown  ractive-user">
                                                    <div class="dropdown  organize-user ">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                        <ul class="dropdown-menu " >

                                                            <li><a href="#">Task</a></li>
                                                            <li><a href="#">Call</a></li>
                                                            <li><a href="#">Event</a></li>
                                                            <li><a href="#" id="">Text</a></li>
                                                        </ul>
                                                    </div>
                                                </div>




                                                <div class="dropdown  organize-user active-user">
                                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="dropdown-menu organize-user">
                                                        <li><a href="#">Deactivate</a></li>
                                                        <li><a href="#">Delete </a></li>
                                                        <li><a href="#">active</a></li>
                                                        <li><a href="#">Text</a></li>
                                                        <li><a href="#" id="">Unconfirmed</a></li>
                                                        <li><a href="#" id="">Print</a></li>
                                                        <li><a href="#" id=""> export to PDF</a></li>
                                                        <li><a href="#" id="">export to excel</a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 " >
                                                    <div class="table-responsive">
                                                        <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
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
                                                                $Status = ($my_team->ProfileStatus == 1) ? 'Active' : 'Not Accepted';

                                                                $UserProfileHrefLink = base_url().'profile/subprofile/'.$my_team->user_profile_detail->user_info->UserUniqueId.'/'.$my_team->UserProfileId;

                                                                if($my_team->ProfilePhotoPath != '') {
                                                                    $profile_pic = ($my_team->ProfilePhotoPath != '') ? $my_team->ProfilePhotoPath : base_url().'assets/images/default-user.png';
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
                                                                    <td><a href="<?php echo $UserProfileHrefLink; ?>" target="_blank"><?php echo $my_team->FirstName.' '.$my_team->LastName; ?></a></td>
                                                                    <td><?php echo $my_team->Email; ?></td>
                                                                    <td><?php echo $my_team->DepartmentName; ?></td>
                                                                    <td><?php echo $Status; ?></td>
                                                                    <td><?php echo $my_team->AddedOn; ?></td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-default btn-xs"><i
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


                                    <div id="group" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-md-9">
                                            </div>

                                            <div class="col-md-3 main_drp_links" style="float: right;">
                                                <div class="dropdown ">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Active Group
                                                        <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#" id="user">Active Group</a></li>
                                                        <li><a href="#">Inactive Group</a></li>
                                                        <li><a href="#">Unconfirmed Group</a></li>
                                                        <li><a href="#">Deleted Group</a></li>
                                                        <li><a href="#" id="activate_user">Activate Group</a></li>
                                                    </ul>
                                                </div>

                                                <div class="dropdown  ractive-user">
                                                    <div class="dropdown  organize-user ">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                        <ul class="dropdown-menu " >

                                                            <li><a href="#">Task</a></li>
                                                            <li><a href="#">Call</a></li>
                                                            <li><a href="#">Event</a></li>
                                                            <li><a href="#" id="">Text</a></li>
                                                        </ul>
                                                    </div>
                                                </div>




                                                <div class="dropdown  organize-user active-user">
                                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="dropdown-menu organize-user">
                                                        <li><a href="#">Deactivate</a></li>
                                                        <li><a href="#">Delete </a></li>
                                                        <li><a href="#">active</a></li>
                                                        <li><a href="#">Text</a></li>
                                                        <li><a href="#" id="">Unconfirmed</a></li>
                                                        <li><a href="#" id="">Print</a></li>
                                                        <li><a href="#" id=""> export to PDF</a></li>
                                                        <li><a href="#" id="">export to excel</a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 " >
                                                    <div class="table-responsive">
                                                        <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
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
                                                                $Status = ($my_team->ProfileStatus == 1) ? 'Active' : 'Not Accepted';

                                                                $UserProfileHrefLink = base_url().'profile/subprofile/'.$my_team->user_profile_detail->user_info->UserUniqueId.'/'.$my_team->UserProfileId;

                                                                if($my_team->ProfilePhotoPath != '') {
                                                                    $profile_pic = ($my_team->ProfilePhotoPath != '') ? $my_team->ProfilePhotoPath : base_url().'assets/images/default-user.png';
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
                                                                    <td><a href="<?php echo $UserProfileHrefLink; ?>" target="_blank"><?php echo $my_team->FirstName.' '.$my_team->LastName; ?></a></td>
                                                                    <td><?php echo $my_team->Email; ?></td>
                                                                    <td><?php echo $my_team->DepartmentName; ?></td>
                                                                    <td><?php echo $Status; ?></td>
                                                                    <td><?php echo $my_team->AddedOn; ?></td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-default btn-xs"><i
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php  require_once './include/scroll_top.php';?>
    <?php  require_once './include/footer.php';?>
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

    function newFleet() {

        $.post("<?php echo base_url(); ?>organize/newFleet", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    }

    function newDocument() {

        $.post("<?php echo base_url(); ?>organize/newDocument", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    }

    function newGroup() {

        $.post("<?php echo base_url(); ?>organize/newGroup", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    }
</script>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
    var myDropdown = document.getElementById("myDropdown");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
  }
}
</script>

<script>
$(document).ready(function(){

$("#activate_user").click(function(){
    $("#activate").show();
});
$(".nav-tabs li a").click(function(){
    $('#activate').css("display","none");
});

   $("#user").click(function(){
    $("#user2").show();
});

       $(".nav-tabs li a").click(function(){
    $('#user2').css("display","none");
});



  



});
</script>

</body>
</html>