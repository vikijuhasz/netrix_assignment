<?php

namespace App\Classes;

use ActiveCollab\SDK\Client;
use ActiveCollab\SDK\Exceptions\AppException;

class Request 
{
    private $client;
    private $project_number = 34;
    
    public function __construct($token) 
    {
        $client = new Client($token);
        $this->client = $client;
    }   
    
    public function getTasks()
    {
        $tasks = $this->client->get('projects/' . $this->project_number. '/tasks')->getJson();
        return $tasks;
    }
}




