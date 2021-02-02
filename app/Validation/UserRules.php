<?php namespace App\Validation;

use App\Models\ClientModel;

class UserRules {

    public function validateUser(string $str, string $fields, array $data){
        
        
        $model = new ClientModel();

        $user = $model->where('clientsEmailAddress', $data['email'] )
                    ->first();


        if(!$user){
            return false;

            return password_verify($data['password'], $user['clientsPassword']);

        }

    }
}