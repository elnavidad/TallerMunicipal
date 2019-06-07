@component('components.modal', ['form'=>'modal_form', 'size'=>'xl'])
    @slot('title')
    Editar entrada de aceites
    @endslot
    @method('PUT')
    @include('oilIn.form')
    @slot('footer')
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancelar
        </button> 
        <button type="submit" class="btn btn-oilIn">
            Actualizar
        </button> 
    @endslot
@endcomponent