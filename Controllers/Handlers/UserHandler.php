<?php
//require_once '../Conexao.php';
//require_once '../../Models/User.php';

?>

<?php
use BD\Conexao;
session_start();
class UserHandler
{

    // public static function checkLogin()
    // {


    //     if (!empty($_SESSION['token'])) {
    //         $token = $_SESSION['token'];

    //         $data = User::select()->where('token', $token)->one();
    //         if (!empty($data)) {
    //             $loggedUser = new User();
    //             $loggedUser->id = $data['id'];
    //             $loggedUser->email = $data['email'];
    //             $loggedUser->nome = $data['nome'];
    //             $loggedUser->avatar = $data['avatar'];


    //             return $loggedUser;
    //         }
    //     }
    //     return false;
    // }

    public static function verifyLogin($email, $password)
    {
        $flash = '';
        $log = false;
        $conexao = new Conexao();
        $usuario = new User($conexao);
        $user = $usuario->selectEmail($email);
        if ($user) {
           
            if ($password === $user[0]['senha']) {
                $_SESSION['userid'] = $user[0]['id'];
                return $log = true;
            }
            else{
                return $flash = 'Usuário ou Senha incorretos';
            }
        } else {
            return  $flash = 'Usuário não encontrado';
         }
    }
}

//$data = UserHandler::verifyLogin('diegoalencar.jacober@gmail.com','123456');

//print_r($data);