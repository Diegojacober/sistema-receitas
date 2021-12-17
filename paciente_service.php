<?php


//CRUD
class PacienteService {

	private $conexao;
	private $paciente;

	public function __construct(Conexao $conexao, Paciente $paciente) {
		$this->conexao = $conexao->conectar();
		$this->paciente = $paciente;
	}

	public function inserir() { //create
		    $query = "INSERT INTO tb_pacientes(id_cidade, nome, idade, olho_direito_esferico, olho_direito_cilindrico,olho_direito_eixo,
        olho_esquerdo_esferico, olho_esquerdo_cilindrico, olho_esquerdo_eixo, adicao, descricao) 
        VALUES (:cidade,:nome,:idade, :od_esferico, :od_cilindrico, :od_eixo, :oe_esferico, :oe_cilindrico, :oe_eixo, :adicao, :descricao);";
       $stmt = $this->conexao->prepare($query);
       $stmt->bindValue(':cidade', $this->paciente->__get('id_cidade'));
       $stmt->bindValue(':nome', $this->paciente->__get('nome'));
       $stmt->bindValue(':idade', $this->paciente->__get('idade'));
       $stmt->bindValue(':od_esferico', $this->paciente->__get('olho_direito_esferico'));
       $stmt->bindValue(':od_cilindrico', $this->paciente->__get('olho_direito_cilindrico'));
       $stmt->bindValue(':od_eixo', $this->paciente->__get('olho_direito_eixo'));
       $stmt->bindValue(':oe_esferico', $this->paciente->__get('olho_esquerdo_esferico'));
       $stmt->bindValue(':oe_cilindrico', $this->paciente->__get('olho_esquerdo_cilindrico'));
       $stmt->bindValue(':oe_eixo', $this->paciente->__get('olho_esquerdo_eixo'));
       $stmt->bindValue(':adicao', $this->paciente->__get('adicao'));
       $stmt->bindValue(':descricao', $this->paciente->__get('descricao'));
     
       $stmt->execute();
       
    




	
		//header('Location: home.php?sucesso');
	}
	public function pesquisarM()
	{
		$pesquisa = $_GET['nome'];
		$query = "
			select * from tb_pacientes where nome LIKE '%$pesquisa%' and id_cidade = 1
		";
		$stmt = $this->conexao->prepare($query);
		
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	public function pesquisarCl()
	{
		$pesquisa = $_GET['nome'];
		$query = "
			select * from tb_pacientes where nome LIKE '%$pesquisa%' and id_cidade = 3
		";
		$stmt = $this->conexao->prepare($query);
		
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function pesquisar()
	{
		$pesquisa = $_GET['nome'];
		$query = "
			select * from tb_pacientes where nome LIKE '%$pesquisa%' 
		";
		$stmt = $this->conexao->prepare($query);
		
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function pesquisarC()
	{
		$pesquisa = $_GET['nome'];
		$query = "
			select * from tb_pacientes where nome LIKE '%$pesquisa%' and id_cidade = 2
		";
		$stmt = $this->conexao->prepare($query);
		
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function recuperarM($limit,$offset) { //read
		$query ="select id,nome,idade,olho_direito_esferico,olho_direito_cilindrico,olho_direito_eixo,
        olho_esquerdo_esferico,olho_esquerdo_cilindrico,olho_esquerdo_eixo,
        adicao, descricao
        ,DATE_FORMAT(data_cadastrado,'%d/%m/%Y %H:%i') as data
        FROM tb_pacientes 
        where id_cidade = 1
         order by data desc
         limit
         $limit
         offset
        $offset";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	public function recuperarC($limit,$offset) { //read
		$query ="select id,nome,idade,olho_direito_esferico,olho_direito_cilindrico,olho_direito_eixo,
        olho_esquerdo_esferico,olho_esquerdo_cilindrico,olho_esquerdo_eixo,
        adicao, descricao
        ,DATE_FORMAT(data_cadastrado,'%d/%m/%Y %H:%i') as data
        FROM tb_pacientes 
        where id_cidade = 2
         order by data desc
         limit
         $limit
         offset
        $offset";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	public function recuperarCl($limit,$offset) { //read
		$query ="select id,nome,idade,olho_direito_esferico,olho_direito_cilindrico,olho_direito_eixo,
        olho_esquerdo_esferico,olho_esquerdo_cilindrico,olho_esquerdo_eixo,
        adicao, descricao
        ,DATE_FORMAT(data_cadastrado,'%d/%m/%Y %H:%i') as data
        FROM tb_pacientes 
        where id_cidade = 3
         order by data desc
         limit
         $limit
         offset
        $offset";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	public function getTotalregistros($cidade){
        $query = "select count(*) as total
        FROM tb_pacientes as t
         where id_cidade = $cidade";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
	public function recuperarUm() { //read
		$query = '
			select * from tb_pacientes where id = :id
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $_GET['id']);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function atualizar() { //update
	//	update tb_tarefas set tarefa = ? where id = ?
		$query = 'update tb_pacientes set nome = :nome, idade = :idade, olho_direito_esferico = :od_esferico, olho_direito_cilindrico = :od_cilindrico, olho_direito_eixo = :od_eixo,
		olho_esquerdo_esferico = :oe_esferico, olho_esquerdo_cilindrico = :oe_cilindrico , olho_esquerdo_eixo = :oe_eixo,
		adicao = :adicao, descricao = :descricao where id = :id;';
	   $stmt = $this->conexao->prepare($query);
	   $stmt->bindValue(':id',$_GET['id']);
	   $stmt->bindValue(':nome', $this->paciente->__get('nome'));
	   $stmt->bindValue(':idade', $this->paciente->__get('idade'));
	   $stmt->bindValue(':od_esferico', $this->paciente->__get('olho_direito_esferico'));
	   $stmt->bindValue(':od_cilindrico', $this->paciente->__get('olho_direito_cilindrico'));
	   $stmt->bindValue(':od_eixo', $this->paciente->__get('olho_direito_eixo'));
	   $stmt->bindValue(':oe_esferico', $this->paciente->__get('olho_esquerdo_esferico'));
	   $stmt->bindValue(':oe_cilindrico', $this->paciente->__get('olho_esquerdo_cilindrico'));
	   $stmt->bindValue(':oe_eixo', $this->paciente->__get('olho_esquerdo_eixo'));
	   $stmt->bindValue(':adicao', $this->paciente->__get('adicao'));
	   $stmt->bindValue(':descricao', $this->paciente->__get('descricao'));
	$stmt->execute(); 
        
	}

	public function remover() { //delete

		$query = 'delete from tb_pacientes where id = :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->paciente->__get('id'));
		$stmt->execute();
	}

}

?>