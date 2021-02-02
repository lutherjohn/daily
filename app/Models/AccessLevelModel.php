<?php namespace App\Models;

use CodeIgniter\Model;

class AccessLevelModel extends Model{

    
    protected $table = 'tblaccesslevels';

    protected $primaryKey = 'accesslevelId';

    protected $returnType = 'array';
    
    protected $allowedFields = ["accesslevelId", "accessLevels"];

}
