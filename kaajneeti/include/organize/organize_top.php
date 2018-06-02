<div class="portlet-body">
    <div class="mbm">
        <div class="row head">
            <div class="user-heading">
                <div class="col-md-9 border_bottom">
                    <div class="connections-tabs">
                        <ul class="connect-tab-menu">
                            <li <?php if($this->uri->segment(2) == 'team') { ?> class="active"<?php } ?>><a href="<?=base_url();?>organize/team">Team</a></li>
                            <li <?php if($this->uri->segment(2) == 'fleet') { ?> class="active"<?php } ?>><a href="<?=base_url();?>organize/fleet">Fleet</a></li>
                            <li <?php if($this->uri->segment(2) == 'document') { ?> class="active"<?php } ?>><a href="<?=base_url();?>organize/document">Document</a></li>
                            <li <?php if($this->uri->segment(2) == 'group') { ?> class="active"<?php } ?>><a href="<?=base_url();?>organize/group">Group</a></li>
                            
                            <?php /*
                            <li <?php if($this->uri->segment(2) == 'event') { ?> class="active"<?php } ?>><a href="<?=base_url();?>organize/event">Event</a></li>
                            <li <?php if($this->uri->segment(2) == 'poll') { ?> class="active"<?php } ?>><a href="<?=base_url();?>organize/poll">Poll</a></li>
                            */ ?>
                        </ul>
                    </div>
                </div>
                <?php /*
                <div class="col-md-3 border_bottom ">
                    <div class="actions action-right margin_bottom">
                        <div class="dropdown">
                            <button onclick="myFunction()" class="dropbtn organize-button">&nbsp;Manage <span class="caret"></span>   </button>&nbsp;
                            <div id="myDropdown" class="dropdown-content">
                                <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newTeam();"> New Team</a>
                                <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newFleet();"> New Fleet</a>
                                <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newDocument();"> New Documents</a>
                                <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newGroup();"> New Group</a>

                                <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newEvent();"> New Event</a>
                            </div>
                        </div>
                    </div>
                </div>
                */ ?>
            </div>
        </div>
    </div>
</div>