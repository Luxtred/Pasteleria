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
    protected $allowedFields    = ['idProducto','nombre','peso','descripción','precio','idDisponible','cantidad','idLocal','temporada','idCategoria','vista','idImagen'];

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

    public function incrementarVistasProducto($idProducto) {
        $db = db_connect();
        $sql = "UPDATE producto SET vistas = vistas + 1 WHERE idProducto = ?";
        $query = $db->query($sql, [$idProducto]);
    }

    public function getProductosMasVistos() {
        $db = db_connect();
        $sql = "SELECT * FROM producto ORDER BY vistas DESC LIMIT 10";
        $query = $db->query($sql);
        return $query->getResult();
    }
    
    public function getImagenProducto(){
        $db = db_connect();

        $sql= "select producto.*, imagen.*
                from producto, imagen 
                where producto.idImagen = imagen.idImagen 
        ";
        $query= $db->query($sql);

       
        return $query->getResult();

    }

    public function getImagenProducto1($idProducto)
{
    return $this->select('producto.*, imagen.nombreArchivo, imagen.idImagen')
                ->join('imagen', 'imagen.idImagen = producto.idImagen', 'left')
                ->where('producto.idProducto', $idProducto)
                ->first();
}
    
public function getPompom()
{
          // Asegúrate de tener una consulta que obtenga los productos correctamente
    return $this->builder('producto')
    ->select('producto.idProducto, producto.nombre, producto.precio, imagen.idImagen, imagen.nombreArchivo')
    ->join('imagen', 'producto.idImagen = imagen.idImagen', 'left')
    ->get()
    ->getResult();
}
}

