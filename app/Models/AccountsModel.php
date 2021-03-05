<?php namespace App\Models;

use CodeIgniter\Model;


class AccountsModel extends Model{

    protected $table = "tblaccounts";

    protected $primaryKey = "accountId";

    protected $returnType = 'array';

    protected $allowedFields = ["accountId","accountEmail", "accountPassword", "accountStatus","accesslevelsId"];

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

        if(isset($data['data']['accountPassword']))

        $data['data']['accountPassword'] = password_hash($data['data']['accountPassword'], PASSWORD_DEFAULT);


        return $data;

    }

    function UpdateEmail($newEmail, $id){

        return
            $this->db
            ->table('tblaccounts')
            ->where('accountId', $id)
            ->update(['accountEmail'=>$newEmail]);
    }


    function UpdatePassword($password, $id){

        $newPassword = password_hash($password, PASSWORD_DEFAULT);

        return
            $this->db
            ->table('tblaccounts')
            ->where('accountId', $id)
            ->update(['accountPassword'=>$newPassword]);

    }

}