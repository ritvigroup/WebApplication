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
                                            <button onclick="myFunction()" class="dropbtn organize-button"><!-- <i class="fa fa-plus-circle"></i> -->&nbsp;Manage <span class="caret"></span>   </button>&nbsp;
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
                        <li><a data-toggle="tab" href="#event">Event</a></li>
                        <li><a data-toggle="tab" href="#poll">Poll</a></li>
                        
                      </ul>

                      <div class="tab-content">
                        <div id="team" class="tab-pane fade in active">

                          <div class="row">
                                     <div class="col-md-8 ">
                         </div>

                                <div class="col-md-4 active-user">

                        <div class="dropdown  ractive-user">
                             <div class="dropdown  organize-user ">
                                <button class="btn btn-primary" type="button"  data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newTeam();"><i class="fa fa-plus" aria-hidden="true"></i>  New User
                                 </button>
                          
                              </div>
                            </div>


               

                            <div class="dropdown" id="organize-active">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="active-id">Active Users
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <li><a href="#" id="activate_user_div">Active</a></li>
                                  <li><a href="#" id="inactivate_user_div">Inactive Users</a></li>
                                  <li><a href="#">Unconfirmed Users</a></li>
                                  <li><a href="#">Deleted Users</a></li>
                                  <li><a href="#">Activate Users</a></li>
                                </ul>
                              </div>

                                  <div class="dropdown  ractive-user">
                                 <div class="dropdown  organize-user ">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu organize-user2 " >
                                 
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
                         
                                  <li><a href="#">Text</a></li>
                             
                                  <li><a href="#" id="">Print</a></li>
                                  <li><a href="#" id=""> export to PDF</a></li>
                                  <li><a href="#" id="">export to excel</a></li>
                                </ul>
                              </div>

                            </div>


                     
                  




                          <div class="row">
                    
                                 
                                          <div class="col-md-12  activate_user_div" id="team-table" >
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
                                    <input type="checkbox" class="custom-control-input checkbox-input" checked="checked">
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
                                    <input type="checkbox" class="custom-control-input checkbox-input" checked="checked">
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
                                    <input type="checkbox" class="custom-control-input checkbox-input" checked="checked">
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
                                    <input type="checkbox" class="custom-control-input checkbox-input" checked="checked">
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
                                    <input type="checkbox" class="custom-control-input checkbox-input" checked="checked">
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
               
                    </div>


                        <div id="fleet" class="tab-pane fade">

          
                       
                                     <div class="col-md-8 ">   </div>
                     

                         <div class="col-md-4 active-user">

                             <div class="dropdown  ractive-user">
                               <div class="dropdown  organize-user ">
                                <button class="btn btn-primary" type="button"  data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newFleet();">  New Fleet
                                 </button>
                          
                              </div>
                         </div>


                            <div class="dropdown " id="organize-active2">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="active-id2">Active Fleet
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <li><a href="#" id="user">Active Fleet</a></li>
                                  <li><a href="#">Inactive Fleet</a></li>
                                  <li><a href="#">Unconfirmed Fleet</a></li>
                                  <li><a href="#">Deleted Fleet</a></li>
                                  <li><a href="#" id="activate_user">Activate Fleet</a></li>
                                </ul>
                              </div>

                                  <div class="dropdown  ractive-user">
                                 <div class="dropdown  organize-user ">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu organize-user2" >
                                 
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
                            
                                  <li><a href="#">Text</a></li>
                               
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
                               <th>VEHICLE NAME</th>
                                <th>REGISTRATION NUMBER</th>
                                <th>DRIVER NAME</th>
                                <th>VEHICLE TYPE</th>
                                <th>VEHICLE STATUS</th>
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

                                         <div class="dropdown  ractive-user">
                             <div class="dropdown  organize-user ">
                                <button class="btn btn-primary" type="button" data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newDocument();">  Upload
                                 </button>
                          
                              </div>
                            </div>

                            <div class="dropdown " id="organize-active3">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="active-id3">Active Users
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <li><a href="#" id="user">Active</a></li>
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
                                <ul class="dropdown-menu organize-user2" >
                                 
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
                         
                                  <li><a href="#">Text</a></li>
                              
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

                                     <div class="col-md-8 "> </div>


                     

                                <div class="col-md-4 active-user">

                       <div class="dropdown  ractive-user">
                               <div class="dropdown  organize-user ">
                                <button class="btn btn-primary" type="button" data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newGroup();">  Create Group
                                 </button>
                          
                              </div>
                         </div>

                            <div class="dropdown " id="organize-active4">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="active-id4">Active Users
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <li><a href="#" id="user">Active</a></li>
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
                                <ul class="dropdown-menu organize-user2" >
                                 
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
                   
                                  <li><a href="#">Text</a></li>
                                
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

                      <!--event start-->

                      <div id="event" class="tab-pane fade">
                                        <div class="row">

                                     <div class="col-md-8 "> </div>
                     

                                <div class="col-md-4 active-user">

                        <div class="dropdown  ractive-user">
                               <div class="dropdown  organize-user ">
                                <button class="btn btn-primary" type="button"  data-toggle="modal" data-target="#create-event">  Create Event
                                 </button>
                          
                              </div>
                         </div>

                            <div class="dropdown " id="organize-active5">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="active-id5">Active Users
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <li><a href="#" id="user">Active</a></li>
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
                                <ul class="dropdown-menu organize-user2" >
                                 
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
                   
                                  <li><a href="#">Text</a></li>
                                
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
                                <th>EVENT NAME</th>
                                <th> LOCATION</th>
                                <th>FREQUENCY</th>
                                <th>START DATE</th>
                                <th>END DATE</th>
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
                                <td>NOIDA</td>
                                <td>DAILY</td>
                                <td>9TH MAY 2018</td>
                                <td>10TH MAY 2018</td>
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
                      <!--event end-->


                        <!-- start poll-->
                     <div id="poll" class="tab-pane fade">
                                        <div class="row">

                                     <div class="col-md-8 "> </div>
                     

                                <div class="col-md-4 active-user">

                         <div class="dropdown  ractive-user">
                               <div class="dropdown  organize-user ">
                                <button class="btn btn-primary" type="button"  data-toggle="modal" data-target="#create-poll">  Create Poll
                                 </button>
                          
                              </div>
                         </div>

                            <div class="dropdown " id="organize-active6">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="active-id6">Active Users
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <li><a href="#" id="user">Active</a></li>
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
                                <ul class="dropdown-menu organize-user2" >
                                 
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
                   
                                  <li><a href="#">Text</a></li>
                                
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
                      <!--start-->




                         <div class="row inactivate_user_div" style="display: none;">
                    
                                 
                                          <div class="col-md-12 " >
                             <table class="table table-bordered">
                            <thead>
                              <tr>
                      
                                <th>FULL NAME</th>
                                <th>EMAIL ADDRESS</th>
                                <th>ROLE</th>
                                <th>PROFILE</th>
                                <th>USER STATUS</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                   
                                <td>Gaurav Vijay Gautam</td>
                                <td>gaurav@ritvigroup.com</td>
                                <td>Text</td>
                                <td>Sub-leader</td>
                                <td>Inactivate User</td>
     
                              </tr>
                              <tr>
               
                                <td>Vaidehi Ahlawat</td>
                                <td>vaidehi@ritvigroup.com</td>
                                <td>Text</td>
                                <td>Sub-leader</td>
                                <td>Inactivate User</td>
             
                              </tr>
                              <tr>
               
                                <td>Rajesh Vishwakarma</td>
                                <td>vrajesh@ritvigroup.com</td>
                                <td>Text</td>
                                <td>Sub-leader</td>
                                <td>Inactivate User</td>
       
                              </tr>
                                 <tr>
                
                                <td>Sunil Vishwakarma</td>
                                <td>vsunil@ritvigroup.com</td>
                                <td>Text</td>
                                <td>Sub-leader</td>
                                <td>Inactivate User</td>
         
                              </tr>
                                 <tr>
                
                                <td>Shuaib Saifi</td>
                                <td>shuaib@ritvigroup.com</td>
                                <td>Text</td>
                                <td>Sub-leader</td>
                                <td>Inactivate User</td>
                              
                              </tr>
                            </tbody>
                        </table>
                         </div>
                            
                         </div>


                      </div>
                                  
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
                            <div class="modal-content modal-content-ajax">
                                
                            </div>
                        </div>
                    </div>

                    <div id="modal-stackable-role" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content modal-content-ajax-role">
                                
                            </div>
                        </div>
                    </div>


