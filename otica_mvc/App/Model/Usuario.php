<?php

namespace App\Model;

use MF\Model\Model;

class Usuario extends Model{

private $id;
private $nome;
private $email;
private $senha;

public function __get($atributo)
{
    return $this->$atributo;
}
public function __set($atributo, $valor)
{
    $this->$atributo = $valor;
}


//salvar
public function Salvar(){
    // $query = "insert into usuarios(nome,email,senha) values(:nome,:email,:senha)";
    // $stmt = $this->db->prepare($query);
    // $stmt->bindValue(':nome',$this->__get('nome'));
    // $stmt->bindValue(':email',$this->__get('email'));
    // $stmt->bindValue(':senha',$this->__get('senha'));//md5() -> hash de 32caractres
    // $stmt->execute();

  //  return $this;
}




public function autenticar(){


//VARIAVEL QUE VERIFICA SE A AUTENTICAÇÃO FOI REALIZADA
$usuario_autenticado = false;
$usuario_id = null;
$usuario_perfil_id = null;
$autenticado = false;

//$perfis = array(1 => 'Administrativo', 2=> 'Usuário');

//USUARIOS DO SISTEMA
$usuarios_app = array(
    array('id'=>1,'email' => 'adm@thiago.com', 'senha' => '9630','perfil_id'=> 1),
    array('id'=>2,'email' => 'usuarios@montemor', 'senha' => 'montemor','perfil_id'=> 2),
    array('id'=>3,'email' => 'usuarios@capivari', 'senha' => 'capivari','perfil_id'=> 3)
);
   
foreach($usuarios_app as $user){
  
    if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
        $usuario_autenticado = true;
        $usuario_id = $user['id'];
        $usuario_perfil_id = $user['perfil_id'];
        
    }
}

    if($usuario_autenticado){
       
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        $this->__set('id',$usuario_perfil_id);
        
    }else{  
        $_SESSION['autenticado'] = 'NÃO';
   
      }

}


}

?>