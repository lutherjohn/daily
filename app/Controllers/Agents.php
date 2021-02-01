<?php namespace App\Controllers;

use App\Models\AgentsModel; 
use App\Models\ReportsModel;
use App\Models\ClientModel;
use App\Models\ClientsAgentModel;



class Agents extends BaseController
{	

	public $modelAgents;
	public $modelAgentViewModel;
	public $modelClient;
	public $modelAddClientsToAgents;

	public function __construct(){

		$this->modelAgents = new AgentsModel();

		$this->modelAgentViewModel = new ReportsModel();

		$this->modelClientModel = new ClientModel();

		$this->modelAddClientsToAgents = new ClientsAgentModel();

		helper('form', 'database');
	}

    
    function agentList(){

        $data['agents'] = $this->modelAgents->orderBy('userId', 'DESC')->findAll();	

		echo view('templates/header', $data);
		echo view('agents/agentList');
        echo view('templates/footer');        

    }

    
	function crudAgents(){

		
		$postData = $this->request->getPost();
		

		$this->modelAgents->save([
				"userLastname" => $postData['lastname'],	
				"userFirstname" => $postData['firstname'], 
				"userMiddlename" => $postData['middlename'], 
				"userEmailAddress" => $postData['email'],
				"userPassword" => $postData['password']
			]);
	
			session()->setFlashdata('message', 'Added Successfully!');
			session()->setFlashdata('alert-class', 'alert-success');


			return redirect()->to('agentList');

	}

	//view 

	function viewAgentsDetails($id){

		$data["agents"] = $this->modelAgents->getAgentDetail($id);
										
		echo view('templates/header', $data);
		echo view('agents/loadViewAgent');
		echo view('templates/footer');

	}

	//Edit

	function editAgents($id){

		$data = ([
			'users' => $this->modelAgents->where('userId', $id)->first(),
			"title" => "Update Agent Details"
		]);
		
		echo view('templates/header', $data);
		echo view('agents/loadEditAgents');
		echo view('templates/footer');
		//loadEditAgents
	}

	//update
	function updateAgents(){

		$postData = $this->request->getPost();	

		$updateUserId =  $this->request->getPost("updateUserId");

			$data = [
				"userLastname" => $postData['updateLastname'],	
				"userFirstname" => $postData['updateFirstname'], 
				"userMiddlename" => $postData['updateMiddlename'], 
				"userEmailAddress" => $postData['updateEmail']
			];
	
			$this->modelAgents->update($updateUserId,$data); 

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

		$data = ([
			'users' => $this->modelAgents->where('userId', $id)->first(),
			'clients' => $this->modelClientModel->orderby("clientsId", "DESC")->findAll()
		]);

		echo view('templates/header', $data);
		echo view('agents/loadAssignModel');
		echo view('templates/footer');

	}

	//Assign clients to agents
	function addAssignClients(){
		$postData = $this->request->getPost();
		
		foreach($postData['multiple_assign2'] as $multiple_assign2){

			$this->modelAddClientsToAgents->save([
				"userId" => $postData['users'],	
				"clientsId" => $multiple_assign2
			]);

		}
		

		//session()->setFlashdata('message', 'Added Successfully!');
		//session()->setFlashdata('alert-class', 'alert-success');


			return redirect()->to('agentList');  

	}

	// get details
	function getAssignClientsToAgents($id){
		$data = ([
			"clients" => $this->modelAddClientsToAgents->getAssignClientsToAgent($id),
			"users" => $this->modelAgents->where('userId', $id)->first(),
			"title"=>"Agents with their Assign Client/s"

		]);
		echo view('templates/header', $data);
		echo view('agents/loadAssignClientsToAgent');
		echo view('templates/footer');

	}


}