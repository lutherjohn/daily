<?php namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model{

    protected $table = "tblclients";

    protected $primaryKey = "clientsId";

    protected $returnType = 'array';

    protected $allowedFields = ["clientsId","clientsFirstname","clientsMiddlename", "clientsLastname","clientsBusinessName","clientsCampaignGoals","clientsDateStarted","clientsJointVenture","clientsEmailAddress","clientsPassword","accesslevelsId"];

    protected $beforeInsert = ['beforeInsert'];

    protected $beforeUpdate = ['beforeUpdate'];
    


    protected function beforeInsert(array $data){

        $data = $this->passwordHash($data);

        return $data;    

    }

    protected function beforeUpdate(array $data){

        $data = $this->passwordHash($data);

        return $data;    

    }

    protected function passwordHash(array $data){

        if(isset($data['data']['clientsPassword']))

        $data['data']['clientsPassword'] = password_hash($data['data']['clientsPassword'], PASSWORD_DEFAULT);


        return $data;

    }




}