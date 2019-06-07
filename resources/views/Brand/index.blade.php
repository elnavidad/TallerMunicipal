<div class="row">
    @if($permission->c)
        @component('components.portlet', ['form'=>'submitForm'])
            @slot('title')
            Agregar Marca
            @endslot
            @include('brand.form')
        @endcomponent
    @endif
    @if($permission->r)
        @component('components.portlet', ['table'=>'table'])
            @slot('title')
            Marcas Registradas
            @endslot
        @endcomponent
    @endif
</div>