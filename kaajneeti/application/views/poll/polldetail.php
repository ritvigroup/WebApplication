<?php
// echo '<pre>';
// print_r($result);
// echo '</pre>';
?>

<div class="modal-header">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title"><?php echo $result->PollQuestion; ?></h4>
</div>
<div class="modal-body">
    <div class="note note-success">
        <h3><?php echo $result->PollQuestion; ?></h3>
        <?php
        if($result->PollImage != '') {
            echo '<img src="'.$result->PollImage.'" style="width: 100%;">';
        }
        ?>
    </div>
    <div class="panel panel-white">
        <div class="panel-heading"><?php echo $result->PollLocation; ?></div>
        
    </div>
    
    <h3>Answers</h3>

    <div class="portlet-body">
        <div class="gallery-pages">
            <div class="clearfix"></div>
            <div class="row mix-grid" id="MixItUp3CD102">
                
                <ul>
                    <?php
                    foreach($result->PollAnswerWithTotalParticipation AS $answers) {

                        $PollAnswerImage = ($answers->PollAnswerImage != '') ? '<img src="'.$answers->PollAnswerImage.'" style="width: 200px; height: 120px;">' : '';
                        echo '<li style="overflow: hidden; max-height: 300px;">'.$PollAnswerImage.'<br>';
                        

                        if($MeParticipated > 0) {
                            if($answers->PollAnswer != '') {
                                echo $answers->PollAnswer;
                            }
                        } else {
                            echo '<input type="button" value="'.$answers->PollAnswer.'" onClick="return participatePollWithAnswer('.$PollId.', '.$answers->PollAnswerId.');">';
                        }
                        //echo '<input type="button" value="'.$answers->TotalAnswerdMe.'">';
                        echo '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div>
        <p>From Date: <?php echo $result->ValidFromDate; ?></p>
        <p>End Date: <?php echo $result->ValidEndDate; ?></p>
    </div>

    <div>
        <p>Total Participation: <?php echo $result->PollTotalParticipation; ?></p>
    </div>

    <?php if($result->MeParticipated > 0) { ?>
    <div><p>You had already participated this poll.</p></div>
    <?php } else { ?>
    <div><p>You had not participated this poll.</p></div>
    <?php } ?>

</div>
<div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
</div>