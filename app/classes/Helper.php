<?php

namespace App\Classes;

class Helper
{
    public static function makeTasksArrayForDisplayOfAssignee($tasks, $assignee_id, $noOfTasks)
    { 
        $tasksArr = [];
        foreach ($tasks['tasks'] as $task) { 
            if ($task['assignee_id'] == $assignee_id) {
                $tasksArr[$task['updated_on']] = ['name' => $task['name'], 'body' => $task['body']]; 
            }                          
        } 
        
        krsort($tasksArr);
        $tasksArrSlice = array_slice($tasksArr, 0, $noOfTasks, true);
        return $tasksArrSlice;
    }
}