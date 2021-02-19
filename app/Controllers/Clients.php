<?php namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\AccessLevelModel;
use App\Models\AccountsModel;
use App\Models\ReportsModel;

class Clients extends BaseController
{	

	public $clientsModel;
	public $accessLevel;
	public $accountModel;
	public $sessionEmail;
	public $reportsModel;


	public function __construct(){

		$this->clientsModel = new ClientModel();
		$this->accessLevel = new AccessLevelModel();
		$this->accountModel = new AccountsModel();
		$this->reportsModel = new ReportsModel();
		$session = session();
		$this->sessionEmail = $session->get("accountEmail");

		helper("form");


	}

	function clientDashboard(){

		$clientData = $this->clientsModel->where("clientsEmailAddress", $this->sessionEmail)->first();

        $data = ([
			"title" => "Client Page",
			"user" => $clientData["clientsFirstname"] ." ". $clientData["clientsLastname"],
			"totalConnection" =>$this->reportsModel->sumConnectionRequestSentByTaskId(1),
			"totalLinkedInConnections" =>$this->reportsModel->sumtotalLinkedinConnectionsTaskId(1),
			"totalclicks" =>$this->reportsModel->sumtotalClicksTaskId(1),
			"leadGens"=>$this->reportsModel->getClientById($clientData["clientsId"])
		]);	

		echo view('clientTemplates/header', $data);
		echo view('clients/clientsDashboard');
        echo view('clientTemplates/footer');  
	}

	#log Out Session

	function logout(){

        $session = session();
        $session->destroy();
		return redirect()->to('/');
		
    }

    


}