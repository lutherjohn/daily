<?php namespace App\Models;

use CodeIgniter\Model;


class ClientsAgentModel extends Model{

    protected $table = 'tblassignclients';

    protected $primaryKey = 'assignclientId';

    protected $returnType = 'array';
    
    protected $allowedFields = ["assignclientId","userId", "clientsId"];


    
    function getAssignClientsToAgent($id){

        return
        $this->db->table("tblassignclients")
                ->join("tblusers", "tblusers.userId = tblassignclients.userId","left")
                ->join("tblclients", "tblclients.clientsId = tblassignclients.clientsId","left")
                ->where("tblusers.userId ", $id)
                ->get()
                ->getResultArray();
    }

    
}