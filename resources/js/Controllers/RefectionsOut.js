"use strict;"

var RefectionsOut = function() {
    var table;
    // Configuracion de la validacion
    var config = {
        error: Common.eHandler,
        rules: {
            refection_id: {
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
                required: true,

            }
        }
    };

    function setEvents() {
        config.url = '/admin/refectionOut';
        config.success = newrefectionOut;
        Common.validator($("#submitForm"), config);
        var porlet = new mPortlet('portlet_1');
        porlet.on('reload', function() {
            table.ajax.reload();
        });
    }

    function getRefectionsOut() {
        var coldefs = [{
                data: 'refection.description',
                title: 'Refacción'
            }, {
                data: 'vehicle.economic_number',
                title: 'Vehículo'
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
        table = Common.remoteTable($('#table'), '/admin/refectionOut/datatable', coldefs);
        table.on('click', '[data-action="edit"]', editrefectionOut);
        table.on('click', '[data-action="delete"]', deleterefectionOut);
    }

    function getRefections(el) {
        return $.get('/admin/refectionOut/refections', function(e) {
            if (e.data || !e.error) {
                el.find("#refection_id_input").html('<option></option>');
                el.find("#refection_id_input").select2({
                    language: "es",
                    width: '100%',
                    destroy: true,
                    allowClear: true,
                    placeholder: 'Seleccione una refacción',
                    data: $.map(e.data, function(e) {
                        e.text = e.description
                        return e;
                    })
                });
            } else if (e.error) {
                Common.error("Error!", e.r);
            }
        });
    }

    function getVehicle(el) {
        return $.get('/admin/refectionOut/vehicles', function(e) {
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

    function newrefectionOut(data) {
        Common.success("Atencion!", "Salida de Refacción registrada con exito.");
        table.ajax.reload();
    }

    function editrefectionOut() {
        var id = $(this).data('id');
        Common.modal($("#modal"), '/admin/refectionOut/' + id + '/edit')
            .then(function() {
                var config = {
                    url: '/admin/refectionOut/' + id,
                    success: updatedrefectionOut,
                    error: Common.eHandler,
                    rules: {
                        refection_id: {
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
                Common.validator($("#modal form"), config);
            });
    }

    function updatedrefectionOut() {
        Common.success("Salida de Refacción actualizada con exito.");
        $('#modal').modal('hide');
        $('#table').find('a').tooltip('dispose');
        table.ajax.reload();
    }

    function deleterefectionOut() {
        Common.confirm({
            title: "¿Seguro que deseas eliminar este registro?",
            text: "No habrá manera de revertir esta acción",
            confirmText: "Si, Elimínalo",
            confirm: refectionOutDeleted,
            extras: $(this).data('id')
        });
    }

    function refectionOutDeleted(id) {
        $.ajax({
            url: '/admin/refectionOut/' + id,
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
            getRefectionsOut();
            getRefections($("#submitForm"));
            getVehicle($("#submitForm"));
        }
    };
}();