                <!DOCTYPE html>
                <html lang="en">
                <head><title>My Team</title>
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
                                <div class="row  border-bottom white-bg dashboard-header">
                                    <div class="col-md-12">
                                        <div class="portlet box">
                                            <div class="portlet-header">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                <h3>Organize</h3>
                                                </div>

                                              
                                                <div class="actions action-right">
                                                  <!-- <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" class="btn btn-info btn-xs" onClick="return newTeam();"><i class="fa fa-plus"></i>&nbsp;Team</a>&nbsp;
                                        <a href="<?=base_url();?>organize/fleet" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;Fleet</a>&nbsp;
                                                    <a href="<?=base_url();?>organize/documents" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;Documents</a>&nbsp;
                                                     -->
                                                     <div class="dropdown">
                                        <button onclick="myFunction()" class="dropbtn"><!-- <i class="fa fa-plus-circle"></i> -->&nbsp;Manage <span class="caret"></span>   </button>&nbsp;
                                        <div id="myDropdown" class="dropdown-content">
                                          <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newTeam();"> New Team</a>
                                                <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newFleet();"> New Fleet</a>
                                                <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newDocument();"> New Documents</a>
                                                <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newGroup();"> New Group</a>
                                    </div>
                                  </div>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="portlet-body">

                                                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#team">Team</a></li>
                    <li><a data-toggle="tab" href="#fleet"> Fleet</a></li>
                    <li><a data-toggle="tab" href="#documents"> Documents</a></li>
                    <li><a data-toggle="tab" href="#group">Group</a></li>
                    
                  </ul>

                  <div class="tab-content">
                    <div id="team" class="tab-pane fade in active">

                      <div class="row">
                                 <div class="col-md-8 ">
                     </div>

                            <div class="col-md-4 active-user">
                        <div class="dropdown ">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Active Users
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="#" id="user">Active Users</a></li>
                              <li><a href="#">Inactive Users</a></li>
                              <li><a href="#">Unconfirmed Users</a></li>
                              <li><a href="#">Deleted Users</a></li>
                              <li><a href="#" id="activate_user">Activate Users</a></li>
                            </ul>
                          </div>

                              <div class="dropdown  ractive-user">
                             <div class="dropdown  organize-user ">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu " >
                             
                              <li><a href="#">Task</a></li>
                              <li><a href="#">Call</a></li>
                              <li><a href="#">Event</a></li>
                              <li><a href="#" id="">Text</a></li>
                            </ul>
                          </div>
                        </div>


                    

                                  <div class="dropdown  organize-user active-user">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu organize-user">
                              <li><a href="#">Deactivate</a></li>
                              <li><a href="#">Delete </a></li>
                              <li><a href="#">active</a></li>
                              <li><a href="#">Text</a></li>
                              <li><a href="#" id="">Unconfirmed</a></li>
                              <li><a href="#" id="">Print</a></li>
                              <li><a href="#" id=""> export to PDF</a></li>
                              <li><a href="#" id="">export to excel</a></li>
                            </ul>
                          </div>

                        </div>
                 
              




                      <div class="row">
                
                             
                                      <div class="col-md-12 " >
                         <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th><div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></th>
                            <th>FULL NAME</th>
                            <th>EMAIL ADDRESS</th>
                            <th>ROLE</th>
                            <th>PROFILE</th>
                            <th>USER STATUS</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                        <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div>    </td>
                            <td>Gaurav Vijay Gautam</td>
                            <td>gaurav@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                            <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                                </label>

                             </td>
                          </tr>
                          <tr>
                            <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                            <td>Vaidehi Ahlawat</td>
                            <td>vaidehi@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                            <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                            </label>

                             </td>
                          </tr>
                          <tr>
                            <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                            <td>Rajesh Vishwakarma</td>
                            <td>vrajesh@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                                 <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                                </label>

                             </td>
                          </tr>
                             <tr>
                                <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                            <td>Sunil Vishwakarma</td>
                            <td>vsunil@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                                 <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                                </label>

                             </td>
                          </tr>
                             <tr>
                                <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                            <td>Shuaib Saifi</td>
                            <td>shuaib@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                                <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                                </label>

                             </td>
                          </tr>
                        </tbody>
                    </table>
                     </div>
                        
                     </div>

               
                      
              
    <!-- 
                     <div class="row">
                         <div class="col-md-6" id="user2" >
                             <table class="table table-border" >
                <thead>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>    <div class="form-group">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                    <td><img src="https://www.toptene.com/wp-content/uploads/2017/10/top-10-most-handsome-men-in-the-world.jpg"  width="50"  height="50" class="img-circle"><span></span></td>
                    <td>Sub Leader</td>
                  </tr>
                  <tr>
                    <td>Mary</td>
                    <td>Moe</td>
                    <td>mary@example.com</td>
                  </tr>
                  <tr>
                    <td>July</td>
                    <td>Dooley</td>
                    <td>july@example.com</td>
                  </tr>
                </tbody>
              </table>

                         </div>
                         <div class="col-md-6"></div>

                     </div>
     -->


                    
                    </div>
                    <hr>
                </div>


                    <div id="fleet" class="tab-pane fade">

      
                   
                                 <div class="col-md-8 ">   </div>
                 

                            <div class="col-md-4 active-user">
                        <div class="dropdown ">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Active Users
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="#" id="user">Active Users</a></li>
                              <li><a href="#">Inactive Users</a></li>
                              <li><a href="#">Unconfirmed Users</a></li>
                              <li><a href="#">Deleted Users</a></li>
                              <li><a href="#" id="activate_user">Activate Users</a></li>
                            </ul>
                          </div>

                              <div class="dropdown  ractive-user">
                             <div class="dropdown  organize-user ">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu " >
                             
                              <li><a href="#">Task</a></li>
                              <li><a href="#">Call</a></li>
                              <li><a href="#">Event</a></li>
                              <li><a href="#" id="">Text</a></li>
                            </ul>
                          </div>
                        </div>


                    

                                  <div class="dropdown  organize-user active-user">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu organize-user">
                              <li><a href="#">Deactivate</a></li>
                              <li><a href="#">Delete </a></li>
                              <li><a href="#">active</a></li>
                              <li><a href="#">Text</a></li>
                              <li><a href="#" id="">Unconfirmed</a></li>
                              <li><a href="#" id="">Print</a></li>
                              <li><a href="#" id=""> export to PDF</a></li>
                              <li><a href="#" id="">export to excel</a></li>
                            </ul>
                          </div>

                        </div>


                     <div class="row">
                
                             
                                      <div class="col-md-12 " >
                         <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th><div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></th>
                            <th>FULL NAME</th>
                            <th>EMAIL ADDRESS</th>
                            <th>ROLE</th>
                            <th>PROFILE</th>
                            <th>USER STATUS</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                        <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div>    </td>
                            <td>Gaurav Vijay Gautam</td>
                            <td>gaurav@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                            <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                                </label>

                             </td>
                          </tr>
                          <tr>
                            <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                            <td>Vaidehi Ahlawat</td>
                            <td>vaidehi@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                            <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                            </label>

                             </td>
                          </tr>
                          <tr>
                            <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                            <td>Rajesh Vishwakarma</td>
                            <td>vrajesh@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                                 <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                                </label>

                             </td>
                          </tr>
                             <tr>
                                <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                            <td>Sunil Vishwakarma</td>
                            <td>vsunil@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                                 <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                                </label>

                             </td>
                          </tr>
                             <tr>
                                <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                            <td>Shuaib Saifi</td>
                            <td>shuaib@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                                <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                                </label>

                             </td>
                          </tr>
                        </tbody>
                    </table>
                     </div>
                        
                     </div>
                    </div>

                 <div id="documents"  class="tab-pane fade">
                    <div class="row">
                 
                                 <div class="col-md-8 ">   </div>
                 

                            <div class="col-md-4 active-user">
                        <div class="dropdown ">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Active Users
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="#" id="user">Active Users</a></li>
                              <li><a href="#">Inactive Users</a></li>
                              <li><a href="#">Unconfirmed Users</a></li>
                              <li><a href="#">Deleted Users</a></li>
                              <li><a href="#" id="activate_user">Activate Users</a></li>
                            </ul>
                          </div>

                              <div class="dropdown  ractive-user">
                             <div class="dropdown  organize-user ">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu " >
                             
                              <li><a href="#">Task</a></li>
                              <li><a href="#">Call</a></li>
                              <li><a href="#">Event</a></li>
                              <li><a href="#" id="">Text</a></li>
                            </ul>
                          </div>
                        </div>


                    

                                  <div class="dropdown  organize-user active-user">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu organize-user">
                              <li><a href="#">Deactivate</a></li>
                              <li><a href="#">Delete </a></li>
                              <li><a href="#">active</a></li>
                              <li><a href="#">Text</a></li>
                              <li><a href="#" id="">Unconfirmed</a></li>
                              <li><a href="#" id="">Print</a></li>
                              <li><a href="#" id=""> export to PDF</a></li>
                              <li><a href="#" id="">export to excel</a></li>
                            </ul>
                          </div>

                        </div>

                          </div>
                   
                     <div class="row">
                
                             
                                      <div class="col-md-12 " >
                         <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th><div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></th>
                            <th>FULL NAME</th>
                            <th>EMAIL ADDRESS</th>
                            <th>ROLE</th>
                            <th>PROFILE</th>
                            <th>USER STATUS</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                        <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div>    </td>
                            <td>Gaurav Vijay Gautam</td>
                            <td>gaurav@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                            <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                                </label>

                             </td>
                          </tr>
                          <tr>
                            <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                            <td>Vaidehi Ahlawat</td>
                            <td>vaidehi@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                            <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                            </label>

                             </td>
                          </tr>
                          <tr>
                            <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                            <td>Rajesh Vishwakarma</td>
                            <td>vrajesh@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                                 <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                                </label>

                             </td>
                          </tr>
                             <tr>
                                <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                            <td>Sunil Vishwakarma</td>
                            <td>vsunil@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                                 <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                                </label>

                             </td>
                          </tr>
                             <tr>
                                <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                            <td>Shuaib Saifi</td>
                            <td>shuaib@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                                <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                                </label>

                             </td>
                          </tr>
                        </tbody>
                    </table>
                     </div>
                        
                     </div>
                 </div>


                  <div id="group" class="tab-pane fade">
                                  <div class="row">

                                 <div class="col-md-8 ">   </div>
                 

                            <div class="col-md-4 active-user">
                        <div class="dropdown ">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Active Users
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="#" id="user">Active Users</a></li>
                              <li><a href="#">Inactive Users</a></li>
                              <li><a href="#">Unconfirmed Users</a></li>
                              <li><a href="#">Deleted Users</a></li>
                              <li><a href="#" id="activate_user">Activate Users</a></li>
                            </ul>
                          </div>

                              <div class="dropdown  ractive-user">
                             <div class="dropdown  organize-user ">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu " >
                             
                              <li><a href="#">Task</a></li>
                              <li><a href="#">Call</a></li>
                              <li><a href="#">Event</a></li>
                              <li><a href="#" id="">Text</a></li>
                            </ul>
                          </div>
                        </div>


                    

                                  <div class="dropdown  organize-user active-user">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu organize-user">
                              <li><a href="#">Deactivate</a></li>
                              <li><a href="#">Delete </a></li>
                              <li><a href="#">active</a></li>
                              <li><a href="#">Text</a></li>
                              <li><a href="#" id="">Unconfirmed</a></li>
                              <li><a href="#" id="">Print</a></li>
                              <li><a href="#" id=""> export to PDF</a></li>
                              <li><a href="#" id="">export to excel</a></li>
                            </ul>
                          </div>

                        </div>

                          </div>
                  
                     <div class="row">
                
                             
                                      <div class="col-md-12 " >
                         <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th><div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></th>
                            <th>FULL NAME</th>
                            <th>EMAIL ADDRESS</th>
                            <th>ROLE</th>
                            <th>PROFILE</th>
                            <th>USER STATUS</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                        <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div>    </td>
                            <td>Gaurav Vijay Gautam</td>
                            <td>gaurav@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                            <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                                </label>

                             </td>
                          </tr>
                          <tr>
                            <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                            <td>Vaidehi Ahlawat</td>
                            <td>vaidehi@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                            <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                            </label>

                             </td>
                          </tr>
                          <tr>
                            <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                            <td>Rajesh Vishwakarma</td>
                            <td>vrajesh@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                                 <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                                </label>

                             </td>
                          </tr>
                             <tr>
                                <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                            <td>Sunil Vishwakarma</td>
                            <td>vsunil@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                                 <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                                </label>

                             </td>
                          </tr>
                             <tr>
                                <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                            <td>Shuaib Saifi</td>
                            <td>shuaib@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                                <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                                </label>

                             </td>
                          </tr>
                        </tbody>
                    </table>
                     </div>
                        
                     </div>
                  </div>



                     <div class="row">
                
                             
                                      <div class="col-md-12 " id="activate" >
                         <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th><div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></th>
                            <th>FULL NAME</th>
                            <th>EMAIL ADDRESS</th>
                            <th>ROLE</th>
                            <th>PROFILE</th>
                            <th>USER STATUS</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                        <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div>    </td>
                            <td>Gaurav Vijay Gautam</td>
                            <td>gaurav@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                            <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                                </label>

                             </td>
                          </tr>
                          <tr>
                            <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                            <td>Vaidehi Ahlawat</td>
                            <td>vaidehi@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                            <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                            </label>

                             </td>
                          </tr>
                          <tr>
                            <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                            <td>Rajesh Vishwakarma</td>
                            <td>vrajesh@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                                 <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                                </label>

                             </td>
                          </tr>
                             <tr>
                                <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                            <td>Sunil Vishwakarma</td>
                            <td>vsunil@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                                 <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                                </label>

                             </td>
                          </tr>
                             <tr>
                                <td> <div class="form-group activate-checkbox">
                              <div class="checkbox active-checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                            </label></div>
                          </div></td>
                            <td>Shuaib Saifi</td>
                            <td>shuaib@ritvigroup.com</td>
                            <td>Text</td>
                            <td>Sub-leader</td>
                                <td> <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-input">
                                <span class="custom-control-indicator"></span>
                                </label>

                             </td>
                          </tr>
                        </tbody>
                    </table>
                     </div>
                        
                     </div>


                  </div>
                                <!--                 <div class="row mbm">
                                                    <div class="col-lg-12">
                                                        <div class="table-responsive">
                                                            <table id="table_id"
                                                                   class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                                <thead>
                                                                <tr>
                                                                    <th style="width: 3%; padding: 10px; background: #efefef"><input
                                                                            type="checkbox" class="checkall"/></th>
                                                                    <th>Pic</th>
                                                                    <th>Name</th>
                                                                    <th>Email</th>
                                                                    <th>Department</th>
                                                                    <th>Status</th>
                                                                    <th>Added On</th>
                                                                    <th>Action</th>

                                                                </tr>

                                                                <?php 
                                                                if(count($MyTeam->result) > 0) { ?>
                                                                <tbody>
                                                                <?php foreach($MyTeam->result AS $my_team) { ?>
                                                                    <?php
                                                                    $Status = ($my_team->user_profile_detail->profile->ProfileStatus == 1) ? 'Active' : 'Not Accepted';

                                                                    $UserProfileHrefLink = base_url().'profile/subprofile/'.$my_team->user_profile_detail->user_info->UserUniqueId.'/'.$my_team->user_profile_detail->profile->UserProfileId;

                                                                    if($my_team->user_profile_detail->profile->ProfilePhotoPath != '') {
                                                                        $profile_pic = ($my_team->user_profile_detail->profile->ProfilePhotoPath != '') ? $my_team->user_profile_detail->profile->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                                    } else {
                                                                        $profile_pic = ($my_team->user_profile_detail->user_info->ProfilePhotoPath != '') ? $my_team->user_profile_detail->user_info->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                                    }

                                                                    ?>
                                                                    <tr>
                                                                        <td><input type="checkbox"/></td>
                                                                        <td><img
                                                                    src="<?php echo $profile_pic; ?>"
                                                                    style="border: 1px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);width: 50px; height: 50px;"
                                                                    class="img-circle"/></td>
                                                                        <td><a href="<?php echo $UserProfileHrefLink; ?>" target="_blank"><?php echo $my_team->user_profile_detail->profile->FirstName.' '.$my_team->user_profile_detail->profile->LastName; ?></a></td>
                                                                        <td><?php echo $my_team->user_profile_detail->profile->Email; ?></td>
                                                                        <td><?php echo $my_team->user_profile_detail->profile->DepartmentName; ?></td>
                                                                        <td><?php echo $Status; ?></td>
                                                                        <td><?php echo $my_team->user_profile_detail->profile->AddedOn; ?></td>
                                                                        <td>
                                                                            <button type="button" class="btn btn-default btn-xs"><i
                                                                                    class="fa fa-edit"></i>&nbsp;
                                                                                Edit
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                                
                                                                </tbody>
                                                                <?php }  ?> 
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- stat timeline and feed  -->
                                <div class="top20">
                                    
                                    <div class="clearfix"> </div>
                                    <!-- End projects list -->
                                    
                                    <?php  require_once './include/footer.php';?>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php  require_once './include/scroll_top.php';?>

                </body>

                <?php  require_once './include/js.php';?>


                <div id="modal-stackable" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            
                        </div>
                    </div>
                </div>


                <script>
                    $(document).ready(function() {
                        // Flexible table

                        $('#table_id').DataTable();

                    });
                    function newTeam() {

                        $.post("<?php echo base_url(); ?>organize/newTeam", {'display': 'Y'},
                            function (data, status) {
                                if(data != '') {
                                    $('.modal-content').html(data);
                                } else {
                                    $('.modal-content').html(data);
                                }
                            });
                    }

                    function newFleet() {

                        $.post("<?php echo base_url(); ?>organize/newFleet", {'display': 'Y'},
                            function (data, status) {
                                if(data != '') {
                                    $('.modal-content').html(data);
                                } else {
                                    $('.modal-content').html(data);
                                }
                            });
                    }

                    function newDocument() {

                        $.post("<?php echo base_url(); ?>organize/newDocument", {'display': 'Y'},
                            function (data, status) {
                                if(data != '') {
                                    $('.modal-content').html(data);
                                } else {
                                    $('.modal-content').html(data);
                                }
                            });
                    }

                    function newGroup() {

                        $.post("<?php echo base_url(); ?>organize/newGroup", {'display': 'Y'},
                            function (data, status) {
                                if(data != '') {
                                    $('.modal-content').html(data);
                                } else {
                                    $('.modal-content').html(data);
                                }
                            });
                    }
                </script>

                <script>
                /* When the user clicks on the button, 
                toggle between hiding and showing the dropdown content */
                function myFunction() {
                    document.getElementById("myDropdown").classList.toggle("show");
                }

                // Close the dropdown if the user clicks outside of it
                window.onclick = function(e) {
                  if (!e.target.matches('.dropbtn')) {
                    var myDropdown = document.getElementById("myDropdown");
                      if (myDropdown.classList.contains('show')) {
                        myDropdown.classList.remove('show');
                      }
                  }
                }
                </script>

                <script>
            $(document).ready(function(){

                $("#activate_user").click(function(){
                    $("#activate").show();
                });
                $(".nav-tabs li a").click(function(){
                    $('#activate').css("display","none");
                });

                   $("#user").click(function(){
                    $("#user2").show();
                });

                       $(".nav-tabs li a").click(function(){
                    $('#user2').css("display","none");
                });

             

                  



            });
            </script>

                </body>
                </html>