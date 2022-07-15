<?php

class autor {
	private $idAutor;
	private $nomeCompleto;

    public function __construct($idAutor,$nomeCompleto) {
		$this->setIdAutor($idAutor);
		$this->setNomeCompleto($nomeCompleto);
	}

	public function setIdAutor($idAutor) {
		if ($idAutor >= 0) {
			$this->idAutor = $idAutor;
		}
	}

	public function getIdAutor() {
		return $this->idAutor;
	}

	public function setNomeCompleto($nomeCompleto) {
		if (strlen($nomeCompleto) >= 0) {
			$this->nomeCompleto = $nomeCompleto;
		}
	}

	public function getNomeCompleto() {
		return $this->nomeCompleto;
	}

    public function __toString() {
		return "[Autor] Id Autor: ".$this->idAutor."/".
		"Nome : ".$this->nomeCompleto;
	}
}
?>