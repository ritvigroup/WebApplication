<div class="modal-header">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title">Express</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">

            <ul class="nav navbar-nav">
                <li><a href="javascript:void(0);"> <i class="fa fa-pencil" aria-hidden="true"></i> Compose Post</a></li>
                <li><a href="javascript:void(0);"> <i class="fa fa-picture-o" aria-hidden="true"></i> Photo/Video Album</a></li>
                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fa fa-video-camera" aria-hidden="true"></i> Live Video</a></li>
            </ul>

            <?php /*
            <div class="actions action-right">

                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn btn">&nbsp;Manage <span class="caret"></span></button>&nbsp;
                    <div id="myDropdown" class="dropdown-content">
                        <a href="#home"> Post</a>
                        <a href="#about"> Poll</a>
                        <a href="#home"> Event</a>
                        <a href="#about">Task</a>
                        <a href="#about">Calender</a>
                        <a href="#about">Social Post</a>
                        <a  data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newTeam();"  href="#contact"> New Documents</a>
                        <a href="#about"> New Group</a>
                    </div>
                </div>
            </div>
            */ ?>

        </div>
    </div>


    

    <div class="row">
        <div class="col-xs-12">
            <div class="textarea-img">
                <img src="https://www.toptene.com/wp-content/uploads/2017/10/top-10-most-handsome-men-in-the-world.jpg"  width="50"  height="50" class="img-circle">
            </div>
            <div class="form-group">
                <textarea class="form-control placeholder"  placeholder="Write Somthing here  ......" rows="8"></textarea>
            </div>
        </div>
    </div>

    <div class="row" style="max-height: 100px; overflow-y: auto; overflow-x: none; max-width: 100%;">

        <div class="col-md-3">
            <button type="button" class="btn btn-default default-border">
                <i class=" fa fa-envelope"></i> Post
            </button>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-default default-border">
                <i class=" fa fa-list-ul"></i> Poll
            </button>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-default default-border">
                <i class=" fa fa-calendar"></i> Event
            </button>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-default default-border">
                <i class="fa fa-tasks"></i> Task
            </button>
        </div>


        <div class="col-md-3">
            <button type="button" class="btn btn-default default-border"><i class="fa fa-envelope"></i> Social Post</button>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-default default-border"><i class="fa fa-calendar"></i> Calender</button>
        </div>

        <div class="col-md-3">
            <button type="button" class="btn btn-default default-border"> <i class="fa fa-tasks"></i> Task </button>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-default default-border"><i class="fa fa-users" aria-hidden="true"></i> New Group</button>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-default default-border"> <i class=" fa fa-calendar"></i> Event   </button>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-default default-border"><i class="fa fa-file" aria-hidden="true"></i> New Document</button>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="dropup express-dropdown pull-right" id="my-id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <div class="dropup express-dropdown " id="my-id">
                    <button class="btn btn-default dropdown-toggle" type="button"  id="my-id2" data-toggle="dropdown">Public
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu2">
                        <li><a href="#">Public</a></li>
                        <li><a href="#">My followers</a></li>
                        <li><a href="#">My Connect</a></li>
                        <li><a href="#">Only Me</a></li>
                        <li><a href="#">Specific form</a></li>
                    </ul>

                </div>

                <button type="button" class="btn btn-primary">Post</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade custom-fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered model-top" role="document">
        <div class="modal-content">
            <div class="modal-header express-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="button-group ">
                            <button type="button" class="btn btn-primary camera-btn"><i class="fa fa-video-camera" aria-hidden="true"></i> Camera</button>
                            <button type="button" class="btn btn-default connect-btn"><i class="fa fa-plug" aria-hidden="true"></i> Connect</button>
                        </div>

                        <h1 class="text-center camerah1">Unable to find camera</h1>
                        <p class="text-center">Please connect a camera and verify that camera permissions are correct in your browser</p><br>
                        <div class="button-group ">
                            <button type="button" data-dismiss="modal" class="btn btn-primary  ">Done</button></div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>