@component('components.modal', ['form'=>'modal_form', 'size'=>'xl'])
    @slot('title')
    Editar salida de aceites
    @endslot
    @method('PUT')
    @include('oilOut.form')
    @slot('footer')
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancelar
        </button> 
        <button type="submit" class="btn btn-oilOut">
            Actualizar
        </button> 
    @endslot
@endcomponent