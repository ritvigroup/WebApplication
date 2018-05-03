<?php $request_uri = explode("/", $_SERVER['REQUEST_URI']); ?>

<!-- Start page sidebar wrapper -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar">
        <ul class="page-sidebar-menu  page-header-fixed ">
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
            <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>admin/dashboard"> <i class="fa fa-tachometer fa-fw"></i> <span class="title">Dashboard</span> </a></li>
            
            <li class="heading">
                <h3 class="uppercase">Features</h3>
            </li>

            <li class="nav-item <?php if($request_uri['4'] == "user") {?>active<?php } ?>"><a class="nav-link" href="<?=base_url();?>admin/systemuser"><i class="fa fa-pencil-square-o fa-fw"></i><span class="title">User</span></a></li>

            
        </ul>
    </div>
</div>
<!-- End page sidebar wrapper -->