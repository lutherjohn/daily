<?php namespace App\Controllers;

use App\Models\AgentsModel; 
use App\Models\ReportsModel;
use App\Models\ClientModel;
use App\Models\ClientsAgentModel;
use App\Models\AccessLevelModel;
use App\Models\AccountsModel;
use App\Models\TasksModel;
use App\Models\AssignLeadGenModel;

class Agents extends BaseController{	

	public $modelAgents;
	public $modelAgentViewModel;
	public $modelClients;
	public $modelAddClientsToAgents;
	public $modelAccessLevel;
	public $modelAccountModel;
	public $modelTasks;
	public $reportsModel;
	public $sessionEmail;
	public $modelAssignLeadGen;
	public $db;


	public function __construct(){

		$this->modelAgents = new AgentsModel();
		$this->modelAgentViewModel = new ReportsModel();
		$this->modelClients = new ClientModel();
		$this->modelAddClientsToAgents = new ClientsAgentModel();
		$this->modelAccessLevel = new AccessLevelModel();
		$this->modelAccountModel = new AccountsModel();
		$this->modelTasks = new TasksModel();
		$this->reportsModel = new ReportsModel();
		$this->modelAssignLeadGen = new AssignLeadGenModel();
		$session = session();
		$this->sessionEmail = $session->get("accountEmail");
		$this->db = \Config\Database::connect();
		helper('form', 'database');
	}

	function agentsDashboard(){		

		$agentById = $this->modelAgents->where("agentEmailAddress", $this->sessionEmail)->first();
		//"agent" => $this->modelAgents-where("agentId", $agentById["agentId"])->first()
		//$agentById["agentFirstname"] ." " . $agentById["agentLastname"]
		//$this->reportsModel->sumConnectionRequestSent()

		$data = ([
			"title" => "Agents Dashboard",
			"users" =>$this->reportsModel->orderBy('leadGenId', 'DESC')->findAll(),
			"agent"=>$agentById["agentFirstname"] ." " . $agentById["agentLastname"],
			"leadGens" =>$this->modelAssignLeadGen->getLeadGenByAgentId($agentById["agentId"]),
			"tasks" => $this->reportsModel->getTaksById(1),
			"totalConnection" =>$this->reportsModel->sumConnectionRequestSentByTaskId(1),
			"totalLinkedInConnections" =>$this->reportsModel->sumtotalLinkedinConnectionsTaskId(1),
			"totalclicks" =>$this->reportsModel->sumtotalClicksTaskId(1)
		]);

		echo view('agentTemplate/header', $data);
		echo view('agents/loadAgentsDashboard');
		echo view('agentTemplate/footer');
	}

	#LogOut Session
	function logout(){

        $session = session();
        $session->destroy();
		return redirect()->to('/');
		
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

		$agentId = $this->modelAgents->where("agentEmailAddress", $this->sessionEmail)->first();

		$data = ([
			"title" => "Client Assigned",
			"clients" => $this->modelAddClientsToAgents->getAssignClientsToAgent($agentId['agentId']),
			
		]);		

		echo view('agentTemplate/header',$data);
		echo view('agents/loadClientListView');
		echo view('agentTemplate/footer');

	}


	function getClientsToAgent($id){

		$data = ([			
			"title" => "Lead Generation",
			"client" => $this->modelClients->where("clientsId", $id)->first(),
			"tasks" => $this->modelTasks->orderby("taskId", "ASC")->findAll(),
			"agentName"=> $this->modelAgents->where("agentEmailAddress", $this->sessionEmail)->first()
		]);

		
		echo view('agentTemplate/header',$data);
		echo view('agents/loadLeadGenView');
		echo view('agentTemplate/footer');
	}

	function InsertTaskById($getTaskId){
	
			$this->modelAssignLeadGen->save([
				"agentId" => $this->request->getPost("getAgentId"),
				"clientId" =>$this->request->getPost("getClientId"),
				"taskId"=> $getTaskId
			]);

		//return redirect()->to('agentsDashboard');
	}

	function getLeadGenByTasksId($id){

		$leadGens =$this->modelAssignLeadGen->getLeadGenId($id);

		foreach($leadGens as $leadGen){

			$aId = $leadGen["agentId"];
			$cId = $leadGen["clientId"];

		}

		$data = ([
			"title" => "Add Lead Gen",
			"tasks" => $this->modelTasks->where("taskId", $id)->first(),
			"agent" => $this->modelAgents->where("agentId", $aId)->first(),
			"client"=>$this->modelClients->where("clientsId", $cId)->first()
			
		]);	

		echo view('agentTemplate/header',$data);	
		echo view('agents/loadLeadGenModal');
		echo view('agentTemplate/footer');
	}


	function InserLeadGenDetails(){

		$postData = $this->request->getPost();

		$this->modelAgentViewModel->save([
			"agentId"=> $postData['getAgentId'],
			"taskId" => $postData['getTaskId'],
			"clientsId" => $postData['getClientId'],
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