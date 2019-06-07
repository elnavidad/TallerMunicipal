"use strict;"

var OilsIn = function() {
    var table;
    // Configuracion de la validacion
    var config = {
        error: Common.eHandler,
        rules: {
            oil_id: {
                required: true
            },
            qty: {
                required: true,
                number: true
            },
            unit_cost: {
                required: true,
                number: true
            }
        }
    };

    function setEvents() {
        config.url = '/admin/oilIn';
        config.success = newOilIn;
        Common.validator($("#submitForm"), config);
        var porlet = new mPortlet('portlet_1');
        porlet.on('reload', function() {
            table.ajax.reload();
        });
    }

    function getOilsIn() {
        var coldefs = [{
                data: 'oil.brand.brand',
                title: 'Aceite'
            }, {
                data: 'qty',
                title: 'Cantidad'
            }, {
                data: 'unit_cost',
                title: 'Costo'
            }, {
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
        table = Common.remoteTable($('#table'), '/admin/oilIn/datatable', coldefs);
        table.on('click', '[data-action="edit"]', editOilIn);
        table.on('click', '[data-action="delete"]', deleteOilIn);
    }

    function getOils(el) {
        return $.get('/admin/oilIn/oils', function(e) {
            if (e.data || !e.error) {
                el.find("#oil_id_input").html('<option></option>');
                el.find("#oil_id_input").select2({
                    language: "es",
                    width: '100%',
                    destroy: true,
                    allowClear: true,
                    placeholder: 'Seleccione un aceite',
                    data: $.map(e.data, function(e) {
                        e.text = e.brand.brand;
                        return e;
                    })
                });
            } else if (e.error) {
                Common.error("Error!", e.r);
            }
        });
    }

    function newOilIn(data) {
        Common.success("Atencion!", "Entrada de aceite registrada con exito.");
        table.ajax.reload();
    }

    function editOilIn() {
        var id = $(this).data('id');
        Common.modal($("#modal"), '/admin/oilIn/' + id + '/edit')
            .then(function() {
                var config = {
                    url: '/admin/oilIn/' + id,
                    success: updatedOilIn,
                    error: Common.eHandler,
                    rules: {
                        oil_id: {
                            required: true
                        },
                        qty: {
                            required: true,
                            number: true
                        },
                        unit_cost: {
                            required: true,
                            number: true
                        }
                    }
                };
                Common.validator($("#modal form"), config);
            });
    }

    function updatedOilIn() {
        Common.success("Entrada de aceite actualizada con exito.");
        $('#modal').modal('hide');
        $('#table').find('a').tooltip('dispose');
        table.ajax.reload();
    }

    function deleteOilIn() {
        Common.confirm({
            title: "¿Seguro que deseas eliminar este registro?",
            text: "No habrá manera de revertir esta acción",
            confirmText: "Si, Elimínalo",
            confirm: oilInDeleted,
            extras: $(this).data('id')
        });
    }

    function oilInDeleted(id) {
        $.ajax({
            url: '/admin/oilIn/' + id,
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
            getOilsIn();
            getOils($("#submitForm"));
        }
    };
}();