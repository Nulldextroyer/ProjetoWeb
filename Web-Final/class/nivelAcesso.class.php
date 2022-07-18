<?php

class Acesso {
	private $idNivelAcesso;
	private $nivelAcesso;

    public function __construct($idNivelAcesso,$nivelAcesso) {
		$this->setIdNivelAcesso($idNivelAcesso);
		$this->setNivelAcesso($nivelAcesso);
	}

	public function setIdNivelAcesso($idNivelAcesso) {
		if ($idNivelAcesso >= 0) {
			$this->idNivelAcesso = $idNivelAcesso;
		}
	}

	public function getIdNivelAcesso() {
		return $this->idNivelAcesso;
	}

	public function setNivelAcesso($nivelAcesso) {
		if (strlen($nivelAcesso) >= 0) {
			$this->nivelAcesso = $nivelAcesso;
		}
	}

	public function getNivelAcesso() {
		return $this->nivelAcesso;
	}

    public function __toString() {
		return "[Gênero] Id Nivel acesso: ".$this->idNivelAcesso."/".
		"Nivel acesso: ".$this->nivelAcesso;
	}
}
?>