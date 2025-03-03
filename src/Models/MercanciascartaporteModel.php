<?php

namespace julio101290\boilerplatecartaporte\Models;

use CodeIgniter\Model;

class MercanciascartaporteModel extends Model {

    protected $table = 'mercanciascartaporte';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'idCartaPorte', 'bienesTransp', 'descripcion', 'cantidad', 'claveUnidad', 'unidad', 'materialPeligroso', 'pesoEnKg', 'cantidadTransporta', 'IDOrigenMercancia', 'IDDestinoMercancia', 'created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;


}
