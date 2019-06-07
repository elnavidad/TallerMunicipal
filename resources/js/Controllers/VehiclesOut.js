"use strict;"

var VehiclesOut = function() {
    var table;
    // Configuracion de la validacion
    var config = {
        error: Common.eHandler,
        rules: {
            vehicle_id: {
                required: true
            },
            reason: {
                required: true
            }
        }
    };

    function setEvents() {
        config.url = '/admin/vehicleOut';
        config.success = newVehicleOut;
        Common.validator($("#submitForm"), config);
        var porlet = new mPortlet('portlet_1');
        porlet.on('reload', function() {
            table.ajax.reload();
        });
    }

    function getVehiclesOut() {
        var coldefs = [{
                data: 'vehicle.economic_number',
                title: 'Vehículo'
            },
            {
                data: 'reason',
                title: 'Razón de salida'
            }, {
                data: 'is_fixed',
                title: 'Fue reparado'
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
        table = Common.remoteTable($('#table'), '/admin/vehicleOut/datatable', coldefs);
        table.on('click', '[data-action="edit"]', editVehicleOut);
        table.on('click', '[data-action="delete"]', deleteVehicleOut);
    }

    function getVehicle(el) {
        return $.get('/admin/vehicleOut/vehicles', function(e) {
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

    function newVehicleOut(data) {
        Common.success("Atencion!", "Salida del vehículo registrada con exito.");
        table.ajax.reload();
    }

    function editVehicleOut() {
        var id = $(this).data('id');
        Common.modal($("#modal"), '/admin/vehicleOut/' + id + '/edit')
            .then(function() {
                var config = {
                    url: '/admin/vehicleOut/' + id,
                    success: updatedVehicleOut,
                    error: Common.eHandler,
                    rules: {
                        reason: {
                            required: true
                        }
                    }
                };
                Common.validator($("#modal form"), config);
            });
    }

    function updatedVehicleOut() {
        Common.success("Salida de vehículo actualizada con exito.");
        $('#modal').modal('hide');
        $('#table').find('a').tooltip('dispose');
        table.ajax.reload();
    }

    function deleteVehicleOut() {
        Common.confirm({
            title: "¿Seguro que deseas eliminar este registro?",
            text: "No habrá manera de revertir esta acción",
            confirmText: "Si, Elimínalo",
            confirm: vehicleOutDeleted,
            extras: $(this).data('id')
        });
    }

    function vehicleOutDeleted(id) {
        $.ajax({
            url: '/admin/vehicleOut/' + id,
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
            getVehiclesOut();
            getVehicle($("#submitForm"));
            $('#is_fixed_input').bootstrapSwitch();
        }
    };
}();