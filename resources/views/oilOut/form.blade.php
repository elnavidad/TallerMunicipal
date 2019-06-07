<div class="row">
        
        <div class="col-sm-3">
                @mSelect2(["label" => "Aceite", 
                "name"=>"oil_id", "placeholder"=>"", "value"=>($oilOut->oil ? $oilOut->oil->id : ''), 
                "text"=>($oilOut->oil ? $oilOut->oil->brand : '')])
            </div>
            <div class="col-sm-3">
                    @mSelect2(["label" => "Vehículo", 
                    "name"=>"vehicle_id", "placeholder"=>"", "value"=>($oilOut->vehicle ? $oilOut->vehicle->id : ''), 
                    "text"=>($oilOut->vehicle ? $oilOut->vehicle->economic_number : '')])
                </div>
        <div class="col-sm-3">
            @mInput(["type"=>"number", "label" => "Cantidad", "value"=>$oilOut->qty,
            "name"=>"qty", "placeholder"=>"2"]) 
        </div>
        <div class="col-sm-3">
                @mInput(["type"=>"text", "label" => "Razón", "value"=>$oilOut->reason,
                "name"=>"reason", "placeholder"=>"Servicio de motor"])
            </div>
    </div>