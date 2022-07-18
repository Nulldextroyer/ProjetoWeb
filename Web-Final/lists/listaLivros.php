<!DOCTYPE html>
<?php 
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    include_once "../class/livro.class.php";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link Css -->
    <link rel="stylesheet" href="../assets/css/tableStyle.css">
    <!-- Link Font Awesome -->
    <script src="https://kit.fontawesome.com/99a619f27c.js" crossorigin="anonymous"></script>
    <title>Lista de livros</title>
    <script src="../js/util.js"></script>
</head>
<body>
    <div class="container">
        <form class="form" method="post">
            <div class="form-header">
                <div class="title">
                    <h1>Lista de Livros</h1>
                </div>
                <div class="back-button">
                    <button disabled><a href="../menuListas.php">Voltar</a></button>
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
                    <th scope="col">Data de publicação</th>
                    <th scope="col">Id Autor</th>
                    <th scope="col">Id Editora</th>
                    <th scope="col">Id Gênero</th>
                    <th scope="col">Id Condição</th>
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
                        $livro = new Livro($linha['idLivro'],$linha['titulo'],$linha['dataPublicacao'],$linha['idAutor'],$linha['idEditora'],$linha['idGenero'],$linha['idCondicao']);
                ?>
                <tr>
                    <td><?php echo $livro->getIdLivro();?></td>
                    <td><?php echo $livro->getTitulo();?></td>
                    <td><?php echo $livro->getDataPublicacao();?></td>
                    <td><?php echo $livro->getIdAutor();?></td>
                    <td><?php echo $livro->getIdEditora();?></td>
                    <td><?php echo $livro->getIdGenero();?></td>
                    <td><?php echo $livro->getIdCondicao();?></td>
                    <td><div class="table-button"><button disabled ><a href="../forms/formLivro.php?acao=editar&idLivro=<?=$livro->getIdLivro()?>"><i class="fa-solid fa-pencil"></i>Alterar</a></button></div></td>
                    <td><div class="table-button"><button disabled><a href="javascript:excluirRegistro('../command/acaoLivro.php?acao=excluir&idLivro=<?=$livro->getIdLivro()?>')"><i class="fa-regular fa-trash-can"></i>Excluir</a></button></div></td> 
                </tr>
            </tbody>
            <?php }?> 
        </table>
    </div>
</body>
</html>