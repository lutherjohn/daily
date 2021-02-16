<?php namespace App\Controllers;

ini_set('max_execution_time', 0); 
ini_set('memory_limit','2048M');


use App\Models\AgentsModel; 
use App\Models\ClientModel;
use App\Models\AccountsModel;
use App\Validation\UserRules;

class Pages extends BaseController
{

	public $agentsModel;
	public $clientsModel;
	public $accountModel;


	public function __construct(){

		$this->agentsModel = new AgentsModel();
		$this->clientsModel = new ClientModel();
		$this->accountModel = new AccountsModel();

	}


	public function index(){

		$data = ([
			"title" => "O2O Daily Activity System"
		]);

		helper(['form']);	

		echo view('LoginTemplates/header', $data);
		echo view('pages/login');
		echo view('LoginTemplates/footer');
		


		
	}

	function loginValidation(){

		$data = ([
			"title" => "O2O Daily Activity System"
		]);

		helper(['form']);

		if($this->request->getMethod() == 'post'){

			$session = session();
			$email =  $this->request->getPost('email');
			$password =  $this->request->getPost('password');
			$data = $this->accountModel->where('accountEmail', $email)->first();


			if($data){
				$pass = $data["accountPassword"];
				$verify_password = password_verify($password, $pass);
				$accessLevel = $data["accesslevelsId"];
				if($verify_password){
					$ses_data = [
						"accountId" => $data["accountId"],
						"accountEmail" =>$data["accountEmail"],
						"accountStatus" => 1
					];
					if($accessLevel == 1){
						$session->set($ses_data);
						return redirect()->to('/admin/adminDashboard');

					}else if($accessLevel == 2){
						$session->set($ses_data);
						return redirect()->to('/agents/agentsDashboard');

					}else if($accessLevel == 3){

					}else if($accessLevel == 4){

						$session->set($ses_data);
						return redirect()->to('/clients/clientDashboard');
					}
					
				}else{
					$session->setFlashdata("message", "Wrong Password");
					session()->setFlashdata('alert-class', 'alert-danger');
					return redirect()->to('/');
				}

			}else{
				$session->setFlashdata("message", "Email Not Found");
				session()->setFlashdata('alert-class', 'alert-danger');
				return redirect()->to('/');

			}

		}
	}

	//
	function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

	private function setUserSession($user){

		$data = [
			'accountId' => $user['accountId'],
			'accountEmail' => $user['accountEmail'],
			'accountStatus' => 1
		];

		session()->set($data);
		return true;
	}
    
    function showme($page ='dashboard'){

		echo view('templates/header');
		echo view('pages/' .$page);
		echo view('templates/footer');

	}

	//--------------------------------------------------------------------

}