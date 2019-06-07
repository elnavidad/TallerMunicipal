@component('components.modal', ['form'=>'modal_form', 'size'=>'xl'])
    @slot('title')
    Editar Aceites
    @endslot
    @method('PUT')
    @include('oil.form')
    @slot('footer')
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancelar
        </button> 
        <button type="submit" class="btn btn-oil">
            Actualizar
        </button> 
    @endslot
@endcomponent