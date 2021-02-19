<?php namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;



class ReportsModel extends Model{

    //$db = \Config\Database::connect();


    protected $table = 'tblleadgen';

    protected $primaryKey = 'leadGenId';

    protected $returnType = 'array';
    
    protected $allowedFields = ['taskId','clientsId','agentId','date','connectionRequestSent','totalLinkedInConnections','clicks'];


    function getClientById($id = null){
        
        return $this->db
                ->table("tblleadgen")
                ->join("tbltasks", "tbltasks.taskId = tblleadgen.taskId", "left")
                ->join("tblclients", "tblclients.clientsId = tblleadgen.clientsId", "left")
                ->where("tblleadgen.clientsId", $id)
                ->get()
                ->getResultArray();
    }

    function getTasks(){
        return
            $this->db->table("tbltasks")
                    ->get()
                    ->getResultArray();
    }

    function getTaksById($id = null){
        
        return $this->db
                ->table("tblleadgen")
                ->join("tbltasks", "tbltasks.taskId = tblleadgen.taskId", "left")
                ->join("tblagents", "tblagents.agentId = tblleadgen.agentId", "left")
                ->where("tbltasks.taskId", $id)
                ->get()
                ->getResultArray();
    }


    function sumConnectionRequestSent(){       
        /*Sum all connectionRequestSent  */ 
        return 
        $this->db
                ->table('tblleadgen')
                ->selectSum('connectionRequestSent','totalConnection')
                ->groupby('connectionRequestSent')                
                ->get()
                ->getResultArray();
    }

    function sumConnectionRequestSentByTaskId($tId){       
        /*Sum of connectionRequestSent by TaskId  */ 
        return 
        $this->db
                ->table('tblleadgen')
                ->selectSum('tblleadgen.connectionRequestSent','totalConnection')
                ->join("tbltasks", "tbltasks.taskId = tblleadgen.taskId", "left")
                ->join("tblagents", "tblagents.agentId = tblleadgen.agentId", "left")
                ->where("tbltasks.taskId", $tId)
                ->groupby('connectionRequestSent')                
                ->get()
                ->getResultArray();
    }

    function sumtotalLinkedinConnectionsTaskId($Id){       
        /*Sum of connectionRequestSent by TaskId  */ 
        return 
        $this->db
                ->table('tblleadgen')
                ->select("SUM(`totalLinkedInConnections`) AS totalLinkedInConnections")
                ->join("tbltasks", "tbltasks.taskId = tblleadgen.taskId", "left")
                ->join("tblagents", "tblagents.agentId = tblleadgen.agentId", "left")
                ->where("tblleadgen.taskId", $Id)
                ->groupby('totalLinkedInConnections')                
                ->get()
                ->getResultArray();
    }

    function sumtotalClicksTaskId($id){       
        /*Sum of connectionRequestSent by TaskId  */ 
        return 
        $this->db
                ->table('tblleadgen')
                ->selectSum('tblleadgen.clicks','clicks')
                ->join("tbltasks", "tbltasks.taskId = tblleadgen.taskId", "left")
                ->join("tblagents", "tblagents.agentId = tblleadgen.agentId", "left")
                ->where("tbltasks.taskId", $id)
                ->groupby('clicks')                
                ->get()
                ->getResultArray();
    }



}