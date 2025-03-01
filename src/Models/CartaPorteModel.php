<?php

namespace julio101290\boilerplatecartaporte\Models;


use CodeIgniter\Model;

class CartaPorteModel extends Model {

    protected $table = 'cartaporte';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id',
        'idEmpresa',
        'folio',
        'idUser',
        'idCustumer',
        'listProducts',
        'taxes',
        'IVARetenido',
        'ISRRetenido',
        'subTotal',
        'total',
        'balance',
        'date',
        'dateVen',
        'generalObservations',
        'quoteTo',
        'delivaryTime',
        'created_at',
        'updated_at',
        'idQuote',
        'RFCReceptor',
        'usoCFDI',
        'metodoPago',
        'formaPago',
        'razonSocialReceptor',
        'codigoPostalReceptor',
        'regimenFiscalReceptor',
        'idVehiculo',
        'idChofer',
        'idSucursal',
        'idArqueoCaja',
        'tipoVehiculo',
        'TranspInternac',
        'TotalDistRec',
        'IDUbicacionOrigen',
        'RFCRemitenteDestinatarioOrigen',
        'FechaHoraSalidaLlegadaOrigen',
        'DistanciaRecorridaOrigen',
        'LocalidadOrigen',
        'ReferenciaOrigen',
        'MunicipioOrigen',
        'EstadoOrigen',
        'PaisOrigen',
        'CodigoPostalOrigen',
        'IDUbicacionDestino',
        'RFCRemitenteDestinatarioDestino',
        'FechaHoraSalidaLlegadaDestino',
        'DistanciaRecorridaDestino',
        'LocalidadDestino',
        'ReferenciaDestino',
        'MunicipioDestino',
        'EstadoDestino',
        'PaisDestino',
        'CodigoPostalDestino',
        'ColoniaOrigen',
        'CalleOrigen',
        'numInteriorOrigen',
        'coloniaDestino',
        'calleDestino',
        'PesoBrutoTotal',
        'UnidadPeso',
        'NumTotalMercancias',
        'TipoFigura',
        'RFCFigura',
        'NumLicencia',
        'NombreFigura',
        'MunicipioFigura',
        'PaisFigura',
        'CodigoPostalFigura',
        'PermSCT',
        'NumPermisoSCT',
        'ConfigVehicular',
        'PesoBrutoVehicular',
        'PlacaVM',
        'AnioModeloVM',
        'AseguraRespCivil',
        'PolizaRespCivil',
        'SubTipoRem',
        'PlacaSubTipoRemolque',
        'numInteriorOrigen',
        'numInteriorDestino',
        'numInteriorOrigen',
        'TotalDistRec',
        'EstadoFigura',
        'coloniaDestino',
        'calleDestino',
        'listMercancias',
        'nombreRazonSocialUbicacionOrigen',
        'nombreRazonSocialUbicacionDestino',
        'numExteriorOrigen',
        'numExteriorDestino',
        'apellidoFigura',
        'remolqueCartaPorte',
        'UUID'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function mdlGetCartaPorte($empresas) {

        $result = $this->db->table('cartaporte a, empresas c')
                ->select('a.UUID
                    ,a.id
                    ,a.idCustumer
                    ,a.folio
                    ,a.date
                    ,a.dateVen
                    ,a.total
                    ,a.taxes
                    ,a.subTotal
                    ,a.balance
                    ,a.delivaryTime
                    ,a.generalObservations
                    ,a.idQuote
                    ,a.IVARetenido
                    ,a.ISRRetenido
                    ,a.idSucursal

                    ,a.RFCReceptor
                    ,a.usoCFDI
                    ,a.metodoPago
                    ,a.formaPago
                    ,a.razonSocialReceptor
                    ,a.codigoPostalReceptor
                    ,a.regimenFiscalReceptor
                    
                    ,a.idVehiculo
                    ,a.idChofer
                    ,a.tipoVehiculo
                    ,a.idArqueoCaja
                    
                    ,a.TotalDistRec
                    ,a.EstadoFigura
                    ,a.ColoniaOrigen
                    ,a.CalleOrigen
                    ,a.coloniaDestino
                    ,a.numInteriorOrigen
                    ,a.calleDestino
                    ,a.numInteriorDestino
                    ,a.created_at
                    ,a.updated_at
                    ,a.listMercancias
                    ,a.nombreRazonSocialUbicacionOrigen
                    ,a.nombreRazonSocialUbicacionDestino
                    
                    ,a.numExteriorOrigen
                    ,a.numExteriorDestino
                    ,a.apellidoFigura
                    ,a.remolqueCartaPorte
                    
                    ,a.deleted_at')
                ->where('a.idEmpresa', 'c.id', FALSE)
                ->whereIn('a.idEmpresa', $empresas);

        return $result;
    }

    /**
     * Search by filters
     */
    public function mdlGetCartaPorteFilters($empresas
            , $from
            , $to
            , $allSells
            , $empresa = 0
            , $sucursal = 0
            , $cliente = 0
    ) {

        $result = $this->db->table('cartaporte a, empresas c')
                ->select('a.UUID
                    ,a.id
                    ,a.idCustumer
                    ,a.folio
                    ,a.date
                    ,a.dateVen
                    ,a.total
                    ,a.taxes
                    ,a.subTotal
                    ,a.balance
                    ,a.delivaryTime
                    ,a.generalObservations
                    ,a.idQuote
                    ,a.IVARetenido
                    ,a.ISRRetenido
                    ,a.idSucursal


                    ,a.RFCReceptor
                    ,a.usoCFDI
                    ,a.metodoPago
                    ,a.formaPago
                    ,a.razonSocialReceptor
                    ,a.codigoPostalReceptor
                    ,a.regimenFiscalReceptor
                    
                    ,a.idVehiculo
                    ,a.idChofer
                    ,a.tipoVehiculo
                    ,a.idArqueoCaja
                    
                    ,a.TranspInternac
                    ,a.TotalDistRec
                    ,a.IDUbicacionOrigen
                    ,a.RFCRemitenteDestinatarioOrigen
                    ,a.FechaHoraSalidaLlegadaOrigen
                    ,a.DistanciaRecorridaOrigen
                    ,a.LocalidadOrigen
                    ,a.ReferenciaOrigen
                    ,a.MunicipioOrigen
                    ,a.EstadoOrigen
                    ,a.PaisOrigen
                    ,a.CodigoPostalOrigen
                    ,a.IDUbicacionDestino
                    ,a.RFCRemitenteDestinatarioDestino
                    ,a.FechaHoraSalidaLlegadaDestino
                    ,a.DistanciaRecorridaDestino
                    ,a.LocalidadDestino
                    ,a.ReferenciaDestino
                    ,a.MunicipioDestino
                    ,a.EstadoDestino
                    ,a.PaisDestino
                    ,a.CodigoPostalDestino
                    ,a.PesoBrutoTotal
                    ,a.UnidadPeso
                    ,a.NumTotalMercancias
                    ,a.TipoFigura
                    ,a.RFCFigura
                    ,a.NumLicencia
                    ,a.NombreFigura
                    ,a.MunicipioFigura
                    ,a.PaisFigura
                    ,a.CodigoPostalFigura
                    ,a.PermSCT
                    ,a.NumPermisoSCT
                    ,a.ConfigVehicular
                    ,a.PesoBrutoVehicular
                    ,a.PlacaVM
                    ,a.AnioModeloVM
                    ,a.AseguraRespCivil
                    ,a.PolizaRespCivil
                    ,a.SubTipoRem
                    ,a.PlacaSubTipoRemolque
                    ,a.EstadoFigura
                    ,a.ColoniaOrigen
                    ,a.CalleOrigen
                    ,a.numInteriorOrigen
                    ,a.coloniaDestino
                    ,a.calleDestino
                    ,a.numInteriorDestino
                    ,a.listMercancias
                    ,a.nombreRazonSocialUbicacionOrigen
                    ,a.nombreRazonSocialUbicacionDestino
                    
                    ,a.numExteriorOrigen
                    ,a.numExteriorDestino
                    ,a.apellidoFigura
                    ,a.remolqueCartaPorte
                    
                    ,a.created_at
                    ,a.updated_at
                    ,a.deleted_at')
                ->where('a.idEmpresa', 'c.id', FALSE)
                ->where('a.date >=', $from . ' 00:00:00')
                ->where('a.date <=', $to . ' 23:59:59')
                ->groupStart()
                ->where('\'true\'', $allSells, true)
                ->orWhere('a.balance>', '0')
                ->groupEnd()
                ->groupStart()
                ->where('\'0\'', $empresa,true)
                ->orWhere('a.idEmpresa', $empresa)
                ->groupEnd()
                ->groupStart()
                ->where('\'0\'', $sucursal,true)
                ->orWhere('a.idSucursal', $sucursal)
                ->groupEnd()
                ->groupStart()
                ->where('\'0\'', $cliente,true)
                ->orWhere('a.idCustumer', $cliente)
                ->groupEnd()
                ->whereIn('a.idEmpresa', $empresas);

        return $result;
    }

    /**
     * Obtener Cotización por UUID
     */
    public function mdlGetCartaPorteUUID($uuid, $empresas) {

        $result = $this->db->table('cartaporte a,  empresas c')
                        ->select('a.idCustumer
            ,a.folio
            ,a.quoteTo
            ,a.UUID
            ,a.idUser
            ,a.id
            ,a.idEmpresa
            ,c.nombre as nombreEmpresa
            ,a.listProducts
            ,a.date
            ,a.dateVen
            ,a.total
            ,a.taxes
            ,a.IVARetenido
            ,a.ISRRetenido
            ,a.subTotal
            ,a.idQuote
            ,a.delivaryTime
            ,a.generalObservations

            ,a.RFCReceptor
            ,a.usoCFDI
            ,a.metodoPago
            ,a.formaPago
            ,a.razonSocialReceptor
            ,a.codigoPostalReceptor
            ,a.regimenFiscalReceptor
            ,a.idSucursal
            
            ,a.idVehiculo
            ,a.idChofer
            ,a.tipoVehiculo
            ,a.idArqueoCaja
            
            ,a.TranspInternac
            ,a.TotalDistRec
            ,a.IDUbicacionOrigen
            ,a.RFCRemitenteDestinatarioOrigen
            ,a.FechaHoraSalidaLlegadaOrigen
            ,a.DistanciaRecorridaOrigen
            ,a.LocalidadOrigen
            ,a.ReferenciaOrigen
            ,a.MunicipioOrigen
            ,a.EstadoOrigen
            ,a.PaisOrigen
            ,a.CodigoPostalOrigen
            ,a.IDUbicacionDestino
            ,a.RFCRemitenteDestinatarioDestino
            ,a.FechaHoraSalidaLlegadaDestino
            ,a.DistanciaRecorridaDestino
            ,a.LocalidadDestino
            ,a.ReferenciaDestino
            ,a.MunicipioDestino
            ,a.EstadoDestino
            ,a.PaisDestino
            ,a.CodigoPostalDestino
            ,a.PesoBrutoTotal
            ,a.UnidadPeso
            ,a.NumTotalMercancias
            ,a.TipoFigura
            ,a.RFCFigura
            ,a.NumLicencia
            ,a.NombreFigura
            ,a.MunicipioFigura
            ,a.PaisFigura
            ,a.CodigoPostalFigura
            ,a.PermSCT
            ,a.NumPermisoSCT
            ,a.ConfigVehicular
            ,a.PesoBrutoVehicular
            ,a.PlacaVM
            ,a.AnioModeloVM
            ,a.AseguraRespCivil
            ,a.PolizaRespCivil
            ,a.SubTipoRem
            ,a.PlacaSubTipoRemolque
            ,a.EstadoFigura
            ,a.ColoniaOrigen
            ,a.CalleOrigen
            ,a.numInteriorOrigen
            ,a.coloniaDestino
            ,a.calleDestino
            ,a.numInteriorDestino
            ,a.listMercancias
            ,a.nombreRazonSocialUbicacionOrigen
            ,a.nombreRazonSocialUbicacionDestino
            

            ,a.numExteriorOrigen
            ,a.numExteriorDestino
            ,a.apellidoFigura
            ,a.remolqueCartaPorte
            
            ,a.created_at
            ,a.updated_at,
            a.deleted_at')
                        ->where('a.idEmpresa', 'c.id', FALSE)
                        ->where('UUID', $uuid)
                        ->whereIn('a.idEmpresa', $empresas)
                        ->get()->getRowArray();

        return $result;
    }

    /**
     * 
     * @param type $idEmpresa
     * @param type $idSucursal
     * @param type $idProducto
     * Ventas Filtradas por Empresas, Sucursales y productos
     */
    public function mdlCartaPortePorProductos($idEmpresa = 0
            , $idSucursal = 0
            , $idProducto = 0
            , $from
            , $to
            , $idEmpresas
            , $idSucursales
            , $idCliente
    ) {



        $result = $this->db->table('cartaporte a
                                    , cartaportedetails b
                                    , empresas c
                                    , branchoffices d
                                    , custumers e
                                    ')
                ->select('a.id
                        ,a.idEmpresa
                        ,a.idSucursal
                        ,c.nombre as nombreEmpresa
                        ,d.name as nombreSucursal
                        ,e.firstname as nombreCliente
                        ,e.lastname as apellidoCliente
                        ,e.razonSocial as razonSocialCliente
                        ,a.folio
                        ,a.date
                        ,b.idProduct
                        ,b.description
                        ,b.codeProduct
                        ,b.cant
                        ,b.price
                        ,b.porcentTax
                        ,b.tax as impuestoProducto
                        ,b.total as totalProducto
                        ,a.taxes
                        ,a.subTotal
                        ,b.neto
                        ,a.TranspInternac
                        ,a.TotalDistRec
                        ,a.IDUbicacionOrigen
                        ,a.RFCRemitenteDestinatarioOrigen
                        ,a.FechaHoraSalidaLlegadaOrigen
                        ,a.DistanciaRecorridaOrigen
                        ,a.LocalidadOrigen
                        ,a.ReferenciaOrigen
                        ,a.MunicipioOrigen
                        ,a.EstadoOrigen
                        ,a.PaisOrigen
                        ,a.CodigoPostalOrigen
                        ,a.IDUbicacionDestino
                        ,a.RFCRemitenteDestinatarioDestino
                        ,a.FechaHoraSalidaLlegadaDestino
                        ,a.DistanciaRecorridaDestino
                        ,a.LocalidadDestino
                        ,a.ReferenciaDestino
                        ,a.MunicipioDestino
                        ,a.EstadoDestino
                        ,a.PaisDestino
                        ,a.CodigoPostalDestino
                        ,a.PesoBrutoTotal
                        ,a.UnidadPeso
                        ,a.NumTotalMercancias
                        ,a.TipoFigura
                        ,a.RFCFigura
                        ,a.NumLicencia
                        ,a.NombreFigura
                        ,a.MunicipioFigura
                        ,a.PaisFigura
                        ,a.CodigoPostalFigura
                        ,a.PermSCT
                        ,a.NumPermisoSCT
                        ,a.ConfigVehicular
                        ,a.PesoBrutoVehicular
                        ,a.PlacaVM
                        ,a.AnioModeloVM
                        ,a.AseguraRespCivil
                        ,a.PolizaRespCivil
                        ,a.SubTipoRem
                        ,a.PlacaSubTipoRemolque
                        ,a.EstadoFigura
                        ,a.ColoniaOrigen
                        ,a.CalleOrigen
                        ,a.numInteriorOrigen
                        ,a.coloniaDestino
                        ,a.calleDestino
                        ,a.numInteriorDestino
                        ,a.listMercancias
                        ,a.nombreRazonSocialUbicacionOrigen
                        ,a.nombreRazonSocialUbicacionDestino
                        ,a.apellidoFigura
                        
                        ,a.numExteriorOrigen
                        ,a.numExteriorDestino
                        ,a.remolqueCartaPorte
                        
                        ')
                ->where('a.id', 'b.idSell', FALSE)
                ->where('a.idEmpresa', 'c.id', FALSE)
                ->where('a.idSucursal', 'd.id', FALSE)
                ->groupStart()
                ->where('0', $idEmpresa)
                ->orWhere('a.idEmpresa', $idEmpresa)
                ->groupEnd()
                ->groupStart()
                ->where('0', $idSucursal)
                ->orWhere('a.idSucursal', $idSucursal)
                ->groupEnd()
                ->groupStart()
                ->where('0', $idCliente)
                ->orWhere('a.idCustumer', $idCliente)
                ->groupEnd()
                ->groupStart()
                ->where('0', $idProducto)
                ->orWhere('b.idProduct', $idProducto)
                ->groupEnd()
                ->where('a.date >=', $from . ' 00:00:00')
                ->where('a.date <=', $to . ' 23:59:59')
                ->whereIn('a.idEmpresa', $idEmpresas)
                ->whereIn('a.idSucursal', $idSucursales)
                ->where('a.idCustumer', 'e.id', false);

        return $result;
    }
}
