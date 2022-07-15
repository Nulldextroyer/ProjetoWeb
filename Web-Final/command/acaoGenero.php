<?php
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    require_once "../class/genero.class.php";

    $acao = "";
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET' : $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; break;
        case 'POST': $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; break;
    }

    if ($acao == 'salvar'){
        if ($_POST['idGenero'] == 0)
            salvar();
        else
            editar();
    }elseif ($acao == 'excluir'){
        excluir($_GET['idGenero']);
    }

    function salvar(){
        $pdo = Conexao::getInstance();
        $genero = buildGenero();
        $stmt = $pdo-> prepare('INSERT INTO generos (classificacao, descricao) VALUES(:classificacao, :descricao)');
        $stmt->bindParam(':classificacao', $classificacao, PDO::PARAM_STR);
        $classificacao = $genero->getClassificacao();
        $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $descricao = $genero->getDescricao();
        $stmt->execute();
        header("location:../index.php");
    }

    function editar(){
        $pdo = Conexao::getInstance();
        $genero = buildGenero();
        $stmt = $pdo->prepare('UPDATE generos SET classificacao = :classificacao, descricao = :descricao WHERE idGenero = :idGenero');
        $stmt->bindParam(':classificacao', $classificacao, PDO::PARAM_STR);
        $classificacao = $genero->getClassificacao();
        $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $descricao = $genero->getDescricao();
        $stmt->bindParam(':idGenero', $idGenero, PDO::PARAM_INT);
        $idGenero = $genero->getIdGenero();
        $stmt->execute();
        header("location:../index.php");
    }

    function buscar($idGenero){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('SELECT * FROM generos WHERE idGenero = :idGenero');
        $stmt->bindParam(':idGenero', $idGenero, PDO::PARAM_INT);
        $consulta = $stmt->execute();
        $genero = new Genero(0,"","");
        foreach ($stmt->fetchAll() as $linha) 
            $genero = new Genero($linha['idGenero'],$linha['classificacao'],$linha['descricao']);
        return $genero;
    }

    function excluir($idGenero){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE FROM generos WHERE idGenero = :idGenero');
        $stmt->bindParam('idGenero', $idGenero, PDO::PARAM_INT);
        $stmt->execute();
        header("location:../listaGeneros.php");
    }

    function buildGenero(){
        $genero = new Genero($_POST['idGenero'],$_POST['classificacao'],$_POST['descricao']);
        return $genero;
    }

?>