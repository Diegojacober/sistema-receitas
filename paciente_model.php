<?php

class Paciente {
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

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}
}
?>