<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cartaporte extends Migration {

    public function up() {
        // Cartaporte
        $this->forge->addField([
                'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'idEmpresa' => ['type' => 'bigint', 'constraint' => 20, 'null' => true],
                'idSucursal' => ['type' => 'bigint', 'constraint' => 20, 'null' => true],
                'idCustumer' => ['type' => 'bigint', 'constraint' => 20, 'null' => true],
                'folio' => ['type' => 'bigint', 'constraint' => 20, 'null' => true],
                'idUser' => ['type' => 'bigint', 'constraint' => 20, 'null' => true],
                'listProducts' => ['type' => 'text',  'null'  => true],
                'taxes'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => true],
                'IVARetenido'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => true],
                'ISRRetenido'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => true],
                'subTotal'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => true],
                'total'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => true],
                'balance'  => ['type' => 'decimal', 'constraint'  => 18, 'null'  => true],
                'date'  => ['type' => 'date', 'null'  => true],
                'dateVen'  => ['type' => 'date', 'null'  => true],
                'quoteTo'  => ['type' => 'varchar', 'constraint'  => 512, 'null'  => true],
                'delivaryTime'  => ['type' => 'varchar', 'constraint'  => 512, 'null'  => true],
                'generalObservations'  => ['type' => 'varchar', 'constraint'  => 512, 'null'  => true],
                'UUID'  => ['type' => 'varchar', 'constraint'  => 36, 'null'  => true],
                'idQuote'  => ['type' => 'int', 'constraint'  => 11, 'null'  => true],
                'tipoComprobanteRD'  => ['type' => 'int', 'constraint'  => 11, 'null'  => true],
                'folioCombrobanteRD'  => ['type' => 'bigint', 'constraint'  => 11, 'null'  => true],
                'RFCReceptor'  => ['type' => 'varchar', 'constraint'  => 15, 'null'  => true],
                'usoCFDI'  => ['type' => 'varchar', 'constraint'  => 32, 'null'  => true],
                'metodoPago'  => ['type' => 'varchar', 'constraint'  => 32, 'null'  => true],
                'formaPago'  => ['type' => 'varchar', 'constraint'  => 32, 'null'  => true],
                'razonSocialReceptor'  => ['type' => 'varchar', 'constraint'  => 1024, 'null'  => true],
                'codigoPostalReceptor'  => ['type' => 'varchar', 'constraint'  => 5, 'null'  => true],
                'regimenFiscalReceptor'  => ['type' => 'varchar', 'constraint'  => 1024, 'null'  => true],
                'idVehiculo'  => ['type' => 'bigint', 'constraint'  => 20, 'null'  => true],
                'idChofer'  => ['type' => 'bigint', 'constraint'  => 20, 'null'  => true],
                'tipoVehiculo'  => ['type' => 'bigint', 'constraint'  => 20, 'null'  => true],
                'idArqueoCaja'  => ['type' => 'bigint', 'constraint'  => 20, 'null'  => true],
                'TranspInternac'  => ['type' => 'varchar', 'constraint'  => 2, 'null'  => true],
                'TotalDistRec'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'IDUbicacionOrigen'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'RFCRemitenteDestinatarioOrigen'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'FechaHoraSalidaLlegadaOrigen'  => ['type' => 'datetime',  'null'  => true],
                'DistanciaRecorridaOrigen'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'LocalidadOrigen'  => ['type' => 'varchar', 'constraint'  => 8, 'null'  => true],
                'ReferenciaOrigen'  => ['type' => 'varchar', 'constraint'  => 255, 'null'  => true],
                'MunicipioOrigen'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'EstadoOrigen'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'PaisOrigen'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'CodigoPostalOrigen'  => ['type' => 'varchar', 'constraint'  => 5, 'null'  => true],
                'IDUbicacionDestino'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'RFCRemitenteDestinatarioDestino'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'FechaHoraSalidaLlegadaDestino'  => ['type' => 'datetime',  'null'  => true],
                'DistanciaRecorridaDestino'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'LocalidadDestino'  => ['type' => 'varchar', 'constraint'  => 8, 'null'  => true],
                'ReferenciaDestino'  => ['type' => 'varchar', 'constraint'  => 255, 'null'  => true],
                'MunicipioDestino'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'EstadoDestino'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'PaisDestino'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'CodigoPostalDestino'  => ['type' => 'varchar', 'constraint'  => 5, 'null'  => true],
                'PesoBrutoTotal'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'UnidadPeso'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'NumTotalMercancias'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'TipoFigura'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'RFCFigura'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'NumLicencia'  => ['type' => 'varchar', 'constraint'  => 32, 'null'  => true],
                'NombreFigura'  => ['type' => 'varchar', 'constraint'  => 256, 'null'  => true],
                'MunicipioFigura'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'EstadoFigura'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'PaisFigura'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'CodigoPostalFigura'  => ['type' => 'varchar', 'constraint'  => 5, 'null'  => true],
                'PermSCT'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'NumPermisoSCT'  => ['type' => 'varchar', 'constraint'  => 32, 'null'  => true],
                'ConfigVehicular'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'PesoBrutoVehicular'  => ['type' => 'varchar', 'constraint'  => 8, 'null'  => true],
                'PlacaVM'  => ['type' => 'varchar', 'constraint'  => 8, 'null'  => true],
                'AnioModeloVM'  => ['type' => 'varchar', 'constraint'  => 8, 'null'  => true],
                'AseguraRespCivil'  => ['type' => 'varchar', 'constraint'  => 256, 'null'  => true],
                'PolizaRespCivil'  => ['type' => 'varchar', 'constraint'  => 64, 'null'  => true],
                'SubTipoRem'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'PlacaSubTipoRemolque'  => ['type' => 'varchar', 'constraint'  => 8, 'null'  => true],
                'ColoniaOrigen'  => ['type' => 'varchar', 'constraint'  => 128, 'null'  => true],
                'CalleOrigen'  => ['type' => 'varchar', 'constraint'  => 128, 'null'  => true],
                'numInteriorOrigen'  => ['type' => 'varchar', 'constraint'  => 32, 'null'  => true],
                'coloniaDestino'  => ['type' => 'varchar', 'constraint'  => 512, 'null'  => true],
                'calleDestino'  => ['type' => 'varchar', 'constraint'  => 512, 'null'  => true],
                'numInteriorDestino'  => ['type' => 'varchar', 'constraint'  => 512, 'null'  => true],
                'nombreRazonSocialUbicacionOrigen'  => ['type' => 'varchar', 'constraint'  => 512, 'null'  => true],
                'nombreRazonSocialUbicacionDestino'  => ['type' => 'varchar', 'constraint'  => 512, 'null'  => true],
                'listMercancias'  => ['type' => 'text', 'null'  => true],
                'remolqueCartaPorte'  => ['type' => 'bigint', 'constraint'  => 20, 'null'  => true],
                'numExteriorOrigen'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'numExteriorDestino'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'apellidoFigura'  => ['type' => 'varchar', 'constraint'  => 64, 'null'  => true],
                'created_at'  => ['type' => 'datetime', 'null'  => true],
                'updated_at'  => ['type' => 'datetime', 'null'  => true],
                'deleted_at'  => ['type' => 'datetime', 'null'  => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('cartaporte', true);
    }

    public function down() {
        $this->forge->dropTable('cartaporte', true);
    }
}
