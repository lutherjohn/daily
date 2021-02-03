<?php namespace App\Controllers;

use App\Models\AgentsModel; 
use App\Models\ReportsModel;
use App\Models\ClientModel;
use App\Models\ClientsAgentModel;
use App\Models\AccessLevelModel;
use App\Models\AccountsModel;



class Agents extends BaseController{	

	public $modelAgents;
	public $modelAgentViewModel;
	public $modelClient;
	public $modelAddClientsToAgents;
	public $accessLevel;
	public $accountModel;


	public function __construct(){

		$this->modelAgents = new AgentsModel();
		$this->modelAgentViewModel = new ReportsModel();
		$this->modelClientModel = new ClientModel();
		$this->modelAddClientsToAgents = new ClientsAgentModel();
		$this->accessLevel = new AccessLevelModel();
		$this->accountModel = new AccountsModel();

		helper('form', 'database');
	}

    
    


}