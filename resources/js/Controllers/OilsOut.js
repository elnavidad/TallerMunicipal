"use strict;"

var OilsOut = function() {
    var table;
    // Configuracion de la validacion
    var config = {
        error: Common.eHandler,
        rules: {
            oil_id: {
                required: true
            },
            vehicle_id: {
                required: true
            },
            qty: {
                required: true,
                number: true
            },
            reason: {
                required: true
            }
        }
    };

    function setEvents() {
        config.url = '/admin/oilOut';
        config.success = newOilOut;
        Common.validator($("#submitForm"), config);
        var porlet = new mPortlet('portlet_1');
        porlet.on('reload', function() {
            table.ajax.reload();
        });
    }

    function getOilsOut() {
        var coldefs = [{
                data: 'oil.brand.brand',
                title: 'Aceite'
            }, {
                data: 'vehicle.economic_number',
                title: 'Vehiculo'
            }, {
                data: 'qty',
                title: 'Cantidad'
            }, {
                data: 'reason',
                title: 'Razón de salida'
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
        table = Common.remoteTable($('#table'), '/admin/oilOut/datatable', coldefs);
        table.on('click', '[data-action="edit"]', editOilOut);
        table.on('click', '[data-action="delete"]', deleteOilOut);
    }

    function getOils(el) {
        return $.get('/admin/oilOut/oils', function(e) {
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

    function getVehicles(el) {
        return $.get('/admin/oilOut/vehicles', function(e) {
            if (e.data || !e.error) {
                el.find("#vehicle_id_input").html('<option></option>');
                el.find("#vehicle_id_input").select2({
                    language: "es",
                    width: '100%',
                    destroy: true,
                    allowClear: true,
                    placeholder: 'Seleccione un vehículo',
                    data: $.map(e.data, function(e) {
                        e.text = e.economic_number;
                        return e;
                    })
                });
            } else if (e.error) {
                Common.error("Error!", e.r);
            }
        });
    }

    function newOilOut(data) {
        Common.success("Atencion!", "Salida de aceite registrada con exito.");
        table.ajax.reload();
    }

    function editOilOut() {
        var id = $(this).data('id');
        Common.modal($("#modal"), '/admin/oilOut/' + id + '/edit')
            .then(function() {
                var config = {
                    url: '/admin/oilOut/' + id,
                    success: updatedOilOut,
                    error: Common.eHandler,
                    rules: {
                        oil_id: {
                            required: true
                        },
                        vehicle_id: {
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

    function updatedOilOut() {
        Common.success("Salida de aceite actualizada con exito.");
        $('#modal').modal('hide');
        $('#table').find('a').tooltip('dispose');
        table.ajax.reload();
    }

    function deleteOilOut() {
        Common.confirm({
            title: "¿Seguro que deseas eliminar este registro?",
            text: "No habrá manera de revertir esta acción",
            confirmText: "Si, Elimínalo",
            confirm: oilOutDeleted,
            extras: $(this).data('id')
        });
    }

    function oilOutDeleted(id) {
        $.ajax({
            url: '/admin/oilOut/' + id,
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
            getOilsOut();
            getOils($("#submitForm"));
            getVehicles($("#submitForm"));
        }
    };
}();