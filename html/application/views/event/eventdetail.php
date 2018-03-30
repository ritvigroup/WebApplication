<div class="modal-header">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title"><?php echo $result->EventName; ?></h4>
</div>
<div class="modal-body">
    <div class="note note-success">
        <h3><?php echo $result->EventName; ?></h3>
        <p><?php echo $result->EventDescription; ?></p>
    </div>
    <div class="panel panel-white">
        <div class="panel-heading"><?php echo $result->EventLocation; ?></div>
        <div class="panel-body">
            <dl>
                <dt>Start Date</dt>
                <dd><?php echo date('d-M Y h:i A', strtotime($result->StartDate)); ?></dd>
                <dt>End Date</dt>
                <dd><?php echo date('d-M Y h:i A', strtotime($result->EndDate)); ?></dd>
            </dl>
        </div>
    </div>
    <?php if(count($result->EventAttendee) > 0) { ?>
        <h3>Attendees</h3>
        <?php
        $color = array('red', 'orange', 'green', 'yellow', 'blue', 'violet', 'pink', 'grey', 'dark');

        $badge_or_label = array('badge badge', 'label label');
        $rand = rand(0,1);
        $i = 0;
        foreach($result->EventAttendee AS $EventAttendee) {

            $color_id = rand(0, (count($color)-1));
            $FirstName = $EventAttendee->user_profile_detail->profile->FirstName;
            $LastName = $EventAttendee->user_profile_detail->profile->LastName;
            if($EventAttendee->user_profile_detail->profile->FirstName != '') {
                echo '<span class="'.$badge_or_label[$rand].'-'.$color[$color_id].'">'.$FirstName.' '.$LastName.'</span>&nbsp;';
                $i++;
            }
        }
        ?>
    <?php } ?>
    <?php if(count($result->EventAttachment) > 0) { ?>
        <h3>Attachments</h3>

        <div class="portlet-body">
            <div class="gallery-pages">
                <div class="clearfix"></div>
                <div class="row mix-grid" id="MixItUp3CD102">
                    
                    <?php
                    $i = 1;
                    foreach($result->EventAttachment AS $EventAttachment) {
                    ?>
                    <div class="col-md-3 mix photography" style="display: inline-block;">
                        <div class="hover-effect">
                            <div class="img"><img src="<?php echo $EventAttachment->AttachmentFile;?>" alt="" class="img-responsive"></div>
                            <div class="info">
                                <a href="<?php echo $EventAttachment->AttachmentFile;?>" data-lightbox="image-<?php echo $i; ?>" data-title="Image <?php echo $i; ?>" class="mix-zoom" target="_blank"><i class="glyphicon glyphicon-search"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                    }
                    ?>
                </div>
            </div>
        </div>

        
     <?php } ?>

    <?php 
    // echo '<pre>';
    // print_r($result);

    // echo '</pre>';
    ?>
</div>
<div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
</div>