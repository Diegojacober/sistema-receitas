<?php

use BD\Conexao;


class User
{
    private $conexao;
    public function __construct(Conexao $conexao)
    {
        $this->conexao = $conexao->conectar();
    }

    public function selectEmail($email)
    {
        $query = "
			select email,senha,id from tb_usuarios where email = :email 
		";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(count($data) > 0)
        {
            //return $data[0]['id'];
            return $data;
        }
        else{
            return false;
        }
    }
}

// $con = new Conexao();
// $user = new User($con);
// echo($user->selectEmail('diegoalencar'));