<!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                ...
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>

                           <!-- Modal -->
                        <div class="modal fade" id="new-fleet" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                ...
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>

                                      <!-- Modal -->
                        <div class="modal fade" id="upload-documents" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                ...
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>

                                                      <!-- Modal -->
                        <div class="modal fade" id="create-group" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                ...
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>

                                                           <!-- Modal -->
                        <div class="modal fade" id="create-event" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header"> 
                                <h5 class="modal-title" id="exampleModalLongTitle">Create Event</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                     <div class="row">
                                    
                                            <div class="col-md-12">
                               
                                                  <form action="#" class="form-horizontal">
                                                
                                                        <div class="form-body pal">
                                                            <div class="form-group"><label for="inputUsername"
                                                                                           class="col-md-3 control-label">Event Photo or Video
                                                                <span class='require'>*</span></label>

                                                                <div class="col-md-9">
                                                                    <div class="input-icon"><input
                                                                            id="inputUsername" type="text"
                                                                            placeholder="Upload Photo or Video" class="form-control event-photoupload"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                       <div class="form-group"><label for="inputUsername"
                                                                                           class="col-md-3 control-label">Event Name
                                                                <span class='require'>*</span></label>

                                                                <div class="col-md-9">
                                                                    <div class="input-icon"><input
                                                                            id="inputUsername" type="text"
                                                                            placeholder="Add a short, clear name" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                 <div class="form-group"><label for="inputUsername"
                                                                                           class="col-md-3 control-label">Location
                                                                <span class='require'>*</span></label>

                                                         <div class="col-md-9">
                                                                       <div class="input-icon"><input
                                                                            id="inputUsername" type="text"
                                                                            placeholder="Include a place or address" class="form-control"/>
                                                                        </div>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Start Date</label>
                                                                   <div class="input-group date form_datetime col-md-9 start-date" data-date-format="dd MM yyyy HH:ii p" data-link-field="dtp_input1">
                                                                    <input class="form-control datepicker" size="25" id="start_date" name="start_date" type="text" value="" readonly>
                                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                                                  </div>
                                                                <input type="hidden" id="dtp_input1" value="" />
                                                                <br/>
                                                            </div>

                                                 <div class="form-group">
                                                            <label class="col-md-3 control-label">End Date</label>
                                                               <div class="input-group date form_datetime col-md-9 end-date" data-date-format="dd MM yyyy HH:ii p"      data-link-field="dtp_input1">
                                                                <input class="form-control datepicker" size="25" id="end_date" name="end_date" type="text" value="" readonly>
                                                               <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                                            </div>
                                                        </div>




                                                            <div class="form-group mbn"><label for="inputContent"
                                                                                               class="col-md-3 control-label">Description</label>

                                                                <div class="col-md-9">

                                                                   <textarea id="inputContent"  placeholder="tell people more about"  rows="2"
                                                                                                class="form-control event-textarea"></textarea>
                                                                </div>
                                                            </div>
                                                       </div>
                                                  </form>

                                            </div>
                                    </div> 
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>


                                                                     <!-- Modal -->
                        <div class="modal fade" id="create-poll" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"> Create Poll</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  <div class="row">
        <div class="col-md-12">

            <ul class="nav navbar-nav">
                <li><a href="javascript:void(0);"> <i class="fa fa-pencil" aria-hidden="true"></i> Compose Post</a></li>
                <li><a href="javascript:void(0);"> <i class="fa fa-picture-o" aria-hidden="true"></i> Photo/Video Album</a></li>
                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fa fa-video-camera" aria-hidden="true"></i> Live Video</a></li>
            </ul>


        </div>
    </div>


    

    <div class="row">
        <div class="col-xs-12">
            <div class="textarea-img">
                <img src="https://www.toptene.com/wp-content/uploads/2017/10/top-10-most-handsome-men-in-the-world.jpg"  width="50"  height="50" class="img-circle">
            </div>
            <div class="form-group">
                <textarea class="form-control placeholder"  placeholder="Ask Somthing  ......" rows="8"></textarea>
            </div>

        
                
                 <div class="form-group">
                   
                    <div class="col-md-12">
                      <div class="input-icon"><i class="fa fa-user"></i><input id="inputUsername" type="text"  placeholder="option1" class="form-control"/><br>
                                      
                                                                    
                     </div>
                    </div>
               </div>   

                    <div class="form-group">
                   
                    <div class="col-md-12">
                      <div class="input-icon"><i class="fa fa-user"></i><input id="inputUsername" type="text"  placeholder="option2" class="form-control"/>
                                      
                                                                    
                     </div>
                    </div>
               </div>  


    <div class="col-md-6 poll-dropdown"><div class="dropup ">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="my-id2" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-clock-o" aria-hidden="true"></i>  1 Week
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu2">
                                    <li><a href="#">Public</a></li>
                                    <li><a href="#">My followers</a></li>
                                    <li><a href="#">My Connect</a></li>
                                    <li><a href="#">Only Me</a></li>
                                    <li><a href="#">Specific form</a></li>
                                </ul>
                            </div></div>
    <div class="col-md-6 poll-remove"><h4 class="text-right"><a href="#">Remove Poll</a></h4></div>        
        </div>
    </div>




      </div>
                            <div class="modal-footer">
    <div class="col-md-2">
        <div class="dropup express-dropdown pull-right" id="my-id">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
    </div>
    <div class="col-md-4 pull-right" >
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

             <button type="button" class="btn btn-success">Post</button>

        </div>

       
    </div>
