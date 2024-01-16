<?php
namespace App\Models;
use CodeIgniter\Model;

class ModeloUsuario extends Model {
    
    public function listarUsuario() {
        $db = \Config\Database::connect();
        $sql = 'CALL sp_listar_usuarios()';
        $result = $db->query( $sql );
        $db->close();
        return $result->getResultArray();
    }

    public function registrarUsuario($data){
        $db = \Config\Database::connect();
        $sql = 'CALL sp_registrar_Usuarios(?,?,?,?,@s)';
        $db->query( $sql, $data);
        $res = $db->query( 'select @s as out_param' );
        $db->close();
        return   $res->getRow()->out_param;
    }    
}