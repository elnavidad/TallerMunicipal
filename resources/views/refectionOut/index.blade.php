<div class="row">
        @if($permission->c)
            @component('components.portlet', ['form'=>'submitForm'])
                @slot('title')
                Agregar salida de Refacción
                @endslot
                @include('refectionOut.form')
            @endcomponent
        @endif
        @if($permission->r)
            @component('components.portlet', ['table'=>'table'])
                @slot('title')
                Registro de salida de refacciones
                @endslot
            @endcomponent
        @endif
    </div>