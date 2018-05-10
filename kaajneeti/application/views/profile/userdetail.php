<?php
// echo '<pre>';
// print_r($result);
// print_r($HomePageData);
// echo '</pre>';
$UserDetail = $result;

$UserName       = $UserDetail->UserName;
$UserUniqueId   = $UserDetail->UserUniqueId;
$Email          = $UserDetail->UserEmail;

?>
<style>
.user_detail_pics { height: 200px; }
</style>
<div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <h4 id="modal-stackable-label" class="modal-title"><?php echo $UserName; ?> : <?php echo $UserUniqueId; ?> &raquo; Profiles</h4>
    </div>
    <div class="modal-body">
        <div class="panel panel-white">

            <div class="row mbm">
                <?php
                $UserProfileCitizen     = $UserDetail->UserProfileCitizen;
                $UserProfileLeader      = $UserDetail->UserProfileLeader;
                $UserProfileSubLeaders  = $UserDetail->UserProfileSubLeader;
                ?>
                <?php if($UserProfileCitizen->UserProfileId > 0) { ?>
                    <?php
                    $ProfilePhotoPath = ($UserProfileCitizen->ProfilePhotoPath != '') ? $UserProfileCitizen->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                    ?>
                    <div class="col-sm-4">
                        <div class="contacts-card"> <img src="<?php echo $ProfilePhotoPath; ?>" class="full-width user_detail_pics" alt="image">
                            <div class="contact-box center-version">
                                <a href="#">
                                    <address>
                                        <strong><?php echo $UserProfileCitizen->FirstName. ' '.$UserProfileCitizen->LastName; ?></strong><br> <?php echo $UserProfileCitizen->PoliticalPartyName; ?><br>
                                        <i class="fa fa-phone"></i> <?php echo $UserProfileCitizen->Mobile; ?><br>
                                            <?php echo date('d M, Y h:i a', strtotime($UserProfileCitizen->AddedOnTime)); ?>
                                    </address>
                                </a>
                            </div>
                            <div class="contact-box-footer">
                                <h3 class="m-b-xs"><strong><?php echo $UserProfileCitizen->FirstName. ' '.$UserProfileCitizen->LastName; ?></strong></h3>
                                <p>Citizen</p>
                                <div class="m-t-xs btn-group"> 
                                    <a class="btn btn-xs btn-white" href="call: <?php echo $UserProfileCitizen->Mobile; ?>"><i class="fa fa-phone"></i> Call </a> 
                                    <a class="btn btn-xs btn-white" href="mail: <?php echo $UserProfileCitizen->Email; ?>"><i class="fa fa-envelope"></i> Email</a> 
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if($UserProfileLeader->UserProfileId > 0) { ?>
                    <?php
                    $ProfilePhotoPath = ($UserProfileLeader->ProfilePhotoPath != '') ? $UserProfileLeader->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                    ?>
                    <div class="col-sm-4">
                        <div class="contacts-card"> <img src="<?php echo $ProfilePhotoPath; ?>" class="full-width user_detail_pics" alt="image">
                            <div class="contact-box center-version">
                                <a href="#">
                                    <address>
                                        <strong><?php echo $UserProfileLeader->FirstName. ' '.$UserProfileLeader->LastName; ?></strong><br> <?php echo $UserProfileLeader->PoliticalPartyName; ?><br>
                                        <i class="fa fa-phone"></i> <?php echo $UserProfileLeader->Mobile; ?><br>
                                            <?php echo date('d M, Y h:i a', strtotime($UserProfileLeader->AddedOnTime)); ?>
                                    </address>
                                </a>
                            </div>
                            <div class="contact-box-footer">
                                <h3 class="m-b-xs"><strong><?php echo $UserProfileLeader->FirstName. ' '.$UserProfileLeader->LastName; ?></strong></h3>
                                <p>Leader</p>
                                <div class="m-t-xs btn-group"> 
                                    <a class="btn btn-xs btn-white" href="call: <?php echo $UserProfileLeader->Mobile; ?>"><i class="fa fa-phone"></i> Call </a> 
                                    <a class="btn btn-xs btn-white" href="mail: <?php echo $UserProfileLeader->Email; ?>"><i class="fa fa-envelope"></i> Email</a> 
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php foreach($UserProfileSubLeaders AS $UserProfileSubLeader) { ?>
                    <?php if($UserProfileSubLeader->UserProfileId > 0) { ?>
                        <?php
                        $ProfilePhotoPath = ($UserProfileSubLeader->ProfilePhotoPath != '') ? $UserProfileSubLeader->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                        ?>
                        <div class="col-sm-4">
                            <div class="contacts-card"> <img src="<?php echo $ProfilePhotoPath; ?>" class="full-width user_detail_pics" alt="image">
                                <div class="contact-box center-version">
                                    <a href="#">
                                        <address>
                                            <strong><?php echo $UserProfileSubLeader->FirstName. ' '.$UserProfileSubLeader->LastName; ?></strong><br> <?php echo $UserProfileSubLeader->PoliticalPartyName; ?><br>
                                            <i class="fa fa-phone"></i> <?php echo $UserProfileSubLeader->Mobile; ?><br>
                                            <?php echo date('d M, Y h:i a', strtotime($UserProfileSubLeader->AddedOnTime)); ?>
                                        </address>
                                    </a>
                                </div>
                                <div class="contact-box-footer">
                                    <h3 class="m-b-xs"><strong><?php echo $UserProfileSubLeader->FirstName. ' '.$UserProfileSubLeader->LastName; ?></strong></h3>
                                    <p>Sub Leader</p>
                                    <div class="m-t-xs btn-group"> 
                                        <a class="btn btn-xs btn-white" href="call: <?php echo $UserProfileSubLeader->Mobile; ?>"><i class="fa fa-phone"></i> Call </a> 
                                        <a class="btn btn-xs btn-white" href="mail: <?php echo $UserProfileSubLeader->Email; ?>"><i class="fa fa-envelope"></i> Email</a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
                       