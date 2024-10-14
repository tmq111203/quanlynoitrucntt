<?php
/**
 * Created by PhpStorm.
 * User: MewMew
 * Date: 3/6/2019
 * Time: 7:33
 */
require_once "Controllers/Controller.php";

session_start();

// controller
$Controller = new Controller();
$action =isset($_GET['action'])? $_GET['action']:null;

if(isset($_POST['dangnhap'])){
    $Controller->dologin();
  }
if(isset($_POST['goadmin'])){
    $Controller->getPageAdmin();
}
switch ($action){
    // giay
    case 'pagehome':
        $Controller->getPageHome();
        break;
    case 'goadmin':
        $Controller->getPageAdmin();
        break;
    // chuc nang
    default:
        $Controller->getPageHome();
        break;
}
