<div class="modal-header">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title">Suggestion Progress</h4>
</div>
<div class="modal-body">
    <div class="panel panel-white">
        <div class="panel-heading">Add Suggestion Progress</div>
        <div class="panel-body">
            <label>Title</label>
            <input type="text" data-tabindex="1" class="form-control mbm" id="progress_title" name="title" placeholder="Title">
            <label>Description</label>
            <input type="text" data-tabindex="2" class="form-control mbm" id="progress_description" name="description" placeholder="Description">
            <label>Attach Files</label>
            <input type="file" name="file[]" class="form-control fileUploadForm" multiple="true"/>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-success save_complaint_history" onClick="return saveSuggestionHistory();">Save</button>
    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
</div>