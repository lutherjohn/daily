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
	public $accountModel;
	public $modelTasks;
	public $reportsModel;
	public $sessionEmail;
	public $sessionId;
	public $modelAssignLeadGen;
	public $sessionByAgentId;


	public function __construct(){

		$this->modelAgents = new AgentsModel();
		$this->modelAgentViewModel = new ReportsModel();
		$this->modelClients = new ClientModel();
		$this->modelAddClientsToAgents = new ClientsAgentModel();
		$this->modelAccessLevel = new AccessLevelModel();
		$this->accountModel = new AccountsModel();
		$this->modelTasks = new TasksModel();
		$this->reportsModel = new ReportsModel();
		$this->modelAssignLeadGen = new AssignLeadGenModel();
		$session = session();
		$this->sessionEmail = $_SESSION['accountEmail'];
		$this->sessionId = $_SESSION['accountId'];
		helper('form', 'database');

		//$sessionUser = $this->modelAgents->where("agentEmailAddress", $this->sessionEmail)->first();
	}

	function agentsDashboard(){	
		
		$session = session();
		$sessionUser = $this->modelAgents->where("agentEmailAddress",$_SESSION['accountEmail'])->first();


		
		$data = ([
			"title" => "Agents Dashboard",
			"LeadGen" => "Lead Generator Daily Activity",
			"agent"=> $sessionUser['agentFirstname'],
			"users" =>$this->reportsModel->orderBy('leadGenId', 'DESC')->findAll(),
			"leadGens" =>$this->modelAssignLeadGen->getLeadGenByAgentId(2),
			"tasks" => $this->reportsModel->getTaksById(1),
			"sumOfAlls" =>$this->reportsModel->sumOffAllbyAgents(2),
			"nameOfDay"=>$this->reportsModel->dayName()
		]);

		echo view('agentTemplate/header', $data);
		echo view('agentTemplate/nav');
		echo view('agentTemplate/navigation');		
		echo view('agents/loadAgentsDashboard');
		echo view('agentTemplate/footer');
	}

	function setUserSession($user){

		$this->modelAgents->orderBy("agentId","ASC")->findAll();

		$data = [
			'agentId' => $user['agentId'],
			'agentFirstname' => $user['agentFirstname'],
			'agentLastname' => $user['agentLastname'],
			'agentEmailAddress' => $user['agentEmailAddress']
		];

		//session()->set($data);
		//return true;
	}

	function agentsProfile(){

		$sessionUser = $this->modelAgents->where("agentEmailAddress", $this->sessionEmail)->first();

		$data = ([
			"agent"=> $sessionUser["agentFirstname"],
			"userProfiles"=>$this->modelAgents->where("agentId", $sessionUser["agentId"])->first(),
			"accounts" =>$this->accountModel->where("accountId", $this->sessionId)->first(),
			"arrayData" => '{"Peter":65,"Harry":80,"John":78,"Clark":90}'
			
		]);
		

		echo view('agentTemplate/header', $data);
		echo view('agentTemplate/nav');
		echo view('agentTemplate/navigation');		
		echo view('agents/loadAgentsProfile');
		echo view('agentTemplate/footer');

	}

	#Update agents Profile
	function editAgentsData($id){

		$sessionUser = $this->modelAgents->where("agentEmailAddress", $this->sessionEmail)->first();

		$data = ([
			"title"=>"Update Details",
			"agent"=> $sessionUser["agentFirstname"],
			"users"=>$this->modelAgents->where("agentId", $id)->first(),
			"accounts" =>$this->accountModel->where("accountId", $this->sessionId)->first(),
			"arrayData" => '{"Peter":65,"Harry":80,"John":78,"Clark":90}'
			
		]);
		

		echo view('agentTemplate/header', $data);
		echo view('agentTemplate/nav');
		echo view('agentTemplate/navigation');		
		echo view('agents/loadEditAgents');
		echo view('agentTemplate/footer');

	}

	#Update Email Address
	function updateAgentDetails(){		


		$postData = $this->request->getPost();

		
		$this->accountModel->UpdateEmail($postData["updateAccountId"],$postData["updateAgentEmail"]);

		$sessionUser = $this->modelAgents->where("agentEmailAddress", $this->sessionEmail)->first();

		$data = ([
			"agentFirstname" => $postData['updateAgentFirstname'],
			"agentMiddlename" =>$postData['updateAgentMiddlename'],
			"agentLastname" => $postData['updateAgentLastname'],
			"agentEmailAddress" =>$postData['updateAgentEmail']
		]); 

		$this->modelAgents->update($postData["updateAgentId"],$data);

		return redirect()->to('/agents/editAgentsData/' .$postData["updateAgentId"]);

	}

	#password change
	function agentChangePassword($id){

		$sessionUser = $this->modelAgents->where("agentEmailAddress", $this->sessionEmail)->first();

		helper(['form','html','cookie']);
		/* */
		
		$data = ([
			"Title" => "Change Your Password",
			"agent" => $sessionUser["agentFirstname"] ." ". $sessionUser["agentLastname"],
			"userPasswords"=>$this->accountModel->where("accountId", $id)->first(),
			"users"=>$this->modelAgents->where("agentId", $sessionUser["agentId"])->first()			
		]);

		echo view('agentTemplate/header', $data);
		echo view('agentTemplate/nav');
		echo view('agentTemplate/navigation');		
		echo view('agents/agentChangePassword');
		echo view('agentTemplate/footer'); 
		


	}

	#update Password
	function updatePasswordsforAgents($id){

		helper(['form','url']);

		$postData = $this->request->getPost("newPassword");

		$this->accountModel->UpdatePassword($postData,$id);

		return redirect()->to('/agents/agentChangePassword/' .$id);  
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
		echo view('agentTemplate/nav');
		echo view('agentTemplate/navigation');
		echo view('agents/loadAgentsView');
		echo view('agentTemplate/footer');
	}

	function clientListView(){

		$agentId = $this->modelAgents->where("agentEmailAddress", $this->sessionEmail)->first();

		$data = ([
			"title" => "Client Assigned",
			"clients" => $this->modelAddClientsToAgents->getAssignClientsToAgent($agentId['agentId']),
			"agent"=>$agentId["agentFirstname"] ." " . $agentId["agentLastname"],
			
		]);		

		echo view('agentTemplate/header',$data);
		echo view('agentTemplate/nav');
		echo view('agentTemplate/navigation');
		echo view('agents/loadClientListView');
		echo view('agentTemplate/footer');

	}


	function getClientsToAgent($id){

		$agentId = $this->modelAgents->where("agentEmailAddress", $this->sessionEmail)->first();

		$data = ([			
			"title" => "Lead Generation",
			"client" => $this->modelClients->where("clientsId", $id)->first(),
			"tasks" => $this->modelTasks->orderby("taskId", "ASC")->findAll(),
			"agentName"=> $this->modelAgents->where("agentEmailAddress", $this->sessionEmail)->first(),
			"agent"=>$agentId["agentFirstname"] ." " . $agentId["agentLastname"]
		]);

		
		echo view('agentTemplate/header',$data);
		echo view('agentTemplate/nav');
		echo view('agentTemplate/navigation');
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

		$agentId = $this->modelAgents->where("agentEmailAddress", $this->sessionEmail)->first();

		$leadGens =$this->modelAssignLeadGen->getLeadGenId($id);

		foreach($leadGens as $leadGen){

			$aId = $leadGen["agentId"];
			$cId = $leadGen["clientId"];

		}

		$data = ([
			"title" => "Add Lead Gen",
			"tasks" => $this->modelTasks->where("taskId", $id)->first(),
			"agentById" => $this->modelAgents->where("agentId", $aId)->first(),
			"client"=>$this->modelClients->where("clientsId", $cId)->first(),
			"agent"=>$agentId["agentFirstname"] ." " . $agentId["agentLastname"]
			
		]);	

		echo view('agentTemplate/header',$data);	
		echo view('agentTemplate/nav');
		echo view('agentTemplate/navigation');
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


	//Search

	






    
    


}