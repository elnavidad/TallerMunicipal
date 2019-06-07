@component('components.modal', ['form'=>'modal_form', 'size'=>'xl'])
    @slot('title')
        Editar Rol
    @endslot
    @method('PUT')
    @include('role.form')
    @slot('footer')
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancelar
        </button> 
        <button type="submit" class="btn btn-brand">
            Actualizar
        </button> 
    @endslot
@endcomponent