<?php

use BD\Conexao;

//require_once "../Controllers/Conexao.php";

class Receita
{
    private $conexao;
    public function __construct(Conexao $conexao)
    {
        $this->conexao = $conexao->conectar();
    }

    public function new($cidade,$nome,$idade,$date,$odEsferico,$odCilindrico,$odEixo,$oeEsferico,$oeCilindrico,$oeEixo,$adicao,$descricao)
    {

        $query = "
			INSERT  into  tb_pacientes (id,id_cidade,nome,idade,olho_direito_esferico,olho_direito_cilindrico,olho_direito_eixo,olho_esquerdo_esferico,olho_esquerdo_cilindrico,olho_esquerdo_eixo,adicao,descricao,data_cadastrado)
            VALUES(NULL,:cidade,:nome,:idade,:od_esferico,:od_cilindrico,:od_eixo,:oe_esferico,:oe_cilindrico,:oe_eixo,:adicao,:descricao,:data)
		";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':cidade', $cidade);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':idade', $idade);
        $stmt->bindValue(':od_esferico', $odEsferico);
        $stmt->bindValue(':od_cilindrico', $odCilindrico);
        $stmt->bindValue(':od_eixo', $odEixo);
        $stmt->bindValue(':oe_esferico', $oeEsferico);
        $stmt->bindValue(':oe_cilindrico', $oeCilindrico);
        $stmt->bindValue(':oe_eixo', $oeEixo);
        $stmt->bindValue(':adicao', $adicao);
        $stmt->bindValue(':descricao', $descricao);
        $stmt->bindValue(':data', $date);
        $stmt->execute();
        
    }


    public function updateReceita($id,$nome,$idade,$date,$odEsferico,$odCilindrico,$odEixo,$oeEsferico,$oeCilindrico,$oeEixo,$adicao,$descricao)
    {

        $query = 'update tb_pacientes set nome = :nome, idade = :idade, olho_direito_esferico = :od_esferico, olho_direito_cilindrico = :od_cilindrico, olho_direito_eixo = :od_eixo,
		olho_esquerdo_esferico = :oe_esferico, olho_esquerdo_cilindrico = :oe_cilindrico , olho_esquerdo_eixo = :oe_eixo,
		adicao = :adicao, descricao = :descricao, data_cadastrado = :data where id = :id;';
	   $stmt = $this->conexao->prepare($query);
	   $stmt->bindValue(':id',$id);
       $stmt->bindValue(':data', $date);
	   $stmt->bindValue(':nome', $nome);
	   $stmt->bindValue(':idade', $idade);
	   $stmt->bindValue(':od_esferico', $odEsferico);
	   $stmt->bindValue(':od_cilindrico', $odCilindrico);
	   $stmt->bindValue(':od_eixo', $odEixo);
	   $stmt->bindValue(':oe_esferico', $oeEsferico);
	   $stmt->bindValue(':oe_cilindrico', $oeCilindrico);
	   $stmt->bindValue(':oe_eixo', $oeEixo);
	   $stmt->bindValue(':adicao', $adicao);
	   $stmt->bindValue(':descricao', $descricao);
       $stmt->execute();
        
    }

    public function recuperar($idCidade,$limit,$offset){
        $query = "
			SELECT *,DATE_FORMAT(data_cadastrado, '%d/%m/%Y ') FROM tb_pacientes WHERE id_cidade = :idCidade
            order by data_cadastrado DESC limit
            $limit
            offset
           $offset
            ";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':idCidade', $idCidade);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function totalPorCidade($idCidade){
        $query = "select count(*) as total
        FROM tb_pacientes as t
         where id_cidade = $idCidade";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function delete($id){
        $query = 'delete from tb_pacientes where id = :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
    }

    public function search($term,$cidade){
        $query = "
        select *,DATE_FORMAT(data_cadastrado, '%d/%m/%Y ') from tb_pacientes where nome LIKE '%$term%' and id_cidade = $cidade 
    ";
    $stmt = $this->conexao->prepare($query);
    
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// $con = new Conexao();
// $receita = new Receita($con);
// echo($receita->edit(27,'PORRA',16,'2022-01-11','-0,50','0,50','100','-0,75','-1,00','180','+4,50','VAI CACETA'));
