@component('components.modal', ['form'=>'modal_form', 'size'=>'lg'])
    @slot('title')
    Cambiar Contraseña
    @endslot
    @method('PUT')
    <div class="row">
        <div class="col-sm-6">
            @mInput(["type"=>"password", "label" => "Contraseña", 
            "name"=>"password", "placeholder"=>"****"])            
        </div>
        <div class="col-sm-6">
            @mInput(["type"=>"password", "label" => "Confirmar Contraseña", 
            "name"=>"confirm", "placeholder"=>"****"])            
        </div>
    </div>
    @slot('footer')
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancelar
        </button> 
        <button type="submit" class="btn btn-brand">
            Actualizar
        </button> 
    @endslot
@endcomponent