<!DOCTYPE html>
<?php 
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    include_once "../class/autor.class.php";
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
    <title>Lista de Autores</title>
    <script src="../js/util.js"></script>
</head>
<body>
    <div class="container">
        <form class="form" method="post">
            <div class="form-header">
                <div class="title">
                    <h1>Lista de Autores</h1>
                </div>
                <div class="back-button">
                    <button disabled><a href="../menuListas.php">Voltar</a></button>
                </div>
            </div>
            <div class="input-box">
                <label>Autor(a) a procurar</label>
                <input type="text" name="procurar" size="37" value="<?php echo $procurar; ?>" autocomplete="off">
                <div class="confirmation-button">
                    <button type="submit" name="acao" value="salvar">Procurar</button>
                </div>           
            </div>
            
        </form>
        <table class="content-table">
            <thead>
                <tr>
                    <th scope="col">Id Autor(a)</th>
                    <th scope="col">Nome Completo</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $pdo = Conexao::getInstance(); 
                    $consulta = $pdo->query("SELECT * FROM autores 
                                            WHERE nomeCompleto LIKE '%$procurar%' 
                                            ORDER BY idAutor");
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
                        $autor = new Autor($linha['idAutor'],$linha['nomeCompleto']);
                ?>
                <tr>
                    <td><?php echo $autor->getIdAutor();?></td>
                    <td><?php echo $autor->getNomeCompleto();?></td>
                    <td><div class="table-button"><button disabled ><a href="../forms/formAutor.php?acao=editar&idAutor=<?=$autor->getIdAutor()?>"><i class="fa-solid fa-pencil"></i>Alterar</a></button></div></td>
                    <td><div class="table-button"><button disabled><a href="javascript:excluirRegistro('../command/acaoAutor.php?acao=excluir&idAutor=<?=$autor->getIdAutor()?>')"><i class="fa-regular fa-trash-can"></i>Excluir</a></button></div></td> 
                </tr>
            </tbody>
            <?php }?> 
        </table>
    </div>
</body>
</html>