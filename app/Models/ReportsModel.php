<?php namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;



class ReportsModel extends Model{

    //$db = \Config\Database::connect();


    protected $table = 'tblleadgen';

    protected $primaryKey = 'leadGenId';

    protected $returnType = 'array';
    
    protected $allowedFields = ['taskId','clientsId','agentId','date','connectionRequestSent','totalLinkedInConnections','clicks'];






    #Admin Side Queries
    function sumOffAll(){
        return
        $this->db
             ->table("tblleadgen")
             ->select("SUM(connectionRequestSent) AS totalconnectionRequestSent,SUM(totalLinkedInConnections) AS totalLinkedInConnections,SUM(clicks) AS totalClicks")
             ->get()
             ->getResultArray();
    }

    //KPI for All Clients
    function kpiAllClient(){

        return
            $this->db
                ->query('SELECT COUNT(1) DateCount,WEEK(date) AS Weeks,date,SUM(connectionRequestSent) conreq, SUM(totalLinkedInConnections) linkedIn, SUM(clicks) clickLinks,
                        clientsFirstname,clientsLastname FROM
                        (
                            SELECT DATE(date + INTERVAL (6 - DAYOFWEEK(date)) DAY) date,connectionRequestSent,totalLinkedInConnections,clicks,
                            clientsFirstname,clientsLastname                            
                            FROM tblleadgen 
                            LEFT JOIN tblclients ON tblleadgen.clientsId = tblclients.clientsId

                        ) A GROUP BY date;')

                ->getResultArray();

    }

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

    #Search by Dates under Admin

    function searchByDate($startDate,$endDate){
        
        return        
        $this->db
             ->table('tblleadgen') 
             ->select('date,connectionRequestSent,totalLinkedInConnections,clicks')     
             ->join("tblclients", "tblclients.clientsId = tblleadgen.clientsId", "left")    
             ->where("date >=",$startDate)
             ->where("date <=",$endDate)
             ->get()
             ->getResultArray();
    
    }



    #Client Side Queries
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

    function sumConnectionRequestSentByTaskId($tId,$cId){       
        /*Sum of connectionRequestSent by TaskId  */ 
        return 
        $this->db
                ->table('tblleadgen')
                ->selectSum('tblleadgen.connectionRequestSent','totalConnection')
                ->join("tbltasks", "tbltasks.taskId = tblleadgen.taskId", "left")
                ->join("tblagents", "tblagents.agentId = tblleadgen.agentId", "left")
                ->join("tblclients", "tblclients.clientsId = tblleadgen.clientsId", "left")  
                ->where("tbltasks.taskId", $tId)
                ->where("tblclients.clientsId", $cId)                
                ->get()
                ->getResultArray();
    }

    function sumtotalLinkedinConnectionsTaskId($Id,$cId){       
        /*Sum of connectionRequestSent by TaskId  */ 
        return 
        $this->db
                ->table('tblleadgen')
                ->selectSum("totalLinkedInConnections","totalLinkedInConnections")
                ->join("tbltasks", "tbltasks.taskId = tblleadgen.taskId", "left")
                ->join("tblagents", "tblagents.agentId = tblleadgen.agentId", "left")
                ->join("tblclients", "tblclients.clientsId = tblleadgen.clientsId", "left")  
                ->where("tblleadgen.taskId", $Id)
                ->where("tblclients.clientsId", $cId)                
                ->get()
                ->getResultArray();
    }

    function sumtotalClicksTaskId($id,$cId){       
        /*Sum of connectionRequestSent by TaskId  */ 
        return 
        $this->db
                ->table('tblleadgen')
                ->selectSum("clicks", "clicks")
                ->join("tbltasks", "tbltasks.taskId = tblleadgen.taskId", "left")
                ->join("tblagents", "tblagents.agentId = tblleadgen.agentId", "left")
                ->join("tblclients", "tblclients.clientsId = tblleadgen.clientsId", "left")  
                ->where("tblleadgen.taskId", $id)
                ->where("tblclients.clientsId", $cId)             
                ->get()
                ->getResultArray();
    }

    function searchDateById($startDate,$endDate,$id){
        
        return        
        $this->db
             ->table('tblleadgen') 
             ->select('date,connectionRequestSent,totalLinkedInConnections,clicks')     
             ->join("tblclients", "tblclients.clientsId = tblleadgen.clientsId", "left")    
             ->where("date >=",$startDate)
             ->where("date <=",$endDate)
             ->where("tblclients.clientsId", $id)
             ->get()
             ->getResultArray();
    
    }   

    //KPI per Clients
    function kpiPerClient($id){

        return
            $this->db
                ->query('SELECT COUNT(1) DateCount,WEEK(date) AS Weeks,date,SUM(connectionRequestSent) conreq, SUM(totalLinkedInConnections) linkedIn, SUM(clicks) clickLinks FROM
                        (
                            SELECT DATE(date + INTERVAL (6 - DAYOFWEEK(date)) DAY) date,connectionRequestSent,totalLinkedInConnections,clicks                            
                            FROM tblleadgen 
                            LEFT JOIN tblclients ON tblleadgen.clientsId = tblclients.clientsId
                            WHERE tblleadgen.clientsId = ' . $id . '

                        ) A GROUP BY date;')

                ->getResultArray();

    }




    #Agent Side Queries

    function dayName(){       
        /* DayName  */ 
        return 
        $this->db
                ->table('tblleadgen')
                ->select("DAYNAME(date) AS nameOfDay")
                ->join("tbltasks", "tbltasks.taskId = tblleadgen.taskId", "left")
                ->join("tblagents", "tblagents.agentId = tblleadgen.agentId", "left")              
                ->get()
                ->getResultArray();
    }



}