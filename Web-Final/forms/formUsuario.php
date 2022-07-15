<!DOCTYPE html>
<html lang="pt-br">
<?php 
    include_once "../command\acaoCondicao.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $condicaoB = new Condicao(1,"","");
    if ($acao == "editar"){
        $condicaoB = buscar($_GET['idCondicao']);
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/formStyle.css">
    <title>Cadastrar Condição</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="../assets/img/undraw_add_user_re_5oib.svg" alt="">
        </div>
        <div class="form">
            <form action="../command/acaoCondicao.php" method="post">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastrar Condição</h1>
                    </div>
                    <div class="login-button">
                        <button disabled><a href="login.php">Voltar</a></button>
                    </div>
                </div>

                <div class="input-group">
                   
                    <div class="input-box">
                        <label>Estado do livro</label>
                        <input type="text" name="condicao" placeholder="Digite o estado do livro" autocomplete="off" required
                        value="<?php if ($acao == "editar") 
                            echo $condicaoB->getCondicao(); 
                         else 
                            echo "";?>">
                    </div>

                    <div class="input-box" style="margin-left: 10px">
                        <label>Descrição</label>
                        <input type="text" name="descricao" placeholder="Descreva a condição" autocomplete="off" required
                        value="<?php if ($acao == "editar") 
                            echo $condicaoB->getDescricao(); 
                         else 
                            echo "";?>">
                    </div>

                    <div class="input-box" style="display : none">
                        <label>Id Condição</label>
                        <input type="text" name="idCondicao"
                        value="<?php if ($acao == "editar") 
                            echo $condicaoB->getIdCondicao(); 
                         else 
                            echo 0;?>" readonly>
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