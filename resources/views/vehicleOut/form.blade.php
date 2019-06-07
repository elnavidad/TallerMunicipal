<div class="row">
        <div class="col-sm-4">
            @mSelect2(["label" => "Vehículo", 
            "name"=>"vehicle_id", "placeholder"=>"", "value"=>($vehicleOut->vehicle ? $vehicleOut->vehicle->id : ''), 
            "text"=>($vehicleOut->vehicle ? $vehicleOut->vehicle->economic_number : '')])
        </div>
        
        <div class="col-sm-4">
                @mInput(["type"=>"text", "label" => "Razón", "value"=>$vehicleOut->reason,
                "name"=>"reason", "placeholder"=>"Servicio"])  
        </div>
    </div>
          <div class="col-sm-4">
            <div class="form-group m-form__group">
                    <label class="col-form-label" for="is_fixed_input">Fue reparado?</label>
                    <div>
                        <input data-switch="true" type="checkbox" name="is_fixed" id="is_fixed_input" 
                    data-on-text="Si" data-off-text="No" data-on-color="success"  data-off-color="danger">
                    </div>
                </div>
    </div>