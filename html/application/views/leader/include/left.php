<?php $request_uri = explode("/", $_SERVER['REQUEST_URI']); ?>
<nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
    <div class="sidebar-collapse menu-scroll">
        <ul id="side-menu" class="nav">
            <li class="user-panel">
                <div class="thumb"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg"
                                        alt="" class="img-circle"/></div>
                <div class="info"><p>Rajesh</p>
                    <ul class="list-inline list-unstyled">
                        <li><a href="<?=base_url();?>leader/profile" data-hover="tooltip" title="Profile"><i
                                class="fa fa-user"></i></a></li>
                        <li><a href="<?=base_url();?>leader/inbox" data-hover="tooltip" title="Mail"><i
                                class="fa fa-envelope"></i></a></li>
                        <li><a href="<?=base_url();?>leader/setting" data-hover="tooltip" title="Setting" data-toggle="modal"
                               data-target="#modal-config"><i class="fa fa-cog"></i></a></li>
                        <li><a href="<?=base_url();?>leader/logout" data-hover="tooltip" title="Logout"><i
                                class="fa fa-sign-out"></i></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </li>
            <li class="<?php if($request_uri['4'] == "dashboard") {?>active<?php } ?>"><a href="<?=base_url();?>leader/dashboard"><i class="fa fa-tachometer fa-fw">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">Dashboard</span></a></li>

            <li class="<?php if($request_uri['4'] == "team") {?>active<?php } ?>"><a href="<?=base_url();?>leader/team"><i class="fa fa-tachometer fa-fw">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">Lead / Plan</span></a></li>

            <li class="<?php if($request_uri['4'] == "complaint") {?>active<?php } ?>"><a href="<?=base_url();?>leader/complaint"><i class="fa fa-tachometer fa-fw">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">Connect</span></a></li>


            <li class="<?php if($request_uri['4'] == "event") {?>active<?php } ?>"><a href="<?=base_url();?>leader/event"><i class="fa fa-tachometer fa-fw">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">Listen</span></a></li>

            <li class="<?php if($request_uri['4'] == "event") {?>active<?php } ?>"><a href="<?=base_url();?>leader/event"><i class="fa fa-tachometer fa-fw">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">Influence / Engage</span></a></li>

            <li class="<?php if($request_uri['4'] == "event") {?>active<?php } ?>"><a href="<?=base_url();?>leader/event"><i class="fa fa-tachometer fa-fw">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">Convert</span></a></li>

            <li class="<?php if($request_uri['4'] == "event") {?>active<?php } ?>"><a href="<?=base_url();?>leader/event"><i class="fa fa-tachometer fa-fw">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">Reports</span></a></li>

            <li class="<?php if($request_uri['4'] == "setting") {?>active<?php } ?>"><a href="<?=base_url();?>leader/setting"><i class="fa fa-tachometer fa-fw">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">Setting</span></a></li>

            <?php /*
            <li><a href="http://madmin.swlabs.co/" target="_blank"><i class="fa fa-bullhorn fa-fw">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">Angular JS Version</span><span
                    class="label label-violet">v4.0</span></a></li>
            
            <li><a href="#"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
                </i><span class="menu-title">Frontend</span><span class="fa arrow"></span><span
                    class="label label-yellow">v3.0</span></a>
                <ul class="nav nav-second-level">
                    <li><a href="frontend-one-page.html"><i class="fa fa-rocket"></i><span
                            class="submenu-title">One Page</span></a></li>
                </ul>
            </li>
            
            <li class="<?php if($request_uri['4'] == "team" || $request_uri['4'] == "newleader" || $request_uri['4'] == "citizen") {?>active<?php } ?>"><a href="#"><i class="fa fa-desktop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Organize</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="<?php if($request_uri['4'] == "team") {?>active<?php } ?>"><a href="<?=base_url();?>leader/team"><i class="fa fa-align-left"></i><span
                            class="submenu-title">Team / Volunteer</span></a></li>
                    <li class="<?php if($request_uri['4'] == "citizen") {?>active<?php } ?>"><a href="<?=base_url();?>leader/citizen"><i
                            class="fa fa-angle-double-left"></i><span class="submenu-title">Voter / Citizen</span></a>
                    </li>
                </ul>
            </li>
            <li class="<?php if($request_uri['4'] == "chat" || $request_uri['4'] == "call") {?>active<?php } ?>"><a href="#"><i class="fa fa-send-o fa-fw">
                <div class="icon-bg bg-green"></div>
                </i><span class="menu-title">Connect</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="<?php if($request_uri['4'] == "chat") {?>active<?php } ?>"><a href="<?=base_url();?>leader/chat"><i class="fa fa-briefcase"></i><span class="submenu-title">Chat</span></a></li>
                    <li class="<?php if($request_uri['4'] == "call") {?>active<?php } ?>"><a href="<?=base_url();?>leader/call"><i class="fa fa-briefcase"></i><span class="submenu-title">Call</span></a></li>
                </ul>
            </li>

            <li class="<?php if($request_uri['4'] == "complaint" || $request_uri['4'] == "email" || $request_uri['4'] == "sms" || $request_uri['4'] == "notification" || $request_uri['4'] == "livestreaming" || $request_uri['4'] == "event" || $request_uri['4'] == "issue" || $request_uri['4'] == "poll" || $request_uri['4'] == "social") {?>active<?php } ?>"><a href="#"><i class="fa fa-send-o fa-fw">
                <div class="icon-bg bg-green"></div>
                </i><span class="menu-title">Broadcast</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="<?php if($request_uri['4'] == "complaint") {?>active<?php } ?>"><a href="<?=base_url();?>leader/complaint"><i class="fa fa-briefcase"></i><span class="submenu-title">Complaint</span></a></li>
                    <li class="<?php if($request_uri['4'] == "email") {?>active<?php } ?>"><a href="<?=base_url();?>leader/email"><i class="fa fa-briefcase"></i><span class="submenu-title">Email</span></a></li>
                    <li class="<?php if($request_uri['4'] == "sms") {?>active<?php } ?>"><a href="<?=base_url();?>leader/sms"><i class="fa fa-briefcase"></i><span class="submenu-title">SMS</span></a></li>
                    <li class="<?php if($request_uri['4'] == "notification") {?>active<?php } ?>"><a href="<?=base_url();?>leader/notification"><i class="fa fa-briefcase"></i><span class="submenu-title">Notification</span></a></li>
                    <li class="<?php if($request_uri['4'] == "livestreaming") {?>active<?php } ?>"><a href="<?=base_url();?>leader/livestreaming"><i class="fa fa-briefcase"></i><span class="submenu-title">Live Streaming</span></a></li>
                    <li class="<?php if($request_uri['4'] == "event") {?>active<?php } ?>"><a href="<?=base_url();?>leader/event"><i class="fa fa-briefcase"></i><span class="submenu-title">Events</span></a></li>
                    <li class="<?php if($request_uri['4'] == "issue") {?>active<?php } ?>"><a href="<?=base_url();?>leader/issue"><i class="fa fa-briefcase"></i><span class="submenu-title">Issue</span></a></li>
                    <li class="<?php if($request_uri['4'] == "poll") {?>active<?php } ?>"><a href="<?=base_url();?>leader/poll"><i class="fa fa-briefcase"></i><span class="submenu-title">Poll</span></a></li>
                    <li class="<?php if($request_uri['4'] == "social") {?>active<?php } ?>"><a href="<?=base_url();?>leader/social"><i class="fa fa-briefcase"></i><span class="submenu-title">Social</span></a></li>
                </ul>
            </li>

            <li class="<?php if($request_uri['4'] == "voter-report" || $request_uri['4'] == "team-report" || $request_uri['4'] == "geography-report") {?>active<?php } ?>"><a href="#"><i class="fa fa-send-o fa-fw">
                <div class="icon-bg bg-green"></div>
                </i><span class="menu-title">Reports</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="<?php if($request_uri['4'] == "voter-report") {?>active<?php } ?>"><a href="<?=base_url();?>leader/voter-report"><i class="fa fa-briefcase"></i><span class="submenu-title">Voter</span></a></li>
                    <li class="<?php if($request_uri['4'] == "team-report") {?>active<?php } ?>"><a href="<?=base_url();?>leader/team-report"><i class="fa fa-briefcase"></i><span class="submenu-title">Team</span></a></li>
                    <li class="<?php if($request_uri['4'] == "geography-report") {?>active<?php } ?>"><a href="<?=base_url();?>leader/geography-report"><i class="fa fa-briefcase"></i><span class="submenu-title">Geography</span></a></li>
                </ul>
            </li>

            <li class="<?php if($request_uri['4'] == "setting") {?>active<?php } ?>"><a href="<?=base_url();?>leader/setting"><i class="fa fa-tachometer fa-fw">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">Setting</span></a></li>
            
            <li class="<?php if($request_uri['4'] == "switch-profile") {?>active<?php } ?>"><a href="<?=base_url();?>leader/switch-profile"><i class="fa fa-slack fa-fw">
                <div class="icon-bg bg-green"></div>
            </i><span class="menu-title">Switch Profile</span></a></li>
            */ ?>
        </ul>
    </div>
