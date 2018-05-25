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

        <div class="page-content-wrapper animated fadeInRight">
            <div class="page-content">
                <div class="row  border-bottom white-bg dashboard-header">
                    <div class="col-md-12">
                        <div class="portlet box ">
                            <div class="portlet-header">
                                <ol class="breadcrumb">
                                    <li> <a class="text-capitalize" href="<?=base_url();?>leader/dashboard">Kaajneeti</a> </li>
                                    <li> <a class="text-capitalize" href="<?=base_url(); ?>organize/team">Organize</a> </li>
                                    <li class="active"><strong><a class="text-capitalize" href="<?=base_url(); ?>organize/team">Team</a> </strong> </li>
                                </ol>
                            </div>

                            <div class="portlet-body">
                                <div class="mbm">
                                    <div class="row head">
                                        <div class="user-heading">
                                            <div class="col-md-9 border_bottom">
                                                <div class="connections-tabs">
                                                    <ul class="connect-tab-menu">
                                                        <li class="active"><a href="<?=base_url();?>organize/team">Team</a></li>
                                                        <li><a href="<?=base_url();?>organize/fleet">Fleet</a></li>
                                                        <li><a href="<?=base_url();?>organize/document">Document</a></li>
                                                        <li><a href="<?=base_url();?>organize/document">Group</a></li>
                                                        <li><a href="<?=base_url();?>organize/document">Event</a></li>
                                                        <li><a href="<?=base_url();?>organize/document">Poll</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-3 border_bottom ">
                                                <div class="actions action-right margin_bottom">
                                                    <div class="dropdown">
                                                        <button onclick="myFunction()" class="dropbtn organize-button">&nbsp;Manage <span class="caret"></span>   </button>&nbsp;
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
                                    </div>
                                </div>
                            </div>

                            <div class="portlet-body">
                                <div id="team" class="active">
                                    <div class="row">
                                        <div class="col-md-8 ">
                                        </div>

                                        <div class="col-md-4 active-user">
                                            
                                            <div class="dropdown  ractive-user">
                                                <div class="dropdown  organize-user ">
                                                    <button class="btn btn-primary" type="button"  data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newTeam();"><i class="fa fa-plus" aria-hidden="true"></i>  New User
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="dropdown" id="organize-active">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="active-id"><i class="fa fa-user"></i> Active Users <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" id="all_user_div"><i class="fa fa-user"></i> All Users</a></li>
                                                    <li><a href="#" id="activate_user_div"><i class="fa fa-user"></i> Active Users</a></li>
                                                    <li><a href="#" id="inactivate_user_div"><i class="fa fa-user-slash"></i> Inactive Users</a></li>
                                                    <li><a href="#" id="not_accepted_user_div">Unconfirmed Users</a></li>
                                                    <!-- <li><a href="#">Deleted Users</a></li>
                                                    <li><a href="#">Activate Users</a></li> -->
                                                </ul>
                                            </div>

                                            <div class="dropdown  ractive-user">
                                                <div class="dropdown  organize-user ">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="dropdown-menu organize-user2 " >

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

                                                    <li><a href="#">Text</a></li>
                                                    <li><a href="#" id="">Print</a></li>
                                                    <li><a href="#" id=""> export to PDF</a></li>
                                                    <li><a href="#" id="">export to excel</a></li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <?php
                                    // echo '<pre>';
                                    // print_r($MyTeam);
                                    // echo '</pre>';
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12" id="team-table" >
                                            <div class="table-responsive">
                                                <?php /*<table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">*/ ?>

                                                <table class="table datatable dragable"
                                                                                       data-sort-name="attribute"
                                                                                       data-sort-order="asc"
                                                                                       data-show-toggle="true"
                                                                                       data-show-columns="true"
                                                                                       data-pagination="true"
                                                                                       data-show-pagination-switch="true">
                                                    <thead>
                                                        <tr>
                                                            <th><input type="checkbox" name="checkall" /></th>
                                                            <th data-field="img" data-sortable="true" data-visible="true">IMG</th>
                                                            <th data-field="name" data-sortable="true" data-visible="true">NAME</th>
                                                            <th data-field="email" data-sortable="true" data-visible="true">EMAIL</th>
                                                            <th data-field="username" data-sortable="true" data-visible="true">USERNAME</th>
                                                            <th data-field="role" data-sortable="true" data-visible="true">ROLE</th>
                                                            <th data-field="profile" data-sortable="true" data-visible="true">PARENT</th>
                                                            <th data-field="created" data-sortable="true" data-visible="true">CREATED</th>
                                                            <th data-field="status" data-sortable="true" data-visible="true">STATUS</th>
                                                            <th data-field="action" data-sortable="true" data-visible="true">ACTION</th>
                                                        </tr>

                                                    </thead>
                                                    <?php 
                                                    // echo '<pre>';
                                                    // print_r($MyTeam->result);
                                                    // echo '</pre>';
                                                    // die;
                                                    if(count($MyTeam->result) > 0) { ?>
                                                    <tbody>
                                                    <?php foreach($MyTeam->result AS $my_team) { ?>
                                                        <?php
                                                        $Status = ($my_team->ProfileStatus == 1) ? 'Active' : (($my_team->ProfileStatus == 2) ? 'In-Active' : 'Not Accepted');
                                                        $TrRowStatus = ($my_team->ProfileStatus == 1) ? 'activate_user_div' : (($my_team->ProfileStatus == 2) ? 'inactivate_user_div' : 'not_accepted_user_div');

                                                        $UserProfileHrefLink = base_url().'profile/subprofile/'.$my_team->UserUniqueId.'/'.$my_team->UserProfileId;
                                                        $UserProfileHrefLink = 'javascript:void(0);';

                                                        if($my_team->ProfilePhotoPath != '') {
                                                            $profile_pic = ($my_team->ProfilePhotoPath != '') ? $my_team->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                        } else {
                                                            $profile_pic = ($my_team->ProfilePhotoPath != '') ? $my_team->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                        }

                                                        ?>
                                                        <tr class="<?php echo $TrRowStatus; ?>">
                                                            <td><input type="checkbox" name="check_list[]" value="<?php echo $my_team->UserProfileId; ?>" /></td>
                                                            <td><img src="<?php echo $profile_pic; ?>" style="border: 1px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);width: 50px; height: 50px;" class="img-circle"/></td>
                                                            <td><a href="<?php echo $UserProfileHrefLink; ?>" onClick="return showUserDetail();"><?php echo $my_team->FirstName.' '.$my_team->LastName; ?></a></td>
                                                            <td><?php echo $my_team->Email; ?></td>
                                                            <td><?php echo $my_team->ProfileUserName; ?></td>
                                                            <td><?php echo $my_team->RoleName; ?></td>
                                                            <td><?php echo $my_team->RoleName; ?></td>
                                                            <td><?php echo $my_team->AddedOn; ?></td>
                                                            <td><?php echo $Status; ?></td>
                                                            <td>
                                                                <button type="button" class="btn btn-info btn-xs" data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return editTeam('<?php echo $my_team->UserUniqueId; ?>', '<?php echo $my_team->UserProfileId; ?>');"><i class="fa fa-edit"></i>&nbsp;Edit</button>
                                                                <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                                            </td>

                                                            
                                                        </tr>
                                                    <?php } ?>
                                                    
                                                    </tbody>
                                                    <?php }  ?> 
                                                </thead>
                                                </table>
                                            </div>
                                            <!-- User Information -->
                                            <div class="col-md-7 col-md-offset-3" id="user_detail" style="background-color: #fff; position: absolute;  top: 76px; right: 14px; height: 450px; overflow-y: scroll; display: none;">
                                                <div class="user-info">
                                                    <div class="row">
                                                        <div style="float: right;cursor: pointer;padding: 5px;" title="Close Me" onClick="return hideUserDetail();">X</div>

                                                        <div class="col-sm-12" id="display_user_detail">
                                                            
                                                            <!-- Show User Detail -->
                                                            
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
    </div>

