<?php
namespace app\models;

use app\core\Model;

class RegisterModel extends Model
{
        public string $firstname ='';
        public string $lastname ='';
        public string $email ='';
        public string $password ='';
        public string $confirmPassword ='';

        public function save()
        {

        }
//typeHint
        public function rules(): array
        {
                return [
                        'firstName' =>[self::RULE_REQUIRED],
                        'lastName' =>[self::RULE_REQUIRED],
                        'email' => [self::RULE_REQUIRED,self::RULE_EMAIL],
                        'password' =>[self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
                        'confirmPassword' =>[self::RULE_REQUIRED,[self::RULE_MATCH,'match' => 'password']],                        
                ];
        }
}