<div class="modal-header">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title"><?php echo $result->SmsTo; ?></h4>
</div>
<div class="modal-body">
    <div class="panel panel-white">
        <div class="panel-heading"><?php echo $result->SmsTo; ?></div>
        <div class="panel-body">
            <i style="float: right;"><?php echo $result->SentOn; ?></i>
            <?php echo $result->SmsMessage; ?>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="reset" data-dismiss="modal" class="btn btn-default">Close</button>
</div>