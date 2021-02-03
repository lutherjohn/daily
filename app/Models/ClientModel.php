<?php namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model{

    protected $table = "tblclients";

    protected $primaryKey = "clientsId";

    protected $returnType = 'array';

    protected $allowedFields = ["clientsId","clientsFirstname","clientsMiddlename", "clientsLastname","clientsBusinessName","clientsCampaignGoals","clientsDateStarted","clientsJointVenture","clientsEmailAddress"];

    //protected $beforeInsert = ['beforeInsert'];

    //protected $beforeUpdate = ['beforeUpdate'];
    


  




}