<div class="row">
    <div class="col-sm-4">
        @mInput(["type"=>"text", "label" => "Descripción", "value"=>$refection->description,
        "name"=>"description", "placeholder"=>"ej. cremallera"])            
    </div>
    <div class="col-sm-4">
            @mSelect2(["label" => "Marca", 
            "name"=>"brand_id", "placeholder"=>"", "value"=>($refection->brand ? $refection->brand->id : ''), 
            "text"=>($refection->brand ? $refection->brand->brand : '')])
        </div>
    <div class="col-sm-4">
        @mInput(["type"=>"text", "label" => "Modelo", "value"=>$refection->model,
        "name"=>"model", "placeholder"=>"ej. X2000"]) 
    </div>
</div>
<div class="row m--margin-top-15">
    <div class="col-sm-4">
        @mInput(["type"=>"number", "label" => "Max", "value"=>$refection->max,
        "name"=>"max", "placeholder"=>"10"])            
    </div>
    <div class="col-sm-4">
        @mInput(["type"=>"number", "label" => "Min", "value"=>$refection->min,
        "name"=>"min", "placeholder"=>"1"])            
    </div>
    
</div>