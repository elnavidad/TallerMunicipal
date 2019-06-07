"use strict;"

var Brands = function() {
    var table;
    // Configuracion de la validacion
    var config = {
        error: Common.eHandler,
        rules: {
            brand: {
                required: true
            }
        }
    };

    function setEvents() {
        config.url = '/admin/brand';
        config.success = newBrand;
        Common.validator($("#submitForm"), config);
        var porlet = new mPortlet('portlet_1');
        $('#type').select2({
            placeholder: "Seleccione tipo",
            width: "100%"
        });
        porlet.on('reload', function() {
            table.ajax.reload();
        });
    }

    function getBrands() {
        var coldefs = [{
                data: 'brand',
                title: 'Marca del vehículo'
            },
            {
                data: 'type',
                title: 'Tipo de marca'
            },
            {
                data: 'created_at',
                title: 'Creado',
                className: 'none',
                render: Common.dateFormat
            }, {
                data: 'updated_at',
                title: 'Actualizado',
                render: Common.dateFormat
            },
            {
                data: 'p',
                title: 'Acciones',
                className: 'all',
                render: Common.tableActions
            }
        ];
        table = Common.remoteTable($('#table'), '/admin/brand/datatable', coldefs);
        table.on('click', '[data-action="edit"]', editBrand);
        table.on('click', '[data-action="delete"]', deleteBrand);
    }



    function newBrand(data) {
        Common.success("Atencion!", "Marca del vehículo registrada con exito.");
        table.ajax.reload();
    }

    function editBrand() {
        var id = $(this).data('id');
        Common.modal($("#modal"), '/admin/brand/' + id + '/edit')
            .then(function() {
                var config = {
                    url: '/admin/brand/' + id,
                    success: updatedBrand,
                    error: Common.eHandler,
                    rules: {
                        brand: {
                            required: true
                        }
                    }
                };
                Common.validator($("#modal form"), config);
            });
    }

    function updatedBrand() {
        Common.success("Marca del vehículo actualizada con exito.");
        $('#modal').modal('hide');
        $('#table').find('a').tooltip('dispose');
        table.ajax.reload();
    }

    function deleteBrand() {
        Common.confirm({
            title: "¿Seguro que deseas eliminar este registro?",
            text: "No habrá manera de revertir esta acción",
            confirmText: "Si, Elimínalo",
            confirm: brandDeleted,
            extras: $(this).data('id')
        });
    }

    function brandDeleted(id) {
        $.ajax({
            url: '/admin/brand/' + id,
            method: 'POST',
            data: {
                _token: $("[name='_token']").val(),
                _method: 'DELETE'
            },
            dataType: 'json',
            success: function(e) {
                Common.success('Aviso', 'Registro Eliminado Satisfactoriamente');
                table.ajax.reload();
            },
            error: Common.eHandler
        });
    }

    return {
        init: function() {
            setEvents();
            getBrands();
        }
    };
}();