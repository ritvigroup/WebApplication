<div class="col-md-12">
	<div class="dropdown">
		<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Connection
		<span class="caret"></span></button>
		<ul class="dropdown-menu">
			<li><a href="#<?=base_url();?>connect/connect">All <span class="badge"><?php echo $Profile->result->MyTotalConnections; ?></span></a></li>
			<li><a href="<?=base_url();?>connect/leader">Leader <span class="badge"><?php echo $Profile->result->MyTotalLeaderConnections; ?></span></a></li>
			<li><a href="<?=base_url();?>connect/citizen">Citizen <span class="badge"><?php echo $Profile->result->MyTotalCitizenConnections; ?></span></a></li>
			<li><a href="<?=base_url();?>connect/other">Others <span class="badge"><?php echo $Profile->result->MyTotalOtherConnections; ?></span></a></li>
		</ul>
	</div>

	<div class="dropdown">
		<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Request
		<span class="caret"></span></button>
		<ul class="dropdown-menu">
			<li><a href="<?=base_url();?>connect/outgoing">Outgoing <span class="badge"><?php echo $Profile->result->MyTotalOutgoingConnections; ?></span></a></li>
			<li><a href="<?=base_url();?>connect/incoming">Incoming <span class="badge"><?php echo $Profile->result->MyTotalIncomingConnections; ?></span></a></li>

		</ul>
	</div>

	<div class="dropdown">
		<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Follow
		<span class="caret"></span></button>
		<ul class="dropdown-menu">
			<li><a href="<?=base_url();?>connect/following">Following <span class="badge"><?php echo $Profile->result->MyTotalFollowings; ?></span></a></li>
			<li><a href="<?=base_url();?>connect/follower">Follower <span class="badge"><?php echo $Profile->result->MyTotalFollowers; ?></span></a></li>

		</ul>
	</div>

	<div class="dropdown">
		<a href="<?=base_url();?>connect/search" class="btn btn-default"> <i class="fa fa-plus" aria-hidden="true"></i> Find Connection</a>
	</div>

	<div class="connetions-search col-sm-2 input-group pull-right">
		<input type="text" class="form-control" placeholder="Search for..." id="search_in_connect" onkeyup="return searchInConnect();">
		<span class="input-group-btn">
			<button class="btn btn-default" type="button">Go!</button>
		</span>
	</div>
</div>

<?php /*
<a href="<?=base_url();?>connect/connect" class="btn aqua btn-outline btn-sm text-capitalize"> All <span class="badge"><?php echo $Profile->result->MyTotalConnections; ?></span></a>

<a href="<?=base_url();?>connect/leader" class="btn aqua btn-outline btn-sm text-capitalize"> Leader <span class="badge"><?php echo $Profile->result->MyTotalLeaderConnections; ?></span></a>

<a href="<?=base_url();?>connect/citizen" class="btn aqua btn-outline btn-sm text-capitalize"> Citizen <span class="badge"><?php echo $Profile->result->MyTotalCitizenConnections; ?></span></a>

<a href="<?=base_url();?>connect/other" class="btn aqua btn-outline btn-sm text-capitalize"> Other <span class="badge"><?php echo $Profile->result->MyTotalOtherConnections; ?></span></a>

<a href="<?=base_url();?>connect/incoming" class="btn aqua btn-outline btn-sm text-capitalize"> Incoming <span class="badge"><?php echo $Profile->result->MyTotalIncomingConnections; ?></span></a>

<a href="<?=base_url();?>connect/outgoing" class="btn aqua btn-outline btn-sm text-capitalize"> Outgoing <span class="badge"><?php echo $Profile->result->MyTotalOutgoingConnections; ?></span></a>

<a href="<?=base_url();?>connect/follower" class="btn aqua btn-outline btn-sm text-capitalize">Follower <span class="badge"><?php echo $Profile->result->MyTotalFollowers; ?></span></a>
        
<a href="<?=base_url();?>connect/following" class="btn aqua btn-outline btn-sm text-capitalize">Following <span class="badge"><?php echo $Profile->result->MyTotalFollowings; ?></span></a>

<a href="<?=base_url();?>connect/group" class="btn aqua btn-outline btn-sm text-capitalize">Group <span class="badge"><?php echo $Profile->result->MyTotalGroupWithAssociated; ?></span></a>

<a href="<?=base_url();?>connect/search" class="btn aqua btn-outline btn-sm text-capitalize"><i class="fa fa-plus"></i> Find Connection</a>

<div class="connetions-search col-sm-2 input-group pull-right">
    <input type="text" class="form-control" placeholder="Search for..." id="search_in_connect" onkeyup="return searchInConnect();">
    <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
    </span>
</div>
*/ ?>