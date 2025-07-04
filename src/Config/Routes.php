<?php

$routes->group('admin', function ($routes) {


    $routes->get('xml/generarCartaPortePDFDesdeVenta/(:any)', 'XmlController::generaCartaPortePDFDesdeVenta/$1');

    $routes->get('facturarCartaPorte/(:any)'
            , 'FacturaElectronicaController::timbrarCartaPorte/$1'
            , ['namespace' => 'julio101290\boilerplatesells\Controllers']
            );
    $routes->get('facturarCartaPorte/(:any)', 'FacturaElectronicaController::timbrarCartaPorte/$1');
    $routes->get('xmlenlace/getXMLEnlazadosCartaPorte/(:any)', 'XmlController::getXMLEnlazadosCartaPorte/$1');


    $routes->resource('remolques', [
        'filter' => 'permission:remolques-permission',
        'controller' => 'remolquesController',
        'except' => 'show'
    ]);
    $routes->post('remolques/save', 'RemolquesController::save');
    $routes->post('remolques/getRemolques', 'RemolquesController::getRemolques');
    $routes->post('remolques/getRemolquesAjax', 'RemolquesController::getRemolquesAjax');

    
    $routes->resource('cartasPorte', [
        'filter' => 'permission:cartasporte-permission',
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

    $routes->post('cartaPorte/getMaterialPeligrosoSATAjax'
            , 'CartaPorteController::getMaterialesPeligrososSATAjax'
            , ['namespace' => 'julio101290\boilerplatecartaporte\Controllers']
    );
});
