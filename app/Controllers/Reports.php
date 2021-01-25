<?php namespace App\Controllers;

use App\Models\ReportsModel;


class Reports extends BaseController
{	

	public $reportsModel;

	public function __construct(){

		$this->reportsModel = new ReportsModel();
		helper('form');
	}

    function reportList(){

		//$data['userData'] = $viewLeadGen->orderBy('leadGenId', 'DESC')->pagination(10);

		//$data['pagination_link'] = $viewLeadGen->pager;

		$data = ([
			
			"users" =>$this->reportsModel->orderBy('leadGenId', 'DESC')->findAll(),
			"tasks" =>$this->reportsModel->getTasks(),
			"title" => "Lead Generation List"
		]);



		echo view('templates/header', $data);
		echo view('reports/reportList');
		echo view('templates/footer');

	}

	//view
	function viewTasksById($id){


		$data = ([
				"tasks" => $this->reportsModel->getTaksById($id),
				"title" =>"Task Details",
				"connectionRequestSent" => $this->reportsModel->sumConnectionRequestSent()
		]);		
		
		echo view('templates/header', $data);
		echo view('reports/loadReportView');
		echo view('templates/footer');
	}

	//Insert Data
	function crudLeadGen($id=0){

		helper('form');

		$postData = $this->request->getPost();
		
		$this->reportsModel->save([
				"userId"=> 13,
				"taskId" => 1,
				"clientsId" => 3,
				"date" => $postData['date'],
				"connectionRequestSent" => $postData['connectionRequest'],
				"totalLinkedInConnections" => $postData['totalLinkedInConnections'] ,
				"clicks" => $postData['clicks']
			]);
		

		return redirect()->to('reportList');	
		

	}


}