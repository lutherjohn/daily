<?php namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\AccessLevelModel;
use App\Models\AccountsModel;
use App\Models\ReportsModel;
use CodeIgniter\API\ResponseTrait;
use App\Validation\UserRules;

class Clients extends BaseController
{	

	use ResponseTrait;
	public $modelClients;
	public $accessLevel;
	public $accountModel;
	public $sessionEmail;
	public $sessionPassword;
	public $sessionId;
	public $reportsModel;


	public function __construct(){

		$this->modelClients = new ClientModel();
		$this->accessLevel = new AccessLevelModel();
		$this->accountModel = new AccountsModel();
		$this->reportsModel = new ReportsModel();
		$session = session();
		$this->sessionEmail = $session->get("accountEmail");
		$this->sessionPassword = $session->get("accountPassword");
		$this->sessionId = $session->get("accountId");
		helper('form');


	}

	function clientDashboard(){

		$clientData = $this->modelClients->where("clientsEmailAddress", $this->sessionEmail)->first();

		/***
		 * "kpis" =>$this->reportsModel->kpiPerClient()
		 */
        $data = ([
			"title" => "Client Page",
			"user" => $clientData["clientsFirstname"] ." ". $clientData["clientsLastname"],
			"totalConnection" =>$this->reportsModel->sumConnectionRequestSentByTaskId(1,$clientData["clientsId"]),
			"totalLinkedInConnections" =>$this->reportsModel->sumtotalLinkedinConnectionsTaskId(1,$clientData["clientsId"]),
			"totalclicks" =>$this->reportsModel->sumtotalClicksTaskId(1,$clientData["clientsId"]),
			"leadGens"=>$this->reportsModel->getClientById($clientData["clientsId"]),
			"kpis" =>$this->reportsModel->kpiPerClient($clientData["clientsId"])			
		]);	


		header('Content-Type: application/json');
		echo view('clientTemplates/header', $data);
		echo view('clientTemplates/navigation');
		echo view('/clients/clientsDashboard');
        echo view('clientTemplates/footer');  
	}
	//search by date

	function searchtaskByDate(){

		$clientData = $this->modelClients->where("clientsEmailAddress", $this->sessionEmail)->first();

		$startDate = $this->request->getPost("date1");
		$endDate = $this->request->getPost("date2");

		$data = $this->reportsModel->searchDateById($startDate,$endDate, $clientData["clientsId"]);

		header('Content-Type: application/json');
		echo json_encode($data, true);
	}

	#CRUD Section
	function editClients($id){

		$clientData = $this->modelClients->where("clientsEmailAddress", $this->sessionEmail)->first();

		$data = ([
			"clients" => $this->modelClients->where("clientsId", $id)->first(),
			"user" => $clientData["clientsFirstname"] ." ". $clientData["clientsLastname"],
			"title" => "Update Client Details"
		]);

		echo view('clientTemplates/header', $data);
		echo view('clientTemplates/navigation');
		echo view('clients/EditClients');
        echo view('clientTemplates/footer'); 

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

		return redirect()->to('clientDashboard');

    }


	#profiles

	function clientProfile(){

		$sessionUser = $this->modelClients->where("clientsEmailAddress", $this->sessionEmail)->first();

		$data = ([
			"user" => $sessionUser["clientsFirstname"] ." ". $sessionUser["clientsLastname"],
			"userProfiles"=>$this->modelClients->where("clientsId", $sessionUser["clientsId"])->first(),
			"accounts" =>$this->accountModel->where("accountId", $this->sessionId)->first(),
			"arrayData" => '{"Peter":65,"Harry":80,"John":78,"Clark":90}'
			
		]);
		

		echo view('clientTemplates/header', $data);
		echo view('clientTemplates/navigation');
		echo view('clients/clientProfile');
        echo view('clientTemplates/footer'); 

	}

	#password change
	function passwordChangeforClient($id){

		$clientData = $this->modelClients->where("clientsEmailAddress", $this->sessionEmail)->first();

		helper(['form','html','cookie']);
		/* */
		
		$data = ([
			"Title" => "Change Your Password",
			"user" => $clientData["clientsFirstname"] ." ". $clientData["clientsLastname"],
			"userPasswords"=>$this->accountModel->where("accountId", $id)->first()			
		]);

		echo view('clientTemplates/header', $data);
		echo view('clientTemplates/navigation');
		echo view('clients/clientChangePassword');
        echo view('clientTemplates/footer');   
		


	}

	function updatePasswordsforClient($id){

		helper(['form']);

		$data = [];
		$data['userPasswords'] = $this->accountModel->where("accountId", $id)->first();
		//lack checking on password verify



		if($this->request->getMethod() == 'post'){

			$session = session();
			$oldPassword = $this->request->getPost("oldPassword");
			$newPassword = $this->request->getPost("newPassword");
			$confirmPassword = $this->request->getPost("confirmPassword");
			

			if($oldPassword == "" || $newPassword == "" || $confirmPassword == ""){

				$session->setFlashdata("message", "You have entered an empty fields");
				session()->setFlashdata('alert-class', 'alert-danger');
				return redirect()->to('/clients/passwordChangeforClient/'.$id);  

			}else{

				$passwordVerify = password_verify($oldPassword,$this->sessionPassword);

				if($newPassword != $confirmPassword){

					$session->setFlashdata("error", "Please Match the New and Confirm Password");
					session()->setFlashdata('alert-class', 'alert-warning');
					return redirect()->to('/clients/passwordChangeforClient/'.$id); 
	
				}else{
					$session->setFlashdata('success', 'Password Updated successfully',3);
					session()->setFlashdata('alert-class', 'alert-success');
					return redirect()->to('/clients/passwordChangeforClient/'.$id);

				}
			}

		}


	}




	#log Out Session

	function logout(){

        $session = session();
        $session->destroy();
		return redirect()->to('/');
		
    }

    


}