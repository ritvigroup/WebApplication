<!DOCTYPE html>
<html lang="en">
<head><title>Search</title>
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
                    <div class="col-md-9">
                        <div class="portlet box ">
                            <div class="portlet-header">
                                <ol class="breadcrumb page-breadcrumb">
                                    <li> <a class="text-capitalize" href="<?=base_url();?>leader/dashboard">Kaajneeti</a> </li>
                                    <li> <a class="text-capitalize" href="<?=base_url(); ?>connect/connect">Connect</a> </li>
                                    <li class="active"> <a class="text-capitalize" href="<?=base_url(); ?>connect/search">Search</a> </li>
                                </ol>
                            </div>
                            
                            <div class="table-responsive1">
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="connect_list" id="search_result_show">
                                                <?php $this->load->view('connect/search_result'); ?>
                                            </div>
                                            <div class="new_loader_div" id="loader_div"><img src="<?=base_url();?>assets/images/new-loader.gif"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="clearfix" style="margin: 30px 0;"> </div>
                            <h3>Search Filter</h3>
                            <div class="col-md-12">
                                <input type="text" id="search_text" class="form-control" autocomplete="off" placeholder="Search">
                            </div>
                            <div class="clearfix" style="margin: 10px 0;"> </div>
                            <div class="col-md-12">
                                <select id="gender" class="form-control">
                                    <option value="">-All Gender-</option>
                                    <?php foreach($Gender AS $gender) { ?>
                                    <option value="<?php echo $gender->GenderId; ?>"><?php echo $gender->GenderName; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="clearfix" style="margin: 10px 0;"> </div>
                            <div class="col-md-12">
                                <select id="political_party" class="form-control">
                                    <option value="">-All Political Party-</option>
                                    <?php foreach($PoliticalParty AS $political_party) { ?>
                                    <option value="<?php echo $political_party->PoliticalPartyId; ?>"><?php echo $political_party->PoliticalPartyName; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="clearfix" style="margin: 10px 0;"> </div>
                            <div class="col-md-12 submit-button"><input type="button" value="Submit" onClick="return searchUserProfiles();" class="btn btn-success"></div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>

    <?php  require_once './include/scroll_top.php';?>
<?php  require_once './include/footer.php';?>
</body>

<?php  require_once './include/js.php';?>
<?php  require_once './include/connect/connect.php';?>


</script>

</body>
</html>