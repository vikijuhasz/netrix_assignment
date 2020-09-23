<?php 

session_start();
require_once('../vendor/autoload.php');

use App\Classes\User;
use App\Classes\Task;
use App\Classes\Helper;

$email = $_POST['email'];
$password = $_POST['password'];
$user = new User($email, $password);
$result = $user->connectToACAccount();
if (isset($_SESSION['error'])) {
    header('Location: ../index.php');
}

$task = new Task($result);
$tasksResponse = $task->getTasks();

$assigneeId = 6;
$numOfTasks = 20;
$tasks = Helper::makeArrayOfTasksOfAssignee($tasksResponse, $assigneeId, $numOfTasks);
$_SESSION['tasks'] = $tasks;

header('Location: ../tasks.php');

