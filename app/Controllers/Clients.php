<?php namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\AccessLevelModel;
use App\Models\AccountsModel;
use App\Models\ReportsModel;
use CodeIgniter\API\ResponseTrait;

class Clients extends BaseController
{	

	use ResponseTrait;
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

		/***
		 * "kpis" =>$this->reportsModel->kpiPerClient()
		 */
        $data = ([
			"title" => "Client Page",
			"user" => $clientData["clientsFirstname"] ." ". $clientData["clientsLastname"],
			"totalConnection" =>$this->reportsModel->sumConnectionRequestSentByTaskId(1,$clientData["clientsId"]),
			"totalLinkedInConnections" =>$this->reportsModel->sumtotalLinkedinConnectionsTaskId(1,$clientData["clientsId"]),
			"totalclicks" =>$this->reportsModel->sumtotalClicksTaskId(1,$clientData["clientsId"]),
			"leadGens"=>$this->reportsModel->getClientById($clientData["clientsId"])			
		]);	


		header('Content-Type: application/json');
		echo view('clientTemplates/header', $data);
		echo view('/clients/clientsDashboard');
        echo view('clientTemplates/footer');  
	}
	//search by date

	function searchtaskByDate(){

		$clientData = $this->clientsModel->where("clientsEmailAddress", $this->sessionEmail)->first();

		$startDate = $this->request->getPost("date1");
		$endDate = $this->request->getPost("date2");

		$data = $this->reportsModel->searchByDate($startDate,$endDate, $clientData["clientsId"]);

		header('Content-Type: application/json');
		echo json_encode($data, true);
	}

	#log Out Session

	function logout(){

        $session = session();
        $session->destroy();
		return redirect()->to('/');
		
    }

    


}