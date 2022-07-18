<!DOCTYPE html>
<html lang="pt-br">
<?php 
    include_once "../command\acaoUsuario.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $usuario = new Usuario(1,"","","",1,1,"",1,"",1,1);
    if ($acao == "editar"){
        $usuario = buscar($_GET['idUsuario']);
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/formStyle.css">
    <title>Cadastrar Usuário</title> 

<body>
    <div class="container">
        <div class="form-image">
            <img src="../assets/img/undraw_add_user_re_5oib.svg" alt="">
        </div>
        <div class="form">
            <form action="../command/acaoUsuario.php" method="post">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastrar Usuário</h1>
                    </div>
                    <div class="login-button">
                        <button disabled><a href="../login.php">Voltar</a></button>
                    </div>
                </div>

                <div class="input-group">
                   
                    <div class="input-box">
                        <label>Nome</label>
                        <input type="text" name="nome" placeholder="Digite seu nome" autocomplete="off" required
                        value="<?php if ($acao == "editar") 
                            echo $usuario->getNome(); 
                         else 
                            echo "";?>">
                    </div>

                    <div class="input-box">
                        <label>Sobrenome</label>
                        <input type="text" name="sobrenome" placeholder="Digite seu sobrenome" autocomplete="off" required
                        value="<?php if ($acao == "editar") 
                            echo $usuario->getSobrenome(); 
                         else 
                            echo "";?>">
                    </div>

                    <div class="input-box">
                        <label>Nome de usuario</label>
                        <input type="text" name="nomeUsuario" placeholder="Digite seu usuario" autocomplete="off" required
                        value="<?php if ($acao == "editar") 
                            echo $usuario->getNomeUsuario(); 
                         else 
                            echo "";?>">
                    </div>

                    <div class="input-box">
                        <label>Senha</label>
                        <input type="password" name="senha" placeholder="Digite sua senha" autocomplete="off" required
                        value="<?php if ($acao == "editar") 
                            echo $usuario->getSenha(); 
                         else 
                            echo "";?>">
                    </div>

                    <div class="input-box">
                        <label>Cpf</label>
                        <input type="number" name="cpf" placeholder="Digite seu cpf" autocomplete="off" required
                        value="<?php if ($acao == "editar") 
                            echo $usuario->getCpf(); 
                         else 
                            echo "";?>">
                    </div>

                    <div class="input-box">
                        <label>E-mail</label>
                        <input type="email" name="email" placeholder="Digite seu email" autocomplete="off" required
                        value="<?php if ($acao == "editar") 
                            echo $usuario->getEmail(); 
                         else 
                            echo "";?>">
                    </div>

                    <div class="input-box">
                        <label>Numero de Telefone</label>
                        <input type="number" name="numeroTelefone" placeholder="Digite seu numero" autocomplete="off" required
                        value="<?php if ($acao == "editar") 
                            echo $usuario->getNumeroTelefone(); 
                         else 
                            echo "";?>">
                    </div>
 
                    <div class="input-box">
                        <label>Endereço</label>
                        <input type="text" name="enderecoRua" placeholder="Digite seu numero" autocomplete="off" required
                        value="<?php if ($acao == "editar") 
                            echo $usuario->getEnderecoRua(); 
                         else 
                            echo "";?>">
                    </div>
                    
                    <div class="input-box">
                        <label>Numero da rua</label>
                        <input type="number" name="enderecoNumero" placeholder="Digite seu numero" autocomplete="off" required
                        value="<?php if ($acao == "editar") 
                            echo $usuario->getEnderecoNumero(); 
                         else 
                            echo "";?>">
                    </div>

                    <div class="input-box" style="display : none">
                        <label>Id Usuario</label>
                        <input type="text" name="idUsuario"
                        value="<?php if ($acao == "editar") 
                            echo $usuario->getIdUsuario(); 
                         else 
                            echo 0;?>" readonly>
                    </div>

                    <div class="input-box" style="display : none">
                        <label>Id Nivel de Acesso</label>
                        <input type="text" name="idNivelAcesso"
                        value="<?php if ($acao == "editar") 
                            echo $usuario->getIdNivelAcesso(); 
                         else 
                            echo 2;?>" readonly>
                    </div>

                </div>

                <div class="continue-button">
                    <button type="submit" name="acao" value="salvar">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>