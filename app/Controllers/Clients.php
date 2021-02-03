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

    


}