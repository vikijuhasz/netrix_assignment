<?php 

session_start();
require_once('../vendor/autoload.php');

use App\Classes\User;
use App\Classes\Request;
use App\Classes\Helper;

$email = $_POST['email'];
$password = $_POST['password'];
$user = new User($email, $password);
$tokenOrErrorMessage = $user->connectToACAccount();
if (isset($_SESSION['error'])) {
    header('Location: ../index.php');
}

$request = new Request($tokenOrErrorMessage);
$tasks = $request->getTasks();

$assignee_id = 6;
$noOfTasks = 20;
$tasksForDisplay = Helper::makeTasksArrayForDisplayOfAssignee($tasks, $assignee_id, $noOfTasks);
$_SESSION['tasks'] = $tasksForDisplay;

header('Location: ../tasks.php');

