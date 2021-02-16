<?php namespace App\Validation;

use App\Models\AccountsModel;

class UserRules {

    public function validateUser(string $str, string $fields, array $data){
        
        
        $model = new AccountsModel();

        $user = $model->where('accountEmail', $data['email'] )
                    ->first();


        if(!$user){
            return false;

            return password_verify($data['password'], $user['accountPassword']);

        }

    }
}