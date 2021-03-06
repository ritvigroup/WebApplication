<?php $request_uri = explode("/", $_SERVER['REQUEST_URI']); ?>

<!-- Start page sidebar wrapper -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar">
        <ul class="page-sidebar-menu  page-header-fixed ">
            <?php /* 
            <li class="sidebar-search-wrapper">
                <!-- START RESPONSIVE SEARCH FORM -->
                <form class="sidebar-search" action="" method="POST">
                    <a href="javascript:;" class="remove"> <i class="icon-close"></i> </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn"> <a href="javascript:;" class="btn submit"> <i class="icon-magnifier"></i> </a> </span>
                    </div>
                </form>
                <!-- END RESPONSIVE SEARCH FORM -->
            </li>
            */ ?>
            <?php if($_SESSION['AdminId'] > 0) { } else { ?>
            <li class="nav-item <?php if($request_uri['3'] == "explore") {?>active<?php } ?>"><a class="nav-link" href="<?=base_url();?>explore/explore"><i class="fa fa-binoculars fa-fw"></i><span class="title">Home</span></a></li>
            <?php } ?>

            <li class="nav-item <?php if($request_uri['4'] == "dashboard") {?>active<?php } ?>"> <a class="nav-link" href="<?=base_url();?><?php echo $replace_controller; ?>/dashboard"> <i class="fa fa-tachometer fa-fw"></i> <span class="title">Dashboard</span> </a></li>
            
            
            <?php if($_SESSION['AdminId'] > 0) { ?>
            
            <li class="nav-item <?php if($request_uri['4'] == "user") {?>active<?php } ?>"><a class="nav-link" href="<?=base_url();?>admin/systemuser"><i class="fa fa-pencil-square-o fa-fw"></i><span class="title">User</span></a></li>

            <?php } else { ?>
            <?php /*<li class="nav-item <?php if($request_uri['3'] == "plan") {?>active<?php } ?>"><a class="nav-link" href="<?=base_url();?>plan/plan"><i class="fa fa-pencil-square-o fa-fw"></i><span class="title">Plan</span></a></li>

            <li class="nav-item <?php if($request_uri['3'] == "organize" && ($request_uri['4'] != "event" && $request_uri['4'] != "poll")) {?>active<?php } ?>"><a class="nav-link" href="<?=base_url();?>organize/team"><i class="fa fa-sitemap fa-fw"></i><span class="title">Organize</span></a></li>*/ ?>

            <li class="nav-item <?php if($request_uri['3'] == "connect") {?>active<?php } ?>"><a class="nav-link" href="<?=base_url();?>connect/connect"><i class="fa fa-share-alt-square fa-fw"></i><span class="title">Connect</span></a></li>

            <?php
            $listen_class = "";
            if($request_uri['3'] == "listen" || $request_uri['3'] == "complaint" || $request_uri['3'] == "suggestion" || $request_uri['3'] == "information" || $request_uri['3'] == "event" || $request_uri['3'] == "poll" || $request_uri['3'] == "post") 
            {
                $listen_class = "active";
            }
            ?>

            <li class="nav-item <?php echo $listen_class; ?>"><a class="nav-link" href="<?=base_url();?>listen/listen"><i class="fa fa-headphones fa-fw"></i><span class="title">Listen</span></a></li>

            <li class="nav-item <?php if($request_uri['4'] == "email") {?>active<?php } ?>"><a class="nav-link" href="<?=base_url();?>influence/email"><i class="fa fa-arrows-alt fa-fw"></i><span class="title">Campaign</span></a></li>

            <li class="nav-item <?php if($request_uri['4'] == "contribution") {?>active<?php } ?>"><a class="nav-link" href="<?=base_url();?>contribution/contribution"><i class="fa fa-refresh fa-fw"></i><span class="title">Funding</span></a></li>
            <?php } ?>

            <li class="nav-item <?php if($request_uri['3'] == "report") {?>active<?php } ?>"><a class="nav-link" href="<?=base_url();?>report/report"><i class="fa fa-file-text-o fa-fw"></i><span class="title">Reports</span></a></li>
        </ul>
    </div>

    <div class="left-icon">
        <ul class="list-inline center-block">   
            <li><a href="#" target="_blank"><i class="fa fa-google" aria-hidden="true"></i></a></li>
            <li><a href="https://www.facebook.com/kaajneeti/" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
            <li><a href="https://twitter.com/kaajneeti" target="_blank"><i class=" fa fa-twitter-square" aria-hidden="true"></i></a></li></div>
        </ul>
    </div>

</div>
<!-- End page sidebar wrapper -->