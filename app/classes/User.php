<?php

namespace App\Classes;

use ActiveCollab\SDK\Authenticator\Cloud;

class User 
{
    private $email;
    private $password;    
    
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }
    
    public function connectToACAccount()
    {
        // !!! Hibakezelés
        $authenticator = new Cloud('Netrix', 'Netrix Assigment', $this->email, $this->password);
        // !!! Hibakezelés
        $token = $authenticator->issueToken(241126);
        if (!$token instanceof \ActiveCollab\SDK\TokenInterface) {
            print "Nem sikerült token-t kiállítani";
            die();
        }
    }
}






