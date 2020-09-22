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
        // ez nem működik
        catch(Authentication $e) {
            return $_SESSION['error'] = 'Add meg az email címet és a jelszót';
        }
        //ez sem működik
        catch(ListAccounts $e) {
            return $_SESSION['error'] = 'Sikertelen bejelentkezés';
        }
        try {
            $token = $authenticator->issueToken(241126);  
        }
        catch(InvalidArgumentException $e) {
            return $_SESSION['error'] = 'A fiók száma helytelen';
        } 
        return $token;     
    }
}






