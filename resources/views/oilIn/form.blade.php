<div class="row">
    <div class="col-sm-4">
                @mSelect2(["label" => "Aceite", 
                "name"=>"oil_id", "placeholder"=>"", "value"=>($oilIn->oil ? $oilIn->oil->id : ''), 
                "text"=>($oilIn->oil ? $oilIn->oil->brand_id : '')])
            </div>
    <div class="col-sm-4">
        @mInput(["type"=>"text", "label" => "Cantidad en litros", "value"=>$oilIn->qty,
        "name"=>"qty", "placeholder"=>"12"])            
    </div>
    <div class="col-sm-4">
        @mInput(["type"=>"text", "label" => "Costo", "value"=>$oilIn->unit_cost,
        "name"=>"unit_cost", "placeholder"=>"200"])            
    </div>