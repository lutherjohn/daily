<?php namespace App\Models;

use CodeIgniter\Model;

class AssignLeadGenModel extends Model{

    
    protected $table = 'tblassignleadgen';

    protected $primaryKey = 'leadgenId';

    protected $returnType = 'array';
    
    protected $allowedFields = ["leadgenId", "agentId", "clientId", "taskId" ];

    function getLeadGenId($id){
        
        return 
        $this->db->table("tblassignleadgen")
        ->join("tblagents", "tblagents.agentId = tblassignleadgen.agentId","left")
        ->join("tblclients", "tblclients.clientsId = tblassignleadgen.clientId","left")
        ->join("tbltasks", "tbltasks.taskId = tblassignleadgen.taskId","left")
        ->where("tbltasks.taskId =", $id)
        ->get()
        ->getResultArray();

    }

    function getLeadGenByAgentId($id){
        
        return 
        $this->db
        ->table("tblassignleadgen")
        ->select("tbltasks.tasks")
        ->join("tblagents", "tblagents.agentId = tblassignleadgen.agentId","left")
        ->join("tblclients", "tblclients.clientsId = tblassignleadgen.clientId","left")
        ->join("tbltasks", "tbltasks.taskId = tblassignleadgen.taskId","left")
        ->where("tblagents.agentId =", $id)
        ->get()
        ->getResultArray();

    }

}