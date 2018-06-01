<!DOCTYPE html>
<html lang="en">
<head><title>Event</title>
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
                                    <li class="active"><strong><a class="text-capitalize" href="<?=base_url(); ?>organize/event">Event</a> </strong> </li>
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
                                                    <button class="btn btn-primary" type="button"  data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newEvent();"><i class="fa fa-plus" aria-hidden="true"></i>  New Event
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="dropdown" id="organize-active">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="active-id"><i class="fa fa-user"></i> Active Event <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" id="all_user_div"><i class="fa fa-user"></i> All Event</a></li>
                                                    <li><a href="#" id="activate_user_div"><i class="fa fa-user"></i> Active Event</a></li>
                                                    <li><a href="#" id="inactivate_user_div"><i class="fa fa-user-slash"></i> Inactive Event</a></li>
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

                                    <div class="row">
                                        <div class="col-md-12" id="team-table" >
                                            <div class="table-responsive">
                                                <?php 
                                                // echo '<pre>';
                                                // print_r($Event);
                                                // echo '</pre>';
                                                ?>

                                                <table class="table datatable dragable"
                                                                                       data-sort-name="attribute"
                                                                                       data-sort-order="asc"
                                                                                       data-show-toggle="true"
                                                                                       data-show-columns="true"
                                                                                       data-pagination="true"
                                                                                       data-show-pagination-switch="true">
                                                    <thead>
                                                        <tr>
                                                            <th data-field="name" data-sortable="true" data-visible="true">NAME</th>
                                                            <th data-field="email" data-sortable="true" data-visible="true">LOCATION</th>
                                                            <th data-field="username" data-sortable="true" data-visible="true">START DATE</th>
                                                            <th data-field="role" data-sortable="true" data-visible="true">END DATE</th>
                                                            <th data-field="created" data-sortable="true" data-visible="true">CREATED</th>
                                                            <th data-field="status" data-sortable="true" data-visible="true">STATUS</th>
                                                            
                                                        </tr>

                                                    </thead>
                                                    <?php 
                                                    if(count($Event->result) > 0) { ?>
                                                    
                                                    <?php foreach($Event->result AS $event) { ?>
                                                        <?php $EventStatus  = (($event->eventdata->EventStatus == 1) ? 'Active' : 'In-Active'); ?>
                                                        <?php $TrRowStatus = ($event->eventdata->EventStatus == 1) ? 'activate_user_div' : (($event->eventdata->EventStatus == 0) ? 'inactivate_user_div' : 'not_accepted_user_div'); ?>
                                                        <?php $StartDate    = (($event->eventdata->StartDate == '0000-00-00 00:00:00') ? '' : date('d-M-Y', strtotime($event->eventdata->StartDate))); ?>
                                                        <?php $EndDate    = (($event->eventdata->EndDate == '0000-00-00 00:00:00') ? '' : date('d-M-Y', strtotime($event->eventdata->EndDate))); ?>
                                                        <tr class="<?php echo $TrRowStatus; ?>">
                                                            <td><a data-target="#modal-stackable" data-toggle="modal" onClick="return openEventDetail(<?php echo $event->eventdata->EventId; ?>);" href="javascript:void(0);"><?php echo $event->eventdata->EventName; ?></a></td>
                                                            <td><?php echo $event->eventdata->EventLocation; ?></td>
                                                            <td><?php echo $StartDate; ?></td>
                                                            <td><?php echo $EndDate; ?></td>
                                                            <td><?php echo $event->eventdata->AddedOn; ?></td>
                                                            <td><?php echo $EventStatus; ?></td>
                                                        </tr>
                                                    <?php }  ?>
                                                
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


</body>
</html>