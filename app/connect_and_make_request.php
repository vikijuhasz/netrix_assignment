<?php 

session_start();
require_once('../vendor/autoload.php');

use App\Classes\User;
use App\Classes\Request;
use App\Classes\Helper;

// !!! validation 
$email = $_POST['email'];
$password = $_POST['password'];
$user = new User($email, $password);
$token = $user->connectToACAccount();

$request = new Request($token);
$tasks = $request->getTasks();

$assignee_id = 6;
$noOfTasks = 20;
$tasksForDisplay = Helper::makeTasksArrayForDisplayOfAssignee($tasks, $assignee_id, $noOfTasks);
$_SESSION['tasks'] = $tasksForDisplay;

header('Location: ../tasks.php');

