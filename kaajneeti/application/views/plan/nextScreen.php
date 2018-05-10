<?php
 $prev_screen =  ((int) $next_screen - 1);
    $next_screen_next =  ((int) $next_screen + 1);    //echo $next_screen;

$back_link = '<i class="fa fa-arrow-left" aria-hidden="true" onClick="return prevScreen('.$prev_screen.');" style="padding: 3px 5px; cursor: pointer;" title="Back &laquo;"></i> &nbsp;&nbsp;';
?>

<form name="create_plan_form" id="create_plan_form" method="post" action="" onSubmit="return false;">
<?php if($next_screen == "" || $next_screen == 0) { ?>

<div class="modal-header" style="background: #49b6d6; color:#fff;">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title">What's your plan name</h4>
</div>
<div class="modal-body">
    <div class="panel panel-white">
        <div class="panel-heading " style="border-bottom:0px solid #a0a0a2 !important;">What do you want to call it?</div>
        <div class="panel-body">
            <input type="text" data-tabindex="1" class="form-control mbm" id="plan_title" name="plan_title" placeholder="Enter description">
        </div>
    </div>
</div>

<?php } else if($next_screen == 1) { ?>

<div class="modal-header" style="background: #49b6d6; color:#fff;">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title"><?php echo $back_link; ?>Tell us about your GOAL</h4>
</div>
<div class="modal-body">
    <div class="panel panel-white">
        <div class="panel-heading"><i class="fa fa-bullseye fa-2x" aria-hidden="true" style="color:#6b736c; margin-top: -5px; float: left;"></i> &nbsp; &nbsp;<span>Goal</span></div>
        <div class="panel-body">
            <h4 style="color:#000; font-weight: 550; margin-left: 10px; margin-top: 15px;">What do you want to be?</h4>
            
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" data-tabindex="1" class="form-control mbm" id="plan_title" name="plan_title" placeholder="Enter Description" style="margin-top: 10px;">
                </div>
            </div>
            <div class="col-md-6" style="margin-top: 15px;">
                <div class="form-group">
                    <label class="col-md-4 control-label">Start Date</label>
                    <div class="input-group date form_datetime col-md-8" data-date-format="dd MM yyyy HH:ii p" data-link-field="dtp_input1">
                        <input class="form-control" size="25" id="start_date" name="start_date" type="text" value="" readonly>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input1" value="" />
                    <br/>
                </div>


            </div>

            <div class="col-md-6" style="margin-top: 15px;">
                <div class="form-group">
                    <label class="col-md-4 control-label">End Date</label>
                    <div class="input-group date form_datetime col-md-8" data-date-format="dd MM yyyy HH:ii p" data-link-field="dtp_input1">
                        <input class="form-control" size="25" id="end_date" name="end_date" type="text" value="" readonly>
                       <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                </div>
            </div>     

        </div>
    </div>
</div>
<?php } else if($next_screen == 2) { ?>
<div class="modal-header" style="background: #49b6d6; color:#fff;">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title"><?php echo $back_link; ?>Let's define your Geography</h4>
</div>
<div class="modal-body">
    <div class="panel panel-white" style="border-color: transparent;">
        <div class="panel-heading" style="color:#000; font-weight: 550;"> <i class="fa fa-map-marker fa-2x" style="color:#6b736c;"></i>  Geography?</div>
        <div class="panel-body">
            <div class="col-md-6">
                <label for="inputUsername" class="control-label target-area" style="margin-top: 15px;">Target Area
                    <span class="require">*</span>
                </label>
                <div class="input-icon right">
                    <i class="fa fa-location-arrow"></i>
                    <input type="text" placeholder="Please enter your area" class="form-control" style="margin-top: 6px;">
                </div>
            </div>
            <!--<div class="col-md-6">
                    <label for="inputUsername" class="control-label target-area" >Specific Area<span class="require">*</span></label>
                    <div class="input-icon right"><i class="fa fa-location-arrow"></i><input type="text" placeholder="Please enter your area" class="form-control" style="margin-top: 10px;"></div>
            </div>-->
        </div>
    </div>
</div>
<?php } else if($next_screen == 3) { ?>
<div class="modal-header" style="background: #49b6d6; color:#fff;">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title"><?php echo $back_link; ?>Let's begin with your goal 3</h4>
</div>
<div class="modal-body">
    <div class="panel panel-white">
             <div class="panel-body">
            <div style="width: 100%"><iframe width="100%" height="200" src="https://maps.google.com/maps?width=100%&height=600&hl=en&q=noida+(Ritvi%20group)&ie=UTF8&t=&z=14&iwloc=B&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.mapsdirections.info/en/custom-google-maps/">Create a custom Google Map</a> by <a href="https://www.mapsdirections.info/en/">Measure area on map</a></iframe></div><br />
        </div>
    </div>
</div>
<?php } else if($next_screen == 4) { ?>
<div class="modal-header" style="background: #49b6d6; color:#fff;">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title"><?php echo $back_link; ?>Let's define your Audience</h4>
</div>
<div class="modal-body">
    <div class="panel panel-white" style="border-color: transparent;">
         <div class="panel-heading" style="color:#000; font-weight: 550;"><i class="fa fa-user fa-2x" aria-hidden="true" style="color:#6b736c;"></i> Who will your preferred Audience?
         </div>

        <div class="panel-body">


                        <form action="#" class="form-horizontal">
                                    <div class="form-body pal">

                                        <div class="form-group"><label for="inputPassword"
                                                                       class="col-md-3 control-label target-area" style="margin-top: 20px;">Age</label>

                                     <div class="row">
                                            <div class="col-md-4" style="margin-top: 20px; width: 16%;">
                                                <div class="form-group"><select class="form-control">
                                                    <?php
                                                    for($i = 18; $i < 80; $i++) {
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                    ?>
                                                </select></div>
                                            </div>
                                           <div class="col-md-4"  style="margin-top: 20px; width: 16%;">
                                                <div class="form-group"><select class="form-control">
                                                    <?php
                                                    for($i = 80; $i > 18; $i--) {
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                    ?>
                                                </select></div>
                                            </div>
                                   
                                        </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputPassword" class="col-md-3 control-label target-area">Gender</label>

                                         <div class="row">
                                                <div class="col-md-2">
                                                    <input type="radio" name="gender" value="male">All<br>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="radio" name="gender" value="male"> Male<br>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="radio" name="gender" value="female"> Female<br>
                                                </div>

                                                <div class="col-md-2">
                                                    <span><input type="radio" name="gender" value="other"><span class="Transgender">Transgender</span></span>
                                                </div>
                                       
                                            </div>
                                        </div>

                                     


                                

                                         <div><label for="inputName" class="col-md-3 control-label target-area">Religion</label>

                                            <div class="col-md-9">
                                                <div class="input-icon"><input
                                                        id="inputName" type="text" placeholder="Description" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 read-more">
                                            
                                            <a href="#" id="read-click"> Read More »</a>
                                        </div>
                                        <div class="row">
 
                                    <div class="col-md-3 read-more religion-input" style="display: none;">
                                       
                                         <label for="inputName" class="col-md-3 control-label target-area">Religion</label>
                                    </div>
                                               
                                
                                        <div class="col-md-9 religion-input">
                                         <div class="input-icon">

                                             <input id="inputName" type="text" placeholder="Description" class="form-control"/> <br>  </div>
                                             
                                           </div>

                                    <div class="col-md-3 read-more religion-input">
                                       
                                         <label for="inputName" class="col-md-3 control-label target-area">Religion</label>
                                    </div>
                                               
                                
                                        <div class="col-md-9 religion-input">
                                         <div class="input-icon">

                                             <input id="inputName" type="text" placeholder="Description" class="form-control"/><br>   </div>
                                             
                                           </div>


                                    <div class="col-md-3 read-more religion-input">
                                       
                                         <label for="inputName" class="col-md-3 control-label target-area">Religion</label>
                                    </div>
                                               
                                
                                        <div class="col-md-9 religion-input">
                                         <div class="input-icon">

                                             <input id="inputName" type="text" placeholder="Description" class="form-control"/><br>   </div>
                                             
                                           </div>

                                    <div class="col-md-3 read-more religion-input">
                                       
                                         <label for="inputName" class="col-md-3 control-label target-area">Religion</label>
                                    </div>
                                               
                                
                                        <div class="col-md-9 religion-input">
                                         <div class="input-icon">

                                             <input id="inputName" type="text" placeholder="Description" class="form-control"/>   </div>
                                             
                                           </div>
                                           </div>


                                              <!--  <div><label for="inputName" class="col-md-3 control-label target-area" style="margin-top: 20px;">Caste</label>

                                            <div class="col-md-9">
                                                <div class="input-icon" style="margin-top:20px;"><input
                                                        id="inputName" type="text" placeholder="Description" class="form-control"/>
                                                </div>
                                            </div>
                                        </div> -->
                                </div>
                                </form>
    </div>
      
        </div>



</div>
<?php /*} else if($next_screen == 5) { ?>
<div class="modal-header" style="background: #49b6d6; color:#fff;">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title"><?php echo $back_link; ?>Let's plan your Team</h4>
</div>
<div class="modal-body">
    <div class="panel panel-white" style="border-color: transparent;">
        <div class="panel-heading"><i class="fa fa-user fa-2x" aria-hidden="true" style="color:#6b736c;"></i>   Define Team size?</div>
        <div class="panel-body">
                      <div class="col-md-12" style="margin-top: 15px;">
                          <ul class="nav nav-tabs target-area">
    <li class="active"><a data-toggle="tab" href="#home" style="color:#000;">Role</a></li>
    <li><a data-toggle="tab" href="#menu1" style="color:#000;">Type</a></li>
    
   
                     </ul>

                     </div>

                                <div class="col-md-12">
                                <h4 class="target-area target-area" style="margin-top: 25px;">Is this an individual employee or a group?</h4>

                                <p  class=" define-area">Us the group option only for similar employee with the same start date.If you are filing the same role and multiple points in times,enter those hires individually with their own start dates.</p> <div class="row">
                                            <div class="col-md-3 individual-gender">
                                              <input type="radio" name="gender" value="male"> Individual<br>
                                            </div>
                                           <div class="col-md-3 individual-gender" style="width: 20%;">
                                       <input type="radio" name="gender" value="female"> Group<br>
                                            </div>

                                 
                                   
                                        </div>

                                            <h4 class="target-area" style="margin-top: 14px;">What do you want to call them?</h4>

            <input type="text" data-tabindex="1" class="form-control mbm" id="plan_title" name="plan_title" placeholder="Enter a name or description" style="margin-top: 20px;">
                                                   </div>

                                 

              </div>
        </div>
    </div>
</div>
<?php  } else if($next_screen == 6) { ?>
<div class="modal-header" style="background: #49b6d6; color:#fff;">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title"><?php echo $back_link; ?>Let's plan your Team</h4>
</div>
<div class="modal-body">
     <div class="panel panel-white" style="border-color: transparent;">
        <div class="panel-heading"><i class="fa fa-user fa-2x" aria-hidden="true" style="color:#6b736c;"></i>  Define Team size?</div>
        <div class="panel-body">
                 <div class="col-md-12" style="margin-top: 15px;">
                <ul class="nav nav-tabs target-area">
               <li class="active"><a data-toggle="tab" href="#home" style="color:#000;">Role</a></li>
                <li><a data-toggle="tab" href="#menu1" style="color:#000;">Type</a></li>
   
                 </ul>

                </div>

                                <div class="col-md-12">
                                <h4 class="target-area" style="margin-top: 25px;">Is this an individual employee or a group?</h4>
                                <p class="define-area2">Us the group option only for similar employee with the same start date.If you are filing the same role and multiple points in times,enter those hires individually with their own start dates.</p>                         <div class="row">
                                            <div class="col-md-3 individual-gender">
                                              <input type="radio" name="gender" value="male"> Individual<br>
                                            </div>
                                           <div class="col-md-3 individual-gender" style="width: 20%;">
                                       <input type="radio" name="gender" value="female"> Group<br>
                                            </div>

                                 
                                   
                                        </div>
                            <h4 class="target-area target-area3">How many emplyees in this group?</h4>

            <input type="text" data-tabindex="1" class="form-control mbm target-area3" id="plan_title" name="plan_title" placeholder="Enter contstant number">

                            <h4 class="target-area target-area3">What do you want to call them?</h4>

            <input type="text" data-tabindex="1" class="form-control mbm target-area3" id="plan_title" name="plan_title" placeholder="Enter a name or description">
                                                   </div>

                                 

              </div>
        </div>
</div>
<?php } else if($next_screen == 7) { ?>
<div class="modal-header" style="background: #49b6d6; color:#fff;">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title"><?php echo $back_link; ?>Let's plan your Team</h4>
</div>
<div class="modal-body">
     <div class="panel panel-white" style="border-color: transparent;">
        <div class="panel-heading"><i class="fa fa-user fa-2x" aria-hidden="true" style="color:#6b736c;"></i>  Define Team size?</div>
        <div class="panel-body">
                            <div class="col-md-12" style="margin-top: 15px;">
                <ul class="nav nav-tabs target-area">
               <li class="active"><a data-toggle="tab" href="#home" style="color:#000;">Role</a></li>
                <li><a data-toggle="tab" href="#menu1" style="color:#000;">Type</a></li>
   
                 </ul>

                </div>

                                <div class="col-md-12">
                                <h4 class="target-area" style="margin-top: 25px;">Do you want too treat them as paid or free?</h4>
                                <p class="define-area2">Use the direct lobor option only for personel whose expenses are directly related to revenue, a factory worker who is paid to assemble products for sale would be direct lobor.So would a freelence designer hired to take on contract work form a design agency,The key distinction here is whether you want to treat an employee's expenses as direct costs</p>                         <div class="row">
                                            <div class="col-md-4 individual-gender">
                                              <input type="radio" name="gender" value="male"> Paid volunteer<br>
                                            </div>
                                           <div class="col-md-4 individual-gender">
                                       <input type="radio" name="gender" value="female">  Free volunteer<br>
                                            </div>

                                 
                                   
                                        </div>
                            <h4 class="target-area" style="margin-top: 14px;">How much will you pay per employee?</h4>

                <p class="define-area2">Enter the salary you expect to pay a single full-time individual in this group.we will multiply that by the FTE quantity to calculate the over all salary.</p>

                           <div class="row">
                                            <div class="col-md-6" style="margin-top: 20px;">
                                                <input type="text" name="" placeholder="Rs. " style="height: 30px;" class="form-control">
                                            </div>
                                            <div class="col-md-2" style="margin-top: 20px;text-align: right;">
                                                <lebel style="">Per</lebel>
                                            </div>
                                           <div class="col-md-4"  style="margin-top: 20px;"">
                                                <select class="form-control">
                                                    <option>Month</option>
                                                    <option>Year</option>
                                                </select>
                                            </div>
                                   
                                        </div>   

                                <h4 class="target-area" style="margin-top: 20px;">When will this group employees start?</h4>

                                  <div class="col-md-6"  style="margin-top: 18px;"">
                                                <select class="form-control" style=" margin-left: -15px;">
                                                    <option>Jan 2018</option>
                                                </select>
                                            </div>

           
                                                   </div>

                                 

              </div>
        </div>
</div>
<?php } else if($next_screen == 8) { ?>
<div class="modal-header" style="background: #49b6d6; color:#fff;">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title"><?php echo $back_link; ?>Let's plan your Team</h4>
</div>
<div class="modal-body">
     <div class="panel panel-white" style="border-color: transparent;">
        <div class="panel-heading"><i class="fa fa-user fa-2x" aria-hidden="true" style="color:#6b736c;"></i>  Define Team size?</div>
        <div class="panel-body">
                            <div class="col-md-12" style="margin-top: 15px;">
                <ul class="nav nav-tabs target-area">
               <li class="active"><a data-toggle="tab" href="#home" style="color:#000;">Role</a></li>
                <li><a data-toggle="tab" href="#menu1" style="color:#000;">Type</a></li>
   
                 </ul>

                </div>

                                <div class="col-md-12">
                                <h4 class="target-area" style="margin-top: 20px;">Do you want too treat them as paid or free?</h4>
                                <p class="define-area2">Use the direct lobor option only for personel whose expenses are directly related to revenue, a factory worker who is paid to assemble products for sale would be direct lobor.So would a freelence designer hired to take on contract work form a design agency,The key distinction here is whether you want to treat an employee's expenses as direct costs</p>                         <div class="row">
                                            <div class="col-md-4 individual-gender">
                                              <input type="radio" name="gender" value="male"> Paid volunteer<br>
                                            </div>
                                           <div class="col-md-4 individual-gender">
                                       <input type="radio" name="gender" value="female"> Free volunteer<br>
                                            </div>

                                 
                                   
                                        </div>
                        



                            <h4 class="target-area" style="margin-top: 20px;">When will this group employees start?</h4>

                                  <div class="col-md-6"  style="margin-top: 20px;"">
                                                <select class="form-control" style=" margin-left: -15px;">
                                                    <option>Jan 2018</option>
                                                </select>
                                            </div>

           
                                                   </div>

                                 

              </div>
        </div>
</div>
<?php */ } else if($next_screen == 5) { ?>
<div class="modal-header" style="background: #49b6d6; color:#fff;">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title"><?php echo $back_link; ?> Forecast </h4>
</div>
<div class="modal-body">
    <div class="panel panel-white" style="border-color: transparent;">
        <div class="panel-heading"> <i class="fa fa-share-alt-square fa-2x" aria-hidden="true" style="color:#6b736c; margin-top: -5px; float: left;"></i> &nbsp; &nbsp;<span>Let's plan your Funds</span></div>
        <div class="panel-body">

            <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#Online">Funds</a></li>
    <li><a data-toggle="tab" href="#Offline">Media</a></li>
       <li><a data-toggle="tab" href="#team">Team</a></li>
   
    <li><a data-toggle="tab" href="#Office">Office expenses</a></li>

      <!-- <li><a data-toggle="tab" href="#expenses">Miscellaneous expenses</a></li> -->
  
  </ul>

  <div class="tab-content">
    <div id="Online" class="tab-pane fade in active">

     <div class="row" style="height: 150px; overflow-y: auto; width: 100%;">
       <div class="col-md-6 funds-gape">
       
                <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Self Funding</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Individual Funding</label></div>
              </div>

                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Crowd Funding</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Loan</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                Text</label></div>
              </div>
          
    </div>

          <div class="col-md-6 funds-gape2">

            <span>Rs </span> &nbsp;&nbsp;&nbsp;&nbsp;<input type="Amount" name="" placeholder=" Amount"><br><br>
            <span>Rs </span> &nbsp;&nbsp;&nbsp;&nbsp; <input type="Amount" name="" placeholder=" Amount"><br><br>
            <span>Rs </span> &nbsp;&nbsp;&nbsp;&nbsp; <input type="Amount" name="" placeholder=" Amount"><br><br>
            <span>Rs </span> &nbsp;&nbsp;&nbsp;&nbsp; <input type="Amount" name="" placeholder=" Amount"><br><br>
            <span>Rs </span> &nbsp;&nbsp;&nbsp;&nbsp; <input type="Amount" name="" placeholder=" Amount"><br><br>
           <span class="amount-span">Total </span>  &nbsp;&nbsp;&nbsp;&nbsp;<input type="Amount" name="" placeholder=" Amount"><br><br> 
           

              
       
               <!--  <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  SMS</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Website</label></div>
              </div>

                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Newsletter</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Display ads</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Youtube</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div> -->
    </div>

    </div>
</div>



    <div id="Offline" class="tab-pane fade">
  
     <div class="row">


        <div class="col-md-12 express-tab">
            
            <ul class="nav nav-tabs expenses-tab">
  <li class="active"><a data-toggle="tab" href="#home">Online</a></li>
  <li><a data-toggle="tab" href="#menu1">Offline</a></li>
  
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">

    <div class="row">
       <div class="col-md-6 funds-gape">
       
                <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Pay per click </label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Blogging</label></div>
              </div>

                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  SEO</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  SEM</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Social Media</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Email</label></div>
              </div>
    </div>
    <div class="col-md-6 funds-gape">
        
         <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  SMS</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Website</label></div>
              </div>

                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Newsletter</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Display ads</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Youtube</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div> 
    </div>
    </div>
  </div>
  <div id="menu1" class="tab-pane fade">
     <div class="row">
      <div class="col-md-6 funds-gape">
       
                <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Newspaper ads </label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  TV ads</label></div>
              </div>

                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Radio</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Magazine ads</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Brochure print</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Posters</label></div>
              </div>
    </div>

        <div class="col-md-6 funds-gape">
       
                <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>

                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
    </div> 


 
</div>

  </div>

</div>

        </div>

    </div>
    </div>

    <div id="team" class="tab-pane fade">
        
     <div class="row" style="height: 150px; overflow-y: auto; width: 100%;">
          <div class="col-md-6">
       
                <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>

                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
    </div> 

        <div class="col-md-6">
       
                <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>

                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
    </div> 
    </div>

    </div>


    <div id="Office" class="tab-pane fade">
        
        <div class="row"  style="height: 150px; overflow-y: auto; width: 100%;">
                    <div class="col-md-6">
       
                <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>

                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
    </div> 
            <div class="col-md-6">
       
                <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>

                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
    </div> 
        </div>


    </div>





        <div id="expenses" class="tab-pane fade">
  
     <div class="row" style="height: 100px; overflow-y: auto; width: 100%;">
       <div class="col-md-6">
       
                <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text </label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>

                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                 Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                 Text</label></div>
              </div>
    </div>

           <div class="col-md-6">
                <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>

                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
                     <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Text</label></div>
              </div>
    </div>

    </div>
    </div>




  </div>

</div>
 </div>
   </div>
</div> 



        </div>
    </div>
</div>

<?php } else if($next_screen == 6) { ?>
<div class="modal-header" style="background: #49b6d6; color:#fff;">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title"><?php echo $back_link; ?>Funding</h4>
</div>
<div class="modal-body">
    <div class="panel panel-white" style="border-color: transparent;">
        <div class="panel-heading"><i class="fa fa-money fa-2x" aria-hidden="true" style="color:#6b736c; margin-top: -5px; float: left;"></i> &nbsp; &nbsp;<span>Let's plan your funds</span></div>
        <div class="panel-body">
        
            <div class="row">
            <div class="col-md-4">
                        <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Crowd funding </label></div>
              </div>
            </div>

             <div class="col-md-4">
                       <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Investor </label></div>
              </div>

             </div>

             <div class="col-md-4">
                           <div class="form-group mbn">
                  <div class="checkbox"><label><input tabindex="5" type="checkbox"/>&nbsp;
                  Contribution </label></div>
              </div>

             </div>
        </div>

        <div class="row" style="margin-top: 40px;">
             <div class="col-md-4"> <lebel style="margin-left: 24px; vertical-align: middle;"> Your Budget</lebel></div>
            <div class="col-md-4">
                
                <div class="form-group">
            
                <input type="text" name="" placeholder="Rupees" class="form-control">

                </div>
            </div>
           


        </div>

        </div>
    </div>
</div>
<?php } ?>

<div class="modal-footer">
    <!-- <inpu.panel-headingt type="reset" class="btn btn-default" value="Cancel"> -->
     <i class="fa fa-trash-o fa-2x delete" aria-hidden="true" onCLick="return resetFormPage();"></i>
     <button type="reset" class="btn pull-left btn-sm btn-primary confirm">Confirm</button>
     <button type="button" class="btn pull-left btn-sm btn-primary cancel">Cancel</button>



    <?php
   
    if($next_screen == 5) {
        ?>
        <!-- <button type="submit" class="btn btn-success" onClick="return prevScreen(<?php echo $prev_screen;?>);">Prev</button> -->
        <button type="submit" class="btn btn-success">Submit</button>
        <?php 
    } else {
    ?>
        <?php if($next_screen != '0') { ?>
       <!--  <button type="submit" class="btn btn-success" onClick="return prevScreen(<?php echo $prev_screen;?>);">Prev</button> -->
        <?php } ?>
         <button type="button" data-dismiss="modal" class="btn btn-default save-button"> Save & Close</button>
         <button type="submit" class="btn btn-success" onClick="return nextScreen(<?php echo $next_screen_next; ?>);">Next</button>
    <?php   
    }
    ?>
    
   
</div>
</form>

<script type="text/javascript">
 $(document).ready(function(){
  
    $("#read-click").click(function(){
        $(".religion-input").toggle();
    });

    $(document).ready(function(){
        $('.delete').click(function(){
            $('.confirm, .cancel').toggle();
        });

        $('.cancel').click(function(){
            $('.confirm, .cancel').toggle();
        });
        $('.confirm').click(function(){
            $('.confirm, .cancel').toggle();
        });
    });
});
</script>

