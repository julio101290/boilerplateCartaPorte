<?php

$routes->group('admin', function ($routes) {


        $routes->get('xml/generarCartaPortePDFDesdeVenta/(:any)', 'XmlController::generaCartaPortePDFDesdeVenta/$1');

        $routes->get('facturarCartaPorte/(:any)', 'FacturaElectronicaController::timbrarCartaPorte/$1');
        $routes->get('facturarCartaPorte/(:any)', 'FacturaElectronicaController::timbrarCartaPorte/$1');
        $routes->get('xmlenlace/getXMLEnlazadosCartaPorte/(:any)', 'XmlController::getXMLEnlazadosCartaPorte/$1');


        /**
     * Ruta para las ubicaciones
     */
    $routes->resource('ubicaciones', [
        'filter' => 'permission:ubicaciones-permission',
        'controller' => 'ubicacionesController',
        'except' => 'show'
    ]);

    $routes->post('ubicaciones/save', 'UbicacionesController::save');
    $routes->post('ubicaciones/getUbicaciones', 'UbicacionesController::getUbicaciones');
    $routes->post('ubicaciones/getColoniaSATAjax', 'UbicacionesController::getColoniasSAT');
    $routes->post('ubicaciones/getLocalidadSATAjax', 'UbicacionesController::getLocalidadSAT');
    $routes->post('ubicaciones/getPaisesSATAjax', 'UbicacionesController::getPaisesSAT');
    $routes->post('ubicaciones/getEstadosSATAjax', 'UbicacionesController::getEstadosSAT');
    $routes->post('ubicaciones/getMunicipiosSATAjax', 'UbicacionesController::getMunicipiosSAT');

    $routes->resource('remolques', [
        'filter' => 'permission:remolques-permission',
        'controller' => 'remolquesController',
        'except' => 'show'
    ]);
    $routes->post('remolques/save', 'RemolquesController::save');
    $routes->post('remolques/getRemolques', 'RemolquesController::getRemolques');
    $routes->post('remolques/getRemolquesAjax', 'RemolquesController::getRemolquesAjax');

    $routes->post('ubicaciones/getUbicacionesAjax', 'UbicacionesController::getUbicacionesAjax');

    $routes->resource('cartasPorte', [
        'filter' => 'permission:cartasPorte-permission',
        'controller' => 'CartaPorteController',
        'except' => 'show',
        'namespace' => 'julio101290\boilerplatecartaporte\Controllers'
    ]);



    $routes->get('editCartaPorte/(:any)'
        , 'CartaPorteController::editCartaPorte/$1'
        , ['namespace' => 'julio101290\boilerplatecartaporte\Controllers']
        );

    $routes->post('cartasPorte/save'
                , 'CartaPorteController::save'
                , ['namespace' => 'julio101290\boilerplatecartaporte\Controllers']
                );
    $routes->get('cartasPorte/report/(:any)'
                , 'CartaPorteController::report/$1'
                , ['namespace' => 'julio101290\boilerplatecartaporte\Controllers']
                );
    $routes->get('cartasPorte/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'
                , 'CartaPorteController::cartaPorteFilters/$1/$2/$3/$4/$5/$6'
                , ['namespace' => 'julio101290\boilerplatecartaporte\Controllers']
                );


        /**
     * Rutas para carta porte
     * 
     */
    $routes->get('nuevaCartaPorte'
                , 'CartaPorteController::newCartaPorte'
                , ['namespace' => 'julio101290\boilerplatecartaporte\Controllers']
                );

    $routes->post('cartaPorte/save'
                , 'CartaPorteController::save'
                , ['namespace' => 'julio101290\boilerplatecartaporte\Controllers']
                );
    
   $routes->post('cartaPorte/getLastCode'
                , 'CartaPorteController::getLastCode'
                , ['namespace' => 'julio101290\boilerplatecartaporte\Controllers']
                );

    
});
