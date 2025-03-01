<?php
namespace julio101290\boilerplatecartaporte\Models;

use CodeIgniter\Model;
class CartaPorteDetailsModel extends Model{
    protected $table      = 'cartaportedetails';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id'
                                ,'idCartaPorte'
                                ,'idProduct'
                                ,'description'
                                ,'lote'
                                ,'claveProductoSAT'
                                ,'claveUnidadSAT'
                                ,'unidad'
                                ,'codeProduct'
                                ,'cant'
                                ,'price'
                                ,'porcentTax'
                                ,'tax'
                                ,'porcentIVARetenido'
                                ,'IVARetenido'
                                ,'porcentISRRetenido'
                                ,'ISRRetenido'                            
                                ,'neto'
                                ,'total'
                                ,'created_at'
                                ,'updated_at'
                                ,'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    =  [
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
        