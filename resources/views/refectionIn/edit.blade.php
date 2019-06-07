@component('components.modal', ['form'=>'modal_form', 'size'=>'xl'])
    @slot('title')
    Editar Refacción
    @endslot
    @method('PUT')
    @include('refectionIn.form')
    @slot('footer')
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancelar
        </button> 
        <button type="submit" class="btn btn-refectionIn">
            Actualizar
        </button> 
    @endslot
@endcomponent