<?php

namespace App\Classes;

use ActiveCollab\SDK\Authenticator\Cloud;
use InvalidArgumentException;
use ActiveCollab\SDK\Exceptions\Authentication;
use ActiveCollab\SDK\Exceptions\ListAccounts;

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
        try {
            $authenticator = new Cloud('Netrix', 'Netrix Assigment', $this->email, $this->password); 
        }   
        catch(InvalidArgumentException $e) {
            return $_SESSION['error'] = 'Az email cím nem jó';
        }        
        
        try {
            $token = $authenticator->issueToken(241126);  
        }
        catch(ListAccounts $e) {
            return $_SESSION['error'] = 'Sikertelen bejelentkezés, az email cím vagy a jelszó helytelen';
        }
        catch(Authentication $e) {
            return $_SESSION['error'] = 'Add meg az email címet és a jelszót';
        } 
        catch(InvalidArgumentException $e) {
            return $_SESSION['error'] = 'A fiók száma helytelen';
        } 
        return $token;     
    }
}






