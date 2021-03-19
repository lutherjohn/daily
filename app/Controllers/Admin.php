<?php namespace App\Controllers;

use App\Models\AgentsModel; 
use App\Models\ReportsModel;
use App\Models\ClientModel;
use App\Models\ClientsAgentModel;
use App\Models\AccessLevelModel;
use App\Models\AccountsModel;
use App\Models\TasksModel;

class Admin extends BaseController{

    public $modelAgents;
	public $modelAgentViewModel;
	public $modelClients;
	public $modelAddClientsToAgents;
	public $modelAccessLevel;
    public $accountModel;
    public $reportsModel;
	public $tasksModel;
	public $sessionEmail;
	public $sessionId;


	public function __construct(){

		$this->modelAgents = new AgentsModel();
		$this->modelAgentViewModel = new ReportsModel();
		$this->modelClients = new ClientModel();
		$this->modelAddClientsToAgents = new ClientsAgentModel();
		$this->modelAccessLevel = new AccessLevelModel();
        $this->accountModel = new AccountsModel();
        $this->reportsModel = new ReportsModel();
		$this->tasksModel = new TasksModel();
		$session = session();
		$this->sessionEmail = $session->get("accountEmail");
		$this->sessionId = $session->get("accountId");
		helper('form', 'database');
	}
	
	#Admin Dashboard
	function adminDashboard(){
		
		$session = session();
		$sessionUser = $this->modelClients->where("clientsEmailAddress", $this->sessionEmail)->first();

		header('Content-Type: application/json');
		$data = ([
			"agents" => $this->modelAgents->countAll(),
			"clients" => $this->modelClients->countAll(),
			"user" => $sessionUser["clientsFirstname"] ." ". $sessionUser["clientsLastname"],
			"countClients"=> $this->accountModel->where("accesslevelsId", 4)->countAll(),
			"kpis" =>$this->reportsModel->kpiAllClient(),
			"sumOfAlls" =>$this->reportsModel->sumOffAll(),
			"clientsAdmin" => $this->modelClients->orderby("clientsId", "ASC")->findAll(),
			"arrayData" => '{"Peter":65,"Harry":80,"John":78,"Clark":90}'
			
		]);
		
		
		//$data = ;

		echo view('templates/header', $data);
		echo view('templates/navigation');
		echo view('templates/nav');
		echo view('admin/adminDashboard');
		echo view('templates/footer');
	}

	#LogOut Session
	function logout(){

        $session = session();
        $session->destroy();
		return redirect()->to('/');
		
    }


    #region Agent Start
    function agentList(){


		$clientData = $this->modelClients->where("clientsEmailAddress", $this->sessionEmail)->first();


        $data = ([
			"user" => $clientData["clientsFirstname"] ." ". $clientData["clientsLastname"],
			"agents" => $this->modelAgents->orderBy('agentId', 'ASC')->findAll(),
			'accessLevels' => $this->modelAccessLevel->findAll(),
			"status"=>$this->accountModel->where("accountEmail", $this->sessionEmail)->first()
		]);	

		echo view('templates/header', $data);
		echo view('templates/navigation');
		echo view('templates/nav');
		echo view('admin/agentList');
        echo view('templates/footer');        

    }

    
	function crudAgents(){

		
		$postData = $this->request->getPost();
		

		$this->modelAgents->save([
			"agentLastname" => $postData['lastname'],	
			"agentFirstname" => $postData['firstname'], 
			"agentMiddlename" => $postData['middlename'], 
			"agentEmailAddress" => $postData['email']
		]);

		$this->accountModel->save([
			"accountEmail" => $postData['email'],
			"accountPassword" =>$postData['password'],
			"accountStatus" => 1,
			"accesslevelsId" => $postData['userRules']
		]);




			$session = session();
	
			session()->setFlashdata('message', 'Added Successfully!');
			session()->setFlashdata('alert-class', 'alert-success');


			return redirect()->to('agentList');

	}

	//view 

	function viewAgentsDetails($id){

		$data["agents"] = $this->modelAgents->getAgentDetail($id);
										
		echo view('templates/header', $data);
		echo view('templates/navigation');
		echo view('templates/nav');
		echo view('admin/loadViewAgent');
		echo view('templates/footer');

	}

	//Edit

	function editAgents($id){

		$clientData = $this->modelClients->where("clientsEmailAddress", $this->sessionEmail)->first();

		$data = ([
			"user" => $clientData["clientsFirstname"] ." ". $clientData["clientsLastname"],
			"users" => $this->modelAgents->where('agentId', $id)->first(),
			"title" => "Update Agent Details"
		]);
		
		echo view('templates/header', $data);
		echo view('templates/navigation');
		echo view('templates/nav');
		echo view('admin/loadEditAgents');
		echo view('templates/footer');
		//loadEditAgents
	}

