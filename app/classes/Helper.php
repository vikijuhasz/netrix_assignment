<?php

namespace App\Classes;

class Helper
{
    public static function makeArrayOfTasksOfAssignee($tasksResponse, $assigneeId, $numOfTasks)
    { 
        $tasksArr = [];
        foreach ($tasksResponse['tasks'] as $task) { 
            if ($task['assignee_id'] == $assigneeId) {
                $tasksArr[$task['updated_on']] = ['name' => $task['name'], 'body' => $task['body']]; 
            }                          
        } 
        
        krsort($tasksArr);
        $tasksArrSlice = array_slice($tasksArr, 0, $numOfTasks, true);
        return $tasksArrSlice;
    }
}