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