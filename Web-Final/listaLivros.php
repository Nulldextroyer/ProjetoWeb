<!DOCTYPE html>
<?php 
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    include_once "livro.class.php";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/tableStyle.css">
    <title>Lista de livros</title>
    <script src="js/util.js"></script>
</head>
<body>
    <div class="container">
        <form class="form" method="post">
            <div class="form-header">
                <div class="title">
                    <h1>Lista de Livros</h1>
                </div>
                <div class="back-button">
                    <button disabled><a href="index.php">Voltar</a></button>
                </div>
            </div>
            <div class="input-box">
                <label>Título a procurar</label>
                <input type="text" name="procurar" size="37" value="<?php echo $procurar; ?>" autocomplete="off">
                <div class="confirmation-button">
                    <button type="submit" name="acao" value="salvar">Procurar</button>
                </div>           
            </div>
            
        </form>
        <table class="content-table">
            <thead>
                <tr>
                    <th scope="col">Id livro</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Editora</th>
                    <th scope="col">Data de publicação</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Condição</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $pdo = Conexao::getInstance(); 
                    $consulta = $pdo->query("SELECT * FROM livros 
                                            WHERE titulo LIKE '%$procurar%' 
                                            ORDER BY idLivro");
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
                        $livro = new Livro($linha['idLivro'],$linha['titulo'],$linha['autor'],$linha['editora'],$linha['dataPublicacao'],$linha['genero'],$linha['condicao']);
                ?>
                <tr>
                    <td><?php echo $livro->getIdLivro();?></td>
                    <td><?php echo $livro->getTitulo();?></td>
                    <td><?php echo $livro->getAutor();?></td>
                    <td><?php echo $livro->getEditora();?></td>
                    <td><?php echo $livro->getDataPublicacao();?></td>
                    <td><?php echo $livro->getGenero();?></td>
                    <td><?php echo $livro->getCondicao();?></td>
                    <td><div class="table-button"><button disabled ><a href="editarLivro.php?acao=editar&idLivro=<?=$livro->getIdLivro()?>">Alterar</a></button></div></td>
                    <td><div class="table-button"><button disabled><a href="javascript:excluirRegistro('acaoLivro.php?acao=excluir&idLivro=<?=$livro->getIdLivro()?>')">Excluir</a></button></div></td> 
                </tr>
            </tbody>
            <?php }?> 
        </table>
    </div>
</body>
</html>