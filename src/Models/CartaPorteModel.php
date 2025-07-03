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
        'idEmpresa',
        'idSucursal',
        'idCustumer',
        'folio',
        'idUser',
        'listProducts',
        'taxes',
        'IVARetenido',
        'ISRRetenido',
        'subTotal',
        'total',
        'balance',
        'date',
        'dateVen',
        'quoteTo',
        'delivaryTime',
        'generalObservations',
        'UUID',
        'idQuote',
        'tipoComprobanteRD',
        'folioCombrobanteRD',
        'RFCReceptor',
        'usoCFDI',
        'metodoPago',
        'formaPago',
        'razonSocialReceptor',
        'codigoPostalReceptor',
        'regimenFiscalReceptor',
        'idVehiculo',
        'idChofer',
        'tipoVehiculo',
        'idArqueoCaja',
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
        'PesoBrutoTotal',
        'UnidadPeso',
        'NumTotalMercancias',
        'TipoFigura',
        'RFCFigura',
        'NumLicencia',
        'NombreFigura',
        'MunicipioFigura',
        'EstadoFigura',
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
        'ColoniaOrigen',
        'CalleOrigen',
        'numInteriorOrigen',
        'coloniaDestino',
        'calleDestino',
        'numInteriorDestino',
        'nombreRazonSocialUbicacionOrigen',
        'nombreRazonSocialUbicacionDestino',
        'listMercancias',
        'remolqueCartaPorte',
        'numExteriorOrigen',
        'numExteriorDestino',
        'apellidoFigura',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
        'idEmpresa' => 'required|is_natural_no_zero',
        'idSucursal' => 'permit_empty|is_natural_no_zero',
        'idCustumer' => 'permit_empty|is_natural',
        'folio' => 'required|is_natural',
        'idUser' => 'required|is_natural_no_zero',
        'listProducts' => 'permit_empty|string',
        'taxes' => 'permit_empty|decimal',
        'IVARetenido' => 'permit_empty|decimal',
        'ISRRetenido' => 'permit_empty|decimal',
        'subTotal' => 'permit_empty|decimal',
        'total' => 'permit_empty|decimal',
        'balance' => 'permit_empty|decimal',
        'date' => 'required|valid_date[Y-m-d]',
        'dateVen' => 'permit_empty|valid_date[Y-m-d]',
        'UUID' => 'required|exact_length[36]',
        'idQuote' => 'permit_empty|is_natural',
        'delivaryTime' => 'permit_empty|string',
        'quoteTo' => 'permit_empty|string|max_length[512]',
        'generalObservations' => 'permit_empty|string|max_length[512]',
        'RFCReceptor' => 'permit_empty|alpha_numeric|max_length[15]',
        'usoCFDI' => 'permit_empty|string|max_length[32]',
        'metodoPago' => 'permit_empty|string|max_length[32]',
        'formaPago' => 'permit_empty|string|max_length[32]',
        'razonSocialReceptor' => 'permit_empty|string|max_length[1024]',
        'codigoPostalReceptor' => 'permit_empty|exact_length[5]|numeric',
        'regimenFiscalReceptor' => 'permit_empty|string|max_length[1024]',
        'idVehiculo' => 'permit_empty|is_natural',
        'idChofer' => 'permit_empty|is_natural',
        'tipoVehiculo' => 'permit_empty|is_natural',
        'idArqueoCaja' => 'permit_empty|is_natural',
        'TranspInternac' => 'permit_empty|in_list[No,Si]',
        'TotalDistRec' => 'permit_empty|numeric',
        'IDUbicacionOrigen' => 'permit_empty|string|max_length[16]',
        'IDUbicacionDestino' => 'permit_empty|string|max_length[16]',
        'PaisOrigen' => 'permit_empty|alpha|max_length[3]',
        'PaisDestino' => 'permit_empty|alpha|max_length[3]',
        'CodigoPostalOrigen' => 'permit_empty|exact_length[5]|numeric',
        'CodigoPostalDestino' => 'permit_empty|exact_length[5]|numeric',
        'PermSCT' => 'permit_empty|string|max_length[16]',
        'NumPermisoSCT' => 'permit_empty|string|max_length[32]',
        'ConfigVehicular' => 'permit_empty|string|max_length[16]',
        'PlacaVM' => 'permit_empty|string|max_length[8]',
        'AnioModeloVM' => 'permit_empty|numeric|max_length[8]',
        'RFCFigura' => 'permit_empty|string|max_length[16]',
        'NombreFigura' => 'permit_empty|string|max_length[256]',
        'apellidoFigura' => 'permit_empty|string|max_length[64]',
        'NumLicencia' => 'permit_empty|string|max_length[32]',
        'remolqueCartaPorte' => 'permit_empty|is_natural',
        'listMercancias' => 'permit_empty|string',
        'date' => 'permit_empty|valid_date[Y-m-d]',
        'dateVen' => 'permit_empty|valid_date[Y-m-d]',
        'FechaHoraSalidaLlegadaOrigen' => 'permit_empty|valid_date[Y-m-d H:i:s]',
        'FechaHoraSalidaLlegadaDestino' => 'permit_empty|valid_date[Y-m-d H:i:s]',
    ];
    protected $validationMessages = [
        'idEmpresa' => [
            'required' => 'La empresa es obligatoria.',
            'is_natural_no_zero' => 'La empresa seleccionada no es válida.'
        ],
        'folio' => [
            'required' => 'El folio es obligatorio.',
            'is_natural' => 'El folio debe ser un número positivo.'
        ],
        'idUser' => [
            'required' => 'El usuario que genera la carta porte es obligatorio.',
            'is_natural_no_zero' => 'El ID de usuario debe ser válido.'
        ],
        'date' => [
            'required' => 'La fecha de emisión es obligatoria.',
            'valid_date' => 'La fecha no tiene un formato válido (Y-m-d).'
        ],
        'UUID' => [
            'required' => 'El UUID es obligatorio.',
            'exact_length' => 'El UUID debe tener exactamente 36 caracteres.'
        ],
        'taxes' => [
            'decimal' => 'Los impuestos deben ser un número decimal.'
        ],
        'subTotal' => [
            'decimal' => 'El subtotal debe ser un número decimal.'
        ],
        'total' => [
            'decimal' => 'El total debe ser un número decimal.'
        ],
        'balance' => [
            'decimal' => 'El saldo debe ser un número decimal.'
        ],
        'codigoPostalReceptor' => [
            'exact_length' => 'El código postal del receptor debe tener 5 dígitos.',
            'numeric' => 'El código postal del receptor solo debe contener números.'
        ],
        'codigoPostalOrigen' => [
            'exact_length' => 'El código postal de origen debe tener 5 dígitos.',
            'numeric' => 'El código postal de origen debe ser numérico.'
        ],
        'codigoPostalDestino' => [
            'exact_length' => 'El código postal de destino debe tener 5 dígitos.',
            'numeric' => 'El código postal de destino debe ser numérico.'
        ],
        'usoCFDI' => [
            'max_length' => 'El uso de CFDI no debe superar los 32 caracteres.'
        ],
        'metodoPago' => [
            'max_length' => 'El método de pago no debe superar los 32 caracteres.'
        ],
        'formaPago' => [
            'max_length' => 'La forma de pago no debe superar los 32 caracteres.'
        ],
    ];
    protected $skipValidation = false;

    public function mdlGetCartaPorteServerSide($empresasID, $searchValue, $orderColumn, $orderDir, $start, $length) {
        $builder = $this->db->table('cartaporte a')
                ->select('
            a.UUID, a.id, a.idCustumer, a.folio, a.date, a.dateVen, a.total, a.taxes,
            a.subTotal, a.balance, a.delivaryTime, a.generalObservations, a.idQuote,
            a.IVARetenido, a.ISRRetenido, a.idSucursal, a.RFCReceptor, a.usoCFDI,
            a.metodoPago, a.formaPago, a.razonSocialReceptor, a.codigoPostalReceptor,
            a.regimenFiscalReceptor, a.idVehiculo, a.idChofer, a.tipoVehiculo,
            a.idArqueoCaja, a.TotalDistRec, a.EstadoFigura, a.ColoniaOrigen, a.CalleOrigen,
            a.coloniaDestino, a.numInteriorOrigen, a.calleDestino, a.numInteriorDestino,
            a.created_at, a.updated_at, a.listMercancias, a.nombreRazonSocialUbicacionOrigen,
            a.nombreRazonSocialUbicacionDestino, a.numExteriorOrigen, a.numExteriorDestino,
            a.apellidoFigura, a.remolqueCartaPorte, a.AseguraMedAmbiente, a.PolizaMedAmbiente,
            a.deleted_at,
            c.nombre AS nombreEmpresa
        ')
                ->join('empresas c', 'a.idEmpresa = c.id')
                ->whereIn('a.idEmpresa', $empresasID);

        // Total sin filtros
        $total = $builder->countAllResults(false);

        // Filtro de búsqueda
        if ($searchValue) {
            $builder->groupStart()
                    ->like('a.folio', $searchValue)
                    ->orLike('a.UUID', $searchValue)
                    ->orLike('a.razonSocialReceptor', $searchValue)
                    ->orLike('c.nombre', $searchValue)
                    ->groupEnd();
        }

        // Total con filtros
        $filtered = $builder->countAllResults(false);

        // Orden
        if ($orderColumn && $orderDir) {
            $builder->orderBy($orderColumn, $orderDir);
        }

        // Paginación
        $builder->limit($length, $start);

        // Datos
        $data = $builder->get()->getResultArray();

        return [
            'total' => $total,
            'filtered' => $filtered,
            'data' => $data
        ];
    }

    /**
     * Search by filters
     */
    public function mdlGetCartaPorteFiltersServerSide(
            $empresas = null,
            $from = null,
            $to = null,
            $allSells = null,
            $empresa = 0,
            $sucursal = 0,
            $cliente = 0,
            $searchValue = '',
            $orderColumn = 'a.id',
            $orderDir = 'asc',
            $start = 0,
            $length = 10
    ) {
        $builder = $this->db->table('cartaporte a')
                ->select('
            a.UUID, a.id, a.folio, a.total, a.balance, a.date, a.razonSocialReceptor,a.dateVen, a.subTotal, a.taxes,
            a.delivaryTime,a.created_at, a.updated_at, a.deleted_at,
            c.nombre AS nombreEmpresa
        ')
                ->join('empresas c', 'a.idEmpresa = c.id')
                ->whereIn('a.idEmpresa', $empresas);

        if ($from && $to) {
            $builder->where('a.date >=', $from . ' 00:00:00')
                    ->where('a.date <=', $to . ' 23:59:59');
        }

        // Filtro de saldo
        $builder->groupStart();
        if ($allSells !== 'true') {
            $builder->where('a.balance >', 0);
        }
        $builder->groupEnd();

        // Filtro por empresa
        if ($empresa != 0) {
            $builder->where('a.idEmpresa', $empresa);
        }

        // Filtro por sucursal
        if ($sucursal != 0) {
            $builder->where('a.idSucursal', $sucursal);
        }

        // Filtro por cliente
        if ($cliente != 0) {
            $builder->where('a.idCustumer', $cliente);
        }

        // Total sin filtros de búsqueda
        $total = $builder->countAllResults(false);

        // Filtro de búsqueda global
        if ($searchValue) {
            $builder->groupStart()
                    ->like('a.folio', $searchValue)
                    ->orLike('a.UUID', $searchValue)
                    ->orLike('a.razonSocialReceptor', $searchValue)
                    ->orLike('c.nombre', $searchValue)
                    ->groupEnd();
        }

        // Total con búsqueda
        $filtered = $builder->countAllResults(false);

        // Orden y paginación
        $builder->orderBy($orderColumn, $orderDir)
                ->limit($length, $start);

        $data = $builder->get()->getResultArray();

        return [
            'total' => $total,
            'filtered' => $filtered,
            'data' => $data
        ];
    }

    /**
     * Obtener Cotización por UUID
     */
    public function mdlGetCartaPorteUUID($uuid, $empresas) {

        $result = $this->db->table('cartaporte a')
                ->select('
        a.idCustumer,
        a.folio,
        a.quoteTo,
        a.UUID,
        a.idUser,
        a.id,
        a.idEmpresa,
        c.nombre AS nombreEmpresa,
        a.listProducts,
        a.date,
        a.dateVen,
        a.total,
        a.taxes,
        a.IVARetenido,
        a.ISRRetenido,
        a.subTotal,
        a.idQuote,
        a.delivaryTime,
        a.generalObservations,
        a.RFCReceptor,
        a.usoCFDI,
        a.metodoPago,
        a.formaPago,
        a.razonSocialReceptor,
        a.codigoPostalReceptor,
        a.regimenFiscalReceptor,
        a.idSucursal,
        a.idVehiculo,
        a.idChofer,
        a.tipoVehiculo,
        a.idArqueoCaja,
        a.TranspInternac,
        a.TotalDistRec,
        a.IDUbicacionOrigen,
        a.RFCRemitenteDestinatarioOrigen,
        a.FechaHoraSalidaLlegadaOrigen,
        a.DistanciaRecorridaOrigen,
        a.LocalidadOrigen,
        a.ReferenciaOrigen,
        a.MunicipioOrigen,
        a.EstadoOrigen,
        a.PaisOrigen,
        a.CodigoPostalOrigen,
        a.IDUbicacionDestino,
        a.RFCRemitenteDestinatarioDestino,
        a.FechaHoraSalidaLlegadaDestino,
        a.DistanciaRecorridaDestino,
        a.LocalidadDestino,
        a.ReferenciaDestino,
        a.MunicipioDestino,
        a.EstadoDestino,
        a.PaisDestino,
        a.CodigoPostalDestino,
        a.PesoBrutoTotal,
        a.UnidadPeso,
        a.NumTotalMercancias,
        a.TipoFigura,
        a.RFCFigura,
        a.NumLicencia,
        a.NombreFigura,
        a.MunicipioFigura,
        a.PaisFigura,
        a.CodigoPostalFigura,
        a.PermSCT,
        a.NumPermisoSCT,
        a.ConfigVehicular,
        a.PesoBrutoVehicular,
        a.PlacaVM,
        a.AnioModeloVM,
        a.AseguraRespCivil,
        a.PolizaRespCivil,
        a.SubTipoRem,
        a.PlacaSubTipoRemolque,
        a.EstadoFigura,
        a.ColoniaOrigen,
        a.CalleOrigen,
        a.numInteriorOrigen,
        a.coloniaDestino,
        a.calleDestino,
        a.numInteriorDestino,
        a.listMercancias,
        a.nombreRazonSocialUbicacionOrigen,
        a.nombreRazonSocialUbicacionDestino,
        a.numExteriorOrigen,
        a.numExteriorDestino,
        a.apellidoFigura,
        a.remolqueCartaPorte,
        a.AseguraMedAmbiente,
        a.PolizaMedAmbiente,
        a.created_at,
        a.updated_at,
        a.deleted_at
    ')
                ->join('empresas c', 'a.idEmpresa = c.id')
                ->where('a.UUID', $uuid)
                ->whereIn('a.idEmpresa', $empresas)
                ->get()
                ->getRowArray();

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
            , $from = null
            , $to = null
            , $idEmpresas = null
            , $idSucursales = null
            , $idCliente = null
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
