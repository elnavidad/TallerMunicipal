"use strict;"

var Oils = function() {
    var table;
    // Configuracion de la validacion
    var config = {
        error: Common.eHandler,
        rules: {
            usage: {
                required: true
            },
            type: {
                required: true
            },
            max: {
                required: true,
                number: true
            },
            min: {
                required: true,
                number: true
            }
        }
    };

    function setEvents() {
        config.url = '/admin/oil';
        config.success = newOil;
        Common.validator($("#submitForm"), config);
        var porlet = new mPortlet('portlet_1');
        porlet.on('reload', function() {
            table.ajax.reload();
        });
    }

    function getOils() {
        var coldefs = [{
                data: 'usage',
                title: 'Para_uso'
            }, {
                data: 'type',
                title: 'Tipo'
            }, {
                data: 'brand.brand',
                title: 'Marca'
            }, {
                data: 'max',
                title: 'Máximo'
            }, {
                data: 'min',
                title: 'Mínimo'
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
        table = Common.remoteTable($('#table'), '/admin/oil/datatable', coldefs);
        table.on('click', '[data-action="edit"]', editOil);
        table.on('click', '[data-action="delete"]', deleteOil);
    }

    function getBrands(el) {
        return $.get('/admin/brands/filter/Aceite', function(e) {
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

    function newOil(data) {
        Common.success("Atencion!", "Aceite registrado con exito.");
        table.ajax.reload();
    }

    function editOil() {
        var id = $(this).data('id');
        Common.modal($("#modal"), '/admin/oil/' + id + '/edit')
            .then(function() {
                var config = {
                    url: '/admin/oil/' + id,
                    success: updatedOil,
                    error: Common.eHandler,
                    rules: {
                        usage: {
                            required: true
                        },
                        type: {
                            required: true
                        },
                        max: {
                            required: true,
                            number: true
                        },
                        min: {
                            required: true
                        }
                    }
                };
                Common.validator($("#modal form"), config);
            });
    }

    function updatedOil() {
        Common.success("Aceite actualizado con exito.");
        $('#modal').modal('hide');
        $('#table').find('a').tooltip('dispose');
        table.ajax.reload();
    }

    function deleteOil() {
        Common.confirm({
            title: "¿Seguro que deseas eliminar este registro?",
            text: "No habrá manera de revertir esta acción",
            confirmText: "Si, Elimínalo",
            confirm: oilDeleted,
            extras: $(this).data('id')
        });
    }

    function oilDeleted(id) {
        $.ajax({
            url: '/admin/oil/' + id,
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
            getOils();
            getBrands($("#submitForm"));
        }
    };
}();