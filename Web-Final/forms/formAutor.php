<!DOCTYPE html>
<html lang="pt-br">
<?php 
    include_once "../command\acaoAutor.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $autor = new Autor(1,"");
    if ($acao == "editar"){
        $autor = buscar($_GET['idAutor']);
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/formStyle.css">
    <title>Cadastrar Autor(a)</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="../assets/img/undraw_bookshelves_re_lxoy.svg" alt="">
        </div>
        <div class="form">
            <form action="../command/acaoAutor.php" method="post">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastrar Autor(a)</h1>
                    </div>
                    <div class="login-button" style="margin-left: 50px">
                        <button disabled><a href="formLivro.php">Voltar</a></button>
                    </div>
                </div>

                <div class="input-group">
                   
                    <div class="input-box">
                        <label>Nome Completo</label>
                        <input type="text" name="nomeCompleto" placeholder="Digite o nome do autor(a)" autocomplete="off" required
                        value="<?php if ($acao == "editar") 
                            echo $autor->getNomeCompleto(); 
                         else 
                            echo "";?>">
                    </div>

                    <div class="input-box" style="display : none">
                        <label>Id Condição</label>
                        <input type="text" name="idAutor"
                        value="<?php if ($acao == "editar") 
                            echo $autor->getIdAutor(); 
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