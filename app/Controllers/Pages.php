<?php namespace App\Controllers;

ini_set('max_execution_time', 0); 
ini_set('memory_limit','2048M');


use App\Models\AgentsModel; 
use App\Models\ClientModel;
use App\Validation\UserRules;


class Pages extends BaseController
{

	public $agentsModel;
	public $clientsModel;


	public function __construct(){

		$this->agentsModel = new AgentsModel();

		$this->clientsModel = new ClientModel();

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

			$rules = [
				'email' => 'required|min_length[3]|max_length[25]|valid_email',
				'password' => 'required|min_length[3]|max_length[255]|validateUser[email,password]'
			];

			$errors = [
				'password' => [
					'validateUser' => 'Email or Password don\'t match '
				]
			];

		/**/ 	
			if(! $this->validate($rules, $errors)){
				
				$data['validation'] = $this->validator;

				//return redirect()->to('/');


			}else{


			} 

		}

		echo view('LoginTemplates/header', $data);
		echo view('pages/login');
		echo view('LoginTemplates/footer');





	}
	
	function dashboard(){

		$data = ([
			'agents' => $this->agentsModel->countAll(),
			'clients' => $this->clientsModel->countAll()
		]);


		echo view('templates/header', $data);
		echo view('pages/dashboard');
		echo view('templates/footer');
	}
    
    function showme($page ='dashboard'){

		echo view('templates/header');
		echo view('pages/' .$page);
		echo view('templates/footer');

	}

	//--------------------------------------------------------------------

}