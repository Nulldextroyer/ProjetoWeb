<?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    require_once "livro.class.php";

    $acao = "";
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET' : $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; break;
        case 'POST': $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; break;
    }


    if ($acao == 'salvar'){
        if ($_POST['idLivro'] == 0)
            salvar();
        else
            editar();
    }elseif ($acao == 'excluir'){
        excluir($_GET['idLivro']);
    }

    function salvar(){
        $pdo = Conexao::getInstance();
        $livro = buildLivro();
        $stmt = $pdo-> prepare('INSERT INTO livros (titulo, autor, editora, dataPublicacao, genero, condicao) VALUES(:titulo, :autor, :editora, :dataPublicacao, :genero, :condicao)');
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $titulo = $livro->getTitulo();
        $stmt->bindParam(':autor', $autor, PDO::PARAM_STR);
        $autor = $livro->getAutor();
        $stmt->bindParam(':editora', $editora, PDO::PARAM_STR);
        $editora = $livro->getEditora();
        $stmt->bindParam(':dataPublicacao', $dataPublicacao, PDO::PARAM_STR);
        $dataPublicacao = $livro->getDatapublicacao();
        $stmt->bindParam(':genero', $genero, PDO::PARAM_STR);
        $genero = $livro->getGenero();
        $stmt->bindParam(':condicao', $condicao, PDO::PARAM_STR);
        $condicao = $livro->getCondicao();
        $stmt->execute();
        header("location:index.php");
    }

    function excluir($idLivro){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE FROM livros WHERE idLivro = :idLivro');
        $stmt->bindParam('idLivro', $idLivro, PDO::PARAM_INT);
        $stmt->execute();
        header("location:listaLivros.php");
    }

    function buildLivro(){
        $livro = new Livro($_POST['idLivro'],$_POST['titulo'],$_POST['autor'],$_POST['editora'],$_POST['dataPublicacao'],$_POST['genero'],$_POST['condicao']);
        return $livro;
    }
?>