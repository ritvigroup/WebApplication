<div class="modal-header">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title"><?php echo $SuggestionDetail->result->SuggestionSubject; ?></h4>
</div>
<div class="modal-body">
    <div class="panel panel-white">
        <div class="panel-heading"><?php echo $SuggestionDetail->result->SuggestionSubject; ?></div>
        <div class="panel-body">
            <p style="float: right;"><?php echo $SuggestionDetail->result->AddedOn; ?></p>
            <p>Suggestion Id: <?php echo $SuggestionDetail->result->SuggestionUniqueId; ?></p>
            <p><?php echo $SuggestionDetail->result->SuggestionDescription; ?></p>
            <p>Files Attached: </p>
            <p>
                <?php
                foreach($SuggestionDetail->result->SuggestionAttachment AS $attachment) {

                }
                ?>
            </p>
        </div>
        <div class="panel-heading">Suggestion History</div>
        <div class="panel-body">
            <?php if(count($SuggestionHistory->result) > 0) { ?>
                <?php
                foreach($SuggestionHistory->result AS $suggestion_history) {
                    echo '<p style="float: right;">'.$suggestion_history->AddedOn.'</p>';
                    echo '<p><h5>'.$suggestion_history->HistoryTitle.'</h5></p>';
                    echo '<p>'.$suggestion_history->HistoryDescription.'</p>';
                    echo '<p style="text-align: right;">By: '.$suggestion_history->SuggestionHistoryProfile->user_profile_detail->profile->FirstName.' '.$suggestion_history->SuggestionHistoryProfile->user_profile_detail->profile->LastName.'</p>';
                    echo '<p>Files: ';
                    $i = 1;
                    foreach($suggestion_history->SuggestionHistoryAttachment AS $history_attachment) {
                        echo '<a href="'.$history_attachment->AttachmentFile.'" target="_blannk">File '.$i.'</a>';
                        echo ', ';
                        $i++;
                    }
                    echo '</p>';
                }
                ?>
            <?php } ?>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
</div>