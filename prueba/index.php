<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

session_start();

/*CONTROLADORES*/
require_once('controller/ComprasController.php');
require_once('controller/LoginController.php');

/*MODELOS*/
require_once('model/PDORepository.php');
require_once('model/LoginRepository.php');
require_once('model/ComprasRepository.php');

/*TWIG*/
require_once('view/TwigView.php');
require_once('view/TwigRenderer.php');



if(isset($_GET["action"])) {
  $action = $_GET["action"];
}else {
  $action = NULL;
}

 function chequearSesion() {
     if ((isset($_SESSION)) && (isset($_SESSION["loggedIn"])) && (isset($_SESSION["nombre"]))){
    return true;
  }else{
    return false;
  }
}

switch ($action) {
  case 'autentificar':
    if (chequearSesion()){
      ComprasController::getInstance()->cargarProducto();
      break;
    }
    LoginController::getInstance()->autentificar();
    break;
  case 'cerrarSesion':
    LoginController::getInstance()->cerrarSesion();
    break;
  case 'efectuarCarga':
  if (!chequearSesion()){
      LoginController::getInstance()->home();
      break;
  }
    ComprasController::getInstance()->efectuarCarga();
    break;
  default:
  if (chequearSesion()){
    ComprasController::getInstance()->cargarProducto();
    break;
  }
  LoginController::getInstance()->home();
    break;
}
