<?php 

    include_once "../conf/default.inc.php";
    include_once "../js/password.php";
    require_once "../conf/Conexao.php";
    

    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "logoff"){
		session_start();
		session_destroy();
		header("location:login.php");	
	}

    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "login"){
        $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
        login($usuario, $pass);
    }

    function login($usuario, $pass){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM usuarios WHERE nomeUsuario = '$usuario'");
        $nome = '';
        $pass_bd = '';
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $nome = $linha['nome'];
            $pass_bd = $linha['senha'];
        }
        if (sha1($pass) == $pass_bd){
            session_start();
			$_SESSION['usuario'] = $usuario;
			$_SESSION['nome'] = $nome;
			header("location:../index.php");	
		}else 
            header("location:../login.php?msg=Login Incorreto!");
    }
?>