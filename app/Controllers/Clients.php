<?php namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\AccessLevelModel;

class Clients extends BaseController
{	

	public $clientsModel;
	public $accessLevel;


	public function __construct(){

		$this->clientsModel = new ClientModel();

		$this->accessLevel = new AccessLevelModel();

		helper("form");


	}

    function clientList(){

		$data = ([
			'clients' => $this->clientsModel->orderBy('clientsId', 'DESC')->findAll(),
			'accessLevels' => $this->accessLevel->findAll()
		]);

		echo view('templates/header', $data);
		echo view('clients/clientList');
		echo view('templates/footer');

	}

	function crudClients(){

		$postData = $this->request->getPost();

		$this->clientsModel->save([
			"clientsFirstname" => $postData['firstname'],
			"clientsMiddlename" =>$postData['middlename'],
			"clientsLastname" => $postData['lastname'],
			"clientsBussinessName" =>$postData['businessName'],
			"clientsCampaignGoals" =>$postData['campaignGoal'],
			"clientsDateStarted" =>date("Y-m-d"),
			"clientsJointVenture" => $postData['jointVenture'],
			"clientsEmailAddress" =>$postData['email'],
			"clientsPassword" => $postData['password'],
			"accesslevelsId" => $postData['userRoles']

		]);

		session()->setFlashdata('message', 'Added Successfully!');
		session()->setFlashdata('alert-class', 'alert-success');


		return redirect()->to('clientList');


	}


	//edit

	function editClients($id){

		$data = ([
			"clients" => $this->clientsModel->where("clientsId", $id)->first(),
			"title" => "Update Client Details"
		]);

		echo view('templates/header', $data);
		echo view('clients/loadEditClients');
		echo view('templates/footer');

	}

	function updateClients(){

		$postData = $this->request->getPOst();

		$updateClientId = $this->request->getPost("updateClientId");

		$data = [
			"clientsFirstname" => $postData['updateFirstname'],
			"clientsMiddlename" =>$postData['updateMiddlename'],
			"clientsLastname" => $postData['updateLastname'],
			"clientsEmailAddress" =>$postData['updateEmail']
		];

		$this->clientsModel->update($updateClientId , $data);

		session()->setFlashdata('message', 'Updated Successfully!');
		session()->setFlashdata('alert-class', 'alert-success');

		return redirect()->to('clientList');

	}


}