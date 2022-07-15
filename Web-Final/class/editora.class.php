<?php

class editora {
	private $idEditora;
	private $nome;
    private $cnpj;
    private $numeroTelefone;

    public function __construct($idEditora,$nome,$cnpj,$numeroTelefone) {
		$this->setIdEditora($idEditora);
		$this->setNome($nome);
        $this->setCnpj($cnpj);
        $this->setNumeroTelefone($numeroTelefone);
	}

	public function setIdEditora($idEditora) {
		if ($idEditora >= 0) {
			$this->idEditora = $idEditora;
		}
	}

	public function getIdEditora() {
		return $this->idEditora;
	}

	public function setNome($nome) {
		if (strlen($nome) >= 0) {
			$this->nome = $nome;
		}
	}

	public function getNome() {
		return $this->nome;
	}

    public function setCnpj($cnpj) {
		if ($cnpj >= 0) {
			$this->cnpj = $cnpj;
		}
	}

	public function getCnpj() {
		return $this->cnpj;
	}

    public function setNumeroTelefone($numeroTelefone) {
		if ($numeroTelefone >= 0) {
			$this->numeroTelefone = $numeroTelefone;
		}
	}

	public function getNumeroTelefone() {
		return $this->numeroTelefone;
	}

    public function __toString() {
		return "[Editora] Id Editora: ".$this->idEditora."/".
		"Nome : ".$this->nome."/".
        "CNPJ : ".$this->cnpj."/".
        "Numero Telefone : ".$this->numeroTelefone;
	}
}
?>