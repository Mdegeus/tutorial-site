<?php
require '../Modules/Database.php';
require '../Modules/Users.php';
require '../Modules/Tutorials.php';

$request = $_SERVER['REQUEST_URI'];
$params = explode("/", $request);
$titleSuffix = "";

session_start();

switch ($params[1]) {
    case 'dashboard':
        include_once "./Templates/dashboard.php";
        break;
    case 'classes':
        include_once "./Templates/classes.php";
        break;
    case 'tutorial':
        $id = $_GET['id'];
        $tutorial = getTutorial($id);
        $items = getTutorialItems($id);
        include_once "./Templates/tutorial-page.php";
        break;
    case 'tutorials':
        $tutorials = getTutorials();
        include_once "./Templates/tutorials.php";
        break;
    case 'register':
        include_once "./Templates/register.php";
        break;
    case 'login':
        include_once "./Templates/login.php";
        break;
    case 'logout':
        session_destroy();
        header('Location: /home');
        break;
    case 'home':
    case '':
        include_once "./Templates/home.php";
        break;
    default:
        include_once "./Templates/404.php";
        break;
}
