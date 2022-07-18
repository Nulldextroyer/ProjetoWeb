<!DOCTYPE html>
<?php 
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    include_once "../class/condicao.class.php";
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
    <title>Lista de Condições</title>
    <script src="../js/util.js"></script>
</head>
<body>
    <div class="container">
        <form class="form" method="post">
            <div class="form-header">
                <div class="title">
                    <h1>Lista de Condições</h1>
                </div>
                <div class="back-button">
                    <button disabled><a href="../menuListas.php">Voltar</a></button>
                </div>
            </div>
            <div class="input-box">
                <label>Condição a procurar</label>
                <input type="text" name="procurar" size="37" value="<?php echo $procurar; ?>" autocomplete="off">
                <div class="confirmation-button">
                    <button type="submit" name="acao" value="salvar">Procurar</button>
                </div>           
            </div>
            
        </form>
        <table class="content-table">
            <thead>
                <tr>
                    <th scope="col">Id Condicao</th>
                    <th scope="col">Estado Livro</th>
                    <th scope="col">Descrição</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $pdo = Conexao::getInstance(); 
                    $consulta = $pdo->query("SELECT * FROM condicoes 
                                            WHERE condicao LIKE '%$procurar%' 
                                            ORDER BY idCondicao");
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
                        $condicao = new Condicao($linha['idCondicao'],$linha['condicao'],$linha['descricao']);
                ?>
                <tr>
                    <td><?php echo $condicao->getIdCondicao();?></td>
                    <td><?php echo $condicao->getCondicao();?></td>
                    <td><?php echo $condicao->getDescricao();?></td>
                    <td><div class="table-button"><button disabled ><a href="../forms/formCondicao.php?acao=editar&idCondicao=<?=$condicao->getIdCondicao()?>"><i class="fa-solid fa-pencil"></i>Alterar</a></button></div></td>
                    <td><div class="table-button"><button disabled><a href="javascript:excluirRegistro('../command/acaoCondicao.php?acao=excluir&idCondicao=<?=$condicao->getIdCondicao()?>')"><i class="fa-regular fa-trash-can"></i>Excluir</a></button></div></td> 
                </tr>
            </tbody>
            <?php }?> 
        </table>
    </div>
</body>
</html>