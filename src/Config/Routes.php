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
        'except' => 'show'
    ]);

    $routes->get('editCartaPorte/(:any)', 'CartaPorteController::editCartaPorte/$1');

    $routes->post('cartasPorte/save', 'CartaPorteController::save');
    $routes->get('cartasPorte/report/(:any)', 'CartaPorteController::report/$1');
    $routes->get('cartasPorte/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)', 'CartaPorteController::cartaPorteFilters/$1/$2/$3/$4/$5/$6');


        /**
     * Rutas para carta porte
     * 
     */
    $routes->get('nuevaCartaPorte', 'CartaPorteController::newCartaPorte');
    $routes->post('cartaPorte/save', 'CartaPorteController::save');
    $routes->post('cartaPorte/getLastCode', 'CartaPorteController::getLastCode');


    $routes->resource('listCompPag', [
        'filter' => 'permission:listaPagos-permission',
        'controller' => 'PagosController',
        'except' => 'show',
        'namespace' => 'julio101290\boilerplatecomplementopago\Controllers',
    ]);

    $routes->get('newPago'
            , 'PagosController::newPago'
            , ['namespace' => 'julio101290\boilerplatecomplementopago\Controllers']
    );

    $routes->get('pagos/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'
            , 'PagosController::PagosFilters/$1/$2/$3/$4/$5/$6'
            , ['namespace' => 'julio101290\boilerplatecomplementopago\Controllers']
    );
    $routes->get('editPago/(:any)'
            , 'PagosController::editPago/$1'
            , ['namespace' => 'julio101290\boilerplatecomplementopago\Controllers']
    );

    $routes->get('pagos/delete/(:any)'
            , 'PagosController::delete/$1'
            , ['namespace' => 'julio101290\boilerplatecomplementopago\Controllers']
    );
    $routes->get('timbrarComplemento/(:any)'
            , 'FacturaElectronicaController::timbrarPago/$1'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
    );

    $routes->resource('pagos', [
        'filter' => 'permission:listaPagos-permission',
        'controller' => 'PagosController',
        'except' => 'show',
        'namespace' => 'julio101290\boilerplatecomplementopago\Controllers',
    ]);

    $routes->get('xmlenlace/getXMLEnlazadosPagos/(:any)'
            , 'PagosController::getXMLEnlazadosPagos/$1'
            , ['namespace' => 'julio101290\boilerplatecomplementopago\Controllers']
    );

    $routes->post('pagos/getLastCode'
            , 'PagosController::getLastCode'
            , ['namespace' => 'julio101290\boilerplatecomplementopago\Controllers']
    );

    $routes->post('sells/obtenerVentasPendientes'
            , 'PagosController::obtenerFacturasPendientes'
            , ['namespace' => 'julio101290\boilerplatecomplementopago\Controllers']
    );

    $routes->post('complementoPago/save'
            , 'PagosController::save'
            , ['namespace' => 'julio101290\boilerplatecomplementopago\Controllers']
    );
    
    
    $routes->get('xml/generarPDFDesdePago/(:any)'
            , 'XmlController::generaPDFDesdePago/$1'
             , ['namespace' => 'julio101290\boilerplateCFDI\Controllers']
            );
    
    
});
