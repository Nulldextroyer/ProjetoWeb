<!DOCTYPE html>
<?php 
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    include_once "../class/usuario.class.php";
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
    <title>Lista de Usuarios</title>
    <script src="../js/util.js"></script>
</head>
<body>
    <div class="container" style="max-width: 1820px">
        <form class="form" method="post">
            <div class="form-header">
                <div class="title">
                    <h1>Lista de Usuarios</h1>
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
                    <th scope="col">Id Usuario</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sobrenome</th>
                    <th scope="col">Nome Usuario</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Cpf</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Numero Telefone</th>
                    <th scope="col">Endereço Nome Rua</th>
                    <th scope="col">endereco Numero</th>
                    <th scope="col">Id Nivel Acesso</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $pdo = Conexao::getInstance(); 
                    $consulta = $pdo->query("SELECT * FROM usuarios 
                                            WHERE nome LIKE '%$procurar%' 
                                            ORDER BY idUsuario");
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
                        $usuario = new Usuario($linha['idUsuario'],$linha['nome'],$linha['sobrenome'],$linha['nomeUsuario'],$linha['senha'],$linha['cpf'],$linha['email'],$linha['numeroTelefone'],$linha['enderecoRua'],$linha['enderecoNumero'],$linha['idNivelAcesso']);
                ?>
                <tr>
                    <td><?php echo $usuario->getIdUsuario();?></td>
                    <td><?php echo $usuario->getNome();?></td>
                    <td><?php echo $usuario->getSobrenome();?></td>
                    <td><?php echo $usuario->getnomeUsuario();?></td>
                    <td><?php echo $usuario->getSenha();?></td>
                    <td><?php echo $usuario->getCpf();?></td>
                    <td><?php echo $usuario->getEmail();?></td>
                    <td><?php echo $usuario->getNumeroTelefone();?></td>
                    <td><?php echo $usuario->getEnderecoRua();?></td>
                    <td><?php echo $usuario->getEnderecoNumero();?></td>
                    <td><?php echo $usuario->getIdNivelAcesso();?></td>
                    <td><div class="table-button"><button disabled ><a href="../forms/formUsuario.php?acao=editar&idUsuario=<?=$usuario->getIdUsuario()?>"><i class="fa-solid fa-pencil"></i>Alterar</a></button></div></td>
                    <td><div class="table-button"><button disabled><a href="javascript:excluirRegistro('../command/acaoUsuario.php?acao=excluir&idUsuario=<?=$usuario->getIdUsuario()?>')"><i class="fa-regular fa-trash-can"></i>Excluir</a></button></div></td> 
                </tr>
            </tbody>
            <?php }?> 
        </table>
    </div>
</body>
</html>