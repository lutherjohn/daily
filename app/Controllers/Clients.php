<?php namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\AccessLevelModel;
use App\Models\AccountsModel;

class Clients extends BaseController
{	

	public $clientsModel;
	public $accessLevel;
	public $accountModel;


	public function __construct(){

		$this->clientsModel = new ClientModel();
		$this->accessLevel = new AccessLevelModel();
		$this->accountModel = new AccountsModel();

		helper("form");


	}

	function clientDashboard(){
		$session = session();
		$sessionEmail = $session->get("accountEmail");

        $data = ([
			"title" => "Client Page",
			'user' => $this->clientsModel->where("clientsEmailAddress", $sessionEmail)->first()		
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