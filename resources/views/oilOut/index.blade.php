<div class="row">
    @if($permission->c)
        @component('components.portlet', ['form'=>'submitForm'])
            @slot('title')
            Registrar salida de aceite
            @endslot
            @include('oilOut.form')
        @endcomponent
    @endif
    @if($permission->r)
        @component('components.portlet', ['table'=>'table'])
            @slot('title')
            Salidas registradas
            @endslot
        @endcomponent
    @endif
</div>