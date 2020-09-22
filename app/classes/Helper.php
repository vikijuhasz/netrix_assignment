<?php

namespace App\Classes;

class Helper
{
    public static function makeTasksArrayOfAssignee($tasks, $assignee_id)
    { 
        $tasksArr = [];
        foreach ($tasks['tasks'] as $task) { 
            if ($task['assignee_id'] == $assignee_id) {
                $tasksArr[$task['updated_on']] = ['name' => $task['name'], 'body' => $task['body']]; 
            }                          
        } 
        
        krsort($tasksArr);
        return $tasksArr;
    }
}