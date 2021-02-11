<?php namespace App\Controllers;

use App\Models\AgentsModel; 
use App\Models\ReportsModel;
use App\Models\ClientModel;
use App\Models\ClientsAgentModel;
use App\Models\AccessLevelModel;
use App\Models\AccountsModel;
use App\Models\TasksModel;

class Agents extends BaseController{	

	public $modelAgents;
	public $modelAgentViewModel;
	public $modelClients;
	public $modelAddClientsToAgents;
	public $modelAccessLevel;
	public $modelAccountModel;
	public $modelTasks;
	public $reportsModel;


	public function __construct(){

		$this->modelAgents = new AgentsModel();
		$this->modelAgentViewModel = new ReportsModel();
		$this->modelClients = new ClientModel();
		$this->modelAddClientsToAgents = new ClientsAgentModel();
		$this->modelAccessLevel = new AccessLevelModel();
		$this->modelAccountModel = new AccountsModel();
		$this->modelTasks = new TasksModel();
		$this->reportsModel = new ReportsModel();

		helper('form', 'database');
	}

	function agentsDashboard(){
		$data = ([
			"title" => "Agents Dashboard",
			"users" =>$this->reportsModel->orderBy('leadGenId', 'DESC')->findAll()
		]);

		echo view('agentTemplate/header', $data);
		echo view('agents/loadAgentsDashboard');
		echo view('agentTemplate/footer');
	}


	function clientView(){

		$data = ([
			"title" => "Welcome to Agents View"
		]);

		echo view('agentTemplate/header', $data);
		echo view('agents/loadAgentsView');
		echo view('agentTemplate/footer');
	}

	function clientListView(){

		$data = ([
			"title" => "Select your Client",
			"clients" => $this->modelClients->orderby("clientsId", "ASC")->findAll()
		]);

		

		echo view('agentTemplate/header',$data);
		echo view('agents/loadClientListView');
		echo view('agentTemplate/footer');

	}


	function getClientsToAgent($id){

		$data = ([			
			"title" => "Lead Generation",
			"client" => $this->modelClients->where("clientsId", $id)->first(),
			"tasks" => $this->modelTasks->orderby("taskId", "ASC")->findAll()
		]);

		
		echo view('agentTemplate/header',$data);
		echo view('agents/loadLeadGenView');
		echo view('agentTemplate/footer');
	}

	function getLeadGenByTasksId($id){

		$data = ([
			"tasks" => $this->modelTasks->where("taskId", $id)->first(),
			"title" => "Add Lead Gen"
		]);	

		echo view('agentTemplate/header',$data);	
		echo view('agents/loadLeadGenModal');
		echo view('agentTemplate/footer');
	}


	function InserLeadGenDetails(){

		$postData = $this->request->getPost();

		$this->modelAgentViewModel->save([
			"agentId"=> 2,
			"taskId" => $postData['getTaskId'],
			"clientsId" => 6,
			"date" => $postData['date'],
			"connectionRequestSent" => $postData['connectionRequest'],
			"totalLinkedInConnections" => $postData['totalLinkedInConnections'] ,
			"clicks" => $postData['clicks']
		]);

		return redirect()->to('agentsDashboard');

		/* echo view('agentTemplate/header',$data);
		echo view('agents/loadLeadGenView');
		echo view('agentTemplate/footer'); */
	}






    
    


}