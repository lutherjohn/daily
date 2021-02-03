<?php namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Query;


class AgentsModel extends Model{

    protected $table = 'tblagents';

    protected $primaryKey = 'agentId';

    protected $returnType = 'array';
    
    protected $allowedFields = ["agentId", "agentLastname","agentFirstname","agentMiddlename","agentEmailAddress"];

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

        if(isset($data['data']['agentPassword']))

        $data['data']['agentPassword'] = password_hash($data['data']['agentPassword'], PASSWORD_DEFAULT);


        return $data;

    }

    function getAgentDetail($id=null){

        return 
        $this->db->table("tblleadgen")
                ->join("tbltasks", "tbltasks.taskId = tblleadgen.taskId", "left")
                ->join("tblagents", "tblagents.agentId = tblleadgen.agentId", "left")
                ->where("tbltasks.taskId", $id)
                ->get()
                ->getResultArray();
    }

    
}