	//update
	function updateAgents(){

		$postData = $this->request->getPost();	

		$updateUserId =  $this->request->getPost("updateUserId");
		$updateEmail =  $this->request->getPost("updateEmail");

			$data = [
				"agentLastname" => $postData['updateLastname'],	
				"agentFirstname" => $postData['updateFirstname'], 
				"agentMiddlename" => $postData['updateMiddlename'], 
				"agentEmailAddress" => $postData['updateEmail']
			];
	
			$this->modelAgents->update($updateUserId,$data); 

			//$update = $this->db->query();
			//$this->accountModel->UpdateEmail($updateEmail);

			return redirect()->to('agentList');

	}

	//delete

	function deleteAgents($id){

		$this->modelAgents->delete($id);

		session()->setFlashdata('message', 'Deleted Successfully!');
		session()->setFlashdata('alert-class', 'alert-danger');

		return redirect('/agentList'); 

	}

	//load Modal

	function clientAgentsData($id){

		$clientData = $this->modelClients->where("clientsEmailAddress", $this->sessionEmail)->first();

		$data = ([
			"user" => $clientData["clientsFirstname"] ." ". $clientData["clientsLastname"],
			"users" => $this->modelAgents->where('agentId', $id)->first(),
			"clients" => $this->modelClients->orderby("clientsId", "ASC")->findAll()
		]);

		echo view('templates/header', $data);
		echo view('templates/navigation');
		echo view('templates/nav');
		echo view('admin/loadAssignModel');
		echo view('templates/footer');

	}

	//Assign clients to agents
	function addAssignClients(){

		$postData = $this->request->getPost();
		
		foreach($postData['multiple_assign2'] as $multiple_assign2){

			$this->modelAddClientsToAgents->save([
				"agentId" => $postData['users'],	
				"clientsId" => $multiple_assign2
			]);

		}
		

		//session()->setFlashdata('message', 'Added Successfully!');
		//session()->setFlashdata('alert-class', 'alert-success');


			return redirect()->to('agentList');  

	}

	// get details
	function getAssignClientsToAgents($id){

		$clientData = $this->modelClients->where("clientsEmailAddress", $this->sessionEmail)->first();

		$data = ([
			"user" => $clientData["clientsFirstname"] ." ". $clientData["clientsLastname"],
			"clients" => $this->modelAddClientsToAgents->getAssignClientsToAgent($id),
			"users" => $this->modelAgents->where('agentId', $id)->first(),
			"title"=>"Agents with their Assigned Client/s"

		]);
		echo view('templates/header', $data);
		echo view('templates/navigation');
		echo view('templates/nav');
		echo view('admin/loadAssignClientsToAgent');
		echo view('templates/footer');

	}
	
	#region Agent Ends
    
    #region Clients

    function clientList(){

		$clientData = $this->modelClients->where("clientsEmailAddress", $this->sessionEmail)->first();

		$data = ([
			//"user" => $clientData["clientsFirstname"] ." ". $clientData["clientsLastname"],
			"clients" => $this->modelClients->orderBy('clientsId', 'ASC')->findAll(),
			"accessLevels" => $this->modelAccessLevel->findAll()
		]);

		echo view('templates/header', $data);
		echo view('templates/navigation');
		echo view('templates/nav');
		echo view('admin/clientList');
		echo view('templates/footer');

	}

	function crudClients(){

		$postData = $this->request->getPost();

		$this->modelClients->save([
			"clientsFirstname" => $postData['firstname'],
			"clientsMiddlename" =>$postData['middlename'],
			"clientsLastname" => $postData['lastname'],
			"clientsBussinessName" =>$postData['businessName'],
			"clientsCampaignGoals" =>$postData['campaignGoal'],
			"clientsDateStarted" =>date("Y-m-d"),
			"clientsJointVenture" => $postData['jointVenture'],
			"clientsEmailAddress" =>$postData['email']
		]);

		$this->accountModel->save([
			"accountEmail" => $postData['email'],
			"accountPassword" =>$postData['password'],
			"accountStatus" => 1,
			"accesslevelsId" => $postData['userRules']
		]);

		$session = session();

		session()->setFlashdata('message', 'Added Successfully!');
		session()->setFlashdata('alert-class', 'alert-success');


		return redirect()->to('clientList');


	}


	//edit

