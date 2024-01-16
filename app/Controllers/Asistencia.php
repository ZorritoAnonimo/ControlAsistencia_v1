<?php

namespace App\Controllers;

use App\Models\ModeloAsistencia;
use CodeIgniter\Controller;
class Asistencia extends BaseController
{
	public function __construct() {
     	  helper(['form', 'url']);
       	    	            	
    }
	public function index()
	{
		return view('Dashboard/header').view('Dashboard/aside').view('Asistencia/vAsistencia').view('Dashboard/footer');
	}
    public function doSaveAsistencia() {
        $validation = \Config\Services::validation();
        $respuesta = [];
    
        if (!$this->validate('doseveAsistencia')) {
            $respuesta['error'] = $validation->getErrors();
        } else {
            $request = \Config\Services::request();
            $v1 = $request->getPost('v_Rostro');
            $v2 = $request->getPost('v_Inicio');
            $v3 = $request->getPost('v_BreakInicio');
            $v4 = $request->getPost('v_BreakFin');
            $v5 = $request->getPost('v_Fin');
            $v6 = $request->getPost('v_Usuario');
            $reg = [$v1, $v2,$v3,$v4,$v5,$v6];
    
            // Asegúrate de que $db esté disponible antes de crear la instancia del modelo
            $modelo = new ModeloAsistencia($db);    
            if ($modelo->registrarCategoria($reg)) {
                $respuesta['error'] = '';
                $respuesta['ok'] = 'Registro correcto';
            } else {
                $respuesta['error'] = 'No se pudo registrar';
            }
        }
        // Devuelve la respuesta JSON
        return $this->response->setJSON($respuesta);
    }
    
    public function doListAsistencia() {
        $respuesta = array();
        $modelo = new ModeloAsistencia( $db );
        $respuesta[ 'datos' ] = $modelo->listarAsistencia();
        header( 'Content-Type: application/x-json; charset=utf-8' );
        echo( json_encode( $respuesta ) );

    }
}