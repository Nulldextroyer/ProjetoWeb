<?php
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    require_once "../class/editora.class.php";

    $acao = "";
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET' : $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; break;
        case 'POST': $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; break;
    }

    if ($acao == 'salvar'){
        if ($_POST['idEditora'] == 0)
            salvar();
        else
            editar();
    }elseif ($acao == 'excluir'){
        excluir($_GET['idEditora']);
    }

    function salvar(){
        $pdo = Conexao::getInstance();
        $editora = buildEditora();
        $stmt = $pdo-> prepare('INSERT INTO editoras (nome, cnpj, numeroTelefone) VALUES(:nome, :cnpj,:numeroTelefone)');
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $nome = $editora->getNome();
        $stmt->bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
        $cnpj = $editora->getCnpj();
        $stmt->bindParam(':numeroTelefone', $numeroTelefone, PDO::PARAM_STR);
        $numeroTelefone = $editora->getNumeroTelefone();
        $stmt->execute();
        header("location:../index.php");
    }

    function editar(){
        $pdo = Conexao::getInstance();
        $editora = buildEditora();
        $stmt = $pdo->prepare('UPDATE editoras SET nome = :nome, cnpj = :cnpj, numeroTelefone = :numeroTelefone WHERE idEditora = :idEditora');
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $nome = $editora->getNome();
        $stmt->bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
        $cnpj = $editora->getCnpj();
        $stmt->bindParam(':numeroTelefone', $numeroTelefone, PDO::PARAM_STR);
        $numeroTelefone = $editora->getNumeroTelefone();
        $stmt->bindParam(':idEditora', $idEditora, PDO::PARAM_INT);
        $idEditora = $editora->getIdEditora();
        $stmt->execute();
        header("location:../index.php");
    }

    function buscar($idEditora){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('SELECT * FROM editoras WHERE idEditora = :idEditora');
        $stmt->bindParam(':idEditora', $idEditora, PDO::PARAM_INT);
        $consulta = $stmt->execute();
        $editora = new Editora(0,"","","");
        foreach ($stmt->fetchAll() as $linha) 
            $editora = new Editora($linha['idEditora'],$linha['nome'],$linha['cnpj'],$linha['numeroTelefone']);
        return $editora;
    }

    function excluir($idEditora){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE FROM editoras WHERE idEditora = :idEditora');
        $stmt->bindParam('idEditora', $idEditora, PDO::PARAM_INT);
        $stmt->execute();
        header("location:../listaEditoras.php");
    }

    function buildEditora(){
        $editora = new Editora($_POST['idEditora'],$_POST['nome'],$_POST['cnpj'],$_POST['numeroTelefone']);
        return $editora;
    }

?>