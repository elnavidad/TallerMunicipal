<div class="row">
    @if($permission->c)
        @component('components.portlet', ['form'=>'submitForm'])
            @slot('title')
            Agregar Vehiculo
            @endslot
            @include('vehicle.form')
        @endcomponent
    @endif
    @if($permission->r)
        @component('components.portlet', ['table'=>'table'])
            @slot('title')
            Vehiculos Registrados
            @endslot
        @endcomponent
    @endif
</div>