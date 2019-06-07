<div class="row">
        @if($permission->c)
            @component('components.portlet', ['form'=>'submitForm'])
                @slot('title')
                Agregar Refacción
                @endslot
                @include('refectionIn.form')
            @endcomponent
        @endif
        @if($permission->r)
            @component('components.portlet', ['table'=>'table'])
                @slot('title')
                Refacciones Registradas
                @endslot
            @endcomponent
        @endif
    </div>