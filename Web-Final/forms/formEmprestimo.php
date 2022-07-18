<!DOCTYPE html>
<html lang="pt-br">
<?php 
    include_once "../command\acaoGenero.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $genero = new Genero(1,"","");
    if ($acao == "editar"){
        $genero = buscar($_GET['idGenero']);
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/formStyle.css">
    <title>Cadastrar Livro</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="../assets/img/undraw_bookshelves_re_lxoy.svg" alt="">
        </div>
        <div class="form">
            <form action="../command/acaoGenero.php" method="post">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastrar Gênero</h1>
                    </div>
                    <div class="login-button">
                        <button disabled><a href="formLivro.php">Voltar</a></button>
                    </div>
                </div>

                <div class="input-group">
                   
                    <div class="input-box">
                        <label>Gênero</label>
                        <input type="text" name="classificacao" placeholder="Digite um gênero" autocomplete="off" required
                        value="<?php if ($acao == "editar") 
                            echo $genero->getClassificacao(); 
                         else 
                            echo "";?>">
                    </div>

                    <div class="input-box" style="margin-left: 10px">
                        <label>Descrição</label>
                        <input type="text" name="descricao" placeholder="Digite a descrição" autocomplete="off" required
                        value="<?php if ($acao == "editar") 
                            echo $genero->getDescricao(); 
                         else 
                            echo "";?>">
                    </div>

                    <div class="input-box" style="display : none">
                        <label>Id Genero</label>
                        <input type="text" name="idGenero"
                        value="<?php if ($acao == "editar") 
                            echo $genero->getIdGenero(); 
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