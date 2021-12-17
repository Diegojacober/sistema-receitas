<?php


namespace App\Controller;

use App\Model\Usuario;
use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action{

    public function autenticar (){
        $usuario = Container::getModel('Usuario');

        $retorno = $usuario->autenticar();
  if($_SESSION['perfil_id'] == 1)
  {
      echo $usuario->__get('id');
    header('Location: /homeADM');
  }
  else if($_SESSION['perfil_id'] == 2)
  {
    header('Location: /home');
  }
  else if($_SESSION['perfil_id'] == 3)
  {
    header('Location: /homec');
  }
  else{
    header('Location: /?login=erro');
  }
 
  
       

        

    }
    public function Sair(){
        session_start();
        session_unset();
        session_destroy();

        header('Location: /');
        
    }


}


?>