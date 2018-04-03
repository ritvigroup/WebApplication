<!DOCTYPE html>
<html lang="en">
<head><title>Plan</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <link rel="shortcut icon" href="<?=base_url();?>assets/images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="<?=base_url();?>assets/images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=base_url();?>assets/images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=base_url();?>assets/images/icons/favicon-114x114.png">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet"
          href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet"
          href="<?=base_url();?>assets/vendors/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap/css/bootstrap.min.css">
    <!--LOADING STYLESHEET FOR PAGE--><!--Loading style vendors-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/animate.css/animate.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/jquery-pace/pace.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/iCheck/skins/all.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/jquery-notific8/jquery.notific8.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker-bs3.css">
    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/themes/style1/orange-blue.css" class="default-style">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/themes/style1/orange-blue.css" id="theme-change"
          class="style-change color-change">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/style-responsive.css">
</head>
<body class=" ">
<div>
    <!--BEGIN BACK TO TOP--><a id="totop" href="#"><i class="fa fa-angle-up"></i></a><!--END BACK TO TOP-->
    <!--BEGIN TOPBAR-->
    <?php  require_once './include/top.php';?>
    <!--END TOPBAR-->
    <div id="wrapper"><!--BEGIN SIDEBAR MENU-->
        
        <?php  require_once './include/left.php';?>

        <!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper"><!--BEGIN TITLE & BREADCRUMB PAGE-->
            <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                <div class="page-header pull-left">
                    <div class="page-title">Plan</div>
                </div>
                <ol class="breadcrumb page-breadcrumb">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="<?=base_url();?>leader/home">Home</a>&nbsp;&nbsp;<i
                            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li><a href="<?=base_url();?>leader/team">Organise</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="active">Plan</li>
                </ol>

                <div class="clearfix"></div>
            </div>
            <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box">
                            <div class="portlet-header">
                                <div class="caption">Plan</div>
                                <div class="actions">
                                    <a href="<?=base_url();?>plan/createplan" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;Create New Plan</a>&nbsp;
                                    <a href="<?=base_url();?>connect/search" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;Search</a>&nbsp;
                                    <a href="<?=base_url();?>connect/myfriends" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;My Connection</a>&nbsp;
                                    <a href="<?=base_url();?>connect/invitation" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;Invitation</a>&nbsp;
                                    <a href="<?=base_url();?>connect/requestsent" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;Request</a>&nbsp;
                                    <a href="<?=base_url();?>leader/newleader" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;New Leader</a>
                                    <?php /* &nbsp;
                                    <div class="btn-group"><a href="#" data-toggle="dropdown"
                                                              class="btn btn-warning btn-xs dropdown-toggle"><i
                                            class="fa fa-wrench"></i>&nbsp;
                                        Tools</a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#">Export to Excel</a></li>
                                            <li><a href="#">Export to CSV</a></li>
                                            <li><a href="#">Export to XML</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Print Invoices</a></li>
                                        </ul>
                                    </div> */ ?>
                                </div>
                            </div>
                            <?php
                            // echo '<pre>';
                            // print_r($result);
                            // echo '</pre>';
                            ?>

                            <div class="portlet-body pan">
                                <div class="table-responsive">
                                    <table id="user-last-logged-table"
                                           class="table table-striped table-hover thumb-small">
                                        <thead>
                                        <tr class="condensed">
                                            <th scope="col"><span class="column-sorter"></span></th>
                                            <th scope="col">Plan<span class="column-sorter"></span></th>
                                            <th scope="col">For<span class="column-sorter"></span></th>
                                            <th scope="col">Male Team Req.<span class="column-sorter"></span></th>
                                            <th scope="col">Female Team Req.<span class="column-sorter"></span></th>
                                            <th scope="col">Total Budget<span class="column-sorter"></span></th>
                                            <th scope="col">Total Event<span class="column-sorter"></span></th>
                                            <th scope="col">Total Vehicle<span class="column-sorter"></span></th>
                                            <th scope="col">Status<span class="column-sorter"></span></th>
                                        </tr>
                                        </thead>
                                        <tbody class="media-thumb">
                                        <?php foreach($result AS $key => $plan) { ?>
                                        <?php $PlanStatus = ($plan->plandata->PlanStatus == 1) ? 'Active' : 'InActive'; ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $plan->plandata->PlanUniqueId; ?></td>
                                            <td><?php echo $plan->plandata->UserType; ?></td>
                                            <td><?php echo $plan->plandata->TotalTeamMale; ?></td>
                                            <td><?php echo $plan->plandata->TotalTeamFemale; ?></td>
                                            <td><?php echo $plan->plandata->TotalBudget; ?></td>
                                            <td><?php echo $plan->plandata->TotalEvent; ?></td>
                                            <td><?php echo $plan->plandata->TotalVehicle; ?></td>
                                            <td><span class="label label-success"><?php echo $PlanStatus; ?></span></td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END CONTENT--></div>
        <!--BEGIN FOOTER-->
        
        <?php  require_once './include/footer.php';?>

        <!--END FOOTER--><!--END PAGE WRAPPER--></div>
</div>
<script src="<?=base_url();?>assets/js/jquery-1.10.2.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="<?=base_url();?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
<script src="<?=base_url();?>assets/js/html5shiv.js"></script>
<script src="<?=base_url();?>assets/js/respond.min.js"></script>
<script src="<?=base_url();?>assets/vendors/metisMenu/jquery.metisMenu.js"></script>
<script src="<?=base_url();?>assets/vendors/slimScroll/jquery.slimscroll.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-cookie/jquery.cookie.js"></script>
<script src="<?=base_url();?>assets/vendors/iCheck/icheck.min.js"></script>
<script src="<?=base_url();?>assets/vendors/iCheck/custom.min.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-notific8/jquery.notific8.min.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-highcharts/highcharts.js"></script>
<script src="<?=base_url();?>assets/js/jquery.menu.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-pace/pace.min.js"></script>
<script src="<?=base_url();?>assets/vendors/holder/holder.js"></script>
<script src="<?=base_url();?>assets/vendors/responsive-tabs/responsive-tabs.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-news-ticker/jquery.newsTicker.min.js"></script>
<script src="<?=base_url();?>assets/vendors/moment/moment.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!--CORE JAVASCRIPT-->
<script src="<?=base_url();?>assets/js/main.js"></script>
<!--LOADING SCRIPTS FOR PAGE-->

</body>
</html>