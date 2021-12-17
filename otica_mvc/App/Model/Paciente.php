<?php
namespace App\Model;

use MF\Model\Model;

class Paciente extends Model {
	private $id;
	private $id_cidade;
	private $nome;
    private $idade;
    private $olho_direito_esferico;
    private $olho_direito_cilindrico;
    private $olho_direito_eixo;
    private $olho_esquerdo_esferico;
    private $olho_esquerdo_cilindrico;
    private $olho_esquerdo_eixo;
    private $adicao;
    private $descricao;
	private $data_cadastro;

    public function __get($atributo)
{
    return $this->$atributo;
}
public function __set($atributo, $valor)
{
    $this->$atributo = $valor;
}

    public function salvar()
    {
        $query = "INSERT INTO tb_pacientes(id_cidade, nome, idade, olho_direito_esferico, olho_direito_cilindrico,olho_direito_eixo,
        olho_esquerdo_esferico, olho_esquerdo_cilindrico, olho_esquerdo_eixo, adicao, descricao) 
        VALUES (:cidade,:nome,:idade, :od_esferico, :od_cilindrico, :od_eixo, :oe_esferico, :oe_cilindrico, :oe_eixo, :adicao, :descricao);";
       $stmt = $this->db->prepare($query);
       $stmt->bindValue(':cidade', $this->__get('id_cidade'));
       $stmt->bindValue(':nome', $this->__get('nome'));
       $stmt->bindValue(':idade', $this->__get('idade'));
       $stmt->bindValue(':od_esferico', $this->__get('olho_direito_esferico'));
       $stmt->bindValue(':od_cilindrico', $this->__get('olho_direito_cilindrico'));
       $stmt->bindValue(':od_eixo', $this->__get('olho_direito_eixo'));
       $stmt->bindValue(':oe_esferico', $this->__get('olho_esquerdo_esferico'));
       $stmt->bindValue(':oe_cilindrico', $this->__get('olho_esquerdo_cilindrico'));
       $stmt->bindValue(':oe_eixo', $this->__get('olho_esquerdo_eixo'));
       $stmt->bindValue(':adicao', $this->__get('adicao'));
       $stmt->bindValue(':descricao', $this->__get('descricao'));
     
       $stmt->execute();

       return $this;
    }
    public function getPorPagina($limit,$offset,$cidade){
        $query = "select id,nome,idade,olho_direito_esferico,olho_direito_cilindrico,olho_direito_eixo,
        olho_esquerdo_esferico,olho_esquerdo_cilindrico,olho_esquerdo_eixo,
        adicao, descricao
        ,DATE_FORMAT(data_cadastrado,'%d/%m/%Y %H:%i') as data
        FROM tb_pacientes 
        where id_cidade = $cidade
         order by data desc
         limit
         $limit
         offset
        $offset";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getTotalregistros($cidade){
        $query = "select count(*) as total
        FROM tb_pacientes as t
         where id_cidade = $cidade";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function pesquisarC()
	{
		$pesquisa = $_GET['nome'];
		$query = "
        select id,nome,idade,olho_direito_esferico,olho_direito_cilindrico,olho_direito_eixo,
        olho_esquerdo_esferico,olho_esquerdo_cilindrico,olho_esquerdo_eixo,
        adicao, descricao
        ,DATE_FORMAT(data_cadastrado,'%d/%m/%Y %H:%i') as data from tb_pacientes where nome LIKE '%$pesquisa%' and id_cidade = 2
		";
		$stmt = $this->db->prepare($query);
		
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_OBJ);
	}
    public function pesquisarM()
	{
		$pesquisa = $_GET['nome'];
		$query = "
        select id,nome,idade,olho_direito_esferico,olho_direito_cilindrico,olho_direito_eixo,
        olho_esquerdo_esferico,olho_esquerdo_cilindrico,olho_esquerdo_eixo,
        adicao, descricao
        ,DATE_FORMAT(data_cadastrado,'%d/%m/%Y %H:%i') as data from tb_pacientes where nome LIKE '%$pesquisa%' and id_cidade = 1
		";
		$stmt = $this->db->prepare($query);
		
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_OBJ);
	}
    public function pesquisarTD()
	{
		$pesquisa = $_GET['nome'];
		$query = "
        select id,nome,idade,olho_direito_esferico,olho_direito_cilindrico,olho_direito_eixo,
        olho_esquerdo_esferico,olho_esquerdo_cilindrico,olho_esquerdo_eixo,
        adicao, descricao
        ,DATE_FORMAT(data_cadastrado,'%d/%m/%Y %H:%i') as data from tb_pacientes where nome LIKE '%$pesquisa%' 
		";
		$stmt = $this->db->prepare($query);
		
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_OBJ);
	}
}
?>