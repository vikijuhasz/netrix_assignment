<?php 

session_start();
require_once('../vendor/autoload.php');

use App\Classes\User;
use App\Classes\Request;

// !!! validation 
$email = $_POST['email'];
$password = $_POST['password'];
$user = new User($email, $password);
$token = $user->connectToACAccount();

$request = new Request($token);
$tasks = $request->getTasks();
$_SESSION['tasks'] = $tasks;



