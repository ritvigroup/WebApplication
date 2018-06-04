<!DOCTYPE html>
<html lang="en">
<head><title>Document</title>
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
                                    <li class="active"><strong><a class="text-capitalize" href="<?=base_url(); ?>organize/document">Document</a> </strong> </li>
                                </ol>
                            </div>

                            <?php  require_once './include/organize/organize_top.php';?>

                            <div class="portlet-body">
                                <div id="team" class="active">
                                    <div class="row">
                                        <div class="col-md-8 ">
                                        </div>

                                        <div class="col-md-4 active-user">
                                            <?php if($ParentFolder->result->DocumentFolderId > 0) { ?>

                                                <?php
                                                $path_add = ($ParentFolder->result->ParentDocumentFolderId > 0) ? '/'.$ParentFolder->result->ParentDocumentFolderId : '';
                                                ?>
                                                <a class="btn btn-primary" href="<?php echo base_url(); ?>organize/document<?php echo $path_add; ?>">&laquo; <?php echo $ParentFolder->result->DocumentFolderName; ?></a>&nbsp;
                                            <?php } ?>
                                            <div style="float: right;">
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="dropdown-menu organize-user">
                                                        <li><a href="javascript:void(0);" data-target="#modal-stackable-folder" data-toggle="modal" onClick="return newFolder(<?php echo $ParentFolder->result->DocumentFolderId; ?>);">New Folder</a></li>
                                                        <li><a href="javascript:void(0);" data-target="#modal-stackable" data-toggle="modal" onClick="return newDocument(<?php echo $ParentFolder->result->DocumentFolderId; ?>);">Upload Document</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="portlet-body">
                                        <?php
                                        // echo '<pre>';
                                        // //print_r($ParentFolder);
                                        // print_r($DocumentFolder);
                                        // print_r($Document);
                                        // echo '</pre>';
                                        ?>
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
                                                        <th data-field="email" data-sortable="true" data-visible="true">FOLDER / FILE</th>
                                                        <th data-field="download" data-sortable="true" data-visible="true">DOWNLOAD</th>
                                                        <th data-field="created" data-sortable="true" data-visible="true">CREATED</th>
                                                        <th data-field="action" data-sortable="true" data-visible="true">ACTION</th>
                                                    </tr>

                                                </thead>
                                                <?php foreach($DocumentFolder->result AS $key => $val) { ?>
                                                    <?php
                                                    $DownloadLink = ($val->DocumentPath != '') ? '<a href="'.$val->DocumentPath.'" target="_blank">View File</a>' : '';
                                                    $DocumentStatus = ($val->DocumentStatus == 1) ? 'Active' : 'In-Active';
                                                    ?>
                                                    <tr>
                                                        <td><a href="<?php echo base_url(); ?>organize/document/<?php echo $val->DocumentFolderId; ?>"><i class="fa fa-folder" aria-hidden="true" style="color: #e5cb5c;"></i>&nbsp;<?php echo $val->DocumentFolderName; ?></a></td>
                                                        <td><?php echo $DownloadLink; ?></td>
                                                        <td><?php echo $val->AddedOn; ?></td>
                                                        <td><button type="button" class="btn btn-danger btn-xs" onClick="return deleteFolder('<?php echo $val->DocumentFolderId; ?>');"><i class="fa fa-trash"></i>&nbsp;Delete</button></td>
                                                    </tr>
                                                <?php } ?>

                                                <?php foreach($Document->result AS $key => $val) { ?>
                                                    <?php
                                                    $DownloadLink = ($val->DocumentPath != '') ? '<a href="'.$val->DocumentPath.'" target="_blank"><img src="'.base_url().'assets/images/download.png" style="width: 20px; height: 20px;"></a>' : '';
                                                    $DocumentStatus = ($val->DocumentStatus == 1) ? 'Active' : 'In-Active';
                                                    ?>
                                                    <tr>
                                                        <td><img src="<?php echo base_url(); ?>assets/images/default-file.png" style="width: 20px; height: 20px;">&nbsp;<?php echo $val->DocumentName; ?></td>
                                                        <td><?php echo $DownloadLink; ?></td>
                                                        <td><?php echo $val->AddedOn; ?></td>
                                                        <td><button type="button" class="btn btn-danger btn-xs" onClick="return deleteDocument('<?php echo $val->DocumentId; ?>');"><i class="fa fa-trash"></i>&nbsp;Delete</button></td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
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

<?php  require_once './include/footer.php';?>
<?php  require_once './include/scroll_top.php';?>
<?php  require_once './include/js.php';?>

<?php  require_once './include/organize/organize.php'; // For all javascript belongs to Organize ?>




</body>
</html>