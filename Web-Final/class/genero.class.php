<?php

class genero {
	private $idGenero;
	private $classificacao;
	private $descricao;

    public function __construct($idGenero,$classificacao,$descricao) {
		$this->setIdGenero($idGenero);
		$this->setClassificacao($classificacao);
		$this->setDescricao($descricao);
	}

	public function setIdGenero($idGenero) {
		if ($idGenero >= 0) {
			$this->idGenero = $idGenero;
		}
	}

	public function getIdGenero() {
		return $this->idGenero;
	}

	public function setClassificacao($classificacao) {
		if (strlen($classificacao) >= 0) {
			$this->classificacao = $classificacao;
		}
	}

	public function getClassificacao() {
		return $this->classificacao;
	}

    public function setDescricao($descricao) {
		if (strlen($descricao) >= 0) {
			$this->descricao = $descricao;
		}
	}

	public function getDescricao() {
		return $this->descricao;
	}

    public function __toString() {
		return "[Gênero] Id Genero: ".$this->idGenero."/".
		"Classificação: ".$this->classificacao."/".
		"Descricao: ".$this->descricao;
	}
}
?>