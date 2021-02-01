<?php namespace App\Models;

use CodeIgniter\Model;

class TasksModel extends Model{

    
    protected $table = 'tbltasks';

    protected $primaryKey = 'taskId';

    protected $returnType = 'array';
    
    protected $allowedFields = ['taskId','tasks'];




}
