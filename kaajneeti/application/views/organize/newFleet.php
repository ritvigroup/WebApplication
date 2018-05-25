<form name="plan_form" method="post" action="<?php echo base_url(); ?>" onSubmit="return false;" enctype="multipart/form-data">
    <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <h4 id="modal-stackable-label" class="modal-title">New Fleet</h4>
    </div>
    <div class="modal-body">
        <div class="panel panel-white">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Vehicle Name: </label>
                            <input type="text" class="form-control" id="fleet_name" name="fleet_name" placeholder="Vehicle Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Registration Number: </label>
                            <input type="text" class="form-control" id="registration_number" name="registration_number" placeholder="Registration Number" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Driver Name: </label>
                            <input type="text" class="form-control" id="driver_name" name="driver_name" placeholder="Driver Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Vehicle Type: </label>
                            <select class="form-control" id="vehicle_type" name="vehicle_type">
                                <option value="Bus">Bus</option>
                                <option value="Jeep">Jeep</option>
                                <option value="Car">Car</option>
                                <option value="Bike">Bike</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total Vehicle: </label>
                            <input type="text" class="form-control" id="vehicle_quantity" name="vehicle_quantity" placeholder="Total Vehicle" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Image: </label>
                            <input type="file" name="file[]" class="form-control fileUploadForm"  multiple="true"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success save_fleet">Save</button>
        <button type="reset" data-dismiss="modal" class="btn btn-default reset_fleet">Cancel</button>
    </div>
</form>



<script>

    document.querySelector('.save_fleet').onclick = function () {
        var $this = $(this);
        var fleet_name              = $("#fleet_name").val();
        var registration_number     = $("#registration_number").val();
        var driver_name             = $("#driver_name").val();
        var vehicle_type            = $("#vehicle_type").val();
        var vehicle_quantity        = $("#vehicle_quantity").val();

        

        if (fleet_name.length > 2) {
            $('.save_fleet').html('Saving your fleet. Please be patience');

            //$('.save_fleet').prop('disabled', true);
                        
            var form_data = new FormData($('input[name^="file"]'));

            jQuery.each($('input[name^="file"]')[0].files, function(i, file) {
                form_data.append('file', file);
            });

            form_data.append('fleet_name', fleet_name);
            form_data.append('registration_number', registration_number);
            form_data.append('driver_name', driver_name);
            form_data.append('vehicle_type', vehicle_type);
            form_data.append('vehicle_quantity', vehicle_quantity);
            form_data.append('save_fleet', 'Y');

            jQuery.ajax({
                type: 'POST',
                cache: false,
                processData: false,
                contentType: false,
                data: form_data,
                url: "<?php echo base_url(); ?>organize/fleet",

                success: function(data) {
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        $('.save_fleet').html('Save');
                        $('.save_fleet').prop('disabled', false);
                        return false;
                    } else { 
                        if (data.status === "success") {
                            $('.save_user').html('Saved successfully');
                            window.location.href="fleet";
                        }
                    }
                }
            });

        } else {
            sweetAlert("Oops...", "Please enter your fleet name", "error");
            return false;
        }
    };

</script>


