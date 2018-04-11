<form name="plan_form" method="post" action="<?php echo base_url(); ?>plan/createplan">
    <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <h4 id="modal-stackable-label" class="modal-title">Let's begin with your goal</h4>
    </div>
    <div class="modal-body">
        <div class="panel panel-white">
            <div class="panel-heading">What is your goal?</div>
            <div class="panel-body">
                <input type="text" data-tabindex="1" class="form-control mbm" id="plan_title" name="plan_title" placeholder="Ex. MLA / Activist / CM / PM">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success save_complaint_history">Next</button>
        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
    </div>
</form>