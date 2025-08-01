<?php

namespace julio101290\boilerplatecartaporte\Controllers;

use App\Controllers\BaseController;
use julio101290\boilerplateproducts\Models\ProductsModel;
use \App\Models\UserModel;
use julio101290\boilerplatelog\Models\LogModel;
use julio101290\boilerplatequotes\Models\QuotesModel;
use julio101290\boilerplatesells\Models\SellsModel;
use julio101290\boilerplatecompanies\Models\EmpresasModel;
use julio101290\boilerplatestorages\Models\StoragesModel;
use julio101290\boilerplatesells\Models\SellsDetailsModel;
use CodeIgniter\API\ResponseTrait;
use julio101290\boilerplatecustumers\Models\CustumersModel;
use julio101290\boilerplatesells\Models\PaymentsModel;
use julio101290\boilerplatecomprobanterd\Models\Comprobantes_rdModel;
use julio101290\boilerplatevehicles\Models\VehiculosModel;
use julio101290\boilerplatedrivers\Models\ChoferesModel;
use julio101290\boilerplatevehicles\Models\TipovehiculoModel;
use julio101290\boilerplatebranchoffice\Models\BranchofficesModel;
use julio101290\boilerplatecashtonnage\Models\ArqueoCajaModel;
use julio101290\boilerplateinventory\Models\SaldosModel;
use julio101290\boilerplatesells\Models\EnlacexmlModel;
use julio101290\boilerplatecartaporte\Models\CartaPorteModel;
use julio101290\boilerplatecartaporte\Models\CartaPorteDetailsModel;
use julio101290\boilerplatecartaporte\Models\MercanciascartaporteModel;
use julio101290\boilerplatelocations\Models\UbicacionesModel;
use julio101290\boilerplateremolques\Models\RemolquesModel;
use julio101290\boilerplateCFDI\Models\XmlModel;
use julio101290\boilerplateCFDI\Controllers\XmlController;

