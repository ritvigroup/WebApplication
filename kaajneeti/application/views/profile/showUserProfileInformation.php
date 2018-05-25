<?php 

$Name = $result->Profile->FirstName.' '.$result->Profile->LastName;

if($result->Profile->ProfilePhotoPath != '') {
    $profile_pic = ($result->Profile->ProfilePhotoPath != '') ? $result->Profile->ProfilePhotoPath : base_url().'assets/images/default-user.png';
} else {
    $profile_pic = ($result->Profile->ProfilePhotoPath != '') ? $result->Profile->ProfilePhotoPath : base_url().'assets/images/default-user.png';
} 
?>



<div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <h4 id="modal-stackable-label" class="modal-title"><?php echo $Name; ?></h4>
    </div>
    <div class="modal-body">
        <div class="panel panel-white">
            <?php
            // echo '<pre>';
            // print_r($result);
            // echo '</pre>';

            
            ?>
            <div class="profile-card-2">
                <div class="profile-avetar">
                    <img class="profile-avetar-img" src="<?php echo $profile_pic; ?>" alt="<?php echo $Name; ?>" width="128" height="128">
                </div>
                <div class="profile-overview">
                    <h1 class="profile-name"> <?php echo $Name; ?> </h1>
                        <span class="badge badge-info badge-roundless" style="margin-top: 8px;"> Administrator </span>
                        <p><?php echo $result->Profile->UserBio; ?></p>
                    <p><i class="fa fa-envelope-open-o"></i> <?php echo $result->Profile->Email; ?></p>
                    <p><i class="fa fa-phone"></i> <?php echo $result->Profile->Mobile; ?></p>
                    <p><i class="fa fa-home"></i> 602, Noida</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <dl>
                        <dt>User Information </dt>
                        <dd class="row">
                            <span class="col-md-4">First Name</span><span class="col-md-8"><a href="#"><?php echo $result->Profile->FirstName; ?></a></span>
                        </dd>
                        <dd class="row">
                            <span class="col-md-4">Last Name</span><span class="col-md-8"><a href="#"><?php echo $result->Profile->LastName; ?></a></span>
                        </dd>
                        <dd class="row">
                            <span class="col-md-4">Email</span><span class="col-md-8"><a href="#"><?php echo $result->Profile->Email; ?></a></span>
                        </dd>
                        <dd class="row">
                            <span class="col-md-4">Role</span><span class="col-md-8"><a href="#">CEO</a></span>
                        </dd>
                        <dd class="row">
                            <span class="col-md-4">Profile</span><span class="col-md-8"><a href="#">Administrator</a></span>
                        </dd>
                        <dd class="row">
                            <span class="col-md-4">Alias</span><span class="col-md-8"><a href="#">text</a></span>
                        </dd>
                        <dd class="row">
                            <span class="col-md-4">Mobile</span><span class="col-md-8"><a href="#"><?php echo $result->Profile->Mobile; ?></a></span>
                        </dd>
                        <dd class="row">
                            <span class="col-md-4">Website</span><span class="col-md-8"><a href="#"><?php echo $result->Profile->Email; ?></a></span>
                        </dd>
                        <dd class="row">
                            <span class="col-md-4">Date of Birth</span><span class="col-md-8"><a href="#"><?php echo $result->Profile->DateOfBirth; ?></a></span>
                        </dd>
                    </dl>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <dl>
                        <dt>Address Information</dt>
                        <dd class="row">
                            <span class="col-md-4">Street</span><span class="col-md-8"><a href="#"></a></span>
                        </dd>
                        <dd class="row">
                            <span class="col-md-4">City</span><span class="col-md-8"><a href="#">Noida</a></span>
                        </dd>
                        <dd class="row"> 
                            <span class="col-md-4">State</span><span class="col-md-8"><a href="#">Uttar Pradesh</a></span>
                        </dd>
                        <dd class="row">
                            <span class="col-md-4">Zip Code</span><span class="col-md-8"><a href="#">200110</a></span>
                        </dd>   
                        <dd class="row">
                            <span class="col-md-4">Country</span><span class="col-md-8"><a href="#">US</a></span>
                        </dd> 
                    </dl>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <dl>
                        <dt>Social Profile </dt>
                        <dd><span><a href="#">Twitter</a></span></dd>
                        <dd><span><a href="#">Facebook</a></span></dd>
                        <dd><span><a href="#">Google+</a></span></dd>
                        <dd><span><a href="#">Linkedin</a></span></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>