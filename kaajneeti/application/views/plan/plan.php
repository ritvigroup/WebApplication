<!DOCTYPE html>
<html lang="en">
<head><title>Plan</title>
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
                                <div class="caption">Plan</div>
                                <div class="actions">
                                    
                                    <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return displayCreatePlanYourGoal();" title="Let's begin with your Goal" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;Create Plan</a>&nbsp;

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
                    <!-- stat timeline and feed  -->
                    <div class="top20">
                        
                        <div class="clearfix"> </div>
                        <!-- End projects list -->
                        
                        <?php  require_once './include/footer.php';?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<div id="modal-stackable" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/sweetalert-dev.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script> 

?php  require_once './include/scroll_top.php';?>

</body>

<?php  require_once './include/js.php';?>

<script>
    function displayCreatePlanYourGoal() {

        $.post("<?php echo base_url(); ?>plan/createPlanYourGoal", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    }

    function goToNextScreen() {
        var plan_title          = $("#plan_title").val();

        if (plan_title.length > 0) {            
            

            $.post("<?php echo base_url(); ?>plan/createplan", {
                                                            poll_question: poll_question, 
                                                            },
                function (data, status) {
                   
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else { 
                        $this.button('Submit');
                        if (data.status === "success") {
                            window.location.href="poll";
                        }
                    }
                });

        } else {
            sweetAlert("Oops...", "Please enter subject or title of history", "error");
            return false;
        }
    };
</script>

</body>
</html>