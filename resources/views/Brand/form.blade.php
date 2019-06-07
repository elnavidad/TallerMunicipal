<div class="row">
    <div class="col-sm-4">
        @mInput(["type"=>"text", "label" => "Marca", "value"=>$brand->brand,
        "name"=>"brand", "placeholder"=>"ej. FORD"])            
    </div>

    <div class="col-sm-4">
<div class="form-group m-form__group">
    <label for="">Tipo de Marca</label>
    <div class="m-select2 m-select2--air">
        <select name="type" id="type" class="form-control m-select2">
            <option value="Vehiculo">Vehiculo</option>
            <option value="Refacción">Refaccion</option>
            <option value="Aceite">Aceite</option>
        </select>
    </div>
</div>  

    </div>
    
</div>