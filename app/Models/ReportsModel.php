<?php namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;



class ReportsModel extends Model{


    protected $table = 'tblleadgen';

    protected $primaryKey = 'leadGenId';

    protected $returnType = 'array';
    
    protected $allowedFields = ['taskId','clientsId','userId','date','connectionRequestSent','totalLinkedInConnections','clicks'];



    function getTasks(){
        return
            $this->db->table("tbltasks")
                    ->get()->getResultArray();
    }

    function getTaksById($id = null){
        
        return $this->db
                ->table("tblleadgen")
                ->join("tbltasks", "tbltasks.taskId = tblleadgen.taskId", "left")
                ->join("tblusers", "tblusers.userId = tblleadgen.userId", "left")
                ->where("tbltasks.taskId", $id)
                ->get()->getResultArray();
    }


    function sumConnectionRequestSent(){
        /* return $this->db
                    ->select("SUM(connectionRequestSent) as totalRequest")
                    ->table("tblleadgen")
                    ->orderby("connectionRequestSent", "DESC")
                    ->get();   */

    }



}