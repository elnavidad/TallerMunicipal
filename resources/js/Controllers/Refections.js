"use strict;"

var Refections = function() {
    var table;
    // Configuracion de la validacion
    var config = {
        error: Common.eHandler,
        rules: {
            description: {
                required: true
            },
            model: {
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
        config.url = '/admin/refection';
        config.success = newRefection;
        Common.validator($("#submitForm"), config);
        var porlet = new mPortlet('portlet_1');
        porlet.on('reload', function() {
            table.ajax.reload();
        });
    }

    function getRefections() {
        var coldefs = [{
                data: 'description',
                title: 'Descripción'
            }, {
                data: 'brand.brand',
                title: 'Marca'
            }, {
                data: 'model',
                title: 'Modelo'
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
        table = Common.remoteTable($('#table'), '/admin/refection/datatable', coldefs);
        table.on('click', '[data-action="edit"]', editRefection);
        table.on('click', '[data-action="delete"]', deleteRefection);
    }

    function getBrands(el) {
        return $.get('/admin/brands/filter/Refaccion', function(e) {
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

    function newRefection(data) {
        Common.success("Atencion!", "Refacción registrada con exito.");
        table.ajax.reload();
    }

    function editRefection() {
        var id = $(this).data('id');
        Common.modal($("#modal"), '/admin/refection/' + id + '/edit')
            .then(function() {
                var config = {
                    url: '/admin/refection/' + id,
                    success: updatedRefection,
                    error: Common.eHandler,
                    rules: {
                        description: {
                            required: true
                        },
                        model: {
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

    function updatedRefection() {
        Common.success("Refacción actualizada con exito.");
        $('#modal').modal('hide');
        $('#table').find('a').tooltip('dispose');
        table.ajax.reload();
    }

    function deleteRefection() {
        Common.confirm({
            title: "¿Seguro que deseas eliminar este registro?",
            text: "No habrá manera de revertir esta acción",
            confirmText: "Si, Elimínalo",
            confirm: refectionDeleted,
            extras: $(this).data('id')
        });
    }

    function refectionDeleted(id) {
        $.ajax({
            url: '/admin/refection/' + id,
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
            getRefections();
            getBrands($("#submitForm"));
        }
    };
}();