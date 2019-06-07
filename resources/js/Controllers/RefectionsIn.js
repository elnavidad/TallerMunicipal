"use strict;"

var RefectionsIn = function() {
    var table;
    // Configuracion de la validacion
    var config = {
        error: Common.eHandler,
        rules: {
            refection_id: {
                required: true
            },
            qty: {
                required: true
            },
            unit_cost: {
                required: true,
                number: true
            }
        }
    };

    function setEvents() {
        config.url = '/admin/refectionIn';
        config.success = newRefectionIn;
        Common.validator($("#submitForm"), config);
        var porlet = new mPortlet('portlet_1');
        porlet.on('reload', function() {
            table.ajax.reload();
        });
    }

    function getRefectionsIn() {
        var coldefs = [{
                data: 'refection.description',
                title: 'Refacción'
            }, {
                data: 'qty',
                title: 'Cantidad'
            }, {
                data: 'unit_cost',
                title: 'Precio por unidad'
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
        table = Common.remoteTable($('#table'), '/admin/refectionIn/datatable', coldefs);
        table.on('click', '[data-action="edit"]', editRefectionIn);
        table.on('click', '[data-action="delete"]', deleteRefectionIn);
    }

    function getRefections(el) {
        return $.get('/admin/refectionIn/refections', function(e) {
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

    function newRefectionIn(data) {
        Common.success("Atencion!", "Refacción registrada con exito.");
        table.ajax.reload();
    }

    function editRefectionIn() {
        var id = $(this).data('id');
        Common.modal($("#modal"), '/admin/refectionIn/' + id + '/edit')
            .then(function() {
                var config = {
                    url: '/admin/refectionIn/' + id,
                    success: updatedRefectionIn,
                    error: Common.eHandler,
                    rules: {
                        refection_id: {
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

    function updatedRefectionIn() {
        Common.success("Refacción actualizada con exito.");
        $('#modal').modal('hide');
        $('#table').find('a').tooltip('dispose');
        table.ajax.reload();
    }

    function deleteRefectionIn() {
        Common.confirm({
            title: "¿Seguro que deseas eliminar este registro?",
            text: "No habrá manera de revertir esta acción",
            confirmText: "Si, Elimínalo",
            confirm: refectionInDeleted,
            extras: $(this).data('id')
        });
    }

    function refectionInDeleted(id) {
        $.ajax({
            url: '/admin/refectionIn/' + id,
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
            getRefectionsIn();
            getRefections($("#submitForm"));
        }
    };
}();