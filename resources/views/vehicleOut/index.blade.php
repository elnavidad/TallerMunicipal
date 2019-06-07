<div class="row">
        @if($permission->c)
            @component('components.portlet', ['form'=>'submitForm'])
                @slot('title')
                Registrar salida de vehiculo
                @endslot
                @include('vehicleOut.form')
            @endcomponent
        @endif
        @if($permission->r)
            @component('components.portlet', ['table'=>'table'])
                @slot('title')
                Vehiculos que salieron
                @endslot
            @endcomponent
        @endif
    </div>