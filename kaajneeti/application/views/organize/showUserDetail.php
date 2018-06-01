<?php
// echo '<pre>';
// print_r($UserProfile);
// echo '</pre>';

if($UserProfile->result->ProfilePhotoPath != '') {
    $profile_pic = ($UserProfile->result->ProfilePhotoPath != '') ? $UserProfile->result->ProfilePhotoPath : base_url().'assets/images/default-user.png';
} else {
    $profile_pic = ($UserProfile->result->ProfilePhotoPath != '') ? $UserProfile->result->ProfilePhotoPath : base_url().'assets/images/default-user.png';
}
?>

<div class="profile-card">
    <div class="profile-avetar">
        <img class="profile-avetar-img" src="<?php echo $profile_pic; ?>" alt="<?php echo $UserProfile->result->FirstName. ' '.$UserProfile->result->LastName; ?>" width="128" height="128">
    </div>
    <div class="profile-overview">
        <h1 class="profile-name"> <?php echo $UserProfile->result->FirstName. ' '.$UserProfile->result->LastName; ?> </h1>
         <span class="badge badge-info badge-roundless" style="margin-top: 8px;"> Team Member </span>
        <p><?php echo $UserProfile->result->FirstName; ?></p>
        <p><i class="fa fa-envelope-open-o"></i> <?php echo $UserProfile->result->Email; ?></p>
        <p><i class="fa fa-phone"></i> <?php echo $UserProfile->result->Mobile; ?></p>
        <p><i class="fa fa-home"></i> <?php echo $UserProfile->result->Address; ?></p>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <dl>
            <dt>User Information </dt>
            <dd class="row">
                <span class="col-md-4">First Name</span><span class="col-md-8"><a href="#"><?php echo $UserProfile->result->FirstName; ?></a></span>
            </dd>
            <dd class="row">
                <span class="col-md-4">Last Name</span><span class="col-md-8"><a href="#"><?php echo $UserProfile->result->LastName; ?></a></span>
            </dd>
            <dd class="row">
                <span class="col-md-4">Email</span><span class="col-md-8"><a href="#"><?php echo $UserProfile->result->Email; ?></a></span>
            </dd>
            <?php /*
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
                <span class="col-md-4">Phone</span><span class="col-md-8"><a href="#">120-555-455-4551</a></span>
            </dd>
            <dd class="row">
                <span class="col-md-4">Mobile</span><span class="col-md-8"><a href="#">888-555-6865</a></span>
            </dd>
            <dd class="row">
                <span class="col-md-4">Website</span><span class="col-md-8"><a href="#">www.google.com</a></span>
            </dd>
            <dd class="row">
                <span class="col-md-4">Fax</span><span class="col-md-8"><a href="#">text</a></span>
            </dd>
            <dd class="row">
                <span class="col-md-4">Date of Birth</span><span class="col-md-8"><a href="#">26-feb-1800</a></span>
            </dd>
            */ ?>
        </dl>
    </div>
</div>

<?php /* 
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
*/ ?>