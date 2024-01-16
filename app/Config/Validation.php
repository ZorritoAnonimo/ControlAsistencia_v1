<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

  public $doseveAsistencia = [
    'v_Rostro'        => 'required',
    'v_Inicio'        => 'required|valid_date',  // Asume que 'v_Inicio' es una fecha válida
    'v_BreakInicio'   => 'required|valid_date',
    'v_BreakFin'      => 'required|valid_date',
    'v_Fin'           => 'required|valid_date',
    'v_Usuario'       => 'required|integer',  
  ];
}
