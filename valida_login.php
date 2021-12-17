<?php

session_start();
$_SESSION['x'] = 'Oi, eu sou um valor de sessão!';
print_r($_SESSION);
echo '<hr/>';
print_r($_SESSION['y']);


//VARIAVEL QUE VERIFICA SE A AUTENTICAÇÃO FOI REALIZADA
$usuario_autenticado = false;
$usuario_id = null;
$usuario_perfil_id = null;

$perfis = array(1 => 'Administrativo', 2=> 'Usuário');

//USUARIOS DO SISTEMA
$usuarios_app = array(
    array('id'=>1,'email' => 'adm@thiago.com', 'senha' => '9630','perfil_id'=> 1),
    array('id'=>2,'email' => 'usuarios@montemor', 'senha' => 'montemor','perfil_id'=> 2),
    array('id'=>3,'email' => 'usuarios@capivari', 'senha' => 'capivari','perfil_id'=> 3),
    array('id'=>4,'email' => 'usuarios@clientes', 'senha' => '123456','perfil_id'=> 4)
);
/*

echo '<pre>';
print_r($usuarios_app);
echo '</pre>';

*/

foreach($usuarios_app as $user){
    /*
    echo 'Usuario app: ' . $user['email'] . '/' . $user['senha'];
    echo '<br />';
    echo 'Usuario form: ' . $_POST['email'] . '/' . $_POST['senha'];
    echo '<hr />';
    */
    if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
        $usuario_autenticado = true;
        $usuario_id = $user['id'];
        $usuario_perfil_id = $user['perfil_id'];
    }
}

    if($usuario_autenticado){
        echo 'Usuário autenticado.';

        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: home.php');
    }else{  
        $_SESSION['autenticado'] = 'NÃO';
        header('Location: index.php?login=erro');
      }


/*
print_r($_GET)

echo '<br />'
echo $_GET['email']
echo '<br />'
echo $_GET['senha']
print_r($_POST);
*/

?>