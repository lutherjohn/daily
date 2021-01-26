<?php namespace App\Controllers;

use App\Models\ClientModel;

class Clients extends BaseController
{	

	public $clientsModel;


	public function __construct(){

		$this->clientsModel = new ClientModel();

		helper("form");


	}

    function clientList(){

		$data['clients'] = $this->clientsModel->orderBy('clientsId', 'DESC')->findAll();

		echo view('templates/header', $data);
		echo view('clients/clientList');
		echo view('templates/footer');

	}

	function crudClients(){


		$postData = $this->request->getPOst();

		$this->clientsModel->save([
			"clientsFirstname" => $postData['firstname'],
			"clientsMiddlename" =>$postData['middlename'],
			"clientsLastname" => $postData['lastname'],
			"clientsEmailAddress" =>$postData['email'],
			"clientsPassword" => $postData['password']

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