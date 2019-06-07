"use strict;"

var Dependencies = function() {
    var table;

    function getDependencies() {
        var coldefs = [{
                data: 'id',
                title: '#'
            }, {
                data: 'name',
                title: 'Dependencia'
            }, {
                data: 'attendant',
                title: 'Encargado'
            }, {
                data: 'created_at',
                title: 'Creado',
                render: Common.dateFormat
            }, {
                data: 'updated_at',
                title: 'Actualizado',
                render: Common.dateFormat
            },
            {
                data: 'p',
                title: 'Acciones',
                render: Common.tableActions
            }
        ];
        table = Common.remoteTable($('#table'), '/admin/dependency/datatable', coldefs);
        table.on('click', '[data-action="edit"]', editDependency);
        table.on('click', '[data-action="delete"]', deleteDependency);
        var porlet = new mPortlet('portlet_1');
        porlet.on('reload', function(){
            table.ajax.reload();
        });
    }

    function newDependency() {
        Common.success("Dependencia registrado con exito.");
        $('#table').find('a').tooltip('dispose');
        table.ajax.reload();
    }

    function editDependency() {
        var id = $(this).data('id');
        Common.modal($("#modal"), '/admin/dependency/' + id + '/edit')
            .then(function() {
                var config = {
                    url: '/admin/dependency/' + id,
                    success: updatedDependency,
                    error: Common.eHandler,
                    rules: {
                        name: {
                            required: true
                        },
                        attendant: {
                            required: true
                        }
                    }
                };
                Common.validator($("#modal form"), config);
            });
    }

    function updatedDependency() {
        Common.success("Dependencia actualizado con exito.");
        $('#modal').modal('hide');
        $('#table').find('a').tooltip('dispose');
        table.ajax.reload();
    }

    function deleteDependency() {
        Common.confirm({
            title: "¿Seguro que deseas eliminar este registro?",
            text: "No habrá manera de revertir esta acción",
            confirmText: "Si, Elimínalo",
            confirm: dependencyDeleted,
            extras: $(this).data('id')
        });
    }

    function dependencyDeleted(id) {
        $.ajax({
            url: '/admin/dependency/' + id,
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
            var config = {
                url: '/admin/dependency',
                success: newDependency,
                error: Common.eHandler,
                rules: {
                    name: {
                        required: true
                    },
                    attendant: {
                        required: true
                    }
                }
            };
            Common.validator($("#submitForm"), config);
            getDependencies();
        }
    };
}();