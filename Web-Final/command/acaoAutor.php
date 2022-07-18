<?php
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    require_once "../class/autor.class.php";

    $acao = "";
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET' : $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; break;
        case 'POST': $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; break;
    }

    if ($acao == 'salvar'){
        if ($_POST['idAutor'] == 0)
            salvar();
        else
            editar();
    }elseif ($acao == 'excluir'){
        excluir($_GET['idAutor']);
    }

    function salvar(){
        $pdo = Conexao::getInstance();
        $autor = buildAutor();
        $stmt = $pdo-> prepare('INSERT INTO autores (nomeCompleto) VALUES(:nomeCompleto)');
        $stmt->bindParam(':nomeCompleto', $nomeCompleto, PDO::PARAM_STR);
        $nomeCompleto = $autor->getNomeCompleto();
        $stmt->execute();
        header("location:../index.php");
    }

    function editar(){
        $pdo = Conexao::getInstance();
        $autor = buildAutor();
        $stmt = $pdo->prepare('UPDATE autores SET nomeCompleto = :nomeCompleto WHERE idAutor = :idAutor');
        $stmt->bindParam(':nomeCompleto', $nomeCompleto, PDO::PARAM_STR);
        $nomeCompleto = $autor->getNomeCompleto();
        $stmt->bindParam(':idAutor', $idAutor, PDO::PARAM_INT);
        $idAutor = $autor->getIdAutor();
        $stmt->execute();
        header("location:../index.php");
    }

    function buscar($idAutor){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('SELECT * FROM autores WHERE idAutor = :idAutor');
        $stmt->bindParam(':idAutor', $idAutor, PDO::PARAM_INT);
        $consulta = $stmt->execute();
        $autor = new Autor(0,"");
        foreach ($stmt->fetchAll() as $linha) 
            $autor = new Autor($linha['idAutor'],$linha['nomeCompleto']);
        return $autor;
    }

    function excluir($idAutor){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE FROM autores WHERE idAutor = :idAutor');
        $stmt->bindParam('idAutor', $idAutor, PDO::PARAM_INT);
        $stmt->execute();
        header("location:../lists/listaAutores.php");
    }

    function buildAutor(){
        $autor = new Autor($_POST['idAutor'],$_POST['nomeCompleto']);
        return $autor;
    }

?>