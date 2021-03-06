<!DOCTYPE html>
<html lang="en">
<head><title>Search</title>
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
                                <div class="caption">Post</div>
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
                                                    <th scope="col">Location<span class="column-sorter"></span></th>
                                                    <th scope="col">Description<span class="column-sorter"></span></th>
                                                    <th scope="col">Added On<span class="column-sorter"></span></th>
                                                    <th scope="col">Status<span class="column-sorter"></span></th>
                                                </tr>
                                                <tbody class="media-thumb">
                                                <?php 
                                                if(count($result) > 0) { ?>
                                                
                                                <?php foreach($result AS $post) { ?>
                                                    <?php $PostStatus  = (($post->postdata->PostStatus == 1) ? 'Active' : 'In-Active'); ?>
                                                    <tr>
                                                        <td><input type="checkbox"></td>
                                                        <td><a data-target="#modal-stackable" data-toggle="modal" onClick="return openPostDetail(<?php echo $post->postdata->PostId; ?>);" href="javascript:void(0);"><?php echo $post->postdata->PostTitle; ?></a></td>
                                                        <td><?php echo $post->postdata->PostLocation; ?></td>
                                                        <td><?php echo $post->postdata->PostDescription; ?></td>
                                                        <td><?php echo date('d-M-Y h:i', strtotime($post->postdata->AddedOnTime)); ?></td>
                                                        <td><?php echo $PostStatus; ?></td>
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
    
function openPostDetail(post_id) {

    if (post_id > 0) {
        $.post("<?php echo base_url(); ?>post/postdetail", {post_id: post_id},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    } else {
        sweetAlert("Oops...", "Please click post title to see detail", "error");
        return false;
    }
}
</script>

</body>
</html>