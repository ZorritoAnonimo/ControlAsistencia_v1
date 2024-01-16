<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Horario extends BaseController
{
    public function index()
    {
        return view('horario/index');
    }

    public function registrar()
    {
        $validation = \Config\Services::validation();

        if ($this->request->getMethod() === 'post') {
            // Define reglas de validación para los campos de tiempo
            $validation->setRules([
                'lunes_inicio' => 'required',
                'lunes_fin' => 'required',
                'martes_inicio' => 'required',
                'martes_fin' => 'required',
                'miercoles_inicio' => 'required',
                'miercoles_fin' => 'required',
                'jueves_inicio' => 'required',
                'jueves_fin' => 'required',
                'viernes_inicio' => 'required',
                'viernes_fin' => 'required',
                'sabado_inicio' => 'required',
                'sabado_fin' => 'required',
                
            ]);

            if ($validation->withRequest($this->request)->run()) {
                // Procesa los datos si la validación es exitosa
                $lunes_inicio = $this->request->getPost('lunes_inicio');
                $lunes_fin = $this->request->getPost('lunes_fin');
                $martes_inicio = $this->request->getPost('martes_inicio');
                $martes_fin = $this->request->getPost('martes_fin');
                $miercoles_inicio = $this->request->getPost('miercoles_inicio');
                $miercoles_fin = $this->request->getPost('miercoles_fin');
                $jueves_inicio = $this->request->getPost('jueves_inicio');
                $jueves_fin = $this->request->getPost('jueves_fin');
                $viernes_inicio = $this->request->getPost('viernes_inicio');
                $viernes_fin = $this->request->getPost('viernes_fin');
                $sabado_inicio = $this->request->getPost('sabado_inicio');
                $sabado_fin = $this->request->getPost('sabado_fin');

                $data = [
                    'lunes_inicio' => $lunes_inicio,
                    'lunes_fin' => $lunes_fin,
                    'martes_inicio' => $martes_inicio,
                    'martes_fin' => $martes_fin,
                    'miercoles_inicio' => $miercoles_inicio,
                    'miercoles_fin' => $miercoles_fin,
                    'jueves_inicio' => $jueves_inicio,
                    'jueves_fin' => $jueves_fin,
                    'viernes_inicio' => $viernes_inicio,
                    'viernes_fin' => $viernes_fin,
                    'sabado_inicio' => $sabado_inicio,
                    'sabado_fin' => $sabado_fin,
                    
                ];
    
                $db->table('horario')->insert($data);

                

                return view('horario/vHorario', ['success' => 'Horario registrado correctamente']);
            }
        }

        return view('horario/vHorario');
    }
}

