<!DOCTYPE html>
<html lang="en">
<head><title>Citizen</title>
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
    <!--LOADING STYLESHEET FOR PAGE-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/jquery-tablesorter/themes/blue/style-custom.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-datepicker/css/datepicker.css">
    <!--Loading style vendors-->
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
                    <div class="page-title">Voter / Citizen</div>
                </div>
                <ol class="breadcrumb page-breadcrumb">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="<?=base_url();?>leader/home">Home</a>&nbsp;&nbsp;<i
                            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li><a href="#">Tables</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="active">Citizen</li>
                </ol>
                <div class="btn btn-blue reportrange hide"><i class="fa fa-calendar"></i>&nbsp;<span></span>&nbsp;report&nbsp;<i
                        class="fa fa-angle-down"></i><input type="hidden" name="datestart"/><input type="hidden"
                                                                                                   name="endstart"/>
                </div>
                <div class="clearfix"></div>
            </div>
            <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
            <div class="page-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="portlet box">
                            <div class="portlet-header">
                                <div class="caption">Citizen Listing</div>
                                <div class="actions"><a href="#" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;
                                    New Citizen</a>&nbsp;
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
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row mbm">
                                    <div class="col-lg-12">
                                        <div style="display: none;" class="alert alert-danger tb-alert-error">
                                            <button type="button" data-dismiss="alert" aria-hidden="true"
                                                    class="close">&times;</button>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </div>
                                        <div style="display: none" class="alert alert-success tb-alert-success">
                                            <button type="button" data-dismiss="alert" aria-hidden="true"
                                                    class="close">&times;</button>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </div>
                                    </div>
                                </div>
                                <textarea style="display: none;" class="gw-row">
                                    <tr>
                                        <td>{checkbox}</td>
                                        <td>{index}</td>
                                        <td>{name}</td>
                                        <td>{country}</td>
                                        <td>{gender}</td>
                                        <td>{order}</td>
                                        <td>{date}</td>
                                        <td>{price}</td>
                                        <td>{status}</td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                </textarea>

                                <div class="row mbm">
                                    <div class="col-lg-6">
                                        <div class="pagination-panel">Page
                                            &nbsp;<a href="#" class="btn btn-sm btn-default btn-prev gw-prev"><i
                                                    class="fa fa-angle-left"></i></a>&nbsp;<input type="text"
                                                                                                  maxlenght="5"
                                                                                                  value="1"
                                                                                                  class="pagination-panel-input form-control input-mini input-inline input-sm text-center gw-page"/>&nbsp;<a
                                                    href="#" class="btn btn-sm btn-default btn-prev gw-next"><i
                                                    class="fa fa-angle-right"></i></a>&nbsp;
                                            of 6 | View
                                            &nbsp;<select
                                                    class="form-control input-xsmall input-sm input-inline gw-pageSize">
                                                <option value="20" selected="selected">20</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                                <option value="150">150</option>
                                                <option value="-1">All</option>
                                            </select>&nbsp;
                                            records | Found total 58 records
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="tb-group-actions pull-right">
                                            <span>10 records selected:</span><select
                                                class="table-group-action-select form-control input-inline input-small input-sm mlm">
                                            <option value="0">Select...</option>
                                            <option value="1">Cancel</option>
                                            <option value="2">Hold</option>
                                            <option value="3">On Hold</option>
                                            <option value="4">Close</option>
                                        </select>&nbsp;
                                            <button class="btn btn-sm btn-primary submit-action"><i
                                                    class="fa fa-check"></i>&nbsp;
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-hover table-striped table-bordered table-advanced tablesorter">
                                    <thead>
                                    <tr>
                                        <th width="3%"><input type="checkbox" class="checkall"/></th>
                                        <th width="8%">Rec #</th>
                                        <th>Username</th>
                                        <th width="10%">Country</th>
                                        <th width="10%">Gender</th>
                                        <th width="8%">Order</th>
                                        <th width="15%">Date</th>
                                        <th width="10%">Price</th>
                                        <th width="10%">Status</th>
                                        <th width="12%">Actions</th>
                                    </tr>
                                    <tr role="row" class="filter">
                                        <td></td>
                                        <td><input type="text" class="form-control form-filter input-sm"/></td>
                                        <td><input type="text" class="form-control form-filter input-sm"/></td>
                                        <td><select class="form-control input-sm">
                                            <option value="">Country</option>
                                            <option value="0">United States</option>
                                            <option value="1">France</option>
                                            <option value="2">Spain</option>
                                        </select></td>
                                        <td><select class="form-control input-sm">
                                            <option value="">Gender</option>
                                            <option value="0">Male</option>
                                            <option value="1">Female</option>
                                        </select></td>
                                        <td>
                                            <div class="mbs"><input type="text" placeholder="From"
                                                                    class="form-control input-sm mbs"/></div>
                                            <input type="text" placeholder="To" class="form-control input-sm"/></td>
                                        <td>
                                            <div data-date-format="dd-mm-yyyy"
                                                 class="input-group date datepicker-filter input-group-sm mbs"><input
                                                    type="text" readonly="" class="form-control"/><span
                                                    class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                            <div data-date-format="dd-mm-yyyy"
                                                 class="input-group date datepicker-filter input-group-sm"><input
                                                    type="text" readonly="" class="form-control"/><span
                                                    class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mbs"><input type="text" placeholder="From"
                                                                    class="form-control input-sm mbs"/></div>
                                            <input type="text" placeholder="To" class="form-control input-sm"/></td>
                                        <td><select class="form-control input-sm">
                                            <option value="">Select...</option>
                                            <option value="pending">Pending</option>
                                            <option value="closed">Closed</option>
                                            <option value="hold">On Hold</option>
                                        </select></td>
                                        <td>
                                            <div class="mbs">
                                                <button class="btn btn-xs btn-success filter-submit"><i
                                                        class="fa fa-search"></i>&nbsp;
                                                    Search
                                                </button>
                                            </div>
                                            <button class="btn btn-xs btn-info filter-cancel"><i
                                                    class="fa fa-times"></i>&nbsp;
                                                Reset
                                            </button>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>1</td>
                                        <td>Henry</td>
                                        <td>United States</td>
                                        <td>Male</td>
                                        <td>32</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-success">Approved</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>2</td>
                                        <td>John</td>
                                        <td>United States</td>
                                        <td>Female</td>
                                        <td>45</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-info">Pending</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>3</td>
                                        <td>Larry</td>
                                        <td>United States</td>
                                        <td>Female</td>
                                        <td>40</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-warning">Suspended</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>4</td>
                                        <td>Lahm</td>
                                        <td>United States</td>
                                        <td>Female</td>
                                        <td>15</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-danger">Blocked</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>5</td>
                                        <td>Henry</td>
                                        <td>United States</td>
                                        <td>Male</td>
                                        <td>32</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-success">Approved</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>6</td>
                                        <td>John</td>
                                        <td>United States</td>
                                        <td>Male</td>
                                        <td>41</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-info">Pending</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>7</td>
                                        <td>Larry</td>
                                        <td>United States</td>
                                        <td>Female</td>
                                        <td>43</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-warning">Suspended</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>8</td>
                                        <td>Lahm</td>
                                        <td>United States</td>
                                        <td>Male</td>
                                        <td>15</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-danger">Blocked</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>9</td>
                                        <td>Henry</td>
                                        <td>United States</td>
                                        <td>Male</td>
                                        <td>45</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-success">Approved</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>10</td>
                                        <td>John</td>
                                        <td>United States</td>
                                        <td>Male</td>
                                        <td>35</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-info">Pending</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>11</td>
                                        <td>Larry</td>
                                        <td>United States</td>
                                        <td>Female</td>
                                        <td>36</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-warning">Suspended</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>12</td>
                                        <td>Lahm</td>
                                        <td>United States</td>
                                        <td>Male</td>
                                        <td>17</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-danger">Blocked</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>13</td>
                                        <td>Henry</td>
                                        <td>United States</td>
                                        <td>Male</td>
                                        <td>68</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-success">Approved</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>14</td>
                                        <td>John</td>
                                        <td>United States</td>
                                        <td>Female</td>
                                        <td>36</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-info">Pending</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>15</td>
                                        <td>Larry</td>
                                        <td>United States</td>
                                        <td>Female</td>
                                        <td>26</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-warning">Suspended</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>16</td>
                                        <td>Lahm</td>
                                        <td>United States</td>
                                        <td>Female</td>
                                        <td>62</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-danger">Blocked</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>17</td>
                                        <td>Henry</td>
                                        <td>United States</td>
                                        <td>Male</td>
                                        <td>84</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-success">Approved</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>18</td>
                                        <td>John</td>
                                        <td>United States</td>
                                        <td>Male</td>
                                        <td>64</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-info">Pending</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>19</td>
                                        <td>Larry</td>
                                        <td>United States</td>
                                        <td>Male</td>
                                        <td>21</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-warning">Suspended</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>20</td>
                                        <td>Lahm</td>
                                        <td>United States</td>
                                        <td>Female</td>
                                        <td>18</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-danger">Blocked</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>21</td>
                                        <td>Henry</td>
                                        <td>United States</td>
                                        <td>Male</td>
                                        <td>32</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-success">Approved</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>22</td>
                                        <td>John</td>
                                        <td>United States</td>
                                        <td>Male</td>
                                        <td>52</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-info">Pending</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>23</td>
                                        <td>Larry</td>
                                        <td>United States</td>
                                        <td>Female</td>
                                        <td>55</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-warning">Suspended</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td>24</td>
                                        <td>Lahm</td>
                                        <td>United States</td>
                                        <td>Male</td>
                                        <td>32</td>
                                        <td>20-05-2014</td>
                                        <td>$240.50</td>
                                        <td><span class="label label-sm label-danger">Blocked</span></td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs mbs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger btn-xs mbs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="row mbm">
                                    <div class="col-lg-6">
                                        <div class="pagination-panel">Page
                                            &nbsp;<a href="#" class="btn btn-sm btn-default btn-prev gw-prev"><i
                                                    class="fa fa-angle-left"></i></a>&nbsp;<input type="text"
                                                                                                  maxlenght="5"
                                                                                                  value="1"
                                                                                                  class="pagination-panel-input form-control input-mini input-inline input-sm text-center gw-page"/>&nbsp;<a
                                                    href="#" class="btn btn-sm btn-default btn-prev gw-next"><i
                                                    class="fa fa-angle-right"></i></a>&nbsp;
                                            of 6 | View
                                            &nbsp;<select
                                                    class="form-control input-xsmall input-sm input-inline gw-pageSize">
                                                <option value="20" selected="selected">20</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                                <option value="150">150</option>
                                                <option value="-1">All</option>
                                            </select>&nbsp;
                                            records | Found total 58 records
                                        </div>
                                    </div>
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
<script src="<?=base_url();?>assets/vendors/jquery-tablesorter/jquery.tablesorter.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url();?>assets/js/table-sample.js"></script>

</body>
</html>