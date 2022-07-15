<?php

class livro {
	private $idLivro;
	private $titulo;
	private $autor;
	private $editora;
	private $dataPublicacao;
	private $genero;
	private $condicao;


    public function __construct($idLivro,$titulo,$autor,$editora,$dataPublicacao,$genero,$condicao) {
		$this->setIdLivro($idLivro);
		$this->setTitulo($titulo);
		$this->setAutor($autor);
		$this->setEditora($editora);
		$this->setDataPublicacao($dataPublicacao);
		$this->setGenero($genero);
		$this->setCondicao($condicao);

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

	public function setAutor($autor) {
		if (strlen($autor) >= 0) {
			$this->autor = $autor;
		}
	}

	public function getAutor() {
		return $this->autor;
	}

	public function setEditora($editora) {
		if (strlen($editora) >= 0) {
			$this->editora = $editora;
		}
	}

	public function getEditora() {
		return $this->editora;
	}

	public function setDataPublicacao($dataPublicacao) {
		$this->dataPublicacao = $dataPublicacao;
	}

	public function getDataPublicacao() {
		return $this->dataPublicacao;
	}

	public function setGenero($genero) {
		if (strlen($genero) >= 0) {
			$this->genero = $genero;
		}
	}

	public function getGenero() {
		return $this->genero;
	}

	public function setCondicao($condicao) {
		if (strlen($condicao) >= 0) {
			$this->condicao = $condicao;
		}
	}

	public function getCondicao() {
		return $this->condicao;
	}

	public function __toString() {
		return "[Livro] Id Livro: ".$this->idLivro."/".
		"Titulo: ".$this->titulo."/".
		"Autor: ".$this->autor."/".
		"Editora: ".$this->editora."/". 
		"Data de publicação: ".$this->dataPublicacao."/". 
		"Gênero: ".$this->genero."/".
		"Condição do livro: ".$this->condicao."/";
	}

}

?>