<div class="row">
    <div class="col-sm-4">
        @mSelect2(["label" => "Vehículo", 
        "name"=>"vehicle_id", "placeholder"=>"", "value"=>($vehicleIn->vehicle ? $vehicleIn->vehicle->id : ''), 
        "text"=>($vehicleIn->vehicle ? $vehicleIn->vehicle->economic_number : '')])
    </div>
    <div class="col-sm-4">
            @mSelect2(["label" => "Departamento", 
            "name"=>"department_id", "placeholder"=>"", "value"=>($vehicleIn->department ? $vehicleIn->department->id : ''), 
            "text"=>($vehicleIn->department ? $vehicleIn->department->name : '')])
        </div>
    
    <div class="col-sm-4">
            @mInput(["type"=>"text", "label" => "Razón", "value"=>$vehicleIn->reason,
            "name"=>"reason", "placeholder"=>"Servicio"])  
    </div>
</div>
<div class="row m--margin-top-15">
        <div class="form-group m-form__group">
                <label class="col-form-label" for="requires_refection_input">Requiere refacción?</label>
                <div>
                    <input data-switch="true" type="checkbox" name="requires_refection" id="requires_refection_input" 
                data-on-text="Si" data-off-text="No" data-on-color="success"  data-off-color="danger">
                </div>
            </div>
</div>