<div class="row">
    <div class="col-sm-4">
        @mInput(["type"=>"text", "label" => "Uso", "value"=>$oil->usage,
        "name"=>"usage", "placeholder"=>"ej. motor"])            
    </div>
    <div class="col-sm-4">
        @mInput(["type"=>"text", "label" => "Tipo", "value"=>$oil->type,
        "name"=>"type", "placeholder"=>"ej. 15W - 40"])            
    </div>
    <div class="col-sm-4">
        @mSelect2(["label" => "Marca", 
        "name"=>"brand_id", "placeholder"=>"", "value"=>($oil->brand ? $oil->brand->id : ''), 
        "text"=>($oil->brand ? $oil->brand->brand : '')])
    </div>
</div>
<div class="row m--margin-top-15">
    <div class="col-sm-4">
        @mInput(["type"=>"number", "label" => "Maximo en Litros", "value"=>$oil->max,
        "name"=>"max", "placeholder"=>"10"])            
    </div>
    <div class="col-sm-4">
        @mInput(["type"=>"number", "label" => "Minimo en Litros", "value"=>$oil->min,
        "name"=>"min", "placeholder"=>"1"])            
    </div>
    
</div>