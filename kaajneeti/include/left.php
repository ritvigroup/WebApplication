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
            <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>leader/dashboard"> <i class="fa fa-tachometer fa-fw"></i> <span class="title">Dashboard</span> </a></li>
            
            <li class="heading">
                <h3 class="uppercase">Features</h3>
            </li>

            <li class="nav-item <?php if($request_uri['4'] == "plan") {?>active<?php } ?>"><a class="nav-link" href="<?=base_url();?>plan/plan"><i class="fa fa-pencil-square-o fa-fw"></i><span class="title">Plan</span></a></li>

            <li class="nav-item <?php if($request_uri['4'] == "organize") {?>active<?php } ?>"><a class="nav-link" href="<?=base_url();?>organize/team"><i class="fa fa-sitemap fa-fw"></i><span class="title">Organize</span></a></li>

            <li class="nav-item <?php if($request_uri['4'] == "express") {?>active<?php } ?>"><a class="nav-link" href="<?=base_url();?>express/express"><i class="fa fa-bullhorn fa-fw"></i><span class="title">Express</span></a></li>

            <li class="nav-item <?php if($request_uri['4'] == "complaint") {?>active<?php } ?>"><a class="nav-link" href="<?=base_url();?>connect/myfriends"><i class="fa fa-share-alt-square fa-fw"></i><span class="title">Connect</span></a></li>


            <li class="nav-item <?php if($request_uri['4'] == "event") {?>active<?php } ?>"><a class="nav-link" href="<?=base_url();?>listen/listen"><i class="fa fa-headphones fa-fw"></i><span class="title">Listen</span></a></li>

            <li class="nav-item <?php if($request_uri['4'] == "influence") {?>active<?php } ?>"><a class="nav-link" href="<?=base_url();?>influence/email"><i class="fa fa-arrows-alt fa-fw"></i><span class="title">Campaign</span></a></li>

            <li class="nav-item <?php if($request_uri['4'] == "contribution") {?>active<?php } ?>"><a class="nav-link" href="<?=base_url();?>contribution/contribution"><i class="fa fa-refresh fa-fw"></i><span class="title">Funding</span></a></li>

            <li class="nav-item <?php if($request_uri['4'] == "report") {?>active<?php } ?>"><a class="nav-link" href="<?=base_url();?>report/report"><i class="fa fa-file-text-o fa-fw"></i><span class="title">Reports</span></a></li>
        </ul>
    </div>
</div>
<!-- End page sidebar wrapper -->