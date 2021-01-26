<?php namespace App\Controllers;

ini_set('max_execution_time', 0); 
ini_set('memory_limit','2048M');


use App\Models\AgentsModel; 
use App\Models\ClientModel;


class Pages extends BaseController
{

	public $agentsModel;
	public $clientsModel;


	public function __construct(){

		$this->agentsModel = new AgentsModel();

		$this->clientsModel = new ClientModel();

	}


	public function index()
	{
		$viewAgents = new AgentsModel();

		//$data['agents'] = $viewAgents->orderBy('userId', 'ASC')->findAll();

		$data = ([
			'agents' => $this->agentsModel->countAll(),
			'clients' => $this->clientsModel->countAll()
		]);


		echo view('templates/header', $data);
		echo view('pages/dashboard');
		echo view('templates/footer');


		
    }
    
    function showme($page ='dashboard'){

		echo view('templates/header');
		echo view('pages/' .$page);
		echo view('templates/footer');

	}

	//--------------------------------------------------------------------

}