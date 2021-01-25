<?php namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Query;


class AgentsModel extends Model{

    protected $table = 'tblusers';

    protected $primaryKey = 'userId';

    protected $returnType = 'array';
    
    protected $allowedFields = ["userId", "userLastname","userFirstname","userMiddlename","userEmailAddress", "userPassword"];


    function getAgentDetail($id=null){

        return 
        $this->db->table("tblleadgen")
                ->join("tbltasks", "tbltasks.taskId = tblleadgen.taskId", "left")
                ->join("tblusers", "tblusers.userId = tblleadgen.userId", "left")
                ->where("tbltasks.taskId", $id)
                ->get()
                ->getResultArray();
    }

    
}