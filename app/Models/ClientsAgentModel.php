<?php namespace App\Models;

use CodeIgniter\Model;


class ClientsAgentModel extends Model{

    protected $table = 'tblassignclients';

    protected $primaryKey = 'assignclientId';

    protected $returnType = 'array';
    
    protected $allowedFields = ["assignclientId","agentId", "clientsId"];


    
    function getAssignClientsToAgent($id){

        return
        $this->db->table("tblassignclients")
                ->join("tblagents", "tblagents.agentId = tblassignclients.agentId","left")
                ->join("tblclients", "tblclients.clientsId = tblassignclients.clientsId","left")
                ->where("tblagents.agentId ", $id)
                ->get()
                ->getResultArray();
    }

    
}