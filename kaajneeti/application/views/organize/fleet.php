<!DOCTYPE html>
<html lang="en">
<head><title>Fleet</title>
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
                                    <li class="active"><strong><a class="text-capitalize" href="<?=base_url(); ?>organize/fleet">Fleet</a> </strong> </li>
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
                                                    <button class="btn btn-primary" type="button"  data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newFleet();"><i class="fa fa-plus" aria-hidden="true"></i>  New Fleet
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="dropdown" id="organize-active">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="active-id"><i class="fa fa-user"></i> Active Fleet <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" id="activate_user_div"><i class="fa fa-user"></i> Active Fleet</a></li>
                                                    <li><a href="#" id="inactivate_user_div"><i class="fa fa-user-slash"></i> Inactive Fleet</a></li>
                                                </ul>
                                            </div>
                                            <?php /*
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
                                            */ ?>

                                        </div>
                                    </div>
                                    <?php
                                    // echo '<pre>';
                                    // print_r($Fleet->result);
                                    // echo '</pre>';
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12" id="team-table" >
                                            <div class="table-responsive">
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
                                                            <th data-field="name" data-sortable="true" data-visible="true">NAME</th>
                                                            <th data-field="registration" data-sortable="true" data-visible="true">REGISTRATION</th>
                                                            <th data-field="driver" data-sortable="true" data-visible="true">DRIVER</th>
                                                            <th data-field="type" data-sortable="true" data-visible="true">TYPE</th>
                                                            <th data-field="qty" data-sortable="true" data-visible="true">QTY</th>
                                                            <th data-field="status" data-sortable="true" data-visible="true">STATUS</th>
                                                            <th data-field="added_on" data-sortable="true" data-visible="true">ADDED ON</th>
                                                            <th data-field="action" data-sortable="true" data-visible="true">ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="media-thumb">
                                                        <?php foreach($Fleet->result AS $fleet) { ?>
                                                            <?php 
                                                            // echo '<pre>';
                                                            // print_r($fleet);
                                                            // echo '</pre>';
                                                            $FleetStatus = ($fleet->FleetStatus == 1) ? 'Active' : 'In-Active';
                                                            ?>
                                                        <tr>
                                                            <td></td>
                                                            <td><?php echo $fleet->FleetName; ?></td>
                                                            <td><?php echo $fleet->RegistrationNumber; ?></td>
                                                            <td><?php echo $fleet->DriverName; ?></td>
                                                            <td><?php echo $fleet->FleetType; ?></td>
                                                            <td><?php echo $fleet->VehicleQuantity; ?></td>
                                                            <td><?php echo $FleetStatus; ?></td>
                                                            <td><?php echo $fleet->AddedOn; ?></td>
                                                            <td>
                                                                <!-- <button type="button" class="btn btn-info btn-xs" data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return editTeam('<?php echo $fleet->UserUniqueId; ?>', '<?php echo $fleet->UserProfileId; ?>');"><i class="fa fa-edit"></i>&nbsp;Edit</button> -->
                                                                <button type="button" class="btn btn-danger btn-xs" onClick="return deleteFleet('<?php echo $fleet->FleetId; ?>');"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
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

</body>

<?php  require_once './include/footer.php';?>


<?php  require_once './include/scroll_top.php';?>



<?php  require_once './include/js.php';?>


<?php  require_once './include/organize/organize.php'; // For all javascript belongs to Organize ?>


</body>
</html>