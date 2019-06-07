<div class="row">
        
        <div class="col-sm-3">
                @mSelect2(["label" => "Refaccion", 
                "name"=>"refection_id", "placeholder"=>"", "value"=>($refectionOut->refection ? $refectionOut->refection->id : ''), 
                "text"=>($refectionOut->refection ? $refectionOut->refection->description : '')])
            </div>
            <div class="col-sm-3">
                    @mSelect2(["label" => "Vehículo", 
                    "name"=>"vehicle_id", "placeholder"=>"", "value"=>($refectionOut->vehicle ? $refectionOut->vehicle->id : ''), 
                    "text"=>($refectionOut->vehicle ? $refectionOut->vehicle->economic_number : '')])
                </div>
        <div class="col-sm-3">
            @mInput(["type"=>"number", "label" => "Cantidad", "value"=>$refectionOut->qty,
            "name"=>"qty", "placeholder"=>"2"]) 
        </div>
        <div class="col-sm-3">
                @mInput(["type"=>"text", "label" => "Razón", "value"=>$refectionOut->reason,
                "name"=>"reason", "placeholder"=>"instalación"])            
            </div>
    </div>