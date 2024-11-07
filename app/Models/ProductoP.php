<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoP extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'producto';
    protected $primaryKey       = 'idProducto';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = ['idProducto','nombre','peso','descripción','precio','imagen','idDisponible'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getProducto(){
        $db = db_connect();

        $sql= "select producto.*, Disponibilidad.disponible
                from producto,Disponibilidad 
                where producto.idDisponible = disponibilidad.idDisponible 
        ";
        $query= $db->query($sql);

       
        return $query->getResult();

    }
}
