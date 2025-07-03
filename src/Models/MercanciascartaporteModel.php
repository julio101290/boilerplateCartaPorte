<?php

namespace julio101290\boilerplatecartaporte\Models;

use CodeIgniter\Model;

class MercanciascartaporteModel extends Model {

    protected $table = 'mercanciascartaporte';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id'
        , 'idCartaPorte'
        , 'bienesTransp'
        , 'descripcion'
        , 'cantidad'
        , 'claveUnidad'
        , 'unidad'
        , 'materialPeligroso'
        , 'pesoEnKg'
        , 'cantidadTransporta'
        , 'IDOrigenMercancia'
        , 'IDDestinoMercancia'
        , 'claveMaterialPeligroso'
        , 'created_at'
        , 'updated_at'
        , 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
        'idCartaPorte' => 'permit_empty|is_natural_no_zero',
        'bienesTransp' => 'permit_empty|string|max_length[16]',
        'descripcion' => 'permit_empty|string|max_length[256]',
        'cantidad' => 'decimal',
        'clav eUnidad' => 'permit_empty|string|max_length[8]',
        'unidad' => 'permit_empty|string|max_length[16]',
        'materialPeligroso' => 'permit_empty|in_list[Sí,No,S,N]|max_length[2]',
        'pesoEnKg' => 'decimal',
        'cantidadTransporta' => 'decimal',
        'IDOrigenMercancia' => 'permit_empty|string|max_length[16]',
        'IDDestinoMercancia' => 'permit_empty|string|max_length[16]',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
