<?php
require_once "Model/UserModel.php";

class LoginController
{
    private $userModel;
    function __construct(){
        $this->userModel= new UserModel();
    }

    //DEVUELVE TRUE SI EL USUARIO ESTA LOGUEADO Y ES ADMINISTRADOR
    function isAdmin(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }

        $isAdmin=false;

        if(isset($_SESSION['EMAIL'])&&(!empty($_SESSION['EMAIL']))){
            $user = $this->userModel->getUser($_SESSION['EMAIL']);
            if($user->isadmin){
                $isAdmin=true;
            }
        }
        return $isAdmin;
    }

       function isLogged(){
        $isLogged=false;
        if(session_status() == PHP_SESSION_NONE){
            session_start();
            $isLogged=true;
        }
        return $isLogged;
    }
}