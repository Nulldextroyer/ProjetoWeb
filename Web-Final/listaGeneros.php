<!DOCTYPE html>
<?php 
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    include_once "class/genero.class.php";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link Css -->
    <link rel="stylesheet" href="assets/css/tableStyle.css">
    <!-- Link Font Awesome -->
    <script src="https://kit.fontawesome.com/99a619f27c.js" crossorigin="anonymous"></script>
    <title>Lista de Generos</title>
    <script src="js/util.js"></script>
</head>
<body>
    <div class="container">
        <form class="form" method="post">
            <div class="form-header">
                <div class="title">
                    <h1>Lista de Generos</h1>
                </div>
                <div class="back-button">
                    <button disabled><a href="forms/formGenero.php">Voltar</a></button>
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
                    <th scope="col">Id Genero</th>
                    <th scope="col">Classificação</th>
                    <th scope="col">Descrição</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $pdo = Conexao::getInstance(); 
                    $consulta = $pdo->query("SELECT * FROM generos 
                                            WHERE classificacao LIKE '%$procurar%' 
                                            ORDER BY idGenero");
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
                        $genero = new Genero($linha['idGenero'],$linha['classificacao'],$linha['descricao']);
                ?>
                <tr>
                    <td><?php echo $genero->getIdGenero();?></td>
                    <td><?php echo $genero->getClassificacao();?></td>
                    <td><?php echo $genero->getDescricao();?></td>
                    <td><div class="table-button"><button disabled ><a href="forms/formGenero.php?acao=editar&idGenero=<?=$genero->getIdGenero()?>"><i class="fa-solid fa-pencil"></i>Alterar</a></button></div></td>
                    <td><div class="table-button"><button disabled><a href="javascript:excluirRegistro('command/acaoGenero.php?acao=excluir&idGenero=<?=$genero->getIdGenero()?>')"><i class="fa-regular fa-trash-can"></i>Excluir</a></button></div></td> 
                </tr>
            </tbody>
            <?php }?> 
        </table>
    </div>
</body>
</html>