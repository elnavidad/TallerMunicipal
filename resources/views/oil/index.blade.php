<div class="row">
    @if($permission->c)
        @component('components.portlet', ['form'=>'submitForm'])
            @slot('title')
            Agregar Aceite
            @endslot
            @include('oil.form')
        @endcomponent
    @endif
    @if($permission->r)
        @component('components.portlet', ['table'=>'table'])
            @slot('title')
            Aceites Registrados
            @endslot
        @endcomponent
    @endif
</div>