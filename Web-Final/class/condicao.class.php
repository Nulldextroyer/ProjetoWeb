<?php

class condicao {
	private $idCondicao;
	private $condicao;
	private $descricao;

    public function __construct($idCondicao,$condicao,$descricao) {
		$this->setIdCondicao($idCondicao);
		$this->setCondicao($condicao);
		$this->setDescricao($descricao);
	}

	public function setIdCondicao($idCondicao) {
		if ($idCondicao >= 0) {
			$this->idCondicao = $idCondicao;
		}
	}

	public function getIdCondicao() {
		return $this->idCondicao;
	}

	public function setCondicao($condicao) {
		if (strlen($condicao) >= 0) {
			$this->condicao = $condicao;
		}
	}

	public function getCondicao() {
		return $this->condicao;
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
		return "[Condição] Id Condição: ".$this->idCondicao."/".
		"Condição: ".$this->condicao."/".
		"Descricao: ".$this->descricao;
	}
}
?>