<?php  require_once './include/footer.php';?>


<?php  require_once './include/scroll_top.php';?>

</body>

<?php  require_once './include/js.php';?>


<?php  require_once './include/organize/organize.php'; // For all javascript belongs to Organize ?>

<script>
    $(document).ready(function(){

        $("#all_user_div").click(function(){
            $(".activate_user_div").show();
            $(".inactivate_user_div").show();
            $(".not_accepted_user_div").show();
        });
        $("#activate_user_div").click(function(){
            $(".activate_user_div").show();
            $(".inactivate_user_div").hide();
            $(".not_accepted_user_div").hide();
        });
        $("#inactivate_user_div").click(function(){
            $(".activate_user_div").hide();
            $(".inactivate_user_div").show();
            $(".not_accepted_user_div").hide();
        });
        $("#not_accepted_user_div").click(function(){
            $(".activate_user_div").hide();
            $(".inactivate_user_div").hide();
            $(".not_accepted_user_div").show();
        });

        $(".bootstrap-table .dropdown-menu li").addClass('ui-state-default');

        $( ".bootstrap-table .dropdown-menu" ).sortable();

    });
</script>

<script type="text/javascript">

    $(document).ready(function(){

        $('#organize-active ul li').click(function(){

            var innerVAL =$(this).text();

            $('#active-id').text(innerVAL)
        })


        $('#organize-active2 ul li').click(function(){

            var innerVAL =$(this).text();

            $('#active-id2').text(innerVAL)
        })



        $('#organize-active3 ul li').click(function(){

            var innerVAL =$(this).text();

            $('#active-id3').text(innerVAL)
        })



        $('#organize-active4 ul li').click(function(){

            var innerVAL =$(this).text();

            $('#active-id4').text(innerVAL)
        })


        $('#organize-active5 ul li').click(function(){

            var innerVAL =$(this).text();

            $('#active-id5').text(innerVAL)
        })


        $('#organize-active6 ul li').click(function(){

            var innerVAL =$(this).text();

            $('#active-id6').text(innerVAL)
        })

    });
</script>


</body>
</html>