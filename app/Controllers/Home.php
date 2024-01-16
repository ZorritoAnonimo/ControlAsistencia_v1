<?php

namespace App\Controllers;
use CodeIgniter\Controller;
class Home extends BaseController{
	public function __construct() {
     	  helper(['form', 'url']);
       	    	            	
    }
	public function index()
	{
		return view('Dashboard/body');
	}

}