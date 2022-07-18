<?php

class livro {
	private $idLivro;
	private $titulo;
	private $dataPublicacao;
	private $idAutor;
	private $idEditora;
	private $idGenero;
	private $idCondicao;


    public function __construct($idLivro,$titulo,$dataPublicacao,$idAutor,$idEditora,$idGenero,$idCondicao) {
		$this->setIdLivro($idLivro);
		$this->setTitulo($titulo);
		$this->setDataPublicacao($dataPublicacao);
		$this->setIdAutor($idAutor);
		$this->setIdEditora($idEditora);
		$this->setIdGenero($idGenero);
		$this->setIdCondicao($idCondicao);

	}

	public function setIdLivro($idLivro) {
		if ($idLivro >= 0) {
			$this->idLivro = $idLivro;
		}
	}

	public function getIdLivro() {
		return $this->idLivro;
	}

	public function setTitulo($titulo) {
		if (strlen($titulo) >= 0) {
			$this->titulo = $titulo;
		}
	}

	public function getTitulo() {
		return $this->titulo;
	}

	public function setDataPublicacao($dataPublicacao) {
		$this->dataPublicacao = $dataPublicacao;
	}

	public function getDataPublicacao() {
		return $this->dataPublicacao;
	}
	public function setIdAutor($idAutor) {
		if ($idAutor >= 0) {
			$this->idAutor = $idAutor;
		}
	}

	public function getIdAutor() {
		return $this->idAutor;
	}

	public function setIdEditora($idEditora) {
		if ($idEditora >= 0) {
			$this->idEditora = $idEditora;
		}
	}

	public function getIdEditora() {
		return $this->idEditora;
	}

	

	public function setIdGenero($idGenero) {
		if ($idGenero >= 0) {
			$this->idGenero = $idGenero;
		}
	}

	public function getIdGenero() {
		return $this->idGenero;
	}

	public function setIdCondicao($idCondicao) {
		if ($idCondicao >= 0) {
			$this->idCondicao = $idCondicao;
		}
	}

	public function getIdCondicao() {
		return $this->idCondicao;
	}

	public function __toString() {
		return "[Livro] Id Livro: ".$this->idLivro."/".
		"Titulo: ".$this->titulo."/".
		"Data de publicação: ".$this->dataPublicacao."/".
		"Autor: ".$this->idAutor."/".
		"Editora: ".$this->idEditora."/". 
		"Gênero: ".$this->idGenero."/".
		"Condição do livro: ".$this->idCondicao;
	}

}

?>