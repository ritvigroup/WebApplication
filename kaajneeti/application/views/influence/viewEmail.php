<div class="modal-header">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title"><?php echo $result->EmailSubject; ?></h4>
</div>
<div class="modal-body">
    <div class="panel panel-white">
        <div class="panel-heading"><?php echo $result->EmailSubject; ?></div>
        <div class="panel-body">
            <i style="float: right;"><?php echo $result->SentOn; ?></i>
            <?php echo $result->EmailMessage; ?>
            <br>
            <br>
            <?php if(count($result->EmailAttachment) > 0) { ?>
                <?php $i = 0; foreach($result->EmailAttachment AS $files) { ?>
                    <?php echo '<a href="'.$files->AttachmentFile.'" target="_blank">File '.($i+1) .'</a> '; ?>, 
                <?php $i++; } ?>
            <?php } ?>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="reset" data-dismiss="modal" class="btn btn-default">Close</button>
</div>