<div class="modal-header">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title">Complaint Reject</h4>
</div>
<div class="modal-body">
    <div class="panel panel-white">
        <div class="panel-heading">Complaint Reject</div>
        <div class="panel-body">
            <label>Reject Reason</label>
            <input type="text" data-tabindex="2" class="form-control mbm" id="progress_description" name="description" placeholder="Enter reject reason">
            <select name="progress_status" id="progress_status" class="form-control mbm" style="display: none;">
                <option value="3">Reject</option>
            </select>
            <label>Attach Files</label>
            <input type="file" name="file[]" class="form-control fileUploadForm" multiple="true"/>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-success save_complaint_history" onClick="return replyYourComplaintHistory(<?php echo $complaint_id; ?>, '<?php echo $complaint_unique_id; ?>');">Reject</button>
    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
</div>