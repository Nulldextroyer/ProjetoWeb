<!DOCTYPE html>
<?php 
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    include_once "../class/editora.class.php";
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
    <title>Lista de Editoras</title>
    <script src="../js/util.js"></script>
</head>
<body>
    <div class="container">
        <form class="form" method="post">
            <div class="form-header">
                <div class="title">
                    <h1>Lista de Editoras</h1>
                </div>
                <div class="back-button">
                    <button disabled><a href="../menuListas.php">Voltar</a></button>
                </div>
            </div>
            <div class="input-box">
                <label>Editora a procurar</label>
                <input type="text" name="procurar" size="37" value="<?php echo $procurar; ?>" autocomplete="off">
                <div class="confirmation-button">
                    <button type="submit" name="acao" value="salvar">Procurar</button>
                </div>           
            </div>
            
        </form>
        <table class="content-table">
            <thead>
                <tr>
                    <th scope="col">Id Editora</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cnpj</th>
                    <th scope="col">Numero Telefone</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $pdo = Conexao::getInstance(); 
                    $consulta = $pdo->query("SELECT * FROM editoras 
                                            WHERE nome LIKE '%$procurar%' 
                                            ORDER BY idEditora");
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
                        $editora = new Editora($linha['idEditora'],$linha['nome'],$linha['cnpj'],$linha['numeroTelefone']);
                ?>
                <tr>
                    <td><?php echo $editora->getIdEditora();?></td>
                    <td><?php echo $editora->getNome();?></td>
                    <td><?php echo $editora->getCnpj();?></td>
                    <td><?php echo $editora->getNumeroTelefone();?></td>
                    <td><div class="table-button"><button disabled ><a href="../forms/formEditora.php?acao=editar&idEditora=<?=$editora->getIdEditora()?>"><i class="fa-solid fa-pencil"></i>Alterar</a></button></div></td>
                    <td><div class="table-button"><button disabled><a href="javascript:excluirRegistro('../command/acaoEditora.php?acao=excluir&idEditora=<?=$editora->getIdEditora()?>')"><i class="fa-regular fa-trash-can"></i>Excluir</a></button></div></td> 
                </tr>
            </tbody>
            <?php }?> 
        </table>
    </div>
</body>
</html>