</nav>
<!--END SIDEBAR MENU--><!--BEGIN CHAT FORM-->
<div id="chat-form" class="fixed">
    <div class="chat-inner"><h2 class="chat-header"><a href="javascript:;" class="chat-form-close pull-right"><i
            class="glyphicon glyphicon-remove"></i></a><i class="fa fa-user"></i>&nbsp;
        Chat
        &nbsp;<span class="badge badge-info">3</span></h2>

        <div id="group-1" class="chat-group"><strong>Favorites</strong><a href="#"><span
                class="user-status is-online"></span>
            <small>Verna Morton</small>
            <span class="badge badge-info">2</span></a>
            <a href="#"><span class="user-status is-online"></span>
                <small>Delores Blake</small>
            <span class="badge badge-info is-hidden">0</span></a>

        </div>
        
        <div id="group-2" class="chat-group"><strong>Office</strong><a href="#"><span
                class="user-status is-busy"></span>
            <small>Ann Scott</small>
            <span class="badge badge-info is-hidden">0</span></a><a href="#"><span
                class="user-status is-offline"></span>
            <small>Sherman Stokes</small>
            <span class="badge badge-info is-hidden">0</span></a><a href="#"><span
                class="user-status is-offline"></span>
            <small>Florence Pierce</small>
            <span class="badge badge-info">1</span></a>
        </div>
        
    </div>
    <div id="chat-box" style="top:400px">
        <div class="chat-box-header"><a href="#" class="chat-box-close pull-right"><i
                class="glyphicon glyphicon-remove"></i></a><span class="user-status is-online"></span><span
                class="display-name">Willard Mckenzie</span>
            <small>Online</small>
        </div>
        <div class="chat-content">
            <ul class="chat-box-body">
                <li><p><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg"
                            class="avt"/><span class="user">Rajesh Vishwakarma</span><span class="time">09:33</span></p>

                    <p>Hi Swlabs, we have some comments for you.</p></li>
                <li class="odd"><p><img src="https://s3.amazonaws.com/uifaces/faces/twitter/alagoon/48.jpg"
                                        class="avt"/><span class="user">Swlabs</span><span
                        class="time">09:33</span></p>

                    <p>Hi, we're listening you...</p></li>
            </ul>
        </div>
        <div class="chat-textarea"><input placeholder="Type your message" class="form-control"/></div>
    </div>
</div>