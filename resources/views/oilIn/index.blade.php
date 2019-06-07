<div class="row">
    @if($permission->c)
        @component('components.portlet', ['form'=>'submitForm'])
            @slot('title')
            Nueva entrada de aceite
            @endslot
            @include('oilIn.form')
        @endcomponent
    @endif
    @if($permission->r)
        @component('components.portlet', ['table'=>'table'])
            @slot('title')
            Entradas registradas
            @endslot
        @endcomponent
    @endif
</div>