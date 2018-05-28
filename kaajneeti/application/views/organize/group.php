<!DOCTYPE html>
<html lang="en">
<head><title>Group</title>
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
                                    <li class="active"><strong><a class="text-capitalize" href="<?=base_url(); ?>organize/group">Group</a> </strong> </li>
                                </ol>
                            </div>

                            <?php  require_once './include/organize/organize_top.php';?>

                            <div class="portlet-body">
                                <div id="team" class="active">
                                    <div class="row">
                                        <div class="col-md-8 ">
                                        </div>

                                        <div class="col-md-4 active-user">
                                            
                                            <div class="dropdown  ractive-user">
                                                <div class="dropdown  organize-user ">
                                                    <button class="btn btn-primary" type="button"  data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newGroup();"><i class="fa fa-plus" aria-hidden="true"></i>  New Group
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="dropdown" id="organize-active">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="active-id"><i class="fa fa-user"></i> Active Group <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" id="all_user_div"><i class="fa fa-user"></i> All Group</a></li>
                                                    <li><a href="#" id="activate_user_div"><i class="fa fa-user"></i> Active Group</a></li>
                                                    <li><a href="#" id="inactivate_user_div"><i class="fa fa-user-slash"></i> Inactive Group</a></li>
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
                                    // print_r($MyGroup);
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
                                                            <th data-field="created" data-sortable="true" data-visible="true">CREATED</th>
                                                            <th>MEMEBERS</th>
                                                            <th>STATUS</th>
                                                            <th>ACTION</th>
                                                        </tr>

                                                    </thead>
                                                    <?php 
                                                    // echo '<pre>';
                                                    // print_r($MyGroup->result);
                                                    // echo '</pre>';
                                                    // die;
                                                    if(count($MyGroup->result) > 0) { ?>
                                                    <tbody>
                                                    <?php foreach($MyGroup->result AS $my_group) { ?>
                                                        <?php
                                                        $Status = ($my_group->FriendGroupStatus == 1) ? 'Active' : (($my_group->FriendGroupStatus == 0) ? 'In-Active' : 'Not Accepted');
                                                        $TrRowStatus = ($my_group->FriendGroupStatus == 1) ? 'activate_user_div' : (($my_group->FriendGroupStatus == 0) ? 'inactivate_user_div' : 'not_accepted_user_div');

                                                        $UserProfileHrefLink = base_url().'profile/subprofile/'.$my_group->UserUniqueId.'/'.$my_group->FriendGroupId;
                                                        $UserProfileHrefLink = 'javascript:void(0);';

                                                        if($my_group->FriendGroupPhoto != '') {
                                                            $profile_pic = ($my_group->FriendGroupPhoto != '') ? $my_group->FriendGroupPhoto : base_url().'assets/images/default-user.png';
                                                        } else {
                                                            $profile_pic = ($my_group->FriendGroupPhoto != '') ? $my_group->FriendGroupPhoto : base_url().'assets/images/default-user.png';
                                                        }

                                                        $total_members = count($my_group->GroupMembers);

                                                        ?>
                                                        <tr class="<?php echo $TrRowStatus; ?>">
                                                            <td><input type="checkbox" name="check_list[]" value="<?php echo $my_group->FriendGroupId; ?>" /></td>
                                                            <td><img src="<?php echo $profile_pic; ?>" style="border: 1px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);width: 50px; height: 50px;" class="img-circle"/></td>
                                                            <td><a href="<?php echo $UserProfileHrefLink; ?>" onClick="return showUserDetail();"><?php echo $my_group->FriendGroupName; ?></a></td>
                                                            <td><?php echo $my_group->AddedOn; ?></td>
                                                            <td><?php echo $total_members; ?> Member(s)</td>
                                                            <td><?php echo $Status; ?></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="btn aqua btn-outline btn-sm dropdown-toggle" type="button" id="connection-featuresMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-check"></i> Joined</button>
                                                                    <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="connection-featuresMenu">
                                                                        <li><a href="javascript:void(0);" onClick="return getGroupNotificationOnOff(<?php echo $my_group->FriendGroupId; ?>);" id="group_notification_id_<?php echo $my_group->FriendGroupId; ?>"><?php if($my_group->GroupMemeberDetail->GetNotification > 0) { echo '<i class="fa fa-check"></i>'; } ?> Get Notification</a></li>
                                                                        <li><a href="javascript:void(0);" onClick="return exitMeFromFriendgroup(<?php echo $my_group->FriendGroupId; ?>);">Leave Group</a></li>
                                                                    </ul>
                                                                </div>

                                                                <?php if($my_group->GroupProfile->UserProfileId == $this->session->userdata('UserProfileId')) { ?>
                                                                    <button type="button" class="btn btn-danger btn-xs" onClick="return deleteGroup('<?php echo $my_group->FriendGroupId; ?>');"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                                                <?php } ?>
                                                            </td>

                                                            
                                                        </tr>
                                                    <?php } ?>
                                                    
                                                    </tbody>
                                                    <?php }  ?> 
                                                </thead>
                                                </table>
                                            </div>
                                            <div class="new_loader_div" id="new_loader_div"><img src="<?=base_url();?>assets/images/new-loader.gif"></div>

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