<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="<?=base_url();?>leader/dashboard" style="color: white; font-size: 24px; text-align: center;margin-top: 7px;"> 
                Kaajneeti
            </a>
        </div>
        <!-- END LOGO -->
        <div class="library-menu"> <span class="one">-</span> <span class="two">-</span> <span class="three">-</span> </div>
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">

            <div class="col-sm-7">
                <div class="col-sm-6 search-box input-group">
                    <input id="search-projects" type="text" class="input-sm form-control" placeholder="Search">
                </div>
                
                <div class="col-sm-6 col-sm-offset-6">
                    <ul class="nav navbar-nav">
                        <li style=" margin-left: 11px; margin-top: 7px; ">
                            <button class="express-btn" type="button" data-toggle="modal" data-target="#express-popup" onClick="return openExpressPopup();"><i class="fa fa-bullhorn"></i></button>
                        </li>
                        <li>
                            <div class="feed-element"> <a href="<?=base_url();?>profile/subprofile"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg" style=" margin: 5px 20px 0; "> </a></div>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle count-info"> <img src="../assets/images/switch_icon.png"> <span class="badge badge-info"></span> </a>
                            <div class="dropdown-menu dropdown-messages menuBig">
                                
                                <div class="col-md-12 padding-20">
                                    <h3>Create</h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <a href="#">Customers</a>
                                            <a href="#">lorem</a>
                                            <a href="#">lorem</a>
                                            <a href="#">lorem</a>
                                            <a href="#">lorem</a>
                                            <a href="#">lorem</a>
                                            <a href="#">lorem</a>
                                        </div>
                                        <div class="col-sm-4">
                                            <a href="#">Suppliers</a>
                                            <a href="#">lorem</a>
                                            <a href="#">lorem</a>
                                            <a href="#">lorem</a>
                                            <a href="#">lorem</a>
                                            <a href="#">lorem</a>
                                            <a href="#">lorem</a>
                                        </div>
                                        <div class="col-sm-4">
                                            <a href="#">Employees</a>
                                            <a href="#">lorem</a>
                                            <a href="#">lorem</a>
                                            <a href="#">lorem</a>
                                            <a href="#">lorem</a>
                                            <a href="#">lorem</a>
                                            <a href="#">lorem</a>
                                        </div>
                                    </div>
                                </div>                       
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
            
            

            <ul class="nav navbar-nav pull-right">
                <li style="color: #fff; border-right:1px solid #fff; padding-right: 10px; float: left; padding-top: 10px;">Free Edition  <br><span style="color: skyblue; font-size: 12px;">Upgrade</span></li>
                

                <li class="dropdown user-notification">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle count-info"> <i class="fa fa-bell"></i> <span class="badge badge-primary"></span> </a>

                    <ul class="dropdown-menu dropdown-alerts menuBig">
                        <li><a href="<?=base_url();?>plan/plan"><i class="fa fa-pencil-square-o"></i>Plan</a></li>
                        <li class="divider"></li>
                        <li><a href="<?=base_url();?>organize/team"><i class="fa fa-users"></i>Team</a></li>
                        <li><a href="<?=base_url();?>organize/fleet"><i class="fa fa-car"></i>Fleet</a></li>
                        <li><a href="<?=base_url();?>organize/documents"><i class="fa fa-file-text"></i>Documents</a></li>
                        <li class="divider"></li>
                        <li><a href="<?=base_url();?>event/newevent"><i class="fa fa-calendar"></i>Event</a></li>
                        <li class="divider"></li>
                        <li><a href="<?=base_url();?>post/newpost"><i class="fa fa fa-envelope"></i>Post</a></li>
                        <li><a href="<?=base_url();?>poll/newpoll"><i class="fa fa-list-ul"</i></i>Poll</a></li>
                        <li><a href="<?=base_url();?>complaint/newcomplaint"><i class="fa fa-comment"></i>Complaint</a></li>
                        <li><a href="<?=base_url();?>information/newinformation"><i class="fa fa-info-circle"></i>Information</a></li>
                        <li class="divider"></li>
                        <li><a href="<?=base_url();?>suggestion/newsuggestion"><i class="fa fa-lightbulb-o"></i>Suggestion</a></li>
                        
                        <li class="last"></li>
                    </ul>
                </li>

                <li class="dropdown add">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle count-info"> <i class="fa fa-plus"></i> <span class="badge badge-info"></span> </a>
                    <div class="dropdown-menu dropdown-messages menuBig">
                        
                        <div class="col-md-12 padding-20">
                            <h3>Create</h3>
                            <div class="row">
                                <div class="col-sm-4">
                                    <a href="#">Customers</a>
                                    <a href="#">lorem</a>
                                    <a href="#">lorem</a>
                                    <a href="#">lorem</a>
                                    <a href="#">lorem</a>
                                    <a href="#">lorem</a>
                                    <a href="#">lorem</a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="#">Suppliers</a>
                                    <a href="#">lorem</a>
                                    <a href="#">lorem</a>
                                    <a href="#">lorem</a>
                                    <a href="#">lorem</a>
                                    <a href="#">lorem</a>
                                    <a href="#">lorem</a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="#">Employees</a>
                                    <a href="#">lorem</a>
                                    <a href="#">lorem</a>
                                    <a href="#">lorem</a>
                                    <a href="#">lorem</a>
                                    <a href="#">lorem</a>
                                    <a href="#">lorem</a>
                                </div>
                                
                            </div>
                        </div>                       
                    </div>

                </li>

                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle"> <i class="icon-calendar"></i></a>
                    <div class="dropdown-menu dropdown-messages menuBig">
                        
                        <div class="col-md-12">
                            
                            <div class="demo-container">
                                <div class="widgets-container">

                                    <!-- Full Calendar -->
                                    <div id="calendar" class="fc fc-ltr fc-unthemed">
                                        <div class="fc-toolbar">
                                            
                                            <div class="fc-center">
                                                <h2><?php echo date('F Y');?></h2></div>
                                            <div class="fc-clear"></div>
                                        </div>
                                        <div class="fc-view-container" style="">
                                            <div class="fc-view fc-month-view fc-basic-view" style="">
                                                <table>
                                                    <thead class="fc-head">
                                                        <tr>
                                                            <td class="fc-head-container fc-widget-header">
                                                                <div class="fc-row fc-widget-header">
                                                                    <table>
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="fc-day-header fc-widget-header fc-sun">Sun</th>
                                                                                <th class="fc-day-header fc-widget-header fc-mon">Mon</th>
                                                                                <th class="fc-day-header fc-widget-header fc-tue">Tue</th>
                                                                                <th class="fc-day-header fc-widget-header fc-wed">Wed</th>
                                                                                <th class="fc-day-header fc-widget-header fc-thu">Thu</th>
                                                                                <th class="fc-day-header fc-widget-header fc-fri">Fri</th>
                                                                                <th class="fc-day-header fc-widget-header fc-sat">Sat</th>
                                                                            </tr>
                                                                        </thead>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="fc-body">
                                                        <tr>
                                                            <td class="fc-widget-content">
                                                                <div class="fc-scroller fc-day-grid-container" style="overflow: hidden; height: 409px;">
                                                                    <div class="fc-day-grid fc-unselectable">
                                                                        <div class="fc-row fc-week fc-widget-content" style="height: 64px;">
                                                                            <div class="fc-bg">
                                                                                <table>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="fc-day fc-widget-content fc-sun fc-other-month fc-past" data-date="2018-04-29"></td>
                                                                                            <td class="fc-day fc-widget-content fc-mon fc-other-month fc-past" data-date="2018-04-30"></td>
                                                                                            <td class="fc-day fc-widget-content fc-tue fc-past" data-date="2018-05-01"></td>
                                                                                            <td class="fc-day fc-widget-content fc-wed fc-past" data-date="2018-05-02"></td>
                                                                                            <td class="fc-day fc-widget-content fc-thu fc-past" data-date="2018-05-03"></td>
                                                                                            <td class="fc-day fc-widget-content fc-fri fc-past" data-date="2018-05-04"></td>
                                                                                            <td class="fc-day fc-widget-content fc-sat fc-past" data-date="2018-05-05"></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="fc-content-skeleton">
                                                                                <table>
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <td class="fc-day-number fc-sun fc-other-month fc-past" data-date="2018-04-29">29</td>
                                                                                            <td class="fc-day-number fc-mon fc-other-month fc-past" data-date="2018-04-30">30</td>
                                                                                            <td class="fc-day-number fc-tue fc-past" data-date="2018-05-01">1</td>
                                                                                            <td class="fc-day-number fc-wed fc-past" data-date="2018-05-02">2</td>
                                                                                            <td class="fc-day-number fc-thu fc-past" data-date="2018-05-03">3</td>
                                                                                            <td class="fc-day-number fc-fri fc-past" data-date="2018-05-04">4</td>
                                                                                            <td class="fc-day-number fc-sat fc-past" data-date="2018-05-05">5</td>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td class="fc-event-container">
                                                                                                <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                                                                    <div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">All Day Event</span></div>
                                                                                                </a>
                                                                                            </td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div class="fc-row fc-week fc-widget-content" style="">
                                                                            <div class="fc-bg">
                                                                                <table>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="fc-day fc-widget-content fc-sun fc-past" data-date="2018-05-06"></td>
                                                                                            <td class="fc-day fc-widget-content fc-mon fc-past" data-date="2018-05-07"></td>
                                                                                            <td class="fc-day fc-widget-content fc-tue fc-past" data-date="2018-05-08"></td>
                                                                                            <td class="fc-day fc-widget-content fc-wed fc-past" data-date="2018-05-09"></td>
                                                                                            <td class="fc-day fc-widget-content fc-thu fc-past" data-date="2018-05-10"></td>
                                                                                            <td class="fc-day fc-widget-content fc-fri fc-today fc-state-highlight" data-date="2018-05-11"></td>
                                                                                            <td class="fc-day fc-widget-content fc-sat fc-future" data-date="2018-05-12"></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="fc-content-skeleton">
                                                                                <table>
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <td class="fc-day-number fc-sun fc-past" data-date="2018-05-06">6</td>
                                                                                            <td class="fc-day-number fc-mon fc-past" data-date="2018-05-07">7</td>
                                                                                            <td class="fc-day-number fc-tue fc-past" data-date="2018-05-08">8</td>
                                                                                            <td class="fc-day-number fc-wed fc-past" data-date="2018-05-09">9</td>
                                                                                            <td class="fc-day-number fc-thu fc-past" data-date="2018-05-10">10</td>
                                                                                            <td class="fc-day-number fc-fri fc-today fc-state-highlight" data-date="2018-05-11">11</td>
                                                                                            <td class="fc-day-number fc-sat fc-future" data-date="2018-05-12">12</td>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="fc-event-container" colspan="3">
                                                                                                <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                                                                    <div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Long Event</span></div>
                                                                                                </a>
                                                                                            </td>
                                                                                            <td rowspan="2"></td>
                                                                                            <td rowspan="2"></td>
                                                                                            <td class="fc-event-container">
                                                                                                <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                                                                    <div class="fc-content"><span class="fc-time">10:30a</span> <span class="fc-title">Meeting</span></div>
                                                                                                </a>
                                                                                            </td>
                                                                                            <td class="fc-event-container" rowspan="2">
                                                                                                <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                                                                    <div class="fc-content"><span class="fc-time">7p</span> <span class="fc-title">Birthday Party</span></div>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td class="fc-event-container">
                                                                                                <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                                                                    <div class="fc-content"><span class="fc-time">4p</span> <span class="fc-title">Repeating Event</span></div>
                                                                                                </a>
                                                                                            </td>
                                                                                            <td class="fc-event-container">
                                                                                                <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                                                                    <div class="fc-content"><span class="fc-time">12p</span> <span class="fc-title">Lunch</span></div>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div class="fc-row fc-week fc-widget-content" style="height: 64px;">
                                                                            <div class="fc-bg">
                                                                                <table>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="fc-day fc-widget-content fc-sun fc-future" data-date="2018-05-13"></td>
                                                                                            <td class="fc-day fc-widget-content fc-mon fc-future" data-date="2018-05-14"></td>
                                                                                            <td class="fc-day fc-widget-content fc-tue fc-future" data-date="2018-05-15"></td>
                                                                                            <td class="fc-day fc-widget-content fc-wed fc-future" data-date="2018-05-16"></td>
                                                                                            <td class="fc-day fc-widget-content fc-thu fc-future" data-date="2018-05-17"></td>
                                                                                            <td class="fc-day fc-widget-content fc-fri fc-future" data-date="2018-05-18"></td>
                                                                                            <td class="fc-day fc-widget-content fc-sat fc-future" data-date="2018-05-19"></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="fc-content-skeleton">
                                                                                <table>
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <td class="fc-day-number fc-sun fc-future" data-date="2018-05-13">13</td>
                                                                                            <td class="fc-day-number fc-mon fc-future" data-date="2018-05-14">14</td>
                                                                                            <td class="fc-day-number fc-tue fc-future" data-date="2018-05-15">15</td>
                                                                                            <td class="fc-day-number fc-wed fc-future" data-date="2018-05-16">16</td>
                                                                                            <td class="fc-day-number fc-thu fc-future" data-date="2018-05-17">17</td>
                                                                                            <td class="fc-day-number fc-fri fc-future" data-date="2018-05-18">18</td>
                                                                                            <td class="fc-day-number fc-sat fc-future" data-date="2018-05-19">19</td>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td class="fc-event-container">
                                                                                                <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                                                                    <div class="fc-content"><span class="fc-time">4p</span> <span class="fc-title">Repeating Event</span></div>
                                                                                                </a>
                                                                                            </td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div class="fc-row fc-week fc-widget-content" style="height: 64px;">
                                                                            <div class="fc-bg">
                                                                                <table>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="fc-day fc-widget-content fc-sun fc-future" data-date="2018-05-20"></td>
                                                                                            <td class="fc-day fc-widget-content fc-mon fc-future" data-date="2018-05-21"></td>
                                                                                            <td class="fc-day fc-widget-content fc-tue fc-future" data-date="2018-05-22"></td>
                                                                                            <td class="fc-day fc-widget-content fc-wed fc-future" data-date="2018-05-23"></td>
                                                                                            <td class="fc-day fc-widget-content fc-thu fc-future" data-date="2018-05-24"></td>
                                                                                            <td class="fc-day fc-widget-content fc-fri fc-future" data-date="2018-05-25"></td>
                                                                                            <td class="fc-day fc-widget-content fc-sat fc-future" data-date="2018-05-26"></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="fc-content-skeleton">
                                                                                <table>
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <td class="fc-day-number fc-sun fc-future" data-date="2018-05-20">20</td>
                                                                                            <td class="fc-day-number fc-mon fc-future" data-date="2018-05-21">21</td>
                                                                                            <td class="fc-day-number fc-tue fc-future" data-date="2018-05-22">22</td>
                                                                                            <td class="fc-day-number fc-wed fc-future" data-date="2018-05-23">23</td>
                                                                                            <td class="fc-day-number fc-thu fc-future" data-date="2018-05-24">24</td>
                                                                                            <td class="fc-day-number fc-fri fc-future" data-date="2018-05-25">25</td>
                                                                                            <td class="fc-day-number fc-sat fc-future" data-date="2018-05-26">26</td>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div class="fc-row fc-week fc-widget-content" style="height: 64px;">
                                                                            <div class="fc-bg">
                                                                                <table>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="fc-day fc-widget-content fc-sun fc-future" data-date="2018-05-27"></td>
                                                                                            <td class="fc-day fc-widget-content fc-mon fc-future" data-date="2018-05-28"></td>
                                                                                            <td class="fc-day fc-widget-content fc-tue fc-future" data-date="2018-05-29"></td>
                                                                                            <td class="fc-day fc-widget-content fc-wed fc-future" data-date="2018-05-30"></td>
                                                                                            <td class="fc-day fc-widget-content fc-thu fc-future" data-date="2018-05-31"></td>
                                                                                            <td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2018-06-01"></td>
                                                                                            <td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2018-06-02"></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="fc-content-skeleton">
                                                                                <table>
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <td class="fc-day-number fc-sun fc-future" data-date="2018-05-27">27</td>
                                                                                            <td class="fc-day-number fc-mon fc-future" data-date="2018-05-28">28</td>
                                                                                            <td class="fc-day-number fc-tue fc-future" data-date="2018-05-29">29</td>
                                                                                            <td class="fc-day-number fc-wed fc-future" data-date="2018-05-30">30</td>
                                                                                            <td class="fc-day-number fc-thu fc-future" data-date="2018-05-31">31</td>
                                                                                            <td class="fc-day-number fc-fri fc-other-month fc-future" data-date="2018-06-01">1</td>
                                                                                            <td class="fc-day-number fc-sat fc-other-month fc-future" data-date="2018-06-02">2</td>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td></td>
                                                                                            <td class="fc-event-container">
                                                                                                <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" href="http://google.com/">
                                                                                                    <div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Click for Google</span></div>
                                                                                                </a>
                                                                                            </td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div class="fc-row fc-week fc-widget-content" style="height: 68px;">
                                                                            <div class="fc-bg">
                                                                                <table>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="fc-day fc-widget-content fc-sun fc-other-month fc-future" data-date="2018-06-03"></td>
                                                                                            <td class="fc-day fc-widget-content fc-mon fc-other-month fc-future" data-date="2018-06-04"></td>
                                                                                            <td class="fc-day fc-widget-content fc-tue fc-other-month fc-future" data-date="2018-06-05"></td>
                                                                                            <td class="fc-day fc-widget-content fc-wed fc-other-month fc-future" data-date="2018-06-06"></td>
                                                                                            <td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2018-06-07"></td>
                                                                                            <td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2018-06-08"></td>
                                                                                            <td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2018-06-09"></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="fc-content-skeleton">
                                                                                <table>
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <td class="fc-day-number fc-sun fc-other-month fc-future" data-date="2018-06-03">3</td>
                                                                                            <td class="fc-day-number fc-mon fc-other-month fc-future" data-date="2018-06-04">4</td>
                                                                                            <td class="fc-day-number fc-tue fc-other-month fc-future" data-date="2018-06-05">5</td>
                                                                                            <td class="fc-day-number fc-wed fc-other-month fc-future" data-date="2018-06-06">6</td>
                                                                                            <td class="fc-day-number fc-thu fc-other-month fc-future" data-date="2018-06-07">7</td>
                                                                                            <td class="fc-day-number fc-fri fc-other-month fc-future" data-date="2018-06-08">8</td>
                                                                                            <td class="fc-day-number fc-sat fc-other-month fc-future" data-date="2018-06-09">9</td>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="clear:both"></div>
                                </div>
                            </div>

                        </div>                       
                    </div>

                </li>
                
                <!-- START USER LOGIN DROPDOWN -->
                <li class="dropdown dropdown-user">
                    <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="javascript:;"><i class="fa fa-ellipsis-v"></i> <!-- <img src="<-?php echo $this->session->userdata('UserProfilePic'); ?>" class="img-circle" alt=""> --> <span class="username username-hide-on-mobile"> <!-- <-?php  $this->session->userdata('UserName'); ?> --> </span>
                     </a><!-- <i class="fa fa-angle-down"></i> -->
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li><h3 class="text-uppercase">Rajesh Vishwakarma<?php  $this->session->userdata('UserName'); ?></h3></li>
                        <li><h6><strong class="text-capitalize">User id:</strong> 667389007</h6></li>
                        <li><a href="#" class="text-capitalize">My Account </a></li>
                        <li class="divider"> </li>

                        <li><h6><strong class="text-uppercase">Subscription</strong></h6></li>
                        <li><h6><strong>Enterprise trial</strong> expires in 15 day(s)</h6></li>
                        <li><a href="">Try Other Editions </a></li>
                        <li class="divider"> </li>

                        <li><a href="<?=base_url();?>profile/setting"><strong class="text-uppercase">Setting</strong></a></li>
                        <!-- <li><a href="#" target="_blank">New Feature</a></li> -->
                        <li class="divider"> </li>

                        <li><h6><strong class="text-uppercase">news room</strong></h6></li>
                        <li><a href="#">New Feature</a></li>
                        <li class="divider"> </li>

                        <li><a href="<?=base_url();?>leader/logout"> <i class="icon-key"></i> Log Out </a></li>
                        <li><h6 style=" background-color: #f2f2f3; "><span class="col-sm-5" style=" margin-top: 13px; ">Available on</span> <a href="#" class="text-uppercase"><img src="#"></a><a href="#" class="text-uppercase"><img src="#"></h6></a></li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>




<?php // Express Start ?>
<div id="express-popup" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content modal-content-express">
            
        </div>
    </div>
</div>
<?php // Express End ?>


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