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
    </div>
    <div class="panel panel-white">
        <p>Start Date: <?php echo date('d-M-Y', strtotime($result->ValidFromDate)); ?></p>
        <p>End Date: <?php echo date('d-M-Y', strtotime($result->ValidEndDate)); ?></p>
        <p>Added On: <?php echo $result->AddedOn; ?></p>
        
    </div>
    <?php if(count($result->PollAnswerWithTotalParticipation) > 0) { ?>
        <h3>Answers with Participations</h3>
        <table class="table datatable dragable">
            <tr>
                <td>Answer / Image</td>
                <td>Total Participation</td>
                <td>Me Answered</td>
            </tr>
        <?php
        $i = 0;
        foreach($result->PollAnswerWithTotalParticipation AS $PollAnswerWithTotalParticipation) {
            $PollAnswerImage = ($PollAnswerWithTotalParticipation->PollAnswerImage != '') ? '<img src="'.$PollAnswerWithTotalParticipation->PollAnswerImage.'" style="width: 100px; height: 60px;"><br>' : '';
            $MeAnsweredYesNo = ($PollAnswerWithTotalParticipation->MeAnsweredYesNo == 1) ? 'Yes' : 'No';
            echo '<tr>';
                echo '<td>'.$PollAnswerImage.$PollAnswerWithTotalParticipation->PollAnswer.'</td>';
                echo '<td>'.$PollAnswerWithTotalParticipation->TotalAnswerdMe.'</td>';
                echo '<td>'.$MeAnsweredYesNo.'</td>';
            echo '</tr>';
                $i++;
        }
        ?>
        </table>
    <?php } ?>

</div>
<div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
</div>