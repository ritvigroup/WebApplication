<!DOCTYPE html>
<html lang="en">
<head><title>Suggestion</title>
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
                                <h1>My Suggestion</h1>
                                <div class="actions">
                                    <a href="<?=base_url();?>suggestion/suggestionReceived" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;Suggestion Received</a>&nbsp;
                                    <a href="<?=base_url();?>suggestion/newsuggestion" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;New Suggestion</a>&nbsp;
                                    <a href="<?=base_url();?>suggestion/suggestion" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;My Suggestion</a>&nbsp;
                                </div>
                            </div>
                            
                            <div class="portlet-body">
                                <div class="row mbm">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table id="table_id"
                                                   class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead>
                                                <tr>
                                                    <th scope="col"><span class="column-sorter"><input type="checkbox"></span></th>
                                                    <th scope="col">Title<span class="column-sorter"></span></th>
                                                    <th scope="col">Description<span class="column-sorter"></span></th>
                                                    <th scope="col">Applicant Name<span class="column-sorter"></span></th>
                                                    <th scope="col">Reply<span class="column-sorter"></span></th>
                                                    <th scope="col">Posted On<span class="column-sorter"></span></th>
                                                    <th scope="col">Status<span class="column-sorter"></span></th>
                                                </tr>
                                                
                                                <tbody class="media-thumb">
                                                <?php 
                                                if(count($result) > 0) { ?>
                                                
                                                <?php foreach($result AS $suggestion) { ?>
                                                    <?php 
                                                        $SuggestionStatus  = (($suggestion->SuggestionStatus == 1) ? 'Active' : 'In-Active'); 
                                                        $AddedOn    = (($suggestion->AddedOn == '0000-00-00 00:00:00') ? '' : date('d-M-Y h:i A', strtotime($suggestion->AddedOn))); 
                                                        $CountSuggestionHistory = $suggestion->CountSuggestionHistory;
                                                        $displayCountSuggestionHistory = 'No';
                                                        if($CountSuggestionHistory > 0) {
                                                            $displayCountSuggestionHistory = 'Yes ('.$CountSuggestionHistory.')';
                                                        }
                                                    ?>
                                                    <tr>
                                                        <td><input type="checkbox"></td>
                                                        <td><a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return displaySuggestionDitail('<?php echo $suggestion->SuggestionUniqueId; ?>');" title="View Suggestion Detail"><?php echo $suggestion->SuggestionSubject; ?></a></td>
                                                        <td><?php echo $suggestion->SuggestionDescription; ?></td>
                                                        <td><?php echo $suggestion->ApplicantName; ?></td>
                                                        <td><a href="<?=base_url();?>suggestion/suggestionTimeline/<?php echo $suggestion->SuggestionUniqueId; ?>"><?php echo $displayCountSuggestionHistory; ?></a></td>
                                                        <td><?php echo $suggestion->AddedOn; ?></td>
                                                        <td><?php echo $SuggestionStatus; ?></td>
                                                    </tr>
                                                <?php }  ?>
                                                
                                                <?php }  ?>
                                                </tbody>
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
    $(document).ready(function() {
        // Flexible table

        $('#table_id').DataTable();

    });
    function displaySuggestionDitail(suggestion_unique_id) {

        $.post("<?php echo base_url(); ?>suggestion/suggestionViewDetail/"+suggestion_unique_id, {'display': 'Y'},
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