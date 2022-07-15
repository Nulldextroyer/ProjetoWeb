<?php
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    require_once "../class/livro.class.php";

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
        $stmt = $pdo-> prepare('INSERT INTO livros (titulo, dataPublicacao, idAutor, idEditora, idGenero, idCondicao) VALUES(:titulo, :dataPublicacao, :idAutor,  :idEditora, :idGenero, :idCondicao)');
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $titulo = $livro->getTitulo();
        $stmt->bindParam(':dataPublicacao', $dataPublicacao, PDO::PARAM_STR);
        $dataPublicacao = $livro->getDatapublicacao();
        $stmt->bindParam(':idAutor', $idAutor, PDO::PARAM_STR);
        $idAutor = $livro->getIdAutor();
        $stmt->bindParam(':idEditora', $idEditora, PDO::PARAM_STR);
        $idEditora = $livro->getIdEditora();
        $stmt->bindParam(':idGenero', $idGenero, PDO::PARAM_STR);
        $idGenero = $livro->getIdGenero();
        $stmt->bindParam(':idCondicao', $idCondicao, PDO::PARAM_STR);
        $idCondicao = $livro->getIdCondicao();
        $stmt->execute();
        header("location:../index.php");
    }

    function editar(){
        $pdo = Conexao::getInstance();
        $livro = buildLivro();
        $stmt = $pdo->prepare('UPDATE livros SET titulo = :titulo, dataPublicacao = :dataPublicacao, idAutor = :idAutor, idEditora = :idEditora, idGenero = :idGenero, idCondicao = :idCondicao WHERE idLivro = :idLivro');
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $titulo = $livro->getTitulo();
        $stmt->bindParam(':dataPublicacao', $dataPublicacao, PDO::PARAM_STR);
        $dataPublicacao = $livro->getDataPublicacao();
        $stmt->bindParam(':idAutor', $idAutor, PDO::PARAM_STR);
        $idAutor = $livro->getIdAutor();
        $stmt->bindParam(':idEditora', $idEditora, PDO::PARAM_STR);
        $idEditora = $livro->getIdEditora();
        $stmt->bindParam(':idGenero', $idGenero, PDO::PARAM_STR);
        $idGenero = $livro->getIdGenero();
        $stmt->bindParam(':idCondicao', $idCondicao, PDO::PARAM_STR);
        $idCondicao = $livro->getIdCondicao();
        $stmt->bindParam(':idLivro', $idLivro, PDO::PARAM_INT);
        $idLivro = $livro->getIdLivro();
        $stmt->execute();
        header("location:../index.php");
    }

    function buscar($idLivro){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('SELECT * FROM livros WHERE idLivro = :idLivro');
        $stmt->bindParam(':idLivro', $idLivro, PDO::PARAM_INT);
        $consulta = $stmt->execute();
        $livro = new Livro(0,"","",0,0,0,0);
        foreach ($stmt->fetchAll() as $linha) 
            $livro = new Livro($linha['idLivro'],$linha['titulo'],$linha['dataPublicacao'],$linha['idAutor'],$linha['idEditora'],$linha['idGenero'],$linha['idCondicao']);
        return $livro;
    }

    function excluir($idLivro){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE FROM livros WHERE idLivro = :idLivro');
        $stmt->bindParam('idLivro', $idLivro, PDO::PARAM_INT);
        $stmt->execute();
        header("location:../listaLivros.php");
    }

    function buildLivro(){
        $livro = new Livro($_POST['idLivro'],$_POST['titulo'],$_POST['dataPublicacao'],$_POST['idAutor'],$_POST['idEditora'],$_POST['idGenero'],$_POST['idCondicao']);
        return $livro;
    }
?>