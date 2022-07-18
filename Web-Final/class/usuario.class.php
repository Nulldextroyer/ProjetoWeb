<?php 

class usuario {
    private $idUsuario;
    private $nome;
    private $sobrenome;
	private $nomeUsuario;
    private $senha;
    private $cpf;
    private $email;
    private $numeroTelefone;
    private $enderecoRua;
    private $enderecoNumero;
    private $idNivelAcesso;

    public function __construct($idUsuario,$nome,$sobrenome,$nomeUsuario,$senha,$cpf,$email,$numeroTelefone,$enderecoRua,$enderecoNumero,$idNivelAcesso) {
		$this->setIdUsuario($idUsuario);
		$this->setNome($nome);
        $this->setSobrenome($sobrenome);
		$this->setNomeUsuario($nomeUsuario);
        $this->setSenha($senha);
        $this->setCpf($cpf);
        $this->setEmail($email);
        $this->setNumeroTelefone($numeroTelefone);
        $this->setEnderecoRua($enderecoRua);
        $this->setEnderecoNumero($enderecoNumero);
        $this->setIdNivelAcesso($idNivelAcesso);
	}

    public function setIdUsuario($idUsuario) {
		if ($idUsuario >= 0) {
			$this->idUsuario = $idUsuario;
		}
	}

	public function getIdUsuario() {
		return $this->idUsuario;
	}

    public function setNome($nome) {
		if (strlen($nome) >= 0) {
			$this->nome = $nome;
		}
	}

	public function getNome() {
		return $this->nome;
	}

    public function setSobrenome($sobrenome) {
		if (strlen($sobrenome) >= 0) {
			$this->sobrenome = $sobrenome;
		}
	}

	public function getSobrenome() {
		return $this->sobrenome;
	}

	public function setNomeUsuario($nomeUsuario) {
		if (strlen($nomeUsuario) >= 0) {
			$this->nomeUsuario = $nomeUsuario;
		}
	}

	public function getNomeUsuario() {
		return $this->nomeUsuario;
	}

    public function setSenha($senha) {
		if ($senha >= 0) {
			$this->senha = $senha;
		}
	}

	public function getSenha() {
		return $this->senha;
	}

    public function setCpf($cpf) {
		if ($cpf >= 0) {
			$this->cpf = $cpf;
		}
	}

	public function getCpf() {
		return $this->cpf;
	}

    public function setEmail($email) {
		if (strlen($email) >= 0) {
			$this->email = $email;
		}
	}

	public function getEmail() {
		return $this->email;
	}

    public function setNumeroTelefone($numeroTelefone) {
		if ($numeroTelefone >= 0) {
			$this->numeroTelefone = $numeroTelefone;
		}
	}

	public function getNumeroTelefone() {
		return $this->numeroTelefone;
	}

    public function setEnderecoRua($enderecoRua) {
		if (strlen($enderecoRua) >= 0) {
			$this->enderecoRua = $enderecoRua;
		}
	}

	public function getEnderecoRua() {
		return $this->enderecoRua;
	}

    public function setEnderecoNumero($enderecoNumero) {
		if ($enderecoNumero >= 0) {
			$this->enderecoNumero = $enderecoNumero;
		}
	}

	public function getEnderecoNumero() {
		return $this->enderecoNumero;
	}

    public function setIdNivelAcesso($idNivelAcesso) {
		if ($idNivelAcesso >= 0) {
			$this->idNivelAcesso = $idNivelAcesso;
		}
	}

	public function getIdNivelAcesso() {
		return $this->idNivelAcesso;
	}

    public function __toString() {
		return "[Usuário] Id Usuário: ".$this->idUsuario."/".
		"Nome: ".$this->nome."/".
		"Sobrenome: ".$this->sobrenome."/".
		"Nome usuario: ".$this->nomeUsuario."/".
		"Senha: ".$this->senha."/".
		"Cpf: ".$this->cpf."/". 
		"E-mail: ".$this->email."/".
		"Numero de telefone: ".$this->numeroTelefone."/".
        "Nome da rua:".$this->enderecoRua."/".
        "Numero da casa:".$this->enderecoNumero."/".
        "Id nivel acesso:".$this->idNivelAcesso;
	}
}

?>
