"use strict;"

$(document).ready(function() {
    AppRouter
        .setApp({
            name: "Boilerplate",
            author: "Gobierno Municipal de Nogales",
            url: "https://nogalessonora.gob.mx",
            year: "2018-2021"
        })
        .state('vehicle', {
            url: '/Vehiculos',
            title: 'Vehiculos',
            viewUrl: '/admin/vehicle',
            Controller: 'Vehicles'
        })

    .state('vehicleIn', {
        url: '/EntradadeVehiculos',
        title: 'Vehiculos Entrantes',
        viewUrl: '/admin/vehicleIn',
        Controller: 'VehiclesIn'
    })

    .state('vehicleOut', {
        url: '/SalidadeVehiculos',
        title: 'Vehiculos Salientes',
        viewUrl: '/admin/vehicleOut',
        Controller: 'VehiclesOut'
    })

    .state('brand', {
        url: '/Marcas',
        title: 'Marcas',
        viewUrl: '/admin/brand',
        Controller: 'Brands'
    })

    .state('refection', {
        url: '/Refacciones',
        title: 'Refacciones',
        viewUrl: '/admin/refection',
        Controller: 'Refections'
    })

    .state('refectionIn', {
        url: '/EntradadeRefacciones',
        title: 'Refacciones Entrantes',
        viewUrl: '/admin/refectionIn',
        Controller: 'RefectionsIn'
    })

    .state('refectionOut', {
        url: '/SalidadeRefacciones',
        title: 'Refacciones Salientes',
        viewUrl: '/admin/refectionOut',
        Controller: 'RefectionsOut'
    })

    .state('oil', {
        url: '/Aceites',
        title: 'Aceites',
        viewUrl: '/admin/oil',
        Controller: 'Oils'
    })

    .state('oilIn', {
        url: '/EntradadeAceites',
        title: 'Entrada de aceites',
        viewUrl: '/admin/oilIn',
        Controller: 'OilsIn'
    })

    .state('oilOut', {
        url: '/SalidadeAceites',
        title: 'Salida de aceites',
        viewUrl: '/admin/oilOut',
        Controller: 'OilsOut'
    });


    // INITIALIZE APP
    $.get('/admin/defaultState')
        .then(function(r) {
            AppRouter.setDefaultState(r);
            Common.init();
            AppRouter.init();
        });

    $("#change_password").on('click', function() {
        Users.changePassword();
    });
});