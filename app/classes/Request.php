<?php

namespace App\Classes;

use ActiveCollab\SDK\Client;
use ActiveCollab\SDK\Exceptions\AppException;

class Request 
{
    private $client;
    private $project_number = 27;
    
    public function __construct($token) 
    {
        $client = new Client($token);
        $this->client = $client;
    }    
}




