"use strict;"

var Vehicles = function() {
    var table;
    // Configuracion de la validacion
    var config = {
        error: Common.eHandler,
        rules: {
            dependency_id: {
                required: true
            },
            economic_number: {
                required: true
            },
            serial_number: {
                required: true
            },
            model: {
                required: true
            },
            year: {
                required: true,
                number: true
            },
            plate: {
                required: true
            }
        }
    };

    function setEvents() {
        config.url = '/admin/vehicle';
        config.success = newVehicle;
        Common.validator($("#submitForm"), config);
        var porlet = new mPortlet('portlet_1');
        porlet.on('reload', function() {
            table.ajax.reload();
        });
    }

    function getVehicles() {
        var coldefs = [{
                data: 'dependency.name',
                title: 'Dependencia'
            }, {
                data: 'economic_number',
                title: 'Número Económico'
            }, {
                data: 'plate',
                title: 'Número de Placas'
            }, {
                data: 'serial_number',
                title: 'Número de Serie'
            }, {
                data: 'brand.brand',
                title: 'Marca'
            }, {
                data: 'model',
                title: 'Modelo'
            }, {
                data: 'year',
                title: 'Año'
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
        table = Common.remoteTable($('#table'), '/admin/vehicle/datatable', coldefs);
        table.on('click', '[data-action="edit"]', editVehicle);
        table.on('click', '[data-action="delete"]', deleteVehicle);
    }

    function getDependency(el) {
        return $.get('/admin/vehicle/dependencies', function(e) {
            if (e.data || !e.error) {
                el.find("#dependency_id_input").html('<option></option>');
                el.find("#dependency_id_input").select2({
                    language: "es",
                    width: '100%',
                    destroy: true,
                    allowClear: true,
                    placeholder: 'Seleccione una dependencia',
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

    function getBrands(el) {
        return $.get('/admin/brands/filter/Vehiculo', function(e) {
            if (e.data || !e.error) {
                el.find("#brand_id_input").html('<option></option>');
                el.find("#brand_id_input").select2({
                    language: "es",
                    width: '100%',
                    destroy: true,
                    allowClear: true,
                    placeholder: 'Seleccione una marca',
                    data: $.map(e.data, function(e) {
                        e.text = e.brand;
                        return e;
                    })
                });
            } else if (e.error) {
                Common.error("Error!", e.r);
            }
        });
    }

    function newVehicle(data) {
        Common.success("Atencion!", "Vehículo registrado con exito.");
        table.ajax.reload();
    }

    function editVehicle() {
        var id = $(this).data('id');
        Common.modal($("#modal"), '/admin/vehicle/' + id + '/edit')
            .then(function() {
                var config = {
                    url: '/admin/vehicle/' + id,
                    success: updatedVehicle,
                    error: Common.eHandler,
                    rules: {
                        dependency_id: {
                            required: true
                        },
                        economic_number: {
                            required: true
                        },
                        serial_number: {
                            required: true
                        },
                        model: {
                            required: true
                        },
                        year: {
                            required: true,
                            number: true
                        },
                        plate: {
                            required: true
                        }
                    }
                };
                Common.validator($("#modal form"), config);
            });
    }

    function updatedVehicle() {
        Common.success("Vehículo actualizado con exito.");
        $('#modal').modal('hide');
        $('#table').find('a').tooltip('dispose');
        table.ajax.reload();
    }

    function deleteVehicle() {
        Common.confirm({
            title: "¿Seguro que deseas eliminar este registro?",
            text: "No habrá manera de revertir esta acción",
            confirmText: "Si, Elimínalo",
            confirm: vehicleDeleted,
            extras: $(this).data('id')
        });
    }

    function vehicleDeleted(id) {
        $.ajax({
            url: '/admin/vehicle/' + id,
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
            getVehicles();
            getDependency($("#submitForm"));
            getBrands($("#submitForm"));
        }
    };
}();