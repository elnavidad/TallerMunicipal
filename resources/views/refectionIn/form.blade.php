<div class="row">
        
        <div class="col-sm-4">
                @mSelect2(["label" => "Refaccion", 
                "name"=>"refection_id", "placeholder"=>"", "value"=>($refectionIn->refection ? $refectionIn->refection->id : ''), 
                "text"=>($refectionIn->refection ? $refectionIn->refection->description : '')])
            </div>
        <div class="col-sm-4">
            @mInput(["type"=>"number", "label" => "Cantidad", "value"=>$refectionIn->qty,
            "name"=>"qty", "placeholder"=>"2"]) 
        </div>
        <div class="col-sm-4">
                @mInput(["type"=>"number", "label" => "Costo", "value"=>$refectionIn->unit_cost,
                "name"=>"unit_cost", "placeholder"=>"10"])            
            </div>
    </div>