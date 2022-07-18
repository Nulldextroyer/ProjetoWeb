<?php
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    require_once "../class/usuario.class.php";
    include_once "../js/password.php";

    $acao = "";
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET' : $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; break;
        case 'POST': $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; break;
    }

    if ($acao == 'salvar'){
        if ($_POST['idUsuario'] == 0)
            salvar();
        else
            editar();
    }elseif ($acao == 'excluir'){
        excluir($_GET['idUsuario']);
    }

    function salvar(){
        $pdo = Conexao::getInstance();
        $usuario = buildUsuario();
        $stmt = $pdo-> prepare('INSERT INTO usuarios (nome, sobrenome, nomeUsuario, senha, cpf, email, numeroTelefone, enderecoRua, enderecoNumero, idNivelAcesso) VALUES(:nome, :sobrenome, :nomeUsuario, :senha, :cpf, :email, :numeroTelefone, :enderecoRua, :enderecoNumero, :idNivelAcesso)');
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $nome = $usuario->getNome();
        $stmt->bindParam(':sobrenome', $sobrenome, PDO::PARAM_STR);
        $sobrenome = $usuario->getSobrenome();
        $stmt->bindParam(':nomeUsuario', $nomeUsuario, PDO::PARAM_STR);
        $nomeUsuario = $usuario->getNomeUsuario();
        $stmt->bindParam(':senha', sha1($senha), PDO::PARAM_STR);
        $senha = $usuario->getSenha();
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        $cpf = $usuario->getCpf();
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $email = $usuario->getEmail();
        $stmt->bindParam(':numeroTelefone', $numeroTelefone, PDO::PARAM_STR);
        $numeroTelefone = $usuario->getNumeroTelefone();
        $stmt->bindParam(':enderecoRua', $enderecoRua, PDO::PARAM_STR);
        $enderecoRua = $usuario->getEnderecoRua();
        $stmt->bindParam(':enderecoNumero', $enderecoNumero, PDO::PARAM_STR);
        $enderecoNumero = $usuario->getEnderecoNumero();
        $stmt->bindParam(':idNivelAcesso', $idNivelAcesso, PDO::PARAM_STR);
        $idNivelAcesso = $usuario->getIdNivelAcesso();
        $stmt->execute();
        header("location:../index.php");
    }

    function editar(){
        $pdo = Conexao::getInstance();
        $usuario = buildUsuario();
        $stmt = $pdo->prepare('UPDATE usuarios SET nome = :nome, sobrenome = :sobrenome, nomeUsuario = :nomeUsuario, senha = :senha, cpf = :cpf, email = :email, numeroTelefone = :numeroTelefone, enderecoRua = :enderecoRua, enderecoNumero = :enderecoNumero, idNivelAcesso = :idNivelAcesso WHERE idUsuario = :idUsuario');
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $nome = $usuario->getNome();
        $stmt->bindParam(':sobrenome', $sobrenome, PDO::PARAM_STR);
        $sobrenome = $usuario->getSobrenome();
        $stmt->bindParam(':nomeUsuario', $nomeUsuario, PDO::PARAM_STR);
        $nomeUsuario = $usuario->getNomeUsuario();
        $stmt->bindParam(':senha', sha1($senha), PDO::PARAM_STR);
        $senha = $usuario->getSenha();
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        $cpf = $usuario->getCpf();
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $email = $usuario->getEmail();
        $stmt->bindParam(':numeroTelefone', $numeroTelefone, PDO::PARAM_STR);
        $numeroTelefone = $usuario->getNumeroTelefone();
        $stmt->bindParam(':enderecoRua', $enderecoRua, PDO::PARAM_STR);
        $enderecoRua = $usuario->getEnderecoRua();
        $stmt->bindParam(':enderecoNumero', $enderecoNumero, PDO::PARAM_STR);
        $enderecoNumero = $usuario->getEnderecoNumero();
        $stmt->bindParam(':idNivelAcesso', $idNivelAcesso, PDO::PARAM_STR);
        $idNivelAcesso = $usuario->getIdNivelAcesso();
        $stmt->execute();
        header("location:../index.php");
    }

    function buscar($idUsuario){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE idUsuario = :idUsuario');
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $consulta = $stmt->execute();
        $usuario = new Usuario(0,"","","",0,0,"",0,"",0,0);
        foreach ($stmt->fetchAll() as $linha) 
            $usuario = new Usuario($linha['idUsuario'],$linha['nome'],$linha['sobrenome'],$linha['nomeUsuario'],$linha['senha'],$linha['cpf'],$linha['email'],$linha['numeroTelefone'],$linha['enderecoRua'],$linha['enderecoNumero'],$linha['idNivelAcesso']);
        return $usuario;
    }

    function excluir($idUsuario){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE FROM usuarios WHERE idUsuario = :idUsuario');
        $stmt->bindParam('idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        header("location:../lists/listaUsuarios.php");
    }

    function buildUsuario(){
        $usuario = new Usuario($_POST['idUsuario'],$_POST['nome'],$_POST['sobrenome'],$_POST['nomeUsuario'],$_POST['senha'],$_POST['cpf'],$_POST['email'],$_POST['numeroTelefone'],$_POST['enderecoRua'],$_POST['enderecoNumero'],$_POST['nivelAcesso']);
        return $usuario;
    }

?>