	function editClients($id){

		$clientData = $this->modelClients->where("clientsEmailAddress", $this->sessionEmail)->first();

		$data = ([
			"user" => $clientData["clientsFirstname"] ." ". $clientData["clientsLastname"],
			"clients" => $this->modelClients->where("clientsId", $id)->first(),
			"title" => "Update Client Details"
		]);

		echo view('templates/header', $data);
		echo view('templates/navigation');
		echo view('templates/nav');
		echo view('admin/loadEditClients');
		echo view('templates/footer');

	}

	function updateClients(){

		$postData = $this->request->getPost();

		$updateClientId = $this->request->getPost("updateClientId");

		$data = ([
			"clientsFirstname" => $postData['updateFirstname'],
			"clientsMiddlename" =>$postData['updateMiddlename'],
			"clientsLastname" => $postData['updateLastname'],
			"clientsBussinessName" =>$postData['updateBussinessName'],
			"clientsCampaignGoals" =>$postData['updateCampaignGoals'],
			"clientsJointVenture" => $postData['updateJointVenture'],
			"clientsEmailAddress" =>$postData['updateEmail']
		]);

		$this->modelClients->update($updateClientId , $data);

		$this->accountModel->UpdateEmail($postData['updateEmail'], $updateClientId);

		session()->setFlashdata('message', 'Updated Successfully!');
		session()->setFlashdata('alert-class', 'alert-success');

		return redirect()->to('clientList');

    }
    

    #Report 
    function reportList(){

		//$data['userData'] = $viewLeadGen->orderBy('leadGenId', 'DESC')->pagination(10);

		//$data['pagination_link'] = $viewLeadGen->pager;

		$data = ([
			
			"users" =>$this->reportsModel->orderBy('leadGenId', 'DESC')->findAll(),
			"tasks" =>$this->reportsModel->getTasks(),
			"title" => "Lead Generation List"
		]);



		echo view('templates/header', $data);
		echo view('admin/reportList');
		echo view('templates/footer');

	}

	//view
	function viewTasksById($id){


		$data = ([
				"tasks" => $this->reportsModel->getTaksById($id),
				"tasksName" => $this->tasksModel->where("taskId",$id)->first(),
				"title" =>"Task Details",
				"connectionRequestSent" => $this->reportsModel->sumConnectionRequestSent()
		]);		
		
		echo view('templates/header', $data);
		echo view('admin/loadReportView');
		echo view('templates/footer');
	}

	//Insert Data
	function crudLeadGen($id=0){

		helper('form');

		$postData = $this->request->getPost();
		
		$this->reportsModel->save([
				"agentId"=> 13,
				"taskId" => 1,
				"clientsId" => 3,
				"date" => $postData['date'],
				"connectionRequestSent" => $postData['connectionRequest'],
				"totalLinkedInConnections" => $postData['totalLinkedInConnections'] ,
				"clicks" => $postData['clicks']
			]);
		

		return redirect()->to('reportList');	
		

	}

	//Filter/Search
	function searchtaskByDate(){

		$startDate = $this->request->getPost("date1");
		$endDate = $this->request->getPost("date2");

		$data = $this->reportsModel->searchByDate($startDate,$endDate);

		header('Content-Type: application/json');
		echo json_encode($data, true);
	}

	//Profile
	function profile(){

		$sessionUser = $this->modelClients->where("clientsEmailAddress", $this->sessionEmail)->first();

		$data = ([
			"user" => $sessionUser["clientsFirstname"] ." ". $sessionUser["clientsLastname"],
			"userProfiles"=>$this->modelClients->where("clientsId", $sessionUser["clientsId"])->first(),
			"accounts" =>$this->accountModel->where("accountId", $this->sessionId)->first(),
			"arrayData" => '{"Peter":65,"Harry":80,"John":78,"Clark":90}'
			
		]);
		

		echo view('templates/header', $data);
		echo view('templates/navigation');
		echo view('templates/nav');
		echo view('admin/loadAdminProfile');
		echo view('templates/footer');

	}

	//Password change
	function adminChangePassword($id){

		$clientData = $this->modelClients->where("clientsEmailAddress", $this->sessionEmail)->first();

		$data = ([
			"user" => $clientData["clientsFirstname"] ." ". $clientData["clientsLastname"],
			"userPasswords"=>$this->accountModel->where("accountId", $id)->first()	
		]);


		echo view('templates/header', $data);
		echo view('templates/navigation');
		echo view('templates/nav');
		echo view('admin/adminChangePassword');
		echo view('templates/footer');

	}

	#change Email Address
	/***
	 * change email address per clients and agents
	 */


	#Setting up status



	


	

}