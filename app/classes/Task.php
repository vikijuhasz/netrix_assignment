<?php

namespace App\Classes;

use ActiveCollab\SDK\Client;

class Task 
{
    private $client;
    private $projectNumber = 34;
    
    public function __construct($token) 
    {
        $client = new Client($token);
        $this->client = $client;
    }   
    
    public function getTasks()
    {
        $tasks = $this->client->get('projects/' . $this->projectNumber. '/tasks')->getJson();
        return $tasks;
    }
}




