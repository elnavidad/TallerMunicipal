"use strict;"

var VehiclesIn = function() {
    var table;
    // Configuracion de la validacion
    var config = {
        error: Common.eHandler,
        rules: {
            vehicle_id: {
                required: true
            },
            department_id: {
                required: true
            },
            reason: {
                required: true
            }
        }
    };

    function setEvents() {
        config.url = '/admin/vehicleIn';
        config.success = newVehicleIn;
        Common.validator($("#submitForm"), config);
        var porlet = new mPortlet('portlet_1');
        porlet.on('reload', function() {
            table.ajax.reload();
        });
    }

    function getVehiclesIn() {
        var coldefs = [{
                data: 'vehicle.economic_number',
                title: 'Vehículo'
            },
            {
                data: 'department.name',
                title: 'Departamento'
            },
            {
                data: 'reason',
                title: 'Razón de entrada'
            }, {
                data: 'requires_refection',
                title: 'Requiere refacción'
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
        table = Common.remoteTable($('#table'), '/admin/vehicleIn/datatable', coldefs);
        table.on('click', '[data-action="edit"]', editVehicleIn);
        table.on('click', '[data-action="delete"]', deleteVehicleIn);
    }

    function getVehicle(el) {
        return $.get('/admin/vehicleIn/vehicles', function(e) {
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

    function getDepartment(el) {
        return $.get('/admin/vehicleIn/departments', function(e) {
            if (e.data || !e.error) {
                el.find("#department_id_input").html('<option></option>');
                el.find("#department_id_input").select2({
                    language: "es",
                    width: '100%',
                    destroy: true,
                    allowClear: true,
                    placeholder: 'Seleccione un departamento',
                    data: $.map(e.data, function(e) {
                        e.text = e.name;
                        return e;
                    })
                });
            } else if (e.error) {
                Common.error("Error!", e.r);
            }
        });
    }

    function newVehicleIn(data) {
        Common.success("Atencion!", "Entrada del vehículo registrado con exito.");
        table.ajax.reload();
    }

    function editVehicleIn() {
        var id = $(this).data('id');
        Common.modal($("#modal"), '/admin/vehicleIn/' + id + '/edit')
            .then(function() {
                var config = {
                    url: '/admin/vehicleIn/' + id,
                    success: updatedVehicleIn,
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

    function updatedVehicleIn() {
        Common.success("Entrada de vehículo actualizada con exito.");
        $('#modal').modal('hide');
        $('#table').find('a').tooltip('dispose');
        table.ajax.reload();
    }

    function deleteVehicleIn() {
        Common.confirm({
            title: "¿Seguro que deseas eliminar este registro?",
            text: "No habrá manera de revertir esta acción",
            confirmText: "Si, Elimínalo",
            confirm: vehicleInDeleted,
            extras: $(this).data('id')
        });
    }

    function vehicleInDeleted(id) {
        $.ajax({
            url: '/admin/vehicleIn/' + id,
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
            getVehiclesIn();
            getVehicle($("#submitForm"));
            getDepartment($("#submitForm"));
            $('#requires_refection_input').bootstrapSwitch();
        }
    };
}();