@component('components.modal', ['form'=>'modal_form', 'size'=>'xl'])
    @slot('title')
    Editar Vehículo
    @endslot
    @method('PUT')
    @include('vehicleOut.form')
    @slot('footer')
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancelar
        </button> 
        <button type="submit" class="btn btn-vehicleOut">
            Actualizar
        </button> 
    @endslot
@endcomponent