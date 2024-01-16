<?php
namespace App\Models;
use CodeIgniter\Model;
class ModeloAsistencia extends Model {

    public function listarAsistencia() {
        $db = \Config\Database::connect();
        $sql = 'CALL sp_listar_Asistencia()';
        $result = $db->query( $sql );
        $db->close();
        return $result->getResultArray();
    }

    public function registrarAsistencia($data) {
        $db = \Config\Database::connect();
        $sql = 'CALL sp_registrar_Asistencia(?,?,?,?,?,?,@s)';
        $db->query( $sql, $data );
        $res = $db->query( 'select @s as out_param' );
        $db->close();
        return   $res->getRow()->out_param;
    }
}