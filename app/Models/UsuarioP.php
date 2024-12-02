<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioP extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'usuario';
    protected $primaryKey       = 'idUsuario';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['idUsuario','password','tipo','email','apellido','nombre','idLocal'];

    // Dates
    protected $useTimestamps = true;
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

    public function valida($email, $password) {
        $db = db_connect();
        
        // Usar una consulta preparada para evitar inyecciones SQL
        $sql = "SELECT idUsuario, email, password, tipo FROM usuario WHERE email = ?";
        $query = $db->query($sql, [$email]);
        
        $usuario = $query->getRow(); // Obtener el primer resultado
    
        // Verificar si el usuario existe
        if ($usuario) {
            // Verificar la contraseña
            if (password_verify($password, $usuario->password)) {
                return $usuario; // Retornar el usuario si la contraseña es correcta
            }
        }
        
        return null; // Retornar null si no se encontró el usuario o la contraseña es incorrecta
    }
}
