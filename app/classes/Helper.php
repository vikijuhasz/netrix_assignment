<?php

namespace App\Classes;

class Helper
{
    public static function makeTasksArrayForDisplay($tasks)
    { 
        $tasksArr = [];
        foreach ($tasks['tasks'] as $task) {          
            $tasksArr[$task['updated_on']] = ['name' => $task['name'], 'body' => $task['body']];                            
        } 

        krsort($tasksArr);
        return $tasksArr;
    }
}