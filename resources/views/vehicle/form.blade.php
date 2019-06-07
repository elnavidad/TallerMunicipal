<div class="row">
    <div class="col-sm-4">
        @mInput(["type"=>"text", "label" => "Número economico", "value"=>$vehicle->economic_number,
        "name"=>"economic_number", "placeholder"=>"ej. p123"])            
    </div>
    <div class="col-sm-4">
        @mInput(["type"=>"text", "label" => "Número de serie", "value"=>$vehicle->serial_number,
        "name"=>"serial_number", "placeholder"=>"ej. XCBVHG"])            
    </div>
    <div class="col-sm-4">
        @mSelect2(["label" => "Marca", 
        "name"=>"brand_id", "placeholder"=>"", "value"=>($vehicle->brand ? $vehicle->brand->id : ''), 
        "text"=>($vehicle->brand ? $vehicle->brand->brand : '')])
    </div>
</div>
<div class="row m--margin-top-15">
    <div class="col-sm-4">
        @mInput(["type"=>"text", "label" => "Modelo", "value"=>$vehicle->model,
        "name"=>"model", "placeholder"=>"Modelo"])            
    </div>
    <div class="col-sm-4">
        @mInput(["type"=>"number", "label" => "Año", "value"=>$vehicle->year,
        "name"=>"year", "placeholder"=>"ej. 1999"])            
    </div>
    <div class="col-sm-4">
        @mInput(["type"=>"text", "label" => "Número de Placas", "value"=>$vehicle->plate,
        "name"=>"plate", "placeholder"=>"ej. XCBVHG"])            
    </div>
</div>

<div class="row m--margin-top-30">
        <div class="col-sm-4">
                @mSelect2(["label" => "Dependencia", 
                "name"=>"dependency_id", "placeholder"=>"", "value"=>($vehicle->dependency ? $vehicle->dependency->id : ''), 
                "text"=>($vehicle->dependency ? $vehicle->dependency->name : '')])
            </div>
</div>