</div>
                            </div>
                          </div>
                        </div>




                    <script>
                        $(document).ready(function() {
                            // Flexible table

                            $('#table_id').DataTable();

                        });

                        $('.form_datetime').datetimepicker({

                        });

                        function newTeam() {

                            $.post("<?php echo base_url(); ?>organize/newTeam", {'display': 'Y'},
                                function (data, status) {
                                    if(data != '') {
                                        $('.modal-content-ajax').html(data);
                                    } else {
                                        $('.modal-content-ajax').html(data);
                                    }
                                });
                        }


                        function addNewUserRole() {
                          $.post("<?php echo base_url(); ?>organize/newRole", {'display': 'Y'},
                                function (data, status) {
                                    if(data != '') {
                                        $('.modal-content-ajax-role').html(data);
                                    } else {
                                        $('.modal-content-ajax-role').html(data);
                                    }
                                });
                        }

                        function newFleet() {

                            $.post("<?php echo base_url(); ?>organize/newFleet", {'display': 'Y'},
                                function (data, status) {
                                    if(data != '') {
                                        $('.modal-content-ajax').html(data);
                                    } else {
                                        $('.modal-content-ajax').html(data);
                                    }
                                });
                        }

                        function newDocument() {

                            $.post("<?php echo base_url(); ?>organize/newDocument", {'display': 'Y'},
                                function (data, status) {
                                    if(data != '') {
                                        $('.modal-content-ajax').html(data);
                                    } else {
                                        $('.modal-content-ajax').html(data);
                                    }
                                });
                        }

                        function newGroup() {

                            $.post("<?php echo base_url(); ?>organize/newGroup", {'display': 'Y'},
                                function (data, status) {
                                    if(data != '') {
                                        $('.modal-content-ajax').html(data);
                                    } else {
                                        $('.modal-content-ajax').html(data);
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

                    $("#activate_user_div").click(function(){
                        $(".activate_user_div").show();
                        $(".inactivate_user_div").hide();
                    });
                    $("#inactivate_user_div").click(function(){
                        $(".activate_user_div").hide();
                        $(".inactivate_user_div").show();
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

                <script>
            
</script>

<script type="text/javascript">
    
    $(document).ready(function(){

        $('#organize-active ul li').click(function(){

            var innerVAL =$(this).text();

            $('#active-id').text(innerVAL)
        })


        $('#organize-active2 ul li').click(function(){

         var innerVAL =$(this).text();

         $('#active-id2').text(innerVAL)
        })



           $('#organize-active3 ul li').click(function(){

            var innerVAL =$(this).text();

            $('#active-id3').text(innerVAL)
        })



           $('#organize-active4 ul li').click(function(){

            var innerVAL =$(this).text();

            $('#active-id4').text(innerVAL)
        })


           $('#organize-active5 ul li').click(function(){

            var innerVAL =$(this).text();

            $('#active-id5').text(innerVAL)
        })


       $('#organize-active6 ul li').click(function(){

            var innerVAL =$(this).text();

            $('#active-id6').text(innerVAL)
        })

    });
</script>

                         
</body>
</html>