<div class="row">
    <div class="col-sm-4">
        <div class="form-group m-form__group">
            <label for="username_input">
                Usuario
            </label>
            <div class="input-group">
                <input type="text" class="form-control m-input m-input--air" id="username_input" name="username" placeholder="Usuario" value="{{ $user->username }}">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2" style="padding:0; border:0">
                        <select name="company" tabindex="-1" class="form-control m-input" id="company_input" style="padding:0; margin:0">
                            <option value="@nogalessonora.gob.mx">@nogalessonora.gob.mx</option>
                            <option value="@oomapasnogales.gob.mx">@oomapasnogales.gob.mx</option>
                            <option value="@miprepanogales.mx">@miprepanogales.mx</option>
                            <option value="@difnogales.org.mx">@difnogales.org.mx</option>
                        </select>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        @mInput(["type"=>"password", "label" => "Contraseña", 
        "name"=>"password", "placeholder"=>"****"])            
    </div>
    <div class="col-sm-4">
        @mInput(["type"=>"password", "label" => "Confirmar Contraseña", 
        "name"=>"confirm", "placeholder"=>"****"])            
    </div>
</div>
<div class="row m--margin-top-15">
    <div class="col-sm-4">
        @mInput(["type"=>"text", "label" => "Nombre Completo", 
        "name"=>"name", "placeholder"=>"Juan Perez", "value"=>$user->name])            
    </div>
    <div class="col-sm-4">
        @mSelect2(["label" => "Rol", 
        "name"=>"role_id", "placeholder"=>"Admin", "value"=>($user->role ? $user->role->id : ''), "text"=>($user->role ? $user->role->name : '')])            
    </div>
    <div class="col-sm-4">
        @mSelect2(["label" => "Dependencia", 
        "name"=>"dependency_id", "placeholder"=>"Oficialia", "value"=>($user->dependency ? $user->dependency->id : ''), "text"=>($user->dependency ? $user->dependency->name : '')])            
    </div>
</div>
<div class="row m--margin-top-15">
    <div class="col-sm-4">
        @mSelect2(["label" => "Departamento", 
        "name"=>"department_id", "placeholder"=>"Recursos Humanos", "value"=>($user->department ? $user->department->id : ''), "text"=>($user->department ? $user->department->name : '')])            
    </div>
</div>