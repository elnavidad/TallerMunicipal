<div class="row">
        @if($permission->c)
            @component('components.portlet', ['form'=>'submitForm'])
                @slot('title')
                Registrar entrada de vehiculo
                @endslot
                @include('vehicleIn.form')
            @endcomponent
        @endif
        @if($permission->r)
            @component('components.portlet', ['table'=>'table'])
                @slot('title')
                Vehiculos que entraron
                @endslot
            @endcomponent
        @endif
    </div>