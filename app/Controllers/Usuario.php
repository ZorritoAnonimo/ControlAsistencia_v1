<?php

namespace App\Controllers;
use CodeIgniter\Controller;
class Usuario extends BaseController{

	public function __construct() {
     	  helper(['form', 'url']);
       	    	            	
    }
	public function index(){
		return view('Dashboard/header').view('Dashboard/aside').view('Usuario/vUsuario').view('Dashboard/footer');
	}
	
}