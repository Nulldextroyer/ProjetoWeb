<?php
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    require_once "../class/condicao.class.php";

    $acao = "";
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET' : $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; break;
        case 'POST': $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; break;
    }

    if ($acao == 'salvar'){
        if ($_POST['idCondicao'] == 0)
            salvar();
        else
            editar();
    }elseif ($acao == 'excluir'){
        excluir($_GET['idCondicao']);
    }

    function salvar(){
        $pdo = Conexao::getInstance();
        $condicaoB = buildCondicao();
        $stmt = $pdo-> prepare('INSERT INTO condicoes (condicao, descricao) VALUES(:condicao, :descricao)');
        $stmt->bindParam(':condicao', $condicao, PDO::PARAM_STR);
        $condicao = $condicaoB->getCondicao();
        $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $descricao = $condicaoB->getDescricao();
        $stmt->execute();
        header("location:../index.php");
    }

    function editar(){
        $pdo = Conexao::getInstance();
        $condicaoB = buildCondicao();
        $stmt = $pdo->prepare('UPDATE condicoes SET condicao = :condicao, descricao = :descricao WHERE idCondicao = :idCondicao');
        $stmt->bindParam(':condicao', $condicao, PDO::PARAM_STR);
        $condicao = $condicaoB->getCondicao();
        $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $descricao = $condicaoB->getDescricao();
        $stmt->bindParam(':idCondicao', $idCondicao, PDO::PARAM_INT);
        $idCondicao = $condicaoB->getIdCondicao();
        $stmt->execute();
        header("location:../index.php");
    }

    function buscar($idCondicao){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('SELECT * FROM condicoes WHERE idCondicao = :idCondicao');
        $stmt->bindParam(':idCondicao', $idCondicao, PDO::PARAM_INT);
        $consulta = $stmt->execute();
        $condicaoB = new Condicao(0,"","");
        foreach ($stmt->fetchAll() as $linha) 
            $condicaoB = new Condicao($linha['idCondicao'],$linha['condicao'],$linha['descricao']);
        return $condicaoB;
    }

    function excluir($idCondicao){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE FROM condicoes WHERE idCondicao = :idCondicao');
        $stmt->bindParam('idCondicao', $idCondicao, PDO::PARAM_INT);
        $stmt->execute();
        header("location:../listaCondicoes.php");
    }

    function buildCondicao(){
        $condicaoB = new Condicao($_POST['idCondicao'],$_POST['condicao'],$_POST['descricao']);
        return $condicaoB;
    }

?>