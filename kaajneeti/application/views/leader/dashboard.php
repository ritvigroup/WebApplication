<!DOCTYPE html>
<html lang="en">
<head><title>Dashboard | Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">

    <?php  require_once './include/css.php';?>
    
</head>

<body class="page-header-fixed ">
    
    <?php  require_once './include/top.php';?>

    <div class="clearfix"> </div>
    <div class="page-container">
        
        <?php  require_once './include/left.php';?>

        <!-- Start page content wrapper -->
        <div class="page-content-wrapper animated fadeInRight">
            <div class="page-content">
                <div class="row">
                    <div class="col-md-6 pull-right">
                        <label class="switch ">
                            <input type="checkbox" class="success">
                            <span class="slider round"></span>
                        </label>
                    </div> 
                </div>
                <div class="row  border-bottom white-bg dashboard-header">
                    <div class="col-md-4">
                        <div class="contact-box center-version">
                            <a href="profile.html"> <img src="<?php echo $this->session->userdata('UserProfilePic'); ?>" class="img-circle" alt="image">
                                <h3 class="m-b-xs"><strong><?php echo $this->session->userdata('Name'); ?></strong></h3>
                                <div class="font-bold">Leader</div>
                                <div class="font-bold"><?php echo $this->session->userdata('UserUniqueId'); ?></div>
                                <address>
                                    <strong>Kaajneeti</strong><br>
                                </address>
                            </a>
                        </div>
                    </div>
                    <?php

                    // echo '<pre>';
                    // print_r($Dashboard);
                    // echo '</pre>';

                    foreach($Dashboard->result AS $database_result){
                        if($database_result->feedtype == "complaint") {
                            $complaints[] = $database_result->complaintdata;
                        } else if($database_result->feedtype == "poll") {
                            $polls[] = $database_result->polldata;
                        }
                    }
                    ?>
                    <div class="col-md-4">
                        <div class="contact-box center-version">
                            <h3 style="text-align: center;">Complaint Received</h3>
                            <table class="table table-bordered">
                                <tbody>
                                    <?php foreach($complaints AS $complaint) { ?>
                                        <tr>
                                            <td colspan="2"><a href="<?=base_url();?>complaint/complaintTimeline/<?php echo $complaint->ComplaintUniqueId; ?>"><?php echo $complaint->ComplaintUniqueId; ?></a></td>
                                            <td><?php echo $complaint->ComplaintStatusName; ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $complaint->ApplicantName; ?></td>
                                            <td><?php echo $complaint->ComplaintSubject; ?></td>
                                            <td><?php echo $complaint->AddedOn; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-box center-version">
                            <h3 style="text-align: center;">Suggestion Received</h3>
                            <table class="table table-bordered">
                                <tbody>
                                    <?php foreach($complaints AS $complaint) { ?>
                                        <tr>
                                            <td colspan="2"><a href="<?=base_url();?>complaint/complaintTimeline/<?php echo $complaint->ComplaintUniqueId; ?>"><?php echo $complaint->ComplaintUniqueId; ?></a></td>
                                            <td><?php echo $complaint->ComplaintStatusName; ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $complaint->ApplicantName; ?></td>
                                            <td><?php echo $complaint->ComplaintSubject; ?></td>
                                            <td><?php echo $complaint->AddedOn; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-box center-version">
                            <h3 style="text-align: center;">Poll Tagged</h3>
                            <table class="table table-bordered">
                                <tbody>
                                    <?php foreach($complaints AS $complaint) { ?>
                                        <tr>
                                            <td colspan="2"><a href="<?=base_url();?>complaint/complaintTimeline/<?php echo $complaint->ComplaintUniqueId; ?>"><?php echo $complaint->ComplaintUniqueId; ?></a></td>
                                            <td><?php echo $complaint->ComplaintStatusName; ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $complaint->ApplicantName; ?></td>
                                            <td><?php echo $complaint->ComplaintSubject; ?></td>
                                            <td><?php echo $complaint->AddedOn; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="contact-box center-version">
                            <h3 style="text-align: center;">Event Tagged</h3>
                            <table class="table table-bordered">
                                <tbody>
                                    <?php foreach($complaints AS $complaint) { ?>
                                        <tr>
                                            <td colspan="2"><a href="<?=base_url();?>complaint/complaintTimeline/<?php echo $complaint->ComplaintUniqueId; ?>"><?php echo $complaint->ComplaintUniqueId; ?></a></td>
                                            <td><?php echo $complaint->ComplaintStatusName; ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $complaint->ApplicantName; ?></td>
                                            <td><?php echo $complaint->ComplaintSubject; ?></td>
                                            <td><?php echo $complaint->AddedOn; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="contact-box center-version">
                            <h3 style="text-align: center;">Post Tagged</h3>
                            <table class="table table-bordered">
                                <tbody>
                                    <?php foreach($complaints AS $complaint) { ?>
                                        <tr>
                                            <td colspan="2"><a href="<?=base_url();?>complaint/complaintTimeline/<?php echo $complaint->ComplaintUniqueId; ?>"><?php echo $complaint->ComplaintUniqueId; ?></a></td>
                                            <td><?php echo $complaint->ComplaintStatusName; ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $complaint->ApplicantName; ?></td>
                                            <td><?php echo $complaint->ComplaintSubject; ?></td>
                                            <td><?php echo $complaint->AddedOn; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="contact-box center-version">
                            <h3 style="text-align: center;">Team Created</h3>
                            <table class="table table-bordered">
                                <tbody>
                                    <?php foreach($complaints AS $complaint) { ?>
                                        <tr>
                                            <td colspan="2"><a href="<?=base_url();?>complaint/complaintTimeline/<?php echo $complaint->ComplaintUniqueId; ?>"><?php echo $complaint->ComplaintUniqueId; ?></a></td>
                                            <td><?php echo $complaint->ComplaintStatusName; ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $complaint->ApplicantName; ?></td>
                                            <td><?php echo $complaint->ComplaintSubject; ?></td>
                                            <td><?php echo $complaint->AddedOn; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    <?php  require_once './include/scroll_top.php';?>

<?php  require_once './include/footer.php';?>
</body>

<?php  require_once './include/js.php';?>



</html>