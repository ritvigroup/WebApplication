<div class="modal-header">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title"><?php echo $ComplaintDetail->result->ComplaintSubject; ?></h4>
</div>
<div class="modal-body">
    <div class="panel panel-white">
        <div class="panel-heading"><?php echo $ComplaintDetail->result->ComplaintSubject; ?></div>
        <div class="panel-body">
            <p style="float: right;"><?php echo $ComplaintDetail->result->AddedOn; ?></p>
            <p>Complaint Id: <?php echo $ComplaintDetail->result->ComplaintUniqueId; ?></p>
            <p><?php echo $ComplaintDetail->result->ComplaintDescription; ?></p>
            <p>Attachments: 
                <?php
                $i = 1;
                foreach($ComplaintDetail->result->ComplaintAttachment AS $attachment) {
                    echo '<a href="'.$attachment->AttachmentFile.'" target="_blannk">File '.$i.'</a>';
                    echo ', ';
                    $i++;
                }
                ?>
            </p>
        </div>
        <?php if(count($ComplaintHistory->result) > 0) { ?>
        <div class="panel-heading">Complaint History</div>
        <div class="panel-body">
            
                <?php
                $i = 0;
                foreach($ComplaintHistory->result AS $suggestion_history) {
                    if($i > 0) {
                        echo '<p>';
                        for($j = 0; $j < 74; $j++) {
                            echo '=';
                        }
                        echo '</p>';
                    }
                    echo '<p style="float: right;">'.$suggestion_history->AddedOn.'</p>';
                    echo '<p><h3>'.$suggestion_history->HistoryTitle.'</h3></p>';
                    echo '<p>'.$suggestion_history->HistoryDescription.'</p>';
                    echo '<p style="text-align: right;">By: '.$suggestion_history->ComplaintHistoryProfile->user_profile_detail->profile->FirstName.' '.$suggestion_history->ComplaintHistoryProfile->user_profile_detail->profile->LastName.'</p>';
                    echo '<p>Attachments: ';
                    $i = 1;
                    foreach($suggestion_history->ComplaintHistoryAttachment AS $history_attachment) {
                        echo '<a href="'.$history_attachment->AttachmentFile.'" target="_blannk">File '.$i.'</a>';
                        echo ', ';
                        $i++;
                    }
                    echo '</p>';
                    $i++;
                }
                ?>
            
        </div>
        <?php } ?>
    </div>
</div>
<div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
</div>