class CartaPorteController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $sells;
    protected $storages;
    protected $sellsDetail;
    protected $sucursales;
    protected $empresa;
    protected $user;
    protected $custumer;
    protected $payments;
    protected $products;
    protected $quotes;
    protected $comprobantesRD;
    protected $vehiculos;
    protected $choferes;
    protected $tiposVehiculo;
    protected $arqueoCaja;
    protected $saldos;
    protected $xmlEnlace;
    protected $cartaPorte;
    protected $cartaPorteDetails;
    protected $mercancias;
    protected $ubicaciones;
    protected $remolque;
    protected $xmlModel;
    protected $xmlController;

    public function __construct() {
        $this->log = new LogModel();

        $this->sells = new SellsModel();
        $this->sellsDetail = new SellsDetailsModel();
        $this->empresa = new EmpresasModel();
        $this->user = new UserModel();
        $this->custumer = new CustumersModel();
        $this->payments = new PaymentsModel();
        $this->products = new ProductsModel();
        $this->quotes = new QuotesModel();
        $this->comprobantesRD = new Comprobantes_rdModel();
        $this->vehiculos = new VehiculosModel();
        $this->choferes = new ChoferesModel();
        $this->tiposVehiculo = new TipovehiculoModel();
        $this->sucursales = new BranchofficesModel();
        $this->arqueoCaja = new ArqueoCajaModel();
        $this->saldos = new SaldosModel();
        $this->xmlEnlace = new EnlacexmlModel();
        $this->cartaPorte = new CartaPorteModel();
        $this->cartaPorteDetails = new CartaPorteDetailsModel;
        $this->mercancias = new MercanciascartaporteModel();
        $this->ubicaciones = new UbicacionesModel();
        $this->remolque = new RemolquesModel();
        $this->xmlModel = new XMLModel();
        $this->xmlController = new XMLController();
        
        helper('menu');
        helper('utilerias');
    }

    public function index() {

        $auth = service('authentication');
        if (!$auth->check()) {

            return redirect()->route('admin');
        }


        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        if ($this->request->isAJAX()) {


            $request = service('request');

            $draw = $request->getGet('draw');
            $start = $request->getGet('start');
            $length = $request->getGet('length');
            $search = $request->getGet('search')['value'] ?? '';
            $order = $request->getGet('order');
            $columns = $request->getGet('columns');

            $orderColumnIndex = $order[0]['column'] ?? 0;
            $orderColumn = $columns[$orderColumnIndex]['data'] ?? 'a.id';
            $orderDir = $order[0]['dir'] ?? 'asc';

            $resultado = $this->cartaPorte->mdlGetCartaPorteServerSide(
                    $empresasID,
                    $search,
                    $orderColumn,
                    $orderDir,
                    $start,
                    $length
            );

            return $this->response->setJSON([
                        'draw' => intval($draw),
                        'recordsTotal' => $resultado['total'],
                        'recordsFiltered' => $resultado['filtered'],
                        'data' => $resultado['data']
            ]);
        }


        $tiposVehiculo = $this->tiposVehiculo->mdlGetTipovehiculoArray($empresasID);

        $titulos["tiposVehiculo"] = $tiposVehiculo;
        $titulos["listaTitle"] = "Administracion de carta porte";
        $titulos["listaSubtitle"] = "Muestra la lista de carta porte";

        //$data["data"] = $datos;
        return view('julio101290\boilerplatecartaporte\Views\cartasPorte', $titulos);
    }

    public function cartaPorteFilters($desdeFecha, $hastaFecha, $todas, $empresa, $sucursal, $cliente) {


        $auth = service('authentication');
        if (!$auth->check()) {

            return redirect()->route('admin');
        }


        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        if ($this->request->isAJAX()) {


            $request = service('request');

            $draw = $request->getGet('draw');
            $start = $request->getGet('start');
            $length = $request->getGet('length');
            $search = $request->getGet('search')['value'] ?? '';

            $order = $request->getGet('order');
            $columns = $request->getGet('columns');
            $orderColumnIndex = $order[0]['column'] ?? 0;
            $orderColumn = $columns[$orderColumnIndex]['data'] ?? 'a.id';
            $orderDir = $order[0]['dir'] ?? 'asc';

            // Filtros recibidos desde el frontend
            $from = $request->getGet('from');
            $to = $request->getGet('to');
            $allSells = $request->getGet('allSells');
            $empresa = $request->getGet('empresa') ?? 0;
            $sucursal = $request->getGet('sucursal') ?? 0;
            $cliente = $request->getGet('cliente') ?? 0;

            $resultado = $this->cartaPorte->mdlGetCartaPorteFiltersServerSide(
                    $empresasID,
                    $from,
                    $to,
                    $allSells,
                    $empresa,
                    $sucursal,
                    $cliente,
                    $search,
                    $orderColumn,
                    $orderDir,
                    $start,
                    $length
            );

            return $this->response->setJSON([
                        'draw' => intval($draw),
                        'recordsTotal' => $resultado['total'],
                        'recordsFiltered' => $resultado['filtered'],
                        'data' => $resultado['data']
            ]);
        }
    }

    /**
     * 
     * @param type $desdeFecha
     * @param type $hastaFecha
     * @param type $todas
     * @return type
     * 
     * Get Report Sells per products
     */
    public function sellsReport($idEmpresa = 0
            , $idSucursal = 0
            , $idProducto = 0
            , $from = null
            , $to = null
            , $cliente = null) {


        $auth = service('authentication');
        if (!$auth->check()) {

            return redirect()->route('admin');
        }


        helper('auth');

        $idUser = user()->id;

        /**
         * Vemos las Empresa a la que tiene acceso
         */
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        /**
         * Vemos a las sucursales a las que tiene accesio
         */
        $sucursales = $this->sucursales->mdlSucursalesPorUsuario($idUser);

        if (count($sucursales) == "0") {

            $sucursalesID[0] = "0";
        } else {

            $sucursalesID = array_column($sucursales, "id");
        }


        if ($this->request->isAJAX()) {


            $datos = $this->sells->mdlVentasPorProductos($idEmpresa
                    , $idSucursal
                    , $idProducto
                    , $from
                    , $to
                    , $empresasID
                    , $sucursalesID
                    , $cliente);

            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }
    }

    public function newCartaPorte() {
        $auth = service('authentication');
        if (!$auth->check()) {

            return redirect()->route('admin');
        }

        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        $fechaActual = fechaMySQLADateHTML5(fechaHoraActual());

        $idMax = "0";

        $titulos["idMax"] = $idMax;
        $titulos["idCartaPorte"] = $idMax;
        $titulos["folio"] = "0";
        $titulos["fecha"] = $fechaActual;
        $titulos["userName"] = $userName;
        $titulos["idUser"] = $idUser;
        $titulos["contact"] = "";
        $titulos["idQuote"] = "0";
        $titulos["codeCustumer"] = "";
        $titulos["observations"] = "";
        $titulos["taxes"] = "0.00";
        $titulos["IVARetenido"] = "0.00";
        $titulos["ISRRetenido"] = "0.00";
        $titulos["subTotal"] = "0.00";
        $titulos["total"] = "0.00";
        $titulos["formaPago"] = $this->catalogosSAT->formasDePago40()->searchByField("texto", "%%", 99999);
        $titulos["usoCFDI"] = $this->catalogosSAT->usosCfdi40()->searchByField("texto", "%%", 99999);
        $titulos["metodoPago"] = $this->catalogosSAT->metodosDePago40()->searchByField("texto", "%%", 99999);
        $titulos["regimenFiscal"] = $this->catalogosSAT->regimenesFiscales40()->searchByField("texto", "%%", 99999);

        $titulos["RFCReceptor"] = "";
        $titulos["regimenFiscalReceptor"] = "";
        $titulos["usoCFDIReceptor"] = "";
        $titulos["metodoPagoReceptor"] = "";
        $titulos["formaPagoReceptor"] = "";
        $titulos["razonSocialReceptor"] = "";
        $titulos["codigoPostalReceptor"] = "";
        $titulos["TotalDistRec"] = "";

        $titulos["folioComprobanteRD"] = "0";

        //Ubicaciones Origen
        $titulos["IDUbicacionOrigen"] = "";
        $titulos["nombreRazonSocialUbicacionOrigen"] = "";
        $titulos["RFCRemitenteDestinatarioOrigen"] = "";
        $titulos["CodigoPostalOrigen"] = "";
        $titulos["PaisOrigen"] = "";
        $titulos["EstadoOrigen"] = "";
        $titulos["MunicipioOrigen"] = "";
        $titulos["LocalidadOrigen"] = "";
        $titulos["ColoniaOrigen"] = "";
        $titulos["CalleOrigen"] = "";
        $titulos["numInteriorOrigen"] = "";
        $titulos["numExteriorOrigen"] = "";
        $titulos["ReferenciaOrigen"] = "";
        $titulos["DistanciaRecorridaOrigen"] = "";
        $titulos["FechaHoraSalidaLlegadaOrigen"] = "";

        $titulos["nombrePaisOrigen"] = "";
        $titulos["nombreEstadoOrigen"] = "";
        $titulos["nombreMunicipioOrigen"] = "";
        $titulos["nombreLocalidadOrigen"] = "";
        $titulos["nombreColoniaOrigen"] = "";

        //Ubicaciones Destino
        $titulos["IDUbicacionDestino"] = "";
        $titulos["nombreRazonSocialUbicacionDestino"] = "";
        $titulos["RFCRemitenteDestinatarioDestino"] = "";
        $titulos["CodigoPostalDestino"] = "";

        $titulos["PaisDestino"] = "";
        $titulos["EstadoDestino"] = "";
        $titulos["MunicipioDestino"] = "";
        $titulos["LocalidadDestino"] = "";
        $titulos["coloniaDestino"] = "";
        $titulos["calleDestino"] = "";
        $titulos["numInteriorDestino"] = "";
        $titulos["numExteriorDestino"] = "";
        $titulos["ReferenciaDestino"] = "";
        $titulos["DistanciaRecorridaDestino"] = "";
        $titulos["FechaHoraSalidaLlegadaDestino"] = "";

        $titulos["nombrePaisDestino"] = "";
        $titulos["nombreEstadoDestino"] = "";
        $titulos["nombreMunicipioDestino"] = "";
        $titulos["nombreLocalidadDestino"] = "";
        $titulos["nombreColoniaDestino"] = "";

        $titulos["NumPermisoSCT"] = "";
        $titulos["PesoBrutoVehicular"] = "";
        $titulos["AnioModeloVM"] = "";
        $titulos["AseguraRespCivil"] = "";
        $titulos["PolizaRespCivil"] = "";
        $titulos["PlacaVM"] = "";
        $titulos["choferNombre"] = "";

        $titulos["NombreFigura"] = "";
        $titulos["ApellidoFigura"] = "";
        $titulos["RFCFigura"] = "";
        $titulos["NumLicencia"] = "";
        $titulos["CodigoPostalFigura"] = "";
        $titulos["PaisFigura"] = "";
        $titulos["EstadoFigura"] = "";
        $titulos["MunicipioFigura"] = "";
        $titulos["remolqueCartaPorteNombre"] = "";
        $titulos["PlacaSubTipoRemolque"] = "";
        $titulos["AseguraMedAmbiente"] = "";
        $titulos["PolizaMedAmbiente"] = "";

        $titulos["uuid"] = generaUUID();

        $tiposVehiculo = $this->tiposVehiculo->mdlGetTipovehiculoArray($empresasID);

        $titulos["title"] = "Nueva Carta Porte"; //lang('registerNew.title');
        $titulos["subtitle"] = "Captura de Carta Porte"; // lang('registerNew.subtitle');
        $titulos["tiposVehiculo"] = $tiposVehiculo;

        return view('julio101290\boilerplatecartaporte\Views\newCartaPorte', $titulos);
    }

    public function reportSellsProducts() {
        $auth = service('authentication');
        if (!$auth->check()) {

            return redirect()->route('admin');
        }

        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }




        $titulos["title"] = "Reporte de Ventas"; //lang('registerNew.title');
        $titulos["subtitle"] = "Ventas por Empresa, Sucursal, Producto";

        return view('reportSellsProducts', $titulos);
    }

    /**
     * Get Last Code
     */
    public function getLastCode() {

        $idEmpresa = $this->request->getPost("idEmpresa");
        $idSucursal = $this->request->getPost("idSucursal");
        $result = $this->cartaPorte->selectMax("folio")
                ->where("idEmpresa", $idEmpresa)
                ->where("idSucursal", $idSucursal)
                ->first();

        if ($result["folio"] == null) {

            $result["folio"] = 1;
        } else {

            $result["folio"] = $result["folio"] + 1;
        }

        echo json_encode($result);
    }

    /**
     * Get Last Code
     */
    public function getLastCodeInterno($idEmpresa, $idSucursal) {


        $result = $this->cartaPorte->selectMax("folio")
                ->where("idEmpresa", $idEmpresa)
                ->where("idSucursal", $idSucursal)
                ->first();

        if ($result["folio"] == null) {

            $result["folio"] = 1;
        } else {

            $result["folio"] = $result["folio"] + 1;
        }

        return $result["folio"];
    }

    /*
     * Editar Cotizacion
     */

    public function editCartaPorte($uuid) {

        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $auth = service('authentication');
        if (!$auth->check()) {

            return redirect()->route('admin');
        }


        $auth = service('authentication');
        if (!$auth->check()) {

            return redirect()->route('admin');
        }

        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        $cartaPorte = $this->cartaPorte->mdlGetCartaPorteUUID($uuid, $empresasID);

        $listProducts = json_decode($cartaPorte["listProducts"], true);
        $mercancias = json_decode($cartaPorte["listMercancias"], true);

        $usuario = $this->user->asArray()->find($cartaPorte["idUser"]);

        $titulos["idCartaPorte"] = $cartaPorte["id"];
        $titulos["folio"] = $cartaPorte["folio"];
        $titulos["nameCustumer"] = "0";
        $titulos["idEmpresa"] = $cartaPorte["idEmpresa"];
        $titulos["nombreEmpresa"] = $cartaPorte["nombreEmpresa"];

        $titulos["TotalDistRec"] = $cartaPorte["TotalDistRec"];

        $titulos["idUser"] = $cartaPorte["idUser"];
        $titulos["userName"] = $usuario["username"];
        $titulos["listProducts"] = $listProducts;
        $titulos["listaMercancias"] = $mercancias;
        $titulos["taxes"] = number_format($cartaPorte["taxes"], 2, ".");
        $titulos["IVARetenido"] = number_format($cartaPorte["IVARetenido"], 2, ".");
        $titulos["ISRRetenido"] = number_format($cartaPorte["ISRRetenido"], 2, ".");
        $titulos["subTotal"] = number_format($cartaPorte["subTotal"], 2, ".");
        $titulos["total"] = number_format($cartaPorte["total"], 2, ".");
        $titulos["fecha"] = $cartaPorte["date"];
        $titulos["dateVen"] = $cartaPorte["dateVen"];
        $titulos["quoteTo"] = $cartaPorte["quoteTo"];
        $titulos["observations"] = $cartaPorte["generalObservations"];
        $titulos["uuid"] = $cartaPorte["UUID"];
        $titulos["idQuote"] = $cartaPorte["idQuote"];
        $titulos["formaPago"] = $this->catalogosSAT->formasDePago40()->searchByField("texto", "%%", 99999);
        $titulos["usoCFDI"] = $this->catalogosSAT->usosCfdi40()->searchByField("texto", "%%", 99999);
        $titulos["metodoPago"] = $this->catalogosSAT->metodosDePago40()->searchByField("texto", "%%", 99999);
        $titulos["regimenFiscal"] = $this->catalogosSAT->regimenesFiscales40()->searchByField("texto", "%%", 99999);

        //Ubicaciones Origen
        $titulos["IDUbicacionOrigen"] = $cartaPorte["IDUbicacionOrigen"];
        $titulos["nombreRazonSocialUbicacionOrigen"] = $cartaPorte["nombreRazonSocialUbicacionOrigen"];
        $titulos["RFCRemitenteDestinatarioOrigen"] = $cartaPorte["RFCRemitenteDestinatarioOrigen"];
        $titulos["CodigoPostalOrigen"] = $cartaPorte["CodigoPostalOrigen"];
        $titulos["PaisOrigen"] = $cartaPorte["PaisOrigen"];
        $titulos["EstadoOrigen"] = $cartaPorte["EstadoOrigen"];
        $titulos["MunicipioOrigen"] = $cartaPorte["MunicipioOrigen"];
        $titulos["LocalidadOrigen"] = $cartaPorte["LocalidadOrigen"];
        $titulos["ColoniaOrigen"] = $cartaPorte["ColoniaOrigen"];
        $titulos["CalleOrigen"] = $cartaPorte["CalleOrigen"];
        $titulos["numInteriorOrigen"] = $cartaPorte["numInteriorOrigen"];
        $titulos["numExteriorOrigen"] = $cartaPorte["numExteriorOrigen"];
        $titulos["ReferenciaOrigen"] = $cartaPorte["ReferenciaOrigen"];
        $titulos["DistanciaRecorridaOrigen"] = $cartaPorte["DistanciaRecorridaOrigen"];
        $titulos["FechaHoraSalidaLlegadaOrigen"] = $cartaPorte["FechaHoraSalidaLlegadaOrigen"];

        $ubucacionesOrigen = $this->ubicaciones->select("*")->where("id", $cartaPorte["IDUbicacionOrigen"])->asArray()->first();
        //Ubicaciones Destino
        $titulos["IDUbicacionDestino"] = $cartaPorte["IDUbicacionDestino"];
        
        if ($cartaPorte["PaisOrigen"] == "" || $cartaPorte["PaisOrigen"] == null || $cartaPorte["PaisOrigen"] == 'null' || $cartaPorte["PaisOrigen"] == "0") {
       
            
            $cartaPorte["PaisOrigen"] = "MEX";
            
        }
        

        if (isset($ubucacionesOrigen["descripcion"])) {

            $titulos["nombreUbicacionOrigen"] = $ubucacionesOrigen["descripcion"];
        } else {

            $titulos["nombreUbicacionOrigen"] = "Seleccione  Ubicación Origen";
        }

        if ($cartaPorte["PaisOrigen"] != "" && $cartaPorte["PaisOrigen"] != null && $cartaPorte["PaisOrigen"] != 'null' && $cartaPorte["PaisOrigen"] != "0") {

            $datosPaises = $this->catalogosSAT->paises40()->obtain($cartaPorte["PaisOrigen"]);
            $titulos["nombrePaisOrigen"] = $datosPaises->texto();
        } else {

            $titulos["nombrePaisOrigen"] = "";
        }

        if ($cartaPorte["EstadoOrigen"] != "" && $cartaPorte["EstadoOrigen"] != null && $cartaPorte["EstadoOrigen"] != 'null' && $cartaPorte["EstadoOrigen"] != "0") {
            
            
            
            $datosEstado = $this->catalogosSAT->estados40()->obtain($cartaPorte["EstadoOrigen"],  $cartaPorte["PaisOrigen"] );
            $titulos["nombreEstadoOrigen"] = $datosEstado->texto();
        } else {

            $titulos["nombreEstadoOrigen"] = "";
        }

        if ($cartaPorte["MunicipioOrigen"] != "" && $cartaPorte["MunicipioOrigen"] != null && $cartaPorte["MunicipioOrigen"] != 'null' && $cartaPorte["MunicipioOrigen"] != "0") {

            $datosMunicipio = $this->catalogosSAT->municipios40()->obtain($cartaPorte["MunicipioOrigen"], $cartaPorte["EstadoOrigen"]);
            $titulos["nombreMunicipioOrigen"] = $datosMunicipio->texto();
        } else {

            $titulos["nombreMunicipioOrigen"] = "";
        }

        if ($cartaPorte["LocalidadOrigen"] != "" && $cartaPorte["LocalidadOrigen"] != null && $cartaPorte["LocalidadOrigen"] != 'null' && $cartaPorte["LocalidadOrigen"] != "0") {

            $datosLocalidad = $this->catalogosSAT->localidades40()->obtain($cartaPorte["LocalidadOrigen"], $cartaPorte["EstadoOrigen"]);
            $titulos["nombreLocalidadOrigen"] = $datosLocalidad->texto();
        } else {

            $titulos["nombreLocalidadOrigen"] = "";
        }

        if ($cartaPorte["ColoniaOrigen"] != "" && $cartaPorte["ColoniaOrigen"] != null && $cartaPorte["ColoniaOrigen"] != 'null' && $cartaPorte["ColoniaOrigen"] != "0") {

            $datosColonia = $this->catalogosSAT->colonias40()->obtain($cartaPorte["ColoniaOrigen"], $cartaPorte["CodigoPostalOrigen"]);
            $titulos["nombreColoniaOrigen"] = $datosColonia->asentamiento();
        } else {

            $titulos["nombreColoniaOrigen"] = "";
        }


        $ubicacionDestino = $this->ubicaciones->select("*")->where("id", $cartaPorte["IDUbicacionDestino"])->asArray()->first();
        //Ubicaciones Destino
        $titulos["IDUbicacionDestino"] = $cartaPorte["IDUbicacionDestino"];

        if (isset($ubicacionDestino["descripcion"])) {

            $titulos["IDUbicacionDestinoDescripcion"] = $ubicacionDestino["descripcion"];
        } else {

            $titulos["IDUbicacionDestinoDescripcion"] = "Seleccione  Ubicación Origen";
        }

        $titulos["nombreRazonSocialUbicacionDestino"] = $cartaPorte["nombreRazonSocialUbicacionDestino"];
        $titulos["RFCRemitenteDestinatarioDestino"] = $cartaPorte["RFCRemitenteDestinatarioDestino"];
        $titulos["CodigoPostalDestino"] = $cartaPorte["CodigoPostalDestino"];

        $titulos["PaisDestino"] = $cartaPorte["PaisDestino"];
        $titulos["EstadoDestino"] = $cartaPorte["EstadoDestino"];
        $titulos["MunicipioDestino"] = $cartaPorte["MunicipioDestino"];
        $titulos["LocalidadDestino"] = $cartaPorte["LocalidadDestino"];
        $titulos["coloniaDestino"] = $cartaPorte["coloniaDestino"];
        $titulos["calleDestino"] = $cartaPorte["calleDestino"];
        $titulos["numInteriorDestino"] = $cartaPorte["numInteriorDestino"];
        $titulos["numExteriorDestino"] = $cartaPorte["numExteriorDestino"];
        $titulos["ReferenciaDestino"] = $cartaPorte["ReferenciaDestino"];
        $titulos["DistanciaRecorridaDestino"] = $cartaPorte["DistanciaRecorridaDestino"];
        $titulos["FechaHoraSalidaLlegadaDestino"] = $cartaPorte["FechaHoraSalidaLlegadaDestino"];

        if ($cartaPorte["PaisDestino"] != "" && $cartaPorte["PaisDestino"] != null && $cartaPorte["PaisDestino"] != "null" && $cartaPorte["PaisDestino"] != "0") {


            $datosPaises = $this->catalogosSAT->paises40()->obtain($cartaPorte["PaisDestino"]);
            $titulos["nombrePaisDestino"] = $datosPaises->texto();
        } else {


            $titulos["nombrePaisDestino"] = "";
        }


        if ($cartaPorte["EstadoDestino"] != "" && $cartaPorte["EstadoDestino"] != null && $cartaPorte["EstadoDestino"] != "null" && $cartaPorte["EstadoDestino"] != "0") {

            $datosEstado = $this->catalogosSAT->estados40()->obtain($cartaPorte["EstadoDestino"], $cartaPorte["PaisDestino"]);
            $titulos["nombreEstadoDestino"] = $datosEstado->texto();
        } else {

            $titulos["nombreEstadoDestino"] = "";
        }

        if ($cartaPorte["MunicipioDestino"] != "" && $cartaPorte["MunicipioDestino"] != null && $cartaPorte["MunicipioDestino"] != "null" && $cartaPorte["MunicipioDestino"] != "0") {

            $datosMunicipio = $this->catalogosSAT->municipios40()->obtain($cartaPorte["MunicipioDestino"], $cartaPorte["EstadoDestino"]);
            $titulos["nombreMunicipioDestino"] = $datosMunicipio->texto();
        } else {

            $titulos["nombreMunicipioDestino"] = "";
        }


        if ($cartaPorte["LocalidadDestino"] != "" && $cartaPorte["LocalidadDestino"] != null && $cartaPorte["LocalidadDestino"] != "null" && $cartaPorte["LocalidadDestino"] != "0") {

            $datosLocalidad = $this->catalogosSAT->localidades40()->obtain($cartaPorte["LocalidadDestino"], $cartaPorte["EstadoDestino"]);
            $titulos["nombreLocalidadDestino"] = $datosLocalidad->texto();
        } else {

            $titulos["nombreLocalidadDestino"] = "";
        }

        if ($cartaPorte["LocalidadDestino"] != "" && $cartaPorte["LocalidadDestino"] != null && $cartaPorte["LocalidadDestino"] != "null" && $cartaPorte["LocalidadDestino"] != "0") {

            $datosColonia = $this->catalogosSAT->colonias40()->obtain($cartaPorte["coloniaDestino"], $cartaPorte["CodigoPostalDestino"]);
            $titulos["nombreColoniaDestino"] = $datosColonia->asentamiento();
        } else {

            $titulos["nombreColoniaDestino"] = "";
        }






        //Ubicaciones destino
        $titulos["RFCReceptor"] = $cartaPorte["RFCReceptor"];

        $titulos["RFCReceptor"] = $cartaPorte["RFCReceptor"];
        $titulos["regimenFiscalReceptor"] = $cartaPorte["regimenFiscalReceptor"];
        $titulos["usoCFDIReceptor"] = $cartaPorte["usoCFDI"];
        $titulos["metodoPagoReceptor"] = $cartaPorte["metodoPago"];
        $titulos["formaPagoReceptor"] = $cartaPorte["formaPago"];
        $titulos["razonSocialReceptor"] = $cartaPorte["razonSocialReceptor"];
        $titulos["codigoPostalReceptor"] = $cartaPorte["codigoPostalReceptor"];

        $titulos["idVehiculo"] = $cartaPorte["idVehiculo"];

        $datosVehiculo = $this->vehiculos->select("*")->where("id", $cartaPorte["idVehiculo"])->first();

        if (isset($datosVehiculo["placas"])) {

            $titulos["vehiculoNombre"] = $datosVehiculo["placas"];
        }

        $datosVehiculo = $this->vehiculos->select("*")->where("id", $cartaPorte["idVehiculo"])->first();

        if (isset($datosVehiculo["descripcion"])) {

            $titulos["vehiculoNombre"] = $cartaPorte["tipoVehiculo"] . " " . $datosVehiculo["placas"] . " " . $datosVehiculo["descripcion"];
        } else {

            $titulos["vehiculoNombre"] = "Seleccione Vehiculo";
        }

        $titulos["PermSCT"] = $cartaPorte["PermSCT"];
        $titulos["NumPermisoSCT"] = $cartaPorte["NumPermisoSCT"];
        $titulos["ConfigVehicular"] = $cartaPorte["ConfigVehicular"];
        $titulos["PlacaVM"] = $cartaPorte["PlacaVM"];

        $titulos["PesoBrutoVehicular"] = $cartaPorte["PesoBrutoVehicular"];
        $titulos["AnioModeloVM"] = $cartaPorte["AnioModeloVM"];
        $titulos["AseguraRespCivil"] = $cartaPorte["AseguraRespCivil"];
        $titulos["PolizaRespCivil"] = $cartaPorte["PolizaRespCivil"];

        $titulos["idChofer"] = $cartaPorte["idChofer"];
        $datosChofer = $this->choferes->select("*")->where("id", $cartaPorte["idChofer"])->first();

        if (isset($datosChofer["nombre"])) {

            $titulos["choferNombre"] = $datosChofer["nombre"] . " " . $datosChofer["Apellido"];
        } else {

            $titulos["choferNombre"] = "Seleccione Chofer";
        }



        $titulos["NombreFigura"] = $cartaPorte["NombreFigura"];
        $titulos["ApellidoFigura"] = $cartaPorte["apellidoFigura"];
        $titulos["TipoFigura"] = $cartaPorte["TipoFigura"];
        $titulos["RFCFigura"] = $cartaPorte["RFCFigura"];
        $titulos["NumLicencia"] = $cartaPorte["NumLicencia"];
        $titulos["CodigoPostalFigura"] = $cartaPorte["CodigoPostalFigura"];

        $titulos["PaisFigura"] = $cartaPorte["PaisFigura"];
        $titulos["EstadoFigura"] = $cartaPorte["EstadoFigura"];
        $titulos["MunicipioFigura"] = $cartaPorte["MunicipioFigura"];

        $titulos["AseguraMedAmbiente"] = $cartaPorte["AseguraMedAmbiente"];
        $titulos["PolizaMedAmbiente"] = $cartaPorte["PolizaMedAmbiente"];

        $titulos["PlacaSubTipoRemolque"] = $cartaPorte["PlacaSubTipoRemolque"];
        
        if ($cartaPorte["PaisFigura"] == "" || $cartaPorte["PaisFigura"] == null || $cartaPorte["PaisFigura"] == 'null' || $cartaPorte["PaisFigura"] == "0") {
            
            $cartaPorte["PaisFigura"] = "MEX"; 
            
        }

        if ($cartaPorte["PaisFigura"] != "" && $cartaPorte["PaisFigura"] != null && $cartaPorte["PaisFigura"] != 'null' && $cartaPorte["PaisFigura"] != "0") {

            $datosPaises = $this->catalogosSAT->paises40()->obtain($cartaPorte["PaisFigura"]);
            $titulos["PaisFiguraNombre"] = $datosPaises->texto();
        } else {

            $titulos["PaisFiguraNombre"] = "";
        }

        if ($cartaPorte["EstadoFigura"] != "" && $cartaPorte["EstadoFigura"] != null && $cartaPorte["EstadoFigura"] != "null" && $cartaPorte["EstadoFigura"] != "0") {

            $datosEstado = $this->catalogosSAT->estados40()->obtain($cartaPorte["EstadoFigura"], $cartaPorte["PaisFigura"]);
            $titulos["EstadoFiguraNombre"] = $datosEstado->texto();
        } else {

            $titulos["EstadoFiguraNombre"] = "";
        }

        if ($cartaPorte["MunicipioFigura"] != "" && $cartaPorte["MunicipioFigura"] != null && $cartaPorte["MunicipioFigura"] != "null" && $cartaPorte["MunicipioFigura"] != "0") {

            $datosMunicipio = $this->catalogosSAT->municipios40()->obtain($cartaPorte["MunicipioFigura"], $cartaPorte["EstadoFigura"]);
            $titulos["MunicipioFiguraNombre"] = $datosMunicipio->texto();
        } else {

            $titulos["MunicipioFiguraNombre"] = "";
        }








        $titulos["tipoVehiculo"] = $cartaPorte["tipoVehiculo"];
        $tiposVehiculo = $this->tiposVehiculo->mdlGetTipovehiculoArray($empresasID);

        $titulos["tiposVehiculo"] = $tiposVehiculo;

        $titulos["remolqueCartaPorte"] = $cartaPorte["remolqueCartaPorte"];

        $datosRemolque = $this->remolque->select("*")->where("id", $cartaPorte["remolqueCartaPorte"])->first();

        if (isset($datosRemolque["descripcion"])) {

            $titulos["remolqueCartaPorteNombre"] = $datosRemolque["descripcion"];
        } else {

            $titulos["remolqueCartaPorteNombre"] = "Seleccione Remolque";
        }


        $titulos["subTipoRemolque"] = $cartaPorte["SubTipoRem"];

        $titulos["idSucursal"] = $cartaPorte["idSucursal"];
        $sucursal = $this->sucursales->select("*")->where("id", $titulos["idSucursal"])->first();
        $titulos["nombreSucursal"] = $sucursal["key"] . " " . $sucursal["name"];

        $titulos["title"] = "Editar Venta";
        $titulos["subtitle"] = "Edición de Ventas";

        return view('julio101290\boilerplatecartaporte\Views\newCartaPorte', $titulos);
    }

    /*
     * Save or Update
     */

    public function save() {

        $auth = service('authentication');

        if (!$auth->check()) {
            $this->session->set('redirect_url', current_url());
            return redirect()->route('admin');
        }

        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $datos = $this->request->getPost();

        $this->cartaPorte->db->transBegin();

        $existsCartaPorte = $this->cartaPorte->where("UUID", $datos["UUID"])->countAllResults();

        $listProducts = json_decode($datos["listProducts"], true);

        $listMercancias = json_decode($datos["listMercancias"], true);

        $datosSucursal = $this->sucursales->find($datos["idSucursal"]);

        $datos["idArqueoCaja"] = 0;
        $datos["idCustumer"] = 0;
        $datos["tipoComprobanteRD"] = 0;
        $datos["folioComprobanteRD"] = 0;
        $datos["delivaryTime"] = "";
        $dbDriver = model('CartaPorteModel')->db->DBDriver;

        if ($dbDriver === 'Postgre') {
            $fechas = ['FechaHoraSalidaLlegadaOrigen', 'FechaHoraSalidaLlegadaDestino'];

            foreach ($fechas as $campo) {
                if (!empty($datos[$campo])) {
                    // Convierte "2025-07-25T16:32" en "2025-07-25 16:32:00"
                    $datos[$campo] = date('Y-m-d H:i:s', strtotime($datos[$campo]));
                } else {
                    $datos[$campo] = null; // Evita el error por string vacío en PostgreSQL
                }
            }
        }

        /**
         * if is new Carta Porte
         */
        if ($existsCartaPorte == 0) {


            $ultimoFolio = $this->getLastCodeInterno($datos["idEmpresa"], $datos["idSucursal"]);

            $empresa = $this->empresa->find($datos["idEmpresa"]);

            $datos["folio"] = $ultimoFolio;

            $datos["balance"] = $datos["total"] - ($datos["importPayment"] - $datos["importBack"]);

            try {


                if ($this->cartaPorte->save($datos) === false) {


                    $errores = $this->cartaPorte->errors();

                    $listErrors = "";

                    foreach ($errores as $field => $error) {

                        $listErrors .= $error . " ";
                    }

                    echo $listErrors;

                    return;
                }

                $idCartaPorteInserted = $this->cartaPorte->getInsertID();

                // save datail

                foreach ($listProducts as $key => $value) {

                    $datosDetalle["idCartaPorte"] = $idCartaPorteInserted;
                    $datosDetalle["idProduct"] = $value["idProduct"];
                    $datosDetalle["description"] = $value["description"];
                    $datosDetalle["unidad"] = $value["unidad"];
                    $datosDetalle["codeProduct"] = $value["codeProduct"];
                    $datosDetalle["cant"] = $value["cant"];
                    $datosDetalle["price"] = $value["price"];
                    $datosDetalle["porcentTax"] = $value["porcentTax"];

                    $datosDetalle["porcentIVARetenido"] = $value["porcentIVARetenido"];
                    $datosDetalle["porcentISRRetenido"] = $value["porcentISRRetenido"];
                    $datosDetalle["IVARetenido"] = $value["IVARetenido"];
                    $datosDetalle["ISRRetenido"] = $value["ISRRetenido"];

                    $datosDetalle["claveProductoSAT"] = $value["claveProductoSAT"];
                    $datosDetalle["claveUnidadSAT"] = $value["claveUnidadSAT"];

                    $datosDetalle["lote"] = $value["lote"];

                    $datosDetalle["tax"] = $value["tax"];
                    $datosDetalle["total"] = $value["total"];
                    $datosDetalle["neto"] = $value["neto"];

                    if ($this->cartaPorteDetails->save($datosDetalle) === false) {

                        $errores = $this->cartaPorteDetails->errors();

                        $listErrors = "";

                        foreach ($errores as $field => $error) {

                            $listErrors .= $error . " ";
                        }

                        echo $listErrors;

                        echo "error al insertar el producto $datosDetalle[idProduct] $errores";

                        $this->cartaPorteDetail->db->transRollback();
                        return;
                    }
                }

                /**
                 * Mercancias
                 */
                foreach ($listMercancias as $key => $value) {

                    $mecancias["idCartaPorte"] = $idCartaPorteInserted;
                    $mecancias["bienesTransp"] = $value["BienesTransp"];
                    $mecancias["descripcion"] = $value["Descripcion"];
                    $mecancias["cantidad"] = $value["Cantidad"];
                    $mecancias["claveUnidad"] = $value["ClaveUnidad"];
                    $mecancias["unidad"] = $value["Unidad"];
                    $mecancias["materialPeligroso"] = $value["MaterialPeligroso"];
                    $mecancias["pesoEnKg"] = $value["PesoEnKg"];

                    $mecancias["cantidadTransporta"] = $value["Cantidad"];
                    $mecancias["IDOrigenMercancia"] = $value["IDOrigen"];
                    $mecancias["IDDestinoMercancia"] = $value["IDDestino"];
                    $mecancias["claveMaterialPeligroso"] = $value["claveProductoSATMaterialPeligroso"];

                    if ($this->mercancias->save($mecancias) === false) {

                        $errores = $this->mercancias->errors();

                        $listErrors = "";

                        foreach ($errores as $field => $error) {

                            $listErrors .= $error . " ";
                        }

                        echo $listErrors;

                        echo "error al insertar el producto $mecancias[descripcion] $listErrors";

                        $this->mercancias->db->transRollback();
                        return;
                    }
                }



                $datosBitacora["description"] = "Se guardo la carta porte con los siguientes datos" . json_encode($datos);
                $datosBitacora["user"] = $userName;

                $this->log->save($datosBitacora);

                $this->cartaPorte->db->transCommit();
                echo "Guardado Correctamente";
            } catch (\PHPUnit\Framework\Exception $ex) {


                echo "Error al guardar " . $ex->getMessage();
            }
        } else {




            $backCartaPorte = $this->cartaPorte->where("UUID", $datos["UUID"])->first();
            $listProductsBack = json_decode($backCartaPorte["listProducts"], true);

            $datos["folio"] = $backCartaPorte["folio"];

            if ($this->cartaPorte->update($backCartaPorte["id"], $datos) == false) {

                $errores = $this->cartaPorte->errors();
                $listError = "";
                foreach ($errores as $field => $error) {

                    $listError .= $error . " ";
                }

                echo $listError;

                return;
            } else {





                $this->cartaPorteDetails->select("*")->where("idCartaPorte", $backCartaPorte["id"])->delete();
                $this->cartaPorteDetails->purgeDeleted();
                foreach ($listProducts as $key => $value) {

                    $datosDetalle["idCartaPorte"] = $backCartaPorte["id"];
                    $datosDetalle["idProduct"] = $value["idProduct"];
                    $datosDetalle["description"] = $value["description"];
                    $datosDetalle["unidad"] = $value["unidad"];
                    $datosDetalle["codeProduct"] = $value["codeProduct"];
                    $datosDetalle["cant"] = $value["cant"];
                    $datosDetalle["price"] = $value["price"];
                    $datosDetalle["porcentTax"] = $value["porcentTax"];

                    $datosDetalle["porcentIVARetenido"] = $value["porcentIVARetenido"];
                    $datosDetalle["porcentISRRetenido"] = $value["porcentISRRetenido"];
                    $datosDetalle["IVARetenido"] = $value["IVARetenido"];
                    $datosDetalle["ISRRetenido"] = $value["ISRRetenido"];

                    $datosDetalle["claveProductoSAT"] = $value["claveProductoSAT"];
                    $datosDetalle["claveUnidadSAT"] = $value["claveUnidadSAT"];
                    $datosDetalle["lote"] = $value["lote"];
                    $datosDetalle["idAlmacen"] = $value["idAlmacen"];

                    $datosDetalle["tax"] = $value["tax"];
                    $datosDetalle["total"] = $value["total"];
                    $datosDetalle["neto"] = $value["neto"];

                    if ($this->cartaPorteDetails->save($datosDetalle) === false) {

                        $errores = $this->cartaPorteDetails->errors();
                        $listError = "";

                        foreach ($errores as $field => $error) {

                            $listError .= $error . " ";
                        }

                        echo "error al insertar el producto $datosDetalle[idProduct] $errores";

                        $this->cartaPorte->db->transRollback();
                        return;
                    }
                }

                $this->mercancias->select("*")->where("idCartaPorte", $backCartaPorte["id"])->delete();
                $this->mercancias->purgeDeleted();
                /**
                 * Mercancias
                 */
                foreach ($listMercancias as $key => $value) {

                    $mecancias["idCartaPorte"] = $backCartaPorte["id"];
                    $mecancias["bienesTransp"] = $value["BienesTransp"];
                    $mecancias["descripcion"] = $value["Descripcion"];
                    $mecancias["cantidad"] = $value["Cantidad"];
                    $mecancias["claveUnidad"] = $value["ClaveUnidad"];
                    $mecancias["unidad"] = $value["Unidad"];
                    $mecancias["materialPeligroso"] = $value["MaterialPeligroso"];
                    $mecancias["pesoEnKg"] = $value["PesoEnKg"];

                    $mecancias["cantidadTransporta"] = $value["Cantidad"];
                    $mecancias["IDOrigenMercancia"] = $value["IDOrigen"];
                    $mecancias["IDDestinoMercancia"] = $value["IDDestino"];

                    if ($this->mercancias->save($mecancias) === false) {

                        $errores = $this->mercancias->errors();

                        $listErrors = "";

                        foreach ($errores as $field => $error) {

                            $listErrors .= $error . " ";
                        }

                        echo $listErrors;

                        echo "error al insertar el producto $mecancias[idProduct] $errores";

                        $this->mercancias->db->transRollback();
                        return;
                    }
                }



                $datosBitacora["description"] = "Se actualizo" . json_encode($datos) .
                        " Los datos anteriores son" . json_encode($backCartaPorte);
                $datosBitacora["user"] = $userName;
                $this->log->save($datosBitacora);

                echo "Actualizado Correctamente";
                $this->cartaPorte->db->transCommit();
                return;
            }
        }

        return;
    }

    public function delete($id) {
        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $auth = service('authentication');
        if (!$auth->check()) {

            return redirect()->route('admin');
        }


        $auth = service('authentication');
        if (!$auth->check()) {

            return redirect()->route('admin');
        }

        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }



        /**
         * 
         */
        if ($this->cartaPorte->select("*")->whereIn("idEmpresa", $empresasID)->where("id", $id)->countAllResults() == 0) {

            return $this->failNotFound('Acceso Prohibido');
        }








        $this->cartaPorte->db->transBegin();

        $infoCartaPorte = $this->cartaPorte->find($id);

        /**
         * Verificamos que no tenga enlazado XML
         */
        if ($this->xmlEnlace->select("*")->where("idDocumento", $infoSell["id"])->countAllResults() > 0) {

            $this->cartaPorte->db->transRollback();
            return $this->failNotFound('La Venta no se puede eliminar por que ya tiene timbre enlazado');
        }




        if (!$found = $this->cartaPorte->delete($id)) {
            $this->cartaPorte->db->transRollback();
            return $this->failNotFound('Error al eliminar');
        }

        //Borramos quotesdetails

        if ($this->cartaPorteDetail->select("*")->where("idCartaPorte", $id)->delete() === false) {

            $this->cartaPorteDetail->db->transRollback();
            return $this->failNotFound('Error al eliminar el detalle');
        }

        $this->cartaPorteDetail->purgeDeleted();

        $this->cartaPorte->purgeDeleted();

        $datosBitacora["description"] = 'Se elimino el Registro' . json_encode($infoCartaPorte);

        $this->log->save($datosBitacora);

        $this->cartaPorte->db->transCommit();
        return $this->respondDeleted($found, 'Eliminado Correctamente');
    }

    /*

      public function delete($id) {

      if (!$found = $this->register->delete($id)) {
      return $this->failNotFound('Error al eliminar');
      }

      $infoConsukta = $this->register->find($id);

      $this->register->purgeDeleted();

      $datosBitacora["description"] = 'Se elimino el Registro' . json_encode($infoConsukta);

      $this->log->save($datosBitacora);
      return $this->respondDeleted($found, 'Eliminado Correctamente');
      }

      /**
     * Trae en formato JSON los pacientes para el select2
     * @return type
     */

    /*
      public function traerPacientesAjax() {

      $request = service('request');
      $postData = $request->getPost();

      $response = array();

      // Read new token and assign in $response['token']
      $response['token'] = csrf_hash();

      if (!isset($postData['searchTerm'])) {
      // Fetch record
      $pacientes = new PacientesModel();
      $listaPacientes = $pacientes->select('id,nombres,apellidos')
      ->orderBy('nombres')
      ->findAll(10);
      } else {
      $searchTerm = $postData['searchTerm'];

      // Fetch record
      $pacientes = new PacientesModel();
      $listaPacientes = $pacientes->select('id,nombres,apellidos')
      ->where("deleted_at", null)
      ->like('nombres', $searchTerm)
      ->orLike('apellidos', $searchTerm)
      ->orderBy('nombres')
      ->findAll(10);
      }

      $data = array();
      foreach ($listaPacientes as $paciente) {
      $data[] = array(
      "id" => $paciente['id'],
      "text" => $paciente['nombres'] . ' ' . $paciente['apellidos'],
      );
      }

      $response['data'] = $data;

      return $this->response->setJSON($response);
      } */

    /**
     * Reporte Consulta
     */
    public function report($uuid, $isMail = 0) {

        $pdf = new PDFLayout(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $dataSells = $this->sells->where("uuid", $uuid)->first();

        $listProducts = json_decode($dataSells["listProducts"], true);

        $user = $this->user->where("id", $dataSells["idUser"])->first()->toArray();

        $custumer = $this->custumer->where("id", $dataSells["idCustumer"])->where("deleted_at", null)->first();

        $datosEmpresa = $this->empresa->select("*")->where("id", $dataSells["idEmpresa"])->first();
        $datosEmpresaObj = $this->empresa->select("*")->where("id", $dataSells["idEmpresa"])->asObject()->first();

        $pdf->nombreDocumento = "Nota De Venta";
        $pdf->direccion = $datosEmpresaObj->direccion;

        if ($datosEmpresaObj->logo == NULL || $datosEmpresaObj->logo == "") {

            $pdf->logo = ROOTPATH . "public/images/logo/default.png";
        } else {

            $pdf->logo = ROOTPATH . "public/images/logo/" . $datosEmpresaObj->logo;
        }
        $pdf->folio = str_pad($dataSells["folio"], 5, "0", STR_PAD_LEFT);

        $folioConsulta = "Folio Consulta";
        $fecha = " Fecha: ";

        // set document information
        $pdf->nombreEmpresa = $datosEmpresa["nombre"];
        $pdf->direccion = $datosEmpresa["direccion"];
        $pdf->usuario = $user["firstname"] . " " . $user["lastname"];
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor($user["username"]);
        $pdf->SetTitle('CI4JCPOS');
        $pdf->SetSubject('CI4JCPOS');
        $pdf->SetKeywords('CI4JCPOS, PDF, PHP, CodeIgniter, CESARSYSTEMS.COM.MX');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, 35, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // ---------------------------------------------------------
        // add a page
        $pdf->AddPage();

        $pdf->SetY(45);
        //ETIQUETAS
        $cliente = "Cliente: ";
        $folioRegistro = " Folio: ";
        $fecha = " Fecha:";

        $pdf->SetY(45);
        //ETIQUETAS
        $cliente = "Cliente: ";
        $folioRegistro = " Folio: ";
        $fecha = " Fecha:";

        // set font
        //$pdf->SetFont('times', '', 12);

        if ($datosEmpresa["facturacionRD"] == "on" && $dataSells["folioComprobanteRD"] > 0) {


            $comprobante = $this->comprobantesRD->find($dataSells["tipoComprobanteRD"]);
            if ($comprobante["tipoDocumento"] == "COF") {
                $tipoDocumento = "FACTURA PARA CONSUMIDOR FINAL";
            }

            if ($comprobante["tipoDocumento"] == "CF") {
                $tipoDocumento = "FACTURA PARA CREDITO FISCAL";
            }

            $comprobanteFactura = $comprobante["prefijo"] . str_pad($dataSells["folioComprobanteRD"], 10, "0", STR_PAD_LEFT);
            $fechaVencimiento = "AUTORIZADO POR DGII :" . $comprobante["hastaFecha"];
        } else {

            $tipoDocumento = "";
            $comprobanteFactura = "";
            $fechaVencimiento = "";
        }

        $bloque2 = <<<EOF

    
        <table style="font-size:10px; padding:0px 10px;">
    
             <tr>
               <td style="width: 50%; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white;">ATENCION A
               </td>
               <td style="width: 50%; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white;">OBSERVACIONES
               </td>
            </tr>
            <tr>
    
                <td >
    
    
                Cliente: $custumer[firstname] $custumer[lastname] 
    
                    <br>
                    Telefono: 000
                    <br>
                    E-Mail: $custumer[email]
                    <br>
                </td>
                <td >
                    $dataSells[generalObservations]
                    $tipoDocumento  <br>
                    $comprobanteFactura  <br>
                    $fechaVencimiento <br>
                </td>
    
    
            </tr>
    
            <tr>
    
                <td style="width: 25%; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white;">VENDEDOR
                </td>
    
                <td style="width: 24%; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white;">FECHA
                </td>
                <td style="width: 30%; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white;">FECHA DE VENCIMIENTO
                </td>
    
    
                <td style="width: 21%; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white;">VIGENCIA
                </td>
    
            </tr>
            <tr>
                    <td>
                        $user[firstname] $user[lastname]
                    </td>
                    <td>
                    $dataSells[date]
                    </td>
                    <td>
                    $dataSells[dateVen]
                    </td>
                    <td>
                    $dataSells[delivaryTime]
                    </td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid #666; background-color:white; width:640px"></td>
            </tr>
        </table>
    EOF;

        $pdf->writeHTML($bloque2, false, false, false, false, '');

        $bloque3 = <<<EOF

        <table style="font-size:10px; padding:5px 10px;">
    
            <tr>
    
            <td style="width: 100px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">Código</td>
            <td style="width: 200px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">Descripción</td>
                     <td style="width: 60px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">Cant</td>
    
            <td style="width: 80px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">Precio</td>
            <td style="width: 100px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">SubTotal</td>
            <td style="width: 100px; background-color:#2c3e50; padding: 4px 4px 4px; font-weight:bold;  color:white; text-align:center">Total</td>
    
            </tr>
    
        </table>
    
    EOF;

        $pdf->writeHTML($bloque3, false, false, false, false, '');

        $contador = 0;
        foreach ($listProducts as $key => $value) {



            if ($contador % 2 == 0) {
                $clase = 'style=" background-color:#ecf0f1; padding: 3px 4px 3px; ';
            } else {
                $clase = 'style="background-color:white; padding: 3px 4px 3px; ';
            }

            $precio = number_format($value["price"], 2, ".");
            $subTotal = number_format($value["total"], 2, ".");
            $total = number_format($value["neto"], 2, ".");
            $bloque4 = <<<EOF
    
        <table style="font-size:10px; padding:5px 10px;">
    
            <tr>
    
                <td  $clase width:100px; text-align:center">
                    $value[codeProduct]
                </td>
    
    
                <td  $clase width:200px; text-align:center">
                    $value[description]
                </td>
    
                <td $clase width:60px; text-align:center">
                    $value[cant]
                </td>
    
                <td $clase width:80px; text-align:right">
                    $precio
                </td>
    
                <td $clase width:100px; text-align:center">
                $subTotal
            </td>
    
                <td $clase width:100px; text-align:right">
                $total
                </td>
    
               
    
    
            </tr>
    
        </table>
    
    
    EOF;
            $contador++;
            $pdf->writeHTML($bloque4, false, false, false, false, '');
        }




        /**
         * TOTALES
         */
        $pdf->Setx(43);
        $subTotal = number_format($dataSells["subTotal"], 2, ".");
        $impuestos = number_format($dataSells["taxes"], 2, ".");
        $total = number_format($dataSells["total"], 2, ".");
        $IVARetenido = number_format($dataSells["IVARetenido"], 2, ".");
        $ISRRetenido = number_format($dataSells["ISRRetenido"], 2, ".");

        if ($IVARetenido > 0) {

            $bloqueIVARetenido = <<<EOF
                    <tr>
            
                    <td style="border-right: 0px solid #666; color:#333; background-color:white; width:340px; text-align:right"></td>
    
                    <td style="border: 0px solid #666; background-color:white; width:100px; text-align:right">
                    IVA Retenido:
                    </td>
    
                    <td style="border: 0px solid #666; color:#333; background-color:white; width:100px; text-align:right">
                        $IVARetenido
                    </td>
    
                </tr>
    
            EOF;
        } else {

            $bloqueIVARetenido = "";
        }


        if ($ISRRetenido > 0) {

            $bloqueISRRetenido = <<<EOF
                    <tr>
            
                    <td style="border-right: 0px solid #666; color:#333; background-color:white; width:340px; text-align:right"></td>
    
                    <td style="border: 0px solid #666; background-color:white; width:100px; text-align:right">
                    ISR Retenido:
                    </td>
    
                    <td style="border: 0px solid #666; color:#333; background-color:white; width:100px; text-align:right">
                        $ISRRetenido
                    </td>
    
                </tr>
    
            EOF;
        } else {

            $bloqueISRRetenido = "";
        }





        $bloque5 = <<<EOF

      <table style="font-size:10px; padding:5px 10px;">
  
          <tr>
  
              <td style="color:#333; background-color:white; width:340px; text-align:right"></td>
  
              <td style="border-bottom: 0px solid #666; background-color:white; width:100px; text-align:right"></td>
  
              <td style="border-bottom: 0px solid #666; color:#333; background-color:white; width:100px; text-align:right"></td>
  
          </tr>
  
          <tr>
  
              <td style="border-right: 0px solid #666; color:#333; background-color:white; width:340px; text-align:right"></td>
  
              <td style="border: 0px solid #666;  background-color:white; width:100px; text-align:right">
              Subtotal:
              </td>
  
              <td style="border: 0px solid #666; color:#333; background-color:white; width:100px; text-align:right">
                   $subTotal
              </td>
  
          </tr>
  
          <tr>
  
              <td style="border-right: 0px solid #666; color:#333; background-color:white; width:340px; text-align:right"></td>
  
              <td style="border: 0px solid #666; background-color:white; width:100px; text-align:right">
               IVA:
              </td>
  
              <td style="border: 0px solid #666; color:#333; background-color:white; width:100px; text-align:right">
                   $impuestos
              </td>
  
          </tr>
  
  
          $bloqueIVARetenido
          $bloqueISRRetenido
  
  
          <tr>
  
              <td style="border-right: 0px solid #666; color:#333; background-color:white; width:340px; text-align:right"></td>
  
              <td style="border: 0px solid #666; background-color:white; width:100px; text-align:right">
                  Total:
              </td>
  
              <td style="border: 0px solid #666; color:#333; background-color:white; width:100px; text-align:right">
                  $ $total
              </td>
  
          </tr>
  
  
      </table>
      <br>
      <div style="font-size:11pt;text-align:center;font-weight:bold">Gracias por su compra!</div>
  <br><br>
                  
          <div style="font-size:8.5pt;text-align:left;font-weight:ligth">UUID DOCUMENTO: $dataSells[UUID]</div>
          
     
      <div style="font-size:8.5pt;text-align:left;font-weight:ligth">ES RESPONSABILIDAD DEL CLIENTE REVISAR A DETALLE ESTA COTIZACION PARA SU POSTERIOR SURTIDO, UNA VEZ CONFIRMADA, NO HAY CAMBIOS NI DEVOLUCIONES.</div>
  
      
  
  
  EOF;

        $pdf->writeHTML($bloque5, false, false, false, false, 'R');

        if ($isMail == 0) {
            ob_end_clean();
            $this->response->setHeader("Content-Type", "application/pdf");
            $pdf->Output('notaVenta.pdf', 'I');
        } else {

            $attachment = $pdf->Output('notaVenta.pdf', 'S');

            return $attachment;
        }


        //============================================================+
        // END OF FILE
        //============================================================+
    }

    /**
     * Get Materiales Peligrosos
     */
    public function getMaterialesPeligrososSATAjax() {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();

        if (!isset($postData['searchTerm'])) {
            // Fetch record

            $listMaterialesPeligrososSAT = $this->catalogosSAT->materialesPeligrosos()->searchByField("texto", "%$%", 100);
            $listMaterialesPeligrososSAT2 = $this->catalogosSAT->materialesPeligrosos()->searchByField("id", "%$%", 100);
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record

            $listMaterialesPeligrososSAT = $this->catalogosSAT->materialesPeligrosos()->searchByField("texto", "%$searchTerm%", 100);
            $listMaterialesPeligrososSAT2 = $this->catalogosSAT->materialesPeligrosos()->searchByField("id", "%$searchTerm%", 100);
        }

        $data = array();
        foreach ($listMaterialesPeligrososSAT as $unidadSAT => $value) {

            $data[] = array(
                "id" => $value->id(),
                "text" => $value->id() . ' ' . $value->texto(),
            );
        }


        foreach ($listMaterialesPeligrososSAT2 as $unidadSAT => $value) {

            $data[] = array(
                "id" => $value->id(),
                "text" => $value->id() . ' ' . $value->texto(),
            );
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }
    
        public function generaCartaPortePDFDesdeVenta($uuidCartaPorte) {

        // buscamos el id de la venta

        $datosCartaPorte = $this->cartaPorte->select("*")->where("UUID", $uuidCartaPorte)->first();

        //Buscamo el uuid del xml en xml enlazados

        $enlaceXML = $this->xmlEnlace->select("*")
                        ->where("idDocumento", $datosCartaPorte["id"])
                        ->where("tipo", "tra")->first();

        $archivo = $this->xmlController->generarPDF($enlaceXML["uuidXML"], true);

        echo $archivo;
        $this->response->setHeader("Content-Type", "application/pdf");
    }
}
