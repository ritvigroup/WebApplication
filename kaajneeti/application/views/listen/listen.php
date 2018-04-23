<!DOCTYPE html>
<html lang="en">
<head><title>Listen</title>
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
                <div class="page-content">
                    <div id="tab-general">
                        <div id="sum_box" class="row mbl">
                            <div class="col-sm-6 col-md-3">
                                <div class="panel profit db mbm">
                                    <div class="panel-body"><p class="icon"><i class="icon fa fa-paper-plane"></i></p><h4
                                            class="value"><span data-counter="" data-start="10" data-end="<?php echo $result->TotalComplaintReceived; ?>" data-step="1"
                                                                data-duration="0"></span><span><?php echo $result->TotalComplaintReceived; ?></span></h4> 

                                        <p class="description"><a href="<?=base_url();?>complaint/complaintReceived">Complaint Received</a></p>

                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="panel profit db mbm">
                                    <div class="panel-body"><p class="icon"><i class="icon fa fa-comment"></i></p><h4
                                            class="value"><span data-counter="" data-start="10" data-end="<?php echo $result->TotalComplaint; ?>" data-step="1"
                                                                data-duration="0"></span><span><?php echo $result->TotalComplaint; ?></span></h4> 

                                        <p class="description"><a href="<?=base_url();?>complaint/mycomplaint">My Complaint</a></p>

                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="panel income db mbm">
                                    <div class="panel-body"><p class="icon"><i class="icon fa fa-calendar"></i></p><h4
                                            class="value"><span><?php echo $result->TotalEvent; ?></span></h4>

                                        <p class="description"><a href="<?=base_url();?>event/event">Events</a></p>

                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="panel task db mbm">
                                    <div class="panel-body"><p class="icon"><i class="icon fa fa-lightbulb-o"></i></p><h4
                                            class="value"><span><?php echo $result->TotalSuggestionReceived; ?></span></h4>

                                        <p class="description"><a href="<?=base_url();?>suggestion/suggestionReceived">Suggestion Received</a></p>

                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="panel task db mbm">
                                    <div class="panel-body"><p class="icon"><i class="icon fa fa-lightbulb-o"></i></p><h4
                                            class="value"><span><?php echo $result->TotalSuggestion; ?></span></h4>

                                        <p class="description"><a href="<?=base_url();?>suggestion/suggestion">My Suggestion</a></p>

                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="panel visit db mbm">
                                    <div class="panel-body"><p class="icon"><i class="icon fa fa-list-ul"></i></p><h4
                                            class="value"><span><?php echo $result->TotalPoll; ?></span></h4>

                                        <p class="description"><a href="<?=base_url();?>poll/poll">Poll</a></p>

                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="panel visit db mbm">
                                    <div class="panel-body"><p class="icon"><i class="icon fa fa-envelope"></i></p><h4
                                            class="value"><span><?php echo $result->TotalPost; ?></span></h4>

                                        <p class="description"><a href="<?=base_url();?>post/post">Post</a></p>

                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="panel visit db mbm">
                                    <div class="panel-body"><p class="icon"><i class="icon fa fa-info-circle"></i></p><h4
                                            class="value"><span><?php echo $result->TotalInformation; ?></span></h4>

                                        <p class="description"><a href="<?=base_url();?>information/information">Information</a></p>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        $overall_report = array(
                                                'Complaint Received' => $result->TotalComplaintReceived,
                                                'My Complaint' => $result->TotalComplaint,
                                                'Events' => $result->TotalEvent,
                                                'Suggestion Received' => $result->TotalSuggestionReceived,
                                                'Suggestion' => $result->TotalSuggestion,
                                                'Information' => $result->TotalInformation,
                                                'Posts' => $result->TotalPost,
                                                'Poll' => $result->TotalPoll,
                                                );
                        ?>

                        <div class="portlet box">
                            <div class="portlet-header">
                                <div class="caption">Overall listen report</div>
                                <!-- <div class="tools">
                                    <i class="fa fa-chevron-up"></i>
                                    <i data-toggle="modal" data-target="#modal-config" class="fa fa-cog"></i>
                                    <i class="fa fa-refresh"></i>
                                    <i class="fa fa-times"></i>
                                </div> -->
                            </div>
                            <div class="portlet-body">
                                <div id="pie-with-gradient-fill"></div>
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
/*$('#pie-with-legend').highcharts({
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false
    },
    title: {
        text: 'Overall report'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        type: 'pie',
        name: 'Percentage',
        data: [
            <?php foreach($overall_report AS $total_summary_key => $total_summary_val) { ?>
                ['<?php echo $total_summary_key; ?>',   <?php echo $total_summary_val; ?>],
            <?php } ?>
        ]
    }]
});*/

// Build the chart
$('#pie-with-gradient-fill').highcharts({
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false
    },
    title: {
        text: 'Overall Report'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                color: '#000000',
                connectorColor: '#000000',
                formatter: function() {
                    return '<b>'+ this.point.name +'</b>: '+ this.percentage.toFixed(2) +' %';
                }
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Browser share',
        data: [
            <?php foreach($overall_report AS $total_summary_key => $total_summary_val) { ?>
                ['<?php echo $total_summary_key; ?>',   <?php echo $total_summary_val; ?>],
            <?php } ?>
        ]
    }]
});
</script>

<script>
function openListenDetail(event_id) {

    if (event_id > 0) {
        $.post("<?php echo base_url(); ?>event/eventdetail", {event_id: event_id},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    } else {
        sweetAlert("Oops...", "Please enter something to search leaders", "error");
        return false;
    }
}
</script>
</